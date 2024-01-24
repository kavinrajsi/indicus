<?php 
get_header();

$desktopbanner = get_field('desktop_banner_image', 'option');
$mobilebanner = get_field('mobile_banner_image', 'option');
$posttitle = get_field('post_title', 'option'); ?>

<section class="archive-gallery-hero">
    <?php if($mobilebanner){ ?>
        <img decoding="async" src="<?php echo $mobilebanner; ?>" alt="" class="mobile-img w-100 img-fluid">
    <?php } if($desktopbanner){ ?>
        <img decoding="async" src="<?php echo $desktopbanner; ?>" alt="" class="desktop-img w-100 img-fluid">
    <?php } ?>
</section>

<section class="gallery-post">
	<div class="small-container">
    		<div class="title">
       		<?php if($posttitle){ ?>
                <h1 class="text-center font-32"><?php echo $posttitle; ?></h1>
            <?php } ?>
            </div>
        	<div class="gallery-inner">
            </div>   
        </div>
   </div>
</section>

<?php get_footer();?>

