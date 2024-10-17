<?php

namespace App\Http\Controllers;

use App\Models\MyProject;
use Illuminate\Http\Request;

class MyProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $myProject = MyProject::all();
        return response()->json($myProject);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $validateData = $request->validate([
            'projects' => 'nullable|array',
            'projects.*.project_name' => 'required|string|max:50',
            'projects.*.project_image' => 'required|file|mimes:jpg,jpeg,png,gif|max:1024',
            'projects.*.project_link' => 'required|string'
        ]);
    
        $myProjects = [];
    
        foreach($validateData['projects'] as $index => $project) {
            $imageName = ""; 
    
            if ($request->hasFile('projects.' . $index . '.project_image')) {
                $image = $request->file('projects.' . $index . '.project_image');
                $imageName = time() . '_' . $index . '.' . $image->getClientOriginalExtension(); 
                $image->move(public_path('images'), $imageName);
            }
    
            $new_project = MyProject::create([
                'project_name' => $project['project_name'],
                'project_link' => $project['project_link'],
                'project_image' => $imageName 
            ]);
    
            $myProjects[] = $new_project;
        }
        return response()->json($myProjects);
    }

    /**
     * Display the specified resource.
     */
    public function show(MyProject $myProject)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MyProject $myProject)
    {
        $validateData = $request->validate([
            'project_name' => 'required|string|max:50',
            'project_image' => 'required|file|mimes:jpg,jpeg,png,gif|max:1024',
            'project_link' => 'required|string'
        ]);

        if ($request->hasFile('project_image')) {
            $image = $request->file('project_image');
            $imageName = time() . '.' . $image->getClientOriginalExtension(); 
            $image->move(public_path('images'), $imageName);
        }


        $myProject->update([
            'project_name' => $validateData['project_name'],
            'project_link' => $validateData['project_link'],
            'project_image' => $imageName 
        ]);
        return response()->json([
            "message" => "your project was updated"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MyProject $myProject)
    {
        $myProject->delete();
        return response()->json([
            "message" => "your project was deleted"
        ]);
    }
}
