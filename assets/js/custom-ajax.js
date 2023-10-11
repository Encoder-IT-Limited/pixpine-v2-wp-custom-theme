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


    // home premium product
    $(document).on('click', '.get-product-home-premium', function(){
        var term_slug = $(this).attr('cat-slug');
        $.ajax({
            url: ajax_object.ajax_url,
            type: 'POST',
            data: {
                action: 'get_product_home_premium',
                nonce: ajax_object.ajax_nonce, // Include the nonce
                'term_slug' : term_slug,
                'posts_per_page' : 10,
                'page_no' : 1,
                // 'mockup_type' : mockup_type,
                // Add any other data you need to send
            },
            success: function(response) {
                $('.home-premium-products').html(response);
            },
        });
    });

    // home free product
    $(document).on('click', '.get-product-home-free', function(){
        var term_slug = $(this).attr('cat-slug');
        $.ajax({
            url: ajax_object.ajax_url,
            type: 'POST',
            data: {
                action: 'get_product_home_free',
                nonce: ajax_object.ajax_nonce, // Include the nonce
                'term_slug' : term_slug,
                'posts_per_page' : 8,
                'page_no' : 1,
                // 'mockup_type' : mockup_type,
                // Add any other data you need to send
            },
            success: function(response) {
                $('.home-free-products').html(response);
            },
        });
    });


    // email subscription
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

    // login
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

    // signup
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

    // show modal in single premium product page
    if ($("#hidden-show-premium-modal").length > 0) {
        $("#premiumModal").modal("show");
    }


    // show modal in single bundle product page
    if ($("#hidden-show-bundle-modal").length > 0) {
        $("#bundleModal").modal("show");

            /* Bundle product page modal slider start */
    $('.bundle_single_img_slider').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        dots: false,
        arrows: true,
        autoplay: false,
        asNavFor: '.bundle_multiple_img_slider'
    });
    $('.bundle_multiple_img_slider').slick({
        slidesToShow: 6,
        slidesToScroll: 1,
        asNavFor: '.bundle_single_img_slider',
        dots: false,
        arrows: false,
        autoplay: false,
        focusOnSelect: true,
        responsive: [{
                breakpoint: 1025,
                settings: {
                    slidesToShow: 4,
                }
            },
            {
                breakpoint: 451,
                settings: {
                    slidesToShow: 3,
                }
            }
        ]
    });
    /* Bundle product page modal slider end */
    /* 06.10.2023 end */

        
        /* bundle-mockups-product-page slider */

        $('.bundle_related_slider').slick({
            dots: true,
            infinite: true,
            arrows: false,
            autoplay: true,
            speed: 300,
            slidesToShow: 4,
            slidesToScroll: 4,
            responsive: [{
                    breakpoint: 1201,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3,
                        infinite: true,
                        dots: true
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
            ]
        });

    }
    
});
