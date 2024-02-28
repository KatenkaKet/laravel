<?php

namespace App\Http\Controllers;

use App\Models\corpus_model;
use Illuminate\Http\Request;

class CorpusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('corpuses', [
            'corpuses'=>corpus_model::all()
            ]);
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
    public function show(string $id)
    {
        return view('corpus', [
            'corpus'=>corpus_model::all()->where('id', $id)->first
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
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
