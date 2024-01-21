<?php









// Admin panel
// Hook into the wp_terms_checklist_args filter
add_filter('wp_terms_checklist_args', 'custom_taxonomy_term_order');

function custom_taxonomy_term_order($args) {
    // Replace 'your_custom_taxonomy' with the name of your custom taxonomy
    if ($args['taxonomy'] === 'general_category') {
        // Modify the orderby parameter to 'term_order' to order by the custom term_order field
        $args['orderby'] = 'term_order';
        // $args['order'] = 'ASC'; // Change to 'DESC' for descending order
    }
    return $args;
}
function pixpine_subscription_details($subscription_id){
     require_once get_template_directory() . '/stripe/StripeHelper.php'; 
     $stripeHelper = new StripeHelper();
    $stripe = $stripeHelper->stripeClient;
    try {
    // Use your $stripeHelper class to retrieve the subscription information
    $subscription = $stripeHelper->retrieve($subscription_id);

    if ($subscription) {
        // Get the subscription's current period start and end dates
        $start_date = date('Y-m-d', $subscription->current_period_start);
        $end_date = date('Y-m-d', $subscription->current_period_end);

        $data['start_date']=$start_date;
       $data['end_date']= $end_date;
    } else {
        $data['error']= "Subscription not found or an error occurred.";
    }
} catch (\Stripe\Exception\CardException $e) {
    $data['error']= 'Error: ' . $e->getMessage();
} catch (\Stripe\Exception\RateLimitException $e) {
    $data['error']= 'Error: ' . $e->getMessage();
} catch (\Stripe\Exception\InvalidRequestException $e) {
    $data['error']= 'Error: ' . $e->getMessage();
} catch (\Stripe\Exception\AuthenticationException $e) {
   $data['error']= 'Error: ' . $e->getMessage();
} catch (\Stripe\Exception\ApiConnectionException $e) {
   $data['error']= 'Error: ' . $e->getMessage();
} catch (\Stripe\Exception\ApiErrorException $e) {
    $data['error']= 'Error: ' . $e->getMessage();
}
    return $data;
}
/**
 * Drag and drop category - general_category - Ends
 */



/**
 * subscribers
 */
