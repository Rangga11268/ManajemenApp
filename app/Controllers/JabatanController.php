<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\JabatanModel;
use CodeIgniter\HTTP\ResponseInterface;

class JabatanController extends BaseController
{
    protected $modelJabatan;

    public function __construct()
    {
        if (!session()->get('login')) {
            redirect('login')->with('error', 'Silahkan login terlebih dahulu..')->send();
            exit();
        }
        $this->modelJabatan = new JabatanModel();
    }
    public function index()
    {
        $data['jabatan'] = $this->modelJabatan->findAll();
        return view('jabatan/index', $data);
    }

    public function show($id) {
        //
    }

    public function create()
    {
        return view('jabatan/create');
    }

    public function store()
    {

        //  pesan alert dan rules
        $rules = [
            'nama_jabatan' => 'required',
            'deskripsi_jabatan' => 'required',
        ];

        $errors = [
            'nama_jabatan' => [
            'required' => 'Nama jabatan tidak boleh kosong'
            ],
            'deskripsi_jabatan' => [
            'required' => 'Deskripsi jabatan tidak boleh kosong'
            ],
        ];

         // validasi form pengisian jabatan
        $valData = $this->validate($rules, $errors);

        if (!$valData) {
          return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());  
        };

        // Mengumpulkan data dari form
        $data = [
            'nama_jabatan' => $this->request->getPost('nama_jabatan'),
            'deskripsi_jabatan' => $this->request->getPost('deskripsi_jabatan'),
        ];

        // Simpan data dan alert
        $this->modelJabatan->save($data);        
        // session()->setFlashdata('success', 'Tambah data jabatan berhasil');
        return redirect('jabatan')->with('success', 'Tambah data jabatan berhasil');
    }

    public function edit($id)
    {
        $data['jabatan'] = $this->modelJabatan->find($id);
        return view('jabatan/edit', $data);
    }

    public function update($id)
    {

        // pesan alert
        $rules = [
            'nama_jabatan' => 'required',
            'deskripsi_jabatan' => 'required',
        ];

        $errors = [
            'nama_jabatan' => [
            'required' => 'Nama jabatan tidak boleh kosong'
            ],
            'deskripsi_jabatan' => [
            'required' => 'Deskripsi jabatan tidak boleh kosong'
            ],
        ];

         // validasi form pengisian jabatan
        $valData = $this->validate($rules, $errors);

        if (!$valData) {
          return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());  
        };

        // Ambil data dari form
        $data = [
            'id' => $id,
            'nama_jabatan' => $this->request->getPost('nama_jabatan'),
            'deskripsi_jabatan' => $this->request->getPost('deskripsi_jabatan'),
        ];

        // Proses data dan kasih alert
        $this->modelJabatan->save($data);
        // session()->setFlashdata('update', 'Update data jabatan berhasil');
        return redirect('jabatan')->with('update', 'Update data jabatan berhasil');
    }

    public function delete($id)
    {
        $this->modelJabatan->delete($id);
        // session()->setFlashdata('delete', 'Hapus data jabatan berhasil');
        return redirect('jabatan')->with('delete', 'Hapus data jabatan berhasil');
    }
}
