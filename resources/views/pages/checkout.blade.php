@extends('layouts.checkout')

@section('title',"Checkout")

@section('content')

    <main>
        <section class="main section-details-header">
        </section>

        <section class="section-details-content">
            <div class="container">
                <div class="row">
                    <div class="col p-0">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">Paket Travel</li>
                                <li class="breadcrumb-item">Details</li>
                                <li class="breadcrumb-item active">Checkout</li>
                            </ol>
                        </nav>

                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-8 pl-lg-8">
                        <div class="card card-details">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{$error}}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <h1>Whos is Going ?</h1>
                            <p>Trip to</p>
                            <div class="attendee">
                                <table class="table table-responsive-sm text-center">
                                    <thead>
                                        <tr>
                                            <td>Picture</td>
                                            <td>Name</td>
                                            <td>Nationality</td>
                                            <td>Visa</td>
                                            <td>Passport</td>
                                            <td></td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($item->details as $detail)
                                            <tr>
                                                <td class="align-middle">
                                                    <img class="rounded-circle" src="https://ui-avatars.com/api/?name={{ $detail->username }}" width="60" height="60">
                                                </td>
                                                
                                                <td class="align-middle">{{$detail->username}}</td>
                                                
                                                <td class="align-middle">{{$detail->nationality}}</td>
                                                
                                                <td class="align-middle">{{$detail->is_visa ? "30 Days" : "N/A"}}</td>
                                                
                                                <td class="align-middle">{{\Carbon\Carbon::createFromDate($detail->doe_passport) > \Carbon\Carbon::now() ?
                                                "Active" : "Incative"}}
                                                </td>
                                                
                                                <td class="align-middle">
                                                    <a href="{{ route('checkout_remove', $detail->id)}}">
                                                        <img src="{{ url('frontend/images/ic_remove.png') }}">
                                                    </a>
                                                </td>
                                            </tr>
                                            
                                        @empty
                                            <tr>
                                                <td collspan="6" class="text-center">No Visitor</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>

                            <div class="member mt-3">
                                <h2>Add Member</h2>
                                <form  class="form-inline" method="POST" action="{{route('checkout_create', 
                                $item->id)}}">
                                @csrf
                                    <!-- Sr-only itu buat teman2 tunanetra, jadi screenya convert jadi suara -->
                                    <label for="Username" class="sr-only">Name</label>
                                    <input
                                        type="text"
                                        class="form-control mb-2 mr-sm-2"
                                        id="Username"
                                        name="Username"
                                        placeholder="Username"
                                        />

                                    <label for="nationality" class="sr-only">Nationality</label>
                                    <input
                                        type="text"
                                        class="form-control mb-2 mr-sm-2"
                                        id="nationality"
                                        name="nationality"
                                        placeholder="Nationality"
                                        style="width: 50px"
                                        required
                                        />

                                    <label for="is_visa" class="sr-only">Visa</label>
                                    <select 
                                        name="is_visa" 
                                        id="is_visa" 
                                        class="custom-select mb-2 mr-sm-2"
                                        required>
                                        
                                        <!-- selected biar defautl -->
                                        <option value="" selected>VISA</option>
                                        <option value="1">30 Days</option>
                                        <option value="0">N/A</option>
                                    </select>

                                    

                                    <label for="doe_passport" class="sr-only">DOE Password</label>
                                    <div class="input-group mb-2 mr-sm-2">
                                        <input 
                                            type="text" 
                                            class="form-control datepicker"
                                            id="doePassport" 
                                            name="doe_passport" 
                                            placeholder="DOE Passport"/>
                                    
                                    </div>

                                    <button type="submit" class="btn btn-add-now mb-2 px-4">
                                        Add Now
                                    </button>
                                </form>
                                <h3 class="mt-2 mb-0">Note</h3>
                                    <p class="disclaimer mb-0">You are only able to invite member that has registered in Nomads.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="card card-details card-right">
                            <h2>Checkout Information</h2>
                            
                            <table class="trip-information">
                                <tr>
                                    <th width=50%>Members</th>
                                    <td width=50% class="text-right">{{ $item->details->count() }} Person</td>
                                </tr>
                                <tr>
                                    <th width=50%>Additional Visa</th>
                                    <td width=50% class="text-right">$ {{ $item->additional_visa }}</td>
                                </tr>
                                <tr>
                                    <th width=10%>Trip Price</th>
                                    <td width=90% class="text-right">$ {{ $item->travel_package->price }} / Person</td>
                                </tr>
                                <tr>
                                    <th width=50%>Sub Total</th>
                                    <td width=50% class="text-right">$ {{ $item->transactional_total }}</td>
                                </tr>

                                <tr>
                                    <th width=70%>Total (+Unique Code)</th>
                                    <td width=30% class="text-right">
                                        <span class="text-blue">$ {{ $item->transactional_total }},</span>
                                        <span class="text-orange">{{ mt_rand(0,99)}}</span> <!-- Buat random int sebgai kode unik -->
                                    </td>
                                </tr>
                            </table>
                            <hr/>

                            <h2>Payment Instruction</h2>
                            <p class="payment-instruction">
                                Please complete your payment before to continue the wonderful trip
                            </p>
                            <div class="bank">
                                <div class="bank-item pb-3">
                                    <img src="{{ url('frontend/images/ic_bank.png') }}" alt="bank" class="bank-image">
                                    <div class="description">
                                        <h3>PT Nomads</h3>
                                        <p>
                                            0812 3456 7890
                                            <br/>
                                            Bank Syariah Mandiri 
                                        </p>
                                    </div>
                                </div>

                                <!-- karena float left, maka semua item otomatis sebaris, biar buat baris baru
                                makanya make clearfix -->
                                <div class="clearfix"></div>

                                
                                <div class="bank-item pb-3">
                                    <img src="{{ url('frontend/images/ic_bank.png') }}" alt="bank" class="bank-image">
                                    <div class="description">
                                        <h3>PT Nomads</h3>
                                        <p>
                                            0812 3456 7890
                                            <br/>
                                            Bank Nasional Indonesia 
                                        </p>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        
                        <div class="join-container">
                            <a href="{{ url('/checkout_success', $item->id) }}" class="btn btn-block btn-join-now mt-3 py-2">
                                I Have Made Payment
                            </a>
                        </div>

                        <div class="text-center mt-3">
                            <a href="{{ url('/detail', $item->travel_package->slug) }}" class="text-muted ">Cancel Booking</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    
@endsection

@push('prepend-style')
    <link rel="stylesheet" href="{{ url('frontend/libraries/gijgo/css/gijgo.min.css') }}">
@endpush

@push('addon-script')
    <script src="{{ url('frontend/libraries/gijgo/js/gijgo.min.js') }}"></script>
    <script>
        $(".datepicker").datepicker ({
            format : "yyyy-mm-dd",
            uiLibrary:"bootstrap4",
            icons:{
                rightIcon:'<image src="{{ url('frontend/images/ic_doe.png') }}"/>'
            }
        });
    </script>
@endpush