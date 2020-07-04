<?php

namespace App\Http\Controllers;

use App\Booking;
use Carbon\Carbon;
use Illuminate\Auth\Middleware\Authorize;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {   
        //get all bookings of the user
        $bookings = Booking::where('user_id',Auth::user()->id)
        ->orderBy('booking','desc')
        ->paginate(7);

        return view('bookings.index',compact('bookings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bookings.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        //date cannot be before of today
        $today = Carbon::now();

        //validation
        $data = $request->validate([
            'customer' => 'required',
            'address' => 'required|min:5',
            'booking' => 'required|after:today',
            'comment' => ''
        ]);
        
        //add new booking
        auth()->user()->bookings()->create([
            'customer' => $data['customer'],
            'address' => $data['address'],
            'booking' => $data['booking'],
            'comments' => $data['comment']
        ]);

        return redirect()-> action('BookingController@index');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function show(Booking $booking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function edit(Booking $booking)
    {   
        //policy
        $this->authorize('update',$booking);

        $fecha = Carbon::parse($booking->booking);
        $booking->booking = $fecha->format('Y-m-d\TH:i:s');
        return view('bookings.edit',compact('booking'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Booking $booking)
    {   

        //policy
        $this->authorize('update',$booking);

        //at least the last date
        $firstDate = $booking->booking;

        //validation
        $data = $request->validate([
            'customer' => 'required',
            'address' => 'required|min:5',
            'booking' => 'required|after:firstDate',
            'comments' => ''
        ]);
        
        //new data
        $booking->customer = $data['customer'];
        $booking->address = $data['address'];
        $booking->booking = $data['booking'];
        $booking->comments = $data['comments'];

        //state format
        if($request->state){
            $booking->state = 1;
        }
        else{
            $booking->state = 0;
        }
        
        //save new data
        $booking->save();

        //redirect to bookings page
        return redirect()->action('BookingController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function destroy(Booking $booking)
    {   
        //policy
        $this->authorize('delete',$booking);

        //delete booking
        $booking->delete();

        //return data
        return redirect()->action('BookingController@index');
    }
}
