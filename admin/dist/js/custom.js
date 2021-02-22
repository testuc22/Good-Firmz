function show_success(msg,msg_type){
    toastr[msg_type].call(toastr,msg);
    toastr.options = {
      "closeButton": true,
      "debug": false,
      "positionClass": "toast-top-right",
      "onclick": null,
      "showDuration": "6000",
      "hideDuration": "1000",
      "timeOut": "5000",
      "extendedTimeOut": "1000",
      "showEasing": "swing",
      "hideEasing": "linear",
      "showMethod": "fadeIn",
      "hideMethod": "fadeOut"
    }
}
$(document).on('change','.checkAllBoxes',function(){
    var val = $(this).prop('checked');
    val == true ? $('.checkBox').prop('checked',true) : $('.checkBox').prop('checked',false)
})
$(document).on('change', '#statesList', function(event) {
    let state=$(this).val();
    var loader = $(this).next();
    loader.show();
    $.ajax({
        url: cities_by_seller,
        type: 'PUT',
        data:{state:state,'_token':$('meta[name="csrf-token"]').attr('content')},
        success:function(result){
            console.log(result,"result");
            $('#citiesList').html(result.html);
            loader.hide();
            show_success(result.message,'success');
        }
    });
});