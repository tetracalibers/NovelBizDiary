<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AspectContent extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'content'
    ];
    
    protected $primaryKey = [
        'aspect_id',
        'person_id'
    ];
}
