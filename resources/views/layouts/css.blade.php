    <link rel="canonical" href="Https://preview.keenthemes.com/metronic8" />
		<link rel="shortcut icon" href="assets/media/logos/favicon.ico" />
		<!--begin::Fonts-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
		<!--end::Fonts-->
		<!--begin::Page Vendor Stylesheets(used by this page)-->
		<link href="{{asset ('assets/plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />
		<!--end::Page Vendor Stylesheets-->
		<!--begin::Global Stylesheets Bundle(used by all pages)-->
		<link href="{{ asset('assets/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('assets/css/style.bundle.css')}}" rel="stylesheet" type="text/css" />

		<!--begin::Global Javascript Bundle(used by all pages)-->
		<script src="{{ asset('assets/plugins/global/plugins.bundle.js')}}"></script>
		<script src="{{ asset('assets/js/scripts.bundle.js')}}"></script>
		<!--end::Global Javascript Bundle-->
		
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.css"/>
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.js"></script>
	    
	    <!-- include summernote css/js -->
        <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
        
        <script src="{{ asset('assets/js/summernote.min.css') }}"></script>
        <script src="{{ asset('assets/js/summernote.min.js') }}"></script>
        <link rel="stylesheet" href="{{ asset('assets/js/summernote-audio.css') }}">
        <script type="text/javascript" src="{{ asset('assets/js/summernote-audio.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/js/summernote-file.js') }}"></script>
        
		<style>
			.nav-tabs .nav-link.active {
				background-color: #009EF7 !important;
				color: white !important;
			}

			.nav-tabs .nav-link.active i {
				color: white !important;
			}
			
			.text-hidden{
				white-space: nowrap; 
				overflow: hidden;
				text-overflow: ellipsis;
			}
			
			audio {
			    width: 100px !important;
			}
			
			
			audio::-webkit-media-controls-enclosure {
        	    background-color: transparent;
        	    margin: 0;
        	    padding: 0;
        	}
        	
        	audio::-webkit-media-controls-mute-button {
        	    display: none !important;
        	}
        
        	audio::-webkit-media-controls-timeline {
        		display: none !important;
        	}
        	
        	audio::-webkit-media-controls-current-time-display {
        		display: none !important;
        	}
        
        	audio::-webkit-media-controls-panel {
        		justify-content: center;
        		padding: 0;
        	}
        
        	audio::-webkit-media-controls-play-button {
        		background-color: gainsboro;
        		border-radius: 100%;
        	}	
        
        	audio::-webkit-media-controls-time-remaining-display {
        		display: none !important;
        	}
        	audio::-webkit-media-controls-volume-control-container {
        		display: none !important;
        	}
        	audio::-webkit-media-controls-volume-control-container.closed {
        		display: none !important;
        	}
        	audio::-webkit-media-controls-volume-slider-container {
        		display: none !important;
        	}
        	audio::-webkit-media-controls-volume-slider {
        		display: none !important;
        	}
        	audio::-webkit-media-controls-seek-back-button {
        		display: none !important;
        	}
        	audio::-webkit-media-controls-seek-forward-button {
        		display: none !important;
        	}
        	audio::-webkit-media-controls-fullscreen-button {
        		display: none !important;
        	}
        	audio::-webkit-media-controls-rewind-button {
        		display: none !important;
        	}
        	audio::-webkit-media-controls-return-to-realtime-button {
        		display: none !important;
        	}
        	audio::-webkit-media-controls-toggle-closed-captions-button {
        		display: none !important;
        	}
			
		</style>