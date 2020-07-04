@extends('layouts.app')

@section('content')
   <div class="container py-5">
       <div class="row justify-content-center py-5">
           <div class="w-100">
            <table class="table">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Customer</th>
                    <th scope="col">Address</th>
                    <th scope="col">Booking</th>
                    <th scope="col">Comments</th>
                    <th scope="col">State</th>
                    <th class="text-center" colspan="2" scope="col">Options</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($bookings as $key => $booking)
                        <tr>
                            <th scope="row">{{$key+1}}</th>
                            <td>{{$booking->customer}}</td>
                            <td>{{$booking->address}}</td>
                            <td>{{$booking->booking}}</td>
                            <td>{{$booking->comments}}</td>
                            <td>@if($booking->state === 0)
                                incomplete
                            @else
                                completed
                            @endif</td>
                            <td>                               
                                <form action="{{route('booking.edit',['booking' => $booking->id])}}" method="GET">
                                    @csrf
                                    <button class="btn btn-primary-outline" style="color:#7ec324;" type="submit"><i class="fas fa-user-edit"></i></button>
                                </form>
                            </td>
                            <td>
                                <form action="{{route('booking.destroy',['booking' => $booking->id])}}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-primary-outline" style="color:#c32424;" type="submit"><i class="fas fa-trash-alt"></i></button>
                                </form>                                
                            </td>
                        </tr>
                    @endforeach
                </tbody>                
            </table>  
            <div class="row justify-content-center">
                {{$bookings->links()}}
            </div>                     
            <div class="row justify-content-center mt-5">
                <div class="col-12 col-md-4 text-center p-0 mt-3">
                    <a href="{{route('booking.create')}}" class="btn btn-primary d-block">Add</a>
                </div>
            </div>            
           </div>            
       </div>
   </div>
@endsection