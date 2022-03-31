<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UploadedImages extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'path'
    ];
    
    protected $primaryKey = 'image_id';
}
