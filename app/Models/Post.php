<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $collection = 'posts';

    protected $fillable = ['body', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
