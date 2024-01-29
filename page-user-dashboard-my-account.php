<?php 
/*
Template Name: User Dashboard My Account
*/
get_header();
$user_id = get_current_user_id();
$user = get_user_by('ID', $user_id);
$msg = '';
if(isset($_POST['submit'])){
  $msg = 'success';

  if (isset($_POST['client_form_nonce']) && wp_verify_nonce($_POST['client_form_nonce'], 'client_form_nonce')) {
    
    $first_name = sanitize_text_field($_POST['first_name']);
    $last_name = sanitize_text_field($_POST['last_name']);
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    if($new_password == $confirm_password){
      if (isset($_FILES['profile_image']) && $_FILES['profile_image']['error'] === UPLOAD_ERR_OK) {
        $file = $_FILES['profile_image'];
        // File upload settings
        $upload_dir = wp_upload_dir();
        $target_dir = $upload_dir['basedir'] . '/profile-image/'; // Change 'custom-folder' to your desired folder name
        $target_file = $target_dir . basename($file['name']);
        $file_type = wp_check_filetype($file['name'], array()); // Restrict to image file types
        $ext = end((explode(".", $file['name'])));

        // Check if the file is a valid image
        if (in_array($ext, ['jpg', 'jpeg', 'png', 'gif'])) {
          if (!file_exists($target_dir)) {
              mkdir($target_dir, 0755, true);
          }
          if (move_uploaded_file($file['tmp_name'], $target_file)) {
            // Image uploaded successfully
            $attachment = array(
                'post_title'     => sanitize_file_name($file['name']),
                'post_content'   => '',
                'post_status'    => 'inherit',
                'post_mime_type' => $file_type['type'],
            );

            $attach_id = wp_insert_attachment($attachment, $target_file);
            require_once ABSPATH . 'wp-admin/includes/image.php';
            $attach_data = wp_generate_attachment_metadata($attach_id, $target_file);
            wp_update_attachment_metadata($attach_id, $attach_data);

            // $attach_id now contains the ID of the uploaded image
            update_user_meta($user_id, 'profile_image_id', $attach_id);
          } else {
            // Error handling for failed upload
            $msg = 'Image upload failed.';
          }
        } else {
          // Error handling for invalid file type
          $msg = 'Invalid file type. Please upload an image.';
        }
      }
      if(isset($new_password) && !empty($new_password)){
        if($new_password == $confirm_password){
          wp_set_password($new_password, $user_id);
        }
      }
      update_user_meta($user_id, 'first_name', $first_name);
      update_user_meta($user_id, 'last_name', $last_name);      
    }else{
      $msg = 'Passwords do not match.';
    }
  }
}
$first_name = get_user_meta($user_id, 'first_name', true);
$last_name = get_user_meta($user_id, 'last_name', true);
$profile_image_id = get_user_meta($user_id, 'profile_image_id', true);
// $img = get_template_directory_uri().'/assets/images/dashboard_user_photo.png';
$img = get_template_directory_uri().'/assets/images/avater.png';
if(!empty($profile_image_id)){
  $img = wp_get_attachment_url($profile_image_id);
}

if($first_name == ''){
  $first_name = get_user_meta($user_id, 'billing_f_name', true);
}
if($last_name == ''){
  $last_name = get_user_meta($user_id, 'billing_l_name', true);
}
?>

