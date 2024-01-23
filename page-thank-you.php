<?php
/*
Template Name: Thank You - Subscription
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
      <section class="request_for_mockup_section">
        <div class="container">
          <div class="row">
            <div class="col-md-8 mx-auto text-center">
              
              <p class="mt-5">
              Thank you for your recent purchase, Your <?=ucfirst($sub_plan);?> Subscription is activated.
              </p>
            </div>
          </div>
        </div>
      </section>
    </main>

<!-- Footer -->
<?php get_footer();?>