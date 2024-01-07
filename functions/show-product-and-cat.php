<?php
function show_sub_cats_in_listing_page($parent_category_slug, $js_class='get-product')
{
    $html = '<ul class="nav nav-tabs" role="tablist">';
    $taxonomy = 'mockup_category'; // Replace with your custom taxonomy name
    // $parent_category_slug = 'free-mockups'; // Replace with the slug of the parent category

    // Define the tax_query to retrieve child terms of the specified parent category
    $args = array(
        'taxonomy' => $taxonomy,
        'child_of' => 0, // Set to 0 to get top-level terms
        'parent' => get_term_by('slug', $parent_category_slug, $taxonomy)->term_id, // Get the parent term ID
        'hide_empty' => false, // Set to false to retrieve even if they are empty
    );

    $subcategories = get_terms($args);

    if (!empty($subcategories)) {
        $count = 0;
        $tmp_cat = [];
        foreach ($subcategories as $subcategory) {
            // term_id, slug
            $count++;
            if ($count <= 9) {
                $html .= '<li class="nav-item nav-link '.$js_class.'" page-no="1" role="presentation" cat-slug="' . $subcategory->slug . '">' . $subcategory->name . '</li>';
            } else {
                $tmp_cat[$subcategory->slug] = $subcategory->name;
            }
        }
        if (count($tmp_cat) == 1) {
            foreach ($tmp_cat as $cat_slug => $cat_name) {
                $html .= '<li class="nav-item nav-link '.$js_class.'" page-no="1" role="presentation" cat-slug="' . $cat_slug . '">' . $cat_name . '</li>';
            }
        } elseif (count($tmp_cat) > 1) {
            $count = 0;
            $html .= '
            <li class="nav-item" role="presentation">';
            foreach ($tmp_cat as $cat_slug => $cat_name) {
                $count++;
                if ($count == 1) {
                    $html .= '              <button
                class="nav-link '.$js_class.'" page-no="1"
                id="billboard_tab_free"
                data-bs-toggle="tab"
                data-bs-target="#billboard_free"
                type="button"
                role="tab"
                aria-controls="billboard_free"
                aria-selected="false"
                cat-slug="' . $cat_slug . '"
            >
                ' . $cat_name . '
            </button>
            <div class="dropdown">
                <button
                class="dropdown-toggle"
                type="button"
                data-bs-toggle="dropdown"
                aria-expanded="false"
                >
                <img src="' . get_template_directory_uri() . '/assets/images/tab_down_arrow.png" alt="" />
                </button>

                <ul class="dropdown-menu dropdown-menu-end">';
                } else {
                    $html .= '<li class="dropdown-item '.$js_class.'" page-no="1" cat-slug="' . $cat_slug . '">' . $cat_name . '</li>';
                }
            }
            $html .= ' </ul>
            </div>
        </li>';
        }
    } else {
        $html .= 'No subcategories found for ' . $parent_category_slug;
    }
    $html .= '</ul>';
    return $html;
}