// create table
function create_custom_table() {
    global $wpdb;
    $charset_collate = $wpdb->get_charset_collate();
    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );


    $table_name = $wpdb->prefix . 'email_subscribers';
    $table_exists = $wpdb->get_var("SHOW TABLES LIKE '$table_name'") === $table_name;
    if (!$table_exists) {
        $sql = "CREATE TABLE $table_name (
            id INT(11) NOT NULL AUTO_INCREMENT,
            user_email VARCHAR(255) DEFAULT NULL,
            created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
            PRIMARY KEY (id)
        ) $charset_collate;";
        dbDelta( $sql );
    }


    $table_name = $wpdb->prefix . 'pixpine_payment_details';
    $table_exists = $wpdb->get_var("SHOW TABLES LIKE '$table_name'") === $table_name;
    if (!$table_exists) {
        $sql = "CREATE TABLE $table_name (
            id INT(11) NOT NULL AUTO_INCREMENT,
            payment_method VARCHAR(255) DEFAULT NULL,
            tnx_id VARCHAR(255) DEFAULT NULL,
            amount VARCHAR(255) DEFAULT NULL,
            payment_for VARCHAR(255) DEFAULT NULL,
            created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
            updated_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
            PRIMARY KEY (id)
        ) $charset_collate;";
        dbDelta( $sql );
    }


    $table_name = $wpdb->prefix . 'pixpine_orders';
    $table_exists = $wpdb->get_var("SHOW TABLES LIKE '$table_name'") === $table_name;
    if (!$table_exists) {
        $t1 = $wpdb->prefix."users";
        $t2 = $wpdb->prefix."pixpine_payment_details";
        $sql = "CREATE TABLE $table_name (
            id INT(11) NOT NULL AUTO_INCREMENT,
            user_id INT(11) DEFAULT NULL,
            item_number INT(11) DEFAULT NULL,
            receiver_email VARCHAR(255) DEFAULT NULL,
            payment_info longtext DEFAULT NULL,
            payment_status VARCHAR(255) DEFAULT NULL,
            pixpine_payment_detail_id INT(11) DEFAULT NULL,
            total_price VARCHAR(255) DEFAULT NULL,
            created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
            updated_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
            PRIMARY KEY (id)
            -- FOREIGN KEY (user_id) REFERENCES $t1(ID),
            -- FOREIGN KEY (pixpine_payment_detail_id) REFERENCES $t2(id)
        ) $charset_collate;";
        update_option('sql', $sql);
        dbDelta( $sql );
    }

    

    $table_name = $wpdb->prefix . 'pixpine_order_items';
    $table_exists = $wpdb->get_var("SHOW TABLES LIKE '$table_name'") === $table_name;
    if (!$table_exists) {
        $t1 = $wpdb->prefix."pixpine_orders";
        $t2 = $wpdb->prefix."posts";
        $sql = "CREATE TABLE $table_name (
            id INT(11) NOT NULL AUTO_INCREMENT,
            pixpine_order_id INT(11) DEFAULT NULL,
            product_id INT(11) DEFAULT NULL,
            user_id INT(11) DEFAULT NULL,
            price VARCHAR(255) DEFAULT NULL,
            product_name VARCHAR(255) DEFAULT NULL,
            created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
            updated_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
            PRIMARY KEY (id)
            -- FOREIGN KEY (pixpine_order_id) REFERENCES $t1(id),
            -- FOREIGN KEY (product_id) REFERENCES $t2(ID)
        ) $charset_collate;";
        dbDelta( $sql );
    }


    
    $table_name = $wpdb->prefix . 'pixpine_subscription_downloaded_items';
    $table_exists = $wpdb->get_var("SHOW TABLES LIKE '$table_name'") === $table_name;
    if (!$table_exists) {
        $sql = "CREATE TABLE $table_name (
            id INT(11) NOT NULL AUTO_INCREMENT,
            product_id INT(11) DEFAULT NULL,
            user_id INT(11) DEFAULT NULL,
            product_name VARCHAR(255) DEFAULT NULL,
            created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
            updated_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
            PRIMARY KEY (id)
            -- FOREIGN KEY (pixpine_order_id) REFERENCES $t1(id),
            -- FOREIGN KEY (product_id) REFERENCES $t2(ID)
        ) $charset_collate;";
        dbDelta( $sql );
    }
    
    $table_name = $wpdb->prefix . 'pixpine_carts';
    $table_exists = $wpdb->get_var("SHOW TABLES LIKE '$table_name'") === $table_name;
    if (!$table_exists) {
        $t1 = $wpdb->prefix."users";
        $t2 = $wpdb->prefix."posts";
        $sql = "CREATE TABLE $table_name (
            id INT(11) NOT NULL AUTO_INCREMENT,
            user_id INT(11) DEFAULT NULL,
            product_id INT(11) DEFAULT NULL,
            created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
            updated_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
            PRIMARY KEY (id)
            -- FOREIGN KEY (user_id) REFERENCES $t1(ID),
            -- FOREIGN KEY (product_id) REFERENCES $t2(ID)
        ) $charset_collate;";
        dbDelta( $sql );
    }



    $table_name = $wpdb->prefix . 'pixpine_subscriptions';
    $table_exists = $wpdb->get_var("SHOW TABLES LIKE '$table_name'") === $table_name;
    if (!$table_exists) {
        $t1 = $wpdb->prefix."users";
        $sql = "CREATE TABLE $table_name (
            id INT(11) NOT NULL AUTO_INCREMENT,
            user_id INT(11) DEFAULT NULL,
            item_number INT(11) DEFAULT NULL,
            subscripton_plan VARCHAR(255) DEFAULT NULL,
            status VARCHAR(255) DEFAULT NULL,
            	
            recheck_update int(11) NOT NULL DEFAULT 0,
            plan_id VARCHAR(255) DEFAULT NULL,
            subscription_id VARCHAR(255) DEFAULT NULL,
            starting_date DATE DEFAULT NULL,
            end_date DATE DEFAULT NULL,
            created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
            updated_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
            PRIMARY KEY (id)
            -- FOREIGN KEY (user_id) REFERENCES $t1(id),
        ) $charset_collate;";
        dbDelta( $sql );
    }


    $table_name = $wpdb->prefix . 'pixpine_subscription_payment';
    $table_exists = $wpdb->get_var("SHOW TABLES LIKE '$table_name'") === $table_name;
    if (!$table_exists) {
        $t1 = $wpdb->prefix."pixpine_subscriptions";
        $t2 = $wpdb->prefix."pixpine_payment_details";
        $sql = "CREATE TABLE $table_name (
            id INT(11) NOT NULL AUTO_INCREMENT,
            subscription_id INT(11) DEFAULT NULL,
            payment_detail_id INT(11) DEFAULT NULL,
            PRIMARY KEY (id)
            -- FOREIGN KEY (subscription_id) REFERENCES $t1(id),
            -- FOREIGN KEY (payment_detail_id) REFERENCES $t2(ID)
        ) $charset_collate;";
        dbDelta( $sql );
    }

}
add_action( 'after_switch_theme', 'create_custom_table' );






