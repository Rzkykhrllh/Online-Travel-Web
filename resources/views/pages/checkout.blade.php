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
                            <h1>Whos is Going ?</h1>
                            <p>Trip to Ubud, Bali</p>
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
                                        <tr>
                                            <td class="align-middle">
                                                <img class="rounded-circle" src="{{ url('frontend/images/profile1.png') }}" width="60" height="60">
                                            </td>
                                            <td class="align-middle">Rizky Khairullah</td>
                                            <td class="align-middle">ID</td>
                                            <td class="align-middle">30 Days</td>
                                            <td class="align-middle">Active</td>
                                            <td class="align-middle">
                                                <img src="{{ url('frontend/images/ic_remove.png') }}">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="align-middle">
                                                <img class="rounded-circle" src="{{ url('frontend/images/profile2.jpg') }}" width="60" height="60">
                                            </td>
                                            <td class="align-middle">Hiro</td>
                                            <td class="align-middle">JP</td>
                                            <td class="align-middle">10 Days</td>
                                            <td class="align-middle">Active</td>
                                            <td class="align-middle">
                                                <img src="{{ url('frontend/images/ic_remove.png') }}">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="align-middle">
                                                <img class="rounded-circle" src="{{ url('frontend/images/profile3.jpg') }}" width="60" height="60">
                                            </td>
                                            <td class="align-middle">Christina Wilson</td>
                                            <td class="align-middle">US</td>
                                            <td class="align-middle">30 Days</td>
                                            <td class="align-middle">Active</td>
                                            <td class="align-middle">
                                                <img src="{{ url('frontend/images/ic_remove.png') }}">
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="member mt-3">
                                <h2>Add Member</h2>
                                <form  class="form-inline">
                                    <!-- Sr-only itu buat teman2 tunanetra, jadi screenya convert jadi suara -->
                                    <label for="inputUsername" class="sr-only">Name</label>
                                    <input
                                        type="text"
                                        class="form-control mb-2 mr-sm-2"
                                        id="inputUsername"
                                        name="inputUsername"
                                        placeholder="Username"
                                        />

                                    <label for="inputVisa" class="sr-only">Visa</label>
                                    <select name="inputVisa" id="inputVisa" class="custom-select mb-2 mr-sm-2">
                                        
                                        <!-- selected biar defautl -->
                                        <option value="Visa" selected>VISA</option>
                                        <option value="Visa">30 Days</option>
                                        <option value="Visa">N/A</option>
                                    </select>

                                    <label for="doePassword" class="sr-only">DOE Password</label>
                                    <div class="input-group mb-2 mr-sm-2">
                                        <input type="text" class="form-control datepicker
                                            id="doePassport" placeholder="DOE Passport"/>
                                    
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
                                    <td width=50% class="text-right">2 Person</td>
                                </tr>
                                <tr>
                                    <th width=50%>Additional Visa</th>
                                    <td width=50% class="text-right">$ 19,00</td>
                                </tr>
                                <tr>
                                    <th width=10%>Trip Price</th>
                                    <td width=90% class="text-right">$ 80,00 / Person</td>
                                </tr>
                                <tr>
                                    <th width=50%>Sub Total</th>
                                    <td width=50% class="text-right">$ 280</td>
                                </tr>

                                <tr>
                                    <th width=70%>Total (+Unique Code)</th>
                                    <td width=30% class="text-right">
                                        <span class="text-blue">$ 279,</span>
                                        <span class="text-orange">90</span>
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
                            <a href="{{ url('/checkout/success') }}" class="btn btn-block btn-join-now mt-3 py-2">
                                I Have Made Payment
                            </a>
                        </div>

                        <div class="text-center mt-3">
                            <a href="{{ url('/detail') }}" class="text-muted ">Cancel Booking</a>
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
            uiLibrary:"bootstrap4",
            icons:{
                rightIcon:'<image src="{{ url('frontend/images/ic_doe.png') }}"/>'
            }
        });
    </script>
@endpush