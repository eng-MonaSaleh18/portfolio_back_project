<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use Illuminate\Http\Request;

class CertificateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $certificate = Certificate::all();
        return response()->json($certificate );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData =  $request->validate([
            'certificate_image' => 'required|file|mimes:jpg,jpeg,png,gif|max:1024'
        ]);
        if ($request->hasFile('certificate_image')) {
            $image = $request['certificate_image'];
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images') , $imageName );
        }
        
        $certificate = Certificate::create([
            'certificate_image' => $imageName
        ]);
        return response()->json($certificate);
    }

    /**
     * Display the specified resource.
     */
    public function show(Certificate $certificate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Certificate $certificate)
    {
        $validateData =  $request->validate([
            'certificate_image' => 'required|file|mimes:jpg,jpeg,png,gif|max:1024'
        ]);
        if ($request->hasFile('certificate_image')) {
            $image = $request['certificate_image'];
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images') , $imageName );
        }
        $certificate->update([
            'certificate_image' => $imageName
        ]);
        return response()->json([
            "message" => "the Certificate was updated" 
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Certificate $certificate)
    {
        $certificate->delete();
        return response()->json([
            "message" => "the Certificate was deleted" 
        ]);
    }
}
