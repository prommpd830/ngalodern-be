<!DOCTYPE html>
<!--
Author: Keenthemes
Product Name: Metronic - #1 Selling Bootstrap 5 HTML Multi-demo Admin Dashboard Theme
Purchase: https://1.envato.market/EA4JP
Website: http://www.keenthemes.com
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
License: For each use you must have a valid license purchased only from above link in order to legally use the theme for your project.
-->
<html lang="en">
	<!--begin::Head-->
	<head><base href="">
		<meta charset="utf-8" />
		<title>{{ $landing->title }}</title>
		<meta name="description" content="Metronic admin dashboard live demo. Check out all the features of the admin panel. A large number of settings, additional services and widgets." />
		<meta name="keywords" content="Metronic, bootstrap, bootstrap 5, Angular 11, VueJs, React, Laravel, admin themes, web design, figma, web development, ree admin themes, bootstrap admin, bootstrap dashboard" />
		<link rel="canonical" href="Https://preview.keenthemes.com/metronic8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="shortcut icon" href="assets/media/logos/favicon.ico" />
		<!--begin::Fonts-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
		<!--end::Fonts-->
		<!--begin::Global Stylesheets Bundle(used by all pages)-->
		<link href="{{ asset('assets/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('assets/css/style.bundle.css')}}" rel="stylesheet" type="text/css" />
		<!--end::Global Stylesheets Bundle-->
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" style="background-image: url(assets/media/patterns/header-bg.jpg)" data-bs-spy="scroll" data-bs-target="#kt_landing_menu" data-bs-offset="200" >
		<!--begin::Main-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Header Section-->
			<div class="mb-0" id="home">
				<!--begin::Wrapper-->
				<div class="bgi-no-repeat bgi-size-contain bgi-position-x-center bgi-position-y-bottom landing-dark-bg" style="background-image: url(assets/media/svg/illustrations/landing.svg)">
					<!--begin::Header-->
					<div class="landing-header" data-kt-sticky="true" data-kt-sticky-name="landing-header" data-kt-sticky-offset="{default: '200px', lg: '300px'}">
						<!--begin::Container-->
						<div class="container">
							<!--begin::Wrapper-->
							<div class="d-flex align-items-center justify-content-between">
								<!--begin::Logo-->
								<div class="d-flex align-items-center flex-equal">
									<!--begin::Mobile menu toggle-->
									<button class="btn btn-icon btn-active-color-primary me-3 d-flex d-lg-none" id="kt_landing_menu_toggle">
										<!--begin::Svg Icon | path: icons/duotone/Text/Menu.svg-->
										<span class="svg-icon svg-icon-2hx">
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<rect x="0" y="0" width="24" height="24" />
													<rect fill="#000000" x="4" y="5" width="16" height="3" rx="1.5" />
													<path d="M5.5,15 L18.5,15 C19.3284271,15 20,15.6715729 20,16.5 C20,17.3284271 19.3284271,18 18.5,18 L5.5,18 C4.67157288,18 4,17.3284271 4,16.5 C4,15.6715729 4.67157288,15 5.5,15 Z M5.5,10 L18.5,10 C19.3284271,10 20,10.6715729 20,11.5 C20,12.3284271 19.3284271,13 18.5,13 L5.5,13 C4.67157288,13 4,12.3284271 4,11.5 C4,10.6715729 4.67157288,10 5.5,10 Z" fill="#000000" opacity="0.3" />
												</g>
											</svg>
										</span>
										<!--end::Svg Icon-->
									</button>
									<!--end::Mobile menu toggle-->
									<!--begin::Logo image-->
									<a href="/">
										<img alt="Logo" src="{{ asset('assets/media/logos/'.$landing->logo)}}" class="logo-default h-30px h-lg-40px" />
										<img alt="Logo" src="{{ asset('assets/media/logos/'.$landing->logo)}}" class="logo-sticky h-25px h-lg-35px" />
									</a>
									<!--end::Logo image-->
								</div>
								<!--end::Logo-->
								<!--begin::Menu wrapper-->
								<div class="d-lg-block" id="kt_header_nav_wrapper">
									<div class="d-lg-block p-5 p-lg-0" data-kt-drawer="true" data-kt-drawer-name="landing-menu" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="200px" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_landing_menu_toggle" data-kt-place="true" data-kt-place-mode="prepend" data-kt-place-parent="{default: '#kt_body', lg: '#kt_header_nav_wrapper'}">
										<!--begin::Menu-->
										<div class="menu menu-column flex-nowrap menu-rounded menu-lg-row menu-title-gray-500 menu-state-title-primary nav nav-flush fs-5 fw-bold" id="kt_landing_menu">
											<!--begin::Menu item-->
											<div class="menu-item">
												<!--begin::Menu link-->
												<a class="menu-link nav-link active py-3 px-4 px-xxl-6" href="#kt_body" data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">Muka</a>
												<!--end::Menu link-->
											</div>
											<!--end::Menu item-->
											<!--begin::Menu item-->
											<div class="menu-item">
												<!--begin::Menu link-->
												<a class="menu-link nav-link py-3 px-4 px-xxl-6" href="#about" data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">Tentang</a>
												<!--end::Menu link-->
											</div>
											<!--end::Menu item-->
											<!--begin::Menu item-->
											<div class="menu-item">
												<!--begin::Menu link-->
												<a class="menu-link nav-link py-3 px-4 px-xxl-6" href="#leaderboard" data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">Teratas</a>
												<!--end::Menu link-->
											</div>
											<!--end::Menu item-->
											<!--begin::Menu item-->
											<div class="menu-item">
												<!--begin::Menu link-->
												<a class="menu-link nav-link py-3 px-4 px-xxl-6" href="#kontak" data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">Kontak</a>
												<!--end::Menu link-->
											</div>
											<!--end::Menu item-->
										</div>
										<!--end::Menu-->
									</div>
								</div>
								<!--end::Menu wrapper-->
								<!--begin::Toolbar-->
								<div class="flex-equal text-end ms-1">
									<a href="login" class="btn btn-success">Masuk</a>
								</div>
								<!--end::Toolbar-->
							</div>
							<!--end::Wrapper-->
						</div>
						<!--end::Container-->
					</div>
					<!--end::Header-->
					<!--begin::Landing hero-->
					<div class="d-flex flex-column w-100 min-h-350px min-h-lg-500px px-9">
						<!--begin::Heading-->
						<div class="text-center mb-5 mb-lg-10 py-10 py-lg-20">
							<!--begin::Title-->
							<h1 class="text-white lh-base fw-bolder fs-2x fs-lg-3x mb-15" style="background: linear-gradient(to right, #12CE5D 0%, #FFD80C 100%);-webkit-background-clip: text;-webkit-text-fill-color: transparent;">{!! $landing->header !!}</h1>
							<!--end::Title-->
    							<!--begin::Container-->
    							<div class="container">
									<!--begin::Row-->
									<div class="row g-10">
										<!--begin::Col-->
										<div class="col-md-6">
											<!--begin::Image-->
											<iframe class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-lg-300px h-200px w-100" src="{{ $landing->video_1 }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
											<!--end::Image-->
										</div>
										<!--end::Col-->
										<!--begin::Col-->
										<div class="col-md-6">
											<!--begin::Image-->
											<iframe class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-lg-300px h-200px w-100" src="{{ $landing->video_2 }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
											<!--end::Image-->
										</div>
										<!--end::Col-->
									</div>
									<!--end::Row-->
    							</div>
    							<!--end::Container-->
						</div>
						<!--end::Heading-->
					</div>
					<!--end::Landing hero-->
				</div>
				<!--end::Wrapper-->
				<!--begin::Curve bottom-->
				<div class="landing-curve landing-dark-color mb-10 mb-lg-20">
					<svg viewBox="15 12 1470 48" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M0 11C3.93573 11.3356 7.85984 11.6689 11.7725 12H1488.16C1492.1 11.6689 1496.04 11.3356 1500 11V12H1488.16C913.668 60.3476 586.282 60.6117 11.7725 12H0V11Z" fill="currentColor"></path>
					</svg>
				</div>
				<!--end::Curve bottom-->
			</div>
			<!--end::Header Section-->
			<!--begin::How It Works Section-->
			<div class="mb-5">
				<!--begin::Container-->
				<div class="container">
					<!--begin::Heading-->
					<div class="text-center mb-17">
						<!--begin::Title-->
						<h3 class="fs-2hx text-dark mb-5" id="about" data-kt-scroll-offset="{default: 100, lg: 150}">{{ $about->title }}</h3>
						<!--end::Title-->
					</div>
					<!--end::Heading-->
					<!--begin::Row-->
					<div class="row w-100 gy-10 mb-md-20">
						<!--begin::Col-->
						<div class="col-md-5 px-5">
							<!--begin::Illustration-->
							<img src="{{ asset('assets/media/illustrations/'.$about->image)}}" class="w-100" alt="" />
							<!--end::Illustration-->
						</div>
						<!--end::Col-->
						<!--begin::Col-->
						<div class="col-md-7 px-5">
							<!--begin::Story-->
							<div class="text-md-start text-center mb-10 mb-md-0">
								<!--begin::Description-->
								<div class="fw-bold fs-6 fs-lg-4 text-muted">{{ $about->deskripsi }}</div>
								<!--end::Description-->
							</div>
							<!--end::Story-->
						</div>
						<!--end::Col-->
					</div>
					<!--end::Row-->
				</div>
				<!--end::Container-->
			</div>
			<!--end::How It Works Section-->

			<div class="mt-5" id="leaderboard">
				<div class="pb-15 pt-18">
					<div class="container">
					    <div class="row">
    						@foreach ($mapel as $data)
                            <div class="col-md-6">
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
				</div>
			</div>
			
			<!--begin::Footer Section-->
			<div class="mb-0">
				<!--begin::Curve top-->
				<div class="landing-curve landing-dark-color">
					<svg viewBox="15 -1 1470 48" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M1 48C4.93573 47.6644 8.85984 47.3311 12.7725 47H1489.16C1493.1 47.3311 1497.04 47.6644 1501 48V47H1489.16C914.668 -1.34764 587.282 -1.61174 12.7725 47H1V48Z" fill="currentColor"></path>
					</svg>
				</div>
				<!--end::Curve top-->
				<!--begin::Wrapper-->
				<div id="kontak" class="landing-dark-bg pt-20">
					<!--begin::Container-->
					<div class="container">
						<!--begin::Row-->
						<div class="row py-10 py-lg-20">
							<!--begin::Col-->
							<div class="col-lg-2 pe-lg-16 mb-10 mb-lg-0">
							    <div class="d-flex justify-content-center">
    							    <!--begin::Links-->
    								<div class="d-flex fw-bold flex-column">
    									@foreach ($footerL as $item)	
    									<!--begin::Client-->
    									<div class="mx-3" data-bs-toggle="tooltip" title="{{ $item->title }}">
    										<img src="{{ asset('assets/media/logos/'.$item->logo )}}" class="mh-100px mh-lg-200px" alt="" />
    									</div>
    									<!--end::Client-->
    									@endforeach
    								</div>
								</div>
							</div>
							<!--end::Col-->
							<div class="col-lg-7 col-md-7 ps-md-16">
							    <!--end::Links-->
								@foreach ($footerS as $item)
								<!--begin::Block-->
								<div class="rounded landing-dark-border p-9 mb-10">
									<!--begin::Title-->
									<h2 class="text-white">{{ $item->title }}</h2>
									<!--end::Title-->
									<!--begin::Text-->
									<span class="fw-normal fs-5 text-gray-700"><span class="text-white opacity-50">{{ $item->deskripsi_1 }}</span>
									<br />{{ $item->deskripsi_2 }}
									<br><br/>
									<span class="text-white opacity-50">Telepon</span> {{ $item->telepon }}
									<br />
									<span class="text-white opacity-50">Fax</span> {{ $item->fax }}
									<br />
									<span class="text-white opacity-50">Email</span>
										<a class="text-gray-700 text-hover-primary" href="mailto:{{ $item->email }}">{{ $item->email }}</a>
									</span>
									<!--end::Text-->
								</div>
								<!--end::Block-->
								@endforeach
							</div>
							<!--begin::Col-->
							<div class="col-lg-3 col-md-5">
								<!--begin::Navs-->
								<div class="d-flex justify-content-center">
									<!--begin::Links-->
									<div class="d-flex fw-bold flex-column">
										<!--begin::Link-->
										<a href="https://facebook.com/{{ $footerK->facebook }}" class="mb-6">
											<img src="{{ asset('assets/media/svg/brand-logos/facebook-4.svg')}}" class="h-20px me-2" alt="{{ $footerK->facebook }}" />
											<span class="text-white opacity-50 text-hover-primary fs-5 mb-6">Facebook</span>
										</a>
										<!--end::Link-->
										<!--begin::Link-->
										<a href="https://twitter.com/{{ $footerK->twitter }}" class="mb-6">
											<img src="{{ asset('assets/media/svg/brand-logos/twitter.svg')}}" class="h-20px me-2" alt="{{ $footerK->twitter }}" />
											<span class="text-white opacity-50 text-hover-primary fs-5 mb-6">Twitter</span>
										</a>
										<!--end::Link-->
										<!--begin::Link-->
										<a href="https://www.instagram.com/{{ $footerK->instagram }}" class="mb-6">
											<img src="{{ asset('assets/media/svg/brand-logos/instagram-2-1.svg')}}" class="h-20px me-2" alt="{{ $footerK->instagram }}" />
											<span class="text-white opacity-50 text-hover-primary fs-5 mb-6">Instagram</span>
										</a>
										<!--end::Link-->
										<!--begin::Link-->
										<a href="https://www.youtube.com/user/{{ $footerK->youtube }}" class="mb-6">
											<img src="{{ asset('assets/media/svg/brand-logos/youtube-play.svg')}}" class="h-20px me-2" alt="{{ $footerK->youtube }}" />
											<span class="text-white opacity-50 text-hover-primary fs-5 mb-6">Youtube</span>
										</a>
										<!--end::Link-->
										<!--begin::Link-->
										<a href="https://www.linkedin.com/school/{{ $footerK->linkedin }}" class="mb-6">
											<img src="{{ asset('assets/media/svg/brand-logos/linkedin-icon.svg')}}" class="h-20px me-2" alt="{{ $footerK->linkedin }}" />
											<span class="text-white opacity-50 text-hover-primary fs-5 mb-6">LinkedIn</span>
										</a>
										<!--end::Link-->
									</div>
									<!--end::Links-->
								</div>
								<!--end::Navs-->
							</div>
							<!--end::Col-->
						</div>
						<!--end::Row-->
					</div>
					<!--end::Container-->
					<!--begin::Separator-->
					<div class="landing-dark-separator"></div>
					<!--end::Separator-->
					<!--begin::Container-->
					<div class="container">
						<!--begin::Wrapper-->
						<div class="d-flex flex-column flex-stack py-7 py-lg-10">
							<!--begin::Copyright-->
							<div class="d-flex align-items-center">
								<!--begin::Text-->
								<span class="mx-5 fs-6 fw-bold text-gray-600 pt-1" href="https://keenthemes.com">© {{ date('Y') }} Ngalodern.</span>
								<!--end::Text-->
							</div>
							<!--end::Copyright-->
						</div>
						<!--end::Wrapper-->
					</div>
					<!--end::Container-->
				</div>
				<!--end::Wrapper-->
			</div>
			<!--end::Footer Section-->
			<!--begin::Scrolltop-->
			<div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
				<!--begin::Svg Icon | path: icons/duotone/Navigation/Up-2.svg-->
				<span class="svg-icon">
					<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
						<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
							<polygon points="0 0 24 0 24 24 0 24" />
							<rect fill="#000000" opacity="0.5" x="11" y="10" width="2" height="10" rx="1" />
							<path d="M6.70710678,12.7071068 C6.31658249,13.0976311 5.68341751,13.0976311 5.29289322,12.7071068 C4.90236893,12.3165825 4.90236893,11.6834175 5.29289322,11.2928932 L11.2928932,5.29289322 C11.6714722,4.91431428 12.2810586,4.90106866 12.6757246,5.26284586 L18.6757246,10.7628459 C19.0828436,11.1360383 19.1103465,11.7686056 18.7371541,12.1757246 C18.3639617,12.5828436 17.7313944,12.6103465 17.3242754,12.2371541 L12.0300757,7.38413782 L6.70710678,12.7071068 Z" fill="#000000" fill-rule="nonzero" />
						</g>
					</svg>
				</span>
				<!--end::Svg Icon-->
			</div>
			<!--end::Scrolltop-->
		</div>
		<!--end::Main-->
		<!--begin::Javascript-->
		<!--begin::Global Javascript Bundle(used by all pages)-->
		<script src="{{ asset('assets/plugins/global/plugins.bundle.js')}}"></script>
		<script src="{{ asset('assets/js/scripts.bundle.js')}}"></script>
		<!--end::Global Javascript Bundle-->
		<!--begin::Page Vendors Javascript(used by this page)-->
		<script src="{{ asset('assets/plugins/custom/fslightbox/fslightbox.bundle.js')}}"></script>
		<script src="{{ asset('assets/plugins/custom/typedjs/typedjs.bundle.js')}}"></script>
		<!--end::Page Vendors Javascript-->
		<!--begin::Page Custom Javascript(used by this page)-->
		<script src="{{ asset('assets/js/custom/landing.js')}}"></script>
		<script src="{{ asset('assets/js/custom/pages/company/pricing.js')}}"></script>
		<!--end::Page Custom Javascript-->
		<!--end::Javascript-->
	</body>
	<!--end::Body-->
</html>