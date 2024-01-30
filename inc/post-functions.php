<?php
/* post - pagination */
function indicus_pagination_load_posts() {
	
    if(isset($_POST['page'])){

        $page = sanitize_text_field($_POST['page']);
        $cur_page = $page;
        $page -= 1;
        $per_page = 6; //set the per page limit
        $previous_btn = true;
        $next_btn = true;
        $first_btn = true;
        $last_btn = true;
        $start = $page * $per_page;

        if($_POST['category']){
        	$category_id = array();
        	foreach ($_POST['category'] as $category) {
        		$category_data = get_category_by_slug($category);
        		$category_id[] = $category_data->term_id;
        	}

        	$all_blog_posts = new WP_Query(
	            array(
	                'post_type'         => 'post',
	                'post_status'       => 'publish',
	                'posts_per_page'    => $per_page,
	                'offset'            => $start,
	                'cat'               => $category_id,
			        'orderby'           => 'post_date',
			        'order'             => 'DESC',
	            )
	        );

	        $count = new WP_Query(
	            array(
	                'post_type'         => 'post',
	                'post_status' 		=> 'publish',
	                'posts_per_page'    => -1,
	                'cat'               => $category_id,
	            )
	        );

    	} else {
    		$all_blog_posts = new WP_Query(
	            array(
	                'post_type'         => 'post',
	                'post_status'       => 'publish',
	                'posts_per_page'    => $per_page,
	                'offset'            => $start,
				    'orderby'           => 'post_date',
				    'order'             => 'DESC',
	            )
	        );
	        $count = new WP_Query(
	            array(
	                'post_type'         => 'post',
	                'post_status' 		=> 'publish',
	                'posts_per_page'    => -1,
	            )
	        );
    	}
   $category = get_the_category();
        $count = $count->post_count; ?>
        <div class="incat-ul"><?php
        if ( $all_blog_posts->have_posts() ) {
			while ( $all_blog_posts->have_posts() ) {
		 		$all_blog_posts->the_post(); 
				$category = get_the_category(); ?>
					<div class="incat-li">
						<a href="<?php the_permalink();?>">
							<?php if (has_post_thumbnail()) { ?>
							<div class="insp-blog-img">
								<img src="<?php the_post_thumbnail_url();?>" alt="" class="img-fluid w-100">
							</div>
							<?php } ?>
							<div class="insp-blog-content">
								<h4><?php echo get_the_title(); ?></h4>
								<p><?php echo wp_trim_words( get_the_content(), 30, '...' ); ?></p>
								<div class="insp-pcomment">

									<?php
                        // List all category names associated with the post
                        foreach ($category as $cat) { if ($cat->name === 'ALL') { } else{   echo '<span>' . $cat->name . '</span>'; } }
                        ?>

									
									<span><?php echo get_the_date( 'd.m.Y' ); ?></span>
								</div>
							</div>
						</a>
					</div><?php
		 	}
		 } else { ?>
		 	<div class="noposts">Sorry No posts found. Please try again with some other category.</div><?php
		 } ?>
		 </div> <?php

        // This is where the magic happens
        $no_of_paginations = ceil($count / $per_page);
        if ($cur_page >= 7) {
            $start_loop = $cur_page - 3;
            if ($no_of_paginations > $cur_page + 3)
                $end_loop = $cur_page + 3;
            else if ($cur_page <= $no_of_paginations && $cur_page > $no_of_paginations - 6) {
                $start_loop = $no_of_paginations - 6;
                $end_loop = $no_of_paginations;
            } else {
                $end_loop = $no_of_paginations;
            }
        } else {
            $start_loop = 1;
            if ($no_of_paginations > 7)
                $end_loop = 7;
            else
                $end_loop = $no_of_paginations;
        } ?>
        <div class='pagination'>
            <ul><?php
	         	if ($previous_btn && $cur_page > 1) {
	            	$pre = $cur_page - 1; ?>
	             	<li p='<?php echo $pre; ?>' class='active' onclick="loadmoreposts(this);"><svg width="11" height="18" viewBox="0 0 11 18" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M1.07054 9.54294L9.43004 17.5079C9.56952 17.6409 9.75484 17.7151 9.94754 17.7151C10.1402 17.7151 10.3256 17.6409 10.465 17.5079L10.474 17.4989C10.5419 17.4345 10.5959 17.3569 10.6328 17.2709C10.6698 17.1849 10.6888 17.0923 10.6888 16.9987C10.6888 16.9051 10.6698 16.8125 10.6328 16.7265C10.5959 16.6405 10.5419 16.5629 10.474 16.4984L2.60204 8.99844L10.474 1.50144C10.5419 1.43698 10.5959 1.35939 10.6328 1.27339C10.6698 1.18739 10.6888 1.09478 10.6888 1.00119C10.6888 0.907604 10.6698 0.814993 10.6328 0.728993C10.5959 0.642993 10.5419 0.565404 10.474 0.500944L10.465 0.491943C10.3256 0.358976 10.1402 0.284799 9.94754 0.284799C9.75484 0.284799 9.56952 0.358976 9.43004 0.491943L1.07054 8.45694C0.997023 8.52699 0.938494 8.61124 0.898503 8.70457C0.858512 8.79791 0.837891 8.8984 0.837891 8.99994C0.837891 9.10149 0.858512 9.20198 0.898503 9.29531C0.938494 9.38865 0.997023 9.4729 1.07054 9.54294Z" fill="#474747"/>
</svg></li><?php
	         	} else if ($previous_btn) { ?>
	             	<li class='inactive'><svg width="11" height="18" viewBox="0 0 11 18" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M1.07054 9.54294L9.43004 17.5079C9.56952 17.6409 9.75484 17.7151 9.94754 17.7151C10.1402 17.7151 10.3256 17.6409 10.465 17.5079L10.474 17.4989C10.5419 17.4345 10.5959 17.3569 10.6328 17.2709C10.6698 17.1849 10.6888 17.0923 10.6888 16.9987C10.6888 16.9051 10.6698 16.8125 10.6328 16.7265C10.5959 16.6405 10.5419 16.5629 10.474 16.4984L2.60204 8.99844L10.474 1.50144C10.5419 1.43698 10.5959 1.35939 10.6328 1.27339C10.6698 1.18739 10.6888 1.09478 10.6888 1.00119C10.6888 0.907604 10.6698 0.814993 10.6328 0.728993C10.5959 0.642993 10.5419 0.565404 10.474 0.500944L10.465 0.491943C10.3256 0.358976 10.1402 0.284799 9.94754 0.284799C9.75484 0.284799 9.56952 0.358976 9.43004 0.491943L1.07054 8.45694C0.997023 8.52699 0.938494 8.61124 0.898503 8.70457C0.858512 8.79791 0.837891 8.8984 0.837891 8.99994C0.837891 9.10149 0.858512 9.20198 0.898503 9.29531C0.938494 9.38865 0.997023 9.4729 1.07054 9.54294Z" fill="#474747"/>
</svg></li><?php
	      		}

	         	for ($i = $start_loop; $i <= $end_loop; $i++) {
	             	if ($cur_page == $i){ ?>
	                 	<li p='<?php echo $i; ?>' class = 'selected' ><?php echo $i; ?></li><?php
	          		} else { ?>
	                 	<li p='<?php echo $i; ?>' class='active' onclick="loadmoreposts(this);"><?php echo $i; ?></li><?php
	             	}
	         	}

	         	if ($next_btn && $cur_page < $no_of_paginations) {
	             	$nex = $cur_page + 1; ?>
	             	<li p='<?php echo $nex; ?>' class='active' onclick="loadmoreposts(this);"><svg width="11" height="18" viewBox="0 0 11 18" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M9.92946 9.54294L1.56996 17.5079C1.43048 17.6409 1.24516 17.7151 1.05246 17.7151C0.859753 17.7151 0.674442 17.6409 0.53496 17.5079L0.525959 17.4989C0.458106 17.4345 0.404077 17.3569 0.367156 17.2709C0.330235 17.1849 0.311196 17.0923 0.311196 16.9987C0.311196 16.9051 0.330235 16.8125 0.367156 16.7265C0.404077 16.6405 0.458106 16.5629 0.525959 16.4984L8.39796 8.99844L0.525959 1.50144C0.458106 1.43698 0.404077 1.35939 0.367156 1.27339C0.330235 1.1874 0.311196 1.09478 0.311196 1.00119C0.311196 0.907604 0.330235 0.814993 0.367156 0.728992C0.404077 0.642994 0.458106 0.565403 0.525959 0.500944L0.53496 0.491943C0.674442 0.358976 0.859753 0.2848 1.05246 0.2848C1.24516 0.2848 1.43048 0.358976 1.56996 0.491943L9.92946 8.45694C10.003 8.52699 10.0615 8.61124 10.1015 8.70457C10.1415 8.79791 10.1621 8.8984 10.1621 8.99994C10.1621 9.10149 10.1415 9.20198 10.1015 9.29531C10.0615 9.38865 10.003 9.4729 9.92946 9.54294Z" fill="#474747"/>
						</svg>
					</li><?php
	      		} else if ($next_btn) { ?>
	            	<li class='inactive'><svg width="11" height="18" viewBox="0 0 11 18" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M9.92946 9.54294L1.56996 17.5079C1.43048 17.6409 1.24516 17.7151 1.05246 17.7151C0.859753 17.7151 0.674442 17.6409 0.53496 17.5079L0.525959 17.4989C0.458106 17.4345 0.404077 17.3569 0.367156 17.2709C0.330235 17.1849 0.311196 17.0923 0.311196 16.9987C0.311196 16.9051 0.330235 16.8125 0.367156 16.7265C0.404077 16.6405 0.458106 16.5629 0.525959 16.4984L8.39796 8.99844L0.525959 1.50144C0.458106 1.43698 0.404077 1.35939 0.367156 1.27339C0.330235 1.1874 0.311196 1.09478 0.311196 1.00119C0.311196 0.907604 0.330235 0.814993 0.367156 0.728992C0.404077 0.642994 0.458106 0.565403 0.525959 0.500944L0.53496 0.491943C0.674442 0.358976 0.859753 0.2848 1.05246 0.2848C1.24516 0.2848 1.43048 0.358976 1.56996 0.491943L9.92946 8.45694C10.003 8.52699 10.0615 8.61124 10.1015 8.70457C10.1415 8.79791 10.1621 8.8984 10.1621 8.99994C10.1621 9.10149 10.1415 9.20198 10.1015 9.29531C10.0615 9.38865 10.003 9.4729 9.92946 9.54294Z" fill="#474747"/>
						</svg>
					</li><?php 
	      		} ?>
            </ul>
        </div><?php
    }
    exit();
}
add_action( 'wp_ajax_indicus_pagination_load_posts', 'indicus_pagination_load_posts' );
add_action( 'wp_ajax_nopriv_indicus_pagination_load_posts', 'indicus_pagination_load_posts' ); 

