<?php

namespace App\Models;

use CodeIgniter\Model;

class PreferensiModel extends Model
{
    protected $table = 'preferensi';

    protected $primaryKey = 'id_preferensi';

    protected $allowedFields = [
        'id_user',
        'tanggal'
    ];

    protected $useTimestamps = false;
}