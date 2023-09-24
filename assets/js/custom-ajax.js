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

    function get_product_with_pagination(term_slug, posts_per_page, page_no){
        $.ajax({
            url: ajax_object.ajax_url,
            type: 'POST',
            data: {
                action: 'get_product_with_pagination',
                nonce: ajax_object.ajax_nonce, // Include the nonce
                'term_slug' : term_slug,
                'posts_per_page' : posts_per_page,
                'page_no' : page_no,
                // Add any other data you need to send
            },
            success: function(response) {
                
                // Handle the response from the server
                // alert('Response from server: ' + response);
            },
        });
    }
    $(document).on('click', '.get-product', function(){
        console.log('ddddddddddd')
        get_product_with_pagination('free-mockups', 10, 1, 'free-mockup');
        console.log(paginated_product)
    });
});
