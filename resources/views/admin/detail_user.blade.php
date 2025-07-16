@extends('layouts.master')

@section('title', 'Detail User')
@section('content')


@include('layouts.alert')
<div class="d-flex flex-column flex-xl-row">
  <!--begin::Sidebar-->
  <div class="flex-column flex-lg-row-auto w-100 w-xl-400px mb-10">
    <!--begin::Card-->
    <div class="card mb-5 mb-xl-8">
      <!--begin::Card body-->
      <div class="card-body pt-0 pt-lg-1">
        <!--begin::Summary-->
        <!--begin::Card-->
        <div class="card">
          <!--begin::Card body-->
          <div class="card-body d-flex flex-center flex-column pt-12 p-9 px-0">
            <!--begin::Avatar-->
            <div class="symbol symbol-100px symbol-circle mb-7">
              <img src="{{ url('upload/profile/'.$data->image) }}" alt="image" />
            </div>
            <!--end::Avatar-->
            <!--begin::Name-->
            <a href="#" class="fs-3 text-gray-800 text-hover-primary fw-bolder mb-3">{{ $data->name }}</a>
            <!--end::Name-->
            <!--begin::Position-->
            @if ($data->id_role == 3)
            <div class="mb-9">
              <!--begin::Badge-->
              <div class="badge badge-lg badge-light-primary d-inline mr-10">{{ $data->userKategori->kategori }}</div>
              <div class="badge badge-lg badge-light-primary d-inline">{{ $data->userRole->role }}</div>
              <!--begin::Badge-->
            </div>
            <!--end::Position-->
            
            <!--begin::Info-->
            <div class="d-flex flex-row w-75 text-center">
            @foreach ($mapelProgress as $mp)
              <!--begin::Stats-->
              <div class="border border-gray-300 border-dashed rounded py-3 px-3 mx-2 mb-3 w-100">
                <div class="fs-4 fw-bolder text-gray-700">
                  <span class="w-75px">{{ $mp->mapel->mapel }}</span>
                </div>
                <div class="fw-bold text-gray-400 my-2">
                    @if ($mp->level->id == 1)
                    <span class="badge badge-light-info">{{ $mp->level->level }}</span>
                    @endif
                    @if ($mp->level->id == 2)
                    <span class="badge badge-light-warning">{{ $mp->level->level }}</span>
                    @endif
                    @if ($mp->level->id == 3)
                    <span class="badge badge-light-success">{{ $mp->level->level }}</span>
                    @endif
                </div>
              </div>
              <!--end::Stats-->
            @endforeach
            </div>
            <!--end::Info-->
            
            <!--begin::Info-->
            <div class="d-flex flex-row w-75 text-center">
            @foreach ($mapel as $m)
              <!--begin::Stats-->
              <div class="border border-gray-300 border-dashed rounded py-3 px-3 mx-2 mb-3 w-100">
                <div class="fs-4 fw-bolder text-gray-700">
                  <span class="w-75px">{{ $m->mapel }}</span>
                </div>
                @if (count($leader) == 0)
                <div class="fw-bold text-gray-400 my-2">0</div>
                @else
                    @foreach ($leader as $le)
                        @if ($le->where('id_mapel', $m->id)->first() === null)
                        <div class="fw-bold text-gray-400 my-2">0</div>
                        @else
                        <div class="fw-bold text-gray-400 my-2">{{ $le->where('id_mapel', $m->id)->first()->skor }}</div>
                        @endif
                    @endforeach
                @endif
              </div>
              <!--end::Stats-->
            @endforeach
            </div>
            <!--end::Info-->
            
            @endif

          </div>
          <!--end::Card body-->
        </div>
        <!--end::Card-->
        <!--end::Summary-->
        <!--begin::Details toggle-->
        <div class="d-flex flex-stack fs-4 py-3">
          <div class="fw-bolder rotate collapsible" data-bs-toggle="collapse" href="#kt_user_view_details" role="button" aria-expanded="false" aria-controls="kt_user_view_details">Details
          <span class="ms-2 rotate-180">
            <!--begin::Svg Icon | path: icons/duotone/Navigation/Angle-down.svg-->
            <span class="svg-icon svg-icon-3">
              <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                  <polygon points="0 0 24 0 24 24 0 24" />
                  <path d="M6.70710678,15.7071068 C6.31658249,16.0976311 5.68341751,16.0976311 5.29289322,15.7071068 C4.90236893,15.3165825 4.90236893,14.6834175 5.29289322,14.2928932 L11.2928932,8.29289322 C11.6714722,7.91431428 12.2810586,7.90106866 12.6757246,8.26284586 L18.6757246,13.7628459 C19.0828436,14.1360383 19.1103465,14.7686056 18.7371541,15.1757246 C18.3639617,15.5828436 17.7313944,15.6103465 17.3242754,15.2371541 L12.0300757,10.3841378 L6.70710678,15.7071068 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000003, 11.999999) rotate(-180.000000) translate(-12.000003, -11.999999)" />
                </g>
              </svg>
            </span>
            <!--end::Svg Icon-->
          </span></div>
          @if (Auth::user()->id_role == 1)
            <span data-bs-toggle="tooltip" data-bs-trigger="hover" title="Edit customer details">
                <a href="{{ route('user.edit', $data->id) }}" class="btn btn-sm btn-light-primary">Edit</a>
            </span>
          @endif
        </div>
        <!--end::Details toggle-->
        <div class="separator"></div>
        <!--begin::Details content-->
        <div id="kt_user_view_details" class="collapse show">
          <div class="pb-5 fs-6">
            <!--begin::Details item-->
            <div class="fw-bolder mt-5">ID</div>
            <div class="text-gray-600">{{ $data->id }}</div>
            <!--begin::Details item-->
            <!--begin::Details item-->
            <div class="fw-bolder mt-5">Contact Phone</div>
            <div class="text-gray-600">{{ $data->no_telp }}</div>
            <!--begin::Details item-->
            <!--begin::Details item-->
            @if ($data->id_kategori == 1)
                
            @else
            <div class="fw-bolder mt-5">NISN/NPM</div>
            <div class="text-gray-600">{{ $data->npm }}{{ $data->nisn }}</div>
            @endif
            <!--begin::Details item-->
            <div class="fw-bolder mt-5">Email</div>
            <div class="text-gray-600">
              <a href="#" class="text-gray-600">{{ $data->email }}</a>
            </div>
            <!--begin::Details item-->
            <!--begin::Details item-->
            <div class="fw-bolder mt-5">Status</div>
            <div class="text-gray-600">
                @if ($data->email_verified_at)
                <span class="badge badge-light-success">Terverifikasi</span>
                @else
                <span class="badge badge-light-danger">Belum Verifikasi</span>
                @endif
            </div>
            <!--begin::Details item-->
          </div>
        </div>
        <!--end::Details content-->
      </div>
      <!--end::Card body-->
    </div>
    <!--end::Card-->
  </div>
  <!--end::Sidebar-->
  <!--begin::Content-->
  <div class="flex-lg-row-fluid ms-lg-15">
    <!--begin:::Tabs-->
    @if ($data->id_role == 3)
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
    <div class="col-12">
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
                                    @if (count($l->userSkor->where('id_user', $data->id)->where('id_mapel', $m->id)) == 0)
                                    <span class="text-muted fw-bold d-block fs-7">
                                        <span class="badge badge-light-danger">Belum Ujian | 0 Skor</span>
                                    </span>
                                    @else
                                    <span class="text-muted fw-bold d-block fs-7">
                                        <span class="badge badge-light-success">Sudah Ujian | {{ $l->userSkor->where('id_user', $data->id)->where('id_mapel', $m->id)->first()->skor }} Skor</span>
                                    </span>
                                    @endif
                                </td>
                                <td>
                                    <div class="d-flex flex-column w-100 me-2 parent-progress">
                                        <div class="d-flex flex-stack mb-2">
                                            <span class="text-muted me-2 fs-7 fw-bold progress-bar-value"></span>
                                        </div>
                                        <div class="progress h-6px w-100">
                                            <div class="progress-bar bg-primary" role="progressbar" data-valuenow="{{ count($l->materiProgress->where('id_mapel', $m->id)->where('id_user', $data->id)) }}" data-valuemin="0" data-valuemax="{{ count($l->materiLevel->where('id_mapel', $m->id)) }}"></div>
                                        </div>
                                        <div class="d-flex flex-stack mt-2">
                                            <span class="text-muted me-2 fs-7 fw-bold">Menyelesaikan {{ count($l->materiProgress->where('id_mapel', $m->id)->where('id_user', $data->id)) }} dari {{ count($l->materiLevel->where('id_mapel', $m->id)) }} Materi</span>
                                        </div>
                                    </div>
                                </td>
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
                                <th class="text-center min-w-120px">Action</th>
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
                              <td class="text-gray-600 text-center fw-bolder fs-6 pe-0">
                                <form action="{{ route('hasil.destroy', $data->id) }}" method="post">
                                  <button class="btn btn-icon btn-bg-light btn-active-color-danger btn-sm" data-bs-toggle="tooltip" title="Hapus Hasil Ujian">
                                    @csrf
                                    @method('DELETE')
                                    <!--begin::Svg Icon | path: icons/duotone/General/Trash.svg-->
                                    <span class="svg-icon svg-icon-3">
                                      <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                          <rect x="0" y="0" width="24" height="24" />
                                          <path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero" />
                                          <path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3" />
                                        </g>
                                      </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                  </button>
                                </form>
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

    @endif


    @foreach ($mapel as $data)
    <div class="col-xl-12">
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
  </div>
</div>

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

@endsection