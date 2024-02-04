<?php
function pixpine_save_review(){
    $product_id = $_POST['product_id'];
    $review = $_POST['review'];
    $user_id = get_current_user_id();
    global $wpdb;
    $table_name = $wpdb->prefix . 'pixpine_reviews';
    $wpdb->insert($table_name, array(
        'user_id' => $user_id,
        'product_id' => $product_id,
        'review' => $review
    ));
    echo 'success';
    die();
}
add_action('wp_ajax_pixpine_save_review', 'pixpine_save_review'); // For logged-in users