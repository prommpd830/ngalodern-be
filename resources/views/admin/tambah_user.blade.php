@extends('layouts.master')

@section('title', 'Tambah Pengguna')
@section('content')
<!--begin::Wrapper-->
<div class="w-lg-600px bg-white rounded shadow-sm p-10 p-lg-15 mx-auto">
  <!--begin::Form-->
  <form class="form w-100" novalidate="novalidate" id="kt_sign_up_form" method="POST" action="{{ route('user.store') }}" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="id_role" value="{{ $id == 3 ? 3 : 2 }}">
    <!--begin::Heading-->
    <div class="mb-10 text-center">
      <!--begin::Title-->
      <h1 class="text-dark mb-3">Tambah Akun User</h1>
      <!--end::Title-->
    </div>
    <!--end::Heading-->
    
    <!--begin::Image input-->
    <div class="image-input image-input-empty" data-kt-image-input="true" style="background-image: url(/assets/media/avatars/blank.png)">
      <!--begin::Image preview wrapper-->
      <div class="image-input-wrapper w-125px h-125px"></div>
      <!--end::Image preview wrapper-->

      <!--begin::Edit button-->
      <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow"
        data-kt-image-input-action="change"
        data-bs-toggle="tooltip"
        data-bs-dismiss="click"
        title="Change avatar">
          <i class="bi bi-pencil-fill fs-7"></i>

          <!--begin::Inputs-->
          <input type="file" name="image" accept=".png, .jpg, .jpeg" value="{{ old('image') }}"/>
          <input type="hidden" name="avatar_remove" />
          <!--end::Inputs-->
      </label>
      <!--end::Edit button-->

      <!--begin::Cancel button-->
      <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow"
        data-kt-image-input-action="cancel"
        data-bs-toggle="tooltip"
        data-bs-dismiss="click"
        title="Cancel avatar">
          <i class="bi bi-x fs-2"></i>
      </span>
      <!--end::Cancel button-->

      <!--begin::Remove button-->
      <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow"
        data-kt-image-input-action="remove"
        data-bs-toggle="tooltip"
        data-bs-dismiss="click"
        title="Remove avatar">
          <i class="bi bi-x fs-2"></i>
      </span>
      <!--end::Remove button-->
    </div>
    <!--end::Image input-->
    <!--begin::Hint-->
    <div class="form-text mb-7">Allowed file types: png, jpg, jpeg.</div>
    <!--end::Hint-->

    @if ($id == 3)
    <!--begin::Input group-->
    <div class="row fv-row mb-7">
      <!--begin::Col-->
      <div class="form-group col-xl-12">
        <label class="form-label fw-bolder text-dark fs-6">Register Sebagai</label>
        <select name="id_kategori" id="kategori" class="form-control form-control-lg form-control-solid" data-control="select2">
          <option value="1">Umum</option>
          <option value="2">Pelajar</option>
          <option value="3">Mahasiswa</option>
        </select>
      </div>
      <!--end::Col-->
    </div>
    <!--end::Input group-->

    <div id="kategori-option" class="row fv-row mb-7">
      <!--begin::Col-->
      <div class="form-group option d-none col-xl-12">
        <label class="form-label fw-bolder text-dark fs-6">NISN</label>
        <input id="nisn" type="text" class="form-control form-control-lg form-control-solid @error('nisn') is-invalid @enderror" name="nisn" value="{{ old('nisn') }}" maxlength="10" required autocomplete="nisn" autofocus>
      </div>
      <!--end::Col-->
      <!--begin::Col-->
      <div class="form-group option d-none col-xl-12">
        <label class="form-label fw-bolder text-dark fs-6">NPM</label>
        <input id="npm" type="text" class="form-control form-control-lg form-control-solid @error('npm') is-invalid @enderror" name="npm" value="{{ old('npm') }}" maxlength="15" autocomplete="" autofocus>
      </div>
      <!--end::Col-->
    </div>
    @endif
                  
    <!--begin::Input group-->
    <div class="row fv-row mb-7">
      <!--begin::Col-->
      <div class="col-xl-12">
        <label class="form-label fw-bolder text-dark fs-6">Nama Lengkap</label>
        <input id="name" type="text" class="form-control form-control-lg form-control-solid @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

        @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
      </div>
      <!--end::Col-->
    </div>
    <!--end::Input group-->
    <!--begin::Input group-->
    <div class="row fv-row mb-7">
      <!--begin::Col-->
      <div class="col-xl-12">
        <label class="form-label fw-bolder text-dark fs-6">No Telepon</label>
        <input id="no_telp" type="text" class="form-control form-control-lg form-control-solid @error('no_telp') is-invalid @enderror" name="no_telp" value="{{ old('no_telp') }}" required autocomplete="no_telp" autofocus>

        @error('no_telp')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
      <!--end::Col-->
    </div>
    <!--end::Input group-->
    <!--begin::Input group-->
    <div class="fv-row mb-7">
      <label class="form-label fw-bolder text-dark fs-6">Email</label>
      <input id="email" type="email" class="form-control form-control-lg form-control-solid @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

      @error('email')
      <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
      </span>
      @enderror
    </div>
    <!--end::Input group-->
    <!--begin::Input group-->
    <div class="mb-10 fv-row" data-kt-password-meter="true">
      <!--begin::Wrapper-->
      <div class="mb-1">
        <!--begin::Label-->
        <label class="form-label fw-bolder text-dark fs-6">Password</label>
        <!--end::Label-->
        <!--begin::Input wrapper-->
        <div class="position-relative mb-3">
          <input id="password" type="password" class="form-control form-control-lg form-control-solid @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

          @error('password')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
          @enderror
          <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">
            <i class="bi bi-eye-slash fs-2"></i>
            <i class="bi bi-eye fs-2 d-none"></i>
          </span>
        </div>
        <!--end::Input wrapper-->
      </div>
      <!--end::Wrapper-->
      <!--begin::Hint-->
      <div class="text-muted">Gunakan minimal 8 karakter.</div>
      <!--end::Hint-->
    </div>
    <!--end::Input group=-->
    <!--begin::Input group-->
    <div class="fv-row mb-5">
      <label class="form-label fw-bolder text-dark fs-6">Konfirmasi Password</label>
                      <input id="password-confirm" type="password" class="form-control form-control-lg form-control-solid" name="password_confirmation" required autocomplete="new-password">
    </div>
    <!--end::Input group-->
    <!--begin::Actions-->
    <div class="text-center">
      <a href="{{ route('user.index') }}" class="btn btn-white btn-active-light-primary me-2">Batal</a>
      <button type="submit" class="btn btn-primary">
          {{ __('Tambah') }}
      </button>
    </div>
    <!--end::Actions-->
  </form>
  <!--end::Form-->
</div>
<!--end::Wrapper-->
<script src="{{ asset('assets/js/custom/select.js')}}"></script>
@endsection