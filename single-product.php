<?php
get_header();

$banner_color = get_field('banner_color');
$subheading = get_field('sub_heading');
$productdownload = get_field('product_download');
$content = get_the_content();
$title = get_the_title();
if( $banner_color || $subheading || $productdownload || $content || $title ) :
?>
<section class="simple-banner sin-prohero <?php if(empty($banner_color)) { echo 'empty-prohero'; } ?>" style="background-color:<?php echo $banner_color; ?>">
	<div class="small-container">
		<div class="single-pro-inner">
			<div class="sin-protleft">
				<div class="simple-banner-text">
					<h1><?php echo $title; ?></h1>
					<h5><?php echo $subheading; ?></h5>
					<p><?php echo $content; ?></p>
					<?php 
					if( $productdownload ): 
						$url = wp_get_attachment_url( $productdownload );?>
					<a class="elementor-button elementor-button-link elementor-size-sm" href="<?php echo esc_html($url); ?>" target="_blank" style="color: <?php echo $banner_color; ?>">PRODUCT DATASHEET</a>
					<?php endif; ?>
				</div>
			</div><?php 
			if (has_post_thumbnail() ) { ?>
				<div class="sin-protright">
					<img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full')?>" alt="" class="img-fluid">
				</div><?php
			} ?>
		</div>
	</div>
</section><?php
endif;

$exptitle = get_field('exp_title');
$expdescription = get_field('exp_description');
$experienceimage = get_field('experience_image'); 
if( $exptitle || $expdescription || $experienceimage ) : ?>
<section class="exper-admyra pat-80">
	<div class="small-container">
		<div class="exper-admyra-inner d-flex flex-wrap">
			<div class="flex-50 line-height-normal">
				<img src="<?php echo $experienceimage; ?>" alt="" class="img-fluid w-100">
			</div>
			<div class="flex-50 exper-admyra-right">
				<h3><?php echo $exptitle; ?></h3>
				<p><?php echo $expdescription; ?></p>
			</div>
		</div>
	</div>
</section>
<?php
endif;

$featurestitle = get_field('features_title');
if( $featurestitle ) : ?>
<section class="title-barea">
	<div class="small-container">
		<h3 class="text-center"><?php echo $featurestitle; ?></h3>
	</div>
</section><?php 
endif; ?>

<?php $i = 1; 
if (have_rows('image_with_description')) { ?>
<section class="sin-middle-data">
	<div class="small-container"><?php
		while (have_rows('image_with_description')) {
			the_row();
			$left_image = get_sub_field('image');
			$icon_image = get_sub_field('icon_image');
			$title = get_sub_field('title');
			$description = get_sub_field('description');
			if ($i % 2 != 0) { ?>
				<div class="middle-row d-flex flex-wrap">
					<div class="flex-50 simg-block">
						<img src="<?php echo esc_url($left_image['url']); ?>" alt="<?php echo esc_attr($left_image['alt']); ?>" class="img-fluid w-100 mheight-100 object-cover">
					</div>
					<div class="flex-50">
						<div class="Scontent-area">
							<div class="middle-title">
								<div class="pros-img">
									<img src="<?php echo esc_url($icon_image['url']); ?>" alt="<?php echo esc_attr($icon_image['alt']); ?>" class="img-fluid">
								</div>
								<h5><?php echo $title; ?></h5>
							</div>
							<p><?php echo $description; ?></p>
						</div>
					</div>
				</div><?php 
			} else { ?>
				<div class="middle-row d-flex flex-wrap">
					<div class="flex-50">
						<div class="Scontent-area">
							<div class="middle-title">
								<div class="pros-img">
									<img src="<?php echo esc_url($icon_image['url']); ?>" alt="<?php echo esc_attr($icon_image['alt']); ?>" class="img-fluid">
								</div>
								<h5><?php echo $title; ?></h5>
							</div>
							<p><?php echo $description; ?></p>
						</div>
					</div>
					<div class="flex-50 simg-block">
						<img src="<?php echo esc_url($left_image['url']); ?>" alt="<?php echo esc_attr($left_image['alt']); ?>" class="img-fluid w-100 mheight-100 object-cover">
					</div>
				</div><?php 
			}
			$i++;
		} ?>
	</div>
</section><?php 
} ?>

<?php
$selected_option = get_field('choose_section');

