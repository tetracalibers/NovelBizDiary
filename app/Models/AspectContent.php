<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Person;

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
}
