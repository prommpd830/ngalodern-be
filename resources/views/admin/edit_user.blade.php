@extends('layouts.master')

@section('title', 'Edit User')
@section('content')

@include('layouts.alert')
<div class="card mb-5 mb-xl-10">
  <!--begin::Card header-->
  <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
    <!--begin::Card title-->
    <div class="card-title m-0">
      <h3 class="fw-bolder m-0">Detail User</h3>
    </div>
    <!--end::Card title-->
  </div>
  <!--begin::Card header-->
  <!--begin::Content-->
  <div id="kt_account_profile_details" class="collapse show">
    <!--begin::Form-->
    <form class="form w-100" novalidate="novalidate" id="kt_sign_up_form" method="POST" action="{{ route('user.update', $data->id) }}" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <!--begin::Card body-->
      <div class="card-body border-top p-9">
        <!--begin::Input group-->
        <div class="row mb-6">
          <!--begin::Label-->
          <label class="col-lg-4 col-form-label fw-bold fs-6">Avatar</label>
          <!--end::Label-->
          <!--begin::Col-->
          <div class="col-lg-8">
            <!--begin::Image input-->
            <div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url(assets/media/avatars/blank.png)">
              <!--begin::Preview existing avatar-->
              <div class="image-input-wrapper w-125px h-125px" style="background-image: url({{ 'upload/profile/'.$data->image }})"></div>
              <!--end::Preview existing avatar-->
              <!--begin::Label-->
              <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                <i class="bi bi-pencil-fill fs-7"></i>
                <!--begin::Inputs-->
                <input type="file" name="image" accept=".png, .jpg, .jpeg" data-href="{{ route('profile.cropImg') }}" data-id="{{ $data->id }}">
                <input type="hidden" name="avatar_remove" />
                <!--end::Inputs-->
              </label>
              <!--end::Label-->
              <!--begin::Cancel-->
              <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
                <i class="bi bi-x fs-2"></i>
              </span>
              <!--end::Cancel-->
            </div>
            <!--end::Image input-->
            <!--begin::Hint-->
            <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
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
            <i class="fas fa-exclamation-circle ms-1 fs-7"></i>
          </label>
          <!--end::Label-->
          <!--begin::Col-->
          <div class="col-lg-8 fv-row">
            <input type="text" name="name" class="form-control form-control-lg form-control-solid" placeholder="Nama Lengkap" value="{{ $data->name }}" />
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
        <div class="row mb-6">
          <!--begin::Label-->
          <label class="col-lg-4 col-form-label fw-bold fs-6">
            <span class="required">Nomer Telepon</span>
            <i class="fas fa-exclamation-circle ms-1 fs-7"></i>
          </label>
          <!--end::Label-->
          <!--begin::Col-->
          <div class="col-lg-8 fv-row">
            <input type="text" name="no_telp" class="form-control form-control-lg form-control-solid" placeholder="Nomer Telepon" value="{{ $data->no_telp }}" />
          </div>
          <!--end::Col-->
        </div>
        <!--end::Input group-->
      </div>
      <!--end::Card body-->
      <!--begin::Actions-->
      <div class="card-footer d-flex justify-content-end py-6 px-9">
        <a href="{{ $data->id_role == 3 ? '/user' : '/editor' }}" class="btn btn-white btn-active-light-primary me-2">Kembali</a>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
      <!--end::Actions-->
    <!--end::Form-->
  </div>
</form>
  <!--end::Content-->
</div>

