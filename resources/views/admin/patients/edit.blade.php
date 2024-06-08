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
                <form method="POST" action="{{ route('patient.update',$patients->id_user) }}">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="text-center" style="color: #114B5F; font-weight:700">Edit Patient</h2>
                        <div class="d-flex justify-content-center py-3">
                            <div class="col-lg-6">
                                <h5 style="color: #114B5F; font-weight:600">Full Name</h5>
                                <input type="text" value="{{ $patients->name}}" style="border: 2px solid #114B5F" class="form-control my-3 @error('name') is-invalid @enderror" name="name" placeholder="Input Name">
                                @error('name')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="d-flex justify-content-center py-2">
                            <div class="col-lg-6">
                                <h5 style="color: #114B5F; font-weight:600">Phone Number</h5>
                                <input type="text" value="{{ $patients->no_telp}}" style="border: 2px solid #114B5F" class="form-control my-3 @error('no_telp') is-invalid @enderror" name="no_telp" placeholder="Input Phone Number">
                                @error('no_telp')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                            </div>
                        </div>

                        <div class="d-flex justify-content-center">
                            <div class="col-lg-6 text-end">
                              <button type="submit" style="background-color: #114B5F" class="btn px-4 py-2 text-white">Edit</button>
                            </div>
                        </div>

                    </form>



                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