function get_product_home_premium(){
    $term_slug = $_POST['term_slug'];
    $posts_per_page = $_POST['posts_per_page'];
    $page_no = $_POST['page_no'];
    $args = array(
        // 'post_type' => 'product', // Replace with the name of your CPT
        'posts_per_page' => $posts_per_page, // Number of posts to display (adjust as needed)
        'paged' => $page_no,
        'order' => 'DESC', // Sorting order (DESC for latest first, ASC for oldest first)
        'tax_query' => array(
            array(
                'taxonomy' => 'mockup_category', // Replace with the name of your custom category taxonomy
                'field' => 'slug', // You can use 'term_id', 'name', or 'slug'
                'terms' => $term_slug, // Replace with the slug of the custom category term you want to query
            ),
        ),
    );
    $custom_query = new WP_Query($args);

    if ($custom_query->have_posts()) {
        $html = '';
        while ($custom_query->have_posts()) {
            $custom_query->the_post();
            $thumbnail_url = get_the_post_thumbnail_url(get_the_ID());
            $_custom_product_gallery = get_post_meta(get_the_ID(), '_custom_product_gallery', true);
            $_custom_product_gallery = !empty($_custom_product_gallery) ? explode(',', $_custom_product_gallery) : array();
            $thumbnail_url2 = wp_get_attachment_image_url( $_custom_product_gallery[0],'full');
            $html .= '
            <div type="button" class="card_item premium-mockup-single" p-id="'.get_the_ID().'">
                <a href="'.get_the_permalink().'">
                    <div class="item_a">
                        <div class="inner_col">
                            <div class="img_col pixpine_card_border">
                                <img src="'.$thumbnail_url.'"
                                    img1="'.$thumbnail_url.'" 
                                    img2="'.$thumbnail_url2.'" 
                                    class="premium-img-hover-effect"
                                    alt="" />
                            </div>
                            <div class="text_col">
                                <h4 class="default_color">
                                '.get_the_title().'
                                </h4>
                                <p class="primary_color">Premium</p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>';
        }
    }else{
        $html = 'No product found';
    }
    echo $html;
    die();
}
add_action('wp_ajax_get_product_home_premium', 'get_product_home_premium'); // For logged-in users
add_action('wp_ajax_nopriv_get_product_home_premium', 'get_product_home_premium'); // For non-logged-in users




function get_product_home_free(){
    $term_slug = $_POST['term_slug'];
    $posts_per_page = $_POST['posts_per_page'];
    $page_no = $_POST['page_no'];
    $args = array(
        // 'post_type' => 'product', // Replace with the name of your CPT
        'posts_per_page' => $posts_per_page, // Number of posts to display (adjust as needed)
        'paged' => $page_no,
        'order' => 'DESC', // Sorting order (DESC for latest first, ASC for oldest first)
        'tax_query' => array(
            array(
                'taxonomy' => 'mockup_category', // Replace with the name of your custom category taxonomy
                'field' => 'slug', // You can use 'term_id', 'name', or 'slug'
                'terms' => $term_slug, // Replace with the slug of the custom category term you want to query
            ),
        ),
    );
    $custom_query = new WP_Query($args);

    if ($custom_query->have_posts()) {
        $html = '';
        while ($custom_query->have_posts()) {
            $custom_query->the_post();
            $thumbnail_url = get_the_post_thumbnail_url(get_the_ID());
        
            $html .= '
            <div class="card_item">
                <a href="'.get_the_permalink().'">
                    <div class="inner_col">
                        <div class="img_col pixpine_card_border">
                            <img src="'.$thumbnail_url.'" alt="" />
                        </div>
                        <div class="text_col">
                            <h4 class="default_color">'.get_the_title().'</h4>
                            <p class="primary_color">Free</p>
                        </div>
                    </div>
                </a>
            </div>';
        }
    }else{
        $html = 'No product found';
    }
    echo $html;
    die();
}
add_action('wp_ajax_get_product_home_free', 'get_product_home_free'); // For logged-in users
add_action('wp_ajax_nopriv_get_product_home_free', 'get_product_home_free'); // For non-logged-in users




