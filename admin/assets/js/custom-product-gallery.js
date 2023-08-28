jQuery(document).ready(function($) {

    // search product
    // $("#related-product-search-input").keyup(function(){
    $(document).on('keyup click', "#related-product-search-input", function(){
        var search = $(this).val();
        if(search.length > 3){
            $.ajax({
                type: 'POST',
                url: ajaxurl, // Use the WordPress AJAX URL
                data: {
                    action: 'search_product',
                    nonce: $('#custom_product_gallery_nonce').val(),
                    search: search
                },
                success: function(response) {
                    var obj = JSON.parse(response);
                    // console.log(data)
                    var html = '';
                    // var html = '<div p-id="5" class="related-product-option"><strong>This is good</strong></div>';
                    $.each( obj, function( key, value ) {
                        html += '<div p-id="'+key+'" p-name="'+value+'" class="related-product-option"><strong>'+value+'</strong></div>';
                    });
                    $("#related-product-options").html(html)
                }
            });
        }else{
            $("#related-product-options").html('')
        }
    });
    $(document).on('click', '.related-product-option', function(){
        var pId = $(this).attr('p-id');
        var pName = $(this).attr('p-name');
        var html2 = '<li id="'+pId+'">'+pName+'<span r-id="'+pId+'" class="remove-related-product remoove-product">remove</span></li>';
        $(".selected-related-product").append(html2);
        $(this).remove();
    });
    $(document).on('click', '.remove-related-product', function(){
        var pId = $(this).attr('r-id');
        $("#"+pId).remove();
    });
    
    $(document).on("click", function(event){
        if(!$(event.target).closest(".related-product-option").length){
            $("#related-product-options").html('')
        }
    });

    // search product - Ends
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