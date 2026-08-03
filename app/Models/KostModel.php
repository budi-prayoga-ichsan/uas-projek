<?php

namespace App\Models;

use CodeIgniter\Model;

class KostModel extends Model
{
    protected $table = 'kost';
    protected $primaryKey = 'id_kost';
    protected $allowedFields = [
        'id_kategori',
        'nama_kost',
        'alamat',
        'harga',
        'jarak',
        'fasilitas',
        'keamanan',
        'wifi',
        'ukuran_kamar',
        'status',
        'foto'
        ];
}
