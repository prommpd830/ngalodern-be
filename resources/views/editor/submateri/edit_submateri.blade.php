@extends('layouts.master')

@section('title', 'Edit Submateri')
@section('content')

<div class="row justify-content-center">
  <div class="col-lg-10">
    <div class="card mb-5 mb-xl-10">
      <!--begin::Card header-->
      <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
        <!--begin::Card title-->
        <div class="card-title m-0">
          <h3 class="fw-bolder m-0">Edit Submateri {{ $submateri->materi->materi }}</h3>
        </div>
        <!--end::Card title-->
      </div>
      <!--begin::Card header-->
      <!--begin::Content-->
      <div id="kt_account_profile_details" class="collapse show" meth>
        <!--begin::Form-->
        <form class="form" method="POST" action="{{ route('submateri.update', $submateri->id) }}" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <input type="hidden" name="id_materi" value="{{ $submateri->id_materi }}">

          <!--begin::Card body-->
          <div class="card-body border-top p-9">

            <!--begin::Input group-->
            <div class="row mb-6 mx-lg-10">
              <!--begin::Label-->
              <label class="col-lg-4 col-form-label fw-bold fs-6">
                <span>Judul</span>            
              </label>
              <!--end::Label-->
              <!--begin::Col-->
              <div class="col-lg-8 fv-row">
                <input id="judul" type="text" name="judul" class="form-control form-control-lg form-control-solid" placeholder="Judul Submateri" value="{{ $submateri->judul }}">
                @error('judul')
                  <div class="text-danger">
                    {{ $message }}
                  </div>
                @enderror
              </div>
              <!--end::Col-->
            </div>
            <!--end::Input group-->

            <!--begin::Input group-->
            <div class="row mb-6 mx-lg-10">
              <!--begin::Label-->
              <label class="col-lg-4 col-form-label fw-bold fs-6">
                <span>Konten</span>            
              </label>
              <!--end::Label-->
              <!--begin::Col-->
              <div class="col-lg-8 fv-row">
                <textarea id="summernote" name="konten" class="form-control form-control-lg form-control-solid" placeholder="Isi Konten Submateri">{{ $submateri->konten }}</textarea>
                @error('konten')
                <div class="text-danger">
                  {{ $message }}
                </div>
                @enderror
              </div>
              <!--end::Col-->
            </div>
            <!--end::Input group-->

          </div>
          <!--end::Card body-->
          <!--begin::Actions-->
          <div class="card-footer d-flex justify-content-end py-6 px-9">
            <a href="/submateri/{{ $submateri->id_materi }}" class="btn btn-white btn-active-light-primary me-2">Batal</a>
            <button type="submit" class="btn btn-primary" >Simpan</button>
          </div>
          <!--end::Actions-->
        </form>
        <!--end::Form-->
      </div>
      <!--end::Content-->
    </div>
  </div>
</div>

@endsection