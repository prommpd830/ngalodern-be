
<div class="card mb-5 mb-xxl-8">
  	<div class="card-body text-center py-10">
  		<!--begin::Alert-->
      <!--begin::Notice-->
      <div class="notice d-flex bg-light-primary rounded border-primary border border-dashed p-6 mb-5">
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
            <div class="fs-5 text-gray-600">Refresh Halaman ini jika ingin melakukan ujian lagi!. <span class="text-dark fw-bolder">Ingat!! Ujian hanya bisa dilakukan 3 kali di setiap level. Anda sudah melakukannya sebanyak <span class="badge-light-warning p-1">{{ count($sisa) }}</span> kali. Jika ujian anda <span class="badge badge-light-danger">Remedial</span> maka anda tidak akan naik level. Anda bisa naik level jika 1 dari 3 kali ujian yang dilakukan dinyatakan <span class="badge badge-light-success">Lulus</span>.</span></div>
          </div>
          <!--end::Content-->
        </div>
        <!--end::Wrapper-->
      </div>
      <!--end::Notice-->
      <!--end::Alert-->
    	<div class="d-flex flex-column justify-content-center">
      	<h3 class="text-gray-900 fs-2hx">Selamat kamu telah menyelesaikan ujian!!</h3>
      	<h5 class="text-gray-700 fs-1">Nilai kamu adalah..</h5>
      	<h1 class="text-gray-400 fs-5hx" data-kt-countup="true" data-kt-countup-value="{{ $nilai }}">{{ $nilai }}</h1>
      	@if ($kelulusan == 'lulus')
      	<h1 class="text-capitalize"><span class="fw-bolder fs-1 badge badge-light-success">{{ $kelulusan }}</span></h1>
      	@endif
      	@if ($kelulusan == 'remedial')
      	<h1 class="text-capitalize"><span class="fw-bolder fs-1 badge badge-light-danger">{{ $kelulusan }}</span></h1>
      	@endif
      	<h5 class="text-gray-500 fs-3">
        		<span class="text-success">Benar <span data-kt-countup="true" data-kt-countup-value="{{ $benar }}">{{ $benar }}</span></span> | 
        		<span class="text-danger">Salah <span data-kt-countup="true" data-kt-countup-value="{{ $salah }}">{{ $salah }}</span></span>
      	</h5>
      	<p class="fs-5 fw-bold">Telah menyelesaikan ujian di Level <span class="fw-bolder badge badge-light-info">{{ $ujianRow->level->level }}</span>, Mapel <span class="fw-bolder badge badge-light-danger">{{ $ujianRow->mapel->mapel }}</span></p>
    	</div>
    	<a href="/profile" class="btn btn-outline btn-outline-primary bg-hover-primary text-hover-light m-auto my-md-0 my-3 w-150px">Cek Profile</a>
        @if ($kelulusan == 'lulus')
            @if ($ujianRow->id_level == 1)
            <a href="/u/materi/{{ $ujianRow->id_mapel }}/2" class="btn btn-primary m-auto w-150px">Menengah</a>
            @endif
            @if ($ujianRow->id_level == 2)
            <a href="/u/materi/{{ $ujianRow->id_mapel }}/3" class="btn btn-primary m-auto w-150px">Mahir</a>
            @endif
            @if ($ujianRow->id_level == 3)
            <a href="/dashboard" class="btn btn-primary m-auto w-150px">Dashboard</a>
            @endif
        @endif
        @if ($kelulusan == 'remedial')
            @if (count($sisa) == 3)
            @else
            <a class="btn btn-primary m-auto w-150px refresh">Ujian Lagi?</a>
            @endif
        @endif
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function () {
		$('.refresh').click(function (e) {
			e.preventDefault();
			location.reload();
		})
	})
</script>
