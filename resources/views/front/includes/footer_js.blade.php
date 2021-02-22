
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->

<script src="{{asset('admin/plugins/toastr/toastr.min.js')}}"></script>
<script src="{{asset('front/js/rating.js')}}"></script>
<script type="text/javascript" src="{{asset('front/js/autocomplete.js')}}"></script>
<script src="{{asset('front/js/custom_js.js')}}" async></script>
<script type="text/javascript">
$(document).ready(function () {
	
	var msg = "{{ Session::has('success') ? Session::get('success') : Session::get('error')}}";
    var msg_type = "{{ Session::has('success') ? "success" : "error" }}";
    if (msg != "") {
        show_success(msg,msg_type);
    }
});
</script>