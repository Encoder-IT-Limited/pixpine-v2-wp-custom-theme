<?php 
/*
Template Name: Order Confirmation
*/
get_header();

$user_id = get_current_user_id();
$msg = '';


?>

<main>
  <section class="banner_section">
    <div class="container">
       
        <!-- Banner search form -->
        <?php include get_template_directory() .'/includes/search-form.php';?>

          
    </div>
  </section>
  <section class="dashboard_section billing__information">
    <div class="container">
      <div class="section_width">
        <div class="dashboard_main d-flex">
          <div class="dashboard_navbar">

          <!-- Dashboard inner menu -->
          <?php $currentPage = 'billing__information'; include 'includes/dashboard-menu.php';?>

          </div>
          <div class="content__column">
           <h2 class="alert alert-success">Thank you. Your order has been received.</h2>
          </div>
        </div>
      </div>
    </div>
  </section>
  
</main>

<!-- Footer -->
<?php get_footer();?>