/* gallery - pagination */
function indicus_pagination_load_galleries(){
	if(isset($_POST['page'])){

        $page = sanitize_text_field($_POST['page']);
        $cur_page = $page;
        $page -= 1;
        $per_page = 8; //set the per page limit
        $previous_btn = true;
        $next_btn = true;
        $first_btn = true;
        $last_btn = true;
        $start = $page * $per_page;

        $all_blog_posts = new WP_Query(
            array(
                'post_type'         => 'gallery',
                'post_status'       => 'publish',
                'posts_per_page'    => $per_page,
                'offset'            => $start,
		        'orderby'           => 'post_date',
		        'order'             => 'DESC',
            )
	    );
	    $count = new WP_Query(
            array(
                'post_type'         => 'gallery',
                'post_status' 		=> 'publish',
                'posts_per_page'    => -1,
            )
        );
		$count = $count->post_count; ?>
        <ul class="gallery-ilist"><?php
        if ( $all_blog_posts->have_posts() ) {
			while ( $all_blog_posts->have_posts() ) {
		 		$all_blog_posts->the_post();
		 		if(has_post_thumbnail()) : 
		 			$preview_img = get_field('preview_image'); 
		 			if(!$preview_img){
		 				$preview_img = get_the_post_thumbnail_url(); 
		 			} ?>
					<li>
	    				<a href="<?php echo $preview_img; ?>" data-fancybox="images">
	    		      		<img src="<?php the_post_thumbnail_url();?>" alt="" class="img-fluid w-100">
	    		    	</a>
	    			</li><?php
	    		endif;
		 	}
		 } else { ?>
		 	<div class="noposts">No gallery found.</div><?php
		 } ?>
		 </ul> <?php

        // This is where the magic happens
        $no_of_paginations = ceil($count / $per_page);
        if ($cur_page >= 7) {
            $start_loop = $cur_page - 3;
            if ($no_of_paginations > $cur_page + 3)
                $end_loop = $cur_page + 3;
            else if ($cur_page <= $no_of_paginations && $cur_page > $no_of_paginations - 6) {
                $start_loop = $no_of_paginations - 6;
                $end_loop = $no_of_paginations;
            } else {
                $end_loop = $no_of_paginations;
            }
        } else {
            $start_loop = 1;
            if ($no_of_paginations > 7)
                $end_loop = 7;
            else
                $end_loop = $no_of_paginations;
        } ?>
        <div class='pagination'>
            <ul><?php
	         	if ($previous_btn && $cur_page > 1) {
	            	$pre = $cur_page - 1; ?>
	             	<li p='<?php echo $pre; ?>' class='active' onclick="loadmoregallery(this);">
	             		<svg width="11" height="18" viewBox="0 0 11 18" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M1.07054 9.54294L9.43004 17.5079C9.56952 17.6409 9.75484 17.7151 9.94754 17.7151C10.1402 17.7151 10.3256 17.6409 10.465 17.5079L10.474 17.4989C10.5419 17.4345 10.5959 17.3569 10.6328 17.2709C10.6698 17.1849 10.6888 17.0923 10.6888 16.9987C10.6888 16.9051 10.6698 16.8125 10.6328 16.7265C10.5959 16.6405 10.5419 16.5629 10.474 16.4984L2.60204 8.99844L10.474 1.50144C10.5419 1.43698 10.5959 1.35939 10.6328 1.27339C10.6698 1.18739 10.6888 1.09478 10.6888 1.00119C10.6888 0.907604 10.6698 0.814993 10.6328 0.728993C10.5959 0.642993 10.5419 0.565404 10.474 0.500944L10.465 0.491943C10.3256 0.358976 10.1402 0.284799 9.94754 0.284799C9.75484 0.284799 9.56952 0.358976 9.43004 0.491943L1.07054 8.45694C0.997023 8.52699 0.938494 8.61124 0.898503 8.70457C0.858512 8.79791 0.837891 8.8984 0.837891 8.99994C0.837891 9.10149 0.858512 9.20198 0.898503 9.29531C0.938494 9.38865 0.997023 9.4729 1.07054 9.54294Z" fill="#474747"/>
						</svg>
					</li><?php
			    } else if ($previous_btn) { ?>
		            <li class='inactive'>
		            	<svg width="11" height="18" viewBox="0 0 11 18" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M1.07054 9.54294L9.43004 17.5079C9.56952 17.6409 9.75484 17.7151 9.94754 17.7151C10.1402 17.7151 10.3256 17.6409 10.465 17.5079L10.474 17.4989C10.5419 17.4345 10.5959 17.3569 10.6328 17.2709C10.6698 17.1849 10.6888 17.0923 10.6888 16.9987C10.6888 16.9051 10.6698 16.8125 10.6328 16.7265C10.5959 16.6405 10.5419 16.5629 10.474 16.4984L2.60204 8.99844L10.474 1.50144C10.5419 1.43698 10.5959 1.35939 10.6328 1.27339C10.6698 1.18739 10.6888 1.09478 10.6888 1.00119C10.6888 0.907604 10.6698 0.814993 10.6328 0.728993C10.5959 0.642993 10.5419 0.565404 10.474 0.500944L10.465 0.491943C10.3256 0.358976 10.1402 0.284799 9.94754 0.284799C9.75484 0.284799 9.56952 0.358976 9.43004 0.491943L1.07054 8.45694C0.997023 8.52699 0.938494 8.61124 0.898503 8.70457C0.858512 8.79791 0.837891 8.8984 0.837891 8.99994C0.837891 9.10149 0.858512 9.20198 0.898503 9.29531C0.938494 9.38865 0.997023 9.4729 1.07054 9.54294Z" fill="#474747"/>
						</svg>
					</li><?php
	      		}

	         	for ($i = $start_loop; $i <= $end_loop; $i++) {
	             	if ($cur_page == $i){ ?>
	                 	<li p='<?php echo $i; ?>' class = 'selected' ><?php echo $i; ?></li><?php
	          		} else { ?>
	                 	<li p='<?php echo $i; ?>' class='active' onclick="loadmoregallery(this);"><?php echo $i; ?></li><?php
	             	}
	         	}

	         	if ($next_btn && $cur_page < $no_of_paginations) {
	             	$nex = $cur_page + 1; ?>
	             	<li p='<?php echo $nex; ?>' class='active' onclick="loadmoregallery(this);">
	             		<svg width="11" height="18" viewBox="0 0 11 18" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M9.92946 9.54294L1.56996 17.5079C1.43048 17.6409 1.24516 17.7151 1.05246 17.7151C0.859753 17.7151 0.674442 17.6409 0.53496 17.5079L0.525959 17.4989C0.458106 17.4345 0.404077 17.3569 0.367156 17.2709C0.330235 17.1849 0.311196 17.0923 0.311196 16.9987C0.311196 16.9051 0.330235 16.8125 0.367156 16.7265C0.404077 16.6405 0.458106 16.5629 0.525959 16.4984L8.39796 8.99844L0.525959 1.50144C0.458106 1.43698 0.404077 1.35939 0.367156 1.27339C0.330235 1.1874 0.311196 1.09478 0.311196 1.00119C0.311196 0.907604 0.330235 0.814993 0.367156 0.728992C0.404077 0.642994 0.458106 0.565403 0.525959 0.500944L0.53496 0.491943C0.674442 0.358976 0.859753 0.2848 1.05246 0.2848C1.24516 0.2848 1.43048 0.358976 1.56996 0.491943L9.92946 8.45694C10.003 8.52699 10.0615 8.61124 10.1015 8.70457C10.1415 8.79791 10.1621 8.8984 10.1621 8.99994C10.1621 9.10149 10.1415 9.20198 10.1015 9.29531C10.0615 9.38865 10.003 9.4729 9.92946 9.54294Z" fill="#474747"/>
							</svg>
						</li><?php
	      		} 	else if ($next_btn) { ?>
	            	<li class='inactive'>
	            		<svg width="11" height="18" viewBox="0 0 11 18" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M9.92946 9.54294L1.56996 17.5079C1.43048 17.6409 1.24516 17.7151 1.05246 17.7151C0.859753 17.7151 0.674442 17.6409 0.53496 17.5079L0.525959 17.4989C0.458106 17.4345 0.404077 17.3569 0.367156 17.2709C0.330235 17.1849 0.311196 17.0923 0.311196 16.9987C0.311196 16.9051 0.330235 16.8125 0.367156 16.7265C0.404077 16.6405 0.458106 16.5629 0.525959 16.4984L8.39796 8.99844L0.525959 1.50144C0.458106 1.43698 0.404077 1.35939 0.367156 1.27339C0.330235 1.1874 0.311196 1.09478 0.311196 1.00119C0.311196 0.907604 0.330235 0.814993 0.367156 0.728992C0.404077 0.642994 0.458106 0.565403 0.525959 0.500944L0.53496 0.491943C0.674442 0.358976 0.859753 0.2848 1.05246 0.2848C1.24516 0.2848 1.43048 0.358976 1.56996 0.491943L9.92946 8.45694C10.003 8.52699 10.0615 8.61124 10.1015 8.70457C10.1415 8.79791 10.1621 8.8984 10.1621 8.99994C10.1621 9.10149 10.1415 9.20198 10.1015 9.29531C10.0615 9.38865 10.003 9.4729 9.92946 9.54294Z" fill="#474747"/>
						</svg>
					</li><?php 
	      		} ?>
            </ul>
        </div><?php
    }
    exit();
}
add_action( 'wp_ajax_indicus_pagination_load_galleries', 'indicus_pagination_load_galleries' );
add_action( 'wp_ajax_nopriv_indicus_pagination_load_galleries', 'indicus_pagination_load_galleries' ); 

