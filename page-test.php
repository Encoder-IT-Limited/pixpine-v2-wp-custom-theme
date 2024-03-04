<?php
/*
Template Name: Test
*/

$product_id = 545;
$mockup_cat = 'dfsd';
global $wpdb;
$user_id = get_current_user_id();

// already downloaded
if($product_id != null){
    $bought_product = $wpdb->get_var("SELECT id FROM " . $wpdb->prefix . "pixpine_order_items WHERE user_id='" . $user_id . "' AND product_id='".$product_id."'");
    if($bought_product != null){
        echo 'true';
    }
}

// subscription
$todays_date = date("Y-m-d");
$active_subscriptions = $wpdb->get_col("SELECT subscripton_plan FROM " . $wpdb->prefix . "pixpine_subscriptions WHERE user_id='" . $user_id . "' AND end_date >= '$todays_date'");
$number_of_subscription = $wpdb->num_rows;
// if has subscription
if ($number_of_subscription > 0) {
 
    $bought_product = $wpdb->get_var("SELECT id FROM " . $wpdb->prefix . "pixpine_subscription_downloaded_items WHERE user_id='" . $user_id . "' AND product_id='".$product_id."'");
    if($bought_product != null){
        echo '1111';
    }
    echo 'ddddddddddd1';
    var_dump(in_array('yearly',$active_subscriptions));
    echo 'ddddddddddd1';

    if(in_array('yearly',$active_subscriptions) && ($mockup_cat != 'bundle-mockups')){
        echo '2222222';
    }elseif(in_array('monthly',$active_subscriptions)){
        $available_download = get_user_meta($user_id, 'available_download', true);
        if(($available_download > 0) && ($mockup_cat != 'bundle-mockups')){
            echo '3333333';
        }
    }
}

echo 'false';