@extends('layouts.guest')

@section('guestbar')
    <div class="container login">
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
        <div class="box-content row m-5">

            <div class="col-6 text-box">
                <div class="row justify-content-center">
                    <img src="images/logo.svg" alt="" style="max-width: 25vw;">
                </div>
                <div class="row justify-content-center">
                    <b class="title">TERATAICARE</b>
                </div>
            </div>
            <div class="col-6 login-form">
                <form action="{{ route('register') }}" method="POST">
                    @csrf
                    <b class="title">Please Register</b>

                    <div class="mb-3 mt-4">
                        <label for="exampleInputEmail1" class="form-label">Nama Lengkap</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                            id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter your name">
                        @error('name')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3 mt-4">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                            id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter your email">
                        @error('email')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                        <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Phone</label>
                        <input type="text" name="no_telp" class="form-control @error('no_telp') @enderror"
                            id="exampleInputPassword1" placeholder="Enter your phone">
                        @error('no_telp')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                            id="exampleInputPassword1" placeholder="Enter your password">
                        @error('password')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password Confirmation</label>
                        <input type="password" name="password_confirmation"
                            class="form-control @error('password_confirmation') is-invalid @enderror"
                            id="exampleInputPassword1" placeholder="Enter your password">
                        @error('password_confirmation')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="d-flex boxlogin-btn">
                        <p>Alredy registered?<a style="text-decoration:;" href="/login"> Login</a></p>
                        <button type="submit" class="btn btn-primary">Register</button>
                    </div>
                    <!-- <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Check me out</label>
                                </div> -->

                </form>
            </div>
        </div>
        <!-- <a class="CustomerService" href=""><img src="images/CsIcon.svg" alt=""></a> -->
    </div>

@endsection
