
<!--begin::Page Vendors Javascript(used by this page)-->
<script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>
<!--end::Page Vendors Javascript-->
<!--begin::Page Custom Javascript(used by this page)-->
<script src="{{ asset('assets/js/custom/apps/user-management/users/list/table.j')}}s"></script>
<script src="{{ asset('assets/js/custom/apps/user-management/users/list/export-users.js')}}"></script>
<script src="{{ asset('assets/js/custom/apps/user-management/users/list/add.js')}}"></script>
<script src="{{ asset('assets/js/custom/apps/user-management/roles/view/view.js') }}"></script>
<script src="{{ asset('assets/js/custom/apps/user-management/roles/view/update-role.js') }}"></script>
<script src="{{ asset('assets/js/custom/modals/create-account.js')}}"></script>
<script src="{{ asset('assets/js/custom/widgets.js')}}"></script>
<script src="{{ asset('assets/js/custom/apps/chat/chat.js')}}"></script>
<script src="{{ asset('assets/js/custom/modals/create-app.js')}}"></script>
<script src="{{ asset('assets/js/custom/modals/upgrade-plan.js')}}"></script>
<script src="{{ asset('assets/js/custom/account/settings/signin-methods.js') }}"></script>
<script src="{{ asset('assets/js/custom/account/settings/profile-details.js') }}"></script>
<script src="{{ asset('assets/js/custom/account/settings/deactivate-account.js') }}"></script>

<script>
    $(document).ready(function() {
        $('.isi-konten').find('table').addClass('table align-middle gs-0 gy-4 table-hover');
        $('.isi-konten').find('table tbody').addClass('border border-dark');
        $('.isi-konten').find('table tbody td').addClass('px-3');
    });
</script>

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



<script type="text/javascript">
  $(document).ready(function() {
    $('#summernote').summernote({
        height: 300,                 // set editor height
        minHeight: null,             // set minimum height of editor
        maxHeight: null,             // set maximum height of editor
        focus: true,
        toolbar: [ ["history", ["undo", "redo"]], ["style", ["style"]], ["font", ["bold", "italic", "underline", "fontname", "strikethrough"]],
            ['fontsize', ['fontsize']],
            ["color", ["forecolor", "color"]], ["paragraph", ["ul", "ol", "paragraph", "height"]], ["table", ["table"]], ["insert", ["link", "picture", "video", "audio"]], ["view", ["codeview", "help"]], ]
    });
    
  });
</script>


<script>
  $("#kt_datatable_example_5").DataTable({
 "language": {
  "lengthMenu": "Show _MENU_",
 },
 "dom":
  "<'row'" +
  "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
  "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
  ">" +

  "<'table-responsive'tr>" +

  "<'row'" +
  "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
  "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
  ">"
});
</script>

<!--end::Page Custom Javascript-->