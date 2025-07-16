@extends('layouts.master')

@section('title', 'Daftar Editor')
@section('content')

@include('layouts.alert')
<div class="card card-xxl-stretch mb-5 mb-xl-8">
  <!--begin::Header-->
  <div class="card-header border-0 pt-5">
    <h3 class="card-title align-items-start flex-column">
      <span class="card-label fw-bolder fs-3 mb-1">Daftar Editor</span>
      <span class="text-muted mt-1 fw-bold fs-7">Over {{ count($editors) }} User</span>
    </h3>
    <div class="card-toolbar d-flex justify-content-center">
        <!--begin::Svg Icon | path: icons/duotone/Communication/Add-user.svg-->
      <a href="/user/2/create" class="btn btn-light-primary mx-3 my-2">
        <!--begin::Svg Icon | path: icons/duotone/Communication/Add-user.svg-->
        <span class="svg-icon svg-icon-3 m-0" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-trigger="hover" title="Click to add a user">
          <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
            <path d="M18,8 L16,8 C15.4477153,8 15,7.55228475 15,7 C15,6.44771525 15.4477153,6 16,6 L18,6 L18,4 C18,3.44771525 18.4477153,3 19,3 C19.5522847,3 20,3.44771525 20,4 L20,6 L22,6 C22.5522847,6 23,6.44771525 23,7 C23,7.55228475 22.5522847,8 22,8 L20,8 L20,10 C20,10.5522847 19.5522847,11 19,11 C18.4477153,11 18,10.5522847 18,10 L18,8 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
            <path d="M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero" />
          </svg>
        </span>
        <!--end::Svg Icon-->
      </a>

      <!--begin::Group actions-->
      <div class="d-flex justify-content-end align-items-center d-none" data-kt-view-roles-table-toolbar="selected">
        <div class="fw-bolder me-5">
        <span class="me-2" data-kt-view-roles-table-select="selected_count"></span>Selected</div>
        <button type="button" class="btn btn-danger" data-kt-view-roles-table-select="delete_selected">Delete Selected</button>
      <!--end::Group actions-->
      </div>
    </div>
  </div>
  <!--end::Header-->
  <!--begin::Body-->
  <div class="card-body py-3">
    <!--begin::Table container-->
    <div class="table-responsive">
      <!--begin::Table-->
      <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4" id="kt_datatable_example_5">
        <!--begin::Table head-->
        <thead class="text-center">
          <tr class="fw-bolder text-muted">
            {{-- <th class="w-25px align-middle border-end-dashed px-3" rowspan="2">
              <div class="form-check form-check-sm form-check-custom form-check-solid">
                <input class="form-check-input" type="checkbox" value="1" data-kt-check="true" data-kt-check-target=".widget-9-check" />
              </div>
            </th> --}}
            <th class="min-w-150px text-center align-middle px-3">Nama</th>
            <th class="min-w-150px text-center align-middle px-3">No Telepon</th>
            <th class="min-w-150px text-center align-middle px-3">Email</th>
            <th class="min-w-150px text-center align-middle px-3">Actions</th>
        </thead>
        <!--end::Table head-->
        <!--begin::Table body-->
        <tbody class="text-center">
          @foreach ($editors as $item)
          <tr>
            {{-- <td class="px-3">
              <div class="form-check form-check-sm form-check-custom form-check-solid">
                <input class="form-check-input widget-9-check" type="checkbox" value="1" />
              </div>
            </td> --}}
            <td>
              <div class="d-flex align-items-center">
                <div class="symbol symbol-45px me-5">
                  <img src="{{ url('upload/profile/'.$item->image) }}" alt="" />
                </div>
                <div class="d-flex justify-content-start flex-column text-start">
                  <a href="{{ route('user.show', $item->id) }}" class="text-dark fw-bolder text-hover-primary fs-6">{{ $item->name }}</a>
                  <span class="text-muted fw-bold text-muted d-block fs-7">{{ $item->userKategori->kategori }}</span>
                </div>
              </div>
            </td>
            <td class="text-center">{{ $item->no_telp }}</td>
            <td class="text-center">{{ $item->email }}</td>
            <td class="px-3">
              <div class="d-flex justify-content-center flex-shrink-0">
                <a href="{{ route('user.show', $item->id) }}" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                 <!--begin::Svg Icon | path: assets/media/icons/duotone/General/User.svg-->
                  <span class="svg-icon svg-icon-3">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 24 24" version="1.1">
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <polygon points="0 0 24 0 24 24 0 24"/>
                        <path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                        <path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero"/>
                    </g>
                  </svg>
                  </span>
                  <!--end::Svg Icon-->
                </a>
                <a href="{{ route('user.edit', $item->id) }}" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                  <!--begin::Svg Icon | path: icons/duotone/Communication/Write.svg-->
                  <span class="svg-icon svg-icon-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                      <path d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953)" />
                      <path d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                    </svg>
                  </span>
                  <!--end::Svg Icon-->
                </a>
                <form action="{{ route('user.destroy', $item->id) }}" method="post">
                  <button class="btn btn-icon btn-bg-light btn-active-color-danger btn-sm" data-bs-toggle="tooltip" title="Hapus Latihan">
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
          </tr>
          @endforeach
          
        </tbody>
        <!--end::Table body-->
      </table>
      <!--end::Table-->
    </div>
    <!--end::Table container-->
  </div>
  <!--begin::Body-->
</div>

@endsection