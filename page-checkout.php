<?php 
/*
Template Name: Checkout
*/
get_header();
$user_id = get_current_user_id();
$msg = '';

if(isset($_POST['submit'])){

  if (isset($_POST['client_form_nonce']) && wp_verify_nonce($_POST['client_form_nonce'], 'client_form_nonce')) {

    $billing_f_name = sanitize_text_field($_POST['billing_f_name']);
    $billing_l_name = sanitize_text_field($_POST['billing_l_name']);
    $billing_email = sanitize_email($_POST['billing_email']);
    $billing_company = sanitize_text_field($_POST['billing_company']);
    $billing_country = sanitize_text_field($_POST['billing_country']);
    $billing_address = sanitize_text_field($_POST['billing_address']);
    $billing_city = sanitize_text_field($_POST['billing_city']);
    $billing_state = sanitize_text_field($_POST['billing_state']);
    $billing_zip = sanitize_text_field($_POST['billing_zip']);

    update_user_meta($user_id, 'billing_f_name', $billing_f_name);
    update_user_meta($user_id, 'billing_l_name', $billing_l_name);
    update_user_meta($user_id, 'billing_email', $billing_email);
    update_user_meta($user_id, 'billing_company', $billing_company);
    update_user_meta($user_id, 'billing_country', $billing_country);
    update_user_meta($user_id, 'billing_address', $billing_address);
    update_user_meta($user_id, 'billing_city', $billing_city);
    update_user_meta($user_id, 'billing_state', $billing_state);
    update_user_meta($user_id, 'billing_zip', $billing_zip);

    $msg = 'success';
  }
}
$billing_f_name = get_user_meta($user_id, 'billing_f_name', true);
$billing_l_name = get_user_meta($user_id, 'billing_l_name', true);
$billing_email = get_user_meta($user_id, 'billing_email', true);
$billing_company = get_user_meta($user_id, 'billing_company', true);
$billing_country = get_user_meta($user_id, 'billing_country', true);
$billing_address = get_user_meta($user_id, 'billing_address', true);
$billing_city = get_user_meta($user_id, 'billing_city', true);
$billing_state = get_user_meta($user_id, 'billing_state', true);
$billing_zip = get_user_meta($user_id, 'billing_zip', true);
?>

