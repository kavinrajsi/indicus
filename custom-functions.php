<?php 
// home_INSPIRATION & IDEAS
add_shortcode('image_stackblock', 'stack_block');
function stack_block()
{
    ob_start();

    // Array of background classes
    $background_classes = array('bg-lightblue', 'bg-lightpink', 'bg-lightcream');
    $inspiration_slider_option = get_field('inspiration_slider_show');

    // Check if it's the "Manual" option
    if ($inspiration_slider_option === 'manual') {
        $manual_posts = get_field('inspiration_slider');

        // If no manually selected posts found, return
        if (!$manual_posts) {
            echo 'No manually selected posts found';
            return ob_get_clean();
        }

        $counter = 0;
        echo '<div class="ideas-slide owl-carousel nav-style">';
        foreach ($manual_posts as $post) {
            $thumbnail_url = get_the_post_thumbnail_url($post->ID, 'full');
            $post_title = $post->post_title;
            $tags = get_the_tags($post->ID);
            $tag = !empty($tags) ? esc_html($tags[0]->name) : '';
            $current_class = $background_classes[$counter];
            ?>

            <div class="item">
                <a href="<?php echo get_the_permalink(); ?>">
                    <div class="img-blog">
                        <?php if ($thumbnail_url) : ?>
                            <img src="<?php echo esc_url($thumbnail_url); ?>" alt="<?php echo esc_attr($post_title); ?>">
                        <?php endif; ?>
                    </div>
                    <div class="idea-img-caption <?php echo esc_attr($current_class); ?>">
                        <p><?php echo esc_html($tag); ?></p>
                        <h5 class="line-clamp--two-line"><?php echo esc_html($post_title); ?></h5>
                    </div>
                </a>
            </div>

            <?php
            $counter++;
            if ($counter >= count($background_classes)) {
                $counter = 0;
            }
        }
        echo '</div>';
    } else {
        // It's the "Latest" option
        $args = array(
            'post_type'      => 'post',
            'posts_per_page' => 8,
            'orderby'        => 'date',
            'order'          => 'DESC',
        );

        $query = new WP_Query($args);

        // If no posts found, return
        if (!$query->have_posts()) {
            echo 'No posts found';
            return ob_get_clean();
        }

        $counter = 0;
        echo '<div class="ideas-slide owl-carousel nav-style">';
        while ($query->have_posts()) : $query->the_post();
            $thumbnail_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
            $post_title = get_the_title();
            $tags = get_the_tags();
            $tag = !empty($tags) ? esc_html($tags[0]->name) : '';
            $categories = get_the_category();
            $current_class = $background_classes[$counter];
            ?>

            <div class="item">
                <a href="<?php echo get_the_permalink(); ?>">
                    <div class="img-blog">
                        <?php if ($thumbnail_url) : ?>
                            <img src="<?php echo esc_url($thumbnail_url); ?>" alt="<?php echo esc_attr($post_title); ?>">
                        <?php endif; ?>
                    </div>
                    <div class="idea-img-caption <?php echo esc_attr($current_class); ?>">
                        <p><?php 
 
foreach ($categories as $category) {
    if ($category->cat_name !== 'All') {
        echo $category->cat_name . '';
    }
}

                       ?></p>
                        <h5 class="line-clamp--two-line"><?php echo esc_html($post_title); ?></h5>
                    </div>
                </a>
            </div>

            <?php
            $counter++;
            if ($counter >= count($background_classes)) {
                $counter = 0;
            }

        endwhile;
        echo '</div>';
        wp_reset_postdata();
    }

    $content = ob_get_clean();
    return $content;
}


