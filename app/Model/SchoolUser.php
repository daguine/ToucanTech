<?php

namespace ToucanTech\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SchoolUser extends Model
{
   use SoftDeletes;

    protected $dates = ['deleted_at'];
}
