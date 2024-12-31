<?php

namespace App\Models;

use CodeIgniter\Model;

class JadwalQuranModel extends Model
{
    // protected $table            = 'jadwal_Quran';
    // protected $primaryKey       = 'id';
    // protected $returnType       = 'object';
    // protected $allowedFields    = ['hari', 'tenaga_pengajar', 'mata_pelajaran', 'periode', 'jam',];

    // // Dates
    // protected $useTimestamps = true;
    // protected $dateFormat    = 'datetime';
    // protected $createdField  = 'tanggal_input';
    // protected $updatedField  = 'tanggal_edit';

    // public function get_jadwal_by_day($hari)
    // {
    //     return $this->where('hari', $hari)->findAll();
    // }

    protected $table            = 'jadwal_quran'; // corrected the table name (case-sensitive)
    protected $primaryKey       = 'id';
    protected $returnType       = 'object';
    protected $allowedFields    = ['hari', 'tenaga_pengajar_id', 'mata_pelajaran_id', 'periode', 'jam']; // updated to use foreign key fields

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'tanggal_input';
    protected $updatedField  = 'tanggal_edit';

    // Get jadwal by day
    public function get_jadwal_by_day($hari)
    {
        return $this->select('jadwal_quran.*, tenaga_pengajar.nama as pengajar_name, mata_pelajaran_quran.nama_mata_pelajaran')
            ->join('tenaga_pengajar', 'tenaga_pengajar.id = jadwal_quran.tenaga_pengajar_id', 'left')
            ->join('mata_pelajaran_quran', 'mata_pelajaran_quran.id = jadwal_quran.mata_pelajaran_id', 'left')
            ->where('hari', $hari)
            ->findAll();
    }
}
