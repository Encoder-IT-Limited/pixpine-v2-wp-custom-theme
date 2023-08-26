jQuery(document).ready(function($) {

    var finalData = [];
    $.ajax({
        type: 'POST',
        url: ajaxurl, // Use the WordPress AJAX URL
        data: {
            action: 'get_all_product',
            nonce: $('#custom_product_gallery_nonce').val(),
        },
        success: function(response) {
            var dataObject = JSON.parse(response);
            
            $.each( dataObject, function( key, value ) {
                // console.log(key + ": " + value)
                var tmp = {};
                tmp.text = value;
                tmp.value = key;
                finalData.push(tmp)
            });
            console.log(finalData)


    // Select 2 multi select with search
    $('.related-product').multiSelect({
        data: finalData,
        listen(tags, item, operate){
            console.log("-----------a-----------")
            console.log(tags);
            // console.log('tags: ',tags,'item: ', item,'operate: ', operate);
            console.log("-----------a-----------")
        },
        compare(item1, item2){
            if(item1.text.length > item2.text.length){
                return true;
            }else{
                return false;
            }
        }
    });
    
    
    $('.similar-product').multiSelect({
        data: finalData,
        listen(tags, item, operate){
            console.log("-----------b-----------")
            console.log(tags, item, operate);
            console.log("-----------b-----------")
        },
        compare(item1, item2){
            if(item1.text.length > item2.text.length){
                return true;
            }else{
                return false;
            }
        }
    });


        }
    });





    // Gallery

    var preSelectedImages = $("#_custom_product_gallery").val();

    $('#custom_product_gallery_button').click(function(e) {
        e.preventDefault();
     
        if((preSelectedImages.length==0)){
            var autoSelectedImages = [];
        }else{
            var autoSelectedImages = preSelectedImages.split(",");;
        }

        var custom_uploader = wp.media({
            title: 'Select Images for Gallery',
            button: {
                text: 'Add Images'
            },
            multiple: true
        });
        
        // Open the media uploader
        custom_uploader.open();
        
        // Pre-select the images
        custom_uploader.state().get('selection').reset();
        autoSelectedImages.forEach(function(imageID) {
            var attachment = wp.media.attachment(imageID);
            attachment.fetch();
            custom_uploader.state().get('selection').add(attachment);
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
                    preSelectedImages = imageIds.toString();
                    $("#_custom_product_gallery").val(imageIds.toString());
                    $('#custom_product_gallery_container').html(response);
                }
            });
        });

        custom_uploader.open();
    });
});
