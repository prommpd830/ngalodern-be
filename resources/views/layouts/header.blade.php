<div id="kt_header" class="header align-items-stretch" data-kt-sticky="true" data-kt-sticky-name="header" data-kt-sticky-offset="{default: '200px', lg: '300px'}">
    <!--begin::Container-->
    <div class="container d-flex align-items-center">

        <!--begin::Heaeder menu toggle / sidebar on responsive-->
        <div class="d-flex topbar align-items-center d-lg-none ms-n2 me-3" title="Show aside menu">
            <div class="btn btn-icon btn-active-light-primary w-30px h-30px w-md-40px h-md-40px" id="kt_header_menu_mobile_toggle">
                <!--begin::Svg Icon | path: icons/duotone/Text/Menu.svg-->
                <span class="svg-icon svg-icon-2x">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <rect x="0" y="0" width="24" height="24" />
                            <rect fill="#000000" x="4" y="5" width="16" height="3" rx="1.5" />
                            <path d="M5.5,15 L18.5,15 C19.3284271,15 20,15.6715729 20,16.5 C20,17.3284271 19.3284271,18 18.5,18 L5.5,18 C4.67157288,18 4,17.3284271 4,16.5 C4,15.6715729 4.67157288,15 5.5,15 Z M5.5,10 L18.5,10 C19.3284271,10 20,10.6715729 20,11.5 C20,12.3284271 19.3284271,13 18.5,13 L5.5,13 C4.67157288,13 4,12.3284271 4,11.5 C4,10.6715729 4.67157288,10 5.5,10 Z" fill="#000000" opacity="0.3" />
                        </g>
                    </svg>
                </span>
                <!--end::Svg Icon-->
            </div>
        </div>
        <!--end::Heaeder menu toggle-->

        <!--begin::Header Logo-->
        <div class="header-logo me-5 me-md-10 flex-grow-1 flex-lg-grow-0">
            <a href="dashboard">
                <img alt="Logo" src="{{ asset('assets/media/logos/'.$lp_logo->logo)}}" class="logo-default h-25px" />
                <img alt="Logo" src="{{ asset('assets/media/logos/'.$lp_logo->logo)}}" class="logo-sticky h-25px" />
            </a>
        </div>
        <!--end::Header Logo-->

        <!--begin::Wrapper-->
        <div class="d-flex align-items-stretch justify-content-between flex-lg-grow-1">
            <!--begin::Navbar-->
            <div class="d-flex align-items-stretch" id="kt_header_nav">
                <!--begin::Menu wrapper-->
                <div class="header-menu align-items-stretch" data-kt-drawer="true" data-kt-drawer-name="header-menu" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_header_menu_mobile_toggle" data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_body', lg: '#kt_header_nav'}">

                    <!--begin::Menu / Navbar Link-->
                    <div class="menu menu-lg-rounded menu-column menu-lg-row menu-state-bg menu-title-gray-700 menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-400 fw-bold my-5 my-lg-0 align-items-stretch" id="#kt_header_menu" data-kt-menu="true">
                        <div class="menu-item me-lg-1">
                            <a class="menu-link py-3" href="dashboard">
                                <span class="menu-title">Dashboard</span>
                                <span class="menu-arrow d-lg-none"></span>
                            </a>
                        </div>

                        @if (Auth::user()->id_role == 3)
                        <div data-kt-menu-trigger="click" data-kt-menu-placement="bottom-start" class="menu-item menu-lg-down-accordion me-lg-1">
                            <a class="menu-link py-3" href="#">
                                <span class="menu-title">Bahasa</span>
                                <span class="menu-arrow d-lg-none"></span>
                            </a>
                            <div class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-rounded-0 py-lg-4 w-lg-225px">
                                @foreach ($bahasa as $data)
                                <div class="menu-item">
                                    <a class="menu-link py-3 menu-bahasa text-capitalize" href="/bahasa" data-id="{{ $data->id }}">
                                        <span class="menu-icon">
                                            <!--begin::Svg Icon | path: icons/duotone/Design/PenAndRuller.svg-->
                                            <span class="svg-icon svg-icon-2">
                                                <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
                                                <rect style="fill:#C8414B;" width="512" height="256"/>
                                                <rect y="256" style="fill:#F5F5F5;" width="512" height="256"/>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                        </span>
                                        <span class="menu-title">{{ $data->bahasa }}</span>
                                    </a>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        
                        @elseif(Auth::user()->id_role == 2 )
                        <div class="menu-item me-lg-1">
                            <a class="menu-link py-3" href="/materi">
                                <span class="menu-title">Materi</span>
                                <span class="menu-arrow d-lg-none"></span>
                            </a>
                        </div>
                        <div data-kt-menu-trigger="click" data-kt-menu-placement="bottom-start" class="menu-item menu-lg-down-accordion me-lg-1">
                            <a class="menu-link py-3" href="#">
                                <span class="menu-title">Soal</span>
                                <span class="menu-arrow d-lg-none"></span>
                            </a>
                            <div class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-rounded-0 py-lg-4 w-lg-225px">
                                <div class="menu-item">
                                    <a class="menu-link py-3" href="/latihan">
                                        <span class="menu-title">Latihan</span>
                                    </a>
                                </div>
                                <div class="menu-item">
                                    <a class="menu-link py-3" href="/ujian">
                                        <span class="menu-title">Ujian</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="menu-item me-lg-1">
                            <a class="menu-link py-3" href="{{ route('user.index') }}">
                                <span class="menu-title">User</span>
                                <span class="menu-arrow d-lg-none"></span>
                            </a>
                        </div>

                        @else
                        <div class="menu-item me-lg-1">
                            <a class="menu-link py-3" href="/materi">
                                <span class="menu-title">Materi</span>
                                <span class="menu-arrow d-lg-none"></span>
                            </a>
                        </div>
                        <div data-kt-menu-trigger="click" data-kt-menu-placement="bottom-start" class="menu-item menu-lg-down-accordion me-lg-1">
                            <a class="menu-link py-3" href="#">
                                <span class="menu-title">Soal</span>
                                <span class="menu-arrow d-lg-none"></span>
                            </a>
                            <div class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-rounded-0 py-lg-4 w-lg-225px">
                                <div class="menu-item">
                                    <a class="menu-link py-3" href="/latihan">
                                        <span class="menu-title">Latihan</span>
                                    </a>
                                </div>
                                <div class="menu-item">
                                    <a class="menu-link py-3" href="/ujian">
                                        <span class="menu-title">Ujian</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div data-kt-menu-trigger="click" data-kt-menu-placement="bottom-start" class="menu-item menu-lg-down-accordion me-lg-1">
                            <a class="menu-link py-3" href="#">
                                <span class="menu-title">Pengguna</span>
                                <span class="menu-arrow d-lg-none"></span>
                            </a>
                            <div class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-rounded-0 py-lg-4 w-lg-225px">
                                <div class="menu-item">
                                    <a class="menu-link py-3" href="{{ route('user.index') }}">
                                        <span class="menu-title">User</span>
                                    </a>
                                </div>
                                <div class="menu-item">
                                    <a class="menu-link py-3" href="{{ route('editor.index') }}">
                                        <span class="menu-title">Editor</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="menu-item me-lg-1">
                            <a class="menu-link py-3" href="/lp/edit">
                                <span class="menu-title">Landing Page</span>
                                <span class="menu-arrow d-lg-none"></span>
                            </a>
                        </div>
                        @endif
                    </div>
                    <!--end::Menu-->
                    
                </div>
                <!--end::Menu wrapper-->
            </div>
            <!--end::Navbar-->
            <!--begin::Topbar-->
            <div class="d-flex align-items-stretch flex-shrink-0">
                <!--begin::Toolbar wrapper-->
                <div class="topbar d-flex align-items-stretch flex-shrink-0">

                    <!--begin::Pengguna-->
                    <div class="d-flex align-items-center me-n3 ms-1 ms-lg-3" id="kt_header_user_menu_toggle">
                        <!--begin::Menu wrapper-->
                        <div class="btn btn-icon btn-active-light-primary w-30px h-30px w-md-40px h-md-40px" data-kt-menu-trigger="click" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end" data-kt-menu-flip="bottom">
                            <img class="h-25px w-25px rounded" src="{{ url('upload/profile/'.Auth::user()->image) }}" alt="" />
                        </div>
                        <!--begin::Menu-->
                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg menu-state-primary fw-bold py-4 fs-6 w-275px" data-kt-menu="true">
                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                                <div class="menu-content d-flex align-items-center px-3">
                                    <!--begin::Avatar-->
                                    <div class="symbol symbol-50px me-5">
                                        <img alt="Logo" src="{{ url('upload/profile/'.Auth::user()->image) }}" />
                                    </div>
                                    <!--end::Avatar-->
                                    <!--begin::Username-->
                                    <div class="d-flex flex-column">
                                        <div class="fw-bolder d-flex align-items-center fs-5 text-hidden">{{ Auth::user()->name }}</div>
                                        <a class="fw-bold text-muted fs-7 text-hidden">{{ Auth::user()->email }}</a>
                                    </div>
                                    <!--end::Username-->
                                </div>
                            </div>
                            <!--end::Menu item-->
                            <!--begin::Menu separator-->
                            <div class="separator my-2"></div>
                            <!--end::Menu separator-->
                            <!--begin::Menu item-->
                            <div class="menu-item px-5">
                                <a href="profile" class="menu-link px-5">Profile</a>
                            </div>
                            <!--end::Menu item-->
                            <div class="separator my-2"></div>
                            <!--begin::Menu item-->
                            <div class="menu-item px-5 py-3">
                                <form class="d-block" method="post" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="btn w-100 btn-primary px-5">Keluar</button>
                                </form>
                            </div>
                            <!--end::Menu item-->
                        </div>
                        <!--end::Menu-->
                        <!--end::Menu wrapper-->
                    </div>
                    <!--end::Pengguna -->
                    
                </div>
                <!--end::Toolbar wrapper-->
            </div>
            <!--end::Topbar-->
        </div>
        <!--end::Wrapper-->
    </div>
    <!--end::Container-->
</div>
@csrf

<script type="text/javascript">

    $('.menu-bahasa').find('.spinner-border').hide();

    $(document).ready(function () {
        
        $('.menu-bahasa').click(function (e) {
            e.preventDefault();

            var href = $(this).prop('href');
            var id = $(this).data('id');
            var token = $('input[name="_token"]').val();

            $.ajax({
                url: href,
                type: 'POST',
                dataType: 'json',
                data: {
                    _token: token,
                    id: id
                },
                beforeSend: function () {
                    $(this).find('.svg-icon').hide();
                    $(this).find('.spinner-border').show();
                },
                complete: function () {
                    $(this).find('.spinner-border').hide();
                    $(this).find('.svg-icon').show();
                },
                success: function (data) {
                    
                    if (data.status === true) {

                        Swal.fire({
                          icon: 'success',
                          title: data.text,
                          showConfirmButton: false,
                          timer: 1000
                        })

                        setTimeout(function(){
                            location.reload();
                        }, 500);
                    }

                    if (data.status === false) {
                        Swal.fire({
                          icon: 'error',
                          title: 'Oops...',
                          text: data.text
                        })
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

    })
</script>