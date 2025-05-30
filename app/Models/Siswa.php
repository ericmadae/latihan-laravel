<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Siswa extends BaseModel
{
    protected $table = "tb_siswa";
    protected $fillable= [
        "nama",
        "kelas",
        "umur"
    ];
}
