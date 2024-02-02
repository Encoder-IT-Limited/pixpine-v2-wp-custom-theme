<?php
/*
Template Name: Cart
*/
get_header();

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
?>

<main>
  <section class="dashboard_section dashboard__downloads">
    <div class="container">
      <?php if(count($products)>0){ ?>
      <div class="row_d cart__page">
        <div class="mockups_cart_item_column">

          <div class="table__cart">
            <?php
            foreach ($products as $cpt_id) {
              $cpt_post = get_post($cpt_id);
              $thumbnail_url = get_the_post_thumbnail_url($cpt_id);
              $price = get_post_meta($cpt_id, 'personal_commercial_sale_price', true);
              if (empty($price)) {
                $price = 0;
              }
              $total_price += $price; 
            ?>
              <div class="cart_item" id="<?php echo $cpt_id; ?>">
                <div class="img_text_cont">
                  <div class="product_img">
                    <img src="<?php echo $thumbnail_url; ?>" alt="" />
                  </div>
                  <div class="product_description">
                    <span class="product_name">
                      <strong>
                        <?php echo $cpt_post->post_title; ?>
                      </strong>
                    </span>
                    <span>
                      ID:
                      <?php echo $cpt_id; ?>
                    </span>
                  </div>
                </div>
                <div class="">
                  $<span class="single-cart-price">
                    <?php echo number_format($price, 2); ?>
                  </span>
                </div>
                <div class="remove-cart" p-id="<?php echo $cpt_id; ?>">
                  <img style="width: 20px" src="<?php echo get_template_directory_uri(); ?>/assets/images/remove.png"
                    alt="" />
                </div>
              </div>
              <?php
            }
            ?>
          </div>
        </div>
        
        <div class="checkout_cart_btn_column">
          <div class="inner_col">
            <p><strong>CART TOTALS</strong></p>
            <div class="item">
              <p>Cart Subtotal</p>
              <p>
                $<span class="total-cart-price">
                  <?php echo number_format($total_price, 2); ?>
                </span>
              </p>
            </div>
            <?php if($get_user_specific_discount != 0){?>
            <div class="item">
              <p>Subscription Discount(<?=$get_user_specific_discount?>%)</p>
              <p>
                - $<span class="total-cart-price">
                  <?php echo $get_user_specific_discount_amount; ?>
                </span>
              </p>
            </div>
            <?php } ?>
            <div class="item">
              <p>Order Total</p>
              <p>
                $<span class="total-cart-price">
                  <?php echo number_format(($total_price-$get_user_specific_discount_amount), 2); ?>
                </span>
              </p>
            </div>
            <p class="text-center">All prices are in US dollars</p>
            <a class="_btn btn_primary" href="<?php echo site_url('checkout'); ?>">
              Proceed to checkout
            </a>
          </div>
          <div class="card_item get_off mt-5">
              <div class="get_premium_mockups_section">
                <div class="premium_mockups_inner">
                  <h2>Download Unlimited Mockups</h2>
                  <p>As low as $0.14 a mockup</p>
                  <span>$14.00/mo</span>
                  <a class="btn_primary _btn" href="<?php echo site_url('get-subscription');?>">Get premium</a>
                </div>
              </div>
          </div>
        </div>

      </div>
      <?php }else{ ?>
        <div class="row">
        <div class="col-md-8 mx-auto">
        <h1 class="page_heading text-center" style="font-size: 20px; font-weight: 400">Your cart is empty, browse our Premium Mockups</h1>
          <p class="mt-5 text-center">
            <a class="_btn btn_primary" href="<?php echo site_url('/premium-mockups/');?>">Browse Premium</a>
          </p>
        </div>
        </div>
        <?php } ?>
    </div>
  </section>
</main>

<!-- Footer -->
<?php get_footer(); ?>