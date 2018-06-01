jQuery(document).ready(function($) {
	var data = jQuery('select.wd_post_feature_category').attr('data-value');
	if(data){
		$.each(data.split(","), function(i,e){
    		$('select.wd_post_feature_category').find("option[value='" + e + "']").prop("selected", true);
		});
	}
});