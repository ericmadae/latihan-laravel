<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    public function time_format($attribute) {
        return Carbon::parse($this->$attribute);
    }
}