// Add custom admin menu
function add_custom_admin_menu() {
    create_admin_pages_for_home_special_product();
    create_admin_pages_for_home_categories();
    create_admin_pages_for_newsletter_subscribers();
    create_admin_pages_for_orders();
    create_admin_pages_for_payment();
    create_admin_pages_for_google_ads();
    create_admin_pages_for_subscription();
}
add_action('admin_menu', 'add_custom_admin_menu');


// Subscription
function create_admin_pages_for_subscription(){
    // list
    add_menu_page(
        'Subscription',      // Page title
        'Subscription',      // Menu title
        'manage_options',   // Capability required to access the menu
        'subscription',      // Menu slug
        'subscription_page', // Callback function to render the menu page
        'dashicons-admin-generic', // Icon URL or dashicon class
        2                  // Menu position
    );
    // detail
    add_submenu_page(
        null,      // Payment menu slug
        'Detail',          // Page title
        'Detail',          // Menu title
        'manage_options',   // Capability required to access the submenu
        'detail-subscription',   // Submenu slug
        'detial_subscription_page' // Callback function to render the submenu page
    );
}

// Google Ads
function create_admin_pages_for_google_ads(){
    // list
    add_menu_page(
        'Google Ads',      // Page title
        'Google Ads',      // Menu title
        'manage_options',   // Capability required to access the menu
        'google-ads',      // Menu slug
        'google_ads_page', // Callback function to render the menu page
        'dashicons-admin-generic', // Icon URL or dashicon class
        2                  // Menu position
    );
}

// Home Categories
function create_admin_pages_for_home_categories(){
    // list
    add_menu_page(
        'Home Categories',      // Page title
        'Home Categories',      // Menu title
        'manage_options',   // Capability required to access the menu
        'home-cat',      // Menu slug
        'home_cat_page', // Callback function to render the menu page
        'dashicons-admin-generic', // Icon URL or dashicon class
        2                  // Menu position
    );
}
// Home Categories - Ends


// Home Special Product
function create_admin_pages_for_home_special_product(){
    // list
    add_menu_page(
        'Home Special Product',      // Page title
        'Home Special Product',      // Menu title
        'manage_options',   // Capability required to access the menu
        'home-special-product',      // Menu slug
        'home_special_product_page', // Callback function to render the menu page
        'dashicons-admin-generic', // Icon URL or dashicon class
        2                  // Menu position
    );
    // detail
    add_submenu_page(
        'home-special-product',      // Payment menu slug
        'Create',          // Page title
        'Create',          // Menu title
        'manage_options',   // Capability required to access the submenu
        'create-home-special-product',   // Submenu slug
        'create_home_special_product_page' // Callback function to render the submenu page
    );
}
// Home Special Product - Ends

// Email Subscriber
function create_admin_pages_for_newsletter_subscribers(){
    // list
    add_menu_page(
        'Email Subscriber',      // Page title
        'Email Subscriber',      // Menu title
        'manage_options',   // Capability required to access the menu
        'email-subscriber',      // Menu slug
        'email_subscriber_page', // Callback function to render the menu page
        'dashicons-admin-generic', // Icon URL or dashicon class
        2                  // Menu position
    );
    // create
    add_submenu_page(
        'email-subscriber',      // Payment menu slug
        'Create',          // Page title
        'Create',          // Menu title
        'manage_options',   // Capability required to access the submenu
        'create-email-subscriber',   // Submenu slug
        'create_email_subscriber_page' // Callback function to render the submenu page
    );
    // edit
    add_submenu_page(
        null,      // Payment menu slug
        'Edit',          // Page title
        'Edit',          // Menu title
        'manage_options',   // Capability required to access the submenu
        'edit-email-subscriber',   // Submenu slug
        'edit_email_subscriber_page' // Callback function to render the submenu page
    );
    // delete
    add_submenu_page(
        null,      // Payment menu slug
        'Delete',          // Page title
        'Delete',          // Menu title
        'manage_options',   // Capability required to access the submenu
        'delete-email-subscriber',   // Submenu slug
        'delete_email_subscriber_page' // Callback function to render the submenu page
    );
}
// Email Subscriber - Ends

