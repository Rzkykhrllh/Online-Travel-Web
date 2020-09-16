@extends('layouts.success')

@section('title',"Checkout Success")
    
@section('content')    
    <main>
        <div class="section-success d-flex align-items-center">
            <div class="col text-center">
                <img src="{{ url('frontend/images/ic_mail.png') }} ">
                <h1>Yay! Success</h1>
                <p>please read it as well</p>
                <a href="{{ url('/') }}" class="btn btn-homepage mt-3 px-5">Homepage</a>
            </div>
        </div>
    </main>
@endsection