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
});
