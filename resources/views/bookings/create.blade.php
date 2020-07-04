@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-5 shadow ">
                <div class="card-header text-center bg-info text-white">
                    <h2>Adding New Booking</h2>
                </div>

                <div class="card-body">
                    <form 
                        method="POST" 
                        action="{{route('booking.store')}}"
                        novalidate 
                    >
                        @csrf

                        <div class="form-group row">
                            <label for="customer" class="col-md-4 col-form-label text-md-right">Customer</label>

                            <div class="col-md-6">
                                <input 
                                    id="customer" 
                                    type="text"
                                     class="form-control 
                                     @error('customer') is-invalid @enderror" 
                                     name="customer" 
                                     value="{{ old('customer') }}" 
                                     autocomplete="customer"
                                     autofocus
                                >

                                @error('customer')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">Address</label>

                            <div class="col-md-6">
                                <input 
                                    id="address" 
                                    type="text"
                                     class="form-control 
                                     @error('address') is-invalid @enderror" 
                                     name="address" 
                                     value="{{ old('address') }}" 
                                     required 
                                     autocomplete="address"
                                     autofocus
                                >

                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="booking" class="col-md-4 col-form-label text-md-right">Booking</label>

                            <div class="col-md-6">
                                <input 
                                    id="booking" 
                                    type="datetime-local"
                                    class="form-control 
                                    @error('booking') is-invalid @enderror" 
                                    name="booking" 
                                    value="{{ old('booking') }}" 
                                    required 
                                    autocomplete="booking"
                                    autofocus
                                >

                                @error('booking')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="comment" class="col-md-4 col-form-label text-md-right">Any Comment</label>

                            <div class="col-md-6">
                                <textarea 
                                    class="form-control" 
                                    id="comment" 
                                    name="comment"
                                    rows="4"
                                    value="{{ old('comment') }}"
                                ></textarea>
                                @error('comments')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary w-100">
                                    Add Booking
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection