<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package indicus
 */

get_header();

?>

	<main id="primary" class="site-main"><?php 
		$page_for_posts = get_option( 'page_for_posts' );
		$banner_image = get_field('banner_image', $page_for_posts);
		$banner_title = get_field('banner_title', $page_for_posts);
		if($banner_image || $banner_title) { ?>
			<section class="inner-hero" style="background-image: url(<?php echo $banner_image; ?>);">
			   	<div class="xs-small-container">
			       	<div class="hero-banner-text">
			            <h1><?php echo $banner_title; ?></h1>      
			        </div>
			   	</div>
			</section><?php 
		} ?>
		<section class="inspiration-inner">
			<div class="small-container">
				<div class="inspri-cate">
<!-- 					<h4 class="text-center">CATEGORIES</h4>	 -->
					<ul class="ins-cate-filter"><?php 
						$categories = get_categories(array('hide_empty'=> false, 'exclude'=>1));
						foreach( $categories as $category ) { ?>
							<li>
								<label>
									<input type="radio" name="cate-check" for="<?php echo $category->slug; ?>">
									<span id="<?php echo $category->slug; ?>"><?php echo $category->name; ?></span>
								</label>
							</li><?php 
						} ?>
						<input type="hidden" id="insp_checked_category" value="">
					</ul>
				</div>
				<div class="inspri-loader">
					<div id="rolling" style="display: none;">
		                <img src="<?php echo site_url(); ?>/wp-content/uploads/2023/12/Rolling-1s-200px.gif">
		            </div>
		        </div>
				<div class="inspri-cate-list">
				</div>
			</div>
		</section>
	</main>

<?php
get_footer();
