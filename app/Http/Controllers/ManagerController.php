<?php

namespace App\Http\Controllers;

use App\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class ManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        //return initial view when manager is login
        return view('manager.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {   
        //find the booking to update
        $booking = Booking::find($id);
        $booking->customer = $request['customer'];
        $booking->address = $request['address'];
        if($request['booking'] != null){
            $booking->booking = $request['booking'];
        }
        $booking->comments = $request['comments'];
        $booking->state = $request['state'];

        $booking->save();

        return response()->json($booking);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //delete a booking
    public function destroy($id)
    {
        
        //find the booking to delete
        $booking = Booking::find($id);
        $booking->delete();

        return response()->json($id);
    }

    //list gafa users
    public function listusers(){

        //return all users and bookings
        $users = User::with('bookings')->get();        
        return response()->json($users);
    }

    //list bookings of a user
    public function listbookings(User $user){

        //return booking of a user
        $bookings = Booking::where('user_id',$user->id)->get();
        return response()->json($bookings);
    }
    

    public function prueba(){

        $users = Auth::user();
        return response()->json($users);
    }

    
}
