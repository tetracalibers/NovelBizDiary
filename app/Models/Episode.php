<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'title',
        'catchphrase',
        'content',
        'start',
        'finish',
        'order'
    ];
    
    protected $primaryKey = 'episode_id';
}
