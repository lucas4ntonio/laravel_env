<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ImplicitController extends Controller
{
    // responds to requests to GET /test
    public function getIndex()
    {
        echo "index method";
    }
    
    // responds to requests to GET /test/show/1
    public function getShow($id)
    {
        echo "show method";
    }
    
    // responds to requests to GET /test/admin-profile
    public function getAdminProfile()
    {
        echo "admin profile method";
    }
    
    // responds to requests to POST /test/profile
    public function postProfile()
    {
        echo "profile method";
    }
}
