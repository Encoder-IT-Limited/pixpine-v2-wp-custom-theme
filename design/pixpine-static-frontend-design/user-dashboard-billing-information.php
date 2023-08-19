<?php include 'includes/header.php';?>
  <!-- Header End -->


<main>
  <section class="banner_section">
    <div class="container">
       
        <!-- Banner search form -->
        <?php include 'includes/search-form.php';?>

          
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
                  <input type="text" name="" id="" required>
                </div>
                <div class="half_width input_group">
                  <label for="">Last Name<span>*</span></label>
                  <input type="text" name="" id="" required>
                </div>
              </div>
              <div class="full_width_container">
                <div class="half_width input_group">
                  <label for="">Email<span>*</span></label>
                  <input type="email" name="" id="" required>
                </div>
              </div>
              <div class="full_width_container">
                <div class="half_width input_group">
                  <label for="">Company</label>
                  <input type="text" name="" id="">
                </div>
                <div class="half_width input_group">
                  <label for="">Country<span>*</span></label>
                  <input type="text" name="" id="" required>
                </div>
              </div>
              <div class="full_width_container">
                <div class="full_width input_group">
                  <label for="">Address</label>
                  <input type="text" name="" id="">
                </div>
              </div>
              <div class="full_width_container">
                <div class="half_width input_group">
                  <label for="">City</label>
                  <input type="text" name="" id="">
                </div>
                <div class="half_width input_group">
                  <label for="">State/Province/Region</label>
                  <input type="text" name="" id="">
                </div>
              </div>
              <div class="full_width_container">
                <div class="half_width input_group">
                  <label for="">Zip Code</label>
                  <input type="text" name="" id="">
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
<?php include 'includes/footer.php';?>