// Order
function create_admin_pages_for_orders(){
    // list
    add_menu_page(
        'Orders',      // Page title
        'Orders',      // Menu title
        'manage_options',   // Capability required to access the menu
        'order',      // Menu slug
        'order_page', // Callback function to render the menu page
        'dashicons-admin-generic', // Icon URL or dashicon class
        2                  // Menu position
    );
    // detail
    add_submenu_page(
        null,      // Payment menu slug
        'Detail',          // Page title
        'Detail',          // Menu title
        'manage_options',   // Capability required to access the submenu
        'detail-order',   // Submenu slug
        'detail_order_page' // Callback function to render the submenu page
    );
}
// Order - Ends

// Payment
function create_admin_pages_for_payment(){
    // list
    add_menu_page(
        'Payments',      // Page title
        'Payments',      // Menu title
        'read',   // Capability required to access the menu
        'payments',      // Menu slug
        'payments_page', // Callback function to render the menu page
        'dashicons-admin-generic', // Icon URL or dashicon class
        2                  // Menu position
    );
}
// Payment Ends


/**
 * Callback Functions for admin pages
 */
// Payments
function payments_page(){
    require get_template_directory() . '/admin/payments/index.php';
}

// google adds
function google_ads_page(){
    require get_template_directory() . '/admin/google-ads/edit.php';
}

// 


// Subscription
function subscription_page(){
    require get_template_directory() . '/admin/subscription/index.php';
}
function detial_subscription_page(){
    require get_template_directory() . '/admin/subscription/detail.php';
}

// Subscription - Ends


// Order
function order_page(){
    require get_template_directory() . '/admin/order/index.php';
}
function detail_order_page(){
    require get_template_directory() . '/admin/order/detail.php';
}
function csv_generate_order_page(){
    require get_template_directory() . '/admin/order/csv-generate.php';
}
// Order - Ends

//  subscriber
function email_subscriber_page(){
    require get_template_directory() . '/admin/email-subscriber/index.php';
}
function create_email_subscriber_page(){
    require get_template_directory() . '/admin/email-subscriber/create.php';
}
function edit_email_subscriber_page(){
    require get_template_directory() . '/admin/email-subscriber/edit.php';
}
function delete_email_subscriber_page(){
    require get_template_directory() . '/admin/email-subscriber/delete.php';
}
//  subscriber - Ends

// home_cat
function home_cat_page(){
    require get_template_directory() . '/admin/home-cat/index.php';
}
// Order - Ends

// home-special-product
function home_special_product_page(){
    require get_template_directory() . '/admin/home-special-product/index.php';
}
function create_home_special_product_page(){
    require get_template_directory() . '/admin/home-special-product/create.php';
}
// home-special-product - Ends

