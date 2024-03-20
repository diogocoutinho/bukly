<?php

namespace App\Http\Controllers\Hotel\Room;

use App\Http\Controllers\Controller;
use App\Http\Requests\Hotel\Room\StoreRoomFormRequest;
use App\Http\Requests\Hotel\Room\UpdateRoomFormRequest;
use App\Models\Hotel\Room\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('hotel.room.index', [
            'rooms' => Room::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('hotel.room.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRoomFormRequest $request)
    {
        try {
            $room = Room::create($request->all());
            return redirect()->route('rooms.show', $room->id);
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('hotel.room.show', [
            'room' => Room::findOrFail($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('hotel.room.edit', [
            'room' => Room::findOrFail($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRoomFormRequest $request, string $id)
    {
        try {
            $room = Room::findOrFail($id);
            $room->update($request->all());
            return redirect()->route('rooms.show', $room->id);
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            Room::findOrFail($id)->delete();
            return redirect()->route('hotels.rooms.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
        }
    }
}
