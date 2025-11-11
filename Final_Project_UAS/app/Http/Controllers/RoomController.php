<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $rooms = Room::all();
        return view('rooms.index', compact('rooms'));
    }

    public function create()
    {
        this->authorize('manage-rooms');
        return view('rooms.create');
    }

    public function store(Request $request)
    {
        $this->authorize('manage-rooms');

        $request->validate([
            'name' => 'required|string|max:255',
            'capacity' => 'nullable|integer|min:0',
            'location' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:available,maintenance'
        ]);

        Room::create($request->all());
        return redirect()->route('rooms.index')->with('success', 'Room created successfully.');
    }

    public function edit(Room $room)
    {
        $this->authorize('manage-rooms');
        return view('rooms.edit', compact('room'));
    }

    public function update(Request $request, Room $room)
    {
        $this->authorize('manage-rooms');

        $request->validate([
            'name' => 'required|string|max:255',
            'capacity' => 'nullable|integer|min:0',
            'location' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:available,maintenance'
        ]);

        $room->update($request->all());
        return redirect()->route('rooms.index')->with('success', 'Ruangan berhasil diperbarui.');
    }

    public function destroy(Room $room)
    {
        $this->authorize('manage-rooms');
        $room->delete();
        return redirect()->route('rooms.index')->with('success', 'Ruangan berhasil dihapus.');

    }
}