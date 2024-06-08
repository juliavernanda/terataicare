@extends('layouts.layoutAdmin')

@section('content')

<main id="main" class="main">

    <div class="pagetitle">
      <h1 class="my-4" style="font-size: 40px; font-weight:700; letter-spacing:2px">Hi, Admin ! </h1>

    </div><!-- End Page Title -->
    @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">

              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">Id Reports</th>
                    <th scope="col">Doctor</th>
                    <th scope="col">Pacients</th>
                    <th scope="col">Date</th>
                    <th scope="col">Action</th>

                </tr>
                </thead>
                <tbody>
                    <?php $noid = 1 ?>
                    @foreach ($bookings as  $booking)

                  <tr>
                    <th scope="row">{{ $noid++ }}</th>
                    <td>{{ $booking->doctor_name }}</td>
                    <td>{{ $booking->username }}</td>
                    <td> {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $booking->tanggal_booking)->format('l, j F Y') }}</td>

                    <td>
                        <form action="{{ route("reports.delete", $booking->id_booking) }}"
                            method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Are you sure ?')"
                            class="btn btn-danger"><i class="bi bi-trash3-fill"></i></button>


                        </form>

                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->

@endsection
