<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\JabatanModel;
use App\Models\PegawaiModel;
use CodeIgniter\HTTP\ResponseInterface;

class PegawaiController extends BaseController
{
    protected $modelPegawai;

    public function __construct()
    {
        $this->modelPegawai = new PegawaiModel();
    }
    public function index()
    {
        $data['pegawai'] = $this->modelPegawai->getPegawaiWithjabatan();
        return view('pegawai/index', $data);
    }

    public function show($id)
    {
        $data['pegawai'] = $this->modelPegawai->getPegawaiWithjabatanWhere($id);
        return view('pegawai/show', $data);
    }

    public function create()
    {
        $modelJabatan = new JabatanModel();
        $data['jabatan'] = $modelJabatan->findAll();
        return view('pegawai/create', $data);
    }

    public function store()
    {

        $rules = [
            'nama_pegawai' => 'required',
            'alamat' => 'required',
            'telepon' => 'required',
            'jabatan_id' => 'required|numeric',
            'file_foto' => 'uploaded[file_foto]|is_image[file_foto]
            |mime_in[file_foto,image/jpg,image/png,image/jpeg]|max_size[file_foto,1024]'
        ];

        $errors = [
            'nama_pegawai' => [
                'required' => 'Nama pegawai wajib di isi'
            ],
            'alamat' => [
                'required' => 'Alamat wajib di isi'
            ],
            'telepon' => [
                'required' => 'No Telepon wajib di isi'
            ],
            'jabatan_id' => [
                'required' => 'Jabatan wajib di isi',
                'numeric' => 'Id jabatan wajib angka'
            ],
            'file_foto' => [
                'uploaded' => 'Foto wajib di unggah',
                'is_image' => 'Foto harus gambar',
                'mime_in' => 'Foto harus jpg,png,jpeg',
                'max_size' => 'Ukuran foto harus di bawah 1MB'
            ],
        ];


        $valData = $this->validate($rules, $errors);

        if (!$valData) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'nama_pegawai' => $this->request->getPost('nama_pegawai'),
            'alamat' => $this->request->getPost('alamat'),
            'telepon' => $this->request->getPost('telepon'),
            'jabatan_id' => $this->request->getPost('jabatan_id'),
        ];

        // proses input image
        $file_foto = $this->request->getFile('file_foto');
        if ($file_foto && $file_foto->isValid() && !$file_foto->hasMoved()) {
            $namaFile = $file_foto->getRandomName();
            $file_foto->move('uploads', $namaFile);
            $data['image'] = $namaFile;
        }

        $this->modelPegawai->save($data);
        session()->setFlashdata('create', 'Tambah data pegawai berhasil');
        return redirect('pegawai');
    }

    public function edit($id)
    {
        $modelJabatan = new JabatanModel();
        $data['jabatan'] = $modelJabatan->findAll();
        $data['pegawai'] = $this->modelPegawai->find($id);
        return view('pegawai/edit', $data);
    }

    public function update($id)
    {
        $rules = [
            'nama_pegawai' => 'required',
            'alamat' => 'required',
            'telepon' => 'required',
            'jabatan_id' => 'required|numeric',
            'file_foto' => 'permit_empty|is_image[file_foto]|mime_in[file_foto,image/jpg,image/png,image/jpeg]|max_size[file_foto,1024]'
        ];

        $errors = [
            'nama_pegawai' => [
                'required' => 'Nama pegawai wajib di isi'
            ],
            'alamat' => [
                'required' => 'Alamat wajib di isi'
            ],
            'telepon' => [
                'required' => 'No Telepon wajib di isi'
            ],
            'jabatan_id' => [
                'required' => 'Jabatan wajib di isi',
                'numeric' => 'Id jabatan wajib angka'
            ],
            'file_foto' => [
                'is_image' => 'Foto harus gambar',
                'mime_in' => 'Foto harus jpg,png,jpeg',
                'max_size' => 'Ukuran foto harus di bawah 1MB'
            ],
        ];
        $data = [
            'id' => $id,
            'nama_pegawai' => $this->request->getPost('nama_pegawai'),
            'alamat' => $this->request->getPost('alamat'),
            'telepon' => $this->request->getPost('telepon'),
            'jabatan_id' => $this->request->getPost('jabatan_id'),
        ];

        $valData = $this->validate($rules, $errors);
        if (!$valData) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        };

        // proses input image
        $file_foto = $this->request->getFile('file_foto');
        if ($file_foto && $file_foto->isValid() && !$file_foto->hasMoved()) {
            $namaFile = $file_foto->getRandomName();
            $file_foto->move('uploads', $namaFile);
            $data['image'] = $namaFile;
        }

        // hapus foto lama jika ada
        $fotolama = $this->request->getPost('fotoLama');
        if (!empty($fotolama)) {
            $filePath = 'uploads/' . $fotolama;
            if (is_file($filePath)) {
                unlink($filePath);
            }
        }


        $this->modelPegawai->save($data);
        session()->setFlashdata('update', 'Update data pegawai berhasil');
        return redirect('pegawai');
    }

    public function delete($id)
    {

        $pegawai = $this->modelPegawai->find($id);
        if ($pegawai) {
            if (!empty($pegawai->image)) {
                $filePath = 'uploads/' . $pegawai->image;
                if (is_file($filePath)) {
                    unlink($filePath);
                }
            }
            $this->modelPegawai->delete($id);
        }
        session()->setFlashdata('delete', 'Hapus data pegawai berhasil');
        return redirect('pegawai');
    }
}