if ($selected_option === '3column') :
    if (have_rows('details_feature_icon_text')) :
?>
        <section class="home-paint-blog">
            <div class="small-container">
                <div class="blog-row d-flex flex-wrap">
                    <?php while (have_rows('details_feature_icon_text')) : the_row();
                        $left_image_url = get_sub_field('image');
                        $title = get_sub_field('title');
                        $description = get_sub_field('description');
                    ?>
                        <div class="blog-in">
                            <div class="Scontent-area">
                                <div class="middle-title">
                                    <div class="pros-img">
                                        <img src="<?php echo $left_image_url['url']; ?>" alt="<?php echo esc_attr($left_image_url['alt']); ?>" class="img-fluid">
                                    </div>
                                    <h5><?php echo $title; ?></h5>
                                </div>
                                <p><?php echo $description; ?></p>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>
        </section>
<?php
    endif;
elseif ($selected_option === '4column') :
    if (have_rows('details_feature_icon_text')) :
?>
        <section class="home-paint-blog">
            <div class="small-container">
                <div class="blog-row blog4-area d-flex flex-wrap">
                    <?php while (have_rows('details_feature_icon_text')) : the_row();
                        $left_image_url = get_sub_field('image');
                        $title = get_sub_field('title');
                        $description = get_sub_field('description');
                    ?>
                        <div class="blog-in">
                            <div class="Scontent-area">
                                <div class="middle-title">
                                    <div class="pros-img">
                                        <img src="<?php echo $left_image_url['url']; ?>" alt="<?php echo esc_attr($left_image_url['alt']); ?>" class="img-fluid">
                                    </div>
                                    <h5><?php echo $title; ?></h5>
                                </div>
                                <p><?php echo $description; ?></p>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>
        </section>
<?php
    endif;
endif;
?>


<?php 
$background_title = get_field('background_image_title');
$background_description = get_field('background_image_description');
$color_combination = get_field('all_color_combo' );
if( $background_title || $background_description || $color_combination ) :
$first_row = $color_combination[0];
$background_image = $first_row['background_image']; ?>
<section class="living-space" style="background-image: url(<?php echo $background_image; ?>);">
	<div class="small-container">
		<div class="space-row d-flex flex-wrap">
			<div class="flex-50"></div>
			<div class="flex-50">
				<div class="lspace-content">	
					<h3><?php echo $background_title; ?></h3>
					<p><?php echo $background_description; ?></p>
					<ul class="living-space-filter"><?php 
						$count = 1;
						foreach( $color_combination as $combination ) { 
						 	$image = $combination['background_image'];
						 	$color = $combination['choose_color'];
						 	$colortitle = $combination['color_title'];
						 	$colorcode = $combination['color_code']; ?>
							<li class="<?php if($count == 1){ echo 'active'; } ?>" image-url="<?php echo $image; ?>">
								<div class="color-box" style="background-color: <?php echo esc_attr($color); ?>;"></div>
								<p><?php echo $colortitle; ?><span><?php echo $colorcode; ?></span></p>
							</li><?php $count++;
						} ?>
					</ul>
				</div>
			</div>
		</div>
	</div>
</section><?php 
endif; ?>

<?php 
$colordescription = get_field('color_description');
$viewcolor = get_field('view_color');
if( $colordescription || $viewcolor ) : ?>
<div class="all-colors">
	<div class="color-container">
		<div class="color-panel d-flex">
			<p><?php echo $colordescription; ?></p>
			<?php 
			if($viewcolor){ ?>
				<a href="<?php echo esc_url( $viewcolor['url'] ); ?>" target="<?php echo esc_attr( $viewcolor['target'] ); ?>" class="btn-fill">
					<?php echo esc_html( $viewcolor['title'] ); ?>
				</a>
			<?php } ?>
		</div>
	</div>
</div><?php 
endif; ?>

<?php 
$imagesection = get_field('image_section');
$imagedescription = get_field('image_description');
$image_button = get_field('image_button_link');
if( $imagesection || $imagedescription || $image_button ) : ?>
<section class="card-shade">
	<div class="small-container">
		<div class="shade-row d-flex flex-wrap">
			<div class="flex-50">
				<div class="shade-img">
					<img src="<?php echo $imagesection; ?>" alt="" class="img-fluid w-100">
				</div>
			</div>
			<div class="flex-50">
				<div class="shade-content">
					<p><?php echo $imagedescription; ?></p>
					<?php if( !empty($image_button['title']) ): ?>
					<a href="<?php echo esc_url( $image_button['url'] ); ?>" target="<?php echo esc_attr( $image_button['target'] ); ?>"  class="btn-fill">
						<?php echo esc_html( $image_button['title'] ); ?>
					</a>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</section><?php 
