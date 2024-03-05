<?php

namespace App\Http\Controllers;

use App\Models\Foateer_details;
use Illuminate\Http\Request;
USE App\Models\Foateer;
use App\Models\Foateer_attachments;

class FoateerDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Foateer_details $foateer_details)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $foateer = Foateer::where('id', $id)->first();
        $details = Foateer_details::where('id_foateer', $id)->get();
        $attachments = Foateer_attachments::where('foateer_id', $id)->get();
       
        return view('foatter.detailsfoateer', compact('foateer','details','attachments'));

    }
    
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Foateer_details $foateer_details)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Foateer_details $foateer_details)
    {
        //
    }
}
