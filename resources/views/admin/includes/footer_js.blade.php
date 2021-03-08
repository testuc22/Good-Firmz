<!-- jQuery -->
<script src="{{asset('admin/plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('admin/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- ChartJS -->
<!-- <script src="plugins/chart.js/Chart.min.js"></script>
Sparkline
<script src="plugins/sparklines/sparkline.js"></script>
JQVMap
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.world.js"></script>
jQuery Knob Chart
<script src="plugins/jquery-knob/jquery.knob.min.js"></script> -->
<!-- daterangepicker -->
<script src="{{asset('admin/plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('admin/plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{asset('admin/plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- FastClick -->
<script src="{{asset('admin/plugins/fastclick/fastclick.js')}}"></script>
<script src="{{asset('admin/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('admin/dist/js/adminlte.js')}}"></script>
<script src="{{asset('admin/plugins/toastr/toastr.min.js')}}"></script>
<script src="{{asset('admin/plupload.full.min.js')}}"></script>
<script src="{{asset('admin/jquery.ui.plupload.js')}}"></script>
{{-- <script src="{{asset('admin/jquery.plupload.queue.js')}}"></script> --}}
<script src="{{asset('admin/moxie.js')}}"></script>
<script src="{{asset('admin/plugins/select2/js/select2.full.min.js')}}"></script>
<script src="{{asset('admin/dist/js/custom.js?Ver=fdg789')}}"></script>

<script src="{{asset('admin/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js')}}"></script>

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- <script src="dist/js/pages/dashboard.js"></script>
AdminLTE for demo purposes-->
{{-- <script src="{{asset('dist/js/demo.js')}}"></script>  --}}
<style type="text/css">
.dataTables_wrapper .bottom {
    display: flex;
    justify-content: space-between;
}
.dataTables_length label{
  display: flex;
}
</style>
<script>
  $(function () {
    $("#example1").DataTable({
        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
        "filter": true
    });
    // Summernote
    $('.textarea').summernote({
      minHeight:150
    });
    //Initialize Select2 Elements
    $('.select2').select2()
    var msg = "{{ Session::has('success') ? Session::get('success') : Session::get('error')}}";
    var msg_type = "{{ Session::has('success') ? "success" : "error" }}";
    if (msg != "") {
        show_success(msg,msg_type);
    }
  });
</script>