/**
 * Callback Functions for admin pages - Ends
 */




 /**
  * Custom meta box for product (CPT)
  */
  
  function custom_meta_box_markup($post) {
    wp_nonce_field(basename(__FILE__), 'custom_nonce');
    global $wpdb;
           
    $value1 = get_post_meta($post->ID, 'personal_commercial_price', true);
    echo '<label for="personal_commercial_price">Personal & Commercial Price:</label>';
    echo '<br>';
    echo '<input type="text" id="personal_commercial_price" name="personal_commercial_price" value="' . esc_attr($value1) . '" />';
    echo '<br>';
    echo '<br>';
           
    $value1 = get_post_meta($post->ID, 'personal_commercial_sale_price', true);
    echo '<label for="personal_commercial_sale_price">Personal & Commercial Sale Price:</label>';
    echo '<br>';
    echo '<input type="text" id="personal_commercial_sale_price" name="personal_commercial_sale_price" value="' . esc_attr($value1) . '" />';
    echo '<br>';
    echo '<br>';
    
    $value2 = get_post_meta($post->ID, 'extended_license_price', true);
    echo '<label for="extended_license_price">Extended License Price:</label>';
    echo '<br>';
    echo '<input type="text" id="extended_license_price" name="extended_license_price" value="' . esc_attr($value2) . '" />';
    echo '<br>';
    echo '<br>';
    
    $value2 = get_post_meta($post->ID, 'extended_license_sale_price', true);
    echo '<label for="extended_license_sale_price">Extended License Sale Price:</label>';
    echo '<br>';
    echo '<input type="text" id="extended_license_sale_price" name="extended_license_sale_price" value="' . esc_attr($value2) . '" />';
    echo '<br>';
    echo '<br>';
    
    $value3 = get_post_meta($post->ID, 'download_link', true);
    echo '<label for="download_link">Download link:</label>';
    echo '<br>';
    echo '<input type="text" id="download_link" name="download_link" value="' . esc_attr($value3) . '" />';
    echo '<br>';
    echo '<br>';

    // gallery
    wp_nonce_field('custom_product_gallery_nonce', 'custom_product_gallery_nonce');
    $_custom_product_gallery = get_post_meta($post->ID, '_custom_product_gallery', true);
    echo '<input type="hidden" id="_custom_product_gallery" name="_custom_product_gallery" value="'.$_custom_product_gallery.'" >';
    $_custom_product_gallery = !empty($_custom_product_gallery) ? explode(',', $_custom_product_gallery) : array();
    echo '<input type="button" class="button" value="Add Images" is-multiple="1" id="custom_product_gallery_button">';
    echo '<ul id="custom_product_gallery_container"  class="side-by-side-list">';
    foreach ($_custom_product_gallery as $image_id) {
        echo '<li>' . wp_get_attachment_image($image_id, 'thumbnail') . '</li>';
    }
    echo '</ul>';


    $value4 = get_post_meta($post->ID, 'related_product', true);
    $html = '';
    if($value4 != ''){
        $query = "SELECT ID, post_title FROM {$wpdb->posts} WHERE ID IN ($value4)";
        $results = $wpdb->get_results($query);
        foreach ($results as $result) {
            $html .= '<li id="r-p-'.$result->ID.'">'.$result->post_title.'<span r-id="'.$result->ID.'" class="remove-related-product remoove-product">remove</span></li>';
        }        
    }
    echo '<label for="">Related Product:</label>';
    echo '<input type="hidden" value="' . esc_attr($value4) . '" name="related_product" id="related-product">';
    echo '
    <ol class="selected-related-product">
        '.$html.'
    </ol>
    ';
    echo '
    <div class="autocomplete" style="width:300px;">
        <input id="related-product-search-input" class="search-input" type="text" placeholder="Search Product">
        <div id="related-product-options" class="autocomplete-items">

        </div>
    </div>';
    echo '<br>';
    echo '<br>';
    

    
    $value5 = get_post_meta($post->ID, 'similar_product', true);
    $html = '';
    if($value5 != ''){
        $query = "SELECT ID, post_title FROM {$wpdb->posts} WHERE ID IN ($value5)";
        $results = $wpdb->get_results($query);
        foreach ($results as $result) {
            $html .= '<li id="s-p-'.$result->ID.'">'.$result->post_title.'<span r-id="'.$result->ID.'" class="remove-similar-product remoove-product">remove</span></li>';
        }        
    }
    echo '<label for="">Similar Product:</label>';
    echo '<input type="hidden" value="' . esc_attr($value5) . '" name="similar_product" id="similar-product">';
    echo '
    <ol class="selected-similar-product">
        '.$html.'
    </ol>
    ';
    echo '
    <div class="autocomplete" style="width:300px;">
        <input id="similar-product-search-input" class="search-input" type="text" placeholder="Search Product">
        <div id="similar-product-options" class="autocomplete-items">

        </div>
    </div>';
    echo '<br>';
    echo '<br>';


    $value6 = get_post_meta($post->ID, 'application', true);
    echo '<label for="application">Application:</label>';
    echo '<br>';
    echo '<input type="text" id="application" name="application" value="' . esc_attr($value6) . '" />';
    echo '<br>';
    echo '<br>';


    $value7 = get_post_meta($post->ID, 'file_type', true);
    echo '<label for="file_type">File Type:</label>';
    echo '<br>';
    echo '<input type="text" id="file_type" name="file_type" value="' . esc_attr($value7) . '" />';
    echo '<br>';
    echo '<br>';

    $value8 = get_post_meta($post->ID, 'file_size', true);
    echo '<label for="file_size">File Size:</label>';
    echo '<br>';
    echo '<input type="text" id="file_size" name="file_size" value="' . esc_attr($value8) . '" />';
    echo '<br>';
    echo '<br>';

    $value9 = get_post_meta($post->ID, 'dimension', true);
    echo '<label for="dimension">Dimension:</label>';
    echo '<br>';
    echo '<input type="text" id="dimension" name="dimension" value="' . esc_attr($value9) . '" />';
    echo '<br>';
    echo '<br>';

    $value10 = get_post_meta($post->ID, 'license', true);
    echo '<label for="license">License:</label>';
    echo '<br>';
    echo '<input type="text" id="license" name="license" value="' . esc_attr($value10) . '" />';
    echo '<br>';
    echo '<br>';

    $value11 = get_post_meta($post->ID, 'author', true);
    echo '<label for="author">Author:</label>';
    echo '<br>';
    echo '<input type="text" id="author" name="author" value="' . esc_attr($value11) . '" />';
    echo '<br>';
    echo '<br>';

    $value12 = get_post_meta($post->ID, 'compatible_with', true);
    echo '<label for="compatible_with">Compatible with:</label>';
    echo '<br>';
    echo '<input type="text" id="compatible_with" name="compatible_with" value="' . esc_attr($value12) . '" />';
    echo '<br>';
    echo '<br>';

    $value13 = get_post_meta($post->ID, 'extended_license', true);
    echo '<label for="extended_license">Extended License:</label>';
    echo '<br>';
    echo '<input type="text" id="extended_license" name="extended_license" value="' . esc_attr($value13) . '" />';
    echo '<br>';
    echo '<br>';

}

