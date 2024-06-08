@extends('layouts.layoutAdmin')

@section('content')
<main id="main" class="main">

    <div class="pagetitle">
      <h1 class="my-4" style="font-size: 40px; font-weight:700; letter-spacing:2px">Hi, Admin ! </h1>
  <a href="{{ route('doctors.create') }}">  <button class="btn px-3 py-2 text-white" style="background-color: #114B5F;"> Create Data</button></a>
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
                    <th scope="col">NIP</th>
                    <th scope="col">Name Patient</th>
                    <th scope="col">Specialist</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Photo</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                    <?php $noid = 5001 ?>
                    @foreach ($dokters as $dokter )
                    <tr>
                        <th > {{ $noid++ }} </th>
                        <td> {{ $dokter->name }} </td>
                        <td> {{ $dokter->nama_bidang }} </td>
                        <td>{{ $dokter->no_telp }}</td>
                        <td><img src="{{asset('profile/'. $dokter->gambar_profile) }}" width="80" height="80" alt=""></td>
                        <td>
                            <a href="{{ route("doctors.edit",$dokter->id_dokter) }}"><button type='submit'class="btn btn-success"><i class="bi bi-pencil-square"></i></button></a>
                           <form action="{{ route("doctors.delete", $dokter->id_dokter) }}"
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
