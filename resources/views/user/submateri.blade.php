@extends('layouts.master')

@section('title', 'Submateri')
@section('content')

@if (count($sub_materi) == 0)
<div class="card w-100 shadow">
  <div class="container-fluid">
      <p class="text-gray-500 fs-5 fw-bold text-center my-5">Submateri tidak ada</p>
  </div>
</div>
@else
@foreach ($sub_materi as $data)
<!--begin::Card-->
<div class="card card-flush min-h-lg-600px">
  <div class="card-header py-8 px-10 px-lg-15">
    <div class="d-flex justify-content-center flex-column mb-sm-0 mb-5">
      <h3 class="text-gray-500 fs-2tx fw-bolder ls-3">{{ $data->judul }}</h3>
    </div>
    <div class="d-flex justify-content-center text-right">
      <div class="card-toolbar">
        <a href="u/submateri/{{ $data->kode_materi }}/{{ $previous }}" class="btn btn-secondary {{ $previous == null ? 'disabled' : '' }} px-8 mx-1">
            <span class="fs-5">Previous</span>
        </a>
        @if ($next == null)
        <a href="u/latihan/{{ $data->kode_materi }}" class="btn btn-primary mx-1">Latihan</a>
        @else
        <a href="u/submateri/{{ $data->kode_materi }}/{{ $next }}" class="btn btn-primary px-8 mx-1">
            <span class="fs-5">Next</span>
        </a>
        @endif
      </div>
    </div>
  </div>
  <!--begin::Card Body-->
  <div class="card-body fs-6 pt-0 px-10 px-lg-15 overflow-auto">
    <!--begin::Section-->
    <div class="pb-10">
      <div class="py-5">
        <p dir="rtl" lang="ar">{!! $data->konten !!}</p>
      </div>
    </div>
    <!--end::Section-->
  </div>
  <!--end::Card Body-->
</div>
<!--end::Card-->
@endforeach
@endif
@endsection