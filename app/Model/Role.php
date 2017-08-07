<?php

namespace ToucanTech\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use ToucanTech\User;

class Role extends Model {

    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = ['name', 'description'];

    public function users() {
        return $this->belongsToMany(User::class);
    }

}
