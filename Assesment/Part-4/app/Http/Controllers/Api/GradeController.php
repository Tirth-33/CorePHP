<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Grade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class GradeController extends Controller
{
    public function index(Request $request)
    {
        $student = $request->user();
        
        // Log access attempt
        Log::info('Grade access attempt', [
            'student_id' => $student->id,
            'ip' => $request->ip(),
            'user_agent' => $request->userAgent()
        ]);

        $query = Grade::where('student_id', $student->id)
            ->with('subject');

        // Custom ordering
        if ($request->has('sort_by')) {
            $sortBy = $request->sort_by;
            $sortOrder = $request->get('sort_order', 'asc');
            
            if (in_array($sortBy, ['grade', 'semester', 'created_at'])) {
                $query->orderBy($sortBy, $sortOrder);
            }
        }

        // Custom pagination
        $perPage = min($request->get('per_page', 10), 50);
        $grades = $query->paginate($perPage);

        return response()->json([
            'data' => $grades->items(),
            'pagination' => [
                'current_page' => $grades->currentPage(),
                'per_page' => $grades->perPage(),
                'total' => $grades->total(),
                'last_page' => $grades->lastPage()
            ]
        ]);
    }

    public function show(Request $request, $id)
    {
        $student = $request->user();
        
        $grade = Grade::with('subject')->findOrFail($id);
        
        // Security check - prevent access to other students' data
        if ($grade->student_id !== $student->id) {
            Log::warning('Unauthorized grade access attempt', [
                'student_id' => $student->id,
                'attempted_grade_id' => $id,
                'grade_owner_id' => $grade->student_id,
                'ip' => $request->ip()
            ]);
            
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        return response()->json($grade);
    }
}