@extends('layouts.master')
@section('title', 'Dashboard')

@section('content')
<div class="row g-5 g-xxl-8">

    <div class="col-xl-12">
        @if (session('success'))
        <div class="alert alert-success mb-4" role="alert">
            {!!session('success')!!}
        </div>
        @endif
        @if (session('danger'))
        <div class="alert alert-danger mb-4" role="alert">
            {!!session('danger')!!}
        </div>
        @endif
        <div class="card mb-5 mb-xxl-8">
            <div class="card-body d-flex flex-row py-10">
                <div class="col-md-6">
                    <h1 class="font-size-h2 fs-2hx mb-3">Halo, {{ Auth::user()->name }}!</h1>
                    <span class="text-muted mt-4 fw-bold fs-7">Lihat detail profil untuk melihat dan mengubah detail akun kamu</span>
                </div>
                <div class="col-md-6 d-flex justify-content-end align-items-center">
                    <a href="profile" class="btn btn-outline btn-outline-primary text-hover-light">Detail profil</a>
                </div>
            </div>
        </div>
    </div>

    @foreach ($mapel as $data)
    <div class="col-xl-6">
        <!--begin::Tables Widget 3-->
        <div class="card card-xl-stretch mb-xl-8">
            <!--begin::Header-->
            <div class="card-header border-0 pt-5">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bolder fs-3 mb-1 text-capitalize">Top 5 {{ $data->mapel }}</span>
                    <span class="text-muted mt-1 fw-bold fs-7">Keseluruhan jumlah data yang dimiliki sebanyak {{ count($data->leaderboard) }} data</span>
                </h3>
            </div>
            <!--end::Header-->
            <!--begin::Body-->
			<div class="card-body py-3">
			    @if (count($data->leaderboard) == 0)
				<div class="container-fluid text-center">
					<p class="text-gray-500 fs-5 fw-bold text-center mt-5">Tidak ada data</p>
				</div>
				@else
				<!--begin::Table container-->
				<div class="table-responsive">
					<!--begin::Table-->
					<table class="table align-middle gs-0 gy-3">
						<!--begin::Table head-->
						<thead>
							<tr>
								<th class="w-50px text-center text-dark fw-bolder mb-1 fs-6">No</th>
								<th class="min-w-150px text-dark fw-bolder mb-1 fs-6">Nama</th>
								<th class="min-w-140px text-center text-dark fw-bolder mb-1 fs-6">Level</th>
								<th class="min-w-140px text-center text-dark fw-bolder mb-1 fs-6">Skor</th>
							</tr>
						</thead>
						<!--end::Table head-->
						<!--begin::Table body-->
						<tbody>
							@foreach ($data->leaderboard->take(5) as $item)
							<tr>
								<td align="center" class="text-gray-700 text-center fw-bolder mb-1 fs-6">
									<span>{{ $loop->iteration }}</span>
								</td>
								<td class="text-gray-600 text-start fw-bolder mb-1 fs-6">
									<span>{{ $item->user }}</span>
								</td>
								<td class="text-gray-600 text-center fw-bolder mb-1 fs-6">
									<span>{{ $item->level }}</span>
								</td>
								<td class="text-gray-600 text-center text-dark fw-bolder fs-6 pe-0">
									<span>{{ $item->skor }}</span>
								</td>
							</tr>
							@endforeach
						</tbody>
						<!--end::Table body-->
					</table>
					<!--end::Table-->
				</div>
				<!--end::Table container-->
				@endif
			</div>
			<!--end::Body-->
        </div>
        <!--end::Tables Widget 3-->
    </div>
    @endforeach

    @if (Auth::user()->id_role == 3)

    @foreach ($mapel as $m)
    <div class="col-xl-6">
        <!--begin::Tables Widget 1-->
        <div class="card card-xl-stretch mb-xl-8">
            <!--begin::Header-->
            <div class="card-header border-0 pt-5">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bolder fs-3 mb-1 text-capitalize">{{ $m->mapel }}</span>
                    <span class="text-muted fw-bold fs-7 text-capitalize">Materi {{ $m->mapel }}</span>
                </h3>
            </div>
            <!--end::Header-->
            <!--begin::Body-->
            <div class="card-body py-3">
                <!--begin::Table container-->
                <div class="table-responsive">
                    <!--begin::Table-->
                    <table class="table align-middle gs-0 gy-5">
                        <!--begin::Table head-->
                        <thead>
                            <tr>
                                <th class="p-0 min-w-150px"></th>
                                <th class="p-0 min-w-150px"></th>
                                <th class="p-0 min-w-40px"></th>
                                <th class="p-0 w-40px"></th>
                            </tr>
                        </thead>
                        <!--end::Table head-->
                        <!--begin::Table body-->
                        <tbody>
                            @foreach ($level as $l)
                            <tr>
                                <td>
                                    <span class="text-dark fw-bolder mb-1 fs-6 text-capitalize">{{ $l->level }}</span>
                                    @if (count($l->userSkor->where('id_user', Auth::id())->where('id_mapel', $m->id)) == 0)
                                    <span class="text-muted fw-bold d-block fs-7">
                                        <span class="badge badge-light-danger">Belum Ujian | 0 Skor</span>
                                    </span>
                                    @else
                                    <span class="text-muted fw-bold d-block fs-7">
                                        <span class="badge badge-light-success">Sudah Ujian | {{ $l->userSkor->where('id_user', Auth::id())->where('id_mapel', $m->id)->first()->skor }} Skor</span>
                                    </span>
                                    @endif
                                </td>
                                <td>
                                    <div class="d-flex flex-column w-100 me-2 parent-progress">
                                        <div class="d-flex flex-stack mb-2">
                                            <span class="text-muted me-2 fs-7 fw-bold progress-bar-value"></span>
                                        </div>
                                        <div class="progress h-6px w-100">
                                            <div class="progress-bar bg-primary" role="progressbar" data-valuenow="{{ count($l->materiProgress->where('id_mapel', $m->id)->where('id_user', Auth::id())) }}" data-valuemin="0" data-valuemax="{{ count($l->materiLevel->where('id_mapel', $m->id)) }}"></div>
                                        </div>
                                        <div class="d-flex flex-stack mt-2">
                                            <span class="text-muted me-2 fs-7 fw-bold">Menyelesaikan {{ count($l->materiProgress->where('id_mapel', $m->id)->where('id_user', Auth::id())) }} dari {{ count($l->materiLevel->where('id_mapel', $m->id)) }} Materi</span>
                                        </div>
                                    </div>
                                </td>

                                @if ($m->mapelProgress->where('id_user', Auth::id())->where('id_mapel', $m->id)->first()->id_level == $l->id || $m->mapelProgress->where('id_user', Auth::id())->where('id_mapel', $m->id)->first()->id_level > $l->id)
                                <td class="text-end">
                                    <a href="u/materi/{{ $m->id }}/{{ $l->id }}" class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary"><i class="fas fa-play"></i>
                                    </a>
                                </td>
                                <td class="text-end">
                                    <a href="" class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary" type="button" data-bs-toggle="tooltip" data-bs-toggle="tooltip" data-bs-delay-show="500" data-bs-placement="top" title="Unduh Sertifikat"><i class="fas fa-download"></i>
                                    </a>
                                </td>
                                @else
                                <td class="text-end">
                                    <a href="#" class="btn btn-sm btn-icon btn-bg-light disabled"><i class="fas fa-lock"></i>
                                    </a>
                                </td>
                                <td class="text-end">
                                    <a href="materi" class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary disabled" type="button" data-bs-toggle="tooltip" data-bs-toggle="tooltip" data-bs-delay-show="500" data-bs-placement="top" title="Unduh Sertifikat"><i class="fas fa-download"></i>
                                    </a>
                                </td>
                                @endif

                            </tr>
                            @endforeach
                        </tbody>
                        <!--end::Table body-->
                    </table>
                    <!--end::Table-->
                </div>
                <!--end::Table container-->
            </div>
        </div>
        <!--endW::Tables Widget 1-->
    </div>
    @endforeach

    <script type="text/javascript">
        $(document).ready(function () {
            
            $('.progress-bar').each(function (e) {

                var valuenow = $(this).data('valuenow');
                var valuemax = $(this).data('valuemax');
                var valueProgress = (valuenow/valuemax)*100;

                if (valueProgress.toFixed(0) === "NaN") {
                    $(this).parents('.parent-progress').find('.progress-bar-value').html('0%');
                } else {
                    $(this).parents('.parent-progress').find('.progress-bar-value').html(valueProgress.toFixed(0) + '%');
                }

                $(this).css('width', valueProgress + '%');

            })

        })
    </script>
    

    @endif

</div>
@endsection