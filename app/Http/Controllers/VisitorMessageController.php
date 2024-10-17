<?php

namespace App\Http\Controllers;

use App\Models\VisitorMessage;
use Illuminate\Http\Request;

class VisitorMessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $visitorMessage = VisitorMessage::all();
        return response()->json($visitorMessage);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'visitor_name' => 'required|string|max:50',
            'visitor_email' => 'required|email',
            'visitor_message' => 'required|string',
        ]);
        $visitorMessage = VisitorMessage::create([
            'visitor_name' => $validateData['visitor_name'],
            'visitor_email' => $validateData['visitor_email'],
            'visitor_message' => $validateData['visitor_message'],
        ]);
        return response()->json($visitorMessage);
    }

    /**
     * Display the specified resource.
     */
    public function show(VisitorMessage $visitorMessage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, VisitorMessage $visitorMessage)
    {
        $validateData = $request->validate([
            'visitor_name' => 'required|string|max:50',
            'visitor_email' => 'required|email',
            'visitor_message' => 'required|string',
        ]);
        $visitorMessage->update([
            'visitor_name' => $validateData['visitor_name'],
            'visitor_email' => $validateData['visitor_email'],
            'visitor_message' => $validateData['visitor_message'],
        ]);
        return response()->json([
            "message" => "the message was updated"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(VisitorMessage $visitorMessage)
    {
        $visitorMessage->delete();
        return response()->json([
            "message" => "the message was deleted"
        ]);
    }
}
