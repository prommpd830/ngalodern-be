@extends('layouts.master')

@section('title', 'Materi')
@section('content')
<div class="row">
  @if ( $countMateri == 0 )
  <div class="card w-100 shadow">
    <div class="container-fluid">
        <p class="text-gray-500 fs-5 fw-bold text-center my-5">Materi tidak ada</p>
    </div>
  </div>
  @else
  <div class="col-lg-3 mb-5">
    <div class="card card-flush h-lg-75">
      <div class="card-header">
        <h1 class="card-title fw-bolder text-muted fs-1">Materi</h1>
      </div>
      <div class="card-body px-lg-5 pt-0 border-0">
        <ul class="nav nav-tabs nav-line-tabs nav-materi d-flex flex-column border-0 p-0">
          @foreach ( $materi as $data )
          <li class="nav-item mb-2 ms-1">
            <a class="nav-link {{ $loop->iteration == 1 ? 'active' : '' }} btn btn-secondary bg-hover-primary text-gray-700 text-hover-light text-start fw-bolder fs-5 mx-1 text-capitalize" data-bs-toggle="tab" href="#materi{{ $data->id }}">
              {{ $data->materi }}
              @if ($data->progress == null)
              &nbsp;
              @else
              <i class="fas fa-check-circle ms-3 fs-3"></i>
              @endif
            </a>
          </li>
          @endforeach
        </ul>
      </div>
      <div class="card-footer">
        @if ($countProgress == $countMateri )
        <a href="u/ujian/{{ $mapel }}/{{ $level }}" class="btn btn-primary btn-lg w-100 bg-hover-primary text-light text-center fw-bolder fs-2 mx-1 text-uppercase">Ujian<i class="fas fs-2 mb-1 fa-lock-open ms-3"></i></a>
        @else
        <button class="btn btn-secondary btn-lg w-100 text-gray-700 text-center fw-bolder fs-2 mx-1 text-uppercase" disabled="">Ujian<i class="fas fs-2 mb-1 text-gray-700 fa-lock ms-3"></i></button>
        @endif
      </div>
    </div>
  </div>
  <div class="col-lg-9">
    <div class="tab-content">
      @foreach ( $materi as $data )
      <!--begin::Card-->
      <div class="tab-pane fade {{ $loop->iteration == 1 ? 'show active' : '' }} card card-flush min-h-lg-600px" id="materi{{ $data->id }}" role="tabpanel">
        <div class="card-header py-8 px-lg-15">
          <div class="d-flex flex-column submateri-header">
            <h3 class="card-title text-gray-500 fs-2tx fw-bolder ls-3">Submateri</h3>
            <p class="text-gray-800 fs-5 fw-bolder">Daftar Submateri dari Materi <span class="text-capitalize">{{ $data->materi }}</span></p>
          </div>
        </div>
        <!--begin::Card Body-->
        <div class="card-body fs-6 pt-0 px-10 px-lg-15">
          <nav>
            <div class="nav nav-tabs nav-line-tabs nav-submateri d-flex flex-column border-0 p-0" role="tablist">
              @foreach ($data->subMateri as $item)
                <a class="nav-link my-1 btn btn-secondary bg-hover-primary text-gray-700 text-hover-light text-start fw-bolder fs-5 mx-1 text-capitalize" data-bs-toggle="tab" data-bs-target="#sub{{ $item->id }}" role="tab" aria-controls="nav-home" aria-selected="true">{{ $data->materi }} - {{ $item->judul }}
                </a>
              @endforeach
            </div>
          </nav>
          <div class="pb-10">
            <!--begin::Block-->
            <div class="py-5">
              <div class="d-flex flex-column">
                @if (count($data->subMateri) < 1)
                <div class="container-fluid">
                  <div class="card-body">
                    <p class="text-gray-500 fs-5 fw-bold text-center my-5">Submateri tidak ada</p>
                  </div>
                </div>
                @endif
                <div class="tab-content">
                  @foreach ($data->subMateri as $item)
                  <div class="tab-pane fade tab-submateri" id="sub{{ $item->id }}" role="tabpanel" aria-labelledby="nav-home-tab">
                    <div class="d-md-flex flex-stack">
                      <div class="justify-content-start">
                        <h3 class="text-gray-500 fs-2tx fw-bolder ls-3">{{ Str::limit($item->judul, 20) }}</h3>
                      </div>
                      <div class="card-toolbar my-md-0 my-3 justify-content-end">
                        @if (!$loop->first)
                        <!-- Previous -->
                        <a class="btn btn-primary btnPrevious justify-content-start">Previous</a>
                        <!-- End Previous -->
                        @endif

                        @if (!$loop->last)
                        <!-- Continue -->
                        <a class="btn btn-primary btnNext justify-content-end">Next</a>
                        <!-- End Continue -->
                        @else
                        <!-- Submit -->
                        <a href="u/latihan/{{ $data->kode_materi }}" class="btn btn-primary mx-1">Latihan</a>
                        <!-- End Submit -->
                        @endif
                      </div>
                    </div>
                    <div class="overflow-auto my-5 table-responsive isi-konten">
                      {!! $item->konten !!}
                    </div>
                  </div>
                  @endforeach
                </div>
              </div>
            </div>
            <!--end::Block-->
          </div>
          <!--end::Section-->
        </div>
        <!--end::Card Body-->
      </div>
      <!--end::Card-->
      @endforeach
      
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script type="text/javascript">
  
    $('iframe').each(function(){
        $(this).addClass('overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-lg-400px h-md-300px h-200px w-100');
    });
  
    function pauseAllVideos() 
    { 
        $('iframe').each(function(){
            var el_src = $(this).attr("src");
            $(this).attr("src",el_src);
        });
    }

    $('.nav-submateri a').click(function () {
      $(this).parent().addClass('visually-hidden');
      $(this).parents('.card').find('.submateri-header').addClass('visually-hidden');
    })

    $('.nav-materi li a').click(function () {
      pauseAllVideos();
      $('.submateri-header').removeClass('visually-hidden');
      $('.nav-submateri').removeClass('visually-hidden');
      $('.nav-submateri a').removeClass('active');
      $('.tab-submateri').removeClass('show active');
    })

    $('.btnNext').click(function(e){
      e.preventDefault();
      pauseAllVideos();
      $(this).parents('.card-body').find('.nav-submateri a.active').next().tab('show');
    //   $('iframe')[0].contentWindow.postMessage('{"event":"command","func":"' + 'pauseVideo' + '","args":""}', '*');
    });

    $('.btnPrevious').click(function(e){
      e.preventDefault();
      pauseAllVideos();
      $(this).parents('.card-body').find('.nav-submateri a.active').prev().tab('show');
    });
    
  </script>
  @endif
</div>
@endsection