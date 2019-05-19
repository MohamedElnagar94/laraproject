<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class student extends Model
{
    use SoftDeletes;
    protected $fillable = ['username', 'password', 'email', 'phone', 'age', 'gender'];
    protected $date = ['delete_at'];
    
    public function user_id()
    {
        return $this->hasOne('App\user','id','user_id');
    }
}
