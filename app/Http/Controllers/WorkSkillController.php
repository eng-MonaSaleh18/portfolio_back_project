<?php

namespace App\Http\Controllers;

use App\Models\WorkSkill;
use Illuminate\Http\Request;

class WorkSkillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $workSkill = WorkSkill::all();
        return response()->json($workSkill);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'skills' => 'required|string'
        ]);
        $workSkill = WorkSkill::create([
            'skills' => $validateData['skills']
        ]);
        return response()->json($workSkill);
    }

    /**
     * Display the specified resource.
     */
    public function show(WorkSkill $workSkill)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, WorkSkill $workSkill)
    {
        $validateData = $request->validate([
            'skills' => 'required|string'
        ]);
        $workSkill->update([
            'skills' => $validateData['skills']
        ]);
        return response()->json([
            "message" => "your work skill was updated"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(WorkSkill $workSkill)
    {
        $workSkill->delete();
        return response()->json([
            "message" => "your work skill was deleted"
        ]);
    }
}
