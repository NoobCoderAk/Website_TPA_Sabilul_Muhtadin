<?php

namespace App\Models;

use CodeIgniter\Model;

class MapelQuranModel extends Model
{
    protected $table            = 'mata_pelajaran_quran';
    protected $primaryKey       = 'id';
    protected $returnType       = 'object';
    protected $allowedFields    = ['nama_mata_pelajaran'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'tanggal_input';
    protected $updatedField  = 'tanggal_edit';
}
