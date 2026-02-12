<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\RoomModel;
use App\Models\TestimonialModel;

class Dashboard extends BaseController
{
    public function index()
    {
        $roomModel = new RoomModel();
        $testimonialModel = new TestimonialModel();
        $galleryModel = new \App\Models\GalleryModel();
        
        // Hubungkan ke database untuk mengambil tabel settings
        $db = \Config\Database::connect();
        $settings = $db->table('settings')->get()->getResultArray();

        // Mengubah format array settings agar mudah dipanggil di view
        // Dari format baris menjadi format key => value
        $kostSettings = [];
        foreach ($settings as $row) {
            $kostSettings[$row['key']] = $row['value'];
        }

        $data = [
            'title'        => 'Admin Panel - Alpha Kost',
            'rooms'        => $roomModel->findAll(),
            'testimonials' => $testimonialModel->findAll(),
            // Kirim data settings ke view
            'address'      => $kostSettings['address'] ?? '',
            'phone'        => $kostSettings['phone'] ?? '',
            'kost_name'    => $kostSettings['kost_name'] ?? 'Alpha Kost',
            'owner_name'   => $kostSettings['owner_name'] ?? 'Pemilik Kost',
            'galleries'    => $galleryModel->findAll(),
        ];

        return view('admin/dashboard', $data);
    }

    // Fungsi untuk menyimpan kamar baru
    public function storeRoom()
    {
        $roomModel = new \App\Models\RoomModel();
        $price = str_replace('.', '', $this->request->getPost('price'));

        
        $roomModel->save([
            'room_type'   => $this->request->getPost('room_type'),
            // 'price'       => $this->request->getPost('price'),
            // 'price' = str_replace('.', '', $this->request->getPost('price')),
            'price'       => $price,
            'wa_template' => $this->request->getPost('wa_template')
        ]);

        return redirect()->to('/admin')->with('success', 'Kamar baru berhasil ditambahkan!');
    }

    // Update fungsi yang sudah ada agar tipe kamar bisa diubah
    public function updateRoom($id)
    {
        $roomModel = new \App\Models\RoomModel();
        $price = str_replace('.', '', $this->request->getPost('price'));

        $roomModel->update($id, [
            'room_type'   => $this->request->getPost('room_type'), // Sekarang bisa di-edit
            // 'price'       => $this->request->getPost('price'),
            'price'       => $price,
            'wa_template' => $this->request->getPost('wa_template'),
        ]);

        return redirect()->to('/admin')->with('success', 'Data kamar berhasil diperbarui!');
    }

    // app/Controllers/Admin/Dashboard.php

    public function deleteRoom($id)
    {
        $roomModel = new \App\Models\RoomModel();
        
        // Cek apakah data ada sebelum dihapus
        if ($roomModel->find($id)) {
            $roomModel->delete($id);
            return redirect()->to('/admin')->with('success', 'Kamar berhasil dihapus!');
        }

        return redirect()->to('/admin')->with('error', 'Data tidak ditemukan.');
    }

    // Update Info Kost (Alamat/Kontak)
    public function updateSettings()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('settings');

        // Mengambil semua data dari form settings[]
        $settings = $this->request->getPost('settings');

        if ($settings) {
            foreach ($settings as $key => $value) {
                $builder->where('key', $key)->update(['value' => $value]);
            }
        }

        return redirect()->to('/admin')->with('success', 'Informasi kost berhasil diperbarui!');
    }

    // Update Password Admin
    public function updatePassword() {
        $model = new \App\Models\UserModel();
        $newPass = $this->request->getPost('new_password');
        $model->where('username', session()->get('username'))
            ->set(['password' => password_hash($newPass, PASSWORD_DEFAULT)])
            ->update();
        return redirect()->back()->with('success', 'Password berhasil diubah!');
    }

    public function storeTestimonial()
    {
        $model = new \App\Models\TestimonialModel();
        
        $model->save([
            'name'    => $this->request->getPost('name'),
            'content' => $this->request->getPost('content'),
            'stars'   => $this->request->getPost('stars'),
        ]);

        return redirect()->to('/admin')->with('success', 'Testimoni berhasil ditambahkan!');
    }

    public function deleteTestimonial($id)
    {
        $model = new \App\Models\TestimonialModel();
        $model->delete($id);

        return redirect()->to('/admin')->with('success', 'Testimoni berhasil dihapus!');
    }

    // Gallery
    // Tambahkan di Dashboard.php

    public function storeGallery()
    {
        $file = $this->request->getFile('image');
        if ($file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move('uploads/gallery', $newName);

            $model = new \App\Models\GalleryModel();
            $model->save([
                'image_path' => $newName,
                'caption'    => $this->request->getPost('caption')
            ]);
            return redirect()->back()->with('success', 'Foto berhasil diunggah!');
        }
        return redirect()->back()->with('error', 'Gagal mengunggah foto.');
    }

    public function deleteGallery($id)
    {
        $model = new \App\Models\GalleryModel();
        $data = $model->find($id);
        if ($data) {
            unlink('uploads/gallery/' . $data['image_path']); // Hapus file fisik
            $model->delete($id);
        }
        return redirect()->back()->with('success', 'Foto berhasil dihapus!');
    }
}