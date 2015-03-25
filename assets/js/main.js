$(document).ready(function() {


    //Prepare modal
    var $pixel_id = 0;
    $('.single-pixel').click(function() {
        //change data toggle for modal
        $(this).attr('data-toggle', 'modal');
        $(this).attr('data-target', '#buyPixel');
        //Get pixel id clicked and insert it in a hidden input form
        $("#pixel_id").prop('value',  $(this).prop('id') );
    });
    //When user hits save..
    $("#buy_now").click(function() {
        var $url_val = $("#user_url"),
            $color_val = $('#user-color-picker'),
            $user_comment_val = $('#user_comment');
            $pixel_id_val = $("#pixel_id").val();
        //Client side simple validation to ensure user input.
        if ($.trim($url_val.val()) === '' || $.trim($user_comment_val.val()) === '' || $.trim($color_val.val()) === '') {
            ($url_val.val() === '') ? $url_val.addClass("error") : $url_val.removeClass("error");
            ($color_val.val() === '') ? $color_val.addClass("error") : $color_val.removeClass("error");
            ($user_comment_val.val() === '') ? $user_comment_val.addClass("error") :
                $user_comment_val.removeClass("error");
            return false;
        }
        $url_val.removeClass("error");
        $color_val.removeClass("error");
        $user_comment_val.removeClass("error");
        $color_val = $('#user-color-picker').val();
        $url_val = $url_val.val();
        $user_comment_val = $user_comment_val.val();
        $('#buyPixel').modal('hide');

        if ($url_val.search(/^http[s]?\:\/\//) == -1) {
             $url_val = 'http://' + $url_val;
        }
        $.ajax({
            url: "/data/index.php",
            type:"POST",
            data: {
                'color': $color_val,
                'url': $url_val,
                'description': $user_comment_val,
                'pixel_id': $pixel_id_val
            },
            
        }).done(function(){
            //form cleanup
            $(':input','#save_my_pixel')
                .not(':button, :submit')
                .val('');
            window.location = window.location.hash;
        });

        //end of buy operation.
    });



    //Initialize tooltips
    $('[data-toggle="tooltip"]').tooltip();

    //Initialize color picker
    $('.color-picker').colorpicker();



});