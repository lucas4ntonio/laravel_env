<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class School extends Model
{
    use SoftDeletes;
    
    protected $table = 'school';
    protected $dates = ['deleted_at'];
    protected $fillable = array('name','location');
}