<?php 
/*
Template Name: User Dashboard Downloads
*/
get_header();
global $wpdb;
$user_id = get_current_user_id();
$table_name = $wpdb->prefix . 'pixpine_subscriptions';
$subscription_ids = $wpdb->get_col( "SELECT id FROM $table_name WHERE user_id = '$user_id'" );
$subscription_ids = implode(',', $subscription_ids);
$table_name = $wpdb->prefix . 'pixpine_subscription_payment';
$payment_ids = $wpdb->get_col( "SELECT payment_detail_id FROM $table_name WHERE subscription_id IN ('$subscription_ids')" );
var_dump($blog_ids);
?>

<main>
  <section class="banner_section">
    <div class="container">
      <!-- Banner search form -->
      <?php include get_template_directory() .'/includes/search-form.php';?>
    </div>
  </section>
  <section class="dashboard_section dashboard__downloads">
    <div class="container">
      <div class="section_width">
        <div class="dashboard_main d-flex">
          <div class="dashboard_navbar">
            <!-- Dashboard inner menu -->
            <?php $currentPage = 'dashboard__downloads'; include get_template_directory() .'/includes/dashboard-menu.php';?>
          </div>
          <div class="content__column">
            <div class="tab__container__main">
              <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item" role="presentation">
                  <button
                    class="nav-link active"
                    id="subscription_tab"
                    data-bs-toggle="tab"
                    data-bs-target="#subscription"
                    type="button"
                    role="tab"
                    aria-controls="subscription"
                    aria-selected="true"
                  >
                    Subscription
                  </button>
                </li>
                <li class="nav-item" role="presentation">
                  <button
                    class="nav-link"
                    id="premium_mockup_tab"
                    data-bs-toggle="tab"
                    data-bs-target="#premium_mockup"
                    type="button"
                    role="tab"
                    aria-controls="premium_mockup"
                    aria-selected="false"
                    tabindex="-1"
                  >
                    Premium Mockup
                  </button>
                </li>
                <li class="nav-item" role="presentation">
                  <button
                    class="nav-link"
                    id="bundle_mockups_tab"
                    data-bs-toggle="tab"
                    data-bs-target="#bundle_mockups"
                    type="button"
                    role="tab"
                    aria-controls="bundle_mockups"
                    aria-selected="false"
                    tabindex="-1"
                  >
                    Bundle Mockups
                  </button>
                </li>
              </ul>
              <div class="tab-content">
                <div
                  class="tab-pane fade show active"
                  id="subscription"
                  role="tabpanel"
                  aria-labelledby="subscription_tab"
                >
                  <div class="tab_inner_content">
                    <ul>
                      <li>
                        <p>
                          Premium Business Card Mockup - Personal & Commercial License - ID: 03214 
                        </p>
                      </li>
                      <li>
                        <p>
                          Premium Business Card Mockup - Personal & Commercial License - ID: 03214 
                        </p>
                      </li>
                      <li>
                        <p>
                          Premium Business Card Mockup - Personal & Commercial License - ID: 03214 
                        </p>
                      </li>
                      <li>
                        <p>
                          Premium Business Card Mockup - Personal & Commercial License - ID: 03214 
                        </p>
                      </li>
                      <li>
                        <p>
                          Premium Business Card Mockup - Personal & Commercial License - ID: 03214 
                        </p>
                      </li>
                      <li>
                        <p>
                          Premium Business Card Mockup - Personal & Commercial License - ID: 03214 
                        </p>
                      </li>
                      <li>
                        <p>
                          Premium Business Card Mockup - Personal & Commercial License - ID: 03214 
                        </p>
                      </li>
                      <li>
                        <p>
                          Premium Business Card Mockup - Personal & Commercial License - ID: 03214 
                        </p>
                      </li>
                      <li>
                        <p>
                          Premium Business Card Mockup - Personal & Commercial License - ID: 03214 
                        </p>
                      </li>
                      <li>
                        <p>
                          Premium Business Card Mockup - Personal & Commercial License - ID: 03214 
                        </p>
                      </li>
                      <li>
                        <p>
                          Premium Business Card Mockup - Personal & Commercial License - ID: 03214 
                        </p>
                      </li>
                      <li>
                        <p>
                          Premium Business Card Mockup - Personal & Commercial License - ID: 03214 
                        </p>
                      </li>
                      <li>
                        <p>
                          Premium Business Card Mockup - Personal & Commercial License - ID: 03214 
                        </p>
                      </li>
                      <li>
                        <p>
                          Premium Business Card Mockup - Personal & Commercial License - ID: 03214 
                        </p>
                      </li>
                      <li>
                        <p>
                          Premium Business Card Mockup - Personal & Commercial License - ID: 03214 
                        </p>
                      </li>
                      <li>
                        <p>
                          Premium Business Card Mockup - Personal & Commercial License - ID: 03214 
                        </p>
                      </li>
                      <li>
                        <p>
                          Premium Business Card Mockup - Personal & Commercial License - ID: 03214 
                        </p>
                      </li>
                    </ul>
                  </div>
                </div>
                <div
                  class="tab-pane fade"
                  id="premium_mockup"
                  role="tabpanel"
                  aria-labelledby="premium_mockup_tab"
                >
                  <div class="tab_inner_content">
                    <h6>No data found.</h6>
                  </div>
                </div>
                <div
                  class="tab-pane fade"
                  id="bundle_mockups"
                  role="tabpanel"
                  aria-labelledby="bundle_mockups_tab"
                >
                  <div class="tab_inner_content">
                    <h6>No data found.</h6>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>

<!-- Footer -->
<?php get_footer();?>
