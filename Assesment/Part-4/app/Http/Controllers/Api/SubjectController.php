<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function index(Request $request)
    {
        $student = $request->user();
        
        // Get subjects for which the student has grades
        $subjects = Subject::whereHas('grades', function($query) use ($student) {
            $query->where('student_id', $student->id);
        })->get();

        return response()->json($subjects);
    }
}