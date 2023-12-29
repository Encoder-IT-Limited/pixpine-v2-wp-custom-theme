    <main>
      <section class="banner_section">
        <div class="container">
          
          <!-- Banner search form -->
          <?php include get_template_directory() .'/includes/search-form.php';?>
          <input type="hidden" id="mockup-type" value="premium-mockups">
          <input type="hidden" id="post-per-page" value="20">
          <input type="hidden" id="html-output-class" value="premium-mockup-paginated-products-and-pagination">

            
        </div>
      </section>
      <section class="collection_premium_section">
        <div class="container">
          <div class="section_width">
            <div class="row_d">
              <div class="collection_premium_text_col">
                <div class="heading_col">
                  <h1 class="page_heading">
                    Big Collection of Premium Mockups at the Best Price
                  </h1>
                  <p>Weekly update with freshly baked premium mockups</p>
                </div>
                <div class="premium_mockups_content">
                  <div class="premium_mockups_inner">
                    <div class="column_heading_container">
                      <h2
                        class="section_heading section_heading_primary section_heading_bold"
                      >
                        Get 96% Off
                        <span class="section_heading_medium default_color"
                          >on premium mockups</span
                        >
                      </h2>
                      <p class="primary_color">As low as $0.14 a mockup</p>
                      <a href="<?php echo site_url('get-subscription');?>" class="btn_primary _btn"
                        >Get premium</a
                      >
                    </div>
                    <div class="get_best_container">
                      <h2 class="section_heading">
                        Get the Best out of this deal.
                      </h2>
                      <ul>
                        <li>
                          <img
                            src="<?php echo get_template_directory_uri();?>/assets/images/premium_mockups_subscription__mark.png"
                            alt=""
                          />
                          <p>50% Off on Bundle Mockups</p>
                        </li>
                        <li>
                          <img
                            src="<?php echo get_template_directory_uri();?>/assets/images/premium_mockups_subscription__mark.png"
                            alt=""
                          />
                          <p>30% Off on Customize Mockup</p>
                        </li>
                        <li>
                          <img
                            src="<?php echo get_template_directory_uri();?>/assets/images/premium_mockups_subscription__mark.png"
                            alt=""
                          />
                          <p>Commercial and Personal Use</p>
                        </li>
                        <li>
                          <img
                            src="<?php echo get_template_directory_uri();?>/assets/images/premium_mockups_subscription__mark.png"
                            alt=""
                          />
                          <p>Free Extended Commercial License</p>
                        </li>
                        <li>
                          <img
                            src="<?php echo get_template_directory_uri();?>/assets/images/premium_mockups_subscription__mark.png"
                            alt=""
                          />
                          <p>Priority email support</p>
                        </li>
                        <li>
                          <img
                            src="<?php echo get_template_directory_uri();?>/assets/images/premium_mockups_subscription__mark.png"
                            alt=""
                          />
                          <p>
                            <strong>Unlimited downloads every month</strong>
                          </p>
                        </li>
                        <li>
                          <img
                            src="<?php echo get_template_directory_uri();?>/assets/images/premium_mockups_subscription__mark.png"
                            alt=""
                          />
                          <p>Custom Mockups wishlist</p>
                        </li>
                        <li>
                          <img
                            src="<?php echo get_template_directory_uri();?>/assets/images/premium_mockups_subscription__mark.png"
                            alt=""
                          />
                          <p>First to know about daily free mockups</p>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card_container">
                <div class="row_d">

                  <?php
                    $taxonomy = 'mockup_category'; // Replace with your custom taxonomy name
                    $parent_category_slug = 'premium-mockups'; // Replace with the slug of the parent category
                
                    // Define the tax_query to retrieve child terms of the specified parent category
                    $args = array(
                        'taxonomy' => $taxonomy,
                        'child_of' => 0, // Set to 0 to get top-level terms
                        'parent' => get_term_by('slug', $parent_category_slug, $taxonomy)->term_id, // Get the parent term ID
                        'hide_empty' => false, // Set to false to retrieve even if they are empty
                    );
                
                    $subcategories = get_terms($args);
                    if (!empty($subcategories)) {
                      foreach ($subcategories as $subcategory) {
                        if(get_term_meta($subcategory->term_id, '_custom_is_show_cat', true) == 1){
                        $image_id = get_term_meta($subcategory->term_id, '_custom_product_gallery', true);
                        $image_url = wp_get_attachment_image_src($image_id, 'full')[0];
                        ?>
                        <div class="card_item">
                          <div class="card_inner pixpine_card_border get-product" cat-slug="<?=$subcategory->slug?>"  page-no="1">
                            <p>
                              <a href="<?php echo site_url();?>?cat=premium-mockup&type=category&term-name=<?php echo $subcategory->name;?>&s="><?=$subcategory->name?></a>
                            </p>
                            <div class="img_col">
                              <img src="<?php echo $image_url;?>" alt="" />
                            </div>
                          </div>
                        </div>
                        <?php
                        }
                      }
                    }
                    ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section id="premium_mockups_page" class="recently_added_premium_mockups">
        <div class="container">
          <div class="heading_col text-center">
            <h2 class="section_heading">Recently Added Premium Mockups</h2>
          </div>
          <div class="tab_img_container">
            <?php 
            $parent_category_slug = 'premium-mockups';
            echo show_sub_cats_in_listing_page($parent_category_slug); 
            ?>
            <!-- <ul class="nav nav-tabs" role="tablist">
              <li class="nav-item" role="presentation">
                <button
                  class="nav-link active"
                  id="stationery_tab"
                  data-bs-toggle="tab"
                  data-bs-target="#stationery_cards"
                  type="button"
                  role="tab"
                  aria-controls="stationery_cards"
                  aria-selected="true"
                >
                  Stationery
                </button>
              </li>
              <li class="nav-item" role="presentation">
                <button
                  class="nav-link"
                  id="boxes_tab"
                  data-bs-toggle="tab"
                  data-bs-target="#boxes"
                  type="button"
                  role="tab"
                  aria-controls="boxes"
                  aria-selected="false"
                >
                  Boxes
                </button>
              </li>
              <li class="nav-item" role="presentation">
                <button
                  class="nav-link"
                  id="jar_tab"
                  data-bs-toggle="tab"
                  data-bs-target="#jar"
                  type="button"
                  role="tab"
                  aria-controls="jar"
                  aria-selected="false"
                >
                  Jar
                </button>
              </li>
              <li class="nav-item" role="presentation">
                <button
                  class="nav-link"
                  id="bottles_tab"
                  data-bs-toggle="tab"
                  data-bs-target="#bottles"
                  type="button"
                  role="tab"
                  aria-controls="bottles"
                  aria-selected="false"
                >
                  Bottles
                </button>
              </li>
              <li class="nav-item" role="presentation">
                <button
                  class="nav-link"
                  id="vehicle_tab"
                  data-bs-toggle="tab"
                  data-bs-target="#vehicle"
                  type="button"
                  role="tab"
                  aria-controls="vehicle"
                  aria-selected="false"
                >
                  Vehicle
                </button>
              </li>
              <li class="nav-item" role="presentation">
                <button
                  class="nav-link"
                  id="t-shirts_tab"
                  data-bs-toggle="tab"
                  data-bs-target="#t-shirts"
                  type="button"
                  role="tab"
                  aria-controls="t-shirts"
                  aria-selected="false"
                >
                  T-Shirts
                </button>
              </li>
              <li class="nav-item" role="presentation">
                <button
                  class="nav-link"
                  id="books_tab"
                  data-bs-toggle="tab"
                  data-bs-target="#books"
                  type="button"
                  role="tab"
                  aria-controls="books"
                  aria-selected="false"
                >
                  Books
                </button>
              </li>
              <li class="nav-item" role="presentation">
                <button
                  class="nav-link"
                  id="apparel_tab"
                  data-bs-toggle="tab"
                  data-bs-target="#apparel"
                  type="button"
                  role="tab"
                  aria-controls="apparel"
                  aria-selected="false"
                >
                  Apparel
                </button>
              </li>
              <li class="nav-item" role="presentation">
                <button
                  class="nav-link"
                  id="advertising_tab"
                  data-bs-toggle="tab"
                  data-bs-target="#advertising"
                  type="button"
                  role="tab"
                  aria-controls="advertising"
                  aria-selected="false"
                >
                  Advertising
                </button>
                <div class="dropdown">
              <button
                class="dropdown-toggle"
                type="button"
                data-bs-toggle="dropdown"
                aria-expanded="false"
              >
                <img src="<?php echo get_template_directory_uri();?>/assets/images/tab_down_arrow.png" alt="" />
              </button>

              <ul class="dropdown-menu dropdown-menu-end">
                <li><a class="dropdown-item" href="">Cup</a></li>
                <li><a class="dropdown-item" href="">Cosmetic</a></li>
                <li><a class="dropdown-item" href="">Flyers</a></li>
                <li><a class="dropdown-item" href="">Frame</a></li>
                <li><a class="dropdown-item" href="">Packaging</a></li>
                <li><a class="dropdown-item" href="">Poster</a></li>
                <li><a class="dropdown-item" href="">Shopping Bag</a></li>
                <li><a class="dropdown-item" href="">Stationery</a></li>
              </ul>
            </div>
              </li>
            </ul> -->
            <div class="tab-content">
              <div
                class="tab-pane fade show active"
                id="stationery_cards"
                role="tabpanel"
                aria-labelledby="stationery_tab"
              >
                <div class="tab_inner_content premium-mockup-paginated-products-and-pagination">
                  <div class="card_container row_d justify-content-center">

                  <?php
                    $args = array(
                      'post_type' => 'post', // Replace with the name of your CPT
                      'posts_per_page' => 20, // Number of posts to display (adjust as needed)
                      'order' => 'DESC', // Sorting order (DESC for latest first, ASC for oldest first)
                      'tax_query' => array(
                        array(
                            'taxonomy' => 'mockup_category', // Replace with the name of your custom category taxonomy
                            'field' => 'slug', // You can use 'term_id', 'name', or 'slug'
                            'terms' => 'premium-mockups', // Replace with the slug of the custom category term you want to query
                        ),
                      ),
                    );

                    $custom_query = new WP_Query($args);

                    if ($custom_query->have_posts()) {
                      $count = 0;
                      while ($custom_query->have_posts()) {
                        $custom_query->the_post();
                        $thumbnail_url = get_the_post_thumbnail_url(get_the_ID());
                        $_custom_product_gallery = get_post_meta(get_the_ID(), '_custom_product_gallery', true);
                        $_custom_product_gallery = !empty($_custom_product_gallery) ? explode(',', $_custom_product_gallery) : array();
                        $thumbnail_url2 = wp_get_attachment_image_url( $_custom_product_gallery[0],'full');
                        // $thumbnail_url = get_the_post_thumbnail_url(get_the_ID(), 'thumbnail');
                      ?>


                    <div class="card_item" >
                      <a href="<?php echo get_the_permalink();?>">
                        <div class="item_a">
                          <div class="inner_col">
                            <div class="img_col pixpine_card_border">
                              <img src="<?php echo $thumbnail_url;?>"
                              img1="<?php echo $thumbnail_url;?>" 
                              img2="<?php echo $thumbnail_url2;?>" 
                              class="premium-img-hover-effect"
                              alt="" />
                            </div>
                            <div class="text_col">
                              <h4 class="default_color"><?php echo get_the_title();?></h4>
                              <p class="primary_color">Premium</p>
                            </div>
                          </div>
                        </div>
                      </a>
                    </div>

                  <?php
                    }
                    // Restore the global post object
                    wp_reset_postdata();
                  } else {
                    // No posts found
                    echo 'No posts found.';
                  }
                  ?>

                  </div>
                  <?php
                    $current_page = 1;
                    $total_page = $custom_query->max_num_pages;
                    if($total_page > 1){
                  ?>
                  <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center">
                      <?php 
                      if($current_page != 1){
                      ?>
                      <li class="page-item left_button get-product" cat-slug="premium-mockups" page-no="<?php echo $current_page-1;?>">
                        <span class="page-link" >
                          <img src="<?php echo get_template_directory_uri();?>/assets/images/pagination_left_icon.png" alt="" />
                        </span>
                      </li>
                      <?php } ?>

                      <?php
                      for($i=-3; $i<=3; $i++){
                        $page_no = $current_page+$i;
                        if(($page_no>0) && ($page_no<=$total_page)){
                      ?>
                      <li class="page-item get-product" cat-slug="premium-mockups" page-no="<?php echo $page_no;?>">
                        <span class="page-link" ><?php echo $page_no;?></span>
                      </li>
                      <?php } } ?>
                      <?php 
                      if($page_no < $total_page){ 
                      ?>
                      <li class="page-item get-product" cat-slug="premium-mockups" page-no="<?php echo $total_page;?>">
                        <span class="page-link" >...<?php echo $total_page;?></span>
                      </li>
                      <?php } ?>
                      <?php 
                      if($current_page != $total_page){
                        ?>
                      <li class="page-item right_button get-product" cat-slug="premium-mockups" page-no="<?php echo $current_page+1;?>">
                        <span class="page-link" >
                          <img src="<?php echo get_template_directory_uri();?>/assets/images/pagination_right_icon.png" alt="" />
                        </span>
                      </li>
                      <?php } ?>
                    </ul>
                  </nav>
                  <?php } ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- Never miss out form section -->
      <?php include get_template_directory() .'/includes/never-miss-out-form.php';?>

      
    </main>


    <!-- Premium Modal -->
    <?php include get_template_directory() .'/includes/premium-modal.php';?>
    <input type="hidden" value="1" id="hidden-show-premium-modal">