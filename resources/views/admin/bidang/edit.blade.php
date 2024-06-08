@extends('layouts.layoutAdmin')

@section('content')
    <main id="main" class="main">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="pt-3" style="color: #114B5F; font-weight:700; font-size:55px">Hi Admin !</h2>
                </div>
            </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

            <div class="container py-5">
                <form method="POST" action="{{ route('bidang.update',$bidangs->id_bidang) }}">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="text-center" style="color: #114B5F; font-weight:700">Create Bidang Doctor</h2>

                        <div class="d-flex justify-content-center py-2">
                            <div class="col-lg-6">
                                <h5 style="color: #114B5F; font-weight:600">Nama Bidang</h5>
                                <input type="text" value="{{ $bidangs->nama_bidang }}"  style="border: 2px solid #114B5F" class="form-control my-3 @error('nama_bidang') is-invalid @enderror" name="nama_bidang" placeholder="Input Nama Bidang">
                                @error('nama_bidang')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                            </div>
                        </div>

                        <div class="d-flex justify-content-center">
                            <div class="col-lg-6 text-end">
                              <button type="submit" style="background-color: #114B5F" class="btn px-4 py-2 text-white">Create</button>
                            </div>
                        </div>

                    </form>



                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
