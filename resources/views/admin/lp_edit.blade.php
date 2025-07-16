@extends('layouts.master')

@section('title', 'Edit Landing Page')
@section('content')


<div class="row justify-content-center">
    <div class="col-lg-12">
        @include('layouts.alert')
        <div class="card mb-5 mb-xl-10">
            <!--begin::Card header-->
            <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
              <!--begin::Card title-->
              <div class="card-title m-0">
                <h3 class="fw-bolder m-0">Edit Landing Page</h3>
              </div>
              <!--end::Card title-->
            </div>
            <!--begin::Card header-->
            <!--begin::Content-->
            <div id="kt_account_profile_details" class="collapse show" meth>
              <!--begin::Form-->
              <form class="form" method="POST" action="{{ route('lp.update') }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <input type="hidden" name="id_landing" value="{{ $landing->id }}">
                <input type="hidden" name="id_about" value="{{ $about->id }}">
                <!--begin::Card body-->
                <div class="card-body border-top p-9">

                  <!--begin::Input group-->
                    <div class="row mb-8 mx-lg-10">
                        <div class="col-md-6 my-md-0 my-3">
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-5 fw-bold mb-2">
                                <span class="text-capitalize">Title Page</span>
                            </label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <div class="fv-row">
                                <input type="text" id="title_landing" name="title_landing" class="form-control form-control-lg form-control-solid" placeholder="Masukan Title Page" value="{{ $landing->title }}" required>
                                @error('title_landing')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <!--end::Input-->
                        </div>
                        <div class="col-md-6 my-md-0 my-3">
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-5 fw-bold mb-2">
                                <span class="text-capitalize">Header</span>
                            </label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <div class="fv-row">
                                <input type="text" id="header_landing" name="header_landing" class="form-control form-control-lg form-control-solid" placeholder="Masukan Header Page" value="{{ $landing->header }}" required>
                                @error('header_landing')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <!--end::Input-->
                        </div>
                    </div>
                  <!--end::Input group-->

                  <!--begin::Input group-->
                  <div class="row mb-8 mx-lg-10">
                    <!--begin::Label-->
                    <label class="col-lg-4 col-form-label fw-bold fs-6">Logo</label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <div class="col-lg-8">
                    <!--begin::Image input-->
                    <div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url(assets/media/avatars/blank.png)">
                        <!--begin::Preview existing avatar-->
                        <div class="image-input-wrapper w-125px h-125px" style="background-image: url({{ 'assets/media/logos/'.str_replace(' ', '%20',$landing->logo)}})"></div>
                        <!--end::Preview existing avatar-->
                        <!--begin::Label-->
                        <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change logo">
                        <i class="bi bi-pencil-fill fs-7"></i>
                        <!--begin::Inputs-->
                        <input type="file" name="logo" accept=".png, .jpg, .jpeg">
                        <input type="hidden" name="avatar_remove" />
                        <!--end::Inputs-->
                        </label>
                        <!--end::Label-->
                        <!--begin::Cancel-->
                        <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel logo">
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

                  <div class="separator my-3"></div>
                  
                  <div class="text-center my-10">
                    <h3 class="text-gray-700">About</h3>
                  </div>

                  <!--begin::Input group-->
                  <div class="row mb-8 mx-lg-10">
                    <div class="col-md-6 my-md-0 my-3">
                        <!--begin::Label-->
                        <label class="d-flex align-items-center fs-5 fw-bold mb-2">
                            <span class="text-capitalize">Title</span>
                        </label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <div class="fv-row">
                            <input type="text" id="title_about" name="title_about" class="form-control form-control-lg form-control-solid" placeholder="Masukan Title About" value="{{ $about->title }}" required>
                            @error('title_about')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <!--end::Input-->
                    </div>
                    <div class="col-md-6 my-md-0 my-3">
                        <!--begin::Input group-->
                        <div class="row mb-8 mx-lg-10">
                            <!--begin::Label-->
                            <label class="col-lg-4 col-form-label fw-bold fs-6">Image</label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8">
                            <!--begin::Image input-->
                            <div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url(assets/media/avatars/blank.png)">
                                <!--begin::Preview existing avatar-->
                                <div class="image-input-wrapper w-125px h-125px" style="background-image: url({{ 'assets/media/illustrations/'.str_replace(' ', '%20',$about->image)}})"></div>
                                <!--end::Preview existing avatar-->
                                <!--begin::Label-->
                                <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                                <i class="bi bi-pencil-fill fs-7"></i>
                                <!--begin::Inputs-->
                                <input type="file" name="img_about" accept=".png, .jpg, .jpeg">
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
                    </div>
                  </div>
                  <!--end::Input group-->

                  <!--begin::Input group-->
                    <div class="row mb-8 mx-lg-10">
                        <div class="col-12">
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-5 fw-bold mb-2">
                                <span class="text-capitalize">Deskripsi</span>
                            </label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <div class="fv-row">
                                <textarea id="deskripsi_about" name="deskripsi_about" class="form-control form-control-lg form-control-solid" placeholder="Masukan Deskripsi About" rows="6" required>{{ $about->deskripsi }}</textarea>
                                @error('deskripsi_about')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <!--end::Input-->
                        </div>
                        <!--end::Col-->
                    </div>
                  <!--end::Input group-->


                  <div class="separator my-3"></div>

                  <div class="text-center my-10">
                    <h3 class="text-gray-700">Video</h3>
                  </div>

                  <!--begin::Input group-->
                    <div class="row mb-8 mx-lg-10">
                        <div class="col-md-4 my-md-0 my-3">
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-5 fw-bold mb-2">
                                <span class="text-capitalize">URL Video</span>
                            </label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <div class="fv-row">
                                <input type="text" id="video_1" name="video_1" class="form-control form-control-lg form-control-solid" placeholder="Masukan URL Video" value="{{ $landing->video_1 }}">
                                @error('video_1')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <!--end::Input-->
                        </div>
                        
                        <div class="col-md-4 my-md-0 my-3">
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-5 fw-bold mb-2">
                                <span class="text-capitalize">URL Video</span>
                            </label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <div class="fv-row">
                                <input type="text" id="video_2" name="video_2" class="form-control form-control-lg form-control-solid" placeholder="Masukan URL Video" value="{{ $landing->video_2 }}">
                                @error('video_2')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <!--end::Input-->
                        </div>
                    </div>
                  <!--end::Input group-->

                  <div class="separator my-3"></div>

                  <div class="text-center my-10">
                    <h3 class="text-gray-700">Footer</h3>
                  </div>

                  <!--begin::Input group-->
                  @foreach ($footerS as $item)
                    <div class="row mb-8 mx-lg-10">
                        <div class="col-12 my-5">
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-5 fw-bold mb-2">
                                <span class="text-capitalize">Title Footer {{ $loop->iteration }}</span>
                            </label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <div class="fv-row">
                                <input type="text" id="title_footer_{{ $item->id }}" name="title_footer_{{ $item->id }}" class="form-control form-control-lg form-control-solid" placeholder="Masukan Title Footer" value="{{ $item->title }}">
                                @error('title_footer_'.$item->id)
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <!--end::Input-->
                        </div>
                        <div class="col-md-12">
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-5 fw-bold mb-2">
                                <span class="text-capitalize">Deskripsi</span>
                            </label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <div class="fv-row">
                                <textarea id="deskripsi_footer_2_{{ $item->id }}" name="deskripsi_footer_1_{{ $item->id }}" class="form-control form-control-lg form-control-solid" placeholder="Masukan Deskripsi" rows="6">{{ $item->deskripsi_1 }}</textarea>
                                @error('deskripsi_footer_2_'.$item->id)
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <!--end::Input-->
                        </div>
                        <!--end::Col-->
                        <div class="col-md-4 my-3">
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-5 fw-bold mb-2">
                                <span class="text-capitalize">Telepon</span>
                            </label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <div class="fv-row">
                                <input type="text" id="telepon_{{ $item->id }}" name="telepon_{{ $item->id }}" class="form-control form-control-lg form-control-solid" placeholder="Masukan Telepon Footer" value="{{ $item->telepon }}" required>
                                @error('telepon_'.$item->id)
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <!--end::Input-->
                        </div>
                        <div class="col-md-4 my-3">
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-5 fw-bold mb-2">
                                <span class="text-capitalize">Fax</span>
                            </label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <div class="fv-row">
                                <input type="text" id="fax_{{ $item->id }}" name="fax_{{ $item->id }}" class="form-control form-control-lg form-control-solid" placeholder="Masukan Fax Footer" value="{{ $item->fax }}" required>
                                @error('fax_'.$item->id)
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <!--end::Input-->
                        </div>
                        <div class="col-md-4 my-3">
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-5 fw-bold mb-2">
                                <span class="text-capitalize">Email</span>
                            </label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <div class="fv-row">
                                <input type="text" id="email_{{ $item->id }}" name="email_{{ $item->id }}" class="form-control form-control-lg form-control-solid" placeholder="Masukan Email Footer" value="{{ $item->email }}" required>
                                @error('email_'.$item->id)
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <!--end::Input-->
                        </div>
                    </div>
                  @endforeach
                  <!--end::Input group-->

                @foreach ($footerL as $item)
                <div class="row mb-8 mx-lg-10">
                  <div class="col-12 my-5">
                      <!--begin::Input group-->
                      <div class="row mb-8 mx-lg-10">
                        <!--begin::Label-->
                        <label class="col-lg-4 col-form-label fw-bold fs-6">Logo</label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="col-lg-8">
                        <!--begin::Image input-->
                        <div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url(assets/media/avatars/blank.png)">
                            <!--begin::Preview existing avatar-->
                            <div class="image-input-wrapper w-125px h-125px" style="background-image: url({{ 'assets/media/logos/'.str_replace(' ', '%20',$item->logo)}})"></div>
                            <!--end::Preview existing avatar-->
                            <!--begin::Label-->
                            <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                            <i class="bi bi-pencil-fill fs-7"></i>
                            <!--begin::Inputs-->
                            <input type="file" name="footer_logo" accept=".png, .jpg, .jpeg">
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
                  </div>
                </div>
                @endforeach

                <div class="separator my-3"></div>

                <div class="text-center my-10">
                    <h3 class="text-gray-700">Kontak</h3>
                </div>

                <div class="row mb-8 mx-lg-10">
                    <div class="col-md-4 my-3">
                        <!--begin::Label-->
                        <label class="d-flex align-items-center fs-5 fw-bold mb-2">
                            <span class="text-capitalize">Facebook</span>
                        </label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <div class="fv-row">
                            <input type="text" id="facebook" name="facebook" class="form-control form-control-lg form-control-solid" placeholder="Masukan Facebook" value="{{ $footerK->facebook }}">
                            @error('facebook')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <!--end::Input-->
                    </div>
                    <div class="col-md-4 my-3">
                        <!--begin::Label-->
                        <label class="d-flex align-items-center fs-5 fw-bold mb-2">
                            <span class="text-capitalize">Twitter</span>
                        </label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <div class="fv-row">
                            <input type="text" id="twitter" name="twitter" class="form-control form-control-lg form-control-solid" placeholder="Masukan Twitter" value="{{ $footerK->twitter }}">
                            @error('twitter')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <!--end::Input-->
                    </div>
                    <div class="col-md-4 my-3">
                        <!--begin::Label-->
                        <label class="d-flex align-items-center fs-5 fw-bold mb-2">
                            <span class="text-capitalize">Instagram</span>
                        </label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <div class="fv-row">
                            <input type="text" id="instagram" name="instagram" class="form-control form-control-lg form-control-solid" placeholder="Masukan Instagram" value="{{ $footerK->instagram }}">
                            @error('instagram')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <!--end::Input-->
                    </div>
                    <div class="col-md-4 my-3">
                        <!--begin::Label-->
                        <label class="d-flex align-items-center fs-5 fw-bold mb-2">
                            <span class="text-capitalize">Youtube</span>
                        </label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <div class="fv-row">
                            <input type="text" id="youtube" name="youtube" class="form-control form-control-lg form-control-solid" placeholder="Masukan Youtube" value="{{ $footerK->youtube }}">
                            @error('youtube')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <!--end::Input-->
                    </div>
                    <div class="col-md-4 my-3">
                        <!--begin::Label-->
                        <label class="d-flex align-items-center fs-5 fw-bold mb-2">
                            <span class="text-capitalize">Linkedin</span>
                        </label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <div class="fv-row">
                            <input type="text" id="linkedin" name="linkedin" class="form-control form-control-lg form-control-solid" placeholder="Masukan Linkedin" value="{{ $footerK->linkedin }}" >
                            @error('linkedin')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <!--end::Input-->
                    </div>
                  </div>


                </div>
                <!--end::Card body-->
                <!--begin::Actions-->
                <div class="card-footer d-flex justify-content-end py-6 px-9">
                  <a href="{{ route('materi.index') }}" class="btn btn-white btn-active-light-primary me-2">Batal</a>
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