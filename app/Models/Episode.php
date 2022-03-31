<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Group;

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
    
    public function group()
    {
        return $this->belongsTo(Group::class);
    }
}
