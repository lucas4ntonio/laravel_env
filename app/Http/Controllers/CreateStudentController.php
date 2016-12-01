<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Events\StudentAdded;
use Event;

class CreateStudentController extends Controller
{
    public function insertForm()
    {
        return view('student_add');
    }
    
    public function insert(Request $request)
    {
        $name = $request->student_name;
        DB::insert('INSERT INTO student (name) values(?)',[$name]);
        echo 'Record inserted successfully.<br/>';
        echo '<a href="/event">Click here</a> to go back.';
        
        // fire event
        Event::fire(new StudentAdded($name));
    }
}
