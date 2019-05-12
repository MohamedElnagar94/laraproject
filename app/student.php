<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class student extends Model
{
    protected $fillable = ['studentname','studentpassword','studentemail','studentphone','studentage','gender'];
}
