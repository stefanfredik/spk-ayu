<?php

namespace App\Models;

use CodeIgniter\Model;

class PendudukModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'datapenduduk';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id', 'id_user', 'nik', 'no_kk', 'nama_penduduk', 'jenis_kelamin', 'rt', 'rw', 'status'];


    public function findAllData()
    {
        $this->select('datapenduduk.*');
        $this->select('kriteriapenduduk.*', 'kriteriapenduduk.id as Kri');
        $this->join('kriteriapenduduk', 'datapenduduk.id = kriteriapenduduk.id_penduduk', 'left', 'datapenduduk.id as pend');
        return $this->findAll();
    }

    public function findAllNonBantuan()
    {
        $this->select("datapenduduk.*");
        // $this->select("datablt.*");
        $this->join("peserta", "peserta.id_penduduk = penduduk.id", "left")->where("peserta.id", NULL);
        return $this->findAll();
    }


    public function findAllPenduduk()
    {
        $this->select("datapenduduk.*");
        $this->select("peserta.id_penduduk as peserta");
        $this->join("peserta", "peserta.id_penduduk = penduduk.id", "left");
        return $this->findAll();
    }
}
