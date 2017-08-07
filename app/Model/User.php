<?php

namespace ToucanTech;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use ToucanTech\Model\School;
use ToucanTech\Model\Role;
use ToucanTech\Model\Photo;

class User extends Authenticatable
{
    use Notifiable;
    

    protected $fillable = [
        'name', 'email', 'password',
    ];

 
    protected $hidden = [
        'password', 'remember_token',
    ];
    
     public function schools(){
        return $this->belongsToMany(School::class);
    }
    
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
    
    public function photo()
  {
    return $this->hasOne(Photo::class);
  }
    
   
    
    
     public function isAdmin()
    {
         $roles =$this->roles->pluck('name');
        
         foreach($roles as $roleName){
             if($roleName == 'Administrator'){
                 return true;
             }
         }
        return false;
    }

}
