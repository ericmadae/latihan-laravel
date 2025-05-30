<?php

namespace App\Models;

use App\Jobs\TestJob;
use App\Events\PostSaved;
use App\Listeners\PostCreated;
use App\Observers\PostObserver;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;

#[ObservedBy([PostObserver::class])]
class Post extends Model
{
    protected $table = 'posts';
    protected $fillable = ['title', 'body', 'user_id'];


    protected static function booted() 
    {
        // static::creating(function ($post) {
        //     $post->user_id = auth()->user()->id;
        // });

        static::updating(function ($post) {
            $post->user_id = 1; 
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
