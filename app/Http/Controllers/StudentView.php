<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class StudentView extends Controller
{
    public function index ()
    {
        $users = DB::select('select * from student');
        return view ('student_view',['users'=>$users]);
    }
}
