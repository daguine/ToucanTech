<?php

namespace ToucanTech\Model;

use Illuminate\Database\Eloquent\Model;
use ToucanTech\User;

class Photo extends Model
{
    protected  $fillable = ['file'];
    
     public function user(){
    	return $this->belongsTo(User::class);
    }
}
