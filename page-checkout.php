<?php 
/*
Template Name: Checkout
*/
ob_start();
// Add cache control headers to prevent caching
header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
header("Pragma: no-cache"); // HTTP 1.0.
header("Expires: 0"); // Proxies.
get_header();
$user_id = get_current_user_id();
$msg = '';

if(isset($_POST['submit'])){

  if (isset($_POST['client_form_nonce']) && wp_verify_nonce($_POST['client_form_nonce'], 'client_form_nonce')) {

    if(!is_user_logged_in()){
      // User login credentials
      $signup_first_name = $_POST['billing_f_name'];
      $signup_last_name = $_POST['billing_l_name'];
      // User registration data
      $username = $signup_first_name.' '.$signup_last_name;
      $email = $_POST['billing_email'];
      $password = $_POST['billing_password'];

      // Check if the user already exists by email
      $user_exists = email_exists($email);

      if (!$user_exists) {
          // User does not exist, proceed with registration
          $user_id = wp_create_user($username, $password, $email);

          if (is_wp_error($user_id)) {
              // Registration failed
              $msg = 'Registration failed: ' . $user_id->get_error_message();
          } else {
              // Registration successful
              // $msg = 'Registration successful. User ID: ' . $user_id;
              move_session_cart_to_db_cart($user_id);
              // send welcome email
              $html = pixpine_welcome_email($username);
              pixpine_send_html_email($email, 'Welcome to Pixpine', $html);

              $html = pixpine_new_account_password_email($username, $password);
              pixpine_send_html_email($email, 'Your New Account Password', $html);

              // Reauthenticate the user with the new password
              $user_signin = wp_signon(array(
                'user_login'    => $email,
                'user_password' => $password,
                'remember'      => true // You can set it to false if you don't want to remember the login
              ));
              if (!is_wp_error($user_signin)) {
                // Log the user in
                wp_set_current_user($user_id);
                wp_set_auth_cookie($user_id);
                do_action('wp_login', $email);
              } else {
                $msg = 'Login failed. Please check your credentials.';
              }
          }
      } else {
          // User already exists with the provided email
          $msg = 'An account already exists with this email.';
      }
    }

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

    if($msg == ''){
      $msg = 'success';
    }
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

$is_billing_form_filled = 1;
$form_class_name = 'd-none';
$info_class_name = '';
if($billing_email == '') {
  $form_class_name = '';
  $info_class_name = 'd-none';
  $is_billing_form_filled = 0;
  if(is_user_logged_in()){
    $current_user = wp_get_current_user();
    $billing_email = $current_user->user_email;
  }
}

if($billing_f_name == ''){
  $billing_f_name = get_user_meta($user_id, 'first_name', true);
}
if($billing_l_name == ''){
  $billing_l_name = get_user_meta($user_id, 'last_name', true);
}
?>
<main>
  <section class="dashboard_section dashboard__downloads">
    <div class="container checkout_row">
      <div class="heading_col mb-5">
        <h1 class="page_heading">Billing Information</h1>
      </div>
      <div class="row_d">
        <div class="left_col">
          <?php
            if($msg != ''){
              if($msg == 'success'){
                echo '
                <div class="alert alert-success" role="alert">
                  Your information has been updated successfully
                </div>
        '; }elseif($msg != ''){ echo '
        <div class="alert alert-warning" role="alert">
          '.$msg.'
        </div>
        '; } } ?>
        <div class="content__column billing_form <?php echo $form_class_name;?>">
          <form action="#" method="post" class="billing-info-form">
            <?php wp_nonce_field('client_form_nonce', 'client_form_nonce'); ?>
            <div class="full_width_container">
              <div class="half_width input_group">
                <label for="">First Name<span>*</span></label>
                <input
                  type="text"
                  name="billing_f_name"
                  value="<?php echo $billing_f_name;?>"
                  
                  required
                />
              </div>
              <div class="half_width input_group">
                <label for="">Last Name<span>*</span></label>
                <input
                  type="text"
                  name="billing_l_name"
                  value="<?php echo $billing_l_name;?>"
                  
                  required
                />
              </div>
            </div>
            <div class="full_width_container">
              <div class="half_width input_group">
                <label for="">Email<span>*</span></label>
                <input
                  type="email"
                  name="billing_email"
                  value="<?php echo $billing_email;?>"
                  
                  required
                />
              </div>
              <?php if(!is_user_logged_in()){ ?>
              <div class="half_width input_group">
                <label for="">Password<span>*</span></label>
                <input
                  type="password"
                  name="billing_password"
                  value=""
                  required
                />
              </div>
              <?php } ?>
            </div>
            <div class="full_width_container">
              <div class="half_width input_group">
                <label for="">Company</label>
                <input
                  type="text"
                  name="billing_company"
                  value="<?php echo $billing_company;?>"
                  
                />
              </div>
              <div class="half_width input_group">
                <label for="">Country<span>*</span></label>
                <input
                  type="text"
                  name="billing_country"
                  value="<?php echo $billing_country;?>"
                  
                  required
                />
              </div>
            </div>
            <div class="full_width_container">
              <div class="full_width input_group">
                <label for="">Address</label>
                <input
                  type="text"
                  name="billing_address"
                  value="<?php echo $billing_address;?>"
                  
                />
              </div>
            </div>
            <div class="full_width_container">
              <div class="half_width input_group">
                <label for="">City</label>
                <input
                  type="text"
                  name="billing_city"
                  value="<?php echo $billing_city;?>"
                />
              </div>
              <div class="half_width input_group">
                <label for="">State/Province/Region</label>
                <input
                  type="text"
                  name="billing_state"
                  value="<?php echo $billing_state;?>"
                  
                />
              </div>
            </div>
            <div class="full_width_container">
              <div class="half_width input_group">
                <label for="">Zip Code</label>
                <input
                  type="text"
                  name="billing_zip"
                  value="<?php echo $billing_zip;?>"
                  
                />
              </div>
            </div>
            <!-- <div class="form_btn_container">
              <input
                class="_btn btn_primary billing-info-form-submit"
                type="submit"
                name="submit"
                value="Update"
              />
            </div> -->
          </form>
        </div>

        <div class="billing_info <?php echo $info_class_name;?>">
          <p>
            First Name:
            <?php echo $billing_f_name;?>
          </p>
          <p>
            Last Name:
            <?php echo $billing_l_name;?>
          </p>
          <p>
            Email Address:
            <?php echo $billing_email;?>
          </p>
          <p>
            Country:
            <?php echo $billing_country;?>
          </p>
        </div>
        <button
          class="_btn get_premium_btn btn_black_small btn_primary show_billing_form <?php echo $info_class_name;?>"
        >
          Edit Billing Address
        </button>
      </div>
   
      <div class="right_col">
           <form method="post" action="" class='checkout-payment-form'>
        <div class="order__column">
          <h3 id="order_review_heading">Your order</h3>
          <div class="shop_table woocommerce-checkout-review-order-table">
            <div
              class="order_heading_col d-flex align-items-center justify-content-between"
            >
              <!--<p class="product-name">Product</p>-->
              <!--<p class="product-total">Total</p>-->
            </div>
            <div>
              <?php
                global $wpdb;


                if(is_user_logged_in()){
                  $user_id = get_current_user_id();
                  $table_name = $wpdb->prefix . 'pixpine_carts'; 
                  $query = "SELECT product_id FROM $table_name WHERE user_id='$user_id'"; 
                  $products = $wpdb->get_col($query); 
                }else{
                  $products = $_SESSION['cart_items'];
                }

                $total_price = 0; 
                $get_user_specific_discount = get_user_specific_discount();
                $get_user_specific_discount_amount = get_user_specific_discount_amount($products, $get_user_specific_discount);

                foreach($products as $cpt_id){ 
                  $cpt_post = get_post($cpt_id); 
                  $thumbnail_url = get_the_post_thumbnail_url($cpt_id); 
                  $price = get_post_meta($cpt_id, 'personal_commercial_sale_price', true);
                  if(empty($price)){ $price = 0; } $total_price += $price; ?>
              <div class="cart_item">
                <div class="product-name">
                  <h5 class="product-title">
                    <?php echo $cpt_post->post_title;?>
                  </h5>
                  <div class="variation">
                    <div class="d-flex item">
                      <span class="variation-ID">ID:</span>
                      <span class="variation-ID">
                        <p><?php echo $cpt_id;?></p>
                      </span>
                    </div>
                    <span class="variation-Dimensions">Dimensions:</span>
                    <div class="variation-Dimensions">
                      <p><?php echo get_post_meta($cpt_id, 'dimension', true);?></p>
                    </div>
                    <div class="d-flex item">
                      <span class="variation-Filetype">File type:</span>
                      <span class="variation-Filetype">
                        <p><?php echo get_post_meta($cpt_id, 'file_type', true);?></p>
                      </span>
                    </div>
                    <!-- <dt class="variation-License">License:</dt>
                            <dd class="variation-License">
                                <p>Standard License</p>
                            </dd> -->
                  </div>
                </div>
                <div class="product-total">
                  <span class="amount">$<?php echo number_format($price, 2);?></span>
                </div>
              </div>
              <?php
                }
                ?>
            </div>
            <div class="order_footer">
              <div class="cart-subtotal">
                <div class="d-flex align-items-center justify-content-between">
                  <p>Cart Subtotal</p>
                  <span class="amount">$<?php echo number_format($total_price, 2);?></span>
                </div>
              </div>
              <?php if($get_user_specific_discount != 0){?>
              <div class="tax-rate tax-rate-de-vat-1">
                <div class="d-flex align-items-center justify-content-between">
                  <p>Subscription Discount(<?=$get_user_specific_discount?>%)</p>
                  <span class="amount">- $<?php echo $get_user_specific_discount_amount; ?></span>
                </div>
              </div>
              <?php } ?>
              <div class="tax-rate tax-rate-de-vat-1">
                <div class="d-flex align-items-center justify-content-between">
                  <p>VAT</p>
                  <span class="amount">$0.00</span>
                </div>
              </div>
              <div
                class="order-total order-total-main"
                data-total="<?php echo $total_price = $total_price - $get_user_specific_discount_amount;?>"
                data-total-feeless="17.84"
                data-total-blue="14.99"
              >
                <div class="order_total__border d-flex align-items-center justify-content-between">
                  <p>Order Total</p>
                  <span class="amount">$<?php echo number_format($total_price, 2);?></span>
                </div>
              </div>
                  <div class="payment_option">
                    <h5 class="product-title">Payment Method</h5>
                    <div class="paypal_item">
                        <input type="radio" name="payment_method" id="payment-stripe" value="Stripe">
                            <input type="hidden" name="price" value="<?php echo $total_price;?>">
                            <input type="hidden" name="placeOrder" value="1">
                            <input type="hidden" name="proid" value="<?php echo $cpt_id;?>">
                            <label>CREDIT / DEBIT CARD</label>
                        <div class="icon_payment">
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/visa_icon.png" alt="">
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/american_express_icon.png" alt="">
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/master_card_icon.png" alt="">
                        </div>
                    </div>
                    <div class="paypal_item">
                        <input type="radio" name="payment_method" id="payment-paypal" value="Paypal">
                        <input type="hidden" id="payment-success-page-url" value="<?php echo site_url('paypal-success');?>">
                        <label>Paypal</label>
                        <div class="icon_payment">
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/paypal_icon.png" alt="">
                        </div>
                        <div class="checkbox_container">
                          <input type="checkbox" name="" id="checkbox" class="tc_checkbox" />
                          <label for="checkbox">
                            I have read and agree to the website <a href="<?php echo site_url('terms-and-conditions');?>">Terms & Conditions</a>.
                          </label>
                        </div>
                        <!-- Your HTML content -->
                        <div id="paypal-button-container" style="width: 100%;margin-top: 15px;"></div>
                    </div>
                </div>
                  <button class="_btn get_premium_btn btn_primary payment-submit" type="submit">Place Order</button>
            </div>
          </div>
          <input type="hidden" id="is_user_logged_in" value="<?php echo (is_user_logged_in())? '1':'0';?> ">
          <input type="hidden" id="is_billing_form_filled" value="<?php echo $is_billing_form_filled;?> ">
          <!-- <script>
            jQuery(document).ready(function(){
              var is_user_logged_in = parseInt(jQuery("#is_user_logged_in").val());
              if(is_user_logged_in == 0){
                jQuery('#loginModal').modal('show');
              }
            });
          </script> -->
   
          <!-- Include PayPal JavaScript SDK -->

          <script src="https://www.paypal.com/sdk/js?client-id=<?=ENCODER_IT_PAYPAL_CLIENT?>&currency=USD&disable-funding=paylater"></script>
          <script>

            jQuery(document).ready(function(){
              var total_price = <?php echo $total_price;?>;
              var paypal_tansaction_id='';
            
            

              document.getElementById('paypal-button-container').style.display='none'; 


              paypal.Buttons({
                  createOrder: function(data, actions) {
                      return actions.order.create({
                          purchase_units: [{
                              amount: {
                                  value: '<?php echo $total_price;?>',
                                  currency_code: 'USD',
                              }
                          }]
                      });
                  },
                  onApprove: function(data, actions) {
                    return actions.order.capture().then(function(details) {
                      //const result=JSON.stringify(details,null,2);
                      // console.log(details.purchase_units[0].payments.captures[0].id , details.purchase_units[0].payments.captures[0].status);
                      let paypal_tansaction_id=details.purchase_units[0].payments.captures[0].id;
                      let paypal_transaction_status=details.purchase_units[0].payments.captures[0].status;
                      let paypal_transaction_name=details.payer.name.given_name;
                      if(paypal_transaction_status == "COMPLETED"){
                        // var paypalSuccessUrl = jQuery("#payment-success-page-url").val()+'?tnx_id='+paypal_tansaction_id+'&amount='+total_price;
                        // window.location.href = paypalSuccessUrl;
                        jQuery.ajax({
                            url: '<?php echo admin_url('admin-ajax.php'); ?>',
                            type: 'POST',
                            data: {
                              action: "pixpine_paypal_order_success",
                              nonce: ajax_object.ajax_nonce, // Include the nonce
                              tnx_id: paypal_tansaction_id,
                              amount: total_price,
                            },
                            success: function(response) {
                                // Display AJAX response
                                window.location.href = response;
                            },
                            error: function(xhr, status, error) {
                                console.error(xhr.responseText);
                            }
                        });
                    }
                  });
                },
                onError: function(err) {
                    console.log('Error:', err);
                    // Implement logic to handle errors
                }
              }).render('#paypal-button-container');





              // later
              jQuery('input[name="payment_method"]').change(function(){
                show_payment_options();
              })

              jQuery('.tc_checkbox').change(function(){
                show_payment_options()
              });


              function show_payment_options(){
                var payment_method_selected = jQuery('input[name="payment_method"]:checked').val();
                var is_billing_form_filled = jQuery("#is_billing_form_filled").val();
                if((jQuery('.tc_checkbox').is(":checked")) && (payment_method_selected == 'Paypal') && (is_billing_form_filled == 1)){
                    jQuery(".payment-submit").hide();
                    document.getElementById('paypal-button-container').style.display='block';
                }else{
                  jQuery(".payment-submit").show();
                  document.getElementById('paypal-button-container').style.display='none'; 
                }
              }          
            });
          </script>
          </div>
        </form>
      </div>
    </div>
  </section>
</main>

<!-- Footer -->
<?php get_footer();?>