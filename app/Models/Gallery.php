<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $fillable = [
        'image', 'user_id', 'title'
    ];

    public static function boot()
    {
        parent::boot();
        static::creating(function (Gallery $gallery) {
            $gallery->user_id = auth()->user()->id ?? 1;
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
