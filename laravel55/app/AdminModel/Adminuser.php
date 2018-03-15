<?php

namespace App\AdminModel;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class Adminuser extends Model
{
    //修改名字
    protected $table = 'adminuser';

    // public function getPassWordAttribute($value)
    // {
    // 	return Hash::make($value);
    // }

    // public function setPassWordAttribute($value)
    // {
    //     $this->attributes['password'] = Hash::make($value);
    // }
}
