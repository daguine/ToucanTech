<?php

namespace ToucanTech\Model;

use Illuminate\Database\Eloquent\Model;
use ToucanTech\User;

class Role extends Model {

    protected $fillable = ['name', 'description'];

    public function users() {
        return $this->belongsToMany(User::class);
    }

}
