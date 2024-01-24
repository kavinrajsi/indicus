jQuery(document).ready(function($){
	$(".header-search .elementor-button").click(function(){
		$("body").addClass("search-open");
	});
	$(".top-se-area .top-se-close, .search-overlay").click(function(){
		$("body").removeClass("search-open");
	});
	// Home slider
	$('#homebannerslider').owlCarousel({
	    loop:true,
	    margin:0,
	    nav:false,
	    items:1,
	    dots:true
	});
	$('.ideas-slide').owlCarousel({
	    loop: true,
	    margin: 20,
	    nav: true,
	    dots: false,
	    navText: [
	        '<svg xmlns="http://www.w3.org/2000/svg" width="23" height="35" viewBox="0 0 23 35" fill="none"><path d="M1.58007 19.8478L18.0261 34.2358C19.9641 35.9338 23.0001 34.5538 23.0001 31.9768V3.20082C23.0006 2.62408 22.8348 2.05943 22.5226 1.57448C22.2105 1.08953 21.7652 0.704836 21.24 0.466468C20.7148 0.228101 20.1321 0.146163 19.5615 0.230469C18.991 0.314774 18.4569 0.561748 18.0231 0.941816L1.58307 15.3298C1.26084 15.6114 1.00258 15.9587 0.825629 16.3483C0.648677 16.7379 0.557129 17.1609 0.557129 17.5888C0.557129 18.0167 0.648677 18.4397 0.825629 18.8293C1.00258 19.219 1.26084 19.5662 1.58307 19.8478H1.58007Z" fill="#A8A8A8"/></svg>',
	        '<svg xmlns="http://www.w3.org/2000/svg" width="23" height="35" viewBox="0 0 23 35" fill="none"><path d="M21.42 19.8478L4.974 34.2358C3.036 35.9338 1.10312e-06 34.5538 1.10312e-06 31.9768V3.20082C-0.000493378 2.62408 0.165264 2.05943 0.477423 1.57448C0.789582 1.08953 1.23491 0.704836 1.76008 0.466468C2.28525 0.228101 2.86799 0.146163 3.43853 0.230469C4.00907 0.314774 4.54321 0.561748 4.977 0.941816L21.417 15.3298C21.7392 15.6114 21.9975 15.9587 22.1744 16.3483C22.3514 16.7379 22.4429 17.1609 22.4429 17.5888C22.4429 18.0167 22.3514 18.4397 22.1744 18.8293C21.9975 19.219 21.7392 19.5662 21.417 19.8478H21.42Z" fill="#A8A8A8"/></svg>'
	    ],
	    responsive:{
	        0:{
	            items:1
	        },
	        600:{
	            items:2
	        },
	        1000:{
	            items:3
	        },
	        1299:{
	            items:3
	        }
	    }
	});
	$('.video-slide').owlCarousel({
	    loop: true,
	    margin: 0,
	    nav: true,
	    items: 1,
	    dots: false,
	    navText: [
	        '<svg xmlns="http://www.w3.org/2000/svg" width="23" height="35" viewBox="0 0 23 35" fill="none"><path d="M1.58007 19.8478L18.0261 34.2358C19.9641 35.9338 23.0001 34.5538 23.0001 31.9768V3.20082C23.0006 2.62408 22.8348 2.05943 22.5226 1.57448C22.2105 1.08953 21.7652 0.704836 21.24 0.466468C20.7148 0.228101 20.1321 0.146163 19.5615 0.230469C18.991 0.314774 18.4569 0.561748 18.0231 0.941816L1.58307 15.3298C1.26084 15.6114 1.00258 15.9587 0.825629 16.3483C0.648677 16.7379 0.557129 17.1609 0.557129 17.5888C0.557129 18.0167 0.648677 18.4397 0.825629 18.8293C1.00258 19.219 1.26084 19.5662 1.58307 19.8478H1.58007Z" fill="#A8A8A8"/></svg>',
	        '<svg xmlns="http://www.w3.org/2000/svg" width="23" height="35" viewBox="0 0 23 35" fill="none"><path d="M21.42 19.8478L4.974 34.2358C3.036 35.9338 1.10312e-06 34.5538 1.10312e-06 31.9768V3.20082C-0.000493378 2.62408 0.165264 2.05943 0.477423 1.57448C0.789582 1.08953 1.23491 0.704836 1.76008 0.466468C2.28525 0.228101 2.86799 0.146163 3.43853 0.230469C4.00907 0.314774 4.54321 0.561748 4.977 0.941816L21.417 15.3298C21.7392 15.6114 21.9975 15.9587 22.1744 16.3483C22.3514 16.7379 22.4429 17.1609 22.4429 17.5888C22.4429 18.0167 22.3514 18.4397 22.1744 18.8293C21.9975 19.219 21.7392 19.5662 21.417 19.8478H21.42Z" fill="#A8A8A8"/></svg>'
	    ],
	});

});

