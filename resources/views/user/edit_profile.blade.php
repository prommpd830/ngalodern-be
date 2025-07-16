@extends('layouts.master')

@section('title', 'Edit Profile')
@section('content')

<div class="card mb-5 mb-xl-10">
  <!--begin::Card header-->
  <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
    <!--begin::Card title-->
    <div class="card-title m-0">
      <h3 class="fw-bolder m-0">Detail Profil</h3>
    </div>
    <!--end::Card title-->
  </div>
  <!--begin::Card header-->
  <!--begin::Content-->
  <div id="kt_account_profile_details" class="collapse show">
    <!--begin::Form-->
    <form id="kt_account_profile_details_form" class="form">
      <!--begin::Card body-->
      <div class="card-body border-top p-9">
        <!--begin::Input group-->
        <div class="row mb-6">
          <!--begin::Label-->
          <label class="col-lg-4 col-form-label fw-bold fs-6">Foto</label>
          <!--end::Label-->
          <!--begin::Col-->
          <div class="col-lg-8">
            <!--begin::Image input-->
            <div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url(assets/media/avatars/blank.png)">
              <!--begin::Preview existing avatar-->
              <div class="image-input-wrapper w-125px h-125px" style="background-image: url(assets/media/avatars/150-2.jpg)"></div>
              <!--end::Preview existing avatar-->
              <!--begin::Label-->
              <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Ubah Foto">
                <i class="bi bi-pencil-fill fs-7"></i>
                <!--begin::Inputs-->
                <input type="file" name="avatar" accept=".png, .jpg, .jpeg" />
                <input type="hidden" name="avatar_remove" />
                <!--end::Inputs-->
              </label>
              <!--end::Label-->
              <!--begin::Cancel-->
              <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Batalkan Pilihan">
                <i class="bi bi-x fs-2"></i>
              </span>
              <!--end::Cancel-->
              <!--begin::Remove-->
              <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Hapus Foto">
                <i class="bi bi-x fs-2"></i>
              </span>
              <!--end::Remove-->
            </div>
            <!--end::Image input-->
            <!--begin::Hint-->
            <div class="form-text">Tipe file yang diizinkan: png, jpg, jpeg.</div>
            <!--end::Hint-->
          </div>
          <!--end::Col-->
        </div>
        <!--end::Input group-->
        <!--begin::Input group-->
        <div class="row mb-6">
          <!--begin::Label-->
          <label class="col-lg-4 col-form-label fw-bold fs-6">
            <span class="required">Nama Lengkap</span>
          </label>
          <!--end::Label-->
          <!--begin::Col-->
          <div class="col-lg-8 fv-row">
            <input type="text" name="nama" class="form-control form-control-lg form-control-solid" placeholder="Nama Lengkap" value="{{Auth::user()->name}}" />
          </div>
          <!--end::Col-->
        </div>
        <!--end::Input group-->
        <!--begin::Input group-->
        <div class="row mb-6">
          <!--begin::Label-->
          <label class="col-lg-4 col-form-label fw-bold fs-6">
            <span class="required">Nomor Telepon</span>
            <i class="fas fa-exclamation-circle ms-1 fs-7"></i>
          </label>
          <!--end::Label-->
          <!--begin::Col-->
          <div class="col-lg-8 fv-row">
            <input type="text" name="phone" class="form-control form-control-lg form-control-solid" placeholder="Nomor Telepon" value="{{Auth::user()->no_telp}}" />
          </div>
          <!--end::Col-->
        </div>
        <!--end::Input group-->
        @if (Auth::user()->id_role == 3)
        <!--begin::Input group-->
        <div class="row mb-6">
          <!--begin::Label-->
          <label class="col-lg-4 col-form-label fw-bold fs-6">
            <span class="required">NISN/NPM</span>
            <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="NISN/NPM can't change"></i>
          </label>
          <!--end::Label-->
          <!--begin::Col-->
          <div class="col-lg-8 fv-row">
            <input type="tel" name="phone" class="form-control form-control-lg form-control-solid" placeholder="NISN / NPM" value="{{ Auth::user()->nisn ? Auth::user()->nisn : Auth::user()->npm }}" disabled/>
          </div>
          <!--end::Col-->
        </div>
        <!--end::Input group-->
        @endif
      </div>
      <!--end::Card body-->
      <!--begin::Actions-->
      <div class="card-footer d-flex justify-content-end py-6 px-9">
        <button type="reset" class="btn btn-white btn-active-light-primary me-2">Batal</button>
        <button type="submit" class="btn btn-primary" id="kt_account_profile_details_submit">Simpan</button>
      </div>
      <!--end::Actions-->
    </form>
    <!--end::Form-->
  </div>
  <!--end::Content-->
</div>

