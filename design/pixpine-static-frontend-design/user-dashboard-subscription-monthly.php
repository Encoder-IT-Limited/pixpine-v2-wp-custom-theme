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
                <li>
                  <p>Subscription Type: <span>MONTHLY</span></p>
                </li>
                <li>
                  <p>Subscription Date: <span>15 September 2023</span></p>
                </li>
                <li>
                  <p>Subscription Expire: <span>15 October 2023</span></p>
                </li>
                <li>
                  <p>Download Limit: <span>56</span></p>
                </li>
                <li>
                  <p>Downloads Remaining: <span>35</span></p>
                </li>
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
<?php include 'includes/footer.php';?>
