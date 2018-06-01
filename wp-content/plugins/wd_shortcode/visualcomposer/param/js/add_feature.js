jQuery(document).ready(function($) {
	var data = jQuery('select.wd_post_feature').attr('data-value');

	if(data){
		$.each(data.split(","), function(i,e){
    		$('select.wd_post_feature').find("option[value='" + e + "']").prop("selected", true);
		});
	}
});