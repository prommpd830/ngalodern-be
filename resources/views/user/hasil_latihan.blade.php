@extends('layouts.master')

@section('title', 'Hasil Latihan')
@section('content')
<div class="card mb-5 mb-xxl-8">
  <div class="card-body text-center py-10">
      <div class="d-flex flex-column justify-content-center">
          <h3 class="text-gray-900 text-hover-primary fs-2hx">Selamat kamu telah menyelesaikan latihan kata!!</h3>
          <h5 class="text-gray-700 text-hover-primary fs-1">Nilai kamu adalah..</h5>
          <h1 class="text-gray-400 text-hover-primary fs-5hx">200</h1>
          <p class="fs-5">Mau lihat progress pembelajaranmu?</p>
          <a href="profile" class="btn btn-outline btn-outline-primary text-hover-light m-auto w-125px">Cek Profil</a>
      </div>
  </div>
</div>
@endsection