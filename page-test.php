<?php
/*
Template Name: Test
*/
$product_id = 351;
//////////////////////////////////////////////////
global $wpdb;
$user_id = get_current_user_id();
$active_subscription = $wpdb->get_var("SELECT subscripton_plan FROM " . $wpdb->prefix . "pixpine_subscriptions WHERE user_id='" . $user_id . "' AND status='Active'");

if ($active_subscription != null) {
    if($active_subscription == 'yearly'){
        return false;
    }elseif($active_subscription == 'monthly'){
       echo $available_download = get_user_meta($user_id, 'available_download', true);
        if($available_download > 0){
            return false;
        }
    }
} 
// already downloaded
if($product_id != null){
    $bought_product = $wpdb->get_var("SELECT id FROM " . $wpdb->prefix . "pixpine_order_items WHERE user_id='" . $user_id . "' AND product_id=$product_id");
    if($bought_product != null){
        return false;
    }
}

return false;
/////////////////////////////////////