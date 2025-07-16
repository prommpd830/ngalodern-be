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
	<head><base href="../../../">
		<meta charset="utf-8" />
		<title>Verifikasi Akun</title>
		<meta name="description" content="Metronic admin dashboard live demo. Check out all the features of the admin panel. A large number of settings, additional services and widgets." />
		<meta name="keywords" content="Metronic, bootstrap, bootstrap 5, Angular 11, VueJs, React, Laravel, admin themes, web design, figma, web development, ree admin themes, bootstrap admin, bootstrap dashboard" />
		<link rel="canonical" href="Https://preview.keenthemes.com/metronic8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="shortcut icon" href="assets/media/logos/favicon.ico" />
		<!--begin::Fonts-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
		<!--end::Fonts-->
		<!--begin::Global Stylesheets Bundle(used by all pages)-->
		<link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
		<link href="assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
		<!--end::Global Stylesheets Bundle-->
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" style="background-image: url(assets/media/patterns/header-bg.jpg)" class="bg-white">
		<!--begin::Main-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Authentication - Sign-up -->
				<!--begin::Content-->
				<div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
					<!--begin::Logo-->
					<a href="/" class="mb-12">
						<img alt="Logo" src="{{ asset('assets/media/logos/PNG Logo Ngalodern 3.png')}}" class="h-45px" />
					</a>
					<!--end::Logo-->
					<!--begin::Wrapper-->
					<div class="card w-lg-600px bg-white rounded shadow-sm p-10 p-lg-15 mx-auto">
						@if (session('resent'))
				        <div class="alert alert-success mb-4" role="alert">
				            Email verifikasi berhasil dikirim. Silakan cek inbox pada email Anda. Pastikan juga untuk mengecek folder spam Anda jika email dari kami tidak ada pada inbox email Anda.
				        </div>
				        @else
				        <div class="alert alert-success mb-4" role="alert">
				            Email verifikasi berhasil dikirim. Silakan cek inbox pada email Anda. Pastikan juga untuk mengecek folder spam Anda jika email dari kami tidak ada pada inbox email Anda.
				        </div>
				        @endif
						<div class="container-fluid">
							<div class="card-header">
								<h3 class="fs-4 fw-bolder text-dark">Verifikasi Akun Anda</h3>
							</div>
							<div class="card-body">
								<p class="text-gray-600 fs-6 fw-bold pt-3 mb-0">Sebelum melanjutkan, buka email anda untuk verifikasi akun. Jika email tidak ada silahkan request ulang.</p>
							</div>
							<!--begin::Summary-->
                            <div class="d-flex flex-stack pt-8">
                                <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-primary">Request Ulang</button>.
                                </form>
                                <form class="d-block" method="post" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-primary">Logout</button>
                                </form>
                            </div>
                            <!--end::Summary-->
						</div>
					</div>
					<!--end::Wrapper-->
				</div>
				<!--end::Content-->
			</div>
			<!--end::Authentication - Sign-up-->
		</div>
		<!--end::Main-->
		<!--begin::Javascript-->
		<!--begin::Global Javascript Bundle(used by all pages)-->
		<script src="assets/plugins/global/plugins.bundle.js"></script>
		<script src="assets/js/scripts.bundle.js"></script>
		<!--end::Global Javascript Bundle-->
		<!--begin::Page Custom Javascript(used by this page)-->
		<script src="assets/js/custom/authentication/sign-up/general.js"></script>
		<!--end::Page Custom Javascript-->
		<script src="{{ asset('assets/js/custom/select.js')}}"></script>
		<!--end::Javascript-->
	</body>
	<!--end::Body-->
</html>