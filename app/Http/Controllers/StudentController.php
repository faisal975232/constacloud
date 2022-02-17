<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use DB;
use Yajra\DataTables\DataTables;
use Storage;

class StudentController extends Controller
{
    public function liststudents(Request $request)
    {
        return view("students");
    }

    public function create(Request $request)
    {
         $validatedData = $request->validate([
            'name' => 'required',
            'roll' => 'required|min:6|unique:students,rollno',
            'class' => 'required'
        ], [
            'name.required' => 'Name is required',
            'rollno.required' => 'Roll No is required',
            'class.required' => 'Class  is required'
        ]);

        if ($request->file('upload_file')) {

            $ext = $request->file('upload_file')->getClientOriginalExtension();

            $filename = time() . "." . $ext;

            $path = $request->file('upload_file')->storeAs(
                'public',
                $filename
            );;

            $student = Student::create([
                "name" => $request->name,
                "rollno" => $request->roll,
                "class" => $request->class,
                "maths" => $request->math,
                "end" => $request->eng,
                "science" => $request->science,
                "hindi" => $request->hindi,
                "urdu" => $request->urdu,
                'image' => $filename
            ]);
        } else {
            $student = Student::create([
                "name" => $request->name,
                "rollno" => $request->roll,
                "class" => $request->class,
                "maths" => $request->math,
                "end" => $request->eng,
                "science" => $request->science,
                "hindi" => $request->hindi,
                "urdu" => $request->urdu,

            ]);
        }
        return back()->with('success', 'Succesfully Added');
    }

    // apicontroller
    public function apistudent()
    {
        $student = Student::select('name as student_name', 'rollno', 'image', 'class', DB::raw("maths + end + hindi + urdu + science as total_score"))->orderBy('total_score', 'DESC')->get();

        return $student;
    }

    // tableajaxcontroller
    public function students()
    {
        $student = Student::get();
        return Datatables::of($student)->make(true);
    }
}
