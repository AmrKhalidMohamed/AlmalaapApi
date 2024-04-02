<?php

namespace App\Http\Controllers;


use App\Models\Rooms;
use Illuminate\Http\Request;

class RoomViewController extends Controller
{
    protected $room;
    public function __construct(){
        $this->room = new Rooms();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $response = Rooms::with('images')->get();
        return view('pages.rooms.index')->with('rooms', $response);
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
        $this->room->create($request->all());
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Rooms $rooms)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $response['room'] = $this->room->find($id);
        return view('pages.rooms.edit')->with($response);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $room = $this->room->find($id);
        $room->update(array_merge($room->toArray(), $request->toArray()));
        return redirect('roomsview');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $room = $this->room->find($id);
        $room->delete();
        return redirect('roomsview');
    }
}
