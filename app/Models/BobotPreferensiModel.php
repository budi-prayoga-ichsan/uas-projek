<?php

namespace App\Models;

use CodeIgniter\Model;

class BobotPreferensiModel extends Model
{
    protected $table = 'bobot_preferensi';

    protected $primaryKey = 'id_bobot';

    protected $allowedFields = [
        'id_preferensi',
        'id_kriteria',
        'bobot'
    ];

    protected $useTimestamps = false;
}