/* appointment form */

add_shortcode('appointment-form', 'appointment_form');
function appointment_form()
{
	ob_start(); ?>
	<form class="top_panting_form" action="https://crm.zoho.in/crm/WebToLeadForm" id="Desktopform" name="WebToLeads250849000001842085" method="POST" class="p-4" autocomplete="off">
		<input type="text" class="d-none" name="xnQsjsdp" value="db887390625950606c3528f7d8a1164e190fd3c45d4366921efb4f0891976ab1">
		<input type="hidden" name="zc_gad" id="zc_gad" value="">
		<input type="text" class="d-none" name="xmIwtLD" value="f3a51ccc724bbca98e66acb5675625149ff317281445c04da2539ca1903b89b0">
		<input type="text" class="d-none" name="actionType" value="TGVhZHM=">
		<input type="text" class="d-none" name="returnURL" value="https://indicus.in/Colourcraft/">
		<div class="d-none">
			<select name="Lead Source">
				<option value="Colourcraft Landing Page" selected="">Colourcraft Landing Page</option>
			</select>
			<select class="zcwf_col_fld_slt" id="LEADCF15" name="LEADCF15">
				<option value="INDICUS" selected="">INDICUS</option>
			</select>
			<input type="text" id="firstName" name="firstName" class="form-control" placeholder="First Name">
		</div>
		<div class="appoointment-heading">
			<h4>BOOK A FREE VISIT & GET CONNECTED!</h4>
		</div>

		<div class="inputfields">
			<input type="text" id="name" name="Last Name" class="form-control" placeholder="Your name">
		</div>
		<div class="inputfields">
			<input type="number" id="mobile" name="Mobile" class="form-control" placeholder="Mobile number">
		</div>
<!--       <div class="inputfields">
			<input type="email" id="email" name="Email" class="form-control" placeholder="Email Address">
			<div class="text-start invalid-feedback">
				Please enter your email address.
			</div>
		</div>-->
		<div class="inputfields pincode">
			<input type="number" id="pinCode" name="Zip Code" class="form-control" placeholder="Pincode">
		</div>
		<p class="text-start notices">By proceeding, you are authorizing Indicus and its contractors to get in touch with you through calls, messages, or e-mail.</p>
		<span id="formResponse"></span>
		<div class="d-grid submitBtn">
			<button id="submitBtn" class="btn btn-primary" type="submit">BOOK YOUR APPOINTMENT</button>
		</div>
	</form>
	<style>
		.d-none{
			display: none;
		}
		.top_panting_form{
			background: #fff;
			padding:  48px 32px;
			border-radius: 30px;
			/*border-left: 10px solid #EEE9E9;
			border-top: 5px solid #EEE9E9;*/
			max-width: 400px;
			margin-left: auto;
			box-shadow: 4.46px 8.919px 44.597px 0px rgba(0, 0, 0, 0.25);
		}
		.top_panting_form input{
			width: 100%;
			padding: 8px 0px;
			border: none;
			border-bottom: 1px solid #747474;
			color: #747474;
			font-family: 'FONTSPRING DEMO - Cera Pro';
			font-size: 18px;
			font-style: normal;
			font-weight: 400;
			line-height: 25px; /* 144.444% */
			outline: none;
		}
		.top_panting_form input::-webkit-outer-spin-button,
		.top_panting_form input::-webkit-inner-spin-button{
			-webkit-appearance: none;
  			margin: 0;
		}
		.top_panting_form input.is-invalid{
			border-color: #ED4337;
			padding-right: 30px !important;
		}
		.top_panting_form .inputfields {
			margin-bottom: 24px;
			position: relative;
		}
		.top_panting_form .inputfields.pincode{
			margin-bottom: 0px;
		}
		 .top_panting_form p {
			color: #747474;
			font-family: 'Cera Pro';
			font-size: 10px;
			font-style: normal;
			font-weight: 400;
			line-height: 12px; /* 120% */
			margin-top: 18px;
		}
		.top_panting_form .invalid-feedback{
			font-size: 14px;
			line-height: 20px;
			color: #ED4337;	
			font-family: 'CeraPro-Regular' !important;
			text-align: right;
			position: absolute;
			bottom: -22px;
			right: 0;
		}
		.top_panting_form .invalid-feedback:after {
			content: '';
			position: absolute;
			right: 0;
			top: -35px;
			background-repeat: no-repeat;
			background-size: contain;
			width: 24px;
			height: 24px;
		}
		.top_panting_form .submitBtn {
			display: flex;
			justify-content: end;
		}
		.top_panting_form .submitBtn .btn {
			display: flex;
			padding: 16px 32px;
			box-shadow: none;
			border: none;
			justify-content: center;
			align-items: center;
			gap: 10px;
			border-radius: 134.212px;
			background: #333;
			color: #FFF;
			font-family: 'CeraPro-Regular' !important;
			font-size: 16px;
			font-style: normal;
			font-weight: 700;
			line-height: normal;
			transition: all ease-in-out 0.3s;
			cursor: pointer;
		}
		.top_panting_form .submitBtn .btn:hover,
		.top_panting_form .submitBtn .btn:focus{
			background-color: #8160EC;
		}
		.top_panting_form .notices{
			margin-bottom: 24px;
		}
		.appoointment-heading h4{
				margin-bottom: 24px;
			}
		@media screen and (min-width: 768px) and (max-width: 1024px){
			.top_panting_form .invalid-feedback{
				font-size: 10px;
			}
		}
		@media screen and (max-width: 767px) {
			.top_panting_form input{
				font-size: 16px;
				line-height: 23px;
			}
			.appoointment-heading h4{
				font-weight: 700;
			}
			.top_panting_form{
				min-width: 100%;
			}
		}
	</style>
	<script>
		$(function () {

		    $('form[name="WebToLeads250849000001842085"]').attr('method', 'POST');

		    // To get the complete URL with parameters
		    var url = new URL(document.location);

		    // To check for parameters in the URL
		    var params = url.searchParams;

		    // if ($(window).width() <= 768) {
		    //     var element = $('#callBackForm').detach();
		    //     $('#mobileCallBackForm').append(element);
		    // }

		    $('#name').on('keyup', function () {
		        if ($(this).val() !== "") {
		            $('#submitBtn').prop('disabled', false);
		        } else {
		            $('#submitBtn').prop('disabled', true);
		        }
		    });
		    
		     $('#name1').on('keyup', function () {
		        if ($(this).val() !== "") {
		            $('#submitBtn1').prop('disabled', false);
		        } else {
		            $('#submitBtn1').prop('disabled', true);
		        }
		    });
		    
		    $('#mobile1').on('keyup', function () {
		        if ($(this).val() !== "") {
		            $('#submitBtn2').prop('disabled', false);
		        } else {
		            $('#submitBtn2').prop('disabled', true);
		        }
		    });


		    $("#Desktopform").submit(function (e) {
		        e.preventDefault();
		        
		        $(this).find('#formResponse').text('');
		        
		         var form1 = $(this);
		         var form_id = form1.attr('id');

		         var name = $(this).find('#name').val();
		         var mobile = $(this).find('#mobile').val();
		         var pinCode = $(this).find('#pinCode').val();

		        if(name == '') {
		         	$(this).find('#name').addClass("is-invalid").removeClass("is-valid");
	                $(this).find('#name + div').remove();
	                $(this).find('#name').after('<div class="text-start invalid-feedback">\Please enter your name\</div>');
	                return false;
	            } else if (name.length < 3) {
	            	$(this).find('#name').addClass("is-invalid").removeClass("is-valid");
	                $(this).find('#name + div').remove();
	                $(this).find('#name').after('<div class="text-start invalid-feedback">\Please enter a valid name\</div>');
	                return false;
	            } else {
					$(this).find('#name').addClass("is-valid").removeClass("is-invalid");
		            $(this).find('#name + div').remove();
	            }

	            if(mobile == '') {
		         	$(this).find('#mobile').addClass("is-invalid").removeClass("is-valid");
	                $(this).find('#mobile + div').remove();
	                $(this).find('#mobile').after('<div class="text-start invalid-feedback">\Please enter your mobile no.\</div>');
	                return false;
	            } else if (mobile.length < 3) {
	            	$(this).find('#mobile').addClass("is-invalid").removeClass("is-valid");
	                $(this).find('#mobile + div').remove();
	                $(this).find('#mobile').after('<div class="text-start invalid-feedback">\Please enter a valid mobile no.\</div>');
	                return false;
	            } else {
					$(this).find('#mobile').addClass("is-valid").removeClass("is-invalid");
		            $(this).find('#mobile + div').remove();
	            }
			    
			    if(pinCode == '') {
		         	$(this).find('#pinCode').addClass("is-invalid").removeClass("is-valid");
	                $(this).find('#pinCode + div').remove();
	                $(this).find('#pinCode').after('<div class="text-start invalid-feedback">\Please enter your pincode\</div>');
	                return false;
	            } else if (pinCode.length < 3) {
	            	$(this).find('#pinCode').addClass("is-invalid").removeClass("is-valid");
	                $(this).find('#pinCode + div').remove();
	                $(this).find('#pinCode').after('<div class="text-start invalid-feedback">\Please enter a valid pincode\</div>');
	                return false;
	            } else {
					$(this).find('#pinCode').addClass("is-valid").removeClass("is-invalid");
		            $(this).find('#pinCode + div').remove();
	            }
 

		        $(this).find('button').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Submitting...');
		        var form = $(this);
		        var formUrl = form.attr('action');
		        var formMethod = form.attr('method');
		        var formData = form.serialize();

				//if($('#firstName').val() === "" || $('#firstName').val() === NULL){
					$.ajax({
						type: formMethod,
						url: formUrl,
						data: formData,
						statusCode: {
							200: function (response) {
								form.find('button').html('SUBMIT');
								form.find('#formResponse').append('<p class="text-success text-center mt-2 mb-0">Request submitted successfully.</p>');
								form.trigger("reset").removeClass('was-validated');
								$('#name').removeClass("is-valid");
								$('#mobile').removeClass("is-valid");
								$('#pinCode').removeClass("is-valid");
								$('form').find('button[type=submit]').prop('disabled', true);
								setTimeout(function () {
									form.find('#formResponse').text('');
								}, 5000);
							}
						}
					});
				//}
		    });

		});
	</script><?php
	$content = ob_get_clean();
	return $content;
}


