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
		<title>{{ __('Register') }}</title>
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
					<div class="w-lg-600px bg-white rounded shadow-sm p-10 p-lg-15 mx-auto">
						<!--begin::Form-->
						<form class="form w-100" novalidate="novalidate" id="kt_sign_up_form" method="POST" action="{{ route('register') }}">
							@csrf
							<!--begin::Heading-->
							<div class="mb-10 text-center">
								<!--begin::Title-->
								<h1 class="text-dark mb-3">Buat Akun</h1>
								<!--end::Title-->
								<!--begin::Link-->
								<div class="text-gray-400 fw-bold fs-4">Sudah punya akun?
								<a href="{{ route('login') }}" class="link-primary fw-bolder">Masuk di sini</a></div>
								<!--end::Link-->
							</div>
							<!--end::Heading-->
							<!--begin::Input group-->
							<div class="row fv-row mb-7">
								<!--begin::Col-->
								<div class="form-group col-xl-12">
									<label class="form-label fw-bolder text-dark fs-6">Daftar Sebagai</label>
									<select name="id_kategori" id="kategori" class="form-control form-control-lg form-control-solid">
										@foreach ($kategori as $data)
										<option value="{{ $data->id }}" class="text-capitalize">{{ $data->kategori }}</option>
										@endforeach
									</select>
								</div>
								<!--end::Col-->
							</div>
							<!--end::Input group-->

							<div id="kategori-option" class="row fv-row mb-7">
								<!--begin::Col-->
								<div class="form-group d-none col-xl-12">
									<label class="form-label fw-bolder text-dark fs-6">NISN</label>
									<input id="nisn" type="text" class="form-control form-control-lg form-control-solid @error('nisn') is-invalid @enderror" name="nisn" value="{{ old('nisn') }}" maxlength="10" required autocomplete="nisn" autofocus>
								</div>
								<!--end::Col-->
								<!--begin::Col-->
								<div class="form-group d-none col-xl-12">
									<label class="form-label fw-bolder text-dark fs-6">NPM</label>
									<input id="npm" type="text" class="form-control form-control-lg form-control-solid @error('npm') is-invalid @enderror" name="npm" value="{{ old('npm') }}" maxlength="15" autocomplete="" autofocus>
								</div>
								<!--end::Col-->
							</div>
                            
							<!--begin::Input group-->
							<div class="row fv-row mb-7">
								<!--begin::Col-->
								<div class="col-xl-12">
									<label class="form-label fw-bolder text-dark fs-6">Nama Lengkap</label>
									<input id="name" type="text" class="form-control form-control-lg form-control-solid @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
								</div>
								<!--end::Col-->
							</div>
							<!--end::Input group-->
							<!--begin::Input group-->
							<div class="row fv-row mb-7">
								<!--begin::Col-->
								<div class="col-xl-12">
									<label class="form-label fw-bolder text-dark fs-6">No Telepon</label>
									<input id="no_telp" type="text" class="form-control form-control-lg form-control-solid @error('no_telp') is-invalid @enderror" name="no_telp" value="{{ old('no_telp') }}" required autocomplete="no_telp" autofocus>

                                @error('no_telp')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
								</div>
								<!--end::Col-->
							</div>
							<!--end::Input group-->
							<!--begin::Input group-->
							<div class="fv-row mb-7">
								<label class="form-label fw-bolder text-dark fs-6">Email</label>
								<input id="email" type="email" class="form-control form-control-lg form-control-solid @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
							</div>
							<!--end::Input group-->
							<!--begin::Input group-->
							<div class="mb-10 fv-row" data-kt-password-meter="true">
								<!--begin::Wrapper-->
								<div class="mb-1">
									<!--begin::Label-->
									<label class="form-label fw-bolder text-dark fs-6">Password</label>
									<!--end::Label-->
									<!--begin::Input wrapper-->
									<div class="position-relative mb-3">
										<input id="password" type="password" class="form-control form-control-lg form-control-solid @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
										<span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">
											<i class="bi bi-eye-slash fs-2"></i>
											<i class="bi bi-eye fs-2 d-none"></i>
										</span>
									</div>
									<!--end::Input wrapper-->
								</div>
								<!--end::Wrapper-->
								<!--begin::Hint-->
								<div class="text-muted">Gunakan 8 atau lebih kombinasi huruf dan angka.</div>
								<!--end::Hint-->
							</div>
							<!--end::Input group=-->
							<!--begin::Input group-->
							<div class="fv-row mb-5">
								<label class="form-label fw-bolder text-dark fs-6">Konfirmasi Password</label>
                                <input id="password-confirm" type="password" class="form-control form-control-lg form-control-solid" name="password_confirmation" required autocomplete="new-password">
							</div>
							<!--end::Input group-->
							<!--begin::Actions-->
							<div class="text-center">
								<button type="submit" class="btn btn-primary">
                                    {{ __('Daftar') }}
                                </button>
							</div>
							<!--end::Actions-->
						</form>
						<!--end::Form-->
						<div class="alert alert-warning mt-5" role="alert">
				            <span class="fw-bold">*Keterangan: </span>Setelah Anda membuat akun, Silakan cek inbox pada email Anda. Pastikan juga untuk mengecek folder spam Anda jika email dari kami tidak ada pada inbox email Anda.
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
		<script>
		    $(document).ready(function() {
               $('#kategori').on('change', function (e) {
                $('#kategori-option input').val("");
                console.log('ok');
                if ($(this).val() == 2) {
                  kategori = $('#kategori-option input[name="nisn"]').closest('.form-group');
                  kategori_reset = $('#kategori-option').find('.form-group');
                  kategori_reset.addClass('d-none');
                  kategori.removeClass('d-none');
                } else if ($(this).val() == 3) {
                  kategori = $('#kategori-option input[name="npm"]').closest('.form-group');
                  kategori_reset = $('#kategori-option').find('.form-group');
                  kategori_reset.addClass('d-none');
                  kategori.removeClass('d-none');
                } else {
                  kategori_reset = $('#kategori-option').find('.form-group');
                  kategori_reset.addClass('d-none');
                }
               })
            })
		</script>
		<!--end::Javascript-->
	</body>
	<!--end::Body-->
</html>