endif; ?>

<?php 
$videotitle = get_field('video_title');
$video_url = get_field('video_link');
if( $videotitle || $video_url ) : ?>
<section class="sin-video-blog">
	<div class="small-container">
		<h3 class="pab-80 mb-0"><?php echo $videotitle; ?> </h3>
		<div class="youtube-area">
			<iframe width="100%" height="580" src="<?php echo esc_attr($video_url); ?>" title="" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
		</div>
	</div>
</section><?php 
endif; ?>

<?php 
$slidertitle = get_field('slider_title');
$sliderdescription = get_field('slider_description');
if( $slidertitle || $sliderdescription || have_rows('video_slider')) : ?>
<section class="customer_testi pat-80">
	<div class="small-container">
		<div class="cus-top-content text-center">
			<h3><?php echo $slidertitle; ?></h3>
			<p><?php echo $sliderdescription; ?></p>
		</div>
	</div>
	<?php
		$has_videos = false; // Flag to check if there is at least one video link

		if (have_rows('video_slider')) {
			while (have_rows('video_slider')) : the_row();
				$videoLink = get_sub_field('slider_video_link');
				if ($videoLink != '') {
					$has_videos = true; 
					break; 
				}
			endwhile;
		}

		if ($has_videos) { // Check the flag before rendering the entire section
			?>
			<div class="customer-bottom-content pab-80 pat-80">
				<div class="max-container">
					<div class="customer-slides owl-carousel nav-style">
						<?php
						while (have_rows('video_slider')) : the_row();
							$videoLink = get_sub_field('slider_video_link');
							$videoCaption = get_sub_field('slider_video_caption');
							if ($videoLink != '') {
								?>
								<div class="item">
									<div class="customer-video">
										<video width="100%" height="100%" class="cus-video" controls>
											<source src="<?php echo esc_url($videoLink); ?>" type="video/mp4">
										</video>
										<span class="v-play">
											<svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="50" height="50" x="0" y="0" viewBox="0 0 48.334 48.334" style="enable-background:new 0 0 512 512" xml:space="preserve">
												<g>
													<path d="m3.452 0 41.429 24.167L3.452 48.334z" fill="#fff" opacity="1" data-original="#fff" class=""/>
												</g>
											</svg>
										</span>
									</div>
									<h5><?php echo esc_html($videoCaption); ?></h5>
								</div>
								<?php
							}
						endwhile;
						?>
					</div>
				</div>
			</div>
			<?php
		}
		?>


</section><?php 
endif; ?>

<?php 
$posttitle = get_field('post_title');
$inspiration_slider_option = get_field('inspiration_slider_show');
if( $posttitle || $inspiration_slider_option ) : ?>
<section class="often-area pat-80">
	<div class="small-container">
		<h3><?php echo $posttitle; ?></h3><?php 
    	if ($inspiration_slider_option === 'manuals') {
        	$manual_posts = get_field('often_slider_show');
	        if (!$manual_posts) {
	            echo 'No manually selected posts found';
	            return ob_get_clean();
	        }

	        $counter = 0; ?>
			<div class="often-slide owl-carousel nav-style"><?php
				foreach ($manual_posts as $post) {
		            $thumbnail_url = get_the_post_thumbnail_url($post->ID, 'full');
		            $post_title = $post->post_title;
		            $tags = get_the_tags($post->ID);
		            $tag = !empty($tags) ? esc_html($tags[0]->name) : '';
		            $current_class = $background_classes[$counter]; ?>
					<div class="item">
						<div class="often-inner text-center">
							<div class="ofter-pro-img">
								<?php if ($thumbnail_url) : ?>
								<img src="<?php echo esc_url($thumbnail_url); ?>" alt="<?php echo esc_attr($post_title); ?>" class="img-fluid w-100">
								<?php endif; ?>
							</div>
							<h5><?php echo esc_html($post_title); ?></h5>
							<p><?php echo esc_html($tag); ?></p>
						</div>
					</div><?php
	        	} ?>
	        </div><?php
	    } else {
	        $args = array(
	            'post_type'      => 'product',
	            'posts_per_page' => 8,
	            'orderby'        => 'date',
	            'order'          => 'DESC',
	        );
	        $query = new WP_Query($args);
	        if (!$query->have_posts()) {
	            echo 'No posts found';
	            return ob_get_clean();
	        } ?>
	        <div class="often-slide owl-carousel nav-style"><?php
	         	while ($query->have_posts()) : $query->the_post();
		            $thumbnail_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
		            $post_title = get_the_title();
		            $tags = get_the_tags();
		            $tag = !empty($tags) ? esc_html($tags[0]->name) : '';
		            $current_class = $background_classes[$counter]; ?>
		            <div class="item">
						<div class="often-inner text-center">
							<div class="ofter-pro-img">
								<?php if ($thumbnail_url) : ?>
								<img src="<?php echo esc_url($thumbnail_url); ?>" alt="<?php echo esc_attr($post_title); ?>" class="img-fluid w-100">
								<?php endif; ?>
							</div>
							<h5><?php echo esc_html($post_title); ?></h5>
							<p><?php echo get_the_content() ?></p>
						</div>
					</div><?php
				endwhile; ?>
        	</div><?php
        	wp_reset_postdata();
    	} ?>
	</div>
