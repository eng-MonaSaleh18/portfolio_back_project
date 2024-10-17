<?php

namespace App\Http\Controllers;

use App\Models\AboutMeInformation;
use Illuminate\Http\Request;

class AboutMeInformationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $aboutMeInformation = AboutMeInformation::all();
        return response()->json($aboutMeInformation);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'about_me' => "required|string",
            'what_i_do' => "required|string",
        ]);
        $aboutMeInformation = AboutMeInformation::create([
            'about_me' => $validateData['about_me'],
            'what_i_do' => $validateData['what_i_do']
        ]);
        return response()->json($aboutMeInformation);
    }

    /**
     * Display the specified resource.
     */
    public function show(AboutMeInformation $aboutMeInformation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AboutMeInformation $aboutMeInformation)
    {
        $validateData = $request->validate([
            'about_me' => "required|string",
            'what_i_do' => "required|string",
        ]);
        $aboutMeInformation->update([
            'about_me' => $validateData['about_me'],
            'what_i_do' => $validateData['what_i_do']
        ]);
        return response()->json([
            'message' => 'THe Aboutme Informations was updated'
        ] , 201 );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AboutMeInformation $aboutMeInformation)
    {
        $aboutMeInformation->delete();
        return response()->json([
            'message' => 'THe Aboutme Informations was deleted'
        ] , 201 );
    }
}
