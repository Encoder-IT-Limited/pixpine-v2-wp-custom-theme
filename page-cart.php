<?php 
/*
Template Name: Cart
*/
get_header();
?>

<main>
  <section class="dashboard_section dashboard__downloads">
    <div class="container">
      <div class="row_d cart__page">
        <div class="mockups_cart_item_column">
          <div class="table__cart">
            <?php
				  global $wpdb;
				  $user_id = get_current_user_id();
				  $table_name = $wpdb->prefix . 'pixpine_carts'; $query = "SELECT product_id
            FROM $table_name WHERE user_id='$user_id'"; $products =
            $wpdb->get_col($query); $total_price = 0; foreach($products as
            $cpt_id){ $cpt_post = get_post($cpt_id, 'product'); $thumbnail_url =
            get_the_post_thumbnail_url($cpt_id); $price = get_post_meta($cpt_id,
            'personal_commercial_sale_price', true); if(empty($price)){ $price = 0; }
            $total_price += $price; ?>
            <div class="cart_item" id="<?php echo $cpt_id;?>">
              <div class="img_text_cont">
                <div class="product_img">
                  <img src="<?php echo $thumbnail_url;?>" alt="" />
                </div>
                <div class="product_description">
                  <span class="product_name">
					  <strong><?php echo $cpt_post->post_title;?></strong>
					</span>
                  <span>
					  ID: <?php echo $cpt_id;?>
					</span>
                </div>
              </div>
              <div class="">
                $<span class="single-cart-price"><?php echo $price;?></span>
              </div>
              <div class="remove-cart" p-id="<?php echo $cpt_id;?>">
                <img
                  style="width: 20px"
                  src="<?php echo get_template_directory_uri();?>/assets/images/remove.png"
                  alt=""
                />
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
                $<span class="total-cart-price"
                  ><?php echo $total_price;?></span
                >
              </p>
            </div>
            <div class="item">
              <p>Order Total</p>
              <p>
                $<span class="total-cart-price"
                  ><?php echo $total_price;?></span
                >
              </p>
            </div>
            <p class="text-center">All prices are in US dollars</p>
            <a
              class="_btn btn_primary"
              href="<?php echo site_url('checkout');?>"
            >
              Proceed to checkout
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>

<!-- Footer -->
<?php get_footer();?>
