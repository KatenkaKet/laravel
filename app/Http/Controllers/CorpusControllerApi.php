<?php

namespace App\Http\Controllers;

use App\Models\Corpus;
use Illuminate\Http\Request;

class CorpusControllerApi extends Controller
{
    /**
     * Display a listing of the resource.
     */
//    public function index(Request $request)
//    {
//        return response(Corpus::limit($request->perpage ?? 5)->offset(($request->perpage ?? 5)* ($request->page ?? 0))->get());
//    }

    public function index(Request $request) {
        $perPage = $request->input('per_page', 5);
        $page = $request->input('page', 0);
        $offset = $perPage * $page;
        return response(Corpus::limit($perPage)->offset($offset)->get());
    }


    public function total()
    {
        return response(Corpus::all()->count());
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
