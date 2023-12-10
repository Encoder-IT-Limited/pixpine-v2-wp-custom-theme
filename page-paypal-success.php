<?php 
/*
Template Name: Paypal Success
*/
get_header();
$user_id = get_current_user_id();
$msg = '';

if(isset($_POST['tnx_id'])){
  global $wpdb;
  global $current_user;
  get_currentuserinfo();
  $user_id= $current_user->ID;  
  $amount = $_GET['amount'];
  $tnx_id = $_GET['tnx_id'];
  $payment_for = 'product';

  $query = "INSERT INTO ".$wpdb->prefix."pixpine_payment_details SET 
  (`tnx_id`, `user_id`, `amount`, `payment_for`, `payment_info`, `payment_status`) 
  VALUES ('$tnx_id', '$user_id', '$amount', 'product', 'one time payment', 'Completed')";
  $wpdb->query($query);
  $payment_details_id = $wpdb->insert_id;


  $sql="insert into ".$wpdb->prefix.
  "pixpine_orders (user_id,pixpine_payment_detail_id,total_price) 
  values('$user_id','". $payment_details_id."','".$amount."')";
  $wpdb->query($sql);
  $order_id = $wpdb->insert_id;


  

  // get from cart
  $table_name = $wpdb->prefix . 'pixpine_carts'; 
  $query = "SELECT product_id FROM $table_name WHERE user_id='$user_id'"; 
  $products =$wpdb->get_col($query);
  $total_price = 0; 
  // add in order item table
  foreach($products as $cpt_id){ 
      $cpt_post = get_post($cpt_id, 'product'); 
      $name= $cpt_post->post_title;
      $price = get_post_meta($cpt_id,'personal_commercial_sale_price', true); 
      $sql="insert into ".$wpdb->prefix."pixpine_order_items (pixpine_order_id,product_id,user_id,product_name,price) values('$order_id','".$cpt_id."','".$user_id."','".$name."','".$price."')";
      $wpdb->query($sql);
  }
  // delete from cart
  $query = "DELETE from ".$wpdb->prefix."pixpine_carts  WHERE user_id='$user_id' ";
  $wpdb->query($query);

}

?>
<main>
  <section class="dashboard_section dashboard__downloads">
    <div class="container">
      <div class="heading_col mb-5">
        <h1 class="page_heading text-center">Success</h1>
      </div>
      <div class="row_d checkout_row">
        <div class="alert alert-primary" role="alert">
          Your payment is successful.
        </div>
      </div>
   
     
        </div>
               </form>
      </div>
        
    </div>
  </section>
</main>
<!-- Footer -->
<?php get_footer();?>