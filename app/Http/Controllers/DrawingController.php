<?php

namespace App\Http\Controllers;

use App\Models\Drawing;
use Illuminate\Http\Request;

class DrawingController extends Controller
{

    /**
     * Chose whether to create or edit a drawing, if edit, chose a random one
     */
    private $rules;
    public function __construct()
    {
        $this->middleware('auth')->except(['show', 'redirect']);
        $this->middleware('verified')->except(['show', 'redirect']);
    }

    public function redirect(Request $request)
    {
        $var = $request->btnradio;
        if ($var == "btnnew") {
            return view('drawings.drawingForm', compact('var'));
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('drawings.drawingForm');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Drawing  $drawing
     * @return \Illuminate\Http\Response
     */
    public function show(Drawing $drawing)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Drawing  $drawing
     * @return \Illuminate\Http\Response
     */
    public function edit(Drawing $drawing)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Drawing  $drawing
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Drawing $drawing)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Drawing  $drawing
     * @return \Illuminate\Http\Response
     */
    public function destroy(Drawing $drawing)
    {
        //
    }
}
