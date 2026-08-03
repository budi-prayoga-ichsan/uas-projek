<?php

namespace App\Models;

use CodeIgniter\Model;

class KategoriKostModel extends Model
{
    protected $table = 'kategori_kost';
    protected $primaryKey = 'id_kategori';
    protected $allowedFields = ['nama_kategori'];
}
