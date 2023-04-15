<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Libraries\Moora;
use App\Models\KelayakanModel;
use App\Models\KriteriaModel;
use App\Models\PesertaModel;
use App\Models\pendudukModel;
use App\Models\SubkriteriaModel;

class Keputusan extends BaseController
{
    var $meta = [
        'url' => 'keputusan',
        'title' => 'Data Keputusan',
        'subtitle' => 'Halaman Keputusan'
    ];

    public function __construct()
    {
        $this->kriteriaModel = new KriteriaModel();
        $this->pendudukModel = new PendudukModel();
        $this->subkriteriaModel = new SubkriteriaModel();
        $this->pesertaModel = new PesertaModel();
        $this->kelayakanModel = new KelayakanModel();
        // $this->jumlahKriteria = $this->kriteriaModel > countAllResults();
        // $this->keputusanModel = new KeputusanBltModel();
    }

    public function index()
    {
        $kriteria       = $this->kriteriaModel->findAll();
        $subkriteria    = $this->subkriteriaModel->findAll();
        $peserta        = $this->pesertaModel->findAllPeserta();
        $kelayakan      = $this->kelayakanModel->findAll();

        helper('Check');
        $check = checkdata($peserta, $kriteria, $subkriteria, $kelayakan);
        if ($check) return view('/error/index', ['title' => 'Error', 'listError' => $check]);

        $moora = new Moora($peserta, $kriteria, $subkriteria, $kelayakan);

        $data = [
            'title'         => 'Data Perhitungan dan Table Moora',
            'url'           => $this->meta['url'],
            'peserta'       => $moora->getAllPeserta(),
            'kelayakan'     => $kelayakan
        ];

        return view('/keputusan/index', $data);
    }
}
