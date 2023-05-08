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
        $this->subkriteriaModel = new SubkriteriaModel();
        $this->pesertaModel = new PesertaModel();
        $this->kuotaModel = new KuotaModel();
    }

    public function index()
    {
        $kriteria       = $this->kriteriaModel->findAll();
        $subkriteria    = $this->subkriteriaModel->findAll();
        $peserta        = $this->pesertaModel->findAllPeserta();

        helper('Check');
        $check = checkdata($peserta, $kriteria, $subkriteria);
        if ($check) return view('/error/index', ['title' => 'Error', 'listError' => $check]);

        $wap = new WapLib($peserta, $kriteria, $subkriteria);

        $dataPeserta = $wap->getAllPeserta();
        $dataKuota = $this->kuotaModel->findAll();



        # ----------------------------
        # Proses Keputusan

        # Hitung Kuota
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


        # Hitung Keputusan
        $rank = 1;
        $jumlahKuotaPeriode = 0;

        foreach ($dataPeserta as $key => $ps) {
            $dataPeserta[$key]['rangking'] = $rank++;

            foreach ($dataKuota as $ku) {
                $tahun = $ps['tahun'];

                if ($tahun == $ku['tahun']) {
                    $jumlahKuotaPeriode += $ku['jumlah_kuota'];

                    if ($rank <= $kuotaTahun[$tahun]) {
                        $dataPeserta[$key]['status'] = 'Layak';
                        if ($rank <= $jumlahKuotaPeriode) {
                            $dataPeserta[$key]['periode'] = $ku['periode'];
                        }
                    } else {
                        $dataPeserta[$key]['status'] = 'Tidak Layak';
                    }
                }
                break;
            }
        }



        // dd($this->statusKeputusan($dataPeserta, $kuotaTahun));

        dd($dataPeserta);
        $data = [
            'title'         => 'Data Perhitungan dan Table Moora',
            'url'           => $this->meta['url'],
            'peserta'       => $wap->getAllPeserta(),
        ];

        return view('/keputusan/index', $data);
    }

    private function statusKeputusan($data, $kuota)
    {
        foreach ($data as $key => $row) {
            $tahun = $row['tahun'];
            $jumlahKuota = $kuota[$tahun];

            if ($row['nilaiAkhir'] <= $jumlahKuota) {
                $data[$key]['status_keputusan'] = 'Diterima';
            } else {
                $data[$key]['status_keputusan'] = 'Ditolak';
            }
        }

        return $data;
    }
}
