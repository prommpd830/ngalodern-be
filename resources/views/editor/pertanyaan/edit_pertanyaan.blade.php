@extends('layouts.master')

@section('title', 'Edit Soal Latihan')
@section('content')
@if (session('success'))
<div class="alert alert-success mb-4" role="alert">
{{session('success')}}
</div>
@endif

<div class="card mb-5 mb-xl-10">
  <!--begin::Card header-->
  <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
    <!--begin::Card title-->
    <div class="card-title m-0">
      <h3 class="fw-bolder m-0">Edit Pertanyaan</h3>
    </div>
    <!--end::Card title-->
  </div>
  <!--begin::Card header-->
  <!--begin::Content-->
  <div id="kt_account_profile_details" class="collapse show" meth>
    <!--begin::Form-->
    <form class="form" method="POST" action="{{ route('pertanyaan.update', $pertanyaan->id) }}" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <input type="hidden" name="id_tes" value="{{ $pertanyaan->id_tes }}">

      <!--begin::Card body-->
      <div class="card-body border-top p-9">
        
        <!--begin::Input group-->
        <div class="row mb-6 mx-lg-10">
          <!--begin::Label-->
          <label class="col-lg-4 col-form-label fw-bold fs-6">
            <span>Nomor</span>            
          </label>
          <!--end::Label-->
          <!--begin::Col-->
          <div class="col-lg-8 fv-row">
            <input type="text" id="nomer" name="nomer" class="form-control form-control-lg form-control-solid" placeholder="Nomor" value="{{ $pertanyaan->nomer }}">
          </div>
          <!--end::Col-->
        </div>
        <!--end::Input group-->

        <!--begin::Input group-->
        <div class="row mb-6 mx-lg-10">
          <!--begin::Label-->
          <label class="col-lg-4 col-form-label fw-bold fs-6">
            <span>Soal</span>            
          </label>
          <!--end::Label-->
          <!--begin::Col-->
          <div class="col-lg-8 fv-row">
            <textarea id="summernote" name="pertanyaan" class="form-control form-control-lg form-control-solid" placeholder="Pertanyaan">{{ $pertanyaan->pertanyaan }}</textarea>
            @error('pertanyaan')
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
            <span>Pilihan A</span>            
          </label>
          <!--end::Label-->
          <!--begin::Col-->
          <div class="col-lg-8 fv-row">
            <input id="a" type="text" name="a" class="form-control form-control-lg form-control-solid" placeholder="Pilihan A" value="{{ $pertanyaan->a }}">
            @error('a')
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
            <span>Pilihan B</span>            
          </label>
          <!--end::Label-->
          <!--begin::Col-->
          <div class="col-lg-8 fv-row">
            <input id="b" type="text" name="b" class="form-control form-control-lg form-control-solid" placeholder="Pilihan B" value="{{ $pertanyaan->b }}">
            @error('b')
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
            <span>Pilihan C</span>            
          </label>
          <!--end::Label-->
          <!--begin::Col-->
          <div class="col-lg-8 fv-row">
            <input type="text" id="c" name="c" class="form-control form-control-lg form-control-solid" placeholder="Pilihan C" value="{{ $pertanyaan->c }}">
            @error('c')
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
            <span>Pilihan D</span>            
          </label>
          <!--end::Label-->
          <!--begin::Col-->
          <div class="col-lg-8 fv-row">
            <input type="text" id="d" name="d" class="form-control form-control-lg form-control-solid" placeholder="Pilihan D" value="{{ $pertanyaan->d }}">
            @error('d')
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
            <span>Jawaban Benar</span>            
          </label>
          <!--end::Label-->
          <!--begin::Col-->
          <div class="col-lg-8 fv-row">
            <select name="jawaban" class="form-select form-select-solid" data-control="select2">
              <option value="a" {{ $pertanyaan->jawaban == 'a' ? 'selected' : '' }}>A</option>
              <option value="b" {{ $pertanyaan->jawaban == 'b' ? 'selected' : '' }}>B</option>
              <option value="c" {{ $pertanyaan->jawaban == 'c' ? 'selected' : '' }}>C</option>
              <option value="d" {{ $pertanyaan->jawaban == 'd' ? 'selected' : '' }}>D</option>
            </select>
          </div>
          <!--end::Col-->
        </div>
        <!--end::Input group-->
        
        <!--begin::Input group-->
        <div class="row mb-6 mx-lg-10">
          <!--begin::Label-->
          <label class="col-lg-4 col-form-label fw-bold fs-6">
            <span>Nilai</span>            
          </label>
          <!--end::Label-->
          <!--begin::Col-->
          <div class="col-lg-8 fv-row">
            <input type="text" id="nilai" name="nilai" class="form-control form-control-lg form-control-solid" placeholder="Nilai" value="{{ $pertanyaan->nilai }}">
            @error('nilai')
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
        <a href="/pertanyaan/{{ $pertanyaan->id_tes }}" class="btn btn-white btn-active-light-primary me-2">Batal</a>
        <button type="submit" class="btn btn-primary" >Simpan</button>
      </div>
      <!--end::Actions-->
    </form>
    <!--end::Form-->
  </div>
  <!--end::Content-->
</div>
@endsection