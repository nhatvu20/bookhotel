<?php

namespace App\Http\Controllers;

use App\Models\Rooms;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class RoomsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('rooms.index', ['rooms' => Rooms::paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $roomtypes=['standard','deluxe','suite'];
        $availabilities=['available','occupied','under maintenance'];
        // return view("rooms.create",compact('roomtypes','availabilities'));
        return view("rooms.create",["roomtypes" => $roomtypes, "availabilities" => $availabilities]);
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
        $request->validate([
            'roomnumber' => "required",
        ]);

        $roomnumber = $request->input('roomnumber');
        $roomtype = $request->input('roomtype');
        $availability = $request->input('availability');

        DB::table('rooms')->insert([
            'roomnumber' => $roomnumber,
            'roomtype' => $roomtype,
            'availability' => $availability,
        ]);
        return redirect()->route('rooms.index')->with('success', 'Thêm phòng thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  Rooms  $room
     * @return \Illuminate\Http\Response
     */
    public function show($room)
    {
        $room = Rooms::find($room);
        return view("rooms.show",["room" => $room]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Rooms  $room
     * @return \Illuminate\Http\Response
     */
    public function edit(Rooms $room)
    {
        //
        $roomtypes=['standard','deluxe','suite'];
        $availabilities=['available','occupied','under maintenance'];
        return view("rooms.edit",["room" => $room, "roomtypes" => $roomtypes, "availabilities" => $availabilities]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Rooms  $room
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Rooms $room)
    {
        //
        $request->validate([
            "roomnumber" => "required",
            "roomtype" => "required",
            "availability" => "required",
        ]);

        $roomnumber = $request->input("roomnumber");
        $roomtype = $request->input("roomtype");
        $availability = $request->input("availability");
        $room->update([
            'roomnumber' => $roomnumber,
            'roomtype' => $roomtype,
            'availability' => $availability,
        ]);
        return redirect()->route('rooms.index')->with('success', 'Sửa phòng thành công');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Rooms $room
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rooms $room)
    {
        //
        $room->delete();
        return redirect()->route('rooms.index')->with('success', 'Xóa phòng thành công');
    }
}
