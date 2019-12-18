jQuery(document).ready(function($){

	var the100_upload;
	var the100_selector;
    function the100_add_file(event, selector) {

		var upload = $(".uploaded-file"), frame;
		var $el = $(this);
		the100_selector = selector;

		event.preventDefault();

		// If the media frame already exists, reopen it.
		if ( the100_upload ) {
			the100_upload.open();
		} else {
			// Create the media frame.
			the100_upload = wp.media.frames.the100_upload =  wp.media({
				// Set the title of the modal.
				title: $el.data('choose'),

				// Customize the submit button.
				button: {
					// Set the text of the button.
					text: $el.data('update'),
					// Tell the button not to close the modal, since we're
					// going to refresh the page when the image is selected.
					close: false
				}
			});

			// When an image is selected, run a callback.
			the100_upload.on( 'select', function() {
				// Grab the selected attachment.
				var attachment = the100_upload.state().get('selection').first();
				the100_upload.close();
                the100_selector.find('.upload').val(attachment.attributes.url);
				if ( attachment.attributes.type == 'image' ) {
					the100_selector.find('.screenshot').empty().hide().append('<img src="' + attachment.attributes.url + '"><a class="remove-image">Remove</a>').slideDown('fast');
				}
				the100_selector.find('.upload-button-wdgt').unbind().addClass('remove-file').removeClass('upload-button-wdgt').val(the100Uploader.remove);
				the100_selector.find('.of-background-properties').slideDown();
				the100_selector.find('.remove-image, .remove-file').on('click', function() {
					the100_remove_file( $(this).parents('.section') );
				});
			});

		}

		// Finally, open the modal.
		the100_upload.open();
	}

	function the100_remove_file(selector) {
		selector.find('.remove-image').hide();
		selector.find('.upload').val('');
		selector.find('.of-background-properties').hide();
		selector.find('.screenshot').slideUp();
		selector.find('.remove-file').unbind().addClass('upload-button-wdgt').removeClass('remove-file').val(the100Uploader.upload);
		// We don't display the upload button if .upload-notice is present
		// This means the user doesn't have the WordPress 3.5 Media Library Support
		if ( $('.section-upload .upload-notice').length > 0 ) {
			$('.upload-button-wdgt').remove();
		}
		selector.find('.upload-button-wdgt').on('click', function(event) {
			the100_add_file(event, $(this).parents('.section'));
            
		});
	}

	$(document).on('click','.remove-image, .remove-file', function() {
		the100_remove_file( $(this).parents('.section') );
    });

    $(document).on('click', '.upload-button-wdgt', function( event ) {
    	the100_add_file(event, $(this).parents('.section'));
    });

});