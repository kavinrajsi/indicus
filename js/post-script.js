jQuery(document).ready(function($){
    $('input[name="cate-check"]').change(function(){
        var checkedValues = [];
        $('input[name="cate-check"]:checked').each(function(){
            checkedValues.push($(this).attr('for'));
        });
        $('#insp_checked_category').val(checkedValues);
        jQuery('.inspri-loader #rolling').show();
        indicus_load_all_posts(1, checkedValues);
    });
    indicus_load_all_posts(1, '');
    indicus_load_all_gallery(1);
});

function loadmoreposts(lisec){
	var filtercats = jQuery('#insp_checked_category').val();
	var page = jQuery(lisec).attr('p');
    indicus_load_all_posts(page, filtercats);
}
var ajaxurl = myAjax.ajax_url;
function indicus_load_all_posts(page, category){
    jQuery(".inspri-cate-list").fadeIn();
    var data = {
        category: category,
        page: page,
        action: "indicus_pagination_load_posts"
    };
    jQuery.post(ajaxurl, data, function(response) {
        jQuery(".inspri-cate-list").html('').append(response);
        jQuery(".inspri-cate-list").css({'transition':'all 1s ease-out'});
        var noposts = jQuery('div').hasClass('noposts');
        if(noposts) {
            jQuery('.pagination').hide();
        }else {
            jQuery('.pagination').show();
        }
        jQuery('.inspri-loader #rolling').hide();
    });
}

/* gallery - pagination */
function loadmoregallery(lisec){
    var page = jQuery(lisec).attr('p');
    indicus_load_all_gallery(page);
}
function indicus_load_all_gallery(page){
    jQuery(".gallery-inner").fadeIn();
    var data = {
        page: page,
        action: "indicus_pagination_load_galleries"
    };
    jQuery.post(ajaxurl, data, function(response) {
        jQuery(".gallery-inner").html('').append(response);
        jQuery(".gallery-inner").css({'transition':'all 1s ease-out'});
        var noposts = jQuery('div').hasClass('noposts');
        if(noposts) {
            jQuery('.pagination').hide();
        }else {
            jQuery('.pagination').show();
        }
    });
}