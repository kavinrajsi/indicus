<?php get_header(); 

$dskimg = get_field('desktop_banner', 'option');
$mobimage = get_field('mobile_banner', 'option');
$title = get_field('filter_title', 'option');
$subtitle = get_field('filter_subtitle', 'option');

?>
<section class="simple-banner archive-product-hero">
    <div class="banner-bg">
        <?php if($mobimage){ ?>
            <img decoding="async" src="<?php echo $mobimage; ?>" alt="" class="mobile-img">
        <?php } if($dskimg){ ?>
            <img decoding="async" src="<?php echo $dskimg; ?>" alt="" class="desktop-img">
        <?php } ?>
    </div>
</section>
<div>
<div class="bottom-filter arc-products">
    <div class="max-container">
        <?php if($title){ ?>
            <h1 class="font-32"><?php echo $title; ?></h1>
        <?php } if($subtitle){ ?>
            <h5 class="text-center"><?php echo $subtitle; ?></h5>
        <?php } ?>
        
    </div>
</div>

<div class="pro-filter-sticky bottom-filter arc-products pt-0">
    <div class="max-container">
        <form>
            <div class="color-main-filter">
                <label class="filter-cp-click">
                    <span class="desktop-none">Filter</span>
                    <div class="top-mob-fil">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="22" viewBox="0 0 20 22" fill="none" class="mobile-none">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M0.25 1.25C0.25 1.05109 0.329018 0.860322 0.46967 0.71967C0.610322 0.579018 0.801088 0.5 1 0.5H19C19.1989 0.5 19.3897 0.579018 19.5303 0.71967C19.671 0.860322 19.75 1.05109 19.75 1.25V4.25C19.75 4.43496 19.6816 4.61339 19.558 4.751L13 12.038V19.25C12.9999 19.4073 12.9503 19.5607 12.8582 19.6883C12.7661 19.8159 12.6363 19.9113 12.487 19.961L7.987 21.461C7.87431 21.4985 7.75432 21.5088 7.6369 21.4909C7.51948 21.4729 7.408 21.4274 7.31162 21.358C7.21525 21.2886 7.13674 21.1972 7.08257 21.0915C7.02839 20.9858 7.00009 20.8688 7 20.75V12.038L0.442 4.751C0.318412 4.61339 0.250033 4.43496 0.25 4.25V1.25ZM1.75 2V3.962L8.308 11.249C8.43159 11.3866 8.49997 11.565 8.5 11.75V19.709L11.5 18.71V11.75C11.5 11.565 11.5684 11.3866 11.692 11.249L18.25 3.962V2H1.75Z" fill="#1E1E1E"/>
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="11" viewBox="0 0 18 11" fill="none" class="desktop-none">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M6 9.75C6 9.55109 6.07902 9.36032 6.21967 9.21967C6.36032 9.07902 6.55109 9 6.75 9H11.25C11.4489 9 11.6397 9.07902 11.7803 9.21967C11.921 9.36032 12 9.55109 12 9.75C12 9.94891 11.921 10.1397 11.7803 10.2803C11.6397 10.421 11.4489 10.5 11.25 10.5H6.75C6.55109 10.5 6.36032 10.421 6.21967 10.2803C6.07902 10.1397 6 9.94891 6 9.75ZM3 5.25C3 5.05109 3.07902 4.86032 3.21967 4.71967C3.36032 4.57902 3.55109 4.5 3.75 4.5H14.25C14.4489 4.5 14.6397 4.57902 14.7803 4.71967C14.921 4.86032 15 5.05109 15 5.25C15 5.44891 14.921 5.63968 14.7803 5.78033C14.6397 5.92098 14.4489 6 14.25 6H3.75C3.55109 6 3.36032 5.92098 3.21967 5.78033C3.07902 5.63968 3 5.44891 3 5.25ZM0 0.75C0 0.551088 0.0790178 0.360322 0.21967 0.21967C0.360322 0.0790178 0.551088 0 0.75 0H17.25C17.4489 0 17.6397 0.0790178 17.7803 0.21967C17.921 0.360322 18 0.551088 18 0.75C18 0.948912 17.921 1.13968 17.7803 1.28033C17.6397 1.42098 17.4489 1.5 17.25 1.5H0.75C0.551088 1.5 0.360322 1.42098 0.21967 1.28033C0.0790178 1.13968 0 0.948912 0 0.75Z" fill="black"/>
                        </svg>
                    </div>
                </label>
                <div class="filter-list-main">
                    <h4 class="desktop-none">Filter</h4>

                    <?php
                        $terms = get_terms(array(
                            'taxonomy' => 'application-area',
                            'hide_empty' => false,
                        )); 

                    if (!empty($terms)) { ?>
                        <div class="dropdown">
                            <a href="javascript:void(0)" class="js-link">Application Area <i class="fa fa-chevron-down"></i></a>
                            <ul class="js-dropdown-list checkbox-container">
                            <?php
                            foreach ($terms as $term) {
                                $term_id = $term->term_id;
                                $term_name = $term->name; ?>
                                <li>
                                    <input type="checkbox" id="<?php echo esc_attr($term_name); ?>" value="<?php echo esc_attr($term_id); ?>">
                                    <label for="<?php echo esc_attr($term_name); ?>"><?php echo esc_html($term_name); ?></label>
                                </li>
                                <?php
                            } ?>

                            </ul>
                        </div>
                    <?php } ?>

                    <?php
                        $prtypes = get_terms(array(
                            'taxonomy' => 'product-type',
                            'hide_empty' => false,
                        )); 

                    if (!empty($prtypes)) { ?>
                        <div class="dropdown">
                            <a href="javascript:void(0)" class="js-link1">Product Type <i class="fa fa-chevron-down"></i></a>
                            <ul class="js-dropdown-list1 checkbox-container">
                                <?php
                                foreach ($prtypes as $prterm) {
                                    $prterm_id = $prterm->term_id;
                                    $prterm_name = $prterm->name; ?>
                                     <li>
                                        <input type="checkbox" id="<?php echo esc_attr($prterm_name); ?>" value="<?php echo esc_attr($prterm_id); ?>">
                                        <label for="<?php echo esc_attr($prterm_name); ?>"><?php echo esc_attr($prterm_name); ?></label>
                                     </li>
                                    <?php 
                                } ?>
                            </ul>
                        </div>
                    <?php } ?>

                    <?php
                        $surfaces = get_terms(array(
                            'taxonomy' => 'application-surface',
                            'hide_empty' => false,
                        )); 

                    if (!empty($surfaces)) { ?>
                        <div class="dropdown">
                            <a href="javascript:void(0)" class="js-link2">Application Surface <i class="fa fa-chevron-down"></i></a>
                            <ul class="js-dropdown-list2 checkbox-container">
                            <?php
                            foreach ($surfaces as $surface) {
                                $surface_id = $surface->term_id;
                                $surface_name = $surface->name; ?>
                                 <li>
                                    <input type="checkbox" id="<?php echo esc_attr($surface_name); ?>" value="<?php echo esc_attr($surface_id); ?>">
                                    <label for="<?php echo esc_attr($surface_name); ?>"><?php echo esc_attr($surface_name); ?></label>
                                 </li>
                            <?php } ?>
                            </ul>
                        </div>
                    <?php } ?>

                    <?php
                        $finishs = get_terms(array(
                            'taxonomy' => 'finish',
                            'hide_empty' => false,
                        )); 

                    if (!empty($finishs)) { ?>
                    <div class="dropdown">
                        <a href="javascript:void(0)" class="js-link3">Finish <i class="fa fa-chevron-down"></i></a>
                        <ul class="js-dropdown-list3 checkbox-container">
                             <?php
                            foreach ($finishs as $finish) {
                                $finish_id = $finish->term_id;
                                $finish_name = $finish->name; ?>
                                 <li>
                                    <input type="checkbox" id="<?php echo esc_attr($finish_name); ?>" value="<?php echo esc_attr($finish_id); ?>">
                                    <label for="<?php echo esc_attr($finish_name); ?>"><?php echo esc_attr($finish_name); ?></label>
                                 </li>

                     <?php } ?>
                        </ul>
                    </div>
                <?php } ?>

                    <div class="mob-bottom-fil-btn desktop-none">
                        <a class="btn-fill clear-product-filter">Clear All</a>
                        <a class="btn-fill">Apply</a>
                    </div>
                </div>
            </div>
            <div class="selected-options" id="selectedOptionsContainer"></div>
        </form>
    </div>
