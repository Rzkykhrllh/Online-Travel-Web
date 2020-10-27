@extends("layouts.app")

@section("title","Detail Travel")

@section("content")

    <main>
        <section class="main section-details-header">
        </section>

        <section class="section-details-content">
            <div class="container">
                <div class="row">
                    <div class="col p-0">
                        <nav>
                            <ol class="breadcrumb"> 
                                <li class="breadcrumb-item">
                                <a href="{{ route('home')}}" class="breadcrumb-item" style="color: #071c4D">Paket Travel</a>
                                </li>
                                <li class="breadcrumb-item active">
                                    <a href="#xzoom-default" class="breadcrumb-item active">Details</a>
                                </li>
                            </ol>
                        </nav>

                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-8 pl-lg-8">
                        <div class="card card-details">
                            <h1>{{$travel->title}}</h1>
                            <p>{{$travel->location}}</p>

                           @if ($travel->galleries->count())
                           <div class="gallery">
                            <div class="xzoom-container">
                                <img 
                                    src="{{Storage::url($travel->galleries->first()->image)}}" 
                                    alt=""
                                    class="xzoom"
                                    id="xzoom-default"
                                    xoriginal="{{Storage::url($travel->galleries->first()->image)}}">
                            </div>

                            <div class="xzoom-thumbs">

                                <!-- a href itu buat di zoomnya
                                img src itu buat thumbanilnya
                                img xpreview itu buat gambar yg ditampilin diatas -->
                                @foreach ($travel->galleries as $item)
                                    <a href={{Storage::url($item->image)}}">
                                        <img 
                                            src="{{Storage::url($item->image)}}"
                                            class="xzoom-gallery"
                                            width="126"
                                            xpreview="{{Storage::url($item->image)}}">
                                    </a>
                                @endforeach

                            </div>
                        </div>
                               
                           @endif


                            <h2>Tentang Wisata</h2>
                            <p>{{$travel->about}}
                            </p>

                            <div class="row features">
                                <div class="col-md-4">
                                    <div class="description">
                                        <img src="{{url('frontend/images/ic_ticket.png')}}" alt="" class="features-image">
                                        <div class="description">
                                            <h3>Featured Event</h3>
                                        <p>{{$travel->featured_event}}</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="description border-left">
                                        <img src="{{url('frontend/images/ic_language.png')}}" alt="" class="features-image">
                                        
                                        <div class="description">    
                                            <h3>Lenguage</h3>
                                            <p>{{$travel->language}}</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="description border-left">
                                        <img src="{{url('frontend/images/ic_foods.png')}}" alt="" class="features-image">
                                        <div class="description">
                                            <h3>Food</h3>
                                        <p>{{$travel->foods}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="card card-details card-right">
                            <h2>Members are going</h2>
                            <div class="members my-2">
                                <img src="{{url('frontend/images/member1.png')}}" alt="#" class="member-image mr-1">
                                <img src="{{url('frontend/images/member2.png')}}" alt="#" class="member-image mr-1">
                                <img src="{{url('frontend/images/member3.png')}}" alt="#" class="member-image mr-1">
                                <img src="{{url('frontend/images/member4.png')}}" alt="#" class="member-image mr-1">
                            </div>
                            <hr>
                            <h2>Trip Information</h2>
                            <table class="trip-information">
                                <tr>
                                    <th width=50%>Date of Departure</th>
                                    <td width=50% class="text-right">{{$travel->departure_date}}</td>
                                </tr>
                                <tr>
                                    <th width=50%>Duration</th>
                                    <td width=50% class="text-right">{{$travel->duration}}</td>
                                </tr>
                                <tr>
                                    <th width=50%>Type</th>
                                    <td width=50% class="text-right">{{$travel->type}}</td>
                                </tr>
                                <tr>
                                    <th width=50%>Price</th>
                                    <td width=50% class="text-right">${{$travel->price}}/Person</td>
                                </tr>
                            </table>
                        </div>
                        
                        <div class="join-container">
                            @auth
                                <form action="{{ route("checkout_process", $travel->id) }}" method="POST">
                                    @csrf        
                                    <button type="submit" class="btn btn-block btn-join-now mt-3 py-2">
                                                Join
                                    </button>    
                                </form>    
                            @endauth

                            @guest
                                <a href="{{ url('/login')}}" class="btn btn-block btn-join-now mt-3 py-2">
                                    Login or Register to Join
                                </a>
                            @endguest

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

@endsection

@push('prepend-style')
    <link rel="stylesheet" href="{{ url('frontend/libraries/xzoom/xzoom.css') }}">
@endpush


@push('addon-script')
    <script src="{{  url('frontend/libraries/xzoom/xzoom.min.js') }}"></script>
    <script>
        $(document).ready(function(){
            $('.xzoom, .xzoom-gallery').xzoom({
                zoomwidth:500,
                title:false,
                tint:'#333',
                Xoffset : 15
            });
        });
    </script>
@endpush