<?php 
/*
Template Name: Request
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
      <section class="request_for_mockup_section">
        <div class="container">
          <div class="section_width">
            <div class="row_d">
              <div class="request_for_mockup_col">
                <div class="heading_col">
                  <h1 class="page_heading">Request for Mockup</h1>
                  <p>
                    This part of the website is made to submit your request for
                    your desired mockup however we don’t promise any timeframe
                    for the availability of your desired item. We mostly
                    consider the requested mockups and we keep adding those to
                    our library.
                  </p>
                </div>
                <form action="">
                  <div class="input_group half_width">
                    <label for="">Product Name</label>
                    <input type="text" name="" id="" required />
                  </div>
                  <div class="input_group half_width">
                    <label for="">Email*</label>
                    <input type="email" name="" id="" required />
                  </div>
                  <div class="input_group">
                    <label for="">Instructions</label>
                    <textarea name="" id="" cols="" rows="" required></textarea>
                  </div>
                  <!--  <input
                    class="_btn btn_black"
                    type="submit"
                    value="Upload"
                  /> -->
                  <div class="d-flex">
                    <label
                      class="_btn btn_black"
                      for="files"
                      class="btn"
                    >
                      Upload
                    </label>
                    <input
                      id="files"
                      style="visibility: hidden; width: 10px"
                      type="file"
                      required
                    />
                  </div>

                  <div class="paragraph_text">
                    <p>
                      Share reference images or drawings to better understand
                      your request. Images should be lower than 1 MB.
                    </p>
                  </div>
                  <div class="checkbox_container">
                    <!-- <input type="checkbox" name="" id="" /> -->
                    <input type="checkbox" name="" id="checkbox" required />
                    <label for="checkbox"></label>
                    <p>I accept the <a href="terms-and-conditions.php">terms and conditions</a></p>
                  </div>
                  <input
                    class="_btn btn_primary"
                    type="submit"
                    value="Submit"
                  />
                </form>
              </div>
              <div class="customized_mockups_col">
                <div class="inner_content">
                  <h2><span>Get 30% Off</span> on customized mockups</h2>
                  <p>With yearly subscription</p>
                  <div class="text-center">
                    <a class="_btn btn_black" href="subscription.php">
                      Get premium
                    </a>
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
