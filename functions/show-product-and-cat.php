<?php
function show_sub_cats_in_listing_page($parent_category_slug){
    $html='<ul class="nav nav-tabs" role="tablist">';
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
            if($count <=9){
            $html.= '<li class="nav-item nav-link" role="presentation" cat-id="'.$subcategory->term_id.'">'.$subcategory->name.'</li>';                  
            }else{
            $tmp_cat[$subcategory->term_id] = $subcategory->name;
            }
        }
        if(count($tmp_cat)==1){
            foreach ($tmp_cat as $cat_id => $cat_name) {
            $html.= '<li class="nav-item nav-link" role="presentation">'.$cat_name.'</li>';  
            }
        }elseif(count($tmp_cat)>1){
            $count = 0;
            $html.= '
            <li class="nav-item" role="presentation">';
            foreach ($tmp_cat as $cat_id => $cat_name) {
            $count++;
            if($count==1){
                $html.= '              <button
                class="nav-link"
                id="billboard_tab_free"
                data-bs-toggle="tab"
                data-bs-target="#billboard_free"
                type="button"
                role="tab"
                aria-controls="billboard_free"
                aria-selected="false"
            >
                '.$cat_name.'
            </button>
            <div class="dropdown">
                <button
                class="dropdown-toggle"
                type="button"
                data-bs-toggle="dropdown"
                aria-expanded="false"
                >
                <img src="'.get_template_directory_uri().'/assets/images/tab_down_arrow.png" alt="" />
                </button>

                <ul class="dropdown-menu dropdown-menu-end">';
            }else{
                $html.= '<li class="dropdown-item">'.$cat_name.'</li>';
            } 
            }
            $html.= ' </ul>
            </div>
        </li>';
        }
    } else {
        $html.= 'No subcategories found for ' . $parent_category_slug;
    }
    $html.= '</ul>';
    return $html;
}


function get_product_with_pagination(){
    // Replace these with your specific details
    $taxonomy = 'mockup_category'; // Replace with your custom taxonomy name
    $post_type = 'product'; // Replace with the name of your CPT
    // $term_id = 123; // Replace with the ID of the term you want to filter by
    // $posts_per_page = 10; // Number of posts per page
    // $page_no = (get_query_var('paged')) ? get_query_var('paged') : 1; // Get the current page number
    $term_slug = $_POST['term_slug'];
    $posts_per_page = $_POST['posts_per_page'];
    $page_no = $_POST['page_no'];

    $args = array(
        'post_type' => $post_type,
        'posts_per_page' => $posts_per_page,
        'paged' => $page_no,
        'tax_query' => array(
            array(
                'taxonomy' => $taxonomy,
                'field' => 'slug',
                'terms' => $term_slug,
            ),
        ),
    );

    $custom_query = new WP_Query($args);

    if ($custom_query->have_posts()) {
        $post_array = [];
        while ($custom_query->have_posts()) {
            $custom_query->the_post();

            $thumbnail_url = get_the_post_thumbnail_url(get_the_ID(), 'thumbnail');
            $post_array[get_the_ID()] = ['title'=>get_the_title(), 'img'=>$thumbnail_url];

        }
        $output = [];
        $output['product'] = $post_array;
        $output['total_page'] = $custom_query->max_num_pages;
        echo json_encode($output);

        // Restore the global post object
        wp_reset_postdata();

    } else {
        $output = [];
        echo json_encode($output);
    }
    die();
}
add_action('wp_ajax_get_product_with_pagination', 'get_product_with_pagination'); // For logged-in users
add_action('wp_ajax_nopriv_get_product_with_pagination', 'get_product_with_pagination'); // For non-logged-in users



/**
 * Ajax template 
 */
// function my_custom_action_callback() {
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
// add_action('wp_ajax_my_custom_action', 'my_custom_action_callback'); // For logged-in users
// add_action('wp_ajax_nopriv_my_custom_action', 'my_custom_action_callback'); // For non-logged-in users