function get_product_with_pagination()
{

    $term_slug = $_POST['term_slug'];
    $posts_per_page = $_POST['posts_per_page'];
    $page_no = $_POST['page_no'];
    $mockup_type = $_POST['mockup_type'];
    $html = '';
    if ($mockup_type == 'free-mockups') {
        $html .= '<div class="card_container row_d justify-content-center">';
        $args = array(
            // 'post_type' => 'product', // Replace with the name of your CPT
            'posts_per_page' => $posts_per_page, // Number of posts to display (adjust as needed)
            'paged' => $page_no,
            'order' => 'DESC', // Sorting order (DESC for latest first, ASC for oldest first)
            'tax_query' => array(
                array(
                    'taxonomy' => 'mockup_category', // Replace with the name of your custom category taxonomy
                    'field' => 'slug', // You can use 'term_id', 'name', or 'slug'
                    'terms' => $term_slug, // Replace with the slug of the custom category term you want to query
                ),
            ),
        );

        $custom_query = new WP_Query($args);

        if ($custom_query->have_posts()) {
            $count = 0;
            while ($custom_query->have_posts()) {
                $custom_query->the_post();
                $thumbnail_url = get_the_post_thumbnail_url(get_the_ID());
                // $thumbnail_url = get_the_post_thumbnail_url(get_the_ID(), 'thumbnail');
                $count++;
                if ($count == 1) {
                    $html .= '<div class="card_item get_off">
                            <div class="inner_col">
                            <div class="get_premium_mockups_section">
                                <div
                                class="premium_mockups_inner d-flex justify-content-between align-items-center"
                                >
                                <div class="premium_text">
                                    <h2
                                    class="section_heading section_heading_primary section_heading_bold"
                                    >
                                    Get 96% Off
                                    <span class="section_heading_medium default_color"
                                        >on premium mockups</span
                                    >
                                    </h2>
                                    <span class="primary_color"
                                    >As low as $0.14 a mockup</span
                                    >
                                    <a href="' . site_url('get-subscription') . '" class="btn_primary _btn"
                                    >Get premium</a
                                    >
                                </div>
                                </div>
                            </div>
                            </div>
                        </div>';
                } elseif ($count == 7) {
                    $html .= '<div class="card_item ad">
                                <div class="inner_col">
                                <img src="' . get_template_directory_uri() . '/assets/images/google_ad.png" alt="" />
                                </div>
                            </div>';
                } elseif ($count == 12) {
                    $html .= '<div class="card_item ad">
                                <div class="inner_col">
                                <img src="' . get_template_directory_uri() . '/assets/images/affiliate_ad_second.png" alt="" />
                                </div>
                            </div>';
                }

                $html .= '<div class="card_item">
                            <a href="' . get_the_permalink().'">
                                <div class="inner_col">
                                <div class="img_col pixpine_card_border">
                                    <img src="' . $thumbnail_url . '" alt="" />
                                </div>
                                <div class="text_col">
                                    <h4 class="default_color">' . get_the_title() . '</h4>
                                    <p class="primary_color">Free</p>
                                </div>
                                </div>
                            </a>
                        </div>';
            }
            // Restore the global post object
            wp_reset_postdata();
        } else {
            // No posts found
            $html .= 'No product found.';
        }

        $html .= '</div>';

        $current_page = $page_no;
        $total_page = $custom_query->max_num_pages;
        if($total_page > 1){
            $html .= get_pagination_html($current_page, $total_page, $term_slug);

            // $html .= '<nav aria-label="Page navigation example">
            // <ul class="pagination justify-content-center">';
            // if ($current_page != 1) {
            //     $html .= '<li class="page-item left_button get-product" cat-slug="'.$term_slug.'" page-no="'.($current_page-1).'">
            //                 <span class="page-link" >
            //                 <img src="' . get_template_directory_uri() . '/assets/images/pagination_left_icon.png" alt="" />
            //                 </span>
            //             </li>';
            // }


            // for ($i = -3; $i <= 3; $i++) {
            //     $page_no = $current_page + $i;
            //     if (($page_no > 0) && ($page_no <= $total_page)) {
            //         $html .= '<li class="page-item get-product" cat-slug="'.$term_slug.'" page-no="' . $page_no . '">
            //                     <span class="page-link" >' . $page_no . '</span>
            //                 </li>';
            //     }
            // }

            // if ($page_no < $total_page) {
            //     $html .= '<li class="page-item get-product" cat-slug="'.$term_slug.'" page-no="' . $total_page . '">
            //                 <span class="page-link" >...' . $total_page . '</span>
            //             </li>';
            // }

            // if ($current_page != $total_page) {
            //     $html .= '
            //         <li class="page-item right_button get-product" cat-slug="'.$term_slug.'" page-no="' . ($current_page + 1) . '" >
            //             <span class="page-link" >
            //             <img src="' . get_template_directory_uri() . '/assets/images/pagination_right_icon.png" alt="" />
            //             </span>
            //         </li>';
            // }
            // $html .= '</ul>
            //         </nav>';            
        }

    }elseif($mockup_type == 'premium-mockups'){
        $html .= '<div class="card_container row_d justify-content-center">';
        $args = array(
            // 'post_type' => 'product', // Replace with the name of your CPT
            'posts_per_page' => 20, // Number of posts to display (adjust as needed)
            'order' => 'DESC', // Sorting order (DESC for latest first, ASC for oldest first)
            'paged'=>$page_no,
            'tax_query' => array(
            array(
                'taxonomy' => 'mockup_category', // Replace with the name of your custom category taxonomy
                'field' => 'slug', // You can use 'term_id', 'name', or 'slug'
                'terms' => $term_slug, // Replace with the slug of the custom category term you want to query
            ),
            ),
        );

        $custom_query = new WP_Query($args);

        if ($custom_query->have_posts()) {
            $count = 0;
            while ($custom_query->have_posts()) {
            $custom_query->the_post();
            $thumbnail_url = get_the_post_thumbnail_url(get_the_ID());
            // $thumbnail_url = get_the_post_thumbnail_url(get_the_ID(), 'thumbnail');
            $_custom_product_gallery = get_post_meta(get_the_ID(), '_custom_product_gallery', true);
            $_custom_product_gallery = !empty($_custom_product_gallery) ? explode(',', $_custom_product_gallery) : array();
            $thumbnail_url2 = wp_get_attachment_image_url( $_custom_product_gallery[0],'full');


            $html .= '<div class="card_item">
                        <a href="' . get_the_permalink().'">
                            <div class="item_a">
                                <div class="inner_col">
                                    <div class="img_col pixpine_card_border">
                                    <img src="'.$thumbnail_url.'" 
                                    img1="'.$thumbnail_url.'" 
                                    img2="'.$thumbnail_url2.'" 
                                    class="premium-img-hover-effect" 
                                    alt="" />
                                    </div>
                                    <div class="text_col">
                                    <h4 class="default_color">'.get_the_title().'</h4>
                                    <p class="primary_color">Premium</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>';

        }
        wp_reset_postdata();
        } else {
            $html .= 'No product found.';
        }
        

        $html .= '</div>';

        $current_page = 1;
        $total_page = $custom_query->max_num_pages;
        if($total_page > 1){
            $html .= get_pagination_html($current_page, $total_page, $term_slug);
        } 
    }elseif($mockup_type == 'bundle-mockups'){
        $html .= '<div class="card_container row_d">';

        $args = array(
        //   'post_type' => 'product', // Replace with the name of your CPT
          'posts_per_page' => 20, // Number of posts to display (adjust as needed)
          'paged' => $page_no,
          'order' => 'DESC', // Sorting order (DESC for latest first, ASC for oldest first)
          'tax_query' => array(
            array(
                'taxonomy' => 'mockup_category', // Replace with the name of your custom category taxonomy
                'field' => 'slug', // You can use 'term_id', 'name', or 'slug'
                'terms' => $term_slug, // Replace with the slug of the custom category term you want to query
            ),
          ),
        );
  
        $custom_query = new WP_Query($args);
  
        if ($custom_query->have_posts()) {
          $count = 0;
          while ($custom_query->have_posts()) {
            $custom_query->the_post();
            $thumbnail_url = get_the_post_thumbnail_url(get_the_ID());
            // $thumbnail_url = get_the_post_thumbnail_url(get_the_ID(), 'thumbnail');
            $html .= '<div class="card_item">
                        <a href="' . get_the_permalink().'">
                            <div class="inner_col">
                                <div class="img_col pixpine_card_border">
                                <img src="'.$thumbnail_url.'" alt="" />
                                </div>
                                <div class="text_col">
                                <h4 class="default_color">
                                '.get_the_title().'
                                </h4>
                                <p class="primary_color">Bundle</p>
                                </div>
                            </div>
                        </a>
                    </div>';
          }
          // Restore the global post object
          wp_reset_postdata();
        } else {
          // No posts found
          $html .= 'No posts found.';
        }  
        $html .= '</div>';

        $current_page = $page_no;
        $total_page = $custom_query->max_num_pages;
        if($total_page > 1){
            $html .= get_pagination_html($current_page, $total_page, $term_slug);
        }
    }
    
    echo $html;
    die();
}
add_action('wp_ajax_get_product_with_pagination', 'get_product_with_pagination'); // For logged-in users
add_action('wp_ajax_nopriv_get_product_with_pagination', 'get_product_with_pagination'); // For non-logged-in users


