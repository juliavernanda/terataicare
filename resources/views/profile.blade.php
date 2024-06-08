@extends('layouts.guest')

@section('guestbar')

@if (session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif


    <div class="container mt-4">
        <div class="row">
        <div class="col-lg-12">
            <h2 style="color:#114B5F;  ">Edit Profile</h2>

        </div>
    </div>
    </div>

    <form  method="POST" action="{{ route('profile.update',auth()->user()->id_user) }}">
        @csrf
        @method('PATCH')
    <div class="container">
        <div class="row">
            <div class="col-lg-6 my-3">
                <h4 style="color: #114B5F">Email</h4>
                <input name="email" type="email" value="{{ auth()->user()->email }}" class="form-control" style="border: 2px solid #114B5F; border-radius:10px" placeholder="">
            </div>
            <div class="col-lg-6 my-3">
                <h4 style="color: #114B5F">Password</h4>
                <input name="password" type="password" class="form-control" style="border: 2px solid #114B5F; border-radius:10px">
            </div>

            <div class="col-lg-6 my-3">
                <h4 style="color: #114B5F">Phone Number</h4>
                <input name="no_telp" type="text" value="{{ auth()->user()->no_telp }}" class="form-control" style="border: 2px solid #114B5F; border-radius:10px">
            </div>
            <div class="col-lg-6 my-3">
                <h4 style="color: #114B5F">Full name</h4>
                <input name="name" type="text" value="{{ auth()->user()->name }}" class="form-control" style="border: 2px solid #114B5F; border-radius:10px">
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <button type="submit" class="btn px-4 py-2 text-white" style="background-color: #114B5F">Update</button>
            </div>
        </div>
    </form>
    </div>

@endsection
