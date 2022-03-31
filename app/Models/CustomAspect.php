<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomAspect extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'label',
        'order'
    ];
    
    protected $primaryKey = 'aspect_id';
}
