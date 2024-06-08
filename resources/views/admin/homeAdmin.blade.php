@extends('layouts.layoutAdmin')

  @section('content')
  <main id="main" class="main">



    <section class="section dashboard">
      <div class="row">

       <div class="col-lg-12">

                    <h2 class="pt-3" style="color: #114B5F; font-weight:700; font-size:55px">Hi Admin !</h2>

                    <h2 class="pt-4" style="color: #114B5F; font-weight:700; font-size:35px">Upcoming</h2>
                    <h2 class="pb-4" style="color: #114B5F; font-weight:700; font-size:35px">Appoinment</h2>


                    @if($bookings->isNotEmpty())
                    @foreach ($bookings as $booking )
                    <div class="  upcoming-appoinment">
                        <div class="row px-5 py-4">
                            <div class="col-lg-12 flex flex-col ">
                                <h3>{{ $booking->name }}</h3>
                                <h4>{{ $booking->no_telp }}</h4>
                                <p>{{ $booking->catatan }}</p>
                                <h4>{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $booking->tanggal_booking)->format('l, j F Y') }}</h4>

                            </div>
                        </div>
                    </div>
                    @endforeach
                    @else
                    <h4>No upcoming appointments.</h4>
                    @endif




       </div>


      </div>
    </section>

  </main><!-- End #main -->
  @endsection
