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
					<a href="index.html" class="mb-12">
						<img alt="Logo" src="assets/media/logos/logo-2-dark.svg" class="h-45px" />
					</a>
					<!--end::Logo-->
					<!--begin::Modal dialog-->
					<div class="modal-dialog mw-1000px">
						<!--begin::Modal content-->
						<div class="modal-content">
							<!--begin::Modal header-->
							<div class="modal-header m-auto">
								<!--begin::Title-->
								<h2>Buat Akun Sebagai?</h2>
								<!--end::Title-->
							</div>
							<!--end::Modal header-->
							<!--begin::Modal body-->
							<div class="modal-body scroll-y m-5">
								<!--begin::Stepper-->
								<div class="stepper stepper-links d-flex flex-column" id="kt_create_account_stepper">
									<!--begin::Form-->
									<form class="mx-auto mw-600px w-100 py-10" novalidate="novalidate" id="kt_create_account_form" method="POST" action="{{ route('register') }}">
										@csrf
										<!--begin::Step 1-->
										<div class="current" data-kt-stepper-element="content">
											<!--begin::Wrapper-->
											<div class="w-100">
												<!--begin::Input group-->
												<div class="fv-row">
													<!--begin::Row-->
													<div class="row">
														<!--begin::Col-->
														<div class="col-12">
															<!--begin::Option-->
															<input type="radio" class="btn-check" name="level" value="1" checked="checked" id="kt_create_account_form_account_type_umum" />
															<label class="btn btn-outline btn-outline-dashed btn-outline-default p-7 d-flex 
															align-items-center mb-10" for="kt_create_account_form_account_type_umum">
																<!--begin::Info-->
																<div class="fw-bold d-block m-auto">
																	<h5 class="text-dark fw-bolder d-block fs-4 mb-2">Umum</h5>
		                                                        </div>
																<!--end::Info-->
															</label>
															<!--end::Option-->
														</div>
														<!--end::Col-->
														<!--begin::Col-->
														<div class="col-12">
															<!--begin::Option-->
															<input type="radio" class="btn-check" name="level" value="2" id="kt_create_account_form_account_type_pelajar" />
															<label class="btn btn-outline btn-outline-dashed btn-outline-default p-7 d-flex align-items-center mb-10" for="kt_create_account_form_account_type_pelajar">
																<!--begin::Info-->
																<div class="fw-bold d-block m-auto">
																	<h5 class="text-dark fw-bolder d-block fs-4 mb-2">Pelajar</h5>
		                                                        </div>
																<!--end::Info-->
															</label>
															<!--end::Option-->
														</div>
														<!--end::Col-->
														<!--begin::Col-->
														<div class="col-12">
															<!--begin::Option-->
															<input type="radio" class="btn-check" name="level" value="3" id="kt_create_account_form_account_type_mahasiswa" />
															<label class="btn btn-outline btn-outline-dashed btn-outline-default p-7 d-flex align-items-center mb-10" for="kt_create_account_form_account_type_mahasiswa">
																<!--begin::Info-->
																<div class="fw-bold d-block m-auto">
																	<h5 class="text-dark fw-bolder d-block fs-4 mb-2">Mahasiswa</h5>
		                                                        </div>
																<!--end::Info-->
															</label>
															<!--end::Option-->
														</div>
														<!--end::Col-->
													</div>
													<!--end::Row-->
												</div>
												<!--end::Input group-->
											</div>
											<!--end::Wrapper-->
										</div>
										<!--end::Step 1-->
										<!--begin::Actions-->
										<div class="d-flex flex-stack pt-15 justify-content-center">
											<!--begin::Wrapper-->
											<div>
												<button type="submit" class="btn btn-primary">
													Selanjutnya
												</button>
											</div>
											<!--end::Wrapper-->
										</div>
										<!--end::Actions-->
									</form>
									<!--end::Form-->
								</div>
								<!--end::Stepper-->
							</div>
							<!--end::Modal body-->
						</div>
						<!--end::Modal content-->
					</div>
					<!--end::Modal dialog-->
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
		<script src="assets/js/custom/modals/create-account.js"></script>
		<script src="assets/js/custom/widgets.js"></script>
		<script src="assets/js/custom/apps/chat/chat.js"></script>
		<script src="assets/js/custom/modals/create-app.js"></script>
		<script src="assets/js/custom/modals/upgrade-plan.js"></script>
		<script src="assets/js/custom/authentication/sign-up/general.js"></script>
		<!--end::Page Custom Javascript-->
		<!--end::Javascript-->
	</body>
	<!--end::Body-->
</html>