function add_custom_meta_box() {
    add_meta_box('custom_meta_box', 'Custom Field', 'custom_meta_box_markup', 'post', 'normal', 'high');
}
add_action('add_meta_boxes', 'add_custom_meta_box');


function save_custom_meta_box($post_id) {
    if (!isset($_POST['custom_nonce']) || !wp_verify_nonce($_POST['custom_nonce'], basename(__FILE__))) {
        return $post_id;
    }

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return $post_id;
    }

    if ('post' === $_POST['post_type']) {
        if (current_user_can('edit_post', $post_id)) {
            $new_value = sanitize_text_field($_POST['personal_commercial_price']);
            update_post_meta($post_id, 'personal_commercial_price', $new_value);

            $new_value = sanitize_text_field($_POST['personal_commercial_sale_price']);
            update_post_meta($post_id, 'personal_commercial_sale_price', $new_value);
            
            $new_value = sanitize_text_field($_POST['extended_license_price']);
            update_post_meta($post_id, 'extended_license_price', $new_value);
            
            $new_value = sanitize_text_field($_POST['extended_license_sale_price']);
            update_post_meta($post_id, 'extended_license_sale_price', $new_value);
            
            $new_value = sanitize_text_field($_POST['download_link']);
            update_post_meta($post_id, 'download_link', $new_value);
            
            $new_value = sanitize_text_field($_POST['related_product']);
            update_post_meta($post_id, 'related_product', $new_value);
            
            $new_value = sanitize_text_field($_POST['similar_product']);
            update_post_meta($post_id, 'similar_product', $new_value);
            
            
            $new_value = sanitize_text_field($_POST['_custom_product_gallery']);
            update_post_meta($post_id, '_custom_product_gallery', $new_value);

            $new_value = sanitize_text_field($_POST['application']);
            update_post_meta($post_id, 'application', $new_value);

            $new_value = sanitize_text_field($_POST['file_type']);
            update_post_meta($post_id, 'file_type', $new_value);

            $new_value = sanitize_text_field($_POST['file_size']);
            update_post_meta($post_id, 'file_size', $new_value);

            $new_value = sanitize_text_field($_POST['dimension']);
            update_post_meta($post_id, 'dimension', $new_value);

            $new_value = sanitize_text_field($_POST['license']);
            update_post_meta($post_id, 'license', $new_value);

            $new_value = sanitize_text_field($_POST['author']);
            update_post_meta($post_id, 'author', $new_value);

            $new_value = sanitize_text_field($_POST['compatible_with']);
            update_post_meta($post_id, 'compatible_with', $new_value);

            $new_value = sanitize_text_field($_POST['extended_license']);
            update_post_meta($post_id, 'extended_license', $new_value);
            
        }
    }
}
add_action('save_post', 'save_custom_meta_box');
/**
 * Add gallery in the wp-admin panel
 */
