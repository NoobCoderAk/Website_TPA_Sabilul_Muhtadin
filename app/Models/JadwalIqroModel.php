<?php

namespace App\Models;

use CodeIgniter\Model;

class JadwalIqroModel extends Model
{
    // protected $table            = 'jadwal_iqro';
    // protected $primaryKey       = 'id';
    // protected $returnType       = 'object';
    // protected $allowedFields    = ['hari', 'tenaga_pengajar_id', 'mata_pelajaran_id', 'periode', 'jam',];

    // // Dates
    // protected $useTimestamps = true;
    // protected $dateFormat    = 'datetime';
    // protected $createdField  = 'tanggal_input';
    // protected $updatedField  = 'tanggal_edit';

    // public function get_jadwal_by_day($hari)
    // {
    //     return $this->where('hari', $hari)->findAll();
    // }

    protected $table            = 'jadwal_iqro';
    protected $primaryKey       = 'id';
    protected $returnType       = 'object';
    protected $allowedFields    = ['hari', 'tenaga_pengajar_id', 'mata_pelajaran_id', 'periode', 'jam'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'tanggal_input';
    protected $updatedField  = 'tanggal_edit';

    // Relationships (optional: eager loading)
    protected $tenagaPengajarModel = 'App\Models\TenagaPengajarModel';
    protected $mataPelajaranIqroModel = 'App\Models\MataPelajaranIqroModel';

    // Fetch jadwal by day with related data
    public function get_jadwal_by_day($hari)
    {
        return $this->select('jadwal_iqro.*, tenaga_pengajar.nama AS tenaga_pengajar, mata_pelajaran_iqro.nama_mata_pelajaran')
            ->join('tenaga_pengajar', 'tenaga_pengajar.id = jadwal_iqro.tenaga_pengajar_id', 'left')
            ->join('mata_pelajaran_iqro', 'mata_pelajaran_iqro.id = jadwal_iqro.mata_pelajaran_id', 'left')
            ->where('jadwal_iqro.hari', $hari)
            ->findAll();
    }
}
