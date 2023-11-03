<?php 
/*
Template Name: User Dashboard Subscription Yearly
*/
get_header();

global $current_user;

$user_id= $current_user->ID; 
$results = $wpdb->get_results("SELECT * FROM ".$wpdb->prefix."pixpine_subscriptions WHERE user_id='" . $user_id . "' and subscripton_plan='yearly'", ARRAY_A);
?>

<main>
  <section class="banner_section">
    <div class="container">
       
        <!-- Banner search form -->
        <?php include get_template_directory() .'/includes/search-form.php';?>

          
    </div>
  </section>
  <section class="dashboard_section dashboard__subscription">
    <div class="container">
      <div class="section_width">
        <div class="dashboard_main d-flex">
          <div class="dashboard_navbar">
            

          <!-- Dashboard inner menu -->
          <?php $currentPage = 'dashboard__subscription'; include get_template_directory() .'/includes/dashboard-menu.php';?>

          </div>
               <?php if(!empty($results)) { 
            foreach($results as $row){
            
            ?>
          <div class="content__column">
            <div class="subscription__description">
              <ul>
                <li><p>Subscription Type: <span>YEARLY</span></p></li>
                <li><p>Subscription Date: <span><?php echo date('d F Y',strtotime($row['created_at']));?></span></p></li>
                <li><p>Subscription Expire: <span><?php echo date('d F Y',strtotime($row['end_date']));?></span></p></li>
                <li><p>Download Limit: <span>UNLIMITED</span></p></li>
                <li><p>Downloads Remaining: <span>UNLIMITED</span></p></li>
              </ul>
            </div>
            <div class="btn_container">
              <button class="_btn btn_primary">Browse Premium</button>
              <button class="_btn btn_outline">Cancel Subscription</button>
            </div>
          </div>
            <?php } }?>
        </div>
      </div>
    </div>
  </section>
  
</main>

<!-- Footer -->
<?php get_footer();?>
