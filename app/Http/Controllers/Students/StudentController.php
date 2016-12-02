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
    protected $name = 'required|max:50';
    protected $email = 'required|max:35';
    protected $phone = 'required|max:8';
    protected $school = 'required|max:50';
    
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
            'email' => $this->email,
            'phone' => $this->name,
            'school' => $this->school
        ]);
    }
        
    public function add(Request $request)
    {
        $this->validator($request->all())->validate();        
        Student::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'school'=>$request->school
        ]);
           
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
        $student->email = $request->email;
        $student->phone = $request->phone;
        $student->school = $request->school;
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