
function show_success(msg,msg_type){
    toastr[msg_type].call(toastr,msg);
    toastr.options = {
      "closeButton": true,
      "debug": false,
      "positionClass": "toast-top-right",
      "onclick": null,
      "showDuration": "300",
      "hideDuration": "1000",
      "timeOut": "5000",
      "extendedTimeOut": "1000",
      "showEasing": "swing",
      "hideEasing": "linear",
      "showMethod": "fadeIn",
      "hideMethod": "fadeOut"
    }
}
// Summernote


$(".mobile-menu-icon").click(function(){
    $(".navigation").slideToggle();
    $(".header-form").slideUp();
});
$(".mobile-search-icon").click(function(){
    $(".header-form").slideToggle();
    $(".nav-bar").slideUp();
});

$(".btn-send-enquiry").click(function(){
    $('body').addClass('pop-up-show');
    $('#modal-company-name').html($(this).data('title'));
    $('#enquirySellerInfo').val($(this).data('id'));
    $(".b2bseeker-modal").show();
});

$(".close-icon").click(function(){
    $('body').removeClass('pop-up-show');
    $(".b2bseeker-modal").hide();
});



$(".btn-login-modal").click(function(){
    $('#modal-company-name').html($(this).data('title'));
    $(".b2bseeker-login-modal").show();
});

$(".close-icon").click(function(){
    $(".b2bseeker-login-modal").hide();
});

$(".btn-login-modal").click(function(){
    $('#modal-company-name').html($(this).data('title'));
    $(".b2bseeker-view-review").show();
});

$(".close-icon").click(function(){
    $(".b2bseeker-view-review").hide();
});

$(document).on('change', '#statesList', function(event) {
    let state=$(this).val();
    var loader = $(this).next();
    loader.show();
    $.ajax({
        url: cities_by_seller,
        type: 'PUT',
        data:{state:state,'_token':$('meta[name="csrf-token"]').attr('content')},
        success:function(result){
            // console.log(result,"result");
            $('#citiesList').html(result.html);
            loader.hide();
            show_success(result.message,'success');
        }
    });
});
$(document).on('click', '.modal-submit-enquiry-btn', function(event) {
    $('#enquiry-errors').html("");
    var error = false;
    $('.send-enquiry-form .required').each(function(){
        if($(this).val()==""){
            $(this).addClass('required-error');
            error = true;
        }
        else{
            $(this).removeClass('required-error');   
        }
    });  
    console.log(error,"1212121212");
    if(error) 
        return false;
    $.ajax({
        type:'PUT',
        url:submit_enquiry_route,
        dataType:'JSON',
        data:{
            _token:$('meta[name="csrf-token"]').attr('content'),
            seller_id:$('.send-enquiry-form input[name="seller_id"]').val(),
            name:$('.send-enquiry-form input[name="name"]').val(),
            email:$('.send-enquiry-form input[name="email"]').val(),
            phone_number:$('.send-enquiry-form input[name="phone_number"]').val(),
            company_name:$('.send-enquiry-form input[name="company_name"]').val(),
            pincode:$('.send-enquiry-form input[name="pincode"]').val(),
            content:$('.send-enquiry-form textarea[name="content"]').val(),
        },
        success:function(resp){
            console.log(resp,"resp")
            if(resp.errors.length){
                $.each(resp.errors, function(key, value){
                    $('#enquiry-errors').append('<p>'+value+'</p>');
                });
                return false;
            }
            else{
                window.location.reload();
            }
        },
        error:function(){
            console.log("error");
        }
    })
});


$(document).on('click','.view-user-review',function() {
    $('#content-user-review').html($(this).data('review'));
    $('#content-user-phone').html($(this).data('phone'));
    $('.b2bseeker-view-review').show()
})
function getLocationsAvailable(){
    $.ajax({
        type:'POST',
        url:get_all_locations_for_search,
        data:{
            _token:$('meta[name="csrf-token"]').attr('content')
        },
        success:function(resp){
            if(resp.message=="success"){
                autocomplete(document.getElementById("locationInput"), resp.locations);
            }
        },
        error:function(){
            console.log("error");
        }
    })
}
setTimeout(function(){
    getLocationsAvailable();
    setRatings();
    if($('.textarea').length){
        $('.textarea').summernote({
            minHeight:150
        });
    }
    if($('.select2').length){
        $('.select2').select2();
    }
    if($('#example1').length){
        $("#example1").DataTable({
            "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
        });
    }
    
},100);

function setRatings(){
    $('.seller_showRating').each(function(){
        var rating = $(this).data('rating');
        $(this).rating({
            value: rating,
            stars: 5,
            emptyStar: "fa fa-star-o",
            halfStar: "fa fa-star-half-o",
            filledStar: "fa fa-star",
            color: "#feaf17",
            half: true,
            readonly:true
        });
    });
    $(".sellerReviewStars").rating({
        value: 0,
        stars: 5,
        emptyStar: "fa fa-star-o",
        halfStar: "fa fa-star-half-o",
        filledStar: "fa fa-star",
        color: "#feaf17",
        half: true,
        click: function (e) {
            if(e.stars < 0)  e.stars = 0;
            $("#showSelectedCount").html(e.stars);
            $("#sellerReviewStarsInput").val(e.stars);
        }
    });
}
