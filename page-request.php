<?php 
/*
Template Name: Request
*/
get_header();

$msg = '';
if(isset($_POST['p_submit'])){
  if (isset($_POST['client_form_nonce']) && wp_verify_nonce($_POST['client_form_nonce'], 'client_form_nonce')) {
    // Define recipient email address
    $to = "request@pixpine.site, innovawebdeveloper@gmail.com";

    // Define email subject
    $subject = "REQUEST MOCKUP";

    // Define sender's email address
    $from = $_POST["p_email"];

    // Create email headers
    $headers = "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: multipart/mixed; boundary=\"boundary\"\r\n";

    // Define the message body
    $message = "--boundary\r\n";
    $message .= "Content-type: text/plain; charset='UTF-8'\r\n\r\n";
    $message .= "Name: " . $_POST["p_name"] . "\r\n";
    $message .= "Email: " . $_POST["p_email"] . "\r\n";
    $message .= "Instruction: " . $_POST["p_instruction"] . "\r\n\r\n";
    $message .= "--boundary\r\n";

    // Process the uploaded file
    $file_name = $_FILES["p_file"]["name"];
    $file_temp = $_FILES["p_file"]["tmp_name"];
    $file_type = $_FILES["p_file"]["type"];

    if ($file_name) {
        $message .= "Content-Type: $file_type; name=\"$file_name\"\r\n";
        $message .= "Content-Disposition: attachment; filename=\"$file_name\"\r\n";
        $message .= "Content-Transfer-Encoding: base64\r\n\r\n";
        $message .= chunk_split(base64_encode(file_get_contents($file_temp))) . "\r\n";
        $message .= "--boundary--";
    }

    // Send the email
    if (mail($to, $subject, $message, $headers)) {
      $msg = 'success';
    } else {
      $msg = 'fail';
    }   
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
          <div class="section_width">
            <div class="row_d">
              <div class="request_for_mockup_col">
                <div class="heading_col">
                  <h1 class="page_heading">Request for Mockup</h1>
                  <?php 
                    if($msg != ''){
                      if($msg == 'success'){
                        echo '
                        <div class="alert alert-success" role="alert">
                          Message sent successful. We will contact you ASAP.
                        </div>
                        ';
                      }elseif($msg == 'fail'){
                        echo '
                        <div class="alert alert-warning" role="alert">
                          Message sending failed.
                        </div>
                        ';
                      }
                    }
                  ?>
                  <p>
                    This part of the website is made to submit your request for
                    your desired mockup however we don’t promise any timeframe
                    for the availability of your desired item. We mostly
                    consider the requested mockups and we keep adding those to
                    our library.
                  </p>
                </div>
                <form action="" method="post" enctype="multipart/form-data">
                  <?php wp_nonce_field('client_form_nonce', 'client_form_nonce'); ?>
                  <div class="input_group half_width">
                    <label for="">Product Name</label>
                    <input type="text" name="p_name" id=""  />
                  </div>
                  <div class="input_group half_width">
                    <label for="">Email*</label>
                    <input type="email" name="p_email" id="" required />
                  </div>
                  <div class="input_group">
                    <label for="">Instructions</label>
                    <textarea name="p_instruction" id="" cols="" rows=""></textarea>
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
                      name="p_file"
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
                    <p>I accept the <a href="<?php echo site_url('terms-and-conditions');?>">terms and conditions</a></p>
                  </div>
                  <input
                    class="_btn btn_primary"
                    type="submit"
                    value="Submit"
                    name="p_submit"
                  />
                </form>
              </div>
              <div class="customized_mockups_col">
                <div class="inner_content">
                  <h2><span>Get 30% Off</span> on customized mockups</h2>
                  <p>With yearly subscription</p>
                  <div class="text-center">
                    <a class="_btn btn_black" href="<?php echo site_url('get-subscription');?>">
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
