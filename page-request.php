<?php 
/*
Template Name: Request
*/
get_header();

$msg = '';
if(isset($_POST['p_submit'])){
  if (isset($_POST['client_form_nonce']) && wp_verify_nonce($_POST['client_form_nonce'], 'client_form_nonce')) {
    // Process the form data
    $p_name = $_POST['p_name'];
    $p_email = sanitize_email($_POST['p_email']);
    $p_instruction = $_POST['p_instruction'];


    // Email recipient (customize this)
    $to = 'mdshafayatul@gmail.com'; // Replace with the client's email address
    $subject = 'From request page';


    // Email body
    $message = '<html><body>';
    $message .= '<p>Name: ' . $p_name . '</p>';
    $message .= '<p>Email: ' . $p_email . '</p>';
    $message .= '<p>Instruction: ' . $p_instruction . '</p>';
    $message .= '</body></html>';

    
  
    $file_name = $_FILES['p_file']['name'];
    $file_path = $_FILES['p_file']['tmp_name'];

    // Check if the file exists and is readable
    if (file_exists($file_path) && is_readable($file_path)) {
      // Read and encode the file content
      $file_content_base64 = base64_encode(file_get_contents($file_path));

      // Determine the MIME type of the file
      $mime_type = mime_content_type($file_path);

      // Set the headers for the email attachment
      $headers = array(
          'Content-Type: ' . $mime_type,
          'Content-Disposition: attachment; filename="' . $file_name . '"',
          'MIME-Version: 1.0',
          'Content-Type: text/html; charset=UTF-8',
      );

      // Include the base64-encoded file content in the email message
      $message .= '<p>Attachment: <a href="data:' . $mime_type . ';base64,' . $file_content_base64 . '" download="' . $file_name . '">Download Attachment</a></p>';

      // Send the email with the attachment
      $mailed = wp_mail($to, $subject, $message, $headers);

      if ($mailed) {
          echo 'Email sent with attachment.';
      } else {
          echo 'Email sending failed.';
      }
    } else {
        echo 'Error: File not found or not readable.';
    }
    }else{
          // Create an array with the email headers
        $headers = array(
          'Content-Type: text/html; charset=UTF-8',
        );
      if (wp_mail($to, $subject, $message, $headers)) {
        $msg = '22Message sent successful. We will contact you ASAP.';
      } else {
        $msg = 'Message sending failed.';
      }      
    }
  } else {
      // Nonce verification failed, handle the error
      wp_die('Security check failed.');
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
                  <?php echo $msg;?>
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