// 
add_shortcode('ColourPlanate', 'colour');
function colour(){
    ob_start();

    $terms = get_terms(array(
        'taxonomy'   => 'colour-category',
        'hide_empty' => false,
        'orderby'    => 'term_id',
        'order'      => 'ASC',
    )); ?>

    <div id="clrloader" style="display: none;">
        <div class="imgldrcover">
            <img src="<?php echo home_url(); ?>/wp-content/uploads/2024/01/Rolling-transparent.gif">
        </div>
    </div>
     <div class="colour-main-outer defaultblock">
      <ul>
<li class="colorpick" data-id="0" data-name="All Colours">
                    <a href="javascript:void(0);">
                      <div class="color-box" style="" data-category-id="<?php echo esc_attr($term->term_id); ?>"><img src="<?php echo site_url(); ?>/wp-content/uploads/2024/01/indicus-all-color-palette.png" alt="color-images" style="width: 100%; height: 100%;"></div>
                        <span class="color-name">All Colours</span>
                    
                    </a>
                </li>
<?php if ($terms && !is_wp_error($terms)) :
        foreach ($terms as $term) : ?>
            <li class="colorpick" data-id="<?php echo $term->term_id; ?>" data-name="<?php echo $term->name; ?>">
                <a href="javascript:void(0);"><?php 
                    $catcolor = get_field('category_colour', $term->taxonomy . '_' . $term->term_id); 
                    if($catcolor){
                        $red   = $catcolor['red'];
                        $green = $catcolor['green'];
                        $blue  = $catcolor['blue'];
                        $alpha = $catcolor['alpha'];
                        $cssColor = "rgba($red, $green, $blue, $alpha)";
                    } else {
                        $cssColor = '';
                    } ?>
                    <div class="color-box" style="background-color: <?php echo $cssColor; ?>;" data-category-id="<?php echo esc_attr($term->term_id); ?>"></div>
                    <span class="color-name"><?php echo $term->name; ?></span>
              </a>
            </li><?php endforeach; 
        else :
            echo '<li>No colors found</li>';
        endif; ?>
      </ul>
    </div>
    <div class="colour-main-outer afterresult" style="display:none;">
      <div class="top-filter">
            <ul>
                <li>
                    <input class="colorselect" type="radio" name="radio" id="color-0" data-name="All Colours" data-id="0" checked>
                    <label class="custom-radio" for="color-0">
                        <div class="color-box">
                            <img src="<?php echo site_url(); ?>/wp-content/uploads/2024/01/indicus-all-color-palette.png" alt="color-images">
                        </div>
                        <span class="color-name">All Colours</span>
                    </label>
                </li><?php
                $colors = get_terms(array(
                    'taxonomy' => 'colour-category', 
                    'hide_empty' => false,
                    'orderby'    => 'term_order', 
                    'order'      => 'ASC',         
                ));

                if ($colors && !is_wp_error($colors)) :
                    foreach ($colors as $color) :
                        $color_id = $color->term_id;
                        $category_colour = get_field('category_colour', 'colour-category_' . $color->term_id);
                        $cssColor = '';
                        if($category_colour){
                            $red   = $category_colour['red'];
                            $green = $category_colour['green'];
                            $blue  = $category_colour['blue'];
                            $alpha = $category_colour['alpha'];
                            $cssColor = "rgba($red, $green, $blue, $alpha)";
                        }
                        $checked = ($color_id == $current_category_id) ? 'checked' : '';
                        $active = ($color_id == $current_category_id) ? 'active' : ''; ?>
                        <li>
                            <input class="colorselect <?php echo $active; ?>" type="radio" name="radio" data-name="<?php echo esc_attr($color->name); ?>" id="color-<?php echo esc_attr($color->term_id); ?>" data-id="<?php echo esc_attr($color->term_id); ?>" <?php echo $checked; ?> >
                            <label class="custom-radio" for="color-<?php echo esc_attr($color->term_id); ?>">
                                <div class="color-box" style="background-color: <?php echo $cssColor; ?>;" data-category-id="<?php echo esc_attr($color->term_id); ?>">   
                                    <img src="<?php echo esc_url(get_field('category_image', 'colour-category_' . $color->term_id)); ?>" alt="color-images" class="category-image" />
                                </div>
                                <span class="color-name"><?php echo esc_html($color->name); ?></span>
                            </label>
                        </li><?php
                    endforeach;
                else :
                    echo '<li>No colors found</li>';
                endif; ?>
            </ul>
      </div>
    </div>
    <div class="color-filter-result" style="display: none;">
        <div class="bottom-filter" >
            <h3 class="filter-category-name"></h3>
            <form>
                <div class="color-main-filter" >
                    <label class="mobile-none">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="22" viewBox="0 0 20 22" fill="none" class="mobile-none">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M0.25 1.25C0.25 1.05109 0.329018 0.860322 0.46967 0.71967C0.610322 0.579018 0.801088 0.5 1 0.5H19C19.1989 0.5 19.3897 0.579018 19.5303 0.71967C19.671 0.860322 19.75 1.05109 19.75 1.25V4.25C19.75 4.43496 19.6816 4.61339 19.558 4.751L13 12.038V19.25C12.9999 19.4073 12.9503 19.5607 12.8582 19.6883C12.7661 19.8159 12.6363 19.9113 12.487 19.961L7.987 21.461C7.87431 21.4985 7.75432 21.5088 7.6369 21.4909C7.51948 21.4729 7.408 21.4274 7.31162 21.358C7.21525 21.2886 7.13674 21.1972 7.08257 21.0915C7.02839 20.9858 7.00009 20.8688 7 20.75V12.038L0.442 4.751C0.318412 4.61339 0.250033 4.43496 0.25 4.25V1.25ZM1.75 2V3.962L8.308 11.249C8.43159 11.3866 8.49997 11.565 8.5 11.75V19.709L11.5 18.71V11.75C11.5 11.565 11.5684 11.3866 11.692 11.249L18.25 3.962V2H1.75Z" fill="#1E1E1E"></path>
                        </svg>
                    </label>
                    <div class="desktop-none w-100 filter-cp-click">
                        <label class="fixed-filter">
                            <span>Filter</span>
                            <div class="top-mob-fil">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="11" viewBox="0 0 18 11" fill="none" class="desktop-none">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M6 9.75C6 9.55109 6.07902 9.36032 6.21967 9.21967C6.36032 9.07902 6.55109 9 6.75 9H11.25C11.4489 9 11.6397 9.07902 11.7803 9.21967C11.921 9.36032 12 9.55109 12 9.75C12 9.94891 11.921 10.1397 11.7803 10.2803C11.6397 10.421 11.4489 10.5 11.25 10.5H6.75C6.55109 10.5 6.36032 10.421 6.21967 10.2803C6.07902 10.1397 6 9.94891 6 9.75ZM3 5.25C3 5.05109 3.07902 4.86032 3.21967 4.71967C3.36032 4.57902 3.55109 4.5 3.75 4.5H14.25C14.4489 4.5 14.6397 4.57902 14.7803 4.71967C14.921 4.86032 15 5.05109 15 5.25C15 5.44891 14.921 5.63968 14.7803 5.78033C14.6397 5.92098 14.4489 6 14.25 6H3.75C3.55109 6 3.36032 5.92098 3.21967 5.78033C3.07902 5.63968 3 5.44891 3 5.25ZM0 0.75C0 0.551088 0.0790178 0.360322 0.21967 0.21967C0.360322 0.0790178 0.551088 0 0.75 0H17.25C17.4489 0 17.6397 0.0790178 17.7803 0.21967C17.921 0.360322 18 0.551088 18 0.75C18 0.948912 17.921 1.13968 17.7803 1.28033C17.6397 1.42098 17.4489 1.5 17.25 1.5H0.75C0.551088 1.5 0.360322 1.42098 0.21967 1.28033C0.0790178 1.13968 0 0.948912 0 0.75Z" fill="black"/>
                                </svg>
                            </div>
                        </label>
                    </div>
                    <div class="filter-list-main">
                       <div class="filter-list-main__header">
	                    <h4 class="desktop-none">Filter</h4>
                        <span class="close-icon"> × </span>
                    </div>
                     
                        <div class="dropdown">
                            <a href="javascript:void(0)" class="js-link">Colour Temperature <i class="fa fa-chevron-down"></i></a>
                            <ul class="js-dropdown-list checkbox-container">
                                <?php
                                $colorstemp = get_terms(array(
                                    'taxonomy' => 'temperature', 
                                    'hide_empty' => false,
                                    'orderby'    => 'term_order', 
                                    'order'      => 'ASC',         
                                ));
                                if ($colorstemp && !is_wp_error($colorstemp)) :
                                    foreach ($colorstemp as $term) :

                                        ?>
                                        <li>
                                            <input class="temp" type="checkbox" id="<?php echo esc_html($term->name); ?>" data-id="<?php echo esc_attr($term->term_id); ?>" data-name=" <?php echo esc_html($term->name); ?>">
                                            <label class="category-label temperature-label" data-term-id="<?php echo esc_attr($term->term_id); ?>" data-taxonomy="temperature" for="<?php echo esc_html($term->name); ?>">
                                                <?php echo esc_html($term->name); ?>
                                            </label>
                                        </li><?php
                                    endforeach;
                                else :
                                    echo '<li>No temperatures found</li>';
                                endif; ?>
                            </ul>
                        </div>
                        <div class="dropdown">
                            <a href="javascript:void(0)" class="js-link1">Tonality <i class="fa fa-chevron-down"></i></a>
                            <ul class="js-dropdown-list1 checkbox-container">
                                <?php
                                $colorstonality = get_terms(array(
                                    'taxonomy' => 'tonality', 
                                    'hide_empty' => false,
                                    'orderby'    => 'term_order', 
                                    'order'      => 'ASC',         
                                ));
                                if ($colorstonality && !is_wp_error($colorstonality)) :
                                    foreach ($colorstonality as $terms) : 
                                         ?>
                                        <li>
                                            <input class="tonal"  type="checkbox" id="<?php echo esc_html($terms->name); ?>" data-id="<?php echo esc_attr($terms->term_id); ?>" data-name="<?php echo esc_html($terms->name); ?>">
                                            <label class="category-label tonality-label" data-term-id="<?php echo esc_attr($terms->term_id); ?>" data-taxonomy="tonality" for="<?php echo esc_html($terms->name); ?>" > <?php echo esc_html($terms->name); ?></label>
                                        </li><?php
                                    endforeach;
                                else :
                                    echo '<li>No terms found</li>';
                                 endif; ?>
                            </ul>
                        </div>
                        <div class="mob-bottom-fil-btn desktop-none">
                            <a class="btn-fill clear-product-filter">Clear All</a>
                            <a class="btn-fill">Apply</a>
                        </div>
                   </div>
                </div>
                <div class="selected-options pf" id="selectedOptionsContainer"></div>
            </form>
        </div>
        <div class="filter-result">
            <div class="colour-main-outer">
                <ul>
                </ul>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

  <script>
    const checkboxes = document.querySelectorAll('.checkbox-container input[type="checkbox"]');
    const selectedOptionsContainer = document.getElementById('selectedOptionsContainer');

    checkboxes.forEach(checkbox => {
      checkbox.addEventListener('change', updateSelectedOptions);
    });

    function updateSelectedOptions() {
      const selectedOptions = Array.from(checkboxes)
        .filter(checkbox => checkbox.checked)
        .map(checkbox => checkbox.id);

      displaySelectedOptions(selectedOptions);

        const activeColorSelect = document.querySelector('.colorpick.active');
        const categoryId = activeColorSelect.getAttribute('data-id');

      jQuery.ajax({
            type: 'POST',
            url: '<?php echo admin_url('admin-ajax.php'); ?>',
            data: {
                'action': 'indicus_color_filter',
                'term_ids': selectedOptions,
                'categoryId' : categoryId
            },
            success: function (response) {
                jQuery('.filter-result ul').html(response);
                jQuery('html, body').animate({
                   scrollTop: jQuery(".color-filter-result").offset().top - 50
                }, 50);
            },
            error: function (xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    }

    function displaySelectedOptions(selectedOptions) {
      selectedOptionsContainer.innerHTML = "";

      selectedOptions.forEach(option => {
        const optionElement = document.createElement('span');
        optionElement.textContent = option;

        const closeIcon = document.createElement('span');
        closeIcon.className = 'close-icon';
        closeIcon.textContent = ' × ';
        closeIcon.addEventListener('click', () => uncheckOption(option));

        optionElement.appendChild(closeIcon);
        selectedOptionsContainer.appendChild(optionElement);
      });
    }

    function uncheckOption(option) {
      const checkbox = document.getElementById(option);
      if (checkbox) {
        checkbox.checked = false;
        updateSelectedOptions();
      }
    }
  </script>
  <script type="text/javascript">
   $(function() {
     var list = $('.js-dropdown-list1');
     var link = $('.js-link1');
     link.click(function(e) {
       e.preventDefault();
       list.slideToggle(200);
     });
     list.find('.js-dropdown-list1 li').click(function() {
       link.html(text+icon);
       list.slideToggle(200);
       
     });
   });
</script>
  <script type="text/javascript">
   $(function() {
     var list = $('.js-dropdown-list');
     var link = $('.js-link');
     link.click(function(e) {
       e.preventDefault();
       list.slideToggle(200);
     });
     list.find('.js-dropdown-list li').click(function() {
       link.html(text+icon);
       list.slideToggle(200);
       
     });
   });
</script>
<?php
$content = ob_get_clean();
return $content;
}


function indicus_products_filter() {
    $term_ids = isset($_POST['term_ids']) ? $_POST['term_ids'] : array();
    $appterms = array();
    $typeterms = array();
    $surfaceterms = array();
    $finishterms = array();
    foreach ($term_ids as $term_name) {
        $all_terms = get_terms();
        foreach ($all_terms as $term) {
            if ($term->name === $term_name) {
                if ($term->taxonomy === 'application-area') {
                    $appterms[] = $term->term_id;
                } elseif ($term->taxonomy === 'product-type') {
                    $typeterms[] = $term->term_id;
                } elseif ($term->taxonomy === 'application-surface') {
                    $surfaceterms[] = $term->term_id;
                } elseif ($term->taxonomy === 'finish') {
                    $finishterms[] = $term->term_id;
                }
            }
        }
    }

    $all_empty = empty($appterms) && empty($typeterms) && empty($surfaceterms) && empty($finishterms);

    $args = array(
        'post_type' => 'product',
        'posts_per_page' => -1,
        'post_status' => 'publish',
    );

    $args['tax_query'] = array();

    if (!empty($appterms)) {
        $args['tax_query'][] = array(
            'taxonomy' => 'application-area',
            'field' => 'term_id',
            'terms' => $appterms,
        );
    }
    if (!empty($typeterms)) {
        $args['tax_query'][] = array(
            'taxonomy' => 'product-type',
            'field' => 'term_id',
            'terms' => $typeterms,
        );
    }
    if (!empty($surfaceterms)) {
        $args['tax_query'][] = array(
            'taxonomy' => 'application-surface',
            'field' => 'term_id',
            'terms' => $surfaceterms,
        );
    }
    if (!empty($finishterms)) {
        $args['tax_query'][] = array(
            'taxonomy' => 'finish',
            'field' => 'term_id',
            'terms' => $finishterms,
        );
    }
    
    if ($all_empty) {
        unset($args['tax_query']);
    }

    $product_query = new WP_Query($args);

    if ($product_query->have_posts()) {
        while ($product_query->have_posts()) {
            $product_query->the_post();
            $productid = get_the_ID();
            $title = get_the_title($productid);
            $url = get_permalink($productid);
            $excerpt = get_the_excerpt($productid);
            $image = get_the_post_thumbnail_url($productid);
            $sub_heading = get_field('sub_heading'); ?>
            <li class="singleproduct">
                
                <div class="arc-pro-inner">
                    <div class="arc-pro-imge">
                        <?php if($image){ ?>
                            <a href="<?php echo esc_url($url); ?>">
                            <img class="img-fluid" src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($title); ?>">
                            </a>
                        <?php } ?>
                    </div>
                    <div class="arc-pro-content">
                        <h4><a href="<?php echo esc_url($url); ?>"><?php echo esc_html($title); ?></a></h4>
                        <h5><?php echo $sub_heading; ?></h5><?php 
                        if(have_rows('features', $productid)) { ?>
                            <ul><?php 
                            while(have_rows('features', $productid)) { 
                                the_row();
                                $feature = get_sub_field('feature'); ?>
                                <li><?php echo $feature; ?></li><?php 
                            } ?>
                            </ul><?php 
                        } ?>
                        <a href="<?php echo esc_url($url); ?>" class="btn-fill">VIEW PRODUCT</a>
                    </div>
                   <!-- <div class="arc-back-content mobile-none">
                        <h3><?php //echo esc_html($title); ?></h3>
                        <p><?php //echo wp_trim_words($excerpt, 30, '.'); ?></p>
                        <a href="<?php //echo esc_url($url); ?>" class="btn-fill">VIEW PRODUCT</a>
                    </div> -->
                </div>
            </li>
            <?php
        }
        wp_reset_postdata();
    } else {
        echo 'No products found.';
    }

    wp_die();
}

add_action('wp_ajax_indicus_products_filter', 'indicus_products_filter');
add_action('wp_ajax_nopriv_indicus_products_filter', 'indicus_products_filter');