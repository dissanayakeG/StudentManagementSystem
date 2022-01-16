<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentRequest;
use App\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function store(StudentRequest $request)
    {
        $request = $request->all();
        $saveData = [
            'first_name' => $request['first_name'],
            'last_name' => $request['last_name'],
            'email' => $request['email'],
        ];
        $student = Student::create($saveData);
        return $this->apiResponse($student, 200);
    }

    public function index()
    {
        $student = Student::paginate(10);
        return response()->json($student, 200);
    }

    public function getStudentById($id)
    {
        $student = Student::find($id);
        return response()->json($student, 200);

    }

    public function update(StudentRequest $request, $id)
    {
        $request = $request->all();
        $student = Student::where('id', $id)->first();
        $student['first_name'] = $request['first_name'];
        $student['last_name'] = $request['last_name'];
        $student['email'] = $request['email'];
        $student->save();
        return response()->json($student, 200);
    }

    public function delete($id)
    {
        $student = Student::find($id)->delete();
        return response()->json($student, 200);
    }
}
