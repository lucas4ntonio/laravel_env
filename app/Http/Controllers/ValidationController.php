<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ValidationController extends Controller
{
    public function showForm ()
    {
        return view('login');
    }
    
    public function validateForm (Request $request)
    {
        print_r($request->all());
        $this->validate($request, [
            'username'=>'required|max:8',
            'password'=>'required'
        ]);
    }
}
