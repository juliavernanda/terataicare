<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
  <body>
    <div class="container booking d-flex flex-column align-items-center">
      <div class="logout"><a href="">Logout</a></div>
        <div class="box-menu d-flex justify-content-center mt-5">
            <ul class="d-flex menu">
                <a class="" href="">HOME</a>
                <a class="active" href="">DOCTORS</a>
                <a class="" href="">PROFILE</a>
            </ul>
        </div>
        <div class="box-content row booking-form m-5 p-5">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
                <form action="{{ route('booking.store') }}" method="POST">
                    @csrf
                    <b class="title">Booking Form</b>
                    <div class="row">
                      <div class="col-6">
                        <div class="mb-3 mt-4">
                          <label for="exampleInputEmail1" class="form-label">E-mail</label>
                          <input type="hidden" name="id_user" value="{{ auth()->user()->id_user }}">
                          <input type="email" value="{{ auth()->user()->email }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter your email">
                          <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
                        </div>
                      </div>
                      <div class="col-6">
                        <div class="mt-4">
                          <label for="exampleInputEmail1" class="form-label">Full Name</label>
                          <input type="text" value="{{ auth()->user()->name }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter your email">
                          <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-6">
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Doctor</label>
                          <input type="hidden" name="id_dokter" value="{{ $dokters->id_dokter }}">
                          <input type="email" value="{{ $dokters->email }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter your email">
                          <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
                        </div>
                      </div>
                      <div class="col-6">
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Date</label>
                          <input name="tanggal_booking" type="datetime-local" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter your email">
                          <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
                        </div>
                      </div>
                    </div>
                    <div class="row d-flex justify-content-between">
                      <div class="col-9">
                        <div class="mb-3">
                          <label for="exampleFormControlTextarea1" class="form-label">Text</label>
                          <textarea name="catatan" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Enter detail"></textarea>
                        </div>
                      </div>
                      <div class="col-2 d-flex justify-content-end align-items-end pb-3">
                        <button type="submit" class="btn btn-booking">BOOK</button>
                      </div>
                    </div>
                            <!-- <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Check me out</label>
                            </div> -->

                </form>
        </div>
        <a class="CustomerService" href=""><img src="images/CsIcon.svg" alt=""></a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
