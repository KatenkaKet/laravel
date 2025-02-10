<?php

namespace App\Http\Controllers;

use App\Models\Corpus;
use Illuminate\Http\Request;

class CorpusControllerApi extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response(Corpus::all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return response(Corpus::find($id));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
