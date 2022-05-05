<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;

    protected $fillable=['file'];
    protected $uploads = '/';
   // protected $guarded=['id'];
    // get{property or field}Attribute
   public function getFileAttribute($photo){
        return $this->uploads . $photo;
    }
}

