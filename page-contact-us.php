<?php 
/*
Template Name: Contact Us
*/
get_header();
$msg = '';
if(isset($_POST['c_submit'])){
  if (isset($_POST['client_form_nonce']) && wp_verify_nonce($_POST['client_form_nonce'], 'client_form_nonce')) {
    // Process the form data
    $c_name = $_POST['c_name'];
    $c_subject = $_POST['c_subject'];
    $c_concern = $_POST['c_concern'];
    $c_email = sanitize_email($_POST['c_email']);

    // Email recipient (customize this)
    $to = 'helpdesk@pixpine.site, innovawebdeveloper@gmail.com, harun@encoderit.net, harun.encoderit@gmail.com'; // Replace with the client's email address
    $subject = 'Help Desk';

    // Email body
    $message = '<html><body>';
    $message .= '<p>Name: ' . $c_name . '</p>';
    $message .= '<p>Email: ' . $c_email . '</p>';
    $message .= '<p>Subject: ' . $c_subject . '</p>';
    $message .= '<p>Concern: ' . $c_concern . '</p>';
    $message .= '</body></html>';

    $headers = array(
      'Content-Type: text/html; charset=UTF-8',
      // 'From: WordPress'
    );

    if (wp_mail($to, $subject, $message, $headers)) {
      $msg = 'success';
    } else {
      $msg = 'fail';
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
                <form action="" method="post">

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
                <?php wp_nonce_field('client_form_nonce', 'client_form_nonce'); ?>
                  <div class="input_group half_width">
                    <label for="">First Name</label>
                    <input type="text" name="c_name" id="" required />
                  </div>
                  <div class="input_group half_width">
                    <label for="">Email</label>
                    <input type="email" name="c_email" id="" required />
                  </div>
                  <div class="input_group half_width">
                    <label for="">Choose Subject</label>
                    <select name="c_subject" id="" required>
                      <option value="General question">General Question</option>
                      <option value="Payment issues">Payment Issues</option>
                      <option value="Technical support">Technical Support</option>
                      <option value="Feedback">Feedback</option>
                      <option value="Subscription">Subscription</option>
                      <option value="Download issues">Download Issues</option>
                    </select>
                  </div>

                  <div class="input_group">
                    <label for="">Write your concern</label>
                    <textarea name="c_concern" id="" cols="" rows="" required></textarea>
                  </div>
                  <div class="text-end">
                    <input
                      class="_btn btn_primary btn_helvetica"
                      type="submit"
                      value="Submit"
                      name="c_submit"
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
