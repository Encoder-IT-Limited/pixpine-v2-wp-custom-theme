<?php
get_header();

$post_id = get_the_ID();
$post = get_post($post_id);

$current_category_name = '';
$taxonomy = 'mockup_category'; //'your_custom_taxonomy'; 
$custom_categories = wp_get_post_terms($post_id, $taxonomy);
// Check if custom categories were found
if (!is_wp_error($custom_categories) && !empty($custom_categories)) {
  // Loop through the custom categories and display them
  foreach ($custom_categories as $category) {
    if(esc_html($category->name) != "Free Mockups"){
      $current_category_name = esc_html($category->name);
    }
  }
}

/**
 * find similar sub cat in premium category
 */
$same_cat_id_in_premium_cat = '';
$parent_term_slug = 'premium-mockups'; // Replace with the actual parent term slug
$taxonomy = 'mockup_category'; // Replace with your custom taxonomy name
$parent_term = get_term_by('slug', $parent_term_slug, $taxonomy);
if ($parent_term && !is_wp_error($parent_term)) {
  $args = array(
      'taxonomy' => $taxonomy,
      'child_of' => $parent_term->term_id,
  );
  $subcategories = get_terms($args);
  if (!is_wp_error($subcategories) && !empty($subcategories)) {
      foreach ($subcategories as $subcategory) {
        if($subcategory->name == $current_category_name){
          $same_cat_id_in_premium_cat = $subcategory->term_id;
        }
      }
  }
}
?>

