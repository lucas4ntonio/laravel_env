<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use app\Http\Requests;
use App\Http\Controllers\Controller;

class MyController extends Controller
{
    // GET
    public function index()
    {
        echo "index";
    }
    
    // GET
    public function create()
    {
        echo "create";
    }
    
    // POST -- REQUEST
    public function store (Request $request)
    {
        echo "store";
    }
    
    // GET
    public function show ($id)
    {
        echo "show";
    }
    
    // GET
    public function edit ($id)
    {
        echo "edit";
    }
    
    // PUT/PATCH -- REQUEST
    public function update (Request $request, $id)
    {
        echo "update";
    }
    
    // DELETE
    public function destroy ($id)
    {
        echo "destroy";
    }
}