</div>

<section class="bottom-arc-product">
    <div class="max-container">
        <ul id="products" class="arc-pro-lists">
        <?php 
            $args = array(
                'post_type' => 'product',
                'posts_per_page' => -1,
                'post_status' => 'publish',
				'orderby' => 'date',
				'order'   => 'DESC',
            );

            $products = get_posts($args);

            if ($products) {
                foreach ($products as $post) {
                    setup_postdata($post);

                    $title = get_the_title();
                    $url = get_permalink();
                    $image = get_the_post_thumbnail_url();
                    $sub_heading = get_field('sub_heading'); ?>
                    <li class="singleproduct">
                        
                        <div class="arc-pro-inner">
                            <div class="arc-pro-imge">
                                <?php if($image){ ?>
                                    <img class="img-fluid" src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($title); ?>">
                                <?php } ?>
                            </div>
                            <div class="arc-pro-content">
                                <h4><a href="<?php echo esc_url($url); ?>"><?php echo esc_html($title); ?></a></h4>
                                <h5><?php echo $sub_heading; ?></h5><?php 
                                if(have_rows('features')) { ?>
                                    <ul><?php 
                                    while(have_rows('features')) { 
                                        the_row();
                                        $feature = get_sub_field('feature'); ?>
                                        <li><?php echo $feature; ?></li><?php 
                                    } ?>
                                    </ul><?php 
                                } ?>
                                <a href="<?php echo esc_url($url); ?>" class="btn-fill desktop-none">VIEW PRODUCT</a>
                            </div>

                            <div class="arc-back-content mobile-none">
                                <h3><?php echo esc_html($title); ?></h3>
                                <p><?php echo wp_trim_words(get_the_excerpt(), 30, '.'); ?></p>
                                <a href="<?php echo esc_url($url); ?>" class="btn-fill">VIEW PRODUCT</a>
                            </div>
                        </div>
                    </li>
                    <?php
                }

                wp_reset_postdata();
            } else {
                echo 'No products found.';
            }
        ?>
        </ul>
    </div>
</section>
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

        jQuery.ajax({
            type: 'POST',
            url: '<?php echo admin_url('admin-ajax.php'); ?>',
            data: {
                'action': 'indicus_products_filter',
                'term_ids': selectedOptions,
            },
            success: function (response) {
                jQuery('#products').html(response);
                jQuery('html, body').animate({
                   scrollTop: $(".arc-products").offset().top - 50
                }, 500);
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
    $(function() {
        var list = $('.js-dropdown-list2');
        var link = $('.js-link2');
        link.click(function(e) {
            e.preventDefault();
            list.slideToggle(200);
        });
        list.find('.js-dropdown-list2 li').click(function() {
            link.html(text+icon);
            list.slideToggle(200);
        });
    });
    $(function() {
        var list = $('.js-dropdown-list3');
        var link = $('.js-link3');
        link.click(function(e) {
            e.preventDefault();
            list.slideToggle(200);
        });
        list.find('.js-dropdown-list3 li').click(function() {
            link.html(text+icon);
            list.slideToggle(200);
        });
    });
</script>

<?php get_footer(); ?>
