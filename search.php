<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package indicus
 */

get_header();

// Modify the main query to search only in the 'product' and 'color' post types
function indicus_search_filter($query) {
    if ($query->is_search && !is_admin()) {
        $query->set('post_type', array('product', 'color'));
    }
}
add_action('pre_get_posts', 'indicus_search_filter');

?>

<main id="primary" class="site-main">

    <?php if (have_posts()) : ?>
<div class="large-container inner-search-page">
        <header class="page-header">
            <h1 class="page-title">
                <?php
                /* translators: %s: search query. */
                printf(esc_html__('Search Results for: %s', 'indicus'), '<span>' . get_search_query() . '</span>');
                ?>
            </h1>
        </header><!-- .page-header -->


        <div class="pro-block product-img-block" id="productblockholder">
            <h3>Products</h3>
            <ul class="serarch-pro-list" id="productholder">
                <?php
                $product_found = false; // Flag to check if products are found
                while (have_posts()) : the_post();
                    if (get_post_type() === 'product') : 
                        $productid = get_the_ID();
                        $subheading = get_field('sub_heading', $productid);
                        $product_found = true; // Set flag to true as a product is found
                ?>
                        <li>
                            <div class="inner-search-list">
                                <a href="<?php the_permalink(); ?>">
                                    <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
                                    <h5><?php the_title(); ?></h5>
                                    <p><?php echo esc_html($subheading); ?></p>
                                </a>
                            </div>
                        </li>
                <?php
                    endif;
                endwhile;

                // Display message if no products are found
                if (!$product_found) {
                    echo '<li>Products not found</li>';
                }
                ?>
            </ul>
        </div>

        <div class="pro-block product-color-block" id="colorblockholder">
            <h3>Colors</h3>
            <ul class="serarch-pro-list" id="colorholder">
                <?php
                // Resetting the post data to use in a new loop
                rewind_posts();

                $color_found = false; // Flag to check if colors are found
                while (have_posts()) : the_post();
                    if (get_post_type() === 'color') :
                        $color_name = get_the_title();
                        $color_code = get_field('color_code'); // You may need to adjust this based on how the color code is stored
                        $color_found = true; // Set flag to true as a color is found
                ?>
                        <li>
                            <div class="color-shape" style="background-color: <?php echo $color_code; ?>"></div>
                            <p><?php echo $color_name; ?><span><?php echo get_the_content(); ?></span></p>
                        </li>
                <?php
                    endif;
                endwhile;

                // Display message if no colors are found
                if (!$color_found) {
                    echo '<li>Colors not found</li>';
                }
                ?>
            </ul>
        </div>

        <?php the_posts_navigation(); ?>

        <?php else : ?>

            <?php get_template_part('template-parts/content', 'none'); ?>

        <?php endif; ?>
    </div>
</main><!-- #main -->

<?php
// Reset the post type filter after the main query
remove_action('pre_get_posts', 'indicus_search_filter');

get_sidebar();
get_footer();
?>
