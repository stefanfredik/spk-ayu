<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Libraries\Moora;
use App\Libraries\WapLib;
use App\Models\KelayakanModel;
use App\Models\KriteriaModel;
use App\Models\KuotaModel;
use App\Models\PesertaModel;
use App\Models\pendudukModel;
use App\Models\SubkriteriaModel;

class Keputusan extends BaseController {
    var $meta = [
        'url' => 'keputusan',
        'title' => 'Data Keputusan',
        'subtitle' => 'Halaman Keputusan'
    ];

    public function __construct() {
        $this->kriteriaModel = new KriteriaModel();
        $this->subkriteriaModel = new SubkriteriaModel();
        $this->pesertaModel = new PesertaModel();
        $this->kuotaModel = new KuotaModel();
    }

    public function index() {
        $kriteria       = $this->kriteriaModel->findAll();
        $subkriteria    = $this->subkriteriaModel->findAll();
        $peserta        = $this->pesertaModel->findAllPeserta();

        helper('Check');
        $check = checkdata($peserta, $kriteria, $subkriteria);
        if ($check) return view('/error/index', ['title' => 'Error', 'listError' => $check]);

        $wap = new WapLib($peserta, $kriteria, $subkriteria);
        $wap->sortPeserta();
        $wap->setRangking();

        $dataPeserta = $wap->getAllPeserta();


        $dataKuota = $this->kuotaModel->findAll();



        # ----------------------------
        # Proses Keputusan

        # Hitung Kuota



        # Hitung Keputusan


        // dd($this->statusKeputusan($dataPeserta, $dataKuota));


        $data = [
            'title'         => 'Data Perhitungan dan Table Moora',
            'url'           => $this->meta['url'],
            'peserta'       => $this->statusKeputusan($dataPeserta, $dataKuota)
        ];

        return view('/keputusan/index', $data);
    }

    private function statusKeputusan($dataPeserta, $dataKuota) {
        // hitung kuota tahunan
        $kuotaTahun = [];
        foreach ($dataKuota as $row) {
            $tahun = $row['tahun'];
            $jumlahKuota = $row['jumlah_kuota'];

            if (isset($kuotaTahun[$tahun])) {
                $kuotaTahun[$tahun] += $jumlahKuota;
            } else {
                $kuotaTahun[$tahun] = $jumlahKuota;
            }
        }


        foreach ($dataPeserta as $key => $ps) {
            $tahun = $ps['tahun'];
            $rangking = $ps['rangking'];
            $kuotaPeriode = 0;

            foreach ($dataKuota as $ku) {
                if ($tahun == $ku['tahun'] && $rangking <= $kuotaTahun[$tahun]) {
                    $kuotaPeriode += $ku['jumlah_kuota'];

                    $dataPeserta[$key]['status'] = 'Mendapatkan Bantuan';
                    if ($rangking <= $kuotaPeriode) {
                        $dataPeserta[$key]['periode'] = $ku['periode'];
                        $dataPeserta[$key]['tanggalTerima'] = $ku['tanggal_terima'];
                        break;
                    }
                } else {
                    $dataPeserta[$key]['periode'] = 'Tidak Tersedia';
                    $dataPeserta[$key]['tanggalTerima'] = 'Tidak Tersedia';
                    $dataPeserta[$key]['status'] = 'Tidak Mendapatkan Bantuan';
                }
            }
        }

        return $dataPeserta;
    }
}
