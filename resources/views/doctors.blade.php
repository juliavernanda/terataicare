@extends('layouts.guest')

@section('guestbar')
<style>
body {
  font-family: 'Raleway', sans-serif;
}
    .content {
      position: relative;
      text-align: center;
    }

    .doctor-img-1{
      position: absolute;
      top: 40px;
      transform: scale(0.7 ); /* Ubah skala  */

    }


    .doctor-img-2 {
        position: absolute;
      top:66px;
      right:10px;
      transform: scale(0.7 )

    }

    .doctor-img-3 {
        position: absolute;
      top:38px;
      right:40px;
      transform: scale(0.7 )

    }
    .doctor-img-4 {
        position: absolute;
      top:58px;
      right:50px;
      transform: scale(0.7 )

    } .doctor-img-5 {
        position: absolute;
      top:71px;
      right:50px;
      transform: scale(0.7 )

    }

    .doctor-img-6 {
        position: absolute;
      top:75px;
      right:50px;
      transform: scale(0.7 )

    }

    .doctor-name {
    position: absolute;
    letter-spacing:6px;
    top: 5px;
    left: 3px;
    margin: 10px;
    color: white;
    background-color: none;
    padding: 5px;
    border-radius: 5px;
    font-size:20px;
    font-family: 'Raleway', sans-serif;
    font-weight: bold;
  }

  .doctor-type {
    position: absolute;
    top:50px;
    bottom: 0;
    letter-spacing:3px;
    left: 8px;
    margin: 10px;
    color: white;
    font-size: 20px;
    font-family: 'Raleway', sans-serif;
    font-weight: bold;
}

.doctor-number {
    position: absolute;
    top: 80px;
    bottom: 0;
    letter-spacing:3px;
    left: 8px;
    margin: 10px;
    color: white;
    font-size: 15px;
    font-family: 'Raleway', sans-serif;
    font-weight: light;
}

</style>

    <div class="container doctors">

        <div class="box-content row m-5 justify-content-center">
            @foreach ($dokters as $dokter )


            <div class="col-4 content">
            <div class="doctor-name">{{ $dokter->name }}</div>
            <div class="doctor-type">{{ $dokter->nama_bidang }}</div>
            <div class="doctor-number">{{ $dokter->no_telp }}</div>
                <a href="{{ route('booking.index',$dokter->id_dokter) }}" class="btn btn-content">MAKE AN APPOINTMENT</a>
                <img src="{{ asset('profile/'.$dokter->gambar_profile) }}" alt="Image 1" class="doctor-img-1">
            </div>

            @endforeach
            <!-- doctor2 -->









        <a class="CustomerService" href=""><img src="images/CsIcon.svg" alt=""></a>
    </div>

    @endsection





