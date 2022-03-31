<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Person;
use App\Models\CustomAspect;

class AspectContent extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'content'
    ];
    
    protected $primaryKey = 'aspect_content_id';
    
    public function person()
    {
        return $this->belongsTo(Person::class);
    }
    
    public function aspect()
    {
        return $this->hasOne(CustomAspect::class);
    }
}
