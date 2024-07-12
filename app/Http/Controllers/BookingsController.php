<?php

namespace App\Http\Controllers;
use App\Models\Customers;
use App\Models\Rooms;
use Illuminate\Support\Facades\DB;
use App\Models\Bookings;
use Illuminate\Http\Request;

class BookingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('bookings.index', ['bookings' => Bookings::paginate(10)]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $customers = Customers::all();
        $rooms = Rooms::all();
        return view("bookings.create", ["customers" => $customers, "rooms" => $rooms]);

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
        $input = $request->all();
        $request->validate([
            'customerid' => "required",
            'roomid' => "required",
        ]);



        DB::table('bookings')->insert([
            'customerid'=>$input["customerid"],
            'roomid'=>$input["roomid"],
            'checkindate'=>$input["checkindate"],
            'checkoutdate'=>$input["checkoutdate"],
        ]);
        return redirect()->route('bookings.index')->with('success', 'Thêm đặt phòng thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $bookings = Bookings::find($id);
        return view("bookings.show", ["bookings"=>$bookings]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $bookings = Bookings::find($id);
        $customers = Customers::all();
        $rooms = Rooms::all();
        return view("bookings.edit", ["customers" => $customers, "rooms" => $rooms, "bookings"=>$bookings]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $booking = Bookings::find($id);
        $input = $request->all();
        $request->validate([
            'customerid' => "required",
            'roomid' => "required",
        ]);



        $booking->update([
            'customerid'=>$input["customerid"],
            'roomid'=>$input["roomid"],
            'checkindate'=>$input["checkindate"],
            'checkoutdate'=>$input["checkoutdate"],
        ]);
        return redirect()->route('bookings.index')->with('success', 'Sửa đặt phòng thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //'
        $booking = Bookings::find($id);
        $booking->delete();
        return redirect()->route('bookings.index')->with('success', 'Xóa phòng thành công');
    }
}
