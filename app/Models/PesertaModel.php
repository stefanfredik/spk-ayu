<?php

namespace App\Models;

use CodeIgniter\Model;

class PesertaModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'peserta';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = false;
    protected $allowedFields    = ['id', 'tahun', 'id_penduduk'];

    public function findAllPeserta()
    {
        $this->select('datapenduduk.*');
        $this->select('peserta.*');
        $this->join('datapenduduk', 'datapenduduk.id = peserta.id_penduduk ');
        return $this->findAll();
    }

    public function findPeserta($id)
    {
        $this->select('peserta.id as id_peserta');
        $this->select('datapenduduk*');
        $this->select('peserta.*');
        $this->join('datapenduduk', 'datapenduduk.id = peserta.id_penduduk');
        return $this->find($id);
    }
}