</section><?php 
endif; ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('.customer-slides').owlCarousel({
	        loop: true,
	        margin: 24,
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
	    $('.often-slide').owlCarousel({
	        loop: true,
	        margin: 20,
	        nav: true,
	        dots: false,
	        navText: [
	            '<svg xmlns="http://www.w3.org/2000/svg" width="23" height="35" viewBox="0 0 23 35" fill="none"><path d="M1.57958 19.759L18.0256 34.147C19.9636 35.845 22.9996 34.465 22.9996 31.888V3.11195C23.0001 2.53522 22.8343 1.97056 22.5222 1.48561C22.21 1.00066 21.7647 0.615969 21.2395 0.377601C20.7143 0.139233 20.1316 0.0572962 19.561 0.141602C18.9905 0.225907 18.4564 0.472881 18.0226 0.852949L1.58258 15.241C1.26035 15.5225 1.00209 15.8698 0.82514 16.2594C0.648189 16.6491 0.556641 17.072 0.556641 17.5C0.556641 17.9279 0.648189 18.3509 0.82514 18.7405C1.00209 19.1301 1.26035 19.4774 1.58258 19.759H1.57958Z" fill="#4F4F4F"/></svg>',
	            '<svg xmlns="http://www.w3.org/2000/svg" width="23" height="35" viewBox="0 0 23 35" fill="none"><path d="M21.42 19.759L4.974 34.147C3.036 35.845 1.10312e-06 34.465 1.10312e-06 31.888V3.11195C-0.000493378 2.53522 0.165264 1.97056 0.477423 1.48561C0.789582 1.00066 1.23491 0.615969 1.76008 0.377601C2.28525 0.139233 2.86799 0.0572962 3.43853 0.141602C4.00907 0.225907 4.54321 0.472881 4.977 0.852949L21.417 15.241C21.7392 15.5225 21.9975 15.8698 22.1744 16.2594C22.3514 16.6491 22.4429 17.072 22.4429 17.5C22.4429 17.9279 22.3514 18.3509 22.1744 18.7405C21.9975 19.1301 21.7392 19.4774 21.417 19.759H21.42Z" fill="#4F4F4F"/></svg>'
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
	});
</script>

<script>
    $(document).ready(function () {
      $(".cus-video").prop('controls', false);
      $(".v-play").click(function () {
        var video = $(this).prev(".cus-video")[0];

        if (video.paused) {
          video.play();
          $(this).prev(".cus-video").prop('controls', true);
          $(this).hide();
        } else {
          video.pause();
          $(this).prev(".cus-video").prop('controls', false);
          $(".v-play").show();
        }
      });
    });
</script>

<script>
$(document).ready(function() {
    $('.living-space-filter li').click(function() {
        $('.living-space-filter li').removeClass('active');
        $(this).addClass('active');
        var imageUrl = $(this).attr('image-url');
        if (!imageUrl) {
            imageUrl = '<?php echo $background_image; ?>';
        }
        $('.living-space').css('background-image', 'url(' + imageUrl + ')');
    });
});
</script>

<?php get_footer();?>
