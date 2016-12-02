<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use SoftDeletes;
    
    protected $table = 'student';
    protected $dates = ['deleted_at'];
    protected $fillable = array('school_id','name','email','phone');
    
    public function school() {
        return $this->belongsTo('App\School');
    }
}