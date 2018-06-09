<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Support extends Model
{
   protected $table="supports";	

   public function supportSubject(){

        return $this->belongsTo('App\SupportSubject','subject_id');
    }

}