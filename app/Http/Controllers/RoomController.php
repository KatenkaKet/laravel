<?php

namespace App\Http\Controllers;

use App\Models\Corpus;
use App\Models\Guest;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use function Laravel\Prompts\table;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $perpage = $request->perpage ?? 2;
        return view('rooms', [
            'rooms' => Room::paginate($perpage)->withQueryString()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('room_create', [
            'corpuses' =>Corpus::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
           'corpus_id' => 'integer',
           'room_number' => [
               'required',
               'integer',
               'gt:0',
               Rule::unique('rooms')->where(function ($query) use ($request) {
                   return $query->where('corpus_id', $request->corpus_id);
               })
           ],
           'bed_number' => 'required|integer|gt:0',
           'price' => 'required|integer|gt:0'
        ]);
        $room = new Room($validated);
        $room->save();
        return redirect('/room');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('room', [
            'room'=>Room::all()->where('id', $id)->first()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('room_edit', [
            'room' => Room::all()->where('id', $id)->first(),
            'corpuses' => Corpus::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'corpus_id' => 'integer',
            'room_number' => [
                'required',
                'integer',
                'gt:0',
                Rule::unique('rooms')->where(function ($query) use ($request) {
                    return $query->where('corpus_id', $request->corpus_id);
                })
            ],
            'bed_number' => 'required|integer|gt:0',
            'price' => 'required|integer|gt:0'
        ]);
        $room = Room::all()->where('id', $id)->first();
        $room->corpus_id = $request->input('corpus_id');
        $room->room_number = $request->input('room_number');
        $room->bed_number = $request->input('bed_number');
        $room->price = $request->input('price');
        $room->update();
        return redirect('/room');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if(! Gate::allows('destroy-room', Room::all()->where('id', $id)->first())){
            return redirect('/error')->with('message',
            'У вас нет разрешения на удаление товара номер ' . $id);
        }

        Room::destroy($id);
        return redirect('/room');
    }
}
