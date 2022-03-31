<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Group;
use App\Models\Person;

class UploadedImages extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'path'
    ];
    
    protected $primaryKey = 'image_id';
    
    public function group()
    {
        return $this->belongsTo(Group::class);
    }
    
    public function person()
    {
        return $this->belongsTo(Person::class);
    }
}