function get_pagination_html($current_page, $total_page, $term_slug){

    $html = '<nav aria-label="Page navigation example">
    <ul class="pagination justify-content-center">';

        if($current_page != 1){
        
            $html .= '<li class="page-item left_button get-product" cat-slug="'.$term_slug.'" page-no="'.($current_page-1).'">
        <span class="page-link" >
            <img src="'.get_template_directory_uri().'/assets/images/pagination_left_icon.png" alt="" />
        </span>
        </li>';
        }

        
        for($i=-3; $i<=3; $i++){
        $page_no = $current_page+$i;
        if(($page_no>0) && ($page_no<=$total_page)){
            $html .= '<li class="page-item get-product" cat-slug="'.$term_slug.'" page-no="'.$page_no.'">
        <span class="page-link" >'.$page_no.'</span>
        </li>';
        } } 
        if($page_no < $total_page){ 
            $html .= '<li class="page-item get-product" cat-slug="'.$term_slug.'" page-no="'.$total_page.'">
        <span class="page-link" >...'.$total_page.'</span>
        </li>';
        } 
        if($current_page != $total_page){
            $html .= '<li class="page-item right_button get-product" cat-slug="'.$term_slug.'" page-no="'.($current_page+1).'">
        <span class="page-link" >
            <img src="'.get_template_directory_uri().'/assets/images/pagination_right_icon.png" alt="" />
        </span>
        </li>';
        }
        $html .= '</ul>
    </nav>';
    return $html;
}


