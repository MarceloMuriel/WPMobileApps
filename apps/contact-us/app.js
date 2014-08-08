/**
 * This function refreshes the UI components everytime the app
 * becomes visible.
 */
function wpmobContactUsRefresh() {
	jQuery('.wpmob-contact-us form').show().get(0).reset();
	jQuery('.wpmob-contact-us-answer > span').empty().parent().hide();
}


jQuery('.wpmob-contact-us form').submit(function(e) {
	e.preventDefault();
	form = jQuery(this);
	console.log(form);
	jQuery.ajax({
		type : 'POST',
		url : form.attr('action'),
		data : form.serialize(),
		success : function(data) {
			if ( typeof (data) == 'object') {
				// Normally a single object is returned
				out = data[0];
				if (out.type == 'success') {
					jQuery('.wpmob-contact-us-answer > span').html(out.msg).removeClass('error').parent().show();
					jQuery('.wpmob-contact-us form').hide();
				} else {
					jQuery('.wpmob-contact-us-answer > span').html(out.msg).addClass('error').parent().show();
				}
			} else {
				// Unknown error
				jQuery('.wpmob-contact-us-answer > span').html(data).addClass('error').parent().show();
			}
		}
	});
});