<main>
  <section class="banner_section">
    <div class="container">
      <!-- Banner search form -->
      <?php include get_template_directory() .'/includes/search-form.php';?>
    </div>
  </section>
  <section class="dashboard_section my__account">
    <div class="container">

      <div class="section_width">
      <?php
          if($msg != ''){
            if($msg == 'success'){
              echo '
              <div class="alert alert-success" role="alert">
                Your information has been updated successfully.
              </div>
              ';
            }else{
              echo '
              <div class="alert alert-warning" role="alert">
                '.$msg.'
              </div>
              ';
            }
          }
        ?>
        <div class="dashboard_main d-flex">
          
          <div class="dashboard_navbar">
            <!-- Dashboard inner menu -->
            <?php $currentPage = 'my__account'; include get_template_directory() .'/includes/dashboard-menu.php';?>
          </div>
          <div class="content__column">
            <form action="" method="post" enctype="multipart/form-data" >

              <?php wp_nonce_field('client_form_nonce', 'client_form_nonce'); ?>
              <div class="_left">
                <div class="full_width_container">
                  <div class="full_width input_group">
                    <label for="">First Name</label>
                    <input type="text" name="first_name" value="<?php echo $first_name;?>"  id="" required />
                  </div>
                </div>
                <div class="full_width_container">
                  <div class="full_width input_group">
                    <label for="">Last Name</label>
                    <input type="text" name="last_name" value="<?php echo $last_name;?>"  id="" required />
                  </div>
                </div>
                <div class="full_width_container">
                  <div class="full_width input_group">
                    <label for="">Email</label>
                    <input type="email" id="" value="<?php echo $user->user_email;?>" readonly/>
                    <!-- <p class="verified_text">
                      <span>Your email is not verified,</span> send verification
                      email
                    </p> -->
                  </div>
                </div>
              </div>

              <div class="_right">
                <h3 class="reset_password">Reset Password</h3>
                <div class="full_width_container">
                  <div class="full_width input_group">
                    <label for="">New Password</label>
                    <input type="password" name="new_password" id="" />
                  </div>
                </div>
                <div class="full_width_container">
                  <div class="full_width input_group">
                    <label for="">Confirm New Password</label>
                    <input type="password" name="confirm_password" id="" />
                  </div>
                </div>
                <div class="user_profile_photo">
                  <div class="d-flex align-items-center">
                    <div class="user_img_column">
                      <img class="profile-image-preview" src="<?php echo $img;?>" alt="" />
                    </div>
                    <div class="upload_btn_column">
                      <div class="d-flex">
                        <label class="_btn" for="files" class="btn">
                          Change Image
                        </label>
                        <input
                          id="files"
                          style="visibility: hidden; width: 10px"
                          type="file"
                          name="profile_image"
                          class="profile-image-input"
                        />
                      </div>
                      <p>JPEG, GIF or PNG, 200х200 pixels. Max 1MB</p>
                    </div>
                  </div>
                </div>
                <div class="form_btn_container">
                  <input class="_btn btn_primary p_submit" type="submit" name="submit" value="Update" />
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>
<script>
jQuery(document).ready(function(){


  // Attach an event listener to the file input field
  jQuery('.profile-image-input').on('change', function () {

    var error_message = '';

    if (this.files && this.files[0]) {
      // Create a FileReader object
      const reader = new FileReader();
      let p_size = this.files[0].size;

      // When the file is loaded
      reader.onload = function (e) {
        // Create a new Image object
        const img = new Image();
        
        // Set the source of the image to the file's data URL
        img.src = e.target.result;
        
        // When the image is loaded
        img.onload = function() {
          // Get the width and height of the image
          const width = this.width;
          const height = this.height;

          if(p_size > 1048576){
            error_message += 'The maximum size of the image can be 1 MB.';
          }
          if((width != 200) || (height != 200)){
            error_message += 'The profile image must be 200*200 pixels.';
          }
          if(error_message == ''){
            jQuery('.profile-image-preview').attr('src', e.target.result);
            jQuery(".p_submit").prop('disabled', false);
          }else{
            jQuery(".p_submit").prop('disabled', true);
            alert(error_message);
          }
          
          // Now you can use 'width' and 'height' as needed
          console.log('Width:', width, 'Height:', height);
        };
      };

      // Read the file as a data URL
      reader.readAsDataURL(this.files[0]);
    }

  });
  

//   jQuery('.profile-image-input').on('change', function () {
//   // Check if any file is selected

// });
})
</script>
<!-- Footer -->
<?php get_footer();?>
