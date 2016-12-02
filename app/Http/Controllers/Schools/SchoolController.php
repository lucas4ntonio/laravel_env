<?php

namespace App\Http\Controllers\Schools;

use App\School;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class SchoolController extends Controller
{
    protected $prefix = 'Schools\\';
    # VALIDATOR
    protected $name = 'required|max:50';
    protected $location = 'required|max:255';
    
    /*
    |--------------------------------------------------------------------------
    | SHOW SCHOOL TABLE AND INSERT FORM
    |--------------------------------------------------------------------------
    */
    protected function index() {
        $schools = School::all();
        return view($this->prefix.'_school_add',[
            'schools'=>$schools
        ]);
    }
    
    /*
    |--------------------------------------------------------------------------
    | FORM VALIDATOR AND ADD METHOD
    |--------------------------------------------------------------------------
    */
    protected function validator(array $school)
    {
        return Validator::make($school, [
            'name' => $this->name,
            'location' => $this->location
        ]);
    }
    
    protected function add(Request $request)
    {
        $this->validator($request->all())->validate();        
        School::create([
            'name'=>$request->name,
            'location'=>$request->location
        ]);
           
        return $this->redirect();
    }
    
    /*
    |--------------------------------------------------------------------------
    | SHOW FORM TO EDIT AND EDIT METHOD
    |--------------------------------------------------------------------------
    */
    protected function showEditForm($id)
    {
        $school = School::find($id);
        
        return view($this->prefix.'_school_edit',[
            'id'=>$id,
            'name'=>$school->name,
            'location'=>$school->location
        ]);
    }  
    
    protected function edit(Request $request, $id)
    {
        $this->validator($request->all())->validate();
        
        $school = School::find($id);
        $school->name = $request->name;
        $school->location = $request->location;
        $school->save();
        
        return $this->redirect();
    }
    
    /*
    |--------------------------------------------------------------------------
    | DELETE SCHOOL
    |--------------------------------------------------------------------------
    */
    protected function delete($id)
    {
        School::destroy($id);
        
        return $this->redirect();
    }
    
    /*
    |--------------------------------------------------------------------------
    | REDIRECT
    |--------------------------------------------------------------------------
    */
    protected function redirect()
    {
        return redirect(url('/school_add'));
    }
}
