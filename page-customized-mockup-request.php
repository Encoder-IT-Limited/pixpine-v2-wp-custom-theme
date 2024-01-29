<?php 
/*
Template Name: Customized Mockup Request
*/
get_header();
$msg = '';
if(isset($_POST['p_submit'])){
  if (isset($_POST['client_form_nonce']) && wp_verify_nonce($_POST['client_form_nonce'], 'client_form_nonce')) {
    // Define recipient email address
    $to = 'custommockups@pixpine.site, innovawebdeveloper@gmail.com, harun@encoderit.net, harun.encoderit@gmail.com';
    
    // Define email subject
    $subject = "Form Customized Mockup page";
    
    // Create email headers
    $headers = "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: multipart/mixed; boundary=\"boundary\"\r\n";
    
    // Define the message body
    $message = "--boundary\r\n";
    $message .= "Content-type: text/plain; charset='UTF-8'\r\n\r\n";
    $message .= "Name: " . $_POST["p_name"] . "\r\n";
    $message .= "Email: " . $_POST["p_email"] . "\r\n";
    $message .= "License Type: " . $_POST["p_license_type"] . "\r\n\r\n";
    $message .= "Details: " . $_POST["p_details"] . "\r\n\r\n";
    $message .= "--boundary\r\n";
    
    // Process the uploaded file
    $totalFiles = count($_FILES['p_file']['name']);
    // Loop through each file
    for ($i = 0; $i < $totalFiles; $i++) {
      $file_name = $_FILES["p_file"]["name"][$i];
      $file_temp = $_FILES["p_file"]["tmp_name"][$i];
      $file_type = $_FILES["p_file"]["type"][$i];
      $file_size = $_FILES["p_file"]["size"][$i];
      
      if ($file_size > 1048576) {
        if ($file_name) {
          $message .= "Content-Type: $file_type; name=\"$file_name\"\r\n";
          $message .= "Content-Disposition: attachment; filename=\"$file_name\"\r\n";
          $message .= "Content-Transfer-Encoding: base64\r\n\r\n";
          $message .= chunk_split(base64_encode(file_get_contents($file_temp))) . "\r\n";
          if(($i+1) == $totalFiles){
            $message .= "--boundary--";
          }else{
            $message .= "--boundary\r\n";
          }
        }
      }
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
      <section class="customized_mockup_section request_for_mockup_section">
        <div class="container">
          <div class="section_width">
            <div class="row_d">
              <div class="request_for_mockup_col">
                <div class="heading_col">
                  <h1 class="page_heading">ON demand Customized Mockup</h1>
                  <p>
                    This part of the website is made to fulfill the order of
                    your product mockup. All orders placed on our website are
                    created by our experienced 3D artists and designers while
                    focusing to deliver quality work.
                  </p>
                  <p>
                    The cost and timeline of every customized mockup depend on
                    the complexity of the product, we need high-quality
                    reference images which are taken from different angles that
                    will help us to share the right cost and timeline.
                  </p>
                  <p>
                    We recommend uploading at least 4 images of your product
                    from different angles (Front, Side, Top, Back, Bottom) along
                    with the reference images.
                  </p>
                </div>
                <form id="customized-mockup-form" action="" method="post" enctype="multipart/form-data">
                <?php 
                    if($msg != ''){
                      if($msg == 'success'){
                        echo '
                        <div class="alert alert-success" role="alert">
                        Your request has been received and we will be in touch with you as soon as possible.
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
                  <?php wp_nonce_field('client_form_nonce', 'client_form_nonce'); ?>
                  <div class="input_group half_width">
                    <label for="">First Name</label>
                    <input type="text" name="p_name" id="" required />
                  </div>
                  <div class="input_group half_width">
                    <label for="">Email</label>
                    <input type="email" name="p_email" id="" required />
                  </div>
                  <div class="input_group half_width">
                    <label for="">Select License Type</label>
                    <select name="p_license_type" id="">
                      <option value="standard">Standard</option>
                      <option value="exclusive">Exclusive</option>
                    </select>
                  </div>

                  <div class="input_group">
                    <label for="">Details</label>
                    <textarea name="p_details" id="" cols="" rows="" required></textarea>
                  </div>
                  <!--  <input
                    class="_btn btn_black btn_helvetica"
                    type="submit"
                    value="Upload"
                  /> -->
                  <div class="checkbox_container">
                    <input type="checkbox" class="customized-mockup-terms" name="" id="checkbox customized-mockup-terms" />
                    <label for="checkbox"></label>
                    <p>I accept the <a href="<?php echo site_url('terms-and-conditions');?>">terms and conditions</a></p>
                  </div>
                  <div
                    class="upload_submit_container d-flex justify-content-between"
                  >
                    <div class="">
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
                      <p>Upload reference images.</p>
                    </div>
                    <div class="text-end">
                      <input
                        class="_btn btn_primary btn_helvetica"
                        type="submit"
                        name="p_submit"
                        value="Submit"
                      />
                    </div>
                  </div>
                </form>
              </div>
              <div class="customized_mockups_col">
                <div class="inner_content">
                  <h2><span>Get 30% Off</span> on customized mockups</h2>
                  <div class="text-center">
                    <a class="_btn btn_black" href="<?php echo site_url('get-subscription');?>">
                      Get Premium
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="customized_mockup_faq_section faq_section">
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
                    aria-expanded="false"
                    aria-controls="collapseOne"
                  >
                    How much does a mockup cost?
                  </button>
                </h2>
                <div
                  id="collapseOne"
                  class="accordion-collapse collapse"
                  data-bs-parent="#accordionExample"
                >
                  <div class="accordion-body">
                    <p>
                      The cost and delivery time of any mockup depends on how
                      complex the product is, once we will receive your request
                      along with the reference images then we will be able to
                      share the exact cost and delivery date.
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
                    What is your starting price for a customized mockup?
                  </button>
                </h2>
                <div
                  id="collapseTwo"
                  class="accordion-collapse collapse"
                  data-bs-parent="#accordionExample"
                >
                  <div class="accordion-body">
                    <p>
                      Our starting price for a customized mockup is US$90
                      (non-exclusive and royalty-free license).
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
                    When can I get my customized mockup?
                  </button>
                </h2>
                <div
                  id="collapseThree"
                  class="accordion-collapse collapse"
                  data-bs-parent="#accordionExample"
                >
                  <div class="accordion-body">
                    <p>
                      The estimated delivery time for customized mockup is 14
                      working days but it can be less or more days depending on
                      the complexity of the job.
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
                    Can I get any discount on the order of customized mockup?
                  </button>
                </h2>
                <div
                  id="collapseFour"
                  class="accordion-collapse collapse"
                  data-bs-parent="#accordionExample"
                >
                  <div class="accordion-body">
                    <p>
                      Yes, you can get 30% off on your customized mockup with
                      our year
                      <a class="primary_color" href="<?php echo site_url('get-subscription');?>">Subscription</a>.
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
                    I don’t satisfy with the work quality.
                  </button>
                </h2>
                <div
                  id="collapseFive"
                  class="accordion-collapse collapse"
                  data-bs-parent="#accordionExample"
                >
                  <div class="accordion-body">
                    <p>
                      All mockups available on our website or delivered to our
                      valuable clients are carefully crafted with extra
                      attention to detail. If you have any concerns related to
                      your order please reach out to our
                      <a class="primary_color" href="<?php echo site_url('contact-us');?>">support team.</a>
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
                    I want to apply for refund.
                  </button>
                </h2>
                <div
                  id="collapseSix"
                  class="accordion-collapse collapse"
                  data-bs-parent="#accordionExample"
                >
                  <div class="accordion-body">
                    <p>
                      We do offer refunds, if our team can’t fulfill your
                      requirements or the item you received is different than
                      the one described, or if there is any technical problem
                      and we are unable to resolve it.
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
                    What are the requirements for customized mockups to start my
                    job?
                  </button>
                </h2>
                <div
                  id="collapseTen"
                  class="accordion-collapse collapse"
                  data-bs-parent="#accordionExampleRight"
                >
                  <div class="accordion-body">
                    <p>
                      We need 4 to 5 pictures of your actual product which
                      should be taken from different angles. (Front, Back, Side,
                      Bottom, Top). These pictures should be taken in a place
                      with good light to capture product details.
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
                    How can I place a order for customized mockup?
                  </button>
                </h2>
                <div
                  id="collapseEleven"
                  class="accordion-collapse collapse"
                  data-bs-parent="#accordionExampleRight"
                >
                  <div class="accordion-body">
                    <p>
                      You can submit this
                      <a class="primary_color" href="<?php echo site_url('customized-mockup-request');?>">FORM</a> along with your
                      product and reference images.
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
                    The ownership of the customized mockups.
                  </button>
                </h2>
                <div
                  id="collapseTwelve"
                  class="accordion-collapse collapse"
                  data-bs-parent="#accordionExampleRight"
                >
                  <div class="accordion-body">
                    <p>
                      The customized mockup can come with an Exclusive License
                      at extra cost, select Exclusive License while filling out
                      the <a class="primary_color" href="<?php echo site_url('customized-mockup-request');?>">form</a> if you are
                      willing to get it. With Standard License the customized
                      mockup(s) will remain and only property of Pixpine and
                      will be available on Pixpine.com for download with a
                      non-exclusive and royalty-free license. You can not own
                      any share or as a whole in the business generated by the
                      mockup(s). For more information about licenses click
                      <a class="primary_color" href="<?php echo site_url('license');?>">Here.</a>
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
                    How many revisions I can ask for?
                  </button>
                </h2>
                <div
                  id="collapseThirteen"
                  class="accordion-collapse collapse"
                  data-bs-parent="#accordionExampleRight"
                >
                  <div class="accordion-body">
                    <p>
                      After delivering the job if you think it still needs some
                      tweaks we will do two revisions free of cost.
                    </p>
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
        jQuery('#files').change(function(event) {
          var totalSize = 0;
          var files = event.target.files;
          var imagesHTML = '';

          // Calculate total size of selected files
          jQuery('#selectedImages').html('');
          for (var i = 0; i < files.length; i++) {
            var file = files[i];
            var reader = new FileReader();
            let p_size = files[i].size;
            

            reader.onload = function(e) {
              if(p_size <= 1048576){
                imagesHTML += '<img src="' + e.target.result + '" alt="Selected Image" style="height: 80px; width: auto; padding: 10px;">';
                jQuery('#selectedImages').html(imagesHTML);
              }
            };
            reader.readAsDataURL(file);
            if(files[i].size > 1048576){
              alert("File can not be more than 1 MB.")
            }
          }
        });

      })
    </script>
<!-- Footer -->
<?php get_footer();?>
