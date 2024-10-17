<?php

namespace App\Http\Controllers;

use App\Models\EducationLevel;
use Illuminate\Http\Request;

class EducationLevelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $educationLevelData = EducationLevel::all();
        return response()->json($educationLevelData);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'college_name' => 'required|string|max:255',
            'department_name' => 'required|string|max:255',
            'graduation_date' => 'required|date'
        ]);
        $educationLevelData = EducationLevel::create([
            'college_name' => $validateData['college_name'],
            'department_name' => $validateData['department_name'],
            'graduation_date' => $validateData['graduation_date'],
        ]);
        return response()->json($educationLevelData );
    }

    /**
     * Display the specified resource.
     */
    public function show(EducationLevel $educationLevel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, EducationLevel $educationLevel)
    {
        $validateData = $request->validate([
            'college_name' => 'required|string|max:255',
            'department_name' => 'required|string|max:255',
            'graduation_date' => 'required|date'
        ]);
        $educationLevel->update([
            'college_name' => $validateData['college_name'],
            'department_name' => $validateData['department_name'],
            'graduation_date' => $validateData['graduation_date'],
        ]);
        return response()->json([
            "message" => "The Educational level was updated"
        ]  , 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EducationLevel $educationLevel)
    {
        $educationLevel->delete();
        return response()->json([
            "message" => "The Educational level was Deleted"
        ]  , 201);
    }
}