<main>

  <section class="dashboard_section dashboard__downloads">
    <h1 class="text-center">Checkout</h1>
    <br>
    <div class="container">
      <div class="row">
        <div class="col-md-8">
          <?php
            if($msg != ''){
              if($msg == 'success'){
                echo '
                <div class="alert alert-success" role="alert">
                  Billing address updated successful.
                </div>
                ';
              }elseif($msg == 'fail'){
                echo '
                <div class="alert alert-warning" role="alert">
                  Failed!! Try again later.
                </div>
                ';
              }
            }
          ?>     
          <div class="content__column billing_form d-none" >
            <form action="#" method="post">

              <?php wp_nonce_field('client_form_nonce', 'client_form_nonce'); ?>
              <div class="full_width_container">
                <div class="half_width input_group">
                  <label for="">First Name<span>*</span></label>
                  <input type="text" name="billing_f_name" value="<?php echo $billing_f_name;?>" id="" required>
                </div>
                <div class="half_width input_group">
                  <label for="">Last Name<span>*</span></label>
                  <input type="text" name="billing_l_name" value="<?php echo $billing_l_name;?>" id="" required>
                </div>
              </div>
              <div class="full_width_container">
                <div class="half_width input_group">
                  <label for="">Email<span>*</span></label>
                  <input type="email" name="billing_email" value="<?php echo $billing_email;?>" id="" required>
                </div>
              </div>
              <div class="full_width_container">
                <div class="half_width input_group">
                  <label for="">Company</label>
                  <input type="text" name="billing_company" value="<?php echo $billing_company;?>" id="">
                </div>
                <div class="half_width input_group">
                  <label for="">Country<span>*</span></label>
                  <input type="text" name="billing_country" value="<?php echo $billing_country;?>" id="" required>
                </div>
              </div>
              <div class="full_width_container">
                <div class="full_width input_group">
                  <label for="">Address</label>
                  <input type="text" name="billing_address" value="<?php echo $billing_address;?>" id="">
                </div>
              </div>
              <div class="full_width_container">
                <div class="half_width input_group">
                  <label for="">City</label>
                  <input type="text" name="billing_city" value="<?php echo $billing_city;?>" id="">
                </div>
                <div class="half_width input_group">
                  <label for="">State/Province/Region</label>
                  <input type="text" name="billing_state" value="<?php echo $billing_state;?>" id="">
                </div>
              </div>
              <div class="full_width_container">
                <div class="half_width input_group">
                  <label for="">Zip Code</label>
                  <input type="text" name="billing_zip" value="<?php echo $billing_zip;?>" id="">
                </div>
              </div>
              <div class="form_btn_container">
                <input class="_btn btn_primary" type="submit" name="submit" value="Update">
              </div>
            </form>
          </div>

          <p class="billing_info">
            First Name: <?php echo $billing_f_name;?><br>
            Last Name: <?php echo $billing_l_name;?><br>
            Email Address: <?php echo $billing_email;?><br>
            Country: <?php echo $billing_country;?><br>         
          </p>
          <button class="_btn get_premium_btn btn_black_small btn_primary show_billing_form">
            Edit Billing Address
          </button>
        </div>

        
        <div class="col-md-4">
          <h3 id="order_review_heading">Your order</h3>
          <table class="shop_table woocommerce-checkout-review-order-table">
            <thead>
                <tr>
                    <th class="product-name">Product</th>
                    <th class="product-total">Total</th>
                </tr>
            </thead>
            <tbody>
                <?php
                global $wpdb;
                $user_id = get_current_user_id();
                $table_name = $wpdb->prefix . 'pixpine_carts';
                $query = "SELECT product_id FROM $table_name WHERE user_id='$user_id'";
                $products = $wpdb->get_col($query);
                $total_price = 0;
                foreach($products as $cpt_id){
                  $cpt_post = get_post($cpt_id, 'product');
                  $thumbnail_url = get_the_post_thumbnail_url($cpt_id);
                  $price = get_post_meta($cpt_id, 'personal_commercial_price', true);
                  if(empty($price)){
                    $price = 0;
                  }
                  $total_price += $price;
                ?>
                <tr class="cart_item">
                    <td class="product-name">
                        <span class="product-title"><?php echo $cpt_post->post_title;?></span>
                        <dl class="variation">
                            <dt class="variation-ID">ID:</dt>
                            <dd class="variation-ID">
                                <p><?php echo $cpt_id;?></p>
                            </dd>
                            <dt class="variation-Dimensions">Dimensions:</dt>
                            <dd class="variation-Dimensions">
                                <p>6000x6000px</p>
                            </dd>
                            <dt class="variation-Filetype">File type:</dt>
                            <dd class="variation-Filetype">
                                <p>PSD Mockup</p>
                            </dd>
                            <!-- <dt class="variation-License">License:</dt>
                            <dd class="variation-License">
                                <p>Standard License</p>
                            </dd> -->
                        </dl>
                    </td>
                    <td class="product-total">
                        <span class="amount">$<?php echo $price;?></span>
                    </td>
                </tr>
                <?php
                }
                ?>
            </tbody>
            <tfoot>
                <tr class="cart-subtotal">
                    <th>Cart Subtotal</th>
                    <td><span class="amount">$<?php echo $total_price;?></span></td>
                </tr>
                <tr class="tax-rate tax-rate-de-vat-1">
                    <th>VAT</th>
                    <td><span class="amount">$0.00</span></td>
                </tr>
                <tr class="order-total order-total-main" data-total="17.84" data-total-feeless="17.84" data-total-blue="14.99">
                    <th>Order Total</th>
                    <td><span class="amount">$1<?php echo $total_price;?></span></td>
                </tr>
            </tfoot>
          </table>
          <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
              <input type="hidden" name="cmd" value="_s-xclick">
              <input type="hidden" name="hosted_button_id" value="YOUR_BUTTON_ID">
              <!-- Specify the item name and price -->
              <input type="hidden" name="item_name" value="Your Product Name">
              <input type="hidden" name="amount" value="10.00">
              <!-- Customize the button image -->
              <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif" border="0" name="submit" alt="Pay with PayPal">
              <!-- Add a return URL after a successful payment -->
              <input type="hidden" name="return" value="https://yourwebsite.com/success.php">
              <!-- Add a cancel URL if the user cancels the payment -->
              <input type="hidden" name="cancel_return" value="https://yourwebsite.com/cancel.php">
              <!-- Specify the currency code -->
              <input type="hidden" name="currency_code" value="USD">
              <!-- Additional optional fields -->
              <input type="hidden" name="custom" value="Your Custom Data">
              <input type="hidden" name="tax" value="0.00">
          </form>

        </div>
      </div>
    </div>
  </section>
</main>

<!-- Footer -->
<?php get_footer();?>
