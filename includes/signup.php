<div
  class="modal fade signup__login__modal"
  id="signupModal"
  tabindex="-1"
  aria-labelledby="signupModalLabel"
  aria-hidden="true"
>
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <main class="signup__login signup_page">
        <div class="container">
          <div class="main_content">
            <div id="mobile__heading__col" class="heading__col">
              <h2 class="section_heading log_in">
                New in here? Create Free Account
              </h2>
            </div>
            <div class="login_signup_f_g_contianer">
              <button>
                <div class="btn_img">
                  <img src="<?php echo get_template_directory_uri();?>/assets/images/login_signup_g.png" alt="" />
                </div>
                <span>Sign up with your Gmail</span>
              </button>
              <button>
                <div class="btn_img">
                  <img src="<?php echo get_template_directory_uri();?>/assets/images/login_signup_f.png" alt="" />
                </div>
                <span>Sign up with your Facebook</span>
              </button>
            </div>
            <div class="separator">
              <p>or</p>
            </div>
            <div class="form_right_column">
              <div id="desktop__heading__col" class="heading__col">
                <h2 class="section_heading log_in">
                  New in here? Create Free Account
                </h2>
              </div>
              <form action="">
                <input
                  type="text"
                  name=""
                  id=""
                  placeholder="First Name"
                  required
                />
                <input
                  type="text"
                  name=""
                  id=""
                  placeholder="Last Name"
                  required
                />
                <div class="">
                  <input
                    type="email"
                    name=""
                    id=""
                    placeholder="Email"
                    required
                  />
                  <label for="">We will send password to your inbox</label>
                </div>
                <input class="input_btn" type="submit" value="Sign up" />
                <p class="have_an_account">
                  <a type="button" data-bs-toggle="modal" data-bs-target="#loginModal">Log in</a> if you have an account
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
