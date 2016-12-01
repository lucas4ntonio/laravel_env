<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function __construct() 
    {
        $this->middleware('Second');
    }
    
    public function showPath(Request $request)
    {
        $uri = $request->path();
        $url = $request->url();
        $method = $request->method();
        
        echo '<br/>URI: '.$uri;
        echo '<br/>URL: '.$url;
        echo '<br/>METHOD: '.$method;
    }
}