<div class="card mb-5 mb-xl-10">
  <!--begin::Card header-->
  <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_signin_method">
    <div class="card-title m-0">
      <h3 class="fw-bolder m-0">Metode Masuk</h3>
    </div>
  </div>
  <!--end::Card header-->
  <!--begin::Content-->
  <div id="kt_account_signin_method" class="collapse show">
    <!--begin::Card body-->
    <div class="card-body border-top p-9">
      <!--begin::Email Address-->
      <div class="d-flex flex-wrap align-items-center">
        <!--begin::Label-->
        <div id="kt_signin_email">
          <div class="fs-6 fw-bolder mb-1">Alamat E-Mail</div>
          <div class="fw-bold text-gray-600">{{Auth::user()->email}}</div>
        </div>
        <!--end::Label-->
        <!--begin::Edit-->
        <div id="kt_signin_email_edit" class="flex-row-fluid d-none">
          <!--begin::Form-->
          <form id="kt_signin_change_email" class="form" novalidate="novalidate">
            <div class="row mb-6">
              <div class="col-lg-6 mb-4 mb-lg-0">
                <div class="fv-row mb-0">
                  <label for="emailaddress" class="form-label fs-6 fw-bolder mb-3">Masukan alamat email baru</label>
                  <input type="email" class="form-control form-control-lg form-control-solid" id="emailaddress" placeholder="Alamat E-Mail" name="emailaddress" value="{{Auth::user()->email}}" />
                </div>
              </div>
              <div class="col-lg-6">
                <div class="fv-row mb-0">
                  <label for="confirmemailpassword" class="form-label fs-6 fw-bolder mb-3">Konfirmasi Kata Sandi</label>
                  <input type="password" class="form-control form-control-lg form-control-solid" name="confirmemailpassword" id="confirmemailpassword" />
                </div>
              </div>
            </div>
            <div class="d-flex">
              <button id="kt_signin_submit" type="button" class="btn btn-primary me-2 px-6">Perbarui Email</button>
              <button id="kt_signin_cancel" type="button" class="btn btn-color-gray-400 btn-active-light-primary px-6">Batal</button>
            </div>
          </form>
          <!--end::Form-->
        </div>
        <!--end::Edit-->
        <!--begin::Action-->
        <div id="kt_signin_email_button" class="ms-auto">
          <button class="btn btn-light btn-active-light-primary">Ubah Email</button>
        </div>
        <!--end::Action-->
      </div>
      <!--end::Email Address-->
      <!--begin::Separator-->
      <div class="separator separator-dashed my-6"></div>
      <!--end::Separator-->
      <!--begin::Password-->
      <div class="d-flex flex-wrap align-items-center mb-10">
        <!--begin::Label-->
        <div id="kt_signin_password">
          <div class="fs-6 fw-bolder mb-1">Kata Sandi</div>
          <div class="fw-bold text-gray-600">************</div>
        </div>
        <!--end::Label-->
        <!--begin::Edit-->
        <div id="kt_signin_password_edit" class="flex-row-fluid d-none">
          <!--begin::Form-->
          <form id="kt_signin_change_password" class="form" novalidate="novalidate">
            <div class="row mb-1">
              <div class="col-lg-4">
                <div class="fv-row mb-0">
                  <label for="currentpassword" class="form-label fs-6 fw-bolder mb-3">Kata Sandi saat ini</label>
                  <input type="password" class="form-control form-control-lg form-control-solid" name="currentpassword" id="currentpassword" />
                </div>
              </div>
              <div class="col-lg-4">
                <div class="fv-row mb-0">
                  <label for="newpassword" class="form-label fs-6 fw-bolder mb-3">Kata Sandi baru</label>
                  <input type="password" class="form-control form-control-lg form-control-solid" name="newpassword" id="newpassword" />
                </div>
              </div>
              <div class="col-lg-4">
                <div class="fv-row mb-0">
                  <label for="confirmpassword" class="form-label fs-6 fw-bolder mb-3">Konfirmasi Kata Sandi</label>
                  <input type="password" class="form-control form-control-lg form-control-solid" name="confirmpassword" id="confirmpassword" />
                </div>
              </div>
            </div>
            <div class="form-text mb-5">Kata Sandi harus minimal 8 karakter dan mengandung simbol</div>
            <div class="d-flex">
              <button id="kt_password_submit" type="button" class="btn btn-primary me-2 px-6">Ubah Kata Sandi</button>
              <button id="kt_password_cancel" type="button" class="btn btn-color-gray-400 btn-active-light-primary px-6">Batal</button>
            </div>
          </form>
          <!--end::Form-->
        </div>
        <!--end::Edit-->
        <!--begin::Action-->
        <div id="kt_signin_password_button" class="ms-auto">
          <button class="btn btn-light btn-active-light-primary">Reset Kata Sandi</button>
        </div>
        <!--end::Action-->
      </div>
      <!--end::Password-->
    </div>
    <!--end::Card body-->
  </div>
  <!--end::Content-->
</div>
@endsection