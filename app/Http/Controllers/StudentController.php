<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    // GET all students
    public function index()
    {
        return Student::all();
    }

    // GET one student by ID
    public function show($id)
    {
        return Student::find($id);
    }

    // POST create student
    public function store(Request $request)
    {
        $student = Student::create([
            'name' => $request->name,
            'course' => $request->course,
            'age' => $request->age,
        ]);

        return response()->json([
            'message' => 'Student added successfully',
            'data' => $student
        ]);
    }

    // PUT update student
    public function update(Request $request, $id)
    {
        $student = Student::find($id);

        $student->update([
            'name' => $request->name,
            'course' => $request->course,
            'age' => $request->age,
        ]);

        return response()->json([
            'message' => 'Student updated successfully',
            'data' => $student
        ]);
    }

    // PATCH partial update
    public function patch(Request $request, $id)
    {
        $student = Student::find($id);

        if ($request->has('name')) {
            $student->name = $request->name;
        }

        if ($request->has('course')) {
            $student->course = $request->course;
        }

        if ($request->has('age')) {
            $student->age = $request->age;
        }

        $student->save();

        return response()->json([
            'message' => 'Student patched successfully',
            'data' => $student
        ]);
    }

    // DELETE one student
    public function destroy($id)
    {
        $student = Student::find($id);

        $student->delete();

        return response()->json([
            'message' => 'Student deleted successfully'
        ]);
    }

    // DELETE all students
    public function destroyAll()
    {
        Student::truncate();

        return response()->json([
            'message' => 'All students deleted successfully'
        ]);
    }
}