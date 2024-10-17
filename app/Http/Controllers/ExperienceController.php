<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $experience = Experience::all();
        return response()->json($experience);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'experiences' =>'nullable|array',
            'experiences.*.experience_name' => "required|string",
            'experiences.*.experience_date' => "required|string",
        ]);
        
        $experiences = $experience = [];
        $count = 0 ;
        foreach($validatedData['experiences'] as $item){
            $experiences[$count]['experience_name'] = $item['experience_name'];
            $experiences[$count++]['experience_date'] = $item['experience_date'];
            $new_experience = Experience::create([
                'experience_name' => $item['experience_name'],
                'experience_date' => $item['experience_date']
            ]);
            $experience[]= $new_experience;
        }
        
        return response()->json($experience);
    }

    /**
     * Display the specified resource.
     */
    public function show(Experience $experience)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Experience $experience)
    {
        $validateData = $request->validate([
            'experience_name' => "required|string",
            'experience_date' => "required|string"
        ]);

        $experience->update([
            'experience_name' => $validateData['experience_name'],
            'experience_date' => $validateData['experience_date']
        ]);
        return response()->json([
            'message' => 'The Experiences was updated'
        ] , 201 );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Experience $experience)
    {
        $experience->delete();
        return response()->json([
            'message' => 'The Experiences was Deleted'
        ] , 201 );
    }
}
