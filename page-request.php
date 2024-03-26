<?php 
/*
Template Name: Request
*/
get_header();

$msg = '';
if (isset($_POST['p_submit'])) {
    if (isset($_POST['client_form_nonce']) && wp_verify_nonce($_POST['client_form_nonce'], 'client_form_nonce')) {
        // Define recipient email address
        $to = "request@pixpine.site, innovawebdeveloper@gmail.com, harun@encoderit.net, harun.encoderit@gmail.com";

        // Define email subject
        $subject = "REQUEST MOCKUP";

        // Create email headers
        $headers = array(
            'Content-Type: text/html; charset=UTF-8',
        );

        // Define the message body
        $message = "Name: " . $_POST["p_name"] . "<br>";
        $message .= "Email: " . $_POST["p_email"] . "<br>";
        $message .= "Instruction: " . $_POST["p_instruction"] . "<br>";

        // Process the uploaded file
        $totalFiles = count($_FILES['p_file']['name']);
        $attachments = array();

        // Loop through each file
        for ($i = 0; $i < $totalFiles; $i++) {
            $file_name = $_FILES["p_file"]["name"][$i];
            $file_temp = $_FILES["p_file"]["tmp_name"][$i];
            $file_size = $_FILES["p_file"]["size"][$i];

            // Check if file exists and is readable
            if ($file_size <= 1048576 && is_uploaded_file($file_temp)) {
                // Add the file as an attachment
                $attachments[$file_name] = $file_temp;
            } else {
                // Log or display an error message
                $msg = 'Error: File upload failed or file size exceeds the limit.';
            }
        }

        // Send the email
        if (empty($msg)) {
            if (wp_mail($to, $subject, $message, $headers, $attachments)) {
                $msg = 'success';
            } else {
                $msg = 'Error: Failed to send email.';
            }
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
                        We appreciate you contacting us, and we will respond to your message as early as possible.
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
                      name="p_file[]"
                      accept=".png,.jpg,.jpeg"
                      multiple
                    />

                  </div>
                  <p>
                    <div id="selectedImages"></div>
                  </p>
                  <div class="paragraph_text">
                    <p>
                      Share reference images or drawings to better understand
                      your request. Images should be lower than 1 MB.
                    </p>
                  </div>
                  <div class="checkbox_container">
                    <!-- <input type="checkbox" name="" id="" /> -->
                    <input type="checkbox" class="p_checkbox" id="checkbox" required />
                    <label for="checkbox"></label>
                    <p>I accept the <a href="<?php echo site_url('terms-and-conditions');?>">terms and conditions</a></p>
                  </div>
                  <input
                    class="_btn btn_primary p_submit"
                    type="submit"
                    value="Submit"
                    id="p_submit"
                    name="p_submit"
                  />
                </form>
              </div>
              <div class="customized_mockups_col">
                <div class="inner_content">
                  <h2><span>Get 30% Off</span> on customized mockups</h2>
                  <p style="text-align: left;">With yearly subscription</p>
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
    <script>
      jQuery(document).ready(function(){
        jQuery("#p_submit").on('click', function(e) {
          if(!jQuery(".p_checkbox").is(':checked')){
            alert('Please accept the terms and conditions');
          }
        });

        jQuery('#files').change(function(event) {
          var totalSize = 0;
          var files = event.target.files;
          var imagesHTML = '';

          // Calculate total size of selected files
          jQuery('#selectedImages').html('');
          if(files.length <= 4){
            jQuery(".p_submit").attr('disabled', false);
            for (var i = 0; i < files.length; i++) {
              var file = files[i];
              var reader = new FileReader();
              let p_size = files[i].size;
              

              reader.onload = function(e) {
                if(p_size <= 1048576){
                  imagesHTML += '<img src="' + e.target.result + '" alt="Selected Image" style="height: 80px; width: auto; margin-right: 10px; margin-bottom: 10px;">';
                  jQuery('#selectedImages').html(imagesHTML);
                }
              };
              reader.readAsDataURL(file);
              if(files[i].size > 1048576){
                alert("File can not be more than 1 MB.")
              }
            }
          }else{
            alert("You can not upload more than 4 images.");
            jQuery(".p_submit").attr('disabled', true);
          }

        });

      })
    </script>
<!-- Footer -->
<?php get_footer();?>