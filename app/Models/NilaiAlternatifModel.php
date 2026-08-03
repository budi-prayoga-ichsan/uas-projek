<?php

namespace App\Models;

use CodeIgniter\Model;

class NilaiAlternatifModel extends Model
{
    protected $table = 'nilai_alternatif';

    protected $primaryKey = 'id_nilai';

    protected $allowedFields = [
        'id_kost',
        'id_kriteria',
        'nilai'
    ];
}