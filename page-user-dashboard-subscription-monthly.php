<?php 
/*
Template Name: User Dashboard Subscription Monthly
*/
get_header();
global $current_user;
get_currentuserinfo();
$user_id= $current_user->ID; 
$results = $wpdb->get_results("SELECT * FROM ".$wpdb->prefix."pixpine_subscriptions WHERE user_id='" . $user_id . "' and subscripton_plan='monthly'", ARRAY_A);
 $results2 = $wpdb->get_results("SELECT * FROM ".$wpdb->prefix."pixpine_subscriptions WHERE user_id='" . $user_id . "' and subscripton_plan='yearly'", ARRAY_A);

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
                <li>
                  <p>Subscription Type: <span>MONTHLY</span></p>
                </li>
                <li>
                  <p>Subscription Date: <span><?php echo date('d F Y',strtotime($row['created_at']));?></span></p>
                </li>
                <li>
                  <p>Subscription Expire: <span><?php echo date('d F Y',strtotime($row['end_date']));?></span></p>
                </li>
                <li>
                  <p>Download Limit: <span>56</span></p>
                </li>
                <li>
                  <p>Downloads Remaining: <span>35</span></p>
                </li>
                   <li>
                  <p>Status: <span><?php echo $row['status']; ?></span></p>
                </li>
              </ul>
            </div>
            <div class="btn_container">
              <a class="_btn btn_primary" href="<?php echo site_url('/premium-mockups/');?>">Browse Premium</a>
                <?php if( $row['status'] =='Active') {?>
                 <button class="_btn btn_outline cancelSub" subscriptionid="<?php echo $row['subscription_id']; ?>">Cancel Subscription</button>
                <?php } ?>
            </div>
          </div>
            <?php } }?>
              <?php if(!empty($results2)) { 
            foreach($results2 as $row2){
            
            ?>
          <div class="content__column">
            <div class="subscription__description">
              <ul>
                <li><p>Subscription Type: <span>YEARLY</span></p></li>
                <li><p>Subscription Date: <span><?php echo date('d F Y',strtotime($row2['created_at']));?></span></p></li>
                <li><p>Subscription Expire: <span><?php echo date('d F Y',strtotime($row2['end_date']));?></span></p></li>
                <li><p>Download Limit: <span>UNLIMITED</span></p></li>
                <li><p>Downloads Remaining: <span>UNLIMITED</span></p></li>
                   <li>
                  <p>Status: <span><?php echo $row['status']; ?></span></p>
                </li>
              </ul>
            </div>
            <div class="btn_container">
              <a class="_btn btn_primary" <?php echo site_url('/premium-mockups/');?>>Browse Premium</a>
                  <?php if( $row2['status'] =='Active') {?>
              <button class="_btn btn_outline cancelSub" subscriptionid="<?php echo $row2['subscription_id']; ?>">Cancel Subscription</button>
                <?php } ?>
            </div>
          </div>
            <?php } }?>
        </div>
      </div>
    </div>
  </section>

  <div id="warning_message" class="modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-body text-center">
          <h5>Important Message</h5>
          <p>
            After canceling your subscription, your download list will no longer be available after your subscription expiry.
          </p>
        </div>
      </div>
    </div>
  </div>




</main>

<!-- Footer -->
<?php get_footer();?>
