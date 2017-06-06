<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
   protected $directory = "/images/"; // accesstor

    protected $fillable = [
        'file'
    ];


// tao accesstor
    public function getFileAttribute($photo){
    	return $this->directory.$photo;
    }

}