/* callback form - requirement quotation */

add_shortcode('quotation-form', 'requirement_quotation_form');
function requirement_quotation_form()
{
	ob_start(); ?>
	<div class="elementor-widget-container">
		<div id="crmWebToEntityForm" class="zcwf_lblLeft crmWebToEntityForm" style="color: #2a2a2a;">
			<form name="WebToLeads250849000000947058" class="calculatoreform" onsubmit="javascript:document.charset=&quot;UTF-8&quot;; return checkMandatory250849000000947058()" accept-charset="UTF-8" action="https://crm.zoho.in/crm/WebToLeadForm" method="POST">
				<input type="hidden" name="xnQsjsdp" value="db887390625950606c3528f7d8a1164e190fd3c45d4366921efb4f0891976ab1">
				<input type="hidden" name="zc_gad" id="zc_gad" value="">
				<input type="hidden" name="xmIwtLD" value="f3a51ccc724bbca98e66acb567562514f0c2b70292a34b6bc86ced74ebf842d1">
				<input type="hidden" name="actionType" value="TGVhZHM=">
				<input type="hidden" name="returnURL" value="https://indicus.in/thank-you/">
				<input type="hidden" name="Lead Source" value="Indicus Website">
				<input type="hidden" name="LEADCF15" value="INDICUS">
				<style>
					html,
					body {
						margin: 0px;
					}

					#crmWebToEntityForm.zcwf_lblLeft {
						width: 100%;
						box-sizing: border-box;
					}

					#crmWebToEntityForm.zcwf_lblLeft * {
						box-sizing: border-box;
					}

					#crmWebToEntityForm {
						text-align: left;
					}

					#crmWebToEntityForm * {
						direction: ltr;
					}

					.zcwf_lblLeft .zcwf_title {
						word-wrap: break-word;
						padding: 0px 30px 10px;
						font-weight: bold;
					}

					.zcwf_lblLeft .zcwf_col_fld input[type=text],
					.zcwf_lblLeft .zcwf_col_fld textarea {
						width: 100%;
						border: 1px solid #ccc !important;
						background-color: transparent;
						resize: vertical;
						border-radius: 12px;
						float: left;
						padding: 10px 15px;
						margin-bottom: 0px;
					}

					.zcwf_lblLeft .zcwf_col_lab {
						width: 100%;
						word-break: break-word;
						padding: 0px 30px 0px 0px;
						margin-right: 10px;
						margin-top: 5px;
						float: left;
						min-height: 1px;
					}

					.zcwf_lblLeft .zcwf_col_fld {
						float: left;
						width: 100%;
						/* padding: 0px 0px 40px 0px; */
						position: relative;
						/* margin-top: 5px; */
					}
					

					.zcwf_lblLeft .zcwf_privacy {
						padding: 6px;
					}

					.zcwf_lblLeft .wfrm_fld_dpNn {
						display: none;
					}

					.dIB {
						display: inline-block;
					}

					.zcwf_lblLeft .zcwf_col_fld_slt {
						width: 60%;
						border: 1px solid #ccc;
						background: #fff;
						border-radius: 4px;
						font-size: 12px;
						float: left;
						resize: vertical;
					}

					/* .zcwf_lblLeft .zcwf_row:after,
					.zcwf_lblLeft .zcwf_col_fld:after {
						content: '';
						display: table;
						clear: both;
					} */
					.calculatoreform .pantingBottomForm  .zcwf_col_help.invalid-feedback {
						font-size: 14px;
						line-height: 20px;
						color: #ED4337;
						font-family: 'CeraPro-Regular' !important;
						position: absolute;
						bottom: -22px;
						right: 0;
					}
					.calculatoreform .pantingBottomForm  .zcwf_col_help.invalid-feedback::after {
						content: '';
						position: absolute;
						right: 0;
						top: -35px;
						background-repeat: no-repeat;
						background-size: contain;
						width: 24px;
						height: 24px;
					}
					/* .zcwf_lblLeft .zcwf_col_help {
						float: left;
						margin-left: 7px;
						font-size: 12px;
						max-width: 35%;
						word-break: break-word;
					} */

					.zcwf_lblLeft .zcwf_help_icon {
						cursor: pointer;
						width: 16px;
						height: 16px;
						display: inline-block;
						background: #fff;
						border: 1px solid #ccc;
						color: #ccc;
						text-align: center;
						font-size: 11px;
						line-height: 16px;
						font-weight: bold;
						border-radius: 50%;
					}

					.zcwf_lblLeft .zcwf_row {
						margin: 0px 0px 0px 0px;
					}

					.zcwf_lblLeft .formsubmit {
						cursor: pointer;
						color: #333;
						font-size: 12px;
					}

					.zcwf_lblLeft .zcwf_privacy_txt {
						color: rgb(0, 0, 0);
						font-size: 12px;
						font-family: Arial;
						display: inline-block;
						vertical-align: top;
						color: #333;
						padding-top: 2px;
						margin-left: 6px;
					}

					.zcwf_lblLeft .zcwf_button {
						display: flex;
						padding: 16px 32px;
						justify-content: center;
						align-items: center;
						gap: 10px;
						border-radius: 134.212px;
						background: #7031BB;
						color: #FFF;
						font-size: 16px;
						font-style: normal;
						font-weight: 700;
						line-height: normal;
						box-shadow: none;
						border: none;
						outline: none;
						text-transform: uppercase;
						font-family: 'CeraPro-Regular' !important;
						cursor: pointer;
						transition: all ease-in-out 0.3s;
						margin-top: 32px;
						margin-left: auto;

					}
					.zcwf_lblLeft .zcwf_button:hover,
					.zcwf_lblLeft .zcwf_button:focus{
						background-color: #8160EC;
					}
					.zcwf_lblLeft .zcwf_tooltip_over {
						position: relative;
					}

					.zcwf_lblLeft .zcwf_tooltip_ctn {
						position: absolute;
						background: #dedede;
						padding: 3px 6px;
						top: 3px;
						border-radius: 4px;
						word-break: break-all;
						min-width: 50px;
						max-width: 150px;
						color: #333;
					}

					.zcwf_lblLeft .zcwf_ckbox {
						float: left;
					}

					.zcwf_lblLeft .zcwf_file {
						width: 55%;
						box-sizing: border-box;
						float: left;
					}

					.clearB:after {
						content: '';
						display: block;
						clear: both;
					}

					#formsubmit {
						/* margin-top: -90px; */
						border-color: transparent;
					}
					.calculatoreform {
						padding: 40px 16px;
						border-radius: 25px;
						border: 1px solid #333;
					}
					.calculatoreform .pantingBottomForm .inputfeild{
						display: flex;
						flex-direction: column;
						gap: 16px;
						width: 100%;
						position: relative;
					}
					.calculatoreform .pantingBottomForm .inputfeild .heading h5 {
						margin-bottom: 32px;
						color: #333;
						text-align: center;
						text-transform: uppercase;
					}
					.pantingBottomForm.zcwf_row input[type=text] {
						/* width: 100%; */
						border-top: none !important;
						border-left: none !important;
						border-right: none !important;
						border-bottom: 1px solid #6B6B6B !important;
						border-radius: 0px !important;
						resize: vertical;
						padding: 8px 0px;
						box-sizing: border-box;
						color: #333;
						font-family: 'FONTSPRING DEMO - Cera Pro';
						font-size: 14px;
						font-style: normal;
						font-weight: 400;
						line-height: 19px; /* 144.444% */
					}
					.pantingBottomForm.zcwf_row input[type=text]:focus{
						outline: none;
					}
					.pantingBottomForm.zcwf_row input[type=text]::-webkit-input-placeholder{
						color: #333333;
						opacity: 1;
					}
					.pantingBottomForm.zcwf_row input[type=text]::-moz-placeholder{
						color: #333333;
						opacity: 1;
					}
					.pantingBottomForm.zcwf_row input[type=text]::placeholder{
						color: #333333;
						opacity: 1;
					}
					.pantingBottomForm {
						display: flex;
						align-items: start;
					}

					@media all and (max-width: 768px) {
						
						.pantingBottomForm .inputfeild{
							width: 100%;
						}
						.zcwf_lblLeft .zcwf_col_lab,
						.zcwf_lblLeft .zcwf_col_fld {
							width: auto;
							float: none !important;
						}
						.zcwf_lblLeft .inputfeild .zcwf_col_fld:nth-last-child(2){
							padding-bottom: 0px !important;
						}

						#formsubmit {
							margin-right: auto;
							border-color: transparent;
						}
						.pantingBottomForm.zcwf_row input[type=text] {
						font-size: 16px;
						line-height: 23px;
					}
					}
				</style>
				<div class="zcwf_row pantingBottomForm">
					<div class="inputfeild">
						<div class="zcwf_col_fld heading">
							<h5>Require a complete painting quotation for your home?</h5>
						</div>
						<div class="zcwf_col_fld">
							<input type="text" id="First_Name" name="First Name" maxlength="80" placeholder="First Name" style="display: none;">
							<input type="text" id="Last_Name" name="Last Name" maxlength="80" placeholder="Full Name">
							<div class='zcwf_col_help'></div>
						</div>
						<div class="zcwf_col_fld">
							<input placeholder="Mobile No" type="text" id="Mobile" name="Mobile" maxlength="10">
							<div class='zcwf_col_help'></div>
						</div>
						<div class="zcwf_col_fld">
							<input type="text" placeholder="Email ID" ftype="email" id="Email" name="Email" maxlength="100">
							<div class='zcwf_col_help'></div>
						</div>
						<div class="zcwf_col_fld">
							<input placeholder="Pin Code" type="text" id="Zip_Code" name="Zip Code" maxlength="6">
							<div class='zcwf_col_help'></div>
						</div>
						<div class="zcwf_col_fld button" style="padding-bottom: 0;">
							<input type="submit" id="formsubmit" class="formsubmit submitForm zcwf_button" value="SUBMIT" title="Submit">
						</div>
					</div>
				</div>
				<!-- <div class="zcwf_row">
					<div class="zcwf_col_fld" style="padding-bottom: 0;">
						<input type="submit" id="formsubmit" class="formsubmit zcwf_button" value="Submit" title="Submit">
					</div>
				</div> -->
			</form>
		</div>
		<script>
			$(document).ready(function() {
				$('form[name="WebToLeads250849000000947058"]').attr('action', 'https://crm.zoho.in/crm/WebToLeadForm');
				$('form[name="WebToLeads250849000000947058"]').attr('method', 'POST');
			});

			function validateEmail250849000000947058() {
				var form = document.forms['WebToLeads250849000000947058'];
				var emailFld = form.querySelectorAll('[ftype=email]');
				var i;
				for (i = 0; i < emailFld.length; i++) {
					var emailVal = emailFld[i].value;
					if ((emailVal.replace(/^\s+|\s+$/g, '')).length != 0) {
						var atpos = emailVal.indexOf('@');
						var dotpos = emailVal.lastIndexOf('.');
						if (atpos < 1 || dotpos < atpos + 2 || dotpos + 2 >= emailVal.length) {
							alert('Please enter a valid email address. ');
							emailFld[i].focus();
							return false;
						}
					}
				}
				return true;
			}

			function checkMandatory250849000000947058() {
				var firstName = document.getElementById('First_Name').value;
				var mndFileds = new Array('Last Name', 'Mobile', 'Lead Source', 'LEADCF15');
				var fldLangVal = new Array('Name', 'Mobile', 'Source', 'Brand');
				var form = document.forms['WebToLeads250849000000947058'];

				for (var i = 0; i < mndFileds.length; i++) {
			        var fieldObj = form[mndFileds[i]];
			        var helpElement = fieldObj.parentElement.querySelector('.zcwf_col_help');

			        if (fieldObj) {
			            if (((fieldObj.value).replace(/^\s+|\s+$/g, '')).length == 0) {
			                if (fieldObj.type == 'file') {
			                    // Handle file error
			                    helpElement.textContent = 'Please select a file to upload.';
			                    fieldObj.focus();
			                    fieldObj.classList.add('invalid-input');
			                    helpElement.classList.add('invalid-feedback');
			                    return false;
			                }

			                // Handle other input types
			                helpElement.textContent = fldLangVal[i] + ' cannot be empty.';
			                fieldObj.focus();
			               	fieldObj.classList.add('invalid-input');
			                helpElement.classList.add('invalid-feedback');
			                return false;
			            } else if (fieldObj.nodeName == 'SELECT') {
			                if (fieldObj.options[fieldObj.selectedIndex].value == '-None-') {
			                    // Handle select error
			                    helpElement.textContent = fldLangVal[i] + ' cannot be none.';
			                    fieldObj.focus();
			                   	fieldObj.classList.add('invalid-input');
			                    helpElement.classList.add('invalid-feedback');
			                    return false;
			                }
			            } else if (fieldObj.type == 'checkbox') {
			                if (fieldObj.checked == false) {
			                    // Handle checkbox error
			                    helpElement.textContent = 'Please accept ' + fldLangVal[i];
			                    fieldObj.focus();
			                   	fieldObj.classList.add('invalid-input');
			                    helpElement.classList.add('invalid-feedback');
			                    return false;
			                }
			            }
			            
			            // Clear the error message if the field is valid
			            helpElement.textContent = '';
			            helpElement.classList.remove('invalid-feedback');
			            fieldObj.classList.remove('invalid-input');

			            try {
			                if (fieldObj.name == 'Last Name') {
			                    name = fieldObj.value;
			                }
			            } catch (e) {}
			        }
			    }
				if (!validateEmail250849000000947058()) {
					return false;
				}
				document.querySelector('.crmWebToEntityForm .formsubmit').setAttribute('disabled', true);
			}


			function tooltipShow250849000000947058(el) {
				var tooltip = el.nextElementSibling;
				var tooltipDisplay = tooltip.style.display;
				if (tooltipDisplay == 'none') {
					var allTooltip = document.getElementsByClassName('zcwf_tooltip_over');
					for (i = 0; i < allTooltip.length; i++) {
						allTooltip[i].style.display = 'none';
					}
					tooltip.style.display = 'block';
				} else {
					tooltip.style.display = 'none';
				}
			}
		</script>
	</div>
