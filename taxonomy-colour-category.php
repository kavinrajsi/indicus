<?php get_header();
$current_category_id = get_queried_object_id(); ?>

<section class="simple-banner">
   <div class="banner-bg">
        <img decoding="async" src="<?php echo esc_url(get_field('banner_image', 'option')['url']); ?>" alt="" class="mobile-img">
        <img decoding="async" src="<?php echo esc_url(get_field('mobile_image', 'option')['url']); ?>" alt="" class="desktop-img">
   </div>
   <div class="container z-9">
       <div class="simple-banner-text">
            <h1><?php echo esc_html(get_field('heading', 'option')); ?></h1><?php
            $link = get_field('button', 'option');
            if ($link) : ?>
                <a class="elementor-button elementor-button-link elementor-size-sm" href="<?php echo esc_url($link['url']); ?>" target="<?php echo esc_attr($link['target']); ?>"><?php echo esc_html($link['title']); ?></a><?php
            endif; ?>
        </div>
   </div>
</section>

<section class="category-filters-sec">
    <div class="container">
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
        <div class="bottom-filter" >
            <h3><?php echo single_cat_title(); ?></h3>
            <form>
                <div class="color-main-filter" >
                    <label>Filter</label>
                    <div class="filter-list-main">
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
                                            <input class="temp" type="checkbox" id="<?php echo esc_html($term->name); ?>" data-id="<?php echo esc_attr($terms->term_id); ?>" data-name=" <?php echo esc_html($term->name); ?>">
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
                   </div>
                </div>
                <div class="selected-options" id="selectedOptionsContainer"></div>
            </form>
        </div>
        <div class="filter-result">
            <div class="colour-main-outer">
                <ul><?php
                    $args = array(
                        'post_type'      => 'color',
                        'posts_per_page' => -1,
                        'tax_query'      => array(
                            array(
                                'taxonomy' => 'colour-category',
                                'field'    => 'term_id',
                                'terms'    => $current_category_id,
                            ),
                        ),
                    );
                    $color_query = new WP_Query($args);
                    if ($color_query->have_posts()) :
                        while ($color_query->have_posts()) : $color_query->the_post();
                            $colorid= get_the_ID();
                            $colorselcet = get_post_meta($colorid, 'color_code', true); 
                            ?>
                           <li>
                               <div>
                                   <div class="color-box" style="background-color: <?php echo ($colorselcet); ?>;"></div>
                                   <span class="color-name"><?php the_title(); ?></span>
                               </div>
                           </li><?php
                        endwhile;
                        wp_reset_postdata();
                    else :
                        echo '<li>No colors found</li>';
                    endif; ?>
                </ul>
            </div>
        </div>
   </div>
</section>

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

        const activeColorSelect = document.querySelector('.colorselect.active');
        const categoryId = activeColorSelect.getAttribute('data-id');

      jQuery.ajax({
            type: 'POST',
            url: '<?php echo admin_url('admin-ajax.php'); ?>',
            data: {
                'action': 'indicus_color_categories_filter',
                'term_ids': selectedOptions,
                'categoryId' : categoryId
            },
            success: function (response) {
                jQuery('.filter-result ul').html(response);
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
<?php get_footer(); ?>