jQuery(document).ready(function ($) {
	 
    $('#search_query').on('input', function () {
        $('#no-result').hide();
        var searchQuery = $(this).val();
        if (searchQuery.length >= 3) {
        	$('#rolling').show();
            $.ajax({
                type: 'POST',
                url: ajax_object.ajax_url,
                data: {
                    'action': 'search_all',
                    'search_query': searchQuery
                },
                success: function (response) {
                    var results = $.parseJSON(response);
                    if(results.colors.total > 0){
                    	$('#colorholder').html(results.colors.html);	
                    	$('#colorblockholder').show();
                    	$('#no-result').hide();
                    }else{
                    	$('#colorholder').html('');	
                    	$('#colorblockholder').hide();
                    }

                    if(results.products.total > 0){
                    	$('#productholder').html(results.products.html);	
                    	$('#productblockholder').show();
                    	$('#no-result').hide();
                    }else{
                    	$('#productholder').html('');	
                    	$('#productblockholder').hide();
                    }

                    if(results.products.total < 1 && results.colors.total < 1){
                    	$('#productblockholder').hide();
                    	$('#colorblockholder').hide();
                    	$('#no-result').show();
                    }

                    $('#rolling').hide();
                },
                error: function (xhr, status, error) {
                    console.error(xhr.responseText);
                    $('#rolling').hide();
                }
            });
        } else {
            $('#productholder').html('');
            $('#colorholder').html('');
            $('#productblockholder').hide();
            $('#colorblockholder').hide();
           

        }
    });
});

jQuery(document).ready(function ($) {
    // Function to close dropdown when clicking outside
    $(document).on("click", function (event) {
        if (!$(event.target).closest('.dropdown').length) {
            // Close dropdown and remove active class
            $(".js-link1").removeClass("drop-active");
            $(".js-dropdown-list").slideUp(200);
            $(".js-link").removeClass("drop-active");
            $(".js-dropdown-list1").slideUp(200);
            $(".js-link2").removeClass("drop-active");
            $(".js-dropdown-list2").slideUp(200);
            $(".js-link3").removeClass("drop-active");
            $(".js-dropdown-list3").slideUp(200);

        }
    });

    // Function to toggle dropdown when link is clicked
    $(".js-link3").click(function (event) {
        event.stopPropagation(); // Prevents the event from propagating to the document click event
        $(this).next(".js-dropdown-list").slideToggle(200);
        $(this).toggleClass("drop-active");
    });
    $(".js-link2").click(function (event) {
        event.stopPropagation(); // Prevents the event from propagating to the document click event
        $(this).next(".js-dropdown-list").slideToggle(200);
        $(this).toggleClass("drop-active");
    });
    $(".js-link1").click(function (event) {
        event.stopPropagation(); // Prevents the event from propagating to the document click event
        $(this).next(".js-dropdown-list").slideToggle(200);
        $(this).toggleClass("drop-active");
    });
      $(".js-link").click(function (event) {
        event.stopPropagation(); // Prevents the event from propagating to the document click event
        $(this).next(".js-dropdown-list1").slideToggle(200);
        $(this).toggleClass("drop-active");
    });

    // Other functions you have in your code...
    $(".filter-cp-click").click(function () {
        $("body").addClass("filter-open");
    });

    $(".mob-bottom-fil-btn>.btn-fill + .btn-fill").click(function () {
        $("body").removeClass("filter-open");
    });
});

jQuery(document).ready(function ($) {
    $('.colorselect').on('change', function () {
        $('.filterouterblc').addClass('loaderactive');
        $('.colorselect').removeClass('active');
        $(this).addClass('active');
        var categoryId = $(this).attr('id').replace('color-', ''); 
        var cat_name = $(this).attr('data-name');

        var tonality = [];
        $('.tonal:checked').each(function () {
            tonality.push($(this).attr('data-id'));
        });
        var temprature = [];
        $('.temp:checked').each(function () {
            temprature.push($(this).attr('data-id'));
        });


        $('.arc-products h3').text(cat_name);      
        $.ajax({
            type: 'POST',
            url: ajax_object.ajax_url,
            data: {
                'action': 'indicus_color_categories_filter',
                'categoryId': categoryId,
                'tonality': tonality,
                'temprature': temprature
            },
            success: function (response) {
                $('.filterouterblc').removeClass('loaderactive');
                $('.filter-result ul').html(response);
                $('html, body').animate({
                   scrollTop: $(".color-filter-result").offset().top - 50
                }, 50);
            },
            error: function (xhr, status, error) {
                $('.filterouterblc').removeClass('loaderactive');
                console.error(xhr.responseText);
            }
        });
    });
});

jQuery(document).ready(function ($) {
    $('.colorpick').on('click', function () {
        $('.filterouterblc').addClass('loaderactive');
        $('.colorpick').removeClass('active');
        $(this).addClass('active');
        var categoryId = $(this).attr('data-id');
        var catname = $(this).attr('data-name');
        $('.filter-category-name').text(catname);
        $.ajax({
            type: 'POST',
            url: ajax_object.ajax_url,
            data: {
                'action': 'indicus_color_filter',
                'categoryId': categoryId
            },
            success: function (response) {

                $("#color-"+categoryId).prop("checked", true);
                $('.afterresult').show();
                $('.defaultblock').hide();
                $('#aftercolorblock').hide();
                $('.color-filter-result').show();
                $('.filter-result ul').html(response);
                $('.filterouterblc').removeClass('loaderactive');
                $('html, body').animate({
                   scrollTop: $(".color-filter-result").offset().top - 50
                }, 50);
            },
            error: function (xhr, status, error) {
                $('.filterouterblc').removeClass('loaderactive');
                $('.color-filter-result').hide();
                console.error(xhr.responseText);
            }
        });
    });
    $("#explore-color-btn").click(function(){
        $('html, body').animate({
            scrollTop: $("#main-color-category").offset().top - 70
        }, 1000);
    });
});

jQuery(document).ready(function ($) {
    $('.clear-product-filter').on('click', function(){
        location.reload();
    });
});





