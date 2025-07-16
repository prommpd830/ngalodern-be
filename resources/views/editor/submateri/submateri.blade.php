@extends('layouts.master')

@section('title', 'Submateri')
@section('content')

@include('layouts.alert')
<!--begin::Card Submateri-->
<div class="card mb-10">
<!--begin::Card header-->
<div class="card-header border-0 pt-6">
  <!--begin::Card title-->
  <div class="card-title d-flex flex-column">
    <h1>Submateri {{ $materi->materi}}</h1>
  </div>
  <!--begin::Card title-->
  <!--begin::Card toolbar-->
  <div class="card-toolbar align-items-start">
    <!--begin::Toolbar-->
    <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
      <!--begin::Menu-->
      <button type="button" class="btn btn-icon btn-light-primary mx-1" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-flip="top-end">
        <!--begin::Svg Icon | path: icons/duotone/Layout/Layout-4-blocks-2.svg-->
        <span class="svg-icon svg-icon-2">
          <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
              <rect x="5" y="5" width="5" height="5" rx="1" fill="#000000" />
              <rect x="14" y="5" width="5" height="5" rx="1" fill="#000000" opacity="0.3" />
              <rect x="5" y="14" width="5" height="5" rx="1" fill="#000000" opacity="0.3" />
              <rect x="14" y="14" width="5" height="5" rx="1" fill="#000000" opacity="0.3" />
            </g>
          </svg>
        </span>
        <!--end::Svg Icon-->
      </button>
      <!--begin::Menu 3-->
      <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-bold w-200px py-3" data-kt-menu="true">
        <!--begin::Heading-->
        <div class="menu-item px-3">
          <div class="menu-content text-muted pb-2 px-3 fs-7 text-uppercase">Menu</div>
        </div>
        <!--end::Heading-->
        <!--begin::Menu item-->
        <div class="menu-item px-3">
          <a href="submateri/{{ $id }}/create" class="menu-link px-3">Tambah Submateri</a>
        </div>
        <!--end::Menu item-->
      </div>
      <!--end::Menu-->
    </div>
    <!--end::Toolbar-->
  </div>
  <!--end::Card toolbar-->
</div>
<!--end::Card header-->
<!--begin::Card body-->
<div class="card-body pt-0">
  @if (count($submateri) == 0)
  <div class="container-fluid text-center">
      <p class="text-gray-500 fs-5 fw-bold text-center my-5">Tidak ada data</p>
  </div>
  @else
  <div class="table-responsive">
    <!--begin::Table-->
    <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4" id="kt_datatable_example_5">
      <!--begin::Table head-->
      <thead>
        <!--begin::Table row-->
        <tr class="text-center text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
          <th class="w-30px">No</th>
          <th class="min-w-125px">Judul</th>
          <th class="min-w-125px">Materi</th>
          <th class="min-w-100px">Aksi</th>
        </tr>
        <!--end::Table row-->
      </thead>
      <!--end::Table head-->
      <!--begin::Table body-->
      <tbody class="text-gray-600 fw-bold">
        <!--begin::Table row-->
        @foreach ($submateri as $item)
        <tr class="text-center">
          <td>
            {{ $loop->iteration }}
          </td>
          <!--begin::Role=-->
          <td class="text-start">{{ $item->judul }}</td>
          <!--end::Role=-->
          <!--begin::Two step=-->
          <td>
            <div class="badge badge-light-primary fw-bolder">{{ $item->materi->materi }}</div>
          </td>
          <!--end::Two step=-->
          <!--begin::Action=-->
          <td>
            <div class="d-flex justify-content-center flex-shrink-0">
              <a href="/submateri/{{ $item->id }}/edit" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" data-bs-toggle="tooltip" title="Edit Materi">
                <!--begin::Svg Icon | path: icons/duotone/Communication/Write.svg-->
                <span class="svg-icon svg-icon-3">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                    <path d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953)" />
                    <path d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                  </svg>
                </span>
                <!--end::Svg Icon-->
              </a>
              <form action="{{ route('submateri.destroy', $item->id) }}" method="post">
                <button class="btn btn-icon btn-bg-light btn-active-color-danger btn-sm" data-bs-toggle="tooltip" title="Hapus Materi">
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
            </div>
          </td>
          <!--end::Action=-->
        </tr>
        @endforeach
        <!--end::Table row-->
        
      </tbody>
      <!--end::Table body-->
    </table>
    <!--end::Table-->
  </div>
  @endif
  <a href="{{ route('materi.index') }}" class="btn btn-sm btn-light-primary">Kembali</a>
</div>
<!--end::Card body-->
</div>
<!--end::Card Materi-->

@endsection