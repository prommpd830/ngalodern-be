@extends('layouts.master')

@section('title', 'Edit Latihan')
@section('content')


@foreach ($latihan as $latihan)
<div class="row justify-content-center">
    <div class="col-lg-8">
        @include('layouts.alert')
        <div class="card mb-5 mb-xl-10">
            <!--begin::Card header-->
            <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
              <!--begin::Card title-->
              <div class="card-title m-0">
                <h3 class="fw-bolder m-0">Edit Latihan</h3>
              </div>
              <!--end::Card title-->
            </div>
            <!--begin::Card header-->
            <!--begin::Content-->
            <div id="kt_account_profile_details" class="collapse show" meth>
              <!--begin::Form-->
              <form class="form" method="POST" action="{{ route('latihan.update', $latihan->id) }}" enctype="multipart/form-data">
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
                            @foreach ($bahasa as $data)
                            <div class="col-6">
                                <!--begin:Option-->
                                <label class="d-flex flex-row cursor-pointer">
                                    <!--begin:Input-->
                                    <span class="form-check form-check-custom form-check-solid">
                                    <input class="form-check-input" type="radio" name="id_bahasa" value="{{ $data->id }}" {{ $latihan->id_bahasa == $data->id ? 'checked' : '' }}>
                                    </span>
                                    <!--end:Input-->
                                    <!--begin:Label-->
                                    <span class="d-flex align-items-center ms-5">
                                    <!--begin:Info-->
                                    <span class="d-flex flex-column">
                                        <span class="fw-bolder fs-6">{{ $data->bahasa }}</span>
                                    </span>
                                    <!--end:Info-->
                                    </span>
                                    <!--end:Label-->
                                </label>
                                <!--end::Option-->
                            </div>
                            @endforeach
                            @error('id_bahasa')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <!--end::Input-->
                    <!--end::Label-->
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
                            <option value="">Pilih Mapel</option>
                            @foreach ($mapel as $item)
                                <option value="{{ $item->id }}" {{ $item->id == $latihan->id_mapel ? 'selected' : '' }}>{{ $item->mapel }}</option>
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
                                <option value="">Pilih Level</option>
                                @foreach ($level as $item)
                                    <option value="{{ $item->id }}" {{ $item->id == $latihan->id_level ? 'selected' : '' }}>{{ $item->level }}</option>
                                @endforeach
                            </select>
                        </div>
                        <!--end::Input-->
                  </div>
                  <!--end::Input group-->

                  <div class="text-center d-none loading-list">
                      <div class="spinner-border" role="status">
                        <span class="visually-hidden">Loading...</span>
                      </div>
                  </div>

                  <div id="list-materi" data-href="/listMateri">
                  <!--begin::Input group-->
                    <div class="fv-row mb-8 mx-lg-10">
                        <!--begin::Label-->
                        <label class="d-flex align-items-center fs-5 fw-bold mb-2">
                            <span class="">Materi</span>
                        </label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <div class="fv-row">
                            <select name="id_materi" class="form-select form-select-solid" data-control="select2" data-value="{{ $latihan->id_materi }}">
                                <option value="">Pilih Materi</option>
                            </select>
                            @error('id_materi')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <!--end::Input-->
                    </div>
                    <!--end::Input group-->
                  </div>

                  <!--begin::Input group-->
                    <div class="fv-row mb-8 mx-lg-10">
                        <!--begin::Label-->
                        <label class="d-flex align-items-center fs-5 fw-bold mb-2">
                            <span class="">Nama Latihan</span>
                        </label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <div class="fv-row">
                            <input type="text" id="tes" name="tes" class="form-control form-control-lg form-control-solid" value="{{ $latihan->tes }}">
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
                            <span class="">Status</span>
                        </label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <div class="fv-row">
                            <select name="status" class="form-select form-select-solid" data-kt-select2="true" data-hide-search="true" data-control="select2">
                                @foreach ($status as $data)
                                <option value="{{ $data->id }}" {{ $latihan->status == $data->id ? 'selected' : '' }}>{{ $data->status }}</option>
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
                    <a href="{{ route('latihan.index') }}" class="btn btn-white btn-active-light-primary me-2">Batal</a>
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

<script type="text/javascript">

    $(document).ready(function () {

        function loadMateri() {
            var bahasa = $('input[name="id_bahasa"]:checked').val();
            var mapel = $('select[name="id_mapel"]').val();
            var level = $('select[name="id_level"]').val();
            var href = $('#list-materi').data('href');
            var token = $('input[name="_token"]').val();

            $.ajax({
                url: href,
                type: 'POST',
                dataType: 'json',
                data: {
                    bahasa: bahasa,
                    mapel: mapel,
                    level: level,
                    tipe: 'latihan',
                    _token: token
                },
                beforeSend: function () {
                    $('.loading-list').toggleClass('d-none');
                },
                complete: function () {
                    $('.loading-list').toggleClass('d-none');
                },
                success: function (data) {
                    var select = $('#list-materi').find('select[name="id_materi"]');

                    if (data.status == true) {
                        select.html("");
                        select.append('<option value="">Pilih Materi</option>');

                        $.each(data.materi, function( index, value ) {
                            if (value.id == select.data('value')) {
                                select.append('<option value="'+ value.id +'" selected>'+ value.materi +' ('+ value.bahasa.bahasa +')</option>');
                            } else {
                                select.append('<option value="'+ value.id +'">'+ value.materi +' ('+ value.bahasa.bahasa +')</option>');
                            }
                        });

                    }

                    if (data.status == false) {
                        select.html("");
                        select.append('<option value="">Pilih Materi</option>');
                    }

                },
                error: function (data) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Status error ' + data.status
                    })
                }
            })
        }

        $('input[name="id_bahasa"]').change(function () {
            loadMateri();
        })

        $('select[name="id_mapel"]').change(function () {
            loadMateri();
        })

        $('select[name="id_level"]').change(function () {
            loadMateri();
        })

        loadMateri();
        
    })
</script>

@endsection