@extends("layouts.admin")

@section("content")

  <!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Edit Paket Travel {{$item->title}}</h1>
    </div>

    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
            <li> {{ $error }} </li>
          @endforeach
        </ul>
      </div>
        
    @endif

    <div class="card shadow">
      <div class="card-body">
        <form action="{{ route('travel-package.update',$item->id) }}" method="POST">
          @method("PUT")
          @csrf
            <div class="form-group">
              <label for="title">Title</label>
              <input
                type="text"
                class="form-control"
                placeholder="Title"
                name="title"
                value="{{$item->title}}">
            </div>

            
            <div class="form-group">
              <label for="title">Location</label>
              <input
                type="text"
                class="form-control"
                placeholder="Location"
                name="location"
                value="{{$item->title}}">
            </div>

            <div class="form-group">
              <label for="about">About</label>
            <textarea name="about" rows="10" class="d-block w-100 form-control">{{$item->about}}</textarea>
            </div>

            <div class="form-group">
              <label for="type">Type</label>
              <input
                type="text"
                class="form-control"
                placeholder="Type"
                name="type"
                value="{{$item->type}}">
            </div>

            <div class="form-group">
              <label for="departure_date">Departure Date</label>
              <input
                type="date"
                class="form-control"
                placeholder="Departure Date"
                name="departure_date"
                value="{{$item->departure_date}}">
            </div>

            <div class="form-group">
              <label for="duration">Duration</label>
              <input
                type="text"
                class="form-control"
                placeholder="Duration"
                name="duration"
                value="{{$item->duration}}}}">
            </div>

            <div class="form-group">
              <label for="price">Price</label>
              <input
                type="number"
                class="form-control"
                placeholder="Price"
                name="price"
                value="{{$item->price}}">
            </div>

            <div class="form-group">
              <label for="featured_event">Featured Event</label>
              <input
                type="text"
                class="form-control"
                placeholder="Featured Event"
                name="featured_event"
                value="{{$item->featured_event}}">
            </div>

            <div class="form-group">
              <label for="foods">Foods</label>
              <input
                type="text"
                class="form-control"
                placeholder="Foods"
                name="foods"
                value="{{$item->foods}}">
            </div>

            <div class="form-group">
              <label for="language">Language</label>
              <input
                type="text"
                class="form-control"
                placeholder="Language"
                name="language"
                value="{{$item->language}}">
            </div>

            <button type="submit" class="btn btn-primary btn-block">
              Ubah
            </button>

        </form>
      </div>
    </div>

  </div>
  <!-- /.container-fluid -->
@endsection