<?php
namespace App\Http\Controllers\Students;

use App\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{    
    protected $prefix = 'Students\\';
    # VALIDATOR
    protected $name = 'required|max:25';
    
    /*
    |--------------------------------------------------------------------------
    | SHOW STUDENT TABLE AND INSERT FORM
    |--------------------------------------------------------------------------
    */
    public function index()
    {
        $students = Student::all();
        return view($this->prefix.'_student_add',['students'=>$students]);
    }
    
    /*
    |--------------------------------------------------------------------------
    | FORM VALIDATOR AND ADD METHOD
    |--------------------------------------------------------------------------
    */
    public function validator(array $student)
    {
        return Validator::make($student, [
            'name' => $this->name,
        ]);
    }
        
    public function add(Request $request)
    {
        $this->validator($request->all())->validate();        
        Student::create(
                ['name'=>$request->name]
        );
           
        return $this->redirect();
    }
    
    /*
    |--------------------------------------------------------------------------
    | DELETE STUDENT
    |--------------------------------------------------------------------------
    */
    public function delete($id)
    {
        Student::destroy($id);
        
        return $this->redirect();
    }
    
    /*
    |--------------------------------------------------------------------------
    | SHOW FORM TO EDIT AND EDIT METHOD
    |--------------------------------------------------------------------------
    */
    public function showEditForm($id)
    {
        $student = Student::find($id);
        
        return view($this->prefix.'_student_edit',[
            'name'=>$student->name,'id'=>$id
        ]);
    }  
    
    public function edit(Request $request, $id)
    {
        $this->validator($request->all())->validate();
        
        $student = Student::find($id);
        $student->name = $request->name;
        $student->save();
        
        return $this->redirect();
    }
    
    /*
    |--------------------------------------------------------------------------
    | REDIRECT
    |--------------------------------------------------------------------------
    */
    public function redirect()
    {
        return redirect(url('/student_add'));
    }
}