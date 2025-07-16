@extends('layouts.master')

@section('title', 'Profile')
@section('content')
<div class="row g-5 g-xxl-8">

  @if (Auth::user()->id_role == 2 || Auth::user()->id_role == 1)
  <div class="col-xl-12">
    <div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
      <!--begin::Card header-->
      <div class="card-header cursor-pointer">
        <!--begin::Card title-->
        <div class="card-title m-0">
          <h3 class="fw-bolder m-0">Detail Profil</h3>
        </div>
        <!--end::Card title-->
        <!--begin::Action-->
        <a href="/profile/edit" class="btn btn-primary align-self-center">Edit Profil</a>
        <!--end::Action-->
      </div>
      <!--begin::Card header-->
      <!--begin::Card body-->
      <div class="card-body p-9">

        <!--begin::Row-->
        <div class="row mb-7">
            <div class="me-7 mb-4">
                <div class="symbol symbol-100px symbol-lg-160px symbol-fixed position-relative">
                    <img src="{{ url('upload/profile/'.Auth::user()->image) }}" alt="image" />
                </div>
            </div>
        </div>
        <!--end::Row-->
        <!--begin::Row-->
        <div class="row mb-7">
          <!--begin::Label-->
          <label class="col-lg-4 fw-bold text-muted">ID</label>
          <!--end::Label-->
          <!--begin::Col-->
          <div class="col-lg-8">
            <span class="fw-bolder fs-6 text-dark">{{Auth::user()->id}}</span>
          </div>
          <!--end::Col-->
        </div>
        <!--end::Row-->
        <!--begin::Row-->
        <div class="row mb-7">
          <!--begin::Label-->
          <label class="col-lg-4 fw-bold text-muted">Nama Lengkap</label>
          <!--end::Label-->
          <!--begin::Col-->
          <div class="col-lg-8">
            <span class="fw-bolder fs-6 text-dark">{{Auth::user()->name}}</span>
          </div>
          <!--end::Col-->
        </div>
        <!--end::Row-->
        <!--begin::Input group-->
        <div class="row mb-7">
          <!--begin::Label-->
          <label class="col-lg-4 fw-bold text-muted">Email</label>
          <!--end::Label-->
          <!--begin::Col-->
          <div class="col-lg-8 fv-row">
            <span class="fw-bold fs-6">{{Auth::user()->email}}</span>
          </div>
          <!--end::Col-->
        </div>
        <!--end::Input group-->
        <!--begin::Input group-->
        <div class="row mb-7">
          <!--begin::Label-->
          <label class="col-lg-4 fw-bold text-muted">Nomor Telepon</label>
          <!--end::Label-->
          <!--begin::Col-->
          <div class="col-lg-8 fv-row">
            <span class="fw-bold fs-6">{{Auth::user()->no_telp}}</span>
          </div>
          <!--end::Col-->
        </div>
        <!--end::Input group-->

      </div>
      <!--end::Card body-->
    </div>
  </div>
  @endif
  
  @if (Auth::user()->id_role == 3)
  <div class="col-xl-12">
    <div class="card mb-5 mb-xl-10">
      <div class="card-body pt-9 pb-0">
        <!--begin::Details-->
        <div class="d-flex flex-wrap flex-sm-nowrap mb-3">
          <!--begin: Pic-->
          <div class="me-7 mb-4">
            <div class="symbol symbol-100px symbol-lg-160px symbol-fixed position-relative">
              <img src="{{ url('upload/profile/'.Auth::user()->image) }}" alt="image" />
            </div>
          </div>
          <!--end::Pic-->
          <!--begin::Info-->
          <div class="flex-grow-1">
            <!--begin::Title-->
            <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
              <!--begin::User-->
              <div class="d-flex flex-column">
                <!--begin::Name-->
                <div class="d-flex align-items-center mb-2">
                  <span class="text-gray-800 fs-2 fw-bolder me-1">{{ Auth::user()->name }}</span>
                </div>
                <!--end::Name-->
                @foreach ($mapelProgress as $data)
                <!--begin::Level-->
                <div class="d-flex align-items-center mb-2">
                  <span class="fs-5 text-gray-400">- {{ $data->mapel->mapel }}&nbsp;|&nbsp;
                    @if ($data->level->id == 1)
                    <span class="badge badge-light-info">{{ $data->level->level }}</span>
                    @endif
                    @if ($data->level->id == 2)
                    <span class="badge badge-light-warning">{{ $data->level->level }}</span>
                    @endif
                    @if ($data->level->id == 3)
                    <span class="badge badge-light-success">{{ $data->level->level }}</span>
                    @endif
                  </span>
                </div>
                <!--end::Level-->
                @endforeach
              </div>
              <!--end::User-->
              <!--begin::Actions-->
              <div class="d-flex my-4">
                <!--begin::Menu-->
                <div class="me-0">
                  <a href="#" type="button" class="btn btn-secondary my-2" data-bs-toggle="tooltip" data-bs-delay-show="1000" data-bs-placement="top" title="Unduh Sertifikat">
                    <span>
                      <img src="assets/media/icons/duotone/Files/Download.svg" alt="Download Icon" class="h-20px">
                    </span>
                  </a>
                </div>
                <!--end::Menu-->
              </div>
              <!--end::Actions-->
            </div>
            <!--end::Title-->
            <!--begin::Stats-->
            <div class="d-flex flex-wrap flex-stack">
              <!--begin::Wrapper-->
              <div class="d-flex flex-column flex-grow-1 pe-8">
                <!--begin::Stats-->
                <div class="d-flex flex-wrap">
                  @foreach ($mapel as $data)
                  <!--begin::Stat-->
                  <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                    <!--begin::Label-->
                    <div class="fw-bold fs-6 text-gray-400">{{ $data->mapel }}</div>
                    <!--end::Label-->
                    @if ($data->userSkor === null)
                    <!--begin::Number-->
                    <div class="d-flex align-items-center">
                      <div class="fs-2 fw-bolder" data-kt-countup="true" data-kt-countup-value="0">0</div>
                    </div>
                    <!--end::Number-->
                    @else
                        @if ($data->userSkor->where('id_user', Auth::id())->first())
                        <!--begin::Number-->
                        <div class="d-flex align-items-center">
                          <div class="fs-2 fw-bolder" data-kt-countup="true" data-kt-countup-value="{{ $data->userSkor->where('id_user', Auth::id())->first()->skor }}">0</div>
                        </div>
                        <!--end::Number-->
                        @else
                        <!--begin::Number-->
                        <div class="d-flex align-items-center">
                          <div class="fs-2 fw-bolder" data-kt-countup="true" data-kt-countup-value="0">0</div>
                        </div>
                        <!--end::Number-->
                        @endif
                    @endif
                  </div>
                  <!--end::Stat-->
                  
                  @endforeach
                </div>
                <!--end::Stats-->
              </div>
              <!--end::Wrapper-->
            </div>
            <!--end::Stats-->
          </div>
          <!--end::Info-->
        </div>
        <!--end::Details-->
      </div>
    </div>
  </div>

  <div class="col-xl-12">
    <div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
      <!--begin::Card header-->
      <div class="card-header cursor-pointer">
        <!--begin::Card title-->
        <div class="card-title m-0">
          <h3 class="fw-bolder m-0">Detail Profil</h3>
        </div>
        <!--end::Card title-->
        <!--begin::Action-->
        <a href="/profile/edit" class="btn btn-primary align-self-center">Edit Profil</a>
        <!--end::Action-->
      </div>
      <!--begin::Card header-->
      <!--begin::Card body-->
      <div class="card-body p-9">
        <!--begin::Row-->
        <div class="row mb-7">
          <!--begin::Label-->
          <label class="col-lg-4 fw-bold text-muted">ID</label>
          <!--end::Label-->
          <!--begin::Col-->
          <div class="col-lg-8">
            <span class="fw-bolder fs-6 text-dark">{{Auth::user()->id}}</span>
          </div>
          <!--end::Col-->
        </div>
        <!--end::Row-->
        <!--begin::Row-->
        <div class="row mb-7">
          <!--begin::Label-->
          <label class="col-lg-4 fw-bold text-muted">Nama Lengkap</label>
          <!--end::Label-->
          <!--begin::Col-->
          <div class="col-lg-8">
            <span class="fw-bolder fs-6 text-dark">{{Auth::user()->name}}</span>
          </div>
          <!--end::Col-->
        </div>
        <!--end::Row-->
        <!--begin::Input group-->
        <div class="row mb-7">
          <!--begin::Label-->
          <label class="col-lg-4 fw-bold text-muted">Email</label>
          <!--end::Label-->
          <!--begin::Col-->
          <div class="col-lg-8 fv-row">
            <span class="fw-bold fs-6">{{Auth::user()->email}}</span>
          </div>
          <!--end::Col-->
        </div>
        <!--end::Input group-->
        <!--begin::Input group-->
        <div class="row mb-7">
          <!--begin::Label-->
          <label class="col-lg-4 fw-bold text-muted">Nomor Telepon</label>
          <!--end::Label-->
          <!--begin::Col-->
          <div class="col-lg-8 fv-row">
            <span class="fw-bold fs-6">{{Auth::user()->no_telp}}</span>
          </div>
          <!--end::Col-->
        </div>
        <!--end::Input group-->
        @if (Auth::user()->nisn || Auth::user()->npm)
        <!--begin::Input group-->
        <div class="row mb-7">
          <!--begin::Label-->
          <label class="col-lg-4 fw-bold text-muted">NISN/NPM</label>
          <!--end::Label-->
          <!--begin::Col-->
          <div class="col-lg-8 fv-row">
            <span class="fw-bold fs-6">{{ Auth::user()->nisn ? Auth::user()->nisn : Auth::user()->npm}}</span>
          </div>
          <!--end::Col-->
        </div>
        <!--end::Input group-->
        @endif
      </div>
      <!--end::Card body-->
    </div>
  </div>

  <div class="col-12">
    <div class="card mb-5">
        <!--begin::Header-->
        <div class="card-header border-0 py-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bolder fs-3 mb-1 text-capitalize">Progress Pembelajaran</span>
                <span class="text-muted fw-bold fs-7 text-capitalize">Mapel yang sedang dipelajari</span>
            </h3>
        </div>
        <!--end::Header-->
    </div>
  </div>
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

  
  <div class="col-xl-12">
    <!--begin::Tables Widget 3-->
    <div class="card card-xl-stretch mb-xl-8">
        <!--begin::Header-->
        <div class="card-header border-0 pt-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bolder fs-3 mb-1 text-capitalize">Riwayat Ujian</span>
                <span class="text-muted fw-bold fs-7">Hasil data dari ujian yang sudah dilakukan</span>
            </h3>
        </div>
        <!--end::Header-->
        <!--begin::Body-->
        <div class="card-body py-3">
          @if (count($hasil) == 0)
            <div class="container-fluid text-center">
                <p class="text-gray-500 fs-5 fw-bold text-center my-5">Tidak ada data</p>
            </div>
          @else
            <!--begin::Table container-->
            <div class="table-responsive">
                <!--begin::Table-->
                <table class="table align-middle gs-0 gy-3">
                    <!--begin::Table head-->
                    <thead class="fw-bolder fs-6">
                        <tr>
                            <th class="text-center w-50px">No</th>
                            <th class="text-start min-w-150px">Ujian</th>
                            <th class="text-start min-w-150px">Mapel</th>
                            <th class="text-start min-w-150px">Level</th>
                            <th class="text-center min-w-100px">Benar</th>
                            <th class="text-center min-w-100px">Salah</th>
                            <th class="text-center min-w-120px">Skor</th>
                        </tr>
                    </thead>
                    <!--end::Table head-->
                    <!--begin::Table body-->
                    <tbody>
                      @foreach ($hasil as $data)
                      <tr>
                          <td class="text-gray-600 text-center fw-bolder mb-1 fs-6">
                              <span>{{ $loop->iteration }}</span>
                          </td>
                          <td class="text-gray-600 text-start fw-bolder mb-1 fs-6">
                              <span>{{ $data->ujian->tes }}</span>
                          </td>
                          <td class="text-gray-600 text-start fw-bolder mb-1 fs-6">
                              <span>{{ $data->mapel->mapel }}</span>
                          </td>
                          <td class="text-gray-600 text-start fw-bolder fs-6 pe-0">
                              <span>{{ $data->level->level }}</span>
                          </td>
                          <td class="text-gray-600 text-center fw-bolder fs-6 pe-0">
                              <span>{{ $data->benar }}</span>
                          </td>
                          <td class="text-gray-600 text-center fw-bolder fs-6 pe-0">
                              <span>{{ $data->salah }}</span>
                          </td>
                          <td class="text-gray-600 text-center fw-bolder fs-6 pe-0">
                              <span>{{ $data->skor }}</span>
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
        <!--begin::Body-->
    </div>
    <!--end::Tables Widget 3-->
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