function pixpine_get_html_download_link() {
    // Verify the nonce
    if (isset($_POST['nonce']) && wp_verify_nonce($_POST['nonce'], 'ajax_nonce')) {
        // Nonce is valid, process the AJAX request
        $post_id = $_POST['postId'];
        $link = get_post_meta($post_id, 'download_link', true);
        echo '<a href="'.$link.'" download="pixpine"><button class="_btn btn_primary">DOWNLOAD</button></a>';
    } else {
        // Nonce is not valid, reject the request
        echo 'Nonce verification failed.';
    }

    wp_die(); // This is required to end the AJAX request
}
add_action('wp_ajax_pixpine_get_html_download_link', 'pixpine_get_html_download_link'); // For logged-in users
add_action('wp_ajax_nopriv_pixpine_get_html_download_link', 'pixpine_get_html_download_link'); // For non-logged-in users



// function paginate_search_product($type, $search_keyword, $cat_slug, $per_page, $page_no, $html_output_class, $current_page, $total_page){
//     $html = '';
//     if($total_page > 1){

//         $html .= '<nav aria-label="Page navigation example">
//             <ul class="pagination justify-content-center">';
//             if($current_page != 1){
//                 $html .= '<li class="page-item left_button get-product" cat-slug="free-mockups" page-no="'.($current_page-1).'">
//                 <span class="page-link" >
//                 <img src="'.get_template_directory_uri().'/assets/images/pagination_left_icon.png" alt="" >
//                 </span>
//             </li>';
//         } 
//         for($i=-3; $i<=3; $i++){
//             $page_no = $current_page+$i;
//             if(($page_no>0) && ($page_no<=$total_page)){
//                 $html .= '<li class="page-item get-product" cat-slug="free-mockups" page-no="'.$page_no.'">
//                             <span class="page-link" >'.$page_no.'</span>
//                         </li>';
//             } 
//         }
//         if($page_no < $total_page){ 

