@extends('layouts.master')

@section('title', 'Ujian')
@section('content')
@if (count($ujian) == 0)
<div class="container">
    <div class="card w-100">
      <div class="card-body">
        <p class="text-gray-500 fs-5 fw-bold text-center my-5">{{ $text }}</p>
      </div>
    </div>
</div>
@else
<section id="hasil">
  <div class="row">
    <div class="col-lg-3 mb-5">
      <div class="card card-flush min-h-lg-75">
        <div class="card-header">
          <h1 class="card-title fw-bolder text-gray-700 fs-1">Nomor</h1>
        </div>
        <div class="card-body py-0 mb-lg-10">
          <ul class="nav nav-tabs nav-line-tabs border-0 mb-10 p-0">
            @foreach ($ujian as $data)
            @if (count($data->pertanyaan) == 0)
            <div class="container-fluid">
              <p class="text-gray-500 fs-5 fw-bold text-center my-5">Nomor tidak ditemukan</p>
            </div>
            @else
              @foreach ($data->pertanyaan as $item)
              <li class="nav-item symbol symbol-40px mb-2 ms-2">
                <a data-bs-toggle="tab" href="#soal{{ $item->nomer }}" class="nav-link symbol-label border-0 fw-bold m-0 {{ $item->nomer == 1 ? 'active': '' }}">{{ $item->nomer }}</a>
              </li>
              @endforeach
            @endif
            @endforeach
          </ul>
        </div>
      </div>
    </div>

    @foreach ($ujian as $data)
    <div class="col-lg-9">
      <div class="card card-flush min-h-lg-75 overflow-hidden">
        <div class="card-header justify-content-center my-5">
          <h1 class="card-title fw-bolder text-dark fs-2hx text-uppercase">{{ $data->tes }}</h1>
        </div>
        <div class="card-body fs-6 pt-0 px-10 px-lg-15">
          <form class="mx-auto w-100 pb-10" novalidate="novalidate" id="kt_modal_create_project_form" action="u/hasil_ujian" method="post">
            @csrf
            <input type="hidden" name="id" value="{{ $data->id }}">
            <!--begin::Type-->
            <div class="tab-content" data-kt-stepper-element="content" id="myTabContent">
              <!--begin::Wrapper-->
              @if (count($data->pertanyaan) == 0)
              <div class="container-fluid">
                  <p class="text-gray-500 fs-5 fw-bold text-center my-5">Pertanyaan tidak ditemukan</p>
              </div>
              @else
                @foreach ($data->pertanyaan as $item)
                  <div class="tab-pane current fade {{ $item->nomer == 1 ? 'show active': '' }} w-100" id="soal{{ $item->nomer }}" role="tabpanel">
                    <!--begin::Pertanyaan-->
                    <div class="text-gray-700 fw-bold fs-2 my-5 text-start">
                      No. {{ $item->nomer }}
                    </div>
                    <!--end::Pertanyaan-->
                    <!--begin::Pertanyaan-->
                    <div class="text-gray-400 fw-bold fs-2 my-5 text-start overflow-auto">
                      {!! $item->pertanyaan !!}
                    </div>
                    <!--end::Pertanyaan-->
                    <!--begin::Input group-->
                    <div class="fv-row row justify-content-center" data-kt-buttons="true" data-no="{{ $item->nomer }}">
                      <!--begin::Option-->
                      <label class="col-lg-5 btn btn-outline btn-outline-dashed btn-outline-default d-flex text-start p-6 m-3 m-lg-5">
                        <!--begin::Input-->
                        <input class="btn-check" type="radio" name="{{ $item->id }}" value="a" />
                        <!--end::Input-->
                        <!--begin::Label-->
                        <span class="d-flex">
                          <!--begin::Icon-->
                          <!--begin::Svg Icon | path: icons/duotone/General/User.svg-->
                          <div class="symbol symbol-50px">
                            <div class="symbol-label bg-primary text-inverse-primary fs-2 fw-bold">A</div>
                          </div>
                          <!--end::Svg Icon-->
                          <!--end::Icon-->
                          <!--begin::Info-->
                          <span class="d-flex my-auto ms-4 w-600px">
                            <span class="fs-4 fw-bolder text-gray-900 d-block">{{ $item->a }}</span>
                          </span>
                          <!--end::Info-->
                        </span>
                        <!--end::Label-->
                      </label>
                      <!--end::Option-->
                      <!--begin::Option-->
                      <label class="col-lg-5 btn btn-outline btn-outline-dashed btn-outline-default d-flex text-start p-6 m-3 m-lg-5">
                        <!--begin::Input-->
                        <input class="btn-check" type="radio" name="{{ $item->id }}" value="b" />
                        <!--end::Input-->
                        <!--begin::Label-->
                        <span class="d-flex">
                          <!--begin::Icon-->
                          <!--begin::Svg Icon | path: icons/duotone/Layout/Layout-4-blocks-2.svg-->
                          <div class="symbol symbol-50px">
                            <div class="symbol-label bg-primary text-inverse-primary fs-2 fw-bold">B</div>
                          </div>
                          <!--end::Svg Icon-->
                          <!--end::Icon-->
                          <!--begin::Info-->
                          <span class="d-flex my-auto ms-4 w-600px">
                            <span class="fs-4 fw-bolder text-gray-900 d-block">{{ $item->b }}</span>
                          </span>
                          <!--end::Info-->
                        </span>
                        <!--end::Label-->
                      </label>
                      <!--end::Option-->
                      <!--begin::Option-->
                      <label class="col-lg-5 btn btn-outline btn-outline-dashed btn-outline-default d-flex text-start p-6 m-3 m-lg-5">
                        <!--begin::Input-->
                        <input class="btn-check" type="radio" name="{{ $item->id }}" value="c" />
                        <!--end::Input-->
                        <!--begin::Label-->
                        <span class="d-flex">
                          <!--begin::Icon-->
                          <!--begin::Svg Icon | path: icons/duotone/General/User.svg-->
                          <div class="symbol symbol-50px">
                            <div class="symbol-label bg-primary text-inverse-primary fs-2 fw-bold">C</div>
                          </div>
                          <!--end::Svg Icon-->
                          <!--end::Icon-->
                          <!--begin::Info-->
                          <span class="d-flex my-auto ms-4 w-600px">
                            <span class="fs-4 fw-bolder text-gray-900 d-block">{{ $item->c }}</span>
                          </span>
                          <!--end::Info-->
                        </span>
                        <!--end::Label-->
                      </label>
                      <!--end::Option-->
                      <!--begin::Option-->
                      <label class="col-lg-5 btn btn-outline btn-outline-dashed btn-outline-default d-flex text-start p-6 m-3 m-lg-5">
                        <!--begin::Input-->
                        <input class="btn-check" type="radio" name="{{ $item->id }}" value="d" />
                        <!--end::Input-->
                        <!--begin::Label-->
                        <span class="d-flex">
                          <!--begin::Icon-->
                          <!--begin::Svg Icon | path: icons/duotone/Layout/Layout-4-blocks-2.svg-->
                          <div class="symbol symbol-50px">
                            <div class="symbol-label bg-primary text-inverse-primary fs-2 fw-bold">D</div>
                          </div>
                          <!--end::Svg Icon-->
                          <!--end::Icon-->
                          <!--begin::Info-->
                          <span class="d-flex my-auto ms-4 w-600px">
                            <span class="fs-4 fw-bolder text-gray-900 d-block">{{ $item->d }}</span>
                          </span>
                          <!--end::Info-->
                        </span>
                        <!--end::Label-->
                      </label>
                      <!--end::Option-->
                    </div>
                    <!--end::Input group-->
                    <!-- begin: Action Button -->
                    <div class="d-flex flex-stack pt-15">
                      @if (!$loop->first)
                      <!-- Previous -->
                      <a class="btn btn-lg btn-primary btnPrevious justify-content-start">Back</a>
                      <!-- End Previous -->
                      @endif

                      @if (!$loop->last)
                      <!-- Continue -->
                      <a class="btn btn-lg btn-primary btnNext justify-content-end">Continue</a>
                      <!-- End Continue -->
                      @else
                      <!-- Submit -->
                      <button type="submit" class="btn btn-submit btn-lg btn-primary justify-content-end">Submit</button>
                      <button class="btn btn-primary btn-loading justify-content-end" type="button" disabled>
                        <span class="spinner-border spinner-border-sm me-3" role="status" aria-hidden="true"></span>
                        Loading...
                      </button>
                      <!-- End Submit -->
                      @endif

                    </div>
                    <!-- end: Action Button -->
                  </div>
                @endforeach
              @endif
              <!--end::Wrapper-->
            </div>
            <!--end::Type-->
          </form>
        </div>
      </div>
    </div>
    @endforeach
  </div>
