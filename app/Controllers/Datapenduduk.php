<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PendudukModel;
use CodeIgniter\API\ResponseTrait;

class Datapenduduk extends BaseController
{
    use ResponseTrait;

    var $meta = [
        'url' => 'datapenduduk',
        'title' => 'Data Penduduk',
        'subtitle' => 'Halaman Penduduk'
    ];


    public function __construct()
    {
        $this->pendudukModel = new PendudukModel();
    }

    public function index()
    {

        $data = [
            'title' => 'Data Penduduk',
            'meta'   => $this->meta,
            'meta'  => $this->meta
        ];

        return view('/penduduk/index', $data);
    }

    public function tambah()
    {
        $data = [
            'title' => 'Tambah Data Penduduk',
            'meta'   => $this->meta
        ];

        return view('/penduduk/tambah', $data);
    }

    public function table()
    {
        $data = [
            'title' => 'Data Penduduk',
            'meta'   => $this->meta,
            'dataPenduduk' => $this->pendudukModel->findAll(),
        ];

        return view('/penduduk/table', $data);
    }



    public function edit($id)
    {
        $data = [
            'title' => 'Edit Data Penduduk',
            'penduduk'  => $this->pendudukModel->find($id),
            'meta'      => $this->meta
        ];

        return view('/penduduk/edit', $data);
    }



    public function detail($id)
    {
        $data = [
            'title' => 'Detail Data Penduduk',
            'penduduk'  => $this->pendudukModel->find($id),
            'meta'   => $this->meta
        ];

        return $this->respond(view('/penduduk/detail', $data), 200);
    }

    public function store()
    {
        $data = $this->request->getPost();
        $this->pendudukModel->save($data);

        $res = [
            'status' => 'success',
            'msg'   => 'Data Penduduk Berhasil Ditambahkan.',
            // 'data'  => $data
        ];

        return $this->respond($res, 200);
    }

    public function update($id)
    {
        $data = $this->request->getPost();
        $this->pendudukModel->update($id, $data);

        $res = [
            'status' => 'success',
            'msg'   => 'Data berhasil Diupdate.',
            'data'  => $data
        ];

        return $this->respond($res, 200);
    }

    public function delete($id)
    {
        $this->pendudukModel->delete($id);

        $res = [
            'status'    => 'success',
            'msg'     => 'Data berhasil dihapus.',
        ];

        return $this->respond($res, 200);
    }
}
