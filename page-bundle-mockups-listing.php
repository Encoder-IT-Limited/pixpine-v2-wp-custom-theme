<?php 
/*
Template Name: Bundle Mockups Listing
*/
get_header();
?>
<!-- Header End -->

<main>
  <section class="banner_section">
    <div class="container">
      <!-- Banner search form -->
      <?php include get_template_directory() .'/includes/search-form.php';?>
      <input type="hidden" id="mockup-type" value="bundle-mockups">
      <input type="hidden" id="post-per-page" value="20">
      <input type="hidden" id="html-output-class" value="bundle-mockup-paginated-products-and-pagination">

    </div>
  </section>
  <section class="bundle_page_collection_premium collection_premium_section">
    <div class="container">
      <div class="row_d">
        <div class="collection_premium_text_col">
          <div class="heading_col">
            <h1 class="page_heading">
              With Our Bundle Mockups, Limitless Creativity
            </h1>
            <p>High-quality ready to use assets.</p>
          </div>
          <div class="premium_mockups_content">
            <div class="premium_mockups_inner">
              <div class="column_heading_container">
                <h2
                  class="section_heading section_heading_primary section_heading_bold"
                >
                  Get 50% Off
                  <span class="section_heading_medium default_color"
                    >on bundle mockups</span
                  >
                </h2>
                <p class="primary_color">
                  Save big with our yearly subscription
                </p>
                <a href="<?php echo site_url('get-subscription');?>" class="btn_primary _btn"
                  >Get Premium</a
                >
              </div>
            </div>
          </div>
        </div>
        <div class="card_container">
          <div class="row_d">
          <?php
          $taxonomy = 'mockup_category'; // Replace with your custom taxonomy name
          $parent_category_slug = 'bundle-mockups'; // Replace with the slug of the parent category

          // Define the tax_query to retrieve child terms of the specified parent category
          $args = array(
              'taxonomy' => $taxonomy,
              'child_of' => 0, // Set to 0 to get top-level terms
              'parent' => get_term_by('slug', $parent_category_slug, $taxonomy)->term_id, // Get the parent term ID
              'hide_empty' => false, // Set to false to retrieve even if they are empty
          );

          $subcategories = get_terms($args);
          if (!empty($subcategories)) {
            $count = 0;
            $tmp_cat = [];
            foreach ($subcategories as $subcategory) {
              if(get_term_meta($subcategory->term_id, '_custom_is_show_cat', true) == 1){
                $image_id = get_term_meta($subcategory->term_id, '_custom_product_gallery', true);
                $image_url = wp_get_attachment_image_src($image_id, 'full')[0];
                echo '<div class="card_item">
                    <div class="card_inner pixpine_card_border get-product" cat-slug="'.$subcategory->slug.'" page-no="1">
                      <p href="">'.$subcategory->name.'</p>
                      <div class="img_col">
                        <img src="'.$image_url.'" alt="" />
                      </div>
                    </div>
                </div>';
              }
            }
          }
          ?>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="bundle_mockups">
    <div class="container bundle-mockup-paginated-products-and-pagination">
      <div class="card_container row_d">


      <?php
      $args = array(
        // 'post_type' => 'product', // Replace with the name of your CPT
        'posts_per_page' => 20, // Number of posts to display (adjust as needed)
        'order' => 'DESC', // Sorting order (DESC for latest first, ASC for oldest first)
        'tax_query' => array(
          array(
              'taxonomy' => 'mockup_category', // Replace with the name of your custom category taxonomy
              'field' => 'slug', // You can use 'term_id', 'name', or 'slug'
              'terms' => 'bundle-mockups', // Replace with the slug of the custom category term you want to query
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

        <div class="card_item">
          <a href="<?php echo get_the_permalink();?>">
            <!-- <div type="button" data-bs-toggle="modal" data-bs-target="#bundleModal"> -->
              <div class="inner_col">
                <div class="img_col pixpine_card_border">
                  <img src="<?php echo $thumbnail_url;?>" alt="" />
                </div>
                <div class="text_col">
                  <h4 class="default_color">
                  <?php echo get_the_title();?>
                  </h4>
                  <p class="primary_color">Bundle</p>
                </div>
              </div>
            <!-- </div> -->
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
          <li class="page-item left_button get-product" cat-slug="bundle-mockups" page-no="<?php echo $current_page-1;?>">
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
          <li class="page-item get-product" cat-slug="bundle-mockups" page-no="<?php echo $page_no;?>">
            <span class="page-link" ><?php echo $page_no;?></span>
          </li>
          <?php } } ?>
          <?php 
          if($page_no < $total_page){ 
          ?>
          <li class="page-item get-product" cat-slug="bundle-mockups" page-no="<?php echo $total_page;?>">
            <span class="page-link" >...<?php echo $total_page;?></span>
          </li>
          <?php } ?>
          <?php 
          if($current_page != $total_page){
            ?>
          <li class="page-item right_button get-product" cat-slug="bundle-mockups" page-no="<?php echo $current_page+1;?>">
            <span class="page-link" >
              <img src="<?php echo get_template_directory_uri();?>/assets/images/pagination_right_icon.png" alt="" />
            </span>
          </li>
          <?php } ?>
        </ul>
      </nav>
      <?php } ?>
    </div>
  </section>

  <!-- Never miss out form section -->
  <?php include get_template_directory() .'/includes/never-miss-out-form.php';?>
</main>


<!-- Bundle Modal -->
<?php include get_template_directory() .'/includes/bundle-modal.php';?>



<!-- Footer -->
<?php get_footer();?>
