<footer class="main-footer">
    <strong>Copyright &copy; {{ date('Y')}} <a href="{{url('/')}}">B2B</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.0
    </div>
</footer>
<script type="text/javascript">
    var cities_by_seller = '{{route('get-cities-by-state')}}';
</script>