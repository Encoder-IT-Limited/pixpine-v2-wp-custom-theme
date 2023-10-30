<?php 
/*
Template Name: Cart
*/
get_header();
?>

<main>

  <section class="dashboard_section dashboard__downloads">
    <div class="container">
      <div class="row">
        <div class="col-md-8">
          <table>
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
                <tr id="<?php echo $cpt_id;?>">
                  <td><img style="width: 100px" src="<?php echo $thumbnail_url;?>" alt=""></td>
                  <td>
                    <b><?php echo $cpt_post->post_title;?></b>  
                    ID: <?php echo $cpt_id;?>
                  </td>
                  <td> $<span class="single-cart-price"><?php echo $price;?></span> </td>
                  <td class="remove-cart" p-id="<?php echo $cpt_id;?>" ><img style="width: 20px" src="<?php echo get_template_directory_uri();?>/assets/images/remove.png" alt="" /></td>
                </tr>
              <?php
              }
              ?>

            
            </tbody>
          </table>
        </div>
        <div class="col-md-4">
          <p>CART TOTALS</p>
          <p>Cart Subtotal	$<span class="total-cart-price"><?php echo $total_price;?></span></p>
          <p>Order Total	$<span class="total-cart-price"><?php echo $total_price;?></span></p>

          <p>
            All prices are in US dollars
            <br>
            <a class="_btn btn_primary" href="<?php echo site_url('checkout');?>">
              Proceed to checkout  
            </a>
          </p>

        </div>
      </div>
    </div>
  </section>
</main>

<!-- Footer -->
<?php get_footer();?>
