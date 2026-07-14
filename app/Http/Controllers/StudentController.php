<?php
namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    // 1. READ - Sab students ki list
    public function index()
    {
        $students = Student::latest()->paginate(10); // 10-10 karke dikhayega
        return view('students.index', compact('students'));
    }

    // 2. CREATE - Form dikhana
    public function create()
    {
        return view('students.create');
    }

    // 3. STORE - Form submit hoke DB me save
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:students',
            'phone' => 'required',
            'dob' => 'required|date'
        ]);

        Student::create($request->all());
        return redirect()->route('students.index')->with('success','Student add ho gaya!');
    }

    // 4. EDIT - Edit form dikhana
    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }

    // 5. UPDATE - Update karke save
    public function update(Request $request, Student $student)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:students,email,'.$student->id,
            'phone' => 'required',
            'dob' => 'required|date'
        ]);

        $student->update($request->all());
        return redirect()->route('students.index')->with('success','Student update ho gaya!');
    }

    // 6. DELETE
    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('students.index')->with('success','Student delete ho gaya!');
    }
}
