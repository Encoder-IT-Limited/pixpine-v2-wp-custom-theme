<?php 
/*
Template Name: User Dashboard Billing Information
*/
get_header();

if(isset($_POST['submit'])){

  $billing_f_name = $_POST['billing_f_name'];
  $billing_l_name = $_POST['billing_l_name'];
  $billing_email = $_POST['billing_email'];
  $billing_company = $_POST['billing_company'];
  $billing_country = $_POST['billing_country'];
  $billing_address = $_POST['billing_address'];
  $billing_city = $_POST['billing_city'];
  $billing_state = $_POST['billing_state'];
  $billing_zip = $_POST['billing_zip'];

  update_user_meta($user_id, 'billing_f_name', $billing_f_name);
  update_user_meta($user_id, 'billing_l_name', $billing_l_name);
  update_user_meta($user_id, 'billing_email', $billing_email);
  update_user_meta($user_id, 'billing_company', $billing_company);
  update_user_meta($user_id, 'billing_country', $billing_country);
  update_user_meta($user_id, 'billing_address', $billing_address);
  update_user_meta($user_id, 'billing_city', $billing_city);
  update_user_meta($user_id, 'billing_state', $billing_state);
  update_user_meta($user_id, 'billing_zip', $billing_zip);
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
            <form action="">
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
                <input class="_btn btn_primary" type="submit" value="Update">
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
