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
            <div class="card_item">
              <a href="">
                <div class="card_inner pixpine_card_border">
                  <p href="">Apparel</p>
                  <div class="img_col">
                    <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                  </div>
                </div>
              </a>
            </div>
            <div class="card_item">
              <a href="">
                <div class="card_inner pixpine_card_border">
                  <p href="">Packaging Box</p>
                  <div class="img_col">
                    <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                  </div>
                </div>
              </a>
            </div>
            <div class="card_item">
              <a href="">
                <div class="card_inner pixpine_card_border">
                  <p href="">Food</p>
                  <div class="img_col">
                    <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                  </div>
                </div>
              </a>
            </div>
            <div class="card_item">
              <a href="">
                <div class="card_inner pixpine_card_border">
                  <p href="">Bags</p>
                  <div class="img_col">
                    <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                  </div>
                </div>
              </a>
            </div>
            <div class="card_item">
              <a href="">
                <div class="card_inner pixpine_card_border">
                  <p href="">Fabric</p>
                  <div class="img_col">
                    <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                  </div>
                </div>
              </a>
            </div>
            <div class="card_item">
              <a href="">
                <div class="card_inner pixpine_card_border">
                  <p href="">Stationery</p>
                  <div class="img_col">
                    <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                  </div>
                </div>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="bundle_mockups">
    <div class="container">
      <div class="card_container row_d">


      <?php
      $args = array(
        'post_type' => 'product', // Replace with the name of your CPT
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
          <div
            type="button"
            data-bs-toggle="modal"
            data-bs-target="#bundleModal"
          >
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
          </div>
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
      <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
          <li class="page-item left_button">
            <a class="page-link" href="#">
              <img src="<?php echo get_template_directory_uri();?>/assets/images/pagination_left_icon.png" alt="" />
            </a>
          </li>
          <li class="page-item">
            <a class="page-link" href="#">1</a>
          </li>
          <li class="page-item">
            <a class="page-link" href="#">2</a>
          </li>
          <li class="page-item">
            <a class="page-link" href="#">3</a>
          </li>
          <li class="page-item">
            <a class="page-link" href="#">4</a>
          </li>
          <li class="page-item">
            <a class="page-link" href="#">5</a>
          </li>
          <li class="page-item">
            <a class="page-link" href="#">...100</a>
          </li>
          <li class="page-item right_button">
            <a class="page-link" href="#">
              <img src="<?php echo get_template_directory_uri();?>/assets/images/pagination_right_icon.png" alt="" />
            </a>
          </li>
        </ul>
      </nav>
    </div>
  </section>

  <!-- Never miss out form section -->
  <?php include get_template_directory() .'/includes/never-miss-out-form.php';?>
</main>


<!-- Bundle Modal -->
<?php include get_template_directory() .'/includes/bundle-modal.php';?>



<!-- Footer -->
<?php get_footer();?>
