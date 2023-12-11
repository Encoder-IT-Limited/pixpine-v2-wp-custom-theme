<div
  class="modal fade premium_modal"
  id="premiumModal"
  tabindex="-1"
  aria-labelledby="premiumModalLabel"
  aria-hidden="true"
>
<?php
global $wpdb;
$post_id = get_the_ID();

// favorite
$is_logged_in = 0;
$is_favorite = 0;
if(is_user_logged_in()){
  $is_logged_in = 1;
  $user_id = get_current_user_id();
  $old_ids = get_user_meta($user_id, 'pixpine_favorite_premium', true);
  if(!empty($old_ids)){
    $old_ids = explode(',', $old_ids);
    if(in_array($post_id, $old_ids)){
      $is_favorite = 1;
    }
  }
}

// in cart
$in_cart = 0;
if($is_logged_in == 1){
  $table_name = $wpdb->prefix . 'pixpine_carts';
  $count = $wpdb->get_var("SELECT COUNT(*) FROM $table_name WHERE user_id = '$user_id' AND product_id = '$post_id'");
  if($count>0){
    $in_cart = 1;
  }
}

$cpt = get_post($post_id);

$output['thumbnail_url'] = get_the_post_thumbnail_url($cpt->ID);

// get category
$current_category_name = '';
$taxonomy = 'mockup_category'; //'your_custom_taxonomy'; 
$custom_categories = wp_get_post_terms($post_id, $taxonomy);
// Check if custom categories were found
if (!is_wp_error($custom_categories) && !empty($custom_categories)) {
  // Loop through the custom categories and display them
  foreach ($custom_categories as $category) {
      if((esc_html($category->name) != "Premium Mockups") && (esc_html($category->name) != "Bundle Mockups")){
          $current_category_name = esc_html($category->name);
      }
  }
}

