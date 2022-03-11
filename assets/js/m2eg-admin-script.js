(function($) {

    // function m2eg_update_image_container_indexes() {

    //     image_count = $('.portfolio-image-container').length;

    //     for ( var i; i < image_count; i++ ) {

    //         image = $('.portfolio-image-container').eq(i);
    //         image.attr('id', 'image-' + i);
    //         image.find('.portfolio-image-upload').attr('data-index', i);
    //         image.find('.portfolio-image').attr({
    //             'id': 'portfolio-image-' + i,
    //             'name': 'portfolio_image_' + i 
    //         });
    //         image.find('.portfolio-image-preview').attr('id', 'portfolio-image-preview-' + i );
    //         image.find('.delete-image').attr({
    //             'id': 'delete-image-' + i,
    //             'data-index': i
    //         });
        
    //     }

    // }

    function m2eg_update_portfolio_images_data() {

        var images_ids = [];
        $('.portfolio-image').each( function() {                    
            images_ids.push( $(this).val() );
        });
        $('#portfolio-images').val(images_ids);

    }

    /*
     * Portfolio: Media Uploader
     */

    var mediaUploader;

    $('#portfolio_images').on('click', '.portfolio-image-upload', function(e) {

        e.preventDefault();

        id = $(this).data('index');
        input = $('#portfolio-image-' + id);
        preview = $('#portfolio-image-preview-' + id);
        delete_toggler = $('#delete-image-' + id);

        if (mediaUploader) {
            mediaUploader.open();
            return;
        }

        mediaUploader = wp.media.frames.file_frame = wp.media({
            title: 'Choisir les images du projet',
            button: {
                text: 'Choisir cette image'
            },
            multiple: false
        });

        mediaUploader.on('select', function() {

            attachment = mediaUploader.state().get('selection').first().toJSON();            
            preview.css('background-image', 'url(' + attachment.url + ')');
            preview.removeClass('blank');
            delete_toggler.removeClass('hidden');
            preview.removeClass('hidden');
            $('#image-' + id).removeClass('hidden');
            $('#portfolio-add-images').removeClass('hidden');

            input.val(attachment.id);

            m2eg_update_portfolio_images_data();

        });

        mediaUploader.open();
    
    });

    // Delete image
    $('.delete-image').click( function() {

        var id = $(this).attr('data-index');
        $('#portfolio-image-' + id).val('');
        $('#portfolio-image-preview-' + id).css('background-image', '').addClass('hidden');
        $(this).removeClass('visible');

        // Hide last remaining image container instead of deleting it
        if ( $('.portfolio-image-container').length === 1 ) {
            $('#portfolio-image-preview-' + id).addClass('hidden');
            $('#portfolio-add-images').addClass('hidden');     
        } else {
            $('#image-' + id).remove();
        }
        $(this).addClass('hidden');

        m2eg_update_portfolio_images_data();    

    });

    $('#portfolio-add-images').on('click', function(e) {

        e.preventDefault();
        
        var images_count = $('.portfolio-image-container').length;
        var i = images_count++;
        var last_image = $('.portfolio-image-container').last();
        var new_image = last_image.clone();        
        var import_button = new_image.find('.portfolio-image-upload');
        var selected_image = new_image.find('.portfolio-image');
        var image_preview = new_image.find('.portfolio-image-preview');
        var delete_image = new_image.find('.delete-image');

        import_button.attr('data-index', i);

        new_image.attr('id', 'image-' + i);

        selected_image.attr('id', 'portfolio-image-' + i);
        selected_image.attr('name', 'portfolio_image_' + i);
        selected_image.val('');

        image_preview.attr('id', 'portfolio-image-preview-' + i); 
        image_preview.css('background-image', 'none');

        delete_image.attr('id', 'delete-image-' + i);
        delete_image.attr('data-index', i);
        
        new_image.removeClass('hidden');

        last_image.after(new_image);
        import_button.trigger('click');       
 
       
    });

})(jQuery);
