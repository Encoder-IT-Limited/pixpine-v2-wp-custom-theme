<?php include 'includes/header.php';?>
  <!-- Header End -->


<main>
  <section class="banner_section">
    <div class="container">
      <!-- Banner search form -->
      <?php include 'includes/search-form.php';?>
    </div>
  </section>
  <section class="dashboard_section my__account">
    <div class="container">
      <div class="section_width">
        <div class="dashboard_main d-flex">
          <div class="dashboard_navbar">
            <!-- Dashboard inner menu -->
            <?php $currentPage = 'my__account'; include 'includes/dashboard-menu.php';?>
          </div>
          <div class="content__column">
            <form action="">
              <div class="full_width_container">
                <div class="full_width input_group">
                  <label for="">First Name</label>
                  <input type="text" name="" id="" required />
                </div>
              </div>
              <div class="full_width_container">
                <div class="full_width input_group">
                  <label for="">Last Name</label>
                  <input type="text" name="" id="" required />
                </div>
              </div>
              <div class="full_width_container">
                <div class="full_width input_group">
                  <label for="">Email</label>
                  <input type="email" name="" id="" required />
                  <p class="verified_text">
                    <span>Your email is not verified,</span> send verification
                    email
                  </p>
                </div>
              </div>

              <h3 class="reset_password">Reset Password</h3>
              <div class="full_width_container">
                <div class="full_width input_group">
                  <label for="">New Password</label>
                  <input type="password" name="" id="" />
                </div>
              </div>
              <div class="full_width_container">
                <div class="full_width input_group">
                  <label for="">Confirm New Password</label>
                  <input type="password" name="" id="" />
                </div>
              </div>
              <div class="form_btn_container">
                <input class="_btn btn_primary" type="submit" value="Update" />
              </div>
            </form>
            <div class="user_profile_photo">
              <div class="d-flex align-items-center">
                <div class="user_img_column">
                  <img src="images/dashboard_user_photo.png" alt="" />
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
                      required
                    />
                  </div>
                  <p>JPEG, GIF or PNG, 200х200 pixels. Max 1MB</p>
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
<?php include 'includes/footer.php';?>