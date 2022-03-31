<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Group;
use App\Models\UploadedImages;
use App\Models\AspectContent;

class Person extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'furigana',
        'catchphrase',
        'profile',
        'order'
    ];
    
    protected $primaryKey = 'person_id';
    
    public function group()
    {
        return $this->belongsTo(Group::class);
    }
    
    public function avatar()
    {
        return $this->hasOne(UploadedImages::class);
    }
    
    public function aspectContents()
    {
        return $this->hasMany(AspectContent::class);
    }
}
