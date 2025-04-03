<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomControllerApi extends Controller
{
    public function index(Request $request) {
        $perPage = $request->input('per_page', 5);
        $page = $request->input('page', 0);
        $offset = $perPage * $page;
        return response(Room::limit($perPage)->offset($offset)->get());
    }


    public function total()
    {
        return response(Room::count());
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
        return response(Room::find($id));
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
