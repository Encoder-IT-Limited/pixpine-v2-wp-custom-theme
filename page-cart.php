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
              foreach($products as $cpt_id){
                $cpt_post = get_post($cpt_id, 'product');
                $thumbnail_url = get_the_post_thumbnail_url($cpt_id);
                $price = get_post_meta($cpt_id, 'personal_commercial_price', true);
              ?>
                <tr id="<?php echo $cpt_id;?>">
                  <td><img style="width: 100px" src="<?php echo $thumbnail_url;?>" alt=""></td>
                  <td>
                    <b><?php echo $cpt_post->post_title;?></b>  
                    ID: <?php echo $cpt_id;?>
                  </td>
                  <td><?php echo $price;?></td>
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
          <p>Cart Subtotal	$14.99</p>
          <p>Order Total	$14.99</p>

          <p>
            All prices are in US dollars
            <br>
            <button class="_btn btn_primary add-to-cart" p-id="260" is-logged-in="1" in-cart="1" cart-url="http://localhost/pixpine/cart">
              Proceed to checkout  
            </button>
            <br>
            EMPTY CART
            <br>
          </p>

        </div>
      </div>
    </div>
  </section>
</main>

<!-- Footer -->
<?php get_footer();?>
