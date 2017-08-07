<?php

namespace ToucanTech\Model;

use Illuminate\Database\Eloquent\Model;
use ToucanTech\User;

class School extends Model
{
    
    protected $fillable = [
        'name','description'
    ];
    
     public function users() {
        return $this->belongsToMany(User::class);
    }
    
    
}
