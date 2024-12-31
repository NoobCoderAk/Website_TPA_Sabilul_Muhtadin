<?php

namespace App\Models;

use CodeIgniter\Model;

class PengajarModel extends Model
{
    protected $table            = 'tenaga_pengajar';
    protected $primaryKey       = 'id';
    protected $returnType       = 'object';
    protected $allowedFields    = ['nama', 'jabatan', 'gambar', 'pengalaman'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'tanggal_input';
    protected $updatedField  = 'tanggal_edit';
}
