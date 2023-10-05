jQuery(document).ready(function($) {

    /**
     * Ajax template
     */
    // $.ajax({
    //     url: ajax_object.ajax_url,
    //     type: 'POST',
    //     data: {
    //         action: 'my_custom_action',
    //         nonce: ajax_object.ajax_nonce, // Include the nonce
    //         // Add any other data you need to send
    //     },
    //     success: function(response) {
    //         // Handle the response from the server
    //         alert('Response from server: ' + response);
    //     },
    // });

    function get_product_with_pagination(term_slug, posts_per_page, page_no, mockup_type, html_output_class){
        $.ajax({
            url: ajax_object.ajax_url,
            type: 'POST',
            data: {
                action: 'get_product_with_pagination',
                nonce: ajax_object.ajax_nonce, // Include the nonce
                'term_slug' : term_slug,
                'posts_per_page' : posts_per_page,
                'page_no' : page_no,
                'mockup_type' : mockup_type,
                // Add any other data you need to send
            },
            success: function(response) {
                $('.'+html_output_class).html(response);
                $('html, body').animate({
                    scrollTop: $('.'+html_output_class).offset().top
                }, 500);
            },
        });
    }
    $(document).on('click', '.get-product', function(){
        var mockup_type = $("#mockup-type").val(); //free-mockups
        var posts_per_page = $("#post-per-page").val(); 
        var page_no = $(this).attr('page-no'); 
        var term_slug = $(this).attr('cat-slug'); 
        var html_output_class = $('#html-output-class').val(); 
        console.log(term_slug, posts_per_page, page_no, mockup_type, html_output_class);
        get_product_with_pagination(term_slug, posts_per_page, page_no, mockup_type, html_output_class);
    });

    $(document).on('click', '.submit-subscription', function(){
        var sub_email = $("#subscription-email").val(); //free-mockups

        if(emailValidate(sub_email)){
            $.ajax({
                url: ajax_object.ajax_url,
                type: 'POST',
                data: {
                    action: 'save_subscription_email',
                    nonce: ajax_object.ajax_nonce, // Include the nonce
                    'sub_email' : sub_email
                },
                success: function(response) {
                    alert(response);
                    $("#subscription-email").val("");
                },
            });            
        }else{
            alert('This is not a valid email.');
        }

    });
    function emailValidate(email){
        var check = "" + email;
        if((check.search('@')>=0)&&(check.search(/\./)>=0))
            if(check.search('@')<check.split('@')[1].search(/\./)+check.search('@')) return true;
            else return false;
        else return false;
    }

    $(document).on('submit', '#login-form', function(e){
        e.preventDefault();

        var user_email = $("#login-email").val();
        var user_password = $("#login-password").val();

        $.ajax({
            url: ajax_object.ajax_url,
            type: 'POST',
            data: {
                action: 'pixpine_login_user',
                nonce: ajax_object.ajax_nonce, // Include the nonce
                'user_email' : user_email,
                'user_password' : user_password,
            },
            success: function(response) {
                if(response == 'success'){
                    alert('Login successful. Redirecting...');
                    window.location.reload();
                }else{
                    alert(response);
                }
            },
        });    

    });

    $(document).on('submit', '#signup-form', function(e){
        e.preventDefault();

        var signup_first_name = $("#signup-first-name").val();
        var signup_last_name = $("#signup-last-name").val();
        var signup_email = $("#signup-email").val();

        $.ajax({
            url: ajax_object.ajax_url,
            type: 'POST',
            data: {
                action: 'pixpine_signup',
                nonce: ajax_object.ajax_nonce, // Include the nonce
                'signup_first_name' : signup_first_name,
                'signup_last_name' : signup_last_name,
                'signup_email' : signup_email,
            },
            success: function(response) {
                if(response == 'success'){
                    alert('Signup is successful. We have sent you password in your email.');
                    window.location.reload();
                }else{
                    alert(response);
                }
            },
        });    

    });

    // show download button after time
    if ($("#hidden-post-id-free-mockup-download-page").length > 0) {

        var downloadButton = '';
        var postId = $("#hidden-post-id-free-mockup-download-page").val();
    
        $.ajax({
            url: ajax_object.ajax_url,
            type: 'POST',
            data: {
                action: 'pixpine_get_html_download_link',
                nonce: ajax_object.ajax_nonce, // Include the nonce
                'postId' : postId,
            },
            success: function(response) {
                downloadButton = response;
                // $(".free_download_btn_contianer").html(response);
            },
        });  

        var tmpTime = 10;
        var interval = setInterval(function() {
            tmpTime--;
            if(tmpTime>=0){
                $("#time-count").html(tmpTime);
            }else{
                $(".free_download_btn_contianer").html(downloadButton);
                clearInterval(interval);
            }
        }, 1000);
    }
    
});