<div class="card mb-5 mb-xl-10">
  <!--begin::Card header-->
  <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_signin_method">
    <div class="card-title m-0">
      <h3 class="fw-bolder m-0">Autentikasi</h3>
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
          <div class="fs-6 fw-bolder mb-1">Email</div>
          <div class="fw-bold text-gray-600">{{ $data->email }}</div>
        </div>
        <!--end::Label-->
        <!--begin::Edit-->
        <div id="kt_signin_email_edit" class="flex-row-fluid d-none">
          <!--begin::Form-->
          <form class="form" action="{{ route('user.changeEmail', $data->id) }}" method="POST">
            @csrf
            <div class="row mb-6">
              <div class="col-lg-6 mb-4 mb-lg-0">
                <div class="fv-row mb-0">
                  <label for="emailaddress" class="form-label fs-6 fw-bolder mb-3">Masukkan Email Baru</label>
                  <input type="email" class="form-control form-control-lg form-control-solid" id="emailaddress" placeholder="Email Address" name="email" value="{{ $data->email }}" />
                </div>
              </div>
              <div class="col-lg-6">
                <div class="fv-row mb-0">
                  <label for="confirmemailpassword" class="form-label fs-6 fw-bolder mb-3">Konfirmasi Password</label>
                  <input type="password" class="form-control form-control-lg form-control-solid" name="password" id="confirmemailpassword" />
                </div>
              </div>
            </div>
            <div class="d-flex">
              <button type="submit" class="btn btn-primary me-2 px-6">Update Email</button>
              <button id="kt_signin_cancel" type="button" class="btn btn-color-gray-400 btn-active-light-primary px-6">Cancel</button>
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
          <div class="fs-6 fw-bolder mb-1">Password</div>
          <div class="fw-bold text-gray-600">************</div>
        </div>
        <!--end::Label-->
        <!--begin::Edit-->
        <div id="kt_signin_password_edit" class="flex-row-fluid d-none">
          <!--begin::Form-->
          <form class="form" novalidate="novalidate" method="POST" action="{{ route('user.changePassword', $data->id) }}">
            @csrf
            <div class="row mb-1">
              <div class="col-lg-4">
                <div class="fv-row mb-0">
                  <label for="currentpassword" class="form-label fs-6 fw-bolder mb-3">Password Terakhir</label>
                  <input type="password" class="form-control form-control-lg form-control-solid" name="current_password" id="currentpassword" />
                </div>
              </div>
              <div class="col-lg-4">
                <div class="fv-row mb-0">
                  <label for="newpassword" class="form-label fs-6 fw-bolder mb-3">Password Baru</label>
                  <input type="password" class="form-control form-control-lg form-control-solid" name="password" id="newpassword" />
                </div>
              </div>
              <div class="col-lg-4">
                <div class="fv-row mb-0">
                  <label for="password-confirm" class="form-label fs-6 fw-bolder mb-3">Konfirmasi Password Baru</label>
                  <input type="password" class="form-control form-control-lg form-control-solid" name="password_confirmed" id="password-confirm" />
                </div>
              </div>
            </div>
            <div class="form-text mb-5">Password harus menggunakan sekurangnya 8 karakter</div>
            <div class="d-flex">
              <button type="submit" class="btn btn-primary me-2 px-6">Update Password</button>
              <button id="kt_password_cancel" type="button" class="btn btn-color-gray-400 btn-active-light-primary px-6">Batal</button>
            </div>
          </form>
          <!--end::Form-->
        </div>
        <!--end::Edit-->
        <!--begin::Action-->
        <div id="kt_signin_password_button" class="ms-auto">
          <button class="btn btn-light btn-active-light-primary">Reset Password</button>
        </div>
        <!--end::Action-->
      </div>
      <!--end::Password-->
    </div>
    <!--end::Card body-->
  </div>
  <!--end::Content-->
</div>

<div class="modal fade" id="modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-capitalize" id="modalLabel">Crop image sebelum di upload</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="img-container">
            <div class="row">
                <div class="col-12">
                    <img id="image-crop" class="img-fluid rounded" src="https://avatars0.githubusercontent.com/u/3456749">
                </div>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary" id="crop">Upload</button>
        <button class="btn btn-primary btn-loading" type="button" disabled>
          <span class="spinner-border spinner-border-sm me-3" role="status" aria-hidden="true"></span>
          Loading...
        </button>
      </div>
    </div>
  </div>
</div>
<script>
 
var $modal = $('#modal');
var image = document.getElementById('image-crop');
var cropper;

$('.btn-loading').hide();
   
$('input[name="image"]').on("change", function(e){
    var files = e.target.files;
    var done = function (url) {
      image.src = url;
      $modal.modal('show');
    };
    var reader;
    var file;
    var url;
 
    if (files && files.length > 0) {
      file = files[0];
 
      if (URL) {
        done(URL.createObjectURL(file));
      } else if (FileReader) {
        reader = new FileReader();
        reader.onload = function (e) {
          done(reader.result);
        };
        reader.readAsDataURL(file);
      }
    }
});
 
$modal.on('shown.bs.modal', function () {
    cropper = new Cropper(image, {
      aspectRatio: 1,
      viewMode: 3,
      preview: '.preview'
    });
}).on('hidden.bs.modal', function () {
   cropper.destroy();
   cropper = null;
});
 
$("#crop").click(function(){
    $('#crop').hide();
    $('.btn-loading').show();
    canvas = cropper.getCroppedCanvas({
      width: 160,
      height: 160,
    });

    var href = $('input[name="image"]').data('href');
    var id = $('input[name="image"]').data('id');
 
    canvas.toBlob(function(blob) {
        url = URL.createObjectURL(blob);
        var reader = new FileReader();
         reader.readAsDataURL(blob); 
         reader.onloadend = function() {
            var base64data = reader.result; 
 
            $.ajax({
              type: "POST",
              dataType: "json",
              url: href,
              data: {
                '_token': $('input[name="_token"]').val(),
                'image': base64data,
                'id': id
              },
              complete: function () {
                $('.btn-loading').hide();
                $('#crop').show();
              },
              success: function(data){
                Swal.fire({
                  icon: 'success',
                  title: 'Berhasil!',
                  text: data.text,
                  showConfirmButton: false,
                  timer: 1000
                })
                $modal.modal('hide');
                location.reload();
              },
              error: function (data) {
                Swal.fire({
                  icon: 'error',
                  title: 'Oops...',
                  text: 'Status error ' + data.status
                })
              }
            });
         }
    });
})
 
</script>
@endsection