// Add custom metabox for gallery images


function custom_product_gallery_enqueue_scripts($hook) {
    // if ('post.php' != $hook && 'post-new.php' != $hook) {
    //     return;
    // }

    // if ('product' != get_post_type()) {
    //     return;
    // }

    wp_enqueue_style('search-dropdown-css', get_template_directory_uri() . '/admin/assets/dropdown/jquery-multi-select.css', array(), '1.0', 'all');


    wp_enqueue_media();
    wp_enqueue_script('custom-product-gallery', get_template_directory_uri() . '/admin/assets/js/custom-product-gallery.js', array('jquery'), '1.0', true);

}
add_action('admin_enqueue_scripts', 'custom_product_gallery_enqueue_scripts');


function save_custom_product_gallery() {
    check_ajax_referer('custom_product_gallery_nonce', 'nonce');

    $image_ids = !empty($_POST['imageIds']) ? $_POST['imageIds'] : array();
    $image_ids_str = implode(',', $image_ids);

    // Debug: Check if AJAX action is triggered
    error_log('AJAX action triggered');

    echo '<ul class="side-by-side-list">';
    foreach ($image_ids as $image_id) {
        echo '<li>' . wp_get_attachment_image($image_id, 'thumbnail') . '</li>';
    }
    echo '</ul>';

    die();
}
add_action('wp_ajax_save_custom_product_gallery', 'save_custom_product_gallery');


function search_product() {
    check_ajax_referer('custom_product_gallery_nonce', 'nonce');

    $search = $_POST['search'];
    $expect_product_id = $_POST['expect_product_id'];

    global $wpdb;

    $query = "SELECT ID, post_title FROM {$wpdb->posts} WHERE post_type = 'post' AND post_status = 'publish' AND post_title LIKE '%$search%' ";
    if($expect_product_id != ''){
        $query .= " AND  ID NOT IN ($expect_product_id)";

    }
    
    $results = $wpdb->get_results($query);
    
    $post_array = array();
    
    foreach ($results as $result) {
        $post_array[$result->ID] = $result->post_title;
    }

    echo json_encode($post_array);

    die();
}
add_action('wp_ajax_search_product', 'search_product');

function get_all_product() {
    check_ajax_referer('custom_product_gallery_nonce', 'nonce');

    global $wpdb;

    $query = "SELECT ID, post_title FROM {$wpdb->posts} WHERE post_type = 'post' AND post_status = 'publish'";
    
    $results = $wpdb->get_results($query);
    
    $post_array = array();
    
    foreach ($results as $result) {
        $post_array[$result->ID] = $result->post_title;
    }

    echo json_encode($post_array);
    
    die();
}
add_action('wp_ajax_get_all_product', 'get_all_product');

/**
 * Add gallery in the wp-admin panel
 */


 /**
  * change url and add ID for product (CPT)
  */

  function custom_modify_post_slug($slug, $post_ID, $post_status, $post_type) {
    // Check if the post type is the one you're interested in
    if ($post_type === 'post') {
        // Append the post ID to the proposed slug

        if(!str_contains($slug, 'free-')){
            if (!str_contains($slug, '-'.$post_ID)) { 
                $slug .= '-' . $post_ID;
            }
        }

        // if(!str_contains($slug, 'free-') && !str_contains($slug, 'product')){
        //     if (!str_contains($slug, '-'.$post_ID)) { 
        //         $slug .= '-' . $post_ID;
        //     }
        // }else{
        //     if (!str_contains($slug, 'product/')) { 
        //         $slug = 'product/' . $slug;
        //     }
        // }
        // if(str_contains($slug, 'product-free-')){
        //     $slug = str_replace('product-', '', $slug);
        // }
    }

    return $slug;
}

add_filter('wp_unique_post_slug', 'custom_modify_post_slug', 10, 4);



/**
 * Feature image for category
 */
