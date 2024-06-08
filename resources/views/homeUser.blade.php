@extends('layouts.guest')

@section('guestbar')
    <section class="section-body">

        @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

        <div class="container">
            <div class="row ">

                <div class="col-lg-6">
                    <div class="flex flex-col">
                        <h2 style="font-weight: 700; color:#114B5F; letter-spacing: 2px;">Upcoming</h2>
                        <h2 style="font-weight: 700; color:#114B5F; letter-spacing: 2px;" class="mb-4">Appoinment</h2>

                        @if($bookings->isNotEmpty())
                            <div class="container upcoming-appoinment">
                                <div class="row px-5 py-4">
                                    <div class="col-6">
                                        <h4>{{ $bookings[0]->doctor_name }}</h4>
                                        <h4>{{ $bookings[0]->nama_bidang }}</h4>
                                        <div class="appointment-deskripsi my-2">
                                            <p>{{ $bookings[0]->no_telp }}</p>
                                            <p>{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $bookings[0]->tanggal_booking)->format('l, j F Y') }}</p>
                                            <p>13.00 - 15.00</p>
                                        </div>
                                    </div>

                                    <div class="col-6 flex flex-col align-content-center text-center ">
                                        <button class="btn px-4 py-2 my-2" style="background-color: white; color:#114B5F; font-weight:700">Call Doctor</button>
                                        <button class="btn  px-4 py-2 my-2" style="background-color: white; color:#114B5F; font-weight:700">Get Direction</button>
                                    </div>
                                </div>
                            </div>
                        @else
                            <p>No upcoming appointments.</p>
                        @endif
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="container doctor-available ">
                        <div class="row py-4 px-4 ">
                            <div class="col-12 ">
                                <h2>Doctor</h2>
                                <h2>Available</h2>

                                @if($dokters->isNotEmpty())
                                    @foreach ($dokters as $dokter)
                                        <div class="container box-status flex align-content-center ">
                                            <div class="row">
                                                <div class="col-6">
                                                    <h3>{{ $dokter->name }}</h3>
                                                    <p>{{ $dokter->nama_bidang }}</p>
                                                </div>
                                                <div class="col-6 flex text-end">
                                                    <p>Available</p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <p>No doctors available.</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>



            </div>
        </div>

    </section>
@endsection
