<?php 
/*
Template Name: User Dashboard Billing Information
*/
get_header();

$user_id = get_current_user_id();
$msg = '';

if(isset($_POST['submit'])){

  if (isset($_POST['client_form_nonce']) && wp_verify_nonce($_POST['client_form_nonce'], 'client_form_nonce')) {

    $billing_f_name = sanitize_text_field($_POST['billing_f_name']);
    $billing_l_name = sanitize_text_field($_POST['billing_l_name']);
    $billing_email = sanitize_email($_POST['billing_email']);
    $billing_company = sanitize_text_field($_POST['billing_company']);
    $billing_country = sanitize_text_field($_POST['billing_country']);
    $billing_address = sanitize_text_field($_POST['billing_address']);
    $billing_city = sanitize_text_field($_POST['billing_city']);
    $billing_state = sanitize_text_field($_POST['billing_state']);
    $billing_zip = sanitize_text_field($_POST['billing_zip']);

    update_user_meta($user_id, 'billing_f_name', $billing_f_name);
    update_user_meta($user_id, 'billing_l_name', $billing_l_name);
    update_user_meta($user_id, 'billing_email', $billing_email);
    update_user_meta($user_id, 'billing_company', $billing_company);
    update_user_meta($user_id, 'billing_country', $billing_country);
    update_user_meta($user_id, 'billing_address', $billing_address);
    update_user_meta($user_id, 'billing_city', $billing_city);
    update_user_meta($user_id, 'billing_state', $billing_state);
    update_user_meta($user_id, 'billing_zip', $billing_zip);

    $msg = 'success';
  }
}
$billing_f_name = get_user_meta($user_id, 'billing_f_name', true);
$billing_l_name = get_user_meta($user_id, 'billing_l_name', true);
$billing_email = get_user_meta($user_id, 'billing_email', true);
$billing_company = get_user_meta($user_id, 'billing_company', true);
$billing_country = get_user_meta($user_id, 'billing_country', true);
$billing_address = get_user_meta($user_id, 'billing_address', true);
$billing_city = get_user_meta($user_id, 'billing_city', true);
$billing_state = get_user_meta($user_id, 'billing_state', true);
$billing_zip = get_user_meta($user_id, 'billing_zip', true);


if($billing_f_name == ''){
  $billing_f_name = get_user_meta($user_id, 'first_name', true);
}
if($billing_l_name == ''){
  $billing_l_name = get_user_meta($user_id, 'last_name', true);
}
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
            <form action="#" method="post">
              <?php
                if($msg != ''){
                  if($msg == 'success'){
                    echo '
                    <div class="alert alert-success" role="alert">
                      Address saved successful.
                    </div>
                    ';
                  }elseif($msg == 'fail'){
                    echo '
                    <div class="alert alert-warning" role="alert">
                      Failed!! Try again later.
                    </div>
                    ';
                  }
                }
              ?>
              <?php wp_nonce_field('client_form_nonce', 'client_form_nonce'); ?>
              <div class="full_width_container">
                <div class="half_width input_group">
                  <label for="">First Name<span>*</span></label>
                  <input type="text" name="billing_f_name" value="<?php echo $billing_f_name;?>" id="" required>
                </div>
                <div class="half_width input_group">
                  <label for="">Last Name<span>*</span></label>
                  <input type="text" name="billing_l_name" value="<?php echo $billing_l_name;?>" id="" required>
                </div>
              </div>
              <div class="full_width_container">
                <div class="half_width input_group">
                  <label for="">Email<span>*</span></label>
                  <input type="email" name="billing_email" value="<?php echo $billing_email;?>" id="" required>
                </div>
              </div>
              <div class="full_width_container">
                <div class="half_width input_group">
                  <label for="">Company</label>
                  <input type="text" name="billing_company" value="<?php echo $billing_company;?>" id="">
                </div>
                <div class="half_width input_group">
                  <label for="">Country<span>*</span></label>
                  <input type="text" name="billing_country" value="<?php echo $billing_country;?>" id="" required>
                </div>
              </div>
              <div class="full_width_container">
                <div class="full_width input_group">
                  <label for="">Address</label>
                  <input type="text" name="billing_address" value="<?php echo $billing_address;?>" id="">
                </div>
              </div>
              <div class="full_width_container">
                <div class="half_width input_group">
                  <label for="">City</label>
                  <input type="text" name="billing_city" value="<?php echo $billing_city;?>" id="">
                </div>
                <div class="half_width input_group">
                  <label for="">State/Province/Region</label>
                  <input type="text" name="billing_state" value="<?php echo $billing_state;?>" id="">
                </div>
              </div>
              <div class="full_width_container">
                <div class="half_width input_group">
                  <label for="">Zip Code</label>
                  <input type="text" name="billing_zip" value="<?php echo $billing_zip;?>" id="">
                </div>
              </div>
              <div class="form_btn_container">
                <input class="_btn btn_primary" type="submit" name="submit" value="Update">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  
</main>

<!-- Footer -->
<?php get_footer();?>
