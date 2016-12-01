<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class StudentUpdate extends Controller
{
    public function index()
    {
        $users = DB::select('SELECT * FROM student');
        return view('student_edit_view',['users'=>$users]);
    }
    
    public function show($id)
    {
        $users = DB::select('SELECT * FROM student WHERE id = ?',[$id]);
        return view('student_update',['users'=>$users]);
    }
    
    public function edit(Request $request, $id)
    {
        $name = $request->student_name;
        DB::update('UPDATE student SET name = ? WHERE id = ?',[$name,$id]);
        echo "Record updated successfully.<br/>";
        echo "<a href='/student_edit'>Click here</a> to go back.";
    }
}
