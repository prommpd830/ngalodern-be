@extends('layouts.master')

@section('title', 'Latihan')
@section('content')

  @if (count($latihan) == 0)
  <div class="container">
    <div class="card w-100">
      <div class="card-body">
        <p class="text-gray-500 fs-5 fw-bold text-center my-5">Latihan tidak ditemukan</p>
      </div>
    </div>
  </div>
  @else
  <!--begin::Container-->
  <div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container">
    <!--begin::Post-->
    <div class="content flex-row-fluid" id="kt_content">
      <!--begin::Card-->
      <div class="card overflow-hidden">
        <!--begin::Card body-->
        <div class="card-body">
          <!--begin::Stepper-->
          <div class="stepper stepper-links d-flex flex-column" id="kt_create_account_stepper">
            <!--begin::Nav-->
            <div class="stepper-nav mb-5 visually-hidden">
              @foreach ($latihan as $data)
              @foreach ($data->pertanyaan as $item)
              <!--begin::Step-->
              <div class="stepper-item {{ $loop->iteration == 1 ? 'current' : '' }}" data-kt-stepper-element="nav">
                <h3 class="stepper-title">{{ $item->nomer }}</h3>
              </div>
              <!--end::Step-->
              @endforeach
              <!--begin::Step Submit-->
              <div class="stepper-item" data-kt-stepper-element="nav">
                <h3 class="stepper-title">Submit</h3>
              </div>
              <!--end::Step Submit-->
              @endforeach
            </div>
            <!--end::Nav-->
            <!--begin::Form-->
            @foreach ($latihan as $data)
            @if (count($data->pertanyaan) == 0)
            <div class="container-fluid">
              <div class="card-body">
                <p class="text-gray-500 fs-5 fw-bold text-center my-5">Pertanyaan tidak ditemukan!</p>
              </div>
            </div>
            @else
            <form class="mx-auto w-100 pb-10" novalidate="novalidate" id="kt_create_account_form" method="post" action="u/hasil" data-href="/u/materi/{{ $data->id_mapel }}/{{ $data->id_level }}">
              <?php $count = count($data->pertanyaan) ?>
              @foreach ($data->pertanyaan as $item)
              <!--begin::Step-->
              <div class="{{ $loop->iteration == 1 ? 'current' : '' }}" data-kt-stepper-element="content" data-href="u/latihan">
                <!--begin::Wrapper-->
                <div class="w-100">
                  <!--begin::Heading-->
                  <div class="justify-content-center my-5 container">
                    <!--begin::Title-->
                    <h3 class="card-title fw-bolder text-dark fs-2hx text-uppercase">{{ $data->tes }} - No. {{ $item->nomer }} - {{ $count }}</h3>
                    <!--end::Title-->
                  </div>
                  <hr class="text-gray-500">
                  <!--end::Heading-->
                  <!--begin::Input group-->
                  <div class="fv-row">
                    <!--begin::Row-->
                    <div class="row">
                      <!--begin::Col-->
                      <div class="card-body fs-6 pt-0 px-10 px-lg-15">
                        <!--begin::Wrapper-->
                        <div class="w-100">
                          <!--begin::Pertanyaan-->
                          <div class="text-gray-400 fw-bold fs-2 my-5 overflow-auto">
                            {!! $item->pertanyaan !!}
                          </div>
                          <!--end::Pertanyaan-->
                          <!-- begin:Alert Check -->
                          <div class="alert alert-danger mb-4 text-center alert-check-false d-none" role="alert"></div>
                          <div class="d-flex justify-content-center">
                            <div class="spinner-border text-primary my-5 loading" role="status" style="width: 3rem; height: 3rem;">
                              <span class="sr-only">Loading...</span>
                            </div>
                          </div>
                          <!-- end:Alert Check -->
                          <!--begin::Input group-->
                          <div class="fv-row row justify-content-center container-check" data-kt-buttons="true">
                            <!--begin::Option-->
                            <label class="col-lg-5 btn btn-outline btn-outline-dashed btn-outline-default d-flex text-start p-6 m-3 m-lg-5">
                              <!--begin::Input-->
                              <input class="btn-check" type="radio" name="{{ $item->id }}" value="a"/>
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
                        </div>
                        <!--end::Wrapper-->
                      </div>
                      <!--end::Col-->
                    </div>
                    <!--end::Row-->
                  </div>
                  <!--end::Input group-->
                </div>
                <!--end::Wrapper-->
              </div>
              <!--end::Step-->
              @endforeach
              <!--begin:: Step Submit-->
              <div data-kt-stepper-element="content">
                <!--begin::Wrapper-->
                <div class="w-100">
                  <!--begin::Heading-->
                  <div class="pb-8 text-center">
                    <!--begin::Title-->
                    <h2 class="fw-bolder text-dark text-capitalize text-gray-900 fs-2hx">{{ $data->tes }} sudah selesai!</h2>
                    <!--end::Title-->
                  </div>
                  <!--end::Heading-->
                  <!--begin::Body-->
                  <div class="mb-0">
                    <!--begin::Alert-->
                    <!--begin::Notice-->
                    <div class="notice d-flex bg-light-primary rounded border-primary border border-dashed p-6">
                      <!--begin::Icon-->
                      <!--begin::Svg Icon | path: icons/duotone/Code/Warning-1-circle.svg-->
                      <span class="svg-icon svg-icon-2tx svg-icon-primary me-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                          <circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10" />
                          <rect fill="#000000" x="11" y="7" width="2" height="8" rx="1" />
                          <rect fill="#000000" x="11" y="16" width="2" height="2" rx="1" />
                        </svg>
                      </span>
                      <!--end::Svg Icon-->
                      <!--end::Icon-->
                      <!--begin::Wrapper-->
                      <div class="d-flex flex-stack flex-grow-1">
                        <!--begin::Content-->
                        <div class="fw-bold">
                          <div class="fs-5 text-gray-600">Selamat anda telah menyelesaikan latihan di Materi <span class="badge badge-light-warning" id="data-materi">{{ $data->materi->materi }}</span>, Level <span class="badge badge-light-danger" id="data-level">{{ $data->level->level }}</span>, Mapel <span class="badge badge-light-info" id="data-mapel">{{ $data->mapel->mapel }}</span>. Silahkan submit untuk mengakhiri latihan dan untuk menyelesaikan Materi <span class="badge badge-light-warning">{{ $data->materi->materi }}</span></div>
                        </div>
                        <!--end::Content-->
                      </div>
                      <!--end::Wrapper-->
                    </div>
                    <!--end::Notice-->
                    <!--end::Alert-->
                  </div>
                  <!--end::Body-->
                </div>
                <!--end::Wrapper-->
              </div>
              <!--end::Step Submit-->
              <!--begin::Actions-->
              <div class="d-flex flex-stack pt-15">
                <!--begin::Wrapper-->
                <div class="mr-2">
                  <button type="button" class="btn btn-lg btn-light-primary me-3" data-kt-stepper-action="previous">
                  <!--begin::Svg Icon | path: icons/duotone/Navigation/Left-2.svg-->
                  <span class="svg-icon svg-icon-4 me-1">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                      <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <polygon points="0 0 24 0 24 24 0 24" />
                        <rect fill="#000000" opacity="0.3" transform="translate(15.000000, 12.000000) scale(-1, 1) rotate(-90.000000) translate(-15.000000, -12.000000)" x="14" y="7" width="2" height="10" rx="1" />
                        <path d="M3.7071045,15.7071045 C3.3165802,16.0976288 2.68341522,16.0976288 2.29289093,15.7071045 C1.90236664,15.3165802 1.90236664,14.6834152 2.29289093,14.2928909 L8.29289093,8.29289093 C8.67146987,7.914312 9.28105631,7.90106637 9.67572234,8.26284357 L15.6757223,13.7628436 C16.0828413,14.136036 16.1103443,14.7686034 15.7371519,15.1757223 C15.3639594,15.5828413 14.7313921,15.6103443 14.3242731,15.2371519 L9.03007346,10.3841355 L3.7071045,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(9.000001, 11.999997) scale(-1, -1) rotate(90.000000) translate(-9.000001, -11.999997)" />
                      </g>
                    </svg>
                  </span>
                  <!--end::Svg Icon-->Back</button>
                </div>
                <!--end::Wrapper-->
                <!--begin::Wrapper-->
                <div>
                  @csrf
                  <input type="hidden" name="id" value="{{ $data->id }}">
                  <button type="submit" class="btn btn-lg btn-primary me-3" data-kt-stepper-action="submit" data-href="/hasil">
                    <span class="indicator-label">Submit
                    <!--begin::Svg Icon | path: icons/duotone/Navigation/Right-2.svg-->
                    <span class="svg-icon svg-icon-3 ms-2 me-0">
                      <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                          <polygon points="0 0 24 0 24 24 0 24" />
                          <rect fill="#000000" opacity="0.5" transform="translate(8.500000, 12.000000) rotate(-90.000000) translate(-8.500000, -12.000000)" x="7.5" y="7.5" width="2" height="9" rx="1" />
                          <path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)" />
                        </g>
                      </svg>
                    </span>
                    <!--end::Svg Icon--></span>
                    <span class="indicator-progress">Please wait...
                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                  </button>
                  <button type="button" class="btn btn-lg btn-primary" data-kt-stepper-action="next">Continue
                  <!--begin::Svg Icon | path: icons/duotone/Navigation/Right-2.svg-->
                  <span class="svg-icon svg-icon-4 ms-1 me-0">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                      <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <polygon points="0 0 24 0 24 24 0 24" />
                        <rect fill="#000000" opacity="0.5" transform="translate(8.500000, 12.000000) rotate(-90.000000) translate(-8.500000, -12.000000)" x="7.5" y="7.5" width="2" height="9" rx="1" />
                        <path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)" />
                      </g>
                    </svg>
                  </span>
                  <!--end::Svg Icon--></button>
                </div>
                <!--end::Wrapper-->
              </div>
              <!--end::Actions-->
            </form>
            @endif
            @endforeach
            <!--end::Form-->
          </div>
          <!--end::Stepper-->
        </div>
        <!--end::Card body-->
      </div>
      <!--end::Card-->
    </div>
    <!--end::Post-->
  </div>
  <!--end::Container-->
  @endif 

  <script type="text/javascript">

    // Stepper lement
    var element = document.querySelector("#kt_create_account_stepper");
    // Initialize Stepper
    var stepper = new KTStepper(element);
    var kesempatan = 0;
    var jumlahKesempatan = 3;
    
    $(document).ready(function () {

      $('.loading').hide();

      var mapel = $('#data-mapel').text();
      var materi = $('#data-materi').text();
      var level = $('#data-level').text();
      var redirect = $('#kt_create_account_form').data('href');

      $('button[data-kt-stepper-action="next"]').click(function () {
        $('.alert-check-false').addClass('d-none');
        var container = $('[data-kt-stepper-element="content"]').filter('.current');
        var length = container.find('input[type="radio"]:checked').length;

        if (length == 0) {
          $('.alert-check-false').removeClass('d-none');
          $('.alert-check-false').html('Maaf Anda belum memilih jawaban.');
          var current = stepper.getCurrentStepIndex(); 
          stepper.goTo(current);
          return false;
        }

        var href = $('[data-kt-stepper-element="content"]').data('href');
        var token = $('input[name="_token"]').val();
        var id = $('[data-kt-stepper-element="content"]').filter('.current').find('input[type="radio"]:checked').prop('name');
        var value = $('[data-kt-stepper-element="content"]').filter('.current').find('input[type="radio"]:checked').val();

        $.ajax({
          url: href,
          type: 'POST',
          dataType: 'json',
          data: {
            id: id,
            value: value,
            _token: token
          },
          beforeSend: function () {
            $('button[data-kt-stepper-action="next"]').prop('disabled', true);
            $('.loading').show();
          },
          complete: function () {
            $('button[data-kt-stepper-action="next"]').prop('disabled', false);
            $('.loading').hide();
          },
          success: function (data) {
            
            if (data) {
              if (data.status == true) {              
                if (length == 1){
                  kesempatan = 0;
                  // Handle next step
                  $('.alert-check-false').addClass('d-none');
                  stepper.goNext();
                }
              }

              if (data.status == false) {
                if (length == 1) {
                  kesempatan += 1;
                  if (kesempatan == 3) {
                    Swal.fire({
                      icon: 'error',
                      title: 'Oops...',
                      html: 'Maaf anda harus mengulang lagi pembelajaran untuk latihan ini. Di materi <span class="badge badge-light-warning">'+ materi +'</span>, level <span class="badge badge-light-danger">'+ level +'</span>, mapel <span class="badge badge-light-info">'+ mapel +'</span>',
                      allowOutsideClick: false
                    }).then((result) => {
                      if (result.isConfirmed) {
                        document.location = redirect;
                      }
                    })
                  }
                  // Handle next step
                  $('.alert-check-false').removeClass('d-none');
                  $('.alert-check-false').html('Jawaban Anda salah!. Anda mempunyai kesempatan menjawab sebanyak <b>'+ (jumlahKesempatan - kesempatan) +'</b> kali lagi');
                  var current = stepper.getCurrentStepIndex(); 
                  stepper.goTo(current);
                }
              }

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

      })

      $('[data-kt-stepper-action="previous"]').click(function () {
        stepper.goPrevious();
      })

    })

  </script>


@endsection