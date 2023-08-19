<?php include 'includes/header.php';?>
  <!-- Header End -->


<main>
  <section class="banner_section">
    <div class="container">
       
        <!-- Banner search form -->
        <?php include 'includes/search-form.php';?>

          
    </div>
  </section>
  <section class="dashboard_section dashboard__subscription">
    <div class="container">
      <div class="section_width">
        <div class="dashboard_main d-flex">
          <div class="dashboard_navbar">
            

          <!-- Dashboard inner menu -->
          <?php $currentPage = 'dashboard__subscription'; include 'includes/dashboard-menu.php';?>

          </div>
          <div class="content__column">
            <div class="subscription__description">
              <ul>
                <li><p>Subscription Type: <span>YEARLY</span></p></li>
                <li><p>Subscription Date: <span>15 September 2023</span></p></li>
                <li><p>Subscription Expire: <span>15 September 2024</span></p></li>
                <li><p>Download Limit: <span>UNLIMITED</span></p></li>
                <li><p>Downloads Remaining: <span>UNLIMITED</span></p></li>
              </ul>
            </div>
            <div class="btn_container">
              <button class="_btn btn_primary">Browse Premium</button>
              <button class="_btn btn_outline">Cancel Subscription</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  
</main>


  <!-- Footer -->
<?php include 'includes/footer.php';?>