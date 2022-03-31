<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;
use App\Models\UploadedImages;
use App\Models\Episode;
use App\Models\Person;
use App\Models\CustomAspect;

class Group extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'thumbnail'
    ];
    
    protected $primaryKey = 'group_id';
    
    public function user() 
    {
        return $this->belongsTo(User::class);
    }
    
    public function thumbnail()
    {
        return $this->hasOne(UploadedImages::class);
    }
    
    public function episodes()
    {
        return $this->hasMany(Episode::class);
    }
    
    public function persons()
    {
        return $this->hasMany(Person::class);
    }
    
    public function aspects()
    {
        return $this->hasMany(CustomAspect::class);
    }
}
