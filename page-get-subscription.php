<?php 
/*
Template Name: Get Subscription
*/
get_header();
?>

<main>
      <section class="subscription_section">
        <div class="container">
          <div class="section_width">
            <div class="heading_col text-center">
              <h1 class="page_heading">PICK YOUR MEMBERSHIP PLAN</h1>
              <p class="sub_heading">
                All subscriptions come with
                <a href="<?php echo site_url('license');?>">Extended Commercial License</a> (limited time) at no
                extra cost, which means you can use our mockups unlimited times.
              </p>
            </div>
            <div class="subscriptions_package_container">
              <div class="subscriptions_package monthly__subscription">
                <div class="content_col">
                  <div class="top_content">
                    <div class="heading__col">
                      <h4>Monthly Subscription</h4>
                    </div>
                    <div class="price_container">
                      <h2>$21.00 <span>/ month</span></h2>
                    </div>
                  </div>
                  <ul>
                    <li>
                      <img src="<?php echo get_template_directory_uri();?>/assets/images/subscription__dark-mark.png" alt="" />
                      <p>90% off on Premium Mockups</p>
                    </li>
                    <li>
                      <img src="<?php echo get_template_directory_uri();?>/assets/images/subscription__dark-mark.png" alt="" />
                      <p>30% off on Bundle Mockups</p>
                    </li>
                    <li>
                      <img src="<?php echo get_template_directory_uri();?>/assets/images/subscription__dark-mark.png" alt="" />
                      <p>56 downloads every month</p>
                    </li>
                    <li>
                      <img src="<?php echo get_template_directory_uri();?>/assets/images/subscription__dark-mark.png" alt="" />
                      <p>Free Extended Commercial License</p>
                    </li>
                    <li>
                      <img src="<?php echo get_template_directory_uri();?>/assets/images/subscription__dark-mark.png" alt="" />
                      <p>Commercial and Personal Use</p>
                    </li>
                    <li>
                      <img src="<?php echo get_template_directory_uri();?>/assets/images/subscription__dark-mark.png" alt="" />
                      <p>Priority email support</p>
                    </li>
                    <li>
                      <img src="<?php echo get_template_directory_uri();?>/assets/images/subscription__dark-mark.png" alt="" />
                      <p>Unused downloads roll over to next month</p>
                    </li>
                    <li>
                      <img src="<?php echo get_template_directory_uri();?>/assets/images/subscription__dark-mark.png" alt="" />
                      <p>First to know about daily free mockups</p>
                    </li>
                  </ul>
                </div>
                <div class="btn_col text-center">
                  <button class="_btn btn_primary subscribe" subscripton_plan="monthly" amount="21" planid="price_1O7zCcSCPnS6Hgf9e0CiHplS">SUBSCRIBE</button>
                </div>
              </div>
              <div class="subscriptions_package yearly__subscription">
                <div class="premium_saves_container">
                  <h3>PREMIUM</h3>
                  <h5>Saves you $72.00</h5>
                </div>
                <div class="content_col">
                  <div class="top_content">
                    <div class="heading__col">
                      <h4>Yearly Subscription <span>$168.00</span></h4>
                    </div>
                    <div class="price_container">
                      <h2>$14.00 <span>/ month</span></h2>
                    </div>
                  </div>
                  <ul>
                    <li>
                      <img src="<?php echo get_template_directory_uri();?>/assets/images/subscription__white-mark.png" alt="" />
                      <p>96% off on Premium Mockups</p>
                    </li>
                    <li>
                      <img src="<?php echo get_template_directory_uri();?>/assets/images/subscription__white-mark.png" alt="" />
                      <p>50% off on Bundle Mockups</p>
                    </li>
                    <li>
                      <img src="<?php echo get_template_directory_uri();?>/assets/images/subscription__white-mark.png" alt="" />
                      <p>30% Off on Customize Mockup</p>
                    </li>
                    <li>
                      <img src="<?php echo get_template_directory_uri();?>/assets/images/subscription__white-mark.png" alt="" />
                      <p>Unlimited downloads every month</p>
                    </li>
                    <li>
                      <img src="<?php echo get_template_directory_uri();?>/assets/images/subscription__white-mark.png" alt="" />
                      <p>Free Extended Commercial License</p>
                    </li>
                    <li>
                      <img src="<?php echo get_template_directory_uri();?>/assets/images/subscription__white-mark.png" alt="" />
                      <p>Commercial and Personal Use</p>
                    </li>
                    <li>
                      <img src="<?php echo get_template_directory_uri();?>/assets/images/subscription__white-mark.png" alt="" />
                      <p>Priority email support</p>
                    </li>

                    <li>
                      <img src="<?php echo get_template_directory_uri();?>/assets/images/subscription__white-mark.png" alt="" />
                      <p>Custom Mockups wishlist</p>
                    </li>
                    <li>
                      <img src="<?php echo get_template_directory_uri();?>/assets/images/subscription__white-mark.png" alt="" />
                      <p>First to know about daily free mockups</p>
                    </li>
                  </ul>
                </div>
                <div class="btn_col text-center">
                  <button class="_btn btn_black subscribe" amount="168" subscripton_plan="yearly" planid="price_1O7z81SCPnS6Hgf9nqsIfDdi">SUBSCRIBE</button>
                </div>
              </div>
            </div>
            <div class="subscriptions_footer">
              <p>*Prices are in US dollars</p>
            </div>
          </div>
        </div>
      </section>
      <section class="faq_section" id="faq">
        <div class="container">
          <div class="heading_col">
            <h2>FREQUENTLY ASKED QUESTION</h2>
          </div>
          <div class="accordin_container">
            <div class="accordion left" id="accordionExample">
              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button
                    class="accordion-button collapsed"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#collapseOne"
                    aria-expanded="true"
                    aria-controls="collapseOne"
                  >
                    Items in download section are missing or not accessible.
                  </button>
                </h2>
                <div
                  id="collapseOne"
                  class="accordion-collapse collapse"
                  data-bs-parent="#accordionExample"
                >
                  <div class="accordion-body">
                    <p>
                      Downloads will be only available if you have active
                      monthly/yearly subscriptions. Once your subscription gets
                      expired, it won’t be available anymore.
                    </p>
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button
                    class="accordion-button collapsed"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#collapseTwo"
                    aria-expanded="false"
                    aria-controls="collapseTwo"
                  >
                    I forgot my password.
                  </button>
                </h2>
                <div
                  id="collapseTwo"
                  class="accordion-collapse collapse"
                  data-bs-parent="#accordionExample"
                >
                  <div class="accordion-body">
                    <p>
                      Go to the <a type="button" data-bs-toggle="modal" data-bs-target="#loginModal">Log in</a> page and click on
                      FORGOT PASSWORD and follow the instructions.
                    </p>
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button
                    class="accordion-button collapsed"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#collapseThree"
                    aria-expanded="false"
                    aria-controls="collapseThree"
                  >
                    How many downloads I can get with a subscription?
                  </button>
                </h2>
                <div
                  id="collapseThree"
                  class="accordion-collapse collapse"
                  data-bs-parent="#accordionExample"
                >
                  <div class="accordion-body">
                    <p>
                      You can download 56 premium mockups with a monthly
                      subscription and the remaining downloads will roll over to
                      the next month if you have an active subscription. We
                      offer unlimited downloads with a yearly subscription
                    </p>
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button
                    class="accordion-button collapsed"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#collapseFour"
                    aria-expanded="false"
                    aria-controls="collapseFour"
                  >
                    Can I upgrade from a monthly to a yearly subscription?
                  </button>
                </h2>
                <div
                  id="collapseFour"
                  class="accordion-collapse collapse"
                  data-bs-parent="#accordionExample"
                >
                  <div class="accordion-body">
                    <p>
                      Yes, go to your account dashboard and upgrade your
                      subscription
                    </p>
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button
                    class="accordion-button collapsed"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#collapseFive"
                    aria-expanded="false"
                    aria-controls="collapseFive"
                  >
                    What are your payment gateways?
                  </button>
                </h2>
                <div
                  id="collapseFive"
                  class="accordion-collapse collapse"
                  data-bs-parent="#accordionExample"
                >
                  <div class="accordion-body">
                    <p>
                      We use secure payment gateways provided by 2Checkout and
                      Stripe.
                    </p>
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button
                    class="accordion-button collapsed"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#collapseSix"
                    aria-expanded="false"
                    aria-controls="collapseSix"
                  >
                    Where can I find information about licenses?
                  </button>
                </h2>
                <div
                  id="collapseSix"
                  class="accordion-collapse collapse"
                  data-bs-parent="#accordionExample"
                >
                  <div class="accordion-body">
                    <p>
                      You can find complete information about our all licenses
                      <a href="<?php echo site_url('license');?>">Here</a>
                    </p>
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button
                    class="accordion-button collapsed"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#collapseSeven"
                    aria-expanded="false"
                    aria-controls="collapseSeven"
                  >
                    I want to apply for a refund.
                  </button>
                </h2>
                <div
                  id="collapseSeven"
                  class="accordion-collapse collapse"
                  data-bs-parent="#accordionExample"
                >
                  <div class="accordion-body">
                    <p>
                      We do offer refunds under certain circumstances if the
                      item you received is different than the one described, or
                      if there is any technical problem and we are unable to
                      resolve it. If you paid twice for the same item or you are
                      having issues with the payment process in that case reach
                      out to our support team. Do not lodge a dispute with our
                      payment gateway partners (Stripe & 2Checkout) otherwise,
                      it will take longer time to get your refund
                    </p>
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button
                    class="accordion-button collapsed"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#collapseEight"
                    aria-expanded="false"
                    aria-controls="collapseEight"
                  >
                    I want to cancel my subscription.
                  </button>
                </h2>
                <div
                  id="collapseEight"
                  class="accordion-collapse collapse"
                  data-bs-parent="#accordionExample"
                >
                  <div class="accordion-body">
                    <p>
                      You can cancel your subscription any time you want from
                      your account area. If you still face the problem reach out
                      to our support team (<a
                        class="mail_to"
                        href="mailto:support@pixpine.com"
                      >
                        support@pixpine.com </a
                      >) or fill out this <a href="<?php echo site_url('get-subscription');?>">Form</a>.
                    </p>
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button
                    class="accordion-button collapsed"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#collapseNine"
                    aria-expanded="false"
                    aria-controls="collapseNine"
                  >
                    Can I still access my downloads after canceling my
                    subscription?
                  </button>
                </h2>
                <div
                  id="collapseNine"
                  class="accordion-collapse collapse"
                  data-bs-parent="#accordionExample"
                >
                  <div class="accordion-body">
                    <p>
                      Your downloads remain available till for the month you
                      subscribed, if you cancel your subscription it will not be
                      available after the expiry of your subscription.
                    </p>
                  </div>
                </div>
              </div>
            </div>
            <div class="accordion right" id="accordionExampleRight">
              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button
                    class="accordion-button collapsed"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#collapseTen"
                    aria-expanded="false"
                    aria-controls="collapseTen"
                  >
                    Can I still use the assets if I unsubscribe?
                  </button>
                </h2>
                <div
                  id="collapseTen"
                  class="accordion-collapse collapse"
                  data-bs-parent="#accordionExampleRight"
                >
                  <div class="accordion-body">
                    <p>
                      Yes, you can still use the assets under our license which
                      can find <a href="<?php echo site_url('license');?>">Here</a>.
                    </p>
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button
                    class="accordion-button collapsed"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#collapseEleven"
                    aria-expanded="false"
                    aria-controls="collapseEleven"
                  >
                    My monthly subscription is automatically renewed.
                  </button>
                </h2>
                <div
                  id="collapseEleven"
                  class="accordion-collapse collapse"
                  data-bs-parent="#accordionExampleRight"
                >
                  <div class="accordion-body">
                    <p>
                      If you registered for a monthly subscription it will
                      automatically renew at the end of the billing cycle. You
                      can cancel your subscription at any time from the user
                      account area.
                    </p>
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button
                    class="accordion-button collapsed"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#collapseTwelve"
                    aria-expanded="false"
                    aria-controls="collapseTwelve"
                  >
                    Which software do I need to work on mockups?
                  </button>
                </h2>
                <div
                  id="collapseTwelve"
                  class="accordion-collapse collapse"
                  data-bs-parent="#accordionExampleRight"
                >
                  <div class="accordion-body">
                    <p>
                      You need Adobe Photoshop CC or the above version to work
                      on our mockups.
                    </p>
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button
                    class="accordion-button collapsed"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#collapseThirteen"
                    aria-expanded="false"
                    aria-controls="collapseThirteen"
                  >
                    Can I use free and paid mockups for personal or commercial
                    projects?
                  </button>
                </h2>
                <div
                  id="collapseThirteen"
                  class="accordion-collapse collapse"
                  data-bs-parent="#accordionExampleRight"
                >
                  <div class="accordion-body">
                    <p>
                      Yes, all mockups (Free, Premium, Bundle) available on our
                      website can be used for personal and commercial projects.
                      You can find more information about our licenses
                      <a href="<?php echo site_url('license');?>">Here</a>.
                    </p>
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button
                    class="accordion-button collapsed"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#collapseFourteen"
                    aria-expanded="false"
                    aria-controls="collapseFourteen"
                  >
                    How can I get an Extended License for a mockup?
                  </button>
                </h2>
                <div
                  id="collapseFourteen"
                  class="accordion-collapse collapse"
                  data-bs-parent="#accordionExampleRight"
                >
                  <div class="accordion-body">
                    <p>
                      You can reach out to our support team at
                      <a class="mail_to" href="mailto:support@pixpine.com">
                        support@pixpine.com
                      </a>
                      with the information related to the mockup.
                    </p>
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button
                    class="accordion-button collapsed"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#collapseFifteen"
                    aria-expanded="false"
                    aria-controls="collapseFifteen"
                  >
                    How do I use mockup?
                  </button>
                </h2>
                <div
                  id="collapseFifteen"
                  class="accordion-collapse collapse"
                  data-bs-parent="#accordionExampleRight"
                >
                  <div class="accordion-body">
                    <p>
                      Once you download our mockups you will also get a PDF help
                      file otherwise you can visit our
                      <a href="">tutorial page</a>.
                    </p>
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button
                    class="accordion-button collapsed"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#collapseSixteen"
                    aria-expanded="false"
                    aria-controls="collapseSixteen"
                  >
                    Do I need to provide attribution for the free mockups?
                  </button>
                </h2>
                <div
                  id="collapseSixteen"
                  class="accordion-collapse collapse"
                  data-bs-parent="#accordionExampleRight"
                >
                  <div class="accordion-body">
                    <p>
                      No, you don’t need to provide attribution for free mockups
                      however we appreciate it if you spread the word.
                    </p>
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button
                    class="accordion-button collapsed"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#collapseSeventeen"
                    aria-expanded="false"
                    aria-controls="collapseSeventeen"
                  >
                    Can I link your paid or free content on my website?
                  </button>
                </h2>
                <div
                  id="collapseSeventeen"
                  class="accordion-collapse collapse"
                  data-bs-parent="#accordionExampleRight"
                >
                  <div class="accordion-body">
                    <p>
                      Yes, you may do, but you CAN NOT redistribute or sell by
                      providing a direct link to download. You can find complete
                      information about our license <a href="<?php echo site_url('license');?>">Here</a>. We will
                      be glad if you can spread the word. You can share our
                      mockups by giving a backlink to pixpine.com
                    </p>
                  </div>
                </div>
              </div>
              <div class="couldnt_ans">
                <h3>
                  Couldn’t find your answer?
                  <a class="primary_color" href="<?php echo site_url('contact-us');?>">Contact us</a>
                </h3>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>
<!-- Footer -->
<?php get_footer();?>
