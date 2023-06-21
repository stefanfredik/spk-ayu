<?php

namespace App\Libraries;

class WapLib
{
    private $dataAkhir = [];
    public $bobotKriteria = [];


    public function __construct(private array $dataPeserta, private array $dataKriteria, private array $dataSubkriteria)
    {
        $this->setDataInfo();
        $this->hitungBobotKriteria();
        $this->setNilai();
        $this->vectorS();
        $this->vectorV();
        // $this->sortPeserta();
    }

    // Hitung bobot kriteria
    private function hitungBobotKriteria()
    {
        $totalNilaiKriteria = 0;

        foreach ($this->dataKriteria as $dk) {
            $totalNilaiKriteria += $dk['nilai'];
        }

        foreach ($this->dataKriteria as $dk) {
            $this->bobotKriteria[$dk['keterangan']] = number_format(($dk["nilai"] / $totalNilaiKriteria), 2);
        }
    }


    private function setDataInfo()
    {
        foreach ($this->dataPeserta as $key => $ps) {
            $this->dataAkhir[$key] = $ps;
        }
    }

    private function setNilai()
    {
        foreach ($this->dataPeserta as $key => $ps) {
            foreach ($this->dataKriteria as $dk) {
                $k = 'k_' . $dk['id'];

                foreach ($this->dataSubkriteria as $ds) {
                    if ($ps[$k] == $ds["id"]) {
                        $this->dataAkhir[$key]["kriteria_nilai"][$dk["keterangan"]] = $ds['nilai'];
                        $this->dataAkhir[$key]["kriteria_keterangan"][$dk["keterangan"]] = $ds['subkriteria'];
                    } else if ($ps[$k] == null) {
                        $this->dataAkhir[$key]["kriteria_nilai"][$dk["keterangan"]] = 0;
                        $this->dataAkhir[$key]["kriteria_keterangan"][$dk["keterangan"]] = 0;
                    }
                }
            }
        }
    }

    private function vectorS()
    {
        foreach ($this->dataAkhir as $key => $da) {
            $temp = 1;

            foreach ($this->dataKriteria as $dk) {
                if ($dk["type"] == "cost") {
                    $temp *= pow($da["kriteria_nilai"][$dk['keterangan']], abs($this->bobotKriteria[$dk['keterangan']]));
                } else {
                    $temp *= pow($da["kriteria_nilai"][$dk['keterangan']], ($this->bobotKriteria[$dk['keterangan']]));
                }
            }

            $this->dataAkhir[$key]['vectorS'] = $temp;
        }
    }


    private function vectorV()
    {
        $allVectorS =  0;
        foreach ($this->dataAkhir as $da) {
            $allVectorS += $da['vectorS'];
        }

        foreach ($this->dataAkhir as $key => $da) {
            $this->dataAkhir[$key]['vectorV'] = $da['vectorS'] / $allVectorS;
            $this->dataAkhir[$key]['nilaiAkhir'] = number_format($da['vectorS'] / $allVectorS, 3);
        }
    }

    public function setRangking()
    {
        foreach ($this->dataAkhir as $key => $da) {
            $this->dataAkhir[$key]['rangking'] = $key + 1;
            $this->dataAkhir[$key]['periode'] = "";
        }
    }


    public function sortPeserta()
    {
        usort($this->dataAkhir, fn ($a, $b) => $b['vectorV'] <=> $a['vectorV']);
    }



    public function getAllPeserta()
    {
        return $this->dataAkhir;
    }
}
