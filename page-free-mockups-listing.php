<?php 
/*
Template Name: Free Mockups Listing
*/
get_header();
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
  <section id="free_mockups_page" class="recently_added_free_mockups">
    <div class="container">
      <div class="heading_col text-center">
        <h1 class="section_heading">
          100% free mockups download directly to your desktop
        </h1>
        <p>
          These freebies are exclusively available only on Pixpine.com, you can
          use our free mockups for commercial and personal projects.
        </p>
      </div>
      <div class="separetor_container">
        <div class="separetor"></div>
      </div>
      <div class="tab_img_container">
          
        <?php 
        $parent_category_slug = 'free-mockups';
        echo show_sub_cats_in_listing_page($parent_category_slug); 
        ?>
        <input type="hidden" id="mockup-type" value="free-mockups">
        <input type="hidden" id="post-per-page" value="13">
        <input type="hidden" id="html-output-class" value="free-mockup-paginated-products-and-pagination">

        <div class="tab-content">
          <div
            class="tab-pane fade show active"
            id="business_cards_free"
            role="tabpanel"
            aria-labelledby="business_cards_tab_free"
          >
            <div class="tab_inner_content free-mockup-paginated-products-and-pagination">
              <div class="card_container row_d justify-content-center">
                <?php
                $args = array(
                  'post_type' => 'product', // Replace with the name of your CPT
                  'posts_per_page' => 13, // Number of posts to display (adjust as needed)
                  'order' => 'DESC', // Sorting order (DESC for latest first, ASC for oldest first)
                  'tax_query' => array(
                    array(
                        'taxonomy' => 'mockup_category', // Replace with the name of your custom category taxonomy
                        'field' => 'slug', // You can use 'term_id', 'name', or 'slug'
                        'terms' => 'free-mockups', // Replace with the slug of the custom category term you want to query
                    ),
                  ),
                );

                $custom_query = new WP_Query($args);

                if ($custom_query->have_posts()) {
                  $count = 0;
                  while ($custom_query->have_posts()) {
                    $custom_query->the_post();
                    $thumbnail_url = get_the_post_thumbnail_url(get_the_ID());
                    // $thumbnail_url = get_the_post_thumbnail_url(get_the_ID(), 'thumbnail');
                  ?>
                    <?php
                    $count++;
                    if($count ==1){
                    ?>
                      <div class="card_item get_off">
                        <div class="inner_col">
                          <div class="get_premium_mockups_section">
                            <div
                              class="premium_mockups_inner d-flex justify-content-between align-items-center"
                            >
                              <div class="premium_text">
                                <h2
                                  class="section_heading section_heading_primary section_heading_bold"
                                >
                                  Get 96% Off
                                  <span class="section_heading_medium default_color"
                                    >on premium mockups</span
                                  >
                                </h2>
                                <span class="primary_color"
                                  >As low as $0.14 a mockup</span
                                >
                                <a href="<?php echo site_url('get-subscription');?>" class="btn_primary _btn"
                                  >Get premium</a
                                >
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    <?php }elseif($count==7){ ?>
                      <div class="card_item ad">
                        <div class="inner_col">
                          <img src="<?php echo get_template_directory_uri();?>/assets/images/google_ad.png" alt="" />
                        </div>
                      </div>
                    <?php }elseif($count==12){ ?>
                      <div class="card_item ad">
                        <div class="inner_col">
                          <img src="<?php echo get_template_directory_uri();?>/assets/images/affiliate_ad_second.png" alt="" />
                        </div>
                      </div>
                    <?php } ?>
      
                    <div class="card_item">
                      <a href="<?php echo site_url('free-mockup-product').'?id='.get_the_ID();?>">
                        <div class="inner_col">
                          <div class="img_col pixpine_card_border">
                            <img src="<?php echo $thumbnail_url;?>" alt="" />
                          </div>
                          <div class="text_col">
                            <h4 class="default_color"><?php echo get_the_title();?></h4>
                            <p class="primary_color">Free</p>
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
                  <li class="page-item left_button get-product" cat-slug="free-mockups" page-no="<?php echo $current_page-1;?>">
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
                  <li class="page-item get-product" cat-slug="free-mockups" page-no="<?php echo $page_no;?>">
                    <span class="page-link" ><?php echo $page_no;?></span>
                  </li>
                  <?php } } ?>
                  <?php 
                  if($page_no < $total_page){ 
                  ?>
                  <li class="page-item get-product" cat-slug="free-mockups" page-no="<?php echo $total_page;?>">
                    <span class="page-link" >...<?php echo $total_page;?></span>
                  </li>
                  <?php } ?>
                  <?php 
                  if($current_page != $total_page){
                    ?>
                  <li class="page-item right_button get-product" cat-slug="free-mockups" page-no="<?php echo $current_page+1;?>">
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

<!-- Footer -->
<?php get_footer();?>