<main>
      <section class="banner_section">
        <div class="container">
          
          <!-- Banner search form -->
          <?php include get_template_directory() .'/includes/search-form.php';?>

          
        </div>
      </section>
      <section class="affiliate_ad">
        <div class="container">
          <div class="section_width">
            <img src="<?php echo get_template_directory_uri();?>/assets/images/affiliate_ad.png" alt="" />
          </div>
        </div>
      </section>
      <section class="free_product_section">
        <div class="container">
          <div class="row_d">
            <div class="free_product_main_col left_col">
              <div class="inner_col">
                <div class="pixpine_free_product_top">
                  <div class="first_free_product_container">
                    <div class="row_d">
                      <div class="first_image_text_col">
                        <?php $_custom_product_gallery = get_post_meta($post->ID, '_custom_product_gallery', true);
                        $_custom_product_gallery = !empty($_custom_product_gallery) ? explode(',', $_custom_product_gallery) : array();
                        foreach ($_custom_product_gallery as $image_id) {
                          $image_url = wp_get_attachment_image_src($image_id, 'full'); // 'full' is the image size, change it as needed
                          if ($image_url) {
                          ?>
                            <div class="card_item">
                              <div class="card_inner pixpine_card_border">
                                <img src="<?php echo $image_url[0];?>" alt="" />
                              </div>
                            </div>
                          <?php 
                          } else {
                              // Image not found or invalid image ID
                              echo 'Image not found or invalid image ID.';
                          }
                        }
                        ?>

                        <!-- <div class="card_item">
                          <div class="card_inner pixpine_card_border">
                            <img src="<?php echo get_template_directory_uri();?>" alt="" />
                          </div>
                        </div> -->
                        <!-- <p>
                          We are <a href="">PIXPINE</a> where people can get high-quality
                          user-friendly mockups for their projects. Everything
                          we do is for the purpose that it delivers and drives
                          value for our customers. It’s a win-win scenario for
                          all involved as we offer solutions to buyers’ /
                          perspective buyers’ situations. We are a group of
                          creative enthusiasts who work tirelessly to bring
                          something fresh and beneficial to the market.
                        </p>
                        <p>
                        It’s a win-win scenario for
                          all <a href="">involved</a> as we offer solutions to buyers’ /
                          perspective buyers’ situations. We are a group of
                          creative enthusiasts who work tirelessly to bring
                          something fresh and beneficial to the market.
                        </p> -->
                        <?php 
                        // echo $post->post_content;
                        echo apply_filters('the_content', $post->post_content);
                        ?>
                      </div>
                      <div class="first_card_col">

                        <?php
                       
                        // $subcategory_id = $same_cat_id_in_premium_cat;
                        // $taxonomy = 'mockup_category'; //'your_custom_taxonomy'; 
                        // $args = array(
                        //     // 'post_type' => $cpt_slug,
                        //     'orderby'   => 'rand', // Order randomly
                        //     'posts_per_page' => 3, // Retrieve all posts in the category
                        //     'tax_query' => array(
                        //       array(
                        //           'taxonomy' => $taxonomy,
                        //           'field'    => 'term_id',
                        //           'terms'    => $subcategory_id,
                        //       ),
                        //   ),
                        // );

                        // $random_cpts = new WP_Query($args);

                        $value5 = get_post_meta($post_id, 'similar_product', true);
                        $cnt = 0;
                        if($value5 != ''){
                          $query = "SELECT ID, post_title FROM {$wpdb->posts} WHERE ID IN ($value5)";
                          $results = $wpdb->get_results($query);
                          foreach ($results as $result) {
                            $cnt++;
                            $thumbnail_url = get_the_post_thumbnail_url($result->ID, 'full');
                            $_custom_product_gallery = get_post_meta($result->ID, '_custom_product_gallery', true);
                            $_custom_product_gallery = !empty($_custom_product_gallery) ? explode(',', $_custom_product_gallery) : array();
                            $thumbnail_url2 = wp_get_attachment_image_url( $_custom_product_gallery[0],'full');
                        ?>
                              <div class="card_item">
                                <a href="<?php echo get_the_permalink($result->ID);?>">
                                  <div class="inner_col">
                                    <div class="img_col pixpine_card_border">
                                      <img src="<?php echo $thumbnail_url;?>" 
                                      img1="<?php echo $thumbnail_url;?>" 
                                      img2="<?php echo $thumbnail_url2;?>" 
                                      class="premium-img-hover-effect"
                                      alt="<?php echo get_the_title($result->ID);?>" />
                                    </div>
                                    <div class="text_col">
                                      <h4 class="default_color">
                                      <?php echo get_the_title($result->ID);?>
                                      </h4>
                                </a>
                                      <a href="<?php echo site_url('premium-mockups');?>">
                                      <p class="primary_color">Premium Mockups</p>
                                      </a>
                                    </div>
                                  </div>
                              </div>
                              
                        <?php
                            if($cnt == 2){
                        ?>
                              <div class="card_item get_off">
                                <div class="inner_col">
                                  <div class="get_premium_mockups_section">
                                    <div
                                      class="premium_mockups_inner d-flex justify-content-between align-items-center"
                                    >
                                      <div class="premium_text text-center w-100">
                                        <h2
                                          class="section_heading section_heading_primary section_heading_bold"
                                        >
                                          Get 93% Off
                                          <span
                                            class="section_heading_medium default_color"
                                            >on premium mockups</span
                                          > 
                                        </h2>
                                        <span class="primary_color"
                                          >as low as $0.25 mockup each</span
                                        >
                                        <a
                                          href="<?php echo site_url('get-subscription');?>"
                                          class="btn_primary _btn"
                                          >Get premium</a
                                        >
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                        <?php
                            }
                          }
                          wp_reset_postdata(); // Restore the global post data
                        } else {
                            // echo 'No CPTs found in this category.';
                        }
                        if($cnt <2){
                        ?>
                        <div class="card_item get_off">
                          <div class="inner_col">
                            <div class="get_premium_mockups_section">
                              <div
                                class="premium_mockups_inner d-flex justify-content-between align-items-center"
                              >
                                <div class="premium_text text-center w-100">
                                  <h2
                                    class="section_heading section_heading_primary section_heading_bold"
                                  >
                                    Get 93% Off
                                    <span
                                      class="section_heading_medium default_color"
                                      >on premium mockups</span
                                    >
                                  </h2>
                                  <span class="primary_color"
                                    >as low as $0.25 mockup each</span
                                  >
                                  <a
                                    href="<?php echo site_url('get-subscription');?>"
                                    class="btn_primary _btn"
                                    >Get premium</a
                                  >
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <?php
                        }
                        ?>
                      </div>
                    </div>
                  </div>
                  <div class="application_photoshop_col">
                    <div class="row_d justify-content-between">
                      <div class="application_photoshop_content">
                        <div class="d-flex">
                          <div class="keys_col">
                            <p>Application:</p>
                            <p>File Type:</p>
                            <p>File Size:</p>
                            <p>Dimension:</p>
                            <p>License:</p>
                            <p>Author:</p>
                          </div>
                          <div class="values_col">
                            <p><?php echo get_post_meta($post_id, 'application', true);?></p>
                            <p><?php echo get_post_meta($post_id, 'file_type', true);?></p>
                            <p><?php echo get_post_meta($post_id, 'file_size', true);?></p>
                            <p><?php echo get_post_meta($post_id, 'dimension', true);?></p>
                            <p>
                              <a href="<?php echo site_url('license');?>">
                                <?php echo get_post_meta($post_id, 'license', true);?>
                              </a>
                            </p>
                            <p><?php echo get_post_meta($post_id, 'author', true);?></p>
                          </div>

                          <!-- <div class="values_col">
                            <p>Photoshop</p>
                            <p>PSD</p>
                            <p>80 MB</p>
                            <p>4500 x 3200 - 300dpi</p>
                            <p><a href="<?php echo site_url('license');?>">Personal & Commercial</a></p>
                            <p>Pixpine</p>
                          </div> -->
                        </div>
                      </div>
                      <div class="application_photoshop_img google_ad">
                        <img
                          src="<?php echo get_template_directory_uri();?>/assets/images/application_photoshop_img.png"
                          alt=""
                        />
                      </div>
                    </div>
                    <a target="_blank"
                      class="_btn btn_primary"
                      href="<?php echo site_url('free-mockups-download');?>?id=<?php echo $post_id;?>"
                      >DOWNLOAD</a
                    >
                  </div>
                </div>
                <div class="google_ad">
                  <img src="<?php echo get_template_directory_uri();?>/assets/images/google_ad_h117.png" alt="" />
                </div>
                <div class="related_mockups_col">
                  <div class="section_heading_container">
                    <h2 class="section_heading">Related Mockups</h2>
                  </div>
                  <div class="related_inner_col">
                    <div class="row_d">
                      <?php
                      $related_product = get_post_meta($post_id, 'related_product', true);
                      if($related_product != ''){
                        $query = "SELECT ID, post_title FROM {$wpdb->posts} WHERE ID IN ($related_product)";
                        $results = $wpdb->get_results($query);
                        foreach ($results as $result) {
                          $thumbnail_url = get_the_post_thumbnail_url($result->ID);
                      ?>
                        <div class="card_item">
                          <a href="<?php echo get_the_permalink($result->ID);?>">
                            <div class="card_inner pixpine_card_border">
                              <img src="<?php echo $thumbnail_url;?>" alt="" />
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
              </div>
            </div>
            <div class="free_business_card_col right_col">
              <div class="heading_col">
                <h1 class="page_heading">
                  <?php echo $post->post_title;?>
                </h1>
                <a href="<?php echo site_url();?>?cat=free-mockup&type=category&term-name=<?php echo $current_category_name;?>&s=">
                  <p>
                    <?php echo $current_category_name;?>
                  </p>
                </a>
              </div>
              <div class="content_col">
                <div class="google_add">
                  <img
                    id="desktop_ad"
                    src="<?php echo get_template_directory_uri();?>/assets/images/google_ad_long_height.png"
                    alt=""
                  />
                  <img id="mobile_ad" src="<?php echo get_template_directory_uri();?>/assets/images/google_ad_h117.png" alt="" />
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>
    <?php
    get_footer();