<?php
	$content = ob_get_clean();
	return $content;
}

// cotact us form
add_shortcode('contact-us-form', 'contact_us_form');
function contact_us_form()
{
	ob_start(); ?>
	<div id='crmWebToEntityForm' class='zcwf_lblLeft crmWebToEntityForm waranty_guidform contact_us_form'>
		<meta name='viewport' content='width=device-width, initial-scale=1.0'>
		<META HTTP-EQUIV='content-type' CONTENT='text/html;charset=UTF-8'>
		<form action='https://crm.zoho.in/crm/WebToLeadForm' name=WebToLeads250849000000947058 method='POST' onSubmit='javascript:document.charset="UTF-8"; return checkMandatory250849000000947058()' accept-charset='UTF-8'>
			<input type='text' style='display:none;' name='xnQsjsdp' value='db887390625950606c3528f7d8a1164e190fd3c45d4366921efb4f0891976ab1'></input>
			<input type='hidden' name='zc_gad' id='zc_gad' value=''></input>
			<input type='text' style='display:none;' name='xmIwtLD' value='f3a51ccc724bbca98e66acb567562514f0c2b70292a34b6bc86ced74ebf842d1'></input>
			<input type='text' style='display:none;' name='actionType' value='TGVhZHM='></input>
			<input type='text' style='display:none;' name='returnURL' value='https&#x3a;&#x2f;&#x2f;indicus.co.in&#x2f;contact-us&#x2f;'> </input>
			<!-- Do not remove this code. -->
			<style>
				html,
				body {
					margin: 0px;
				}

				#crmWebToEntityForm.zcwf_lblLeft {
					width: 100%;
					padding: 40px 16px;
					margin: 0 auto;
					box-sizing: border-box;
					border-radius: 25px;
					border: 1px solid #333;
				}

				#crmWebToEntityForm.zcwf_lblLeft * {
					box-sizing: border-box;
				}

				#crmWebToEntityForm {
					text-align: left;
				}

				#crmWebToEntityForm * {
					direction: ltr;
				}

				.zcwf_lblLeft .zcwf_title {
					color: #333;
					/* font-family: Cera Pro; */
					font-family: 'CeraPro-Bold' !important;
					font-size: 20px;
					font-style: normal;
					font-weight: 700;
					line-height: 26px;
					margin-bottom: 16px;
					/* 130% */

				}
				.zcwf_lblLeft .zcwf_col_fld input[type=text], .zcwf_lblLeft .zcwf_col_fld_slt, .zcwf_lblLeft .zcwf_col_fld textarea{
					background: transparent;
				}
				.zcwf_lblLeft .zcwf_col_fld input[type=text].invalid-input,
				.zcwf_lblLeft .zcwf_col_fld_slt.invalid-input,
				.zcwf_lblLeft .zcwf_col_fld textarea.invalid-input{
					border-color: #ED4337;
					padding-right: 30px !important;
				}

				.zcwf_lblLeft .zcwf_col_fld input[type=text],
				.zcwf_lblLeft .zcwf_col_fld textarea,
				.pantingBottomForm input {
					width: 100%;
					border: none;
					border-bottom: 1px solid #6B6B6B;
					padding: 8px 0px;
					align-items: center;
					gap: 10px;
					align-self: stretch;
					font-family: 'FONTSPRING DEMO - Cera Pro';
					color: #333;
					font-size: 14px;
					font-style: normal;
					font-weight: 400;
					line-height: 19px;
					
					/* 142.857% */
					resize: none;
				}

				.zcwf_lblLeft .zcwf_col_fld input:focus,
				.zcwf_lblLeft .zcwf_col_fld textarea:focus {
					outline: none;
				}

				.zcwf_lblLeft .zcwf_col_fld input::placeholder,
				.zcwf_lblLeft .zcwf_col_fld textarea::placeholder {
					color: #333;
				}

				.zcwf_lblLeft .zcwf_col_lab {
					width: 30%;
					word-break: break-word;
					/* padding: 0px 6px 0px; */
					margin-right: 10px;
					margin-top: 5px;
					float: left;
					min-height: 1px;
				}

				.zcwf_lblLeft .zcwf_col_fld {
					float: left;
					width: 100%;
					/* padding: 0px 6px 0px; */
					position: relative;
					display: flex;
					flex-direction: column;
				}

				.zcwf_lblLeft .zcwf_privacy {
					padding: 6px;
				}

				.zcwf_lblLeft .wfrm_fld_dpNn {
					display: none;
				}

				.dIB {
					display: inline-block;
				}

				.zcwf_lblLeft .zcwf_col_fld_slt {
					width: 100%;
					border: none;
					border-bottom: 1px solid #6B6B6B;
					resize: vertical;
					padding: 8px 0px;
					align-items: center;
					gap: 10px;
					align-self: stretch;
					color: #333;
					/* Desktop-B2-14/20 */
					font-family: 'CeraPro-Regular' !important;
					font-size: 14px;
					font-style: normal;
					font-weight: 400;
					line-height: 19px;
					/* 142.857% */
					appearance: none;
				}

				.zcwf_lblLeft .zcwf_col_fld_slt:focus {
					outline: none;
				}

				/* .zcwf_lblLeft .zcwf_row:after,
				.zcwf_lblLeft .zcwf_col_fld:after {
					content: '';
					display: table;
					clear: both;
				} */

				.waranty_guidform .zcwf_row .zcwf_col_fld {
					position: relative;
				}

				.zcwf_lblLeft .zcwf_col_help.invalid-feedback {
					font-size: 14px;
					line-height: 20px;
					color: #ED4337;
					font-family: 'CeraPro-Regular' !important;
					position: absolute;
					bottom: -22px;
					right: 0;
				}
				.waranty_guidform .zcwf_row .zcwf_col_fld .zcwf_col_help.invalid-feedback:after {
					content: '';
					position: absolute;
					right: 0;
					top: -35px;
					background-repeat: no-repeat;
					background-size: contain;
					width: 24px;
					height: 24px;
				}
				/* .zcwf_lblLeft .zcwf_col_help::after{
					content: '';
					position: absolute;
					right: 0;
					top: -38px;
					background-image: url('images/error-symbol.svg');
					background-repeat: no-repeat;
					background-size: contain;
					width: 24px;
					height: 24px;
				} */

				.zcwf_lblLeft .zcwf_help_icon {
					cursor: pointer;
					width: 16px;
					height: 16px;
					display: inline-block;
					background: #fff;
					border: 1px solid #c0c6cc;
					color: #c1c1c1;
					text-align: center;
					font-size: 11px;
					line-height: 16px;
					font-weight: bold;
					border-radius: 50%;
				}

				/*.zcwf_lblLeft .formsubmit {
					margin-right: 5px;
					cursor: pointer;
					color: var(--baseColor);
					font-size: 12px;
				}*/

				.zcwf_lblLeft .zcwf_privacy_txt {
					width: 90%;
					color: rgb(0, 0, 0);
					font-size: 12px;
					font-family: Arial;
					display: inline-block;
					vertical-align: top;
					color: var(--baseColor);
					padding-top: 2px;
					margin-left: 6px;
				}

				.zcwf_lblLeft .zcwf_button {
					display: flex;
					padding: 16px 32px;
					justify-content: center;
					align-items: center;
					gap: 10px;
					border-radius: 134.212px;
					background: #7031BB;
					color: #FFF;
					font-size: 16px;
					font-style: normal;
					font-weight: 700;
					line-height: normal;
					box-shadow: none;
					border: none;
					outline: none;
					text-transform: uppercase;
					font-family: 'CeraPro-Regular' !important;
					cursor: pointer;
					transition: all ease-in-out 0.3s;
				}
				.zcwf_lblLeft .zcwf_button:hover,
				.zcwf_lblLeft .zcwf_button:focus{
					background-color: #8160EC !important;
				}
				.zcwf_lblLeft .zcwf_button.reset{
					background: #333;
				}

				.zcwf_lblLeft .zcwf_tooltip_over {
					position: relative;
				}

				.zcwf_lblLeft .zcwf_tooltip_ctn {
					position: absolute;
					background: #dedede;
					padding: 3px 6px;
					top: 3px;
					border-radius: 4px;
					word-break: break-word;
					min-width: 100px;
					max-width: 150px;
					color: var(--baseColor);
					z-index: 100;
				}

				.zcwf_lblLeft .zcwf_ckbox {
					float: left;
				}
				.zcwf_lblLeft .zcwf_file {
					width: 55%;
					box-sizing: border-box;
					float: left;
				}
				.clearB:after {
					content: '';
					display: block;
					clear: both;
				}
				.bottomBox {
					border-top: 1px solid #333;
					padding: 16px 16px 0px;
				}
				.btnGroups {
					display: flex;
					align-items: center;
					justify-content: flex-end;
					width: 100%;
				}
				.btnGroups .zcwf_col_fld{
					width: auto;
				}
				.zcwf_title{
					color: #000000 !important;
					margin-bottom: 24px !important;
				}
				.zcwf_title h4{
					margin-bottom: 0;
				}
				.contact_us_form{
					padding: 48px 32px !important;
				}
				.contact_us_form .topbox .zcwf_row{
					margin-bottom: 24px;
				    display: inline-block;
				    width: 100%;
				}
				.contact_us_form .topbox .zcwf_row input,
				.contact_us_form .topbox .zcwf_row textarea{
					border-bottom: 1px solid #747474;
					font-size: 18px;
					line-height: 26px;
					font-family: 'FONTSPRING DEMO - Cera Pro' !important;
					font-weight: 400;
					color: #747474;
				}
				.contact_us_form .topbox .zcwf_row input::-webkit-input-placeholder,
				.contact_us_form .topbox .zcwf_row textarea::-webkit-input-placeholder{
					color: #747474;
					opacity: 1;
				}
				.contact_us_form .topbox .zcwf_row input::-moz-placeholder,
				.contact_us_form .topbox .zcwf_row textarea::-moz-placeholder{
					color: #747474;
					opacity: 1;
				}
				.contact_us_form .topbox .zcwf_row input::placeholder,
				.contact_us_form .topbox .zcwf_row textarea::placeholder{
					color: #747474;
					opacity: 1;
				}
				.contact_us_form .topbox .zcwf_row textarea{
					overflow: hidden;
				}
				/* Css */
				@media screen and (max-width: 767px) {
					.crmWebToEntityForm {
						padding: 30px 12px;
						border-radius: 20px;
					}
					.bottomBox {
						padding: 0px 4px;
						margin-top: 0px;
						border: none;
					}
					.zcwf_lblLeft .zcwf_title h4{
						text-align: center;
						font-family: 'CeraPro-Bold' !important;
					}
					.btnGroups{
						justify-content: center;
					}
				}
			</style>
			<div class='zcwf_title'><h4>GET IN TOUCH WITH US</h4></div>
			<div class="topbox">
				<div class='zcwf_row'>
					<div class='zcwf_col_fld'><input type='text' placeholder="Name" id='Last_Name' name='Last Name' maxlength='80'></input>
						<div class='zcwf_col_help'></div>
					</div>
				</div>
				<div class='zcwf_row'>
					<div class='zcwf_col_fld'><input type='text' placeholder="Mobile number" id='Mobile' name='Mobile' maxlength='30'></input>
						<div class='zcwf_col_help'></div>
					</div>
				</div>
				<div class='zcwf_row'>
					<div class='zcwf_col_fld'><input type='text' placeholder="Email" ftype='email' id='Email' name='Email' maxlength='100'></input>
						<div class='zcwf_col_help'></div>
					</div>
				</div>
				<div class='zcwf_row'>
					<div class='zcwf_col_fld'><input type='text' placeholder="Location" id='City' name='City' maxlength='100'></input>
						<div class='zcwf_col_help'></div>
					</div>
				</div>	
				<div class='zcwf_row'>
					<div class='zcwf_col_fld'><textarea placeholder="Message" rows="1" id='Description' name='Description'></textarea>
						<div class='zcwf_col_help'></div>
					</div>
				</div>
			</div>
			<div class='zcwf_row'>
				<!-- <div class='zcwf_col_lab'></div> -->
				<div class="btnGroups">
					<div class="zcwf_col_fld">
						
					</div>
					<div class='zcwf_col_fld' style="display: flex; justify-content: end;">
						<input type='submit' id='formsubmit' class='formsubmit zcwf_button' value='Submit' title='Submit'>
					</div>
				</div>
			</div>
			<script>
				function validateEmail250849000000947058() {
					var form = document.forms['WebToLeads250849000000947058'];
					var emailFld = form.querySelectorAll('[ftype=email]');
					var i;
					for (i = 0; i < emailFld.length; i++) {
						var emailVal = emailFld[i].value;
						if ((emailVal.replace(/^\s+|\s+$/g, '')).length != 0) {
							var atpos = emailVal.indexOf('@');
							var dotpos = emailVal.lastIndexOf('.');
							if (atpos < 1 || dotpos < atpos + 2 || dotpos + 2 >= emailVal.length) {
								alert('Please enter a valid email address. ');
								emailFld[i].focus();
								return false;
							}
						}
					}
					return true;
				}

				function checkMandatory250849000000947058() {
				    var mndFileds = new Array('Last Name', 'Mobile', 'Email', 'City', 'Description');
				    var fldLangVal = new Array('Name', 'Mobile number', 'Email', 'City', 'Description');
				    var form = document.forms['WebToLeads250849000000947058'];
				    
				    for (var i = 0; i < mndFileds.length; i++) {
				        var fieldObj = form[mndFileds[i]];
				        var helpElement = fieldObj.parentElement.querySelector('.zcwf_col_help');

				        if (fieldObj) {
				            if (((fieldObj.value).replace(/^\s+|\s+$/g, '')).length == 0) {
				                if (fieldObj.type == 'file') {
				                    helpElement.textContent = 'Please select a file to upload.';
				                    fieldObj.focus();
				                    fieldObj.classList.add('invalid-input');
				                    helpElement.classList.add('invalid-feedback');
				                    return false;
				                }

				                helpElement.textContent = fldLangVal[i] + ' cannot be empty.';
				                fieldObj.focus();
				                fieldObj.classList.add('invalid-input');
				                helpElement.classList.add('invalid-feedback');
				                return false;
					        } else if (fieldObj.nodeName == 'SELECT') {
				                if (fieldObj.options[fieldObj.selectedIndex].value == '-None-') {
				                    helpElement.textContent = fldLangVal[i] + ' cannot be none.';
				                    fieldObj.focus();
				                    fieldObj.classList.add('invalid-input');
				                    helpElement.classList.add('invalid-feedback');
				                    return false;
				                }
				            } else if (fieldObj.type == 'checkbox') {
				                if (fieldObj.checked == false) {
				                    helpElement.textContent = 'Please accept ' + fldLangVal[i];
				                    fieldObj.focus();
				                    fieldObj.classList.add('invalid-input');
				                    helpElement.classList.add('invalid-feedback');
				                    return false;
				                }
				            }
				            
				            helpElement.textContent = '';
				            helpElement.classList.remove('invalid-feedback');
				            fieldObj.classList.remove('invalid-input');

				            try {
				                if (fieldObj.name == 'Last Name') {
				                    name = fieldObj.value;
				                }
				            } catch (e) {}
				        }
			    	}

				    if (!validateEmail250849000000947058()) {
				        return false;
				    }

			    	document.querySelector('.crmWebToEntityForm .formsubmit').setAttribute('disabled', true);
				}


				function tooltipShow250849000000947058(el) {
					var tooltip = el.nextElementSibling;
					var tooltipDisplay = tooltip.style.display;
					if (tooltipDisplay == 'none') {
						var allTooltip = document.getElementsByClassName('zcwf_tooltip_over');
						for (i = 0; i < allTooltip.length; i++) {
							allTooltip[i].style.display = 'none';
						}
						tooltip.style.display = 'block';
					} else {
						tooltip.style.display = 'none';
					}
				}
			</script>
			<script>
				$(document).ready(function() {
				    $("#add").click(function() {
				    	var lastField = $("#buildyourform div.zcwf_row:last");
				     //   alert(lastField.attr("data-idx"));
				        var intId = (lastField && lastField.length && parseInt(lastField.attr("data-idx")) + 1) || 1;
				        var fieldWrapper = $('<div class="zcwf_row"  style="display: flex;">');
				        fieldWrapper.attr("data-idx", intId);
				        var fName = $("<div class='three'><div class='zcwf_col_fld'><select class='zcwf_col_fld_slt' id='CASECF19' name='CASECF19'><option value='-None-'>Product</option><option value='INDICUS&#x20;DRAPER'>DRAPER</option><option value='INDICUS&#x20;CALIBRE'>CALIBRE</option><option value='INDICUS&#x20;HEATSEAL'>HEATSEAL</option><option value='INDICUS&#x20;ULTRACOAT'>ULTRACOAT</option><option value='INDICUS&#x20;ULTRAPRIME'>ULTRAPRIME</option></select><div class='zcwf_col_help'></div></div></div>");
				        var fType = $("<div class='three'><div class='zcwf_col_fld'><input type='text' id='CASECF12' name='CASECF12' maxlength='50' placeholder='Batch number'></input><div class='zcwf_col_help'></div></div></div><div class='three'><div class='zcwf_col_fld'><input type='text' id='CASECF14' name='CASECF14' maxlength='20' placeholder='Purchased quantity (L)'></input><div class='zcwf_col_help'></div></div></div>");
				        var removeButton = $("<input type=\"button\" class=\"remove\" value=\"X\" />");
				        removeButton.click(function() {
				            $(this).parent().remove();
				            if(intId >= 5)
				            {
				                $("#add").hide();
				            }
				            else
				            {
				                $("#add").show();
				            }
				        });
				        fieldWrapper.append(fName);
				        fieldWrapper.append(fType);
				        fieldWrapper.append(removeButton);
				        $("#buildyourform").append(fieldWrapper);
				       // alert(intId);
				        if(intId >= 4)
				        {
				            $("#add").hide();
				        }
				        else
				        {
				            $("#add").show();
				        }
				    });
				 
				});

			</script>
		</form>
	</div>
<?php
	$content = ob_get_clean();
	return $content;
}