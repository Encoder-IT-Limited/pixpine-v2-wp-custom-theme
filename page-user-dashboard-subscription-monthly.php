<?php 
/*
Template Name: User Dashboard Subscription Monthly
*/
get_header();
global $current_user;
get_currentuserinfo();
$user_id= $current_user->ID; 
$results = $wpdb->get_results("SELECT * FROM ".$wpdb->prefix."pixpine_subscriptions WHERE user_id='" . $user_id . "' ORDER BY id DESC", ARRAY_A);
// $results2 = $wpdb->get_results("SELECT * FROM ".$wpdb->prefix."pixpine_subscriptions WHERE user_id='" . $user_id . "' and subscripton_plan='yearly' ORDER BY id DESC", ARRAY_A);
if(isset($results[0]['status'])){
  if($results[0]['status'] == 'Active'){
    $sub_plan = $results[0]['subscripton_plan'];
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
  <section class="dashboard_section dashboard__subscription">
    <div class="container">
      <div class="section_width">
      <?php

            if(isset($_GET['type'])){
              if($_GET['type'] == 'new-subscription'){
                echo '
                <div class="alert alert-success" role="alert">
                Thank you for your recent purchase, Your '.ucfirst($sub_plan).' Subscription is activated.
                </div>
                ';                
              }
            }
        ?>
      
        <div class="dashboard_main d-flex">
          <div class="dashboard_navbar">
            <!-- Dashboard inner menu -->
            <?php $currentPage = 'dashboard__subscription'; include get_template_directory() .'/includes/dashboard-menu.php';?>
          </div>

          <div class="content__column">
          <?php if(!empty($results)) { 
            foreach($results as $row){
            
            ?>
            <div class="subscription__description">
              <ul>
                <li>
                  <p>Subscription Type: <span><?php echo $row['subscripton_plan'];?></span></p>
                </li>
                <li>
                  <p>Subscription Date: <span><?php echo date('d F Y',strtotime($row['created_at']));?></span></p>
                </li>
                <li>
                  <p>Subscription Expire: <span><?php echo date('d F Y',strtotime($row['end_date']));?></span></p>
                </li>
                <li>
                  <p>Download Limit: <span><?php echo ($row['subscripton_plan'] == 'monthly')? "56":"UNLIMITED";?></span></p>
                </li>
                <li>
                  <p>Downloads Remaining: <span><?php echo ($row['subscripton_plan'] == 'monthly')? get_user_meta($user_id, 'available_download', true):"UNLIMITED";?></span></p>
                </li>
                   <li>
                  <p>Status: <span><?php echo $row['status']; ?></span></p>
                </li>
              </ul>
            </div>
            <div class="btn_container">
              <?php if( $row['status'] =='Active') {?>
                <a class="_btn btn_primary" href="<?php echo site_url('/premium-mockups/');?>">Browse Premium</a>
                 <button class="_btn btn_outline cancelSub" subscriptionid="<?php echo $row['subscription_id']; ?>">Cancel Subscription</button>
                <?php } ?>
            </div>
            <?php } }?>

              <div id="warning_message">
                <h5>Important Message</h5>
                <p>
                   After canceling your subscription, your download list will no longer be available after your subscription expiry.
                </p>
              </div>
          </div>
            
        </div>
      </div>
    </div>
  </section>

  <!-- <div id="warning_message" class="modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-body text-center">
          <h5>Important Message</h5>
          <p>
            After canceling your subscription, your download list will no longer be available after your subscription expiry.
          </p>
        </div>
      </div>
    </div>
  </div> -->




</main>

<!-- Footer -->
<?php get_footer();?>
