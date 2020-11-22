<?php

namespace App\Models;

use CodeIgniter\Model;

class WilayahModel extends Model
{
    protected $table = 'wilayah_provinsi';

    public function getKota($idProv)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('wilayah_kabupaten');
        return $builder->where(['provinsi_id' => $idProv])->get()->getResult();
    }

    public function getKecamatan($idKota)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('wilayah_kecamatan');
        return $builder->where(['kabupaten_id' => $idKota])->get()->getResult();
    }

    public function getDesa($idKec)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('wilayah_desa');
        return $builder->where(['kecamatan_id' => $idKec])->get()->getResult();
    }

    public function getNameKota($idKota)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('wilayah_kabupaten');
        return $builder->select('nama')->where('id', $idKota)->get()->getRowArray();
    }

    public function getNameKecamatan($idKec)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('wilayah_kecamatan');
        return $builder->select('nama')->where('id', $idKec)->get()->getRowArray();
    }

    public function getNameDesa($idDesa)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('wilayah_desa');
        return $builder->select('nama')->where('id', $idDesa)->get()->getRowArray();
    }
}
