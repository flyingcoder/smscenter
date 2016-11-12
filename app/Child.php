<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Child extends Model
{
    protected $fillable = ['name', 'birthday', 'parent', 'phone_number', 'barangay'];
}
