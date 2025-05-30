<?php

namespace App\Models;

use App\TimeFormatter;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use TimeFormatter;
    protected $table = "guru";
    protected $fillable = ['nama', 'usia', 'jenis_kelamin'];
}