//             $html .= '<li class="page-item get-product" cat-slug="free-mockups" page-no="'.$total_page.'">
//                 <span class="page-link" >...'.$total_page.'</span>
//             </li>';
//         } 
//       if($current_page != $total_page){

//         $html .= '<li class="page-item right_button get-product" cat-slug="free-mockups" page-no="'.($current_page+1).'">
//         <span class="page-link" >
//           <img src="'.get_template_directory_uri().'/assets/images/pagination_right_icon.png" alt="" />
//         </span>
//       </li>';
//       }
//       $html .= '    </ul>
//                 </nav>';
//     } 
//     echo $html;
//     die();
// }


/**
 * Ajax template 
 */
// function my_custom_action() {
//     // Verify the nonce
//     if (isset($_POST['nonce']) && wp_verify_nonce($_POST['nonce'], 'ajax_nonce')) {
//         // Nonce is valid, process the AJAX request
//         // Your PHP logic here
//         $response = 'Abir is the best.';
//         echo $response;
//     } else {
//         // Nonce is not valid, reject the request
//         echo 'Nonce verification failed.';
//     }

//     wp_die(); // This is required to end the AJAX request
// }
// add_action('wp_ajax_my_custom_action', 'my_custom_action'); // For logged-in users
// add_action('wp_ajax_nopriv_my_custom_action', 'my_custom_action'); // For non-logged-in users


function show_pagination_search_page($current_page, $total_page, $current_link_without_page_no){
    ?>
    <nav aria-label="Page navigation example">
    <ul class="pagination justify-content-center">
      <?php 
      if($current_page != 1){
      ?>
      <a href="<?php echo $current_link_without_page_no.($current_page-1);?>">
        <li class="page-item left_button get-product" cat-slug="free-mockups" page-no="<?php echo $current_page-1;?>">
          <span class="page-link" >
            <img src="<?php echo get_template_directory_uri();?>/assets/images/pagination_left_icon.png" alt="" />
          </span>
        </li>
      </a>
      <?php } ?>

      <?php
      for($i=-3; $i<=3; $i++){
        $page_no = $current_page+$i;
        if(($page_no>0) && ($page_no<=$total_page)){
      ?>
      <a href="<?php echo $current_link_without_page_no.$page_no;?>">
        <li class="page-item get-product" cat-slug="free-mockups" page-no="<?php echo $page_no;?>">
          <span class="page-link" ><?php echo $page_no;?></span>
        </li>
      </a>
      <?php } } ?>
      <?php 
      if($page_no < $total_page){ 
      ?>
      <a href="<?php echo $current_link_without_page_no.$total_page;?>">
        <li class="page-item get-product" cat-slug="free-mockups" page-no="<?php echo $total_page;?>">
          <span class="page-link" >...<?php echo $total_page;?></span>
        </li>
      </a>
      <?php } ?>
      <?php 
      if($current_page != $total_page){
      ?>
      <a href="<?php echo $current_link_without_page_no.($current_page+1);?>">
        <li class="page-item right_button get-product" cat-slug="free-mockups" page-no="<?php echo $current_page+1;?>">
          <span class="page-link" >
            <img src="<?php echo get_template_directory_uri();?>/assets/images/pagination_right_icon.png" alt="" />
          </span>
        </li>
      </a>
      <?php } ?>
    </ul>
  </nav>
  <?php
}