?>
<!-- <div class="modal fade premium_modal show" id="premiumModal" tabindex="-1" aria-labelledby="premiumModalLabel" aria-modal="true" role="dialog" style="display: block;"> -->
  <div class="modal-dialog">
    <div class="modal-content">
      <main>
        <section class="premium_product_page">
          <div class="container">
            <div class="section_width">
              <div class="row_d">
                <div class="slider_product_about_column">
                  <div class="heading_col">
                      <h1 class="page_heading">
                        <?php echo $cpt->post_title;?>
                      </h1>
                      <p>
                        <span class="user_id">ID:<?php echo $cpt->ID;?></span> in
                        <a href="<?php echo site_url();?>?cat=premium-mockup&type=category&term-name=<?php echo $current_category_name;?>&s=">
                          <span class="primary_color"><?php echo $current_category_name;?></span>
                        </a>
                      </p>
                  </div>

                  <!-- 06.10.2023 start -->
                  <!-- Slider Start -->
                  <div class="slider_column">

                    <!-- Single img slider -->
                    <div class="premium_single_img_slider">
                    <?php
                      $_custom_product_gallery = get_post_meta($cpt->ID, '_custom_product_gallery', true);
                      $_custom_product_gallery = !empty($_custom_product_gallery) ? explode(',', $_custom_product_gallery) : array();
                      foreach ($_custom_product_gallery as $image_id) {
                      ?>
                      <div class="slider__item">
                        <div class="inner__slider">
                          <div class="img_col pixpine_card_border">
                            <img src="<?php echo wp_get_attachment_image_url($image_id);?>" alt="">
                          </div>
                          <button class="slider__wishlist alter-favorite" p-id="<?php echo $cpt->ID;?>" is-logged-in="<?php echo $is_logged_in;?>" is-favorite="<?php echo $is_favorite;?>" 
                          type="premium" 
                          img-src-1="<?php echo get_template_directory_uri();?>/assets/images/wishlist_icon-fill.png" 
                          img-src-0="<?php echo get_template_directory_uri();?>/assets/images/wishlist_icon.png" 
                          >
                            <?php if($is_favorite == 1){ ?>
                              <img class="fav-icon" src="<?php echo get_template_directory_uri();?>/assets/images/wishlist_icon-fill.png" alt="" />
                            <?php }else{ ?>
                              <img class="fav-icon" src="<?php echo get_template_directory_uri();?>/assets/images/wishlist_icon.png" alt="" />
                            <?php } ?>
                          </button>
                        </div>
                      </div>
                      <?php
                      }
                    ?>

                    </div>
                    <!-- Single img slider end -->



                    <!-- Multiple img slider start -->
                    <div class="premium_multiple_img_slider">
                      <?php
                      foreach ($_custom_product_gallery as $image_id) {
                      ?>
                      <div class="slider__item">
                        <div class="inner__slider">
                          <div class="img_col pixpine_card_border">
                            <img src="<?php echo wp_get_attachment_image_url($image_id);?>" alt="">
                          </div>
                        </div>
                      </div>
                      <?php
                      }
                      ?>
                    </div>
                  </div>
                  <!-- Multiple img slider end -->

                  <!-- Slider End -->
                  <!-- 06.10.2023 end -->
                  <?php
                  $currentUrl = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                  $facebookShareUrl = 'https://www.facebook.com/sharer/sharer.php?u=' . urlencode($currentUrl);
                  $twitterShareUrl = 'https://twitter.com/intent/tweet?url=' . urlencode($currentUrl);
                  $pinterestShareUrl = 'https://www.pinterest.com/pin/create/button/?url=' . urlencode($currentUrl).'&media='.get_the_post_thumbnail_url($post_id).'&description='.get_the_title($post_id);
                  ?>
                  <div class="about_product product">
                    <div class="d-flex justify-content-between">
                      <h2 class="section_heading">About Product</h2>
                      <ul class="d-flex social_link">
                        <li>
                          <a target="_blank" href="<?php echo $pinterestShareUrl;?>">
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/pinterest.png" alt="" />
                          </a>
                        </li>
                        <li>
                          <a target="_blank" href="instagram://camera">
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/instagram.png" alt="" />
                          </a>
                        </li>
                        <li>
                          <a target="_blank" href="<?php echo $twitterShareUrl;?>">
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/twitter.png" alt="" />
                          </a>
                        </li>
                        <li>
                          <a target="_blank" href="<?php echo $facebookShareUrl;?>">
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/facebook.png" alt="" />
                          </a>
                        </li>
                      </ul>
                    </div>
                    <div class="text_col">
                      <?php echo $cpt->post_content;?>
                      <h4>Related Keywords</h4>
                      <p>
                        <?php
                        $cpt_tags = get_the_tags($cpt->ID);
                        $html = '';
                        if ($cpt_tags) {
                            $last_key = array_key_last($cpt_tags);
                            foreach ($cpt_tags as $key => $tag) {
                              if ($key == $last_key) {
                                // echo '<a href="' . esc_url(get_tag_link($tag->term_id)) . '">' . esc_html($tag->name) . '</a>';
                              ?>
                                <a href="<?php echo site_url().'?cat=premium-mockup&type=tag&tag-name='.$tag->name.'&s=';?>"><?php echo $tag->name;?></a>
                              <?php
                              } else {
                                // echo '<a href="' . esc_url(get_tag_link($tag->term_id)) . '">' . esc_html($tag->name) . ', </a>';
                              ?>
                                <a href="<?php echo site_url().'?cat=premium-mockup&type=tag&tag-name='.$tag->name.'&s=';?>"><?php echo $tag->name;?></a>;
                              <?php
                              }
                            }
                        }
                        ?>
                      </p>
                    </div>
                    <div class="separetor"></div>
                  </div>
                  <div class="similar_products product">
                    <h2 class="column_heading">Similar Products</h2>
                    <div class="similar_products_slider">
                      <div class="similar_slider">
                      <?php 
                      $value5 = get_post_meta($cpt->ID, 'similar_product', true);
                      if($value5 != ''){
                        $query = "SELECT ID, post_title FROM {$wpdb->posts} WHERE ID IN ($value5)";
                        $results = $wpdb->get_results($query);
                        foreach ($results as $result) {
                        ?>
                        <div class="card_item">
                        
                          <a href="<?php echo get_the_permalink($result->ID);?>">
                            <div class="inner_col">
                              <div class="img_col pixpine_card_border">
                                <img src="<?php echo get_the_post_thumbnail_url($result->ID);?>" alt="" />
                              </div>
                              <div class="text_col">
                                <p class="default_color">
                                  <?php echo $result->post_title;?>
                                </p>
                              </div>
                            </div>
                          </a>
                        </div>
                        <?php
                        } 
                      }
                      ?>
                      </div>
                    </div>
                  </div>
                  <div class="separetor"></div>
                  <div class="related_products product">
                    <h2 class="column_heading">Related Products</h2>
                    <div class="related_products_slider">
                      <div class="related_slider">
                      <?php
                      $value5 = get_post_meta($cpt->ID, 'related_product', true);
                      if($value5 != ''){
                          $query = "SELECT ID, post_title FROM {$wpdb->posts} WHERE ID IN ($value5)";
                          $results = $wpdb->get_results($query);
                          foreach ($results as $result) {
                          ?>
                            <div class="card_item">
                            <a href="<?php echo get_the_permalink($result->ID);?>">
                                <div class="inner_col">
                                  <div class="img_col pixpine_card_border">
                                    <img src="<?php echo get_the_post_thumbnail_url($result->ID);?>" alt="" />
                                  </div>
                                  <div class="text_col">
                                    <h4 class="default_color">
                                      <?php echo $result->post_title;?>
                                    </h4>
                                    <p class="default_color">Premium Mockups</p>
                                  </div>
                                </div>
                              </a>
                            </div>
                          <?php
                          } 
                      }
                      ?>
                      </div>
                    </div>
                  </div>
                  <!-- <div class="separetor"></div>
                  <div class="comment_box_container">
                    <p>
                      You must be
                      <a class="primary_color" type="button" data-bs-toggle="modal" data-bs-target="#loginModal">
                        signed in
                      </a> to leave a
                      comment.
                    </p>
                    <div class="autor_details d-flex align-items-center">
                      <img
                        class="autor_img"
                        src="<?php echo get_template_directory_uri();?>/assets/images/comment_autor_img.png"
                        alt=""
                      />
                      <span class="autor_name">Sam Jimmy</span>
                    </div>
                    <form action="">
                      <textarea class="w-100" name="" id=""></textarea>
                    </form>
                  </div> -->
                </div>
                <div class="simple_vertical_add_to_cart_column">
                  <div class="sticky-top">
                    <div class="heading_col">
                      <h1 class="page_heading">
                      <?php echo $cpt->post_title;?>
                      </h1>
                      <p>
                        <span class="user_id">ID: <?php echo $post_id;?></span> in
                        <a href="<?php echo site_url();?>?cat=premium-mockup&type=category&term-name=<?php echo $current_category_name;?>&s=">
                          <span class="primary_color"><?php echo $current_category_name;?></span>
                        </a>
                      </p>
                    </div>
                    <div class="price_product_specs_container">
                      <div class="add_to_cart">
                        <div
                          class="d-flex justify-content-between align-items-center"
                        >
                          <h5>Price</h5>
                          <h5>
                            <del>$<?php echo get_post_meta($post_id, 'personal_commercial_price', true);?> </del>
                            $<?php echo get_post_meta($post_id, 'personal_commercial_sale_price', true);?> 
                          </h5>
                        </div>
                        <button class="_btn btn_primary add-to-cart" p-id="<?php echo $cpt->ID;?>" is-logged-in="<?php echo $is_logged_in;?>" in-cart="<?php echo $in_cart;?>" cart-url="<?php echo site_url('cart');?>">
                        <?php echo ($in_cart==1) ? 'View Cart' : 'Add to Cart';?>
                        </button>
                      </div>
                      <div class="save_unlimited_downloads">
                        <h2 class="primary_color text-uppercase">Save 96%</h2>
                        <p>Get this for only $0.14 with unlimited downloads.</p>
                        <a
                          class="_btn btn_black text-center"
                          href="<?php echo site_url('subscription');?>"
                          >Get premium</a
                        >
                      </div>
                      <div class="product__specs">
                        <h3>Product Specs.</h3>
                        <ul>
                          <li>
                            <p><span>Compatible with:</span>Adobe Photoshop</p>
                          </li>
                          <li>
                            <p><span>File Type:</span>Layered PSD</p>
                          </li>
                          <li>
                            <p><span>File Size:</span>150 MB</p>
                          </li>
                          <li>
                            <p><span>Dimension:</span>4000 x 3000 Pixels</p>
                          </li>
                          <li>
                            <p>
                              <span>License:</span>
                              <a href="<?php echo site_url('license');?>">Commercial and Personal</a>
                            </p>
                          </li>
                          <li>
                            <p>
                              <span>Extended License:</span>Free (Limited Time)
                            </p>
                          </li>
                          <li>
                            <p><span>Author:</span>Pixpine</p>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </main>
    </div>
  </div>
</div>