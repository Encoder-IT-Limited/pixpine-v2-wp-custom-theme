jQuery(document).ready(function($) {
    $('#custom_product_gallery_button').click(function(e) {
        e.preventDefault();

        var custom_uploader = wp.media({
            title: 'Select Images for Gallery',
            button: {
                text: 'Add Images'
            },
            multiple: true
        });

        custom_uploader.on('select', function() {
            var attachments = custom_uploader.state().get('selection').toJSON();
            var imageIds = [];

            for (var i = 0; i < attachments.length; i++) {
                imageIds.push(attachments[i].id);
            }

            $('#custom_product_gallery_container').html('');

            $.ajax({
                type: 'POST',
                url: ajaxurl, // Use the WordPress AJAX URL
                data: {
                    action: 'save_custom_product_gallery',
                    nonce: $('#custom_product_gallery_nonce').val(),
                    imageIds: imageIds
                },
                success: function(response) {
                    $('#custom_product_gallery_container').html(response);
                }
            });
        });

        custom_uploader.open();
    });
});