// Add custom image field to custom taxonomy
function add_custom_taxonomy_image_field($taxonomy) {
    wp_nonce_field('custom_product_gallery_nonce', 'custom_product_gallery_nonce');
    $_custom_product_gallery = '';
    if(isset($taxonomy->term_id)){
        $_custom_product_gallery = get_term_meta($taxonomy->term_id, '_custom_product_gallery', true);
    }

    echo '<input type="hidden" id="_custom_product_gallery" name="_custom_product_gallery" value="'.$_custom_product_gallery.'" >';
    $_custom_product_gallery = !empty($_custom_product_gallery) ? explode(',', $_custom_product_gallery) : array();
    echo '<input type="button" class="button" value="Add Image" is-multiple="0" id="custom_product_gallery_button">';
    echo '<ul id="custom_product_gallery_container"  class="side-by-side-list">';
    foreach ($_custom_product_gallery as $image_id) {
        echo '<li>' . wp_get_attachment_image($image_id, 'thumbnail') . '</li>';
    }
    echo '</ul>';

    $val = get_term_meta($taxonomy->term_id, '_custom_is_show_cat', true);
    if($val == 1){
        $is_checked = 'checked';
    }else{
        $is_checked = '';
    }
    echo '
    <div class="form-check">
    <input '.$is_checked.' class="form-check-input" type="checkbox" value="1"  name="_custom_is_show_cat" id="flexCheckDefault">
    <label class="form-check-label" for="flexCheckDefault">
        Show it in the top 6
    </label>
    </div>';
    $_custom_cat_serial = get_term_meta($taxonomy->term_id, '_custom_cat_serial', true);
    echo ' <br>
    <div class="form-group">
    <label for="_custom_cat_serial">Serial Number</label>
    <input type="number" class="form-control" id="_custom_cat_serial" name="_custom_cat_serial" placeholder="Enter serial number" value="'.$_custom_cat_serial.'" required>
    </div>';
}
// add_action('mockup_category_add_form_fields', 'add_custom_taxonomy_image_field', 10, 1);
add_action('mockup_category_edit_form_fields', 'add_custom_taxonomy_image_field', 10, 1);

// Save the custom taxonomy image
function save_custom_taxonomy_image($term_id) {
    if (isset($_POST['_custom_product_gallery'])) {
        update_term_meta($term_id, '_custom_product_gallery', sanitize_text_field($_POST['_custom_product_gallery']));
        if(isset($_POST['_custom_is_show_cat']) && ($_POST['_custom_is_show_cat'] == 1)){
            update_term_meta($term_id, '_custom_is_show_cat', 1);
        }else{
            update_term_meta($term_id, '_custom_is_show_cat', 0);
        }
        update_term_meta($term_id, '_custom_cat_serial', sanitize_text_field($_POST['_custom_cat_serial']));
    }
}
// add_action('created_mockup_category', 'save_custom_taxonomy_image', 10, 1);
add_action('edited_mockup_category', 'save_custom_taxonomy_image', 10, 1);


/**
 * Register Custom Category For Product
 */
function custom_product_taxonomy() {

    $labels = array(
        'name'                       => _x( 'Mockup Categories', 'Taxonomy General Name', 'text_domain' ),
        'singular_name'              => _x( 'Mockup Category', 'Taxonomy Singular Name', 'text_domain' ),
        'menu_name'                  => __( 'Mockup Categories', 'text_domain' ),
        'all_items'                  => __( 'Mockup Categories', 'text_domain' ),
        'payment_item'                => __( 'Payment Category', 'text_domain' ),
        'payment_item_colon'          => __( 'Payment Category:', 'text_domain' ),
        'new_item_name'              => __( 'New Category Name', 'text_domain' ),
        'add_new_item'               => __( 'Add New Category', 'text_domain' ),
        'edit_item'                  => __( 'Edit Category', 'text_domain' ),
        'update_item'                => __( 'Update Category', 'text_domain' ),
        'view_item'                  => __( 'View Category', 'text_domain' ),
        'separate_items_with_commas' => __( 'Separate categories with commas', 'text_domain' ),
        'add_or_remove_items'        => __( 'Add or remove categories', 'text_domain' ),
        'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
        'popular_items'              => __( 'Popular Categories', 'text_domain' ),
        'search_items'               => __( 'Search Categories', 'text_domain' ),
        'not_found'                  => __( 'Not Found', 'text_domain' ),
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => true,
        'public'                     => true, // Set to true to display in post editor
        'show_ui'                    => true, // Show the admin UI
        'show_admin_column'          => true, // Show the admin column
        'show_in_nav_menus'          => true, // Show in navigation menus
        'show_tagcloud'              => true, // Show in tag cloud widget
    );
    register_taxonomy( 'mockup_category', array( 'post' ), $args );


}
add_action( 'init', 'custom_product_taxonomy', 0 );