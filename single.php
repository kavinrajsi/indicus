<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package indicus
 */
get_header();

while ( have_posts() ) :
    the_post();

    // Output the post content directly.
    ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <header class="entry-header">
            <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
        </header><!-- .entry-header -->

        <div class="entry-content">
            <?php the_content(); ?>
        </div><!-- .entry-content -->

    </article><!-- #post-<?php the_ID(); ?> -->
    <?php

endwhile;

?>

<!-- <main id="primary" class="site-main">
	<section class="inner-hero" style="background-image: url(<?php the_post_thumbnail_url('full');?>);">
	   	<div class="xs-small-container">
	       	<div class="hero-banner-text">
	            <h1><?php the_title(); ?></h1>      
	        </div>
	   	</div>
	</section><?php 
	if(have_rows('content_rows')) { ?>
		<section class="article-details">
			<div class="small-container"><?php 
			while (have_rows('content_rows')) {
				the_row();
				$title = get_sub_field('title');
				$content = get_sub_field('content');
				$image = get_sub_field('image');
				$after_content = get_sub_field('after_content'); ?>
				<div class="articel-row text-center">
					<h4><?php echo $title; ?></h4>
					<?php echo $content; ?>
					<img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" class="img-fluid w-100 mb-40">
					<?php echo $after_content; ?>
				</div><?php 
			} ?>
			</div>
		</section><?php 
	} ?>
</main> -->

<?php
get_footer();