</section>
@endif
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<script type="text/javascript">

  window.onbeforeunload = function()
  {
    return confirm();
  }

  $('.btn-loading').hide();
  
  $('iframe').each(function(){
        $(this).addClass('overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-lg-400px h-md-300px h-200px w-100');
  });

  $(document).ready(function () {


    $('.tab-pane').each(function () {
      $(this).find('input[type="radio"]').click(function () {
        $('.nav-tabs li > .active').addClass('bg-success text-white');
      })
    })

    
    $('#kt_modal_create_project_form').submit(function (e) {

      e.preventDefault();
      var href = $(this).attr('action');

      Swal.fire({
        title: 'Apakah Kamu Yakin?',
        text: "Ingin menyelesaikan Ujian!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yakin',
        cancelButtonText: 'Tidak'
      }).then((result) => {
        if (result.isConfirmed) {
          $.ajax({
            url: href,
            type: 'POST',
            dataType: 'html',
            data: $(this).serialize(),
            beforeSend: function () {
              $('.btn-submit').hide();
              $('.btn-loading').show();
            },
            complete: function () {
              $('.btn-loading').hide();
              $('.btn-submit').show();
            },
            success: function (data) {
              $('#hasil').html(data);
              // console.log(data);
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
      })

    })


    $('.btnNext').click(function(e){
      e.preventDefault();
      $('.nav-tabs li > .active').parent().next().find('a').tab('show');
    });

    $('.btnPrevious').click(function(e){
      e.preventDefault();
      $('.nav-tabs li > .active').parent().prev().find('a').tab('show');
    });

  })


</script>


@endsection