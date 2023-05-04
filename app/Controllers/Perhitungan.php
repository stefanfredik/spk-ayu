<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KelayakanModel;
use App\Models\KriteriaModel;
use App\Models\PesertaModel;
use App\Models\PendudukModel;
use App\Models\SubkriteriaModel;
use App\Libraries\Moora;

class Perhitungan extends BaseController
{
    var $meta = [
        'url' => 'perhitungan',
        'title' => 'Data Perhitungan',
        'subtitle' => 'Halaman Perhitungan'
    ];

    private $totalNilaiKriteria;

    public function __construct()
    {
        $this->kriteriaModel = new KriteriaModel();
        $this->pendudukModel = new PendudukModel();
        $this->subkriteriaModel = new SubkriteriaModel();
        $this->pesertaModel = new PesertaModel();

        $this->jumlahKriteria = $this->kriteriaModel->countAllResults();
    }


    public function index()
    {
        $kriteria       = $this->kriteriaModel->findAll();
        $subkriteria    = $this->subkriteriaModel->findAll();
        $peserta        = $this->pesertaModel->findAllPeserta();


        helper('Check');

        $check = checkdata($peserta, $kriteria, $subkriteria);
        if ($check) return view('/error/index', ['title' => 'Error', 'listError' => $check]);

        // $moora = new Moora($peserta, $kriteria, $subkriteria, $kelayakan);
        $moora = new Moora($peserta, $kriteria, $subkriteria);

        $data = [
            'title' => 'Data Perhitungan dan Table Moora',
            'dataKriteria' => $this->kriteriaModel->findAll(),
            'totalNilaiKriteria' => $this->totalNilaiKriteria,
            'peserta' => $moora->getAllPeserta(),
            'jumKriteriaBenefit' => $moora->jumKriteriaBenefit,
            'jumKriteriaCost' => $moora->jumKriteriaCost,
            'dataSubkriteria' => $this->subkriteriaModel->findAll(),
            'bobotKriteria' => $moora->bobotKriteria
        ];

        return view('/perhitungan/index', $data);
    }


    public function vectorS()
    {
    }


    public function vectorV()
    {
    }
}
