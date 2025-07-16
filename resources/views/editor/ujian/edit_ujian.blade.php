@extends('layouts.master')

@section('title', 'Edit Ujian')
@section('content')


@foreach ($ujian as $ujian)
<div class="row justify-content-center">
    <div class="col-lg-8">
        @include('layouts.alert')
        <div class="card mb-5 mb-xl-10">
            <!--begin::Card header-->
            <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
              <!--begin::Card title-->
              <div class="card-title m-0">
                <h3 class="fw-bolder m-0">Edit Ujian</h3>
              </div>
              <!--end::Card title-->
            </div>
            <!--begin::Card header-->
            <!--begin::Content-->
            <div id="kt_account_profile_details" class="collapse show" meth>
              <!--begin::Form-->
              <form class="form" method="POST" action="{{ route('ujian.update', $ujian->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <!--begin::Card body-->
                <div class="card-body border-top p-9">
                  <!--begin::Input group-->
                  <div class="fv-row mb-8 mx-lg-10">
                        <!--begin::Label-->
                        <label class="d-flex align-items-center fs-5 fw-bold mb-2">
                            <span class="">Bahasa</span>
                        </label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <div class="row fv-row">
                            <div class="col">
                                <!--begin:Option-->
                                <label class="d-flex flex-row cursor-pointer">
                                    <!--begin:Input-->
                                    <span class="form-check form-check-custom form-check-solid">
                                    <input class="form-check-input" type="radio" name="id_bahasa" value="1" {{ $ujian->id_bahasa == 1 ? 'checked' : '' }}>
                                    </span>
                                    <!--end:Input-->
                                    <!--begin:Label-->
                                    <span class="d-flex align-items-center ms-5">
                                    <!--begin:Info-->
                                    <span class="d-flex flex-column">
                                        <span class="fw-bolder fs-6">Indonesia</span>
                                    </span>
                                    <!--end:Info-->
                                    </span>
                                    <!--end:Label-->
                                </label>
                                <!--end::Option-->
                            </div>
                            <div class="col">
                                <!--begin:Option-->
                                <label class="d-flex flex-row cursor-pointer">
                                    <!--begin:Input-->
                                    <span class="form-check form-check-custom form-check-solid">
                                    <input class="form-check-input" type="radio" name="id_bahasa" value="2" {{ $ujian->id_bahasa == 2 ? 'checked' : '' }}>
                                    </span>
                                    <!--end:Input-->
                                    <!--begin:Label-->
                                    <span class="d-flex align-items-center ms-5">
                                    <!--begin:Info-->
                                    <span class="d-flex flex-column">
                                        <span class="fw-bolder fs-6">Sunda</span>
                                    </span>
                                    <!--end:Info-->
                                    </span>
                                    <!--end:Label-->
                                </label>
                                <!--end::Option-->
                            </div>
                        </div>
                        <!--end::Input-->
                  </div>
                  <!--end::Input group-->

                  <!--begin::Input group-->
                    <div class="fv-row mb-8 mx-lg-10">
                        <!--begin::Label-->
                        <label class="d-flex align-items-center fs-5 fw-bold mb-2">
                            <span class="">Nama Latihan</span>
                        </label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <div class="fv-row">
                            <input type="text" id="tes" name="tes" class="form-control form-control-lg form-control-solid" value="{{ $ujian->tes }}">
                            @error('tes')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <!--end::Input-->
                    </div>
                 <!--end::Input group-->

                  <!--begin::Input group-->
                  <div class="fv-row mb-8 mx-lg-10">
                    <!--begin::Label-->
                    <label class="d-flex align-items-center fs-5 fw-bold mb-2">
                        <span class="">Mata Pelajaran</span>
                    </label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <div class="fv-row">
                        <select name="id_mapel" class="form-select form-select-solid" data-control="select2">
                            @foreach ($mapel as $item)
                                <option value="{{ $item->id }}" {{ $item->id === $ujian->id_mapel ? 'selected' : '' }}>{{ $item->mapel }}</option>
                            @endforeach
                        </select>
                    </div>
                    <!--end::Input-->
                    </div>
                    <!--end::Input group-->

                  <!--begin::Input group-->
                  <div class="fv-row mb-8 mx-lg-10">
                        <!--begin::Label-->
                        <label class="d-flex align-items-center fs-5 fw-bold mb-2">
                            <span class="">Level</span>
                        </label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <div class="fv-row">
                            <select name="id_level" class="form-select form-select-solid" data-control="select2">
                                @foreach ($level as $item)
                                    <option value="{{ $item->id }}" {{ $item->id === $ujian->id_level ? 'selected' : '' }}>{{ $item->level }}</option>
                                @endforeach
                            </select>
                        </div>
                        <!--end::Input-->
                  </div>
                  <!--end::Input group-->
                  
                  <!--begin::Input group-->
                    <div class="fv-row mb-8 mx-lg-10">
                        <!--begin::Label-->
                        <label class="d-flex align-items-center fs-5 fw-bold mb-2">
                            <span class="">Status</span>
                        </label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <div class="fv-row">
                            <select name="status" class="form-select form-select-solid" data-kt-select2="true" data-hide-search="true" data-control="select2">
                                @foreach ($status as $data)
                                <option value="{{ $data->id }}" {{ $data->id == $ujian->status ? 'selected' : '' }}>{{ $data->status }}</option>
                                @endforeach
                            </select>
                        </div>
                        <!--end::Input-->
                    </div>
                  <!--end::Input group-->

                </div>
                <!--end::Card body-->
                <!--begin::Actions-->
                <div class="card-footer d-flex justify-content-end py-6 px-9">
                  <a href="/ujian" class="btn btn-white btn-active-light-primary me-2">Kembali</a>
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
@endforeach

@endsection