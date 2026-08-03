<?php

namespace App\Models;

use CodeIgniter\Model;

class HasilRankingModel extends Model
{
    protected $table = 'hasil_ranking';

    protected $primaryKey = 'id_hasil';

    protected $allowedFields = [
        'id_preferensi',
        'id_kost',
        'nilai_preferensi',
        'ranking'
    ];

    protected $useTimestamps = false;
}