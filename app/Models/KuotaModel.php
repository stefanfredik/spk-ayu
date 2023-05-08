<?php

namespace App\Models;

use CodeIgniter\Model;
use PhpParser\Node\Stmt\Return_;

class KuotaModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'kuota';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id', 'tahun', 'periode', 'jumlah_kuota', 'tanggal_terima', 'keterangan'];


    // public function findAll(int $limit = 0, int $offset = 0)
    // {
    //     return $this->findAll()->sort();
    // }
}
