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
$form_class_name = 'd-none';
$info_class_name = '';
if($billing_email == '') {
  $form_class_name = '';
  $info_class_name = 'd-none';
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
    <div class="container">
      <div class="heading_col mb-5">
        <h1 class="page_heading text-center">Checkout</h1>
      </div>
      <div class="row_d checkout_row">
        <div class="left_col">
          <?php
            if($msg != ''){
              if($msg == 'success'){
                echo '
                <div class="alert alert-success" role="alert">
          Billing address updated successful.
        </div>
        '; }elseif($msg == 'fail'){ echo '
        <div class="alert alert-warning" role="alert">
          Failed!! Try again later.
        </div>
        '; } } ?>
        <div class="content__column billing_form <?php echo $form_class_name;?>">
          <form action="#" method="post">
            <?php wp_nonce_field('client_form_nonce', 'client_form_nonce'); ?>
            <div class="full_width_container">
              <div class="half_width input_group">
                <label for="">First Name<span>*</span></label>
                <input
                  type="text"
                  name="billing_f_name"
                  value="<?php echo $billing_f_name;?>"
                  id=""
                  required
                />
              </div>
              <div class="half_width input_group">
                <label for="">Last Name<span>*</span></label>
                <input
                  type="text"
                  name="billing_l_name"
                  value="<?php echo $billing_l_name;?>"
                  id=""
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
                  id=""
                  required
                />
              </div>
            </div>
            <div class="full_width_container">
              <div class="half_width input_group">
                <label for="">Company</label>
                <input
                  type="text"
                  name="billing_company"
                  value="<?php echo $billing_company;?>"
                  id=""
                />
              </div>
              <div class="half_width input_group">
                <label for="">Country<span>*</span></label>
                <input
                  type="text"
                  name="billing_country"
                  value="<?php echo $billing_country;?>"
                  id=""
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
                  id=""
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
                  id=""
                />
              </div>
              <div class="half_width input_group">
                <label for="">State/Province/Region</label>
                <input
                  type="text"
                  name="billing_state"
                  value="<?php echo $billing_state;?>"
                  id=""
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
                  id=""
                />
              </div>
            </div>
            <div class="form_btn_container">
              <input
                class="_btn btn_primary"
                type="submit"
                name="submit"
                value="Update"
              />
            </div>
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
           <form method="post" action="">
        <div class="order__column">
          <h3 id="order_review_heading">Your order</h3>
          <div class="shop_table woocommerce-checkout-review-order-table">
            <div
              class="order_heading_col d-flex align-items-center justify-content-between"
            >
              <p class="product-name">Product</p>
              <p class="product-total">Total</p>
            </div>
            <div>
              <?php
                global $wpdb;
                $user_id = get_current_user_id();
                $table_name = $wpdb->prefix . 'pixpine_carts'; 
                $query = "SELECT product_id FROM $table_name WHERE user_id='$user_id'"; 
                $products = $wpdb->get_col($query); $total_price = 0; 
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
              <div class="tax-rate tax-rate-de-vat-1">
                <div class="d-flex align-items-center justify-content-between">
                  <p>VAT</p>
                  <span class="amount">$0.00</span>
                </div>
              </div>
              <div
                class="order-total order-total-main"
                data-total="<?php echo $total_price;?>"
                data-total-feeless="17.84"
                data-total-blue="14.99"
              >
                <div class="d-flex align-items-center justify-content-between">
                  <p>Order Total</p>
                  <span class="amount">$<?php echo number_format($total_price, 2);?></span>
                </div>
              </div>
                  <div class="payment_option <?php echo $info_class_name;?>">
                    <h5 class="product-title">Payment Method</h5>
                    <div class="paypal_item">
                        <label>Stripe</label>
                        <input type="radio" name="payment_method" id="payment-stripe" value="Stripe">
                            <input type="hidden" name="price" value="<?php echo $total_price;?>">
                            <input type="hidden" name="placeOrder" value="1">
                            <input type="hidden" name="proid" value="<?php echo $cpt_id;?>">
                        <div class="icon_payment">
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/visa_icon.png" alt="">
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/american_express_icon.png" alt="">
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/master_card_icon.png" alt="">
                        </div>
                    </div>
                    <div class="paypal_item <?php echo $info_class_name;?>">
                        <label>Paypal</label>
                        <input type="radio" name="payment_method" id="payment-paypal" value="Paypal">
                        <input type="hidden" id="payment-success-page-url" value="<?php echo site_url('paypal-success');?>">
                        <div class="icon_payment">
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/paypal_icon.png" alt="">
                        </div>
                        <!-- Your HTML content -->
                        <div id="paypal-button-container" style="width: 100%;margin-top: 15px;"></div>
                    </div>
                </div>
                <button style="display: none;" class="_btn get_premium_btn btn_black_small btn_primary payment-submit" type="submit">Place Order</button>
            </div>
          </div>
            
    
   
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
                  var paypalSuccessUrl = jQuery("#payment-success-page-url").val()+'?tnx_id='+paypal_tansaction_id+'&amount='+total_price;
                  window.location.href = paypalSuccessUrl;
              }
            });
          },
          onError: function(err) {
              console.log('Error:', err);
              // Implement logic to handle errors
          }
        }).render('#paypal-button-container');

        jQuery("#payment-paypal").click(function(){
          jQuery(".payment-submit").hide();
          document.getElementById('paypal-button-container').style.display='none'; 
          document.getElementById('paypal-button-container').style.display='block';
        })
        jQuery("#payment-stripe").click(function(){
          jQuery(".payment-submit").show();
          document.getElementById('paypal-button-container').style.display='none'; 
        })
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