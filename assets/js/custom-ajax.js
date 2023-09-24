jQuery(document).ready(function($) {
    // $('#my-button').on('click', function() {
        $.ajax({
            url: ajax_object.ajax_url,
            type: 'POST',
            data: {
                action: 'my_custom_action',
                nonce: ajax_object.ajax_nonce, // Include the nonce
                // Add any other data you need to send
            },
            success: function(response) {
                // Handle the response from the server
                alert('Response from server: ' + response);
            },
        });
    // });
});
