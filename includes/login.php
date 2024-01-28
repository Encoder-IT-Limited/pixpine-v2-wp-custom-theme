<div
  class="modal fade signup__login__modal"
  id="loginModal"
  tabindex="-1"
  aria-labelledby="loginModalLabel"
  aria-hidden="true"
>
    
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <main class="signup__login login_page">
        <div class="container">
          <div class="main_content">
            <div id="mobile__heading__col" class="heading__col">
              <h2 class="section_heading log_in">
                Log in: Great to have you back!
              </h2>
            </div>
            <div class="login_signup_f_g_contianer">
                <a href="<?php echo google_login_url();?>">
                  <button>
                <div class="btn_img">
                  <img src="<?php echo get_template_directory_uri();?>/assets/images/login_signup_g.png" alt="" />
                </div>
                <span>Log in with your Gmail</span>
              </button>
                </a>
            
                <a href="<?php echo eil_code_fb_login();?>"><button>
                <div class="btn_img">
                  <img src="<?php echo get_template_directory_uri();?>/assets/images/login_signup_f.png" alt="" />
                </div>
                <span>Log in with your Facebook</span>
              </button></a> 
              
            </div>
            <div class="separator">
              <p>or</p>
            </div>
            <div class="form_right_column">
              <div id="desktop__heading__col" class="heading__col">
                <h2 class="section_heading log_in">
                  Log in: Great to have you back!
                </h2>
              </div>
              <form action="" id="login-form">
                <input
                  type="email"
                  name="user_email"
                  id="login-email"
                  placeholder="Email"
                  required
                  autocomplete="on"
                />
                <div class="label_col">
                  <input
                    type="password"
                    name="user_password"
                    id="login-password"
                    placeholder="Password"
                    required
                    autocomplete="on"
                  />
                  <p class="login-form-error"></p>
                  <label class="forgot_password" for=""
                    >Forgot password <a href="<?php echo site_url().'/wp-login.php?action=lostpassword';?>">click here</a></label
                  >
                </div>
                <input class="input_btn" type="submit" value="Log in" />
                <p class="have_an_account">
                  <a type="button" data-bs-toggle="modal" data-bs-target="#signupModal">Sign up</a> for a free account
                </p>
              </form>
              <p>
                By creating an account you agree to our
                <a href="<?php echo site_url('terms-and-conditions');?>">Terms & Conditions</a> and our
                <a href="<?php echo site_url('policy');?>">Privacy Policy</a>
              </p>
            </div>
          </div>
        </div>
      </main>
    </div>
  </div>
</div>
