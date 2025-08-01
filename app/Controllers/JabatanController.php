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
        $this->modelJabatan = new JabatanModel();
    }
    public function index()
    {
        return view('jabatan/index');
    }

    public function show($id) {}

    public function create() {}

    public function store()
    {
        # code...
    }

    public function edit($id) {}

    public function update($id) {}

    public function delete($id) {}
}
