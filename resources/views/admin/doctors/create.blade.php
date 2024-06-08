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
                <form method="POST" action="{{ route("doctors.store") }}"  enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="text-center" style="color: #114B5F; font-weight:700">Create Doctor</h2>
                        <div class="d-flex justify-content-center py-3">
                            <div class="col-lg-6">
                                <h5 style="color: #114B5F; font-weight:600">Pengguna</h5>
                                <select class="form-control @error('id_user') is-invalid @enderror "
                                name="id_user" aria-label="Default">
                                <option selected>Silahkan Memilih User</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id_user }}">
                                        {{ $user->name }}</option>
                                @endforeach
                            </select>

                            </div>
                        </div>
                        <div class="d-flex justify-content-center py-2">
                            <div class="col-lg-6">
                                <h5 style="color: #114B5F; font-weight:600">Bidang Dokter</h5>
                                {{-- <input type="text" value="{{ $patients->no_telp}}" style="border: 2px solid #114B5F" class="form-control my-3 @error('no_telp') is-invalid @enderror" name="no_telp" placeholder="Input Phone Number"> --}}
                                <select class="form-control @error('id_bidang') is-invalid @enderror "
                                name="id_bidang" aria-label="Default">
                                <option selected>Silahkan Memilih </option>
                                @foreach ($bidangs as $bidang)
                                    <option value="{{ $bidang->id_bidang }}">
                                        {{ $bidang->nama_bidang }}</option>
                                @endforeach
                            </select>
                                @error('id_bidang')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                            </div>
                        </div>

                        <div class="d-flex justify-content-center py-2">
                            <div class="col-lg-6">
                                <h5 style="color: #114B5F; font-weight:600">Profile</h5>
                                <input type="file"  style="border: 2px solid #114B5F" class="form-control my-3 @error('gambar_profile') is-invalid @enderror" name="gambar_profile" placeholder="Input Phone Number">
                                @error('gambar_profile')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                            </div>
                        </div>

                        <div class="d-flex justify-content-center py-2">
                            <div class="col-lg-6">
                                <h5 style="color: #114B5F; font-weight:600">Status Aktif</h5>

                                <select class="form-control" name="status" id="">
                                    <option value="0">Tidak Aktif</option>
                                    <option value="1">Aktif</option>
                                </select>
                                @error('status')
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
