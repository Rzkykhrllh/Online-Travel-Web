@extends("layouts.app")

@section("content")

    <!-- Header -->
    <header class="text-center ayam">
        <h1>
            Explore The Beautiful World
            <br/>
            As Easy As One Click
        </h1>

        <p class=mt-3>
            You will see beautiful moment
            <br/>    
            you never see before
        </p>

        <a href="#popular" class="btn btn-get-started">
            Get Started
        </a>
    </header>

    <main>
        <!-- Stats -->
        <div class="container">
            <div class="section section-stats row justify-content-center"
            id="stats">
                <div class="col-6 col-md-2 stats-detail">
                    <h2>20K</h2>
                    <p>Members</p>
                </div>
                <div class="col-6 col-md-2 stats-detail">
                    <h2>12</h2>
                    <p>Countries</p>
                </div>
                <div class="col-6 col-md-2 stats-detail">
                    <h2>3K</h2>
                    <p>Hotels</p>
                </div>
                <div class="col-6 col-md-2 stats-detail">
                    <h2>72</h2>
                    <p>Partners</p>
                </div>
            </div>
        </div>

        <!-- Popular Title -->
        <section class="section-popular" id="popular">
            <div class="container">
                <div class="row">
                    <div class="col text-center section-popular-heading">

                         <h2>Wisata Popular</h2>
                         <p>Something that you never try
                             <br/>
                             before in this World
                         </p>

                    </div>
                </div>
            </div>

        </section>

        <!-- Popular Destination -->
        <section class="section-popular-content" id="popularContent">
            <div class="container">
                <div class="section-popular-travel row justify-content-center">
                   @foreach ($items as $item)
                    <div class="col-sm6 col md-4 col-lg-3">
                        
                        <div class="card-travel text-center d-flex flex-column"
                        style="background-image: url('{{
                            $item->galleries->count() ? 
                                Storage::url($item->galleries->first()->image)
                                : "" }}');">

                            <div class="travel-country">
                                {{$item->location}}
                            </div>
                            <div class="travel-location">
                                {{$item->title}}
                            </div>
                            <div class="travel-button mt-auto">
                                <a href="{{ url('/detail', $item->slug) }}" class="btn btn-travel-details px-4">
                                    View Details
                                </a>
                            </div>
                        </div>
                </div>
                   @endforeach
                </div>
            </div>
        </section>

        <!-- Network -->
        <section class="section-network">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <h2>Our Network</h2>
                        <p>
                            Companies that trusted us
                            <br/>
                            more than just a trip
                        </p>
                    </div>

                    <div class="col-md-8 text-center">
                        <img 
                            src="frontend/images/logos_partner.png" 
                            alt="Logo Partner" 
                            class="img-partner"
                        />

                    </div>
            </div>
            </div>
        </section>

        <!-- Testimoni -->
        <section class="section-testimonial-header" id="testimonialHeading">
            <div class="container">
                <div class="row">
                    <div class="col text-center">
                        <h2>They are Loving Us</h2>
                        <p>Moments were giving them
                            <br/>
                            the best experience
                        </p>
                    </div>
                </div>

            </div>

        </section>

        <section
            class="section-testimonial-content"
            id="testimonialContent">
            <div class="container">
                <div class="row section-popular-travel justify-center">
                    <div class="col-sm-6 col-md-6 col-lg-4">
                        <div class="card card-testimonial text-center">
                            <div class="testimonial-content">
                                <img src="frontend/images/profile1.png" alt="user1" class="mb-4 rounded-circle"/>
                                <h3 class="mb-4">Rizky Khairullah</h3>
                                <p class="testimonial">
                                    "It was glorious and i could not stop to say whooo for every single moment
                                    <br/>
                                    sankyuu"
                                </p>

                            </div>
                            <hr>
                            <p class="trip-to mt-2">
                                Trip to Bromo
                            </p>
                        </div>
                    </div>

                    
                    <div class="col-sm-6 col-md-6 col-lg-4">
                        <div class="card card-testimonial text-center">
                            <div class="testimonial-content">
                                <img src="frontend/images/profile2.jpg" alt="user1" class="mb-4 rounded-circle"/>
                                <h3 class="mb-4">Hiro</h3>
                                <p class="testimonial">
                                    "It was glorious and i could not stop to say whooo for every single moment
                                    <br/>
                                    sankyuu"
                                </p>

                            </div>
                            <hr>
                            <p class="trip-to mt-2">
                                Trip to Bromo
                            </p>
                        </div>
                    </div>

                    
                    <div class="col-sm-6 col-md-6 col-lg-4">
                        <div class="card card-testimonial text-center">
                            <div class="testimonial-content">
                                <img src="frontend/images/profile3.jpg" alt="user1" class="mb-4 rounded-circle"/>
                                <h3 class="mb-4">Christina Wilson</h3>
                                <p class="testimonial">
                                    "It was amazing experience visiting many tourism destination with Nomads
                                    <br/>
                                    Thanks"
                                </p>

                            </div>
                            <hr>
                            <p class="trip-to mt-2">
                                Trip to Bromo
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-12 text-center">
                    <a href="#" class="btn btn-need-help px-4 mx-1 mt-4">
                        I Need Help
                    </a>
                <a href="{{ route("register")}}" class="btn btn-get-started px-4 mx-1 mt-4">
                        Get Started
                    </a>
                </div>
            </div>

        </section>
    </main>

@endsection

@section('title',"Nomads")