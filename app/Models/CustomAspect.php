<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Group;

class CustomAspect extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'label',
        'order'
    ];
    
    protected $primaryKey = 'aspect_id';
    
    public function group()
    {
        return $this->belongsTo(Group::class);
    }
}
