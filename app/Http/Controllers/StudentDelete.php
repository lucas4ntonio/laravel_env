<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class StudentDelete extends Controller
{
    public function index ()
    {
        $users = DB::select('SELECT * FROM student');
        return view ('student_delete_view',['users'=>$users]);
    }
    
    public function destroy ($id)
    {
        DB::delete('DELETE FROM student WHERE id = ?',[$id]);
        echo 'Record deleted successfully.<br/>';
        echo '<a href="/student_delete_view">Click here</a> to go back.';
    }
}
