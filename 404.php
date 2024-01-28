<?php 
/*
Template Name: Request
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
      <section class="request_for_mockup_section">
        <div class="container">
          <div class="row">
            <div class="col-md-8 mx-auto text-center">
				      <h1 class="page_heading" style="font-size: 20px; font-weight: 400">The page you are looking for doesn't exist</h1>
              <p class="mt-5">
                <a class="_btn btn_primary" href="<?php echo site_url('/premium-mockups/');?>">Browse Premium</a>
              </p>
            </div>
          </div>
        </div>
      </section>
    </main>

<!-- Footer -->
<?php get_footer();?>
