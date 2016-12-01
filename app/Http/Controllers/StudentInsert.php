<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class StudentInsert extends Controller
{
    public function insertform ()
    {
        return view('student_create');
    }
    
    public function insert (Request $request)
    {
        $name = $request->input('stud_name');
        DB::insert('INSERT INTO student (name) values(?)',[$name]);
        echo 'Record inserted successfully.<br/>';
        echo '<a href="/insert">Click here to go back.</a>';
    }
}
