<?php
/*
Template Name: Paypal Success
*/
get_header();
$user_id = get_current_user_id();
$msg = '';

if (isset($_GET['tnx_id'])) {
  global $wpdb;
  $current_user = wp_get_current_user();
  $user_id = $current_user->ID;
  $amount = $_GET['amount'];
  $tnx_id = $_GET['tnx_id'];
  $payment_for = 'product';

  $query = "INSERT INTO " . $wpdb->prefix . "pixpine_payment_details 
  (`tnx_id`, `user_id`, `amount`, `payment_for`, `payment_info`, `payment_status`) 
  VALUES ('$tnx_id', '$user_id', '$amount', 'product', 'one time payment', 'Completed')";
  $wpdb->query($query);
  $payment_details_id = $wpdb->insert_id;


  $sql = "insert into " . $wpdb->prefix .
    "pixpine_orders (user_id,pixpine_payment_detail_id,total_price) 
  values('$user_id','" . $payment_details_id . "','" . $amount . "')";
  $wpdb->query($sql);
  $order_id = $wpdb->insert_id;




  // get from cart
  $table_name = $wpdb->prefix . 'pixpine_carts';
  $query = "SELECT product_id FROM $table_name WHERE user_id='$user_id'";
  $product_ids = $wpdb->get_col($query);
  $total_price = 0;
  // add in order item table
  foreach ($product_ids as $cpt_id) {
    $cpt_post = get_post($cpt_id, 'product');
    $name = $cpt_post->post_title;
    $price = get_post_meta($cpt_id, 'personal_commercial_sale_price', true);
    $sql = "insert into " . $wpdb->prefix . "pixpine_order_items (pixpine_order_id,product_id,user_id,product_name,price) values('$order_id','" . $cpt_id . "','" . $user_id . "','" . $name . "','" . $price . "')";
    $wpdb->query($sql);
  }
  // delete from cart
  $query = "DELETE from " . $wpdb->prefix . "pixpine_carts  WHERE user_id='$user_id' ";
  $wpdb->query($query);

  $discount = get_user_specific_discount();
  $html = order_confirmation_email($product_ids, 'stripe', $discount, $order_id);
  $email = 'orders@pixpine.site, innovawebdeveloper@gmail.com, harun@encoderit.net, harun.encoderit@gmail.com, '.$current_user->user_email;
  pixpine_send_html_email($email, ' Thank you for your payment', $html);
  $custom_page_url = site_url() . '/downloads?type=new-purchase';
  $_SESSION['message'] = 'Successfully Paid';
  wp_redirect($custom_page_url);
}

?>