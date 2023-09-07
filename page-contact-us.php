<?php 
/*
Template Name: Contact Us
*/
get_header();
?>
    <main>
      <section class="banner_section">
        <div class="container">
          
          <!-- Banner search form -->
          <?php include get_template_directory() .'/includes/search-form.php';?>

          
        </div>
      </section>
      <section
        class="contact_page customized_mockup_section request_for_mockup_section"
      >
        <div class="container">
          <div class="section_width">
            <div class="row_d">
              <div class="request_for_mockup_col">
                <div class="heading_col">
                  <h1 class="page_heading">WE ARE JUST A CLICK AWAY.</h1>
                  <p>
                    If you are facing a problem with purchased items or need any
                    support just write an email to
                    <a href="mailto:support@pixpine.com">support@pixpine.com</a>
                    or fill out the form on the left. We will reach you as early
                    as possible.
                  </p>
                </div>
                <form action="">
                  <div class="input_group half_width">
                    <label for="">First Name</label>
                    <input type="text" name="" id="" required />
                  </div>
                  <div class="input_group half_width">
                    <label for="">Email</label>
                    <input type="email" name="" id="" required />
                  </div>
                  <div class="input_group half_width">
                    <label for="">Choose Subject</label>
                    <select name="" id="">
                      <option value="general_question">General Question</option>
                      <option value="payment_issues">Payment Issues</option>
                      <option value="technical_support">
                        Technical Support
                      </option>
                      <option value="feedback">Feedback</option>
                      <option value="subscription">Subscription</option>
                      <option value="download_issues">Download Issues</option>
                    </select>
                  </div>

                  <div class="input_group">
                    <label for="">Write your concern</label>
                    <textarea name="" id="" cols="" rows="" required></textarea>
                  </div>
                  <div class="text-end">
                    <input
                      class="_btn btn_primary btn_helvetica"
                      type="submit"
                      value="Submit"
                    />
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
