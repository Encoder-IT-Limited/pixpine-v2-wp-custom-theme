<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Pixpine</title>
    <link rel="icon" type="image/x-icon" href="images/favicon.ico" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />

    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css"
    />
    <link rel="stylesheet" href="styles/style.css" />
    <link rel="stylesheet" href="styles/home-style.css" />
  </head>
  <body>
    <!-- Home page header is different and all other pages have different headers -->
    <div class="home">
      <header>
        <nav class="navbar navbar-expand-lg">
          <div class="container-fluid container">
            <a class="navbar-brand" href="index.php">
              <img src="<?php echo get_template_directory_uri();?>/assets/images/home_logo.png" alt="" />
            </a>
            <div id="mobile_cart_btn">
              <ul class="d-flex align-items-center">
                <li class="nav-item">
                  <a class="nav-link cart_icon" href="">
                    <img
                      class="cart_img"
                      src="<?php echo get_template_directory_uri();?>/assets/images/home_cart_icon.png"
                      alt=""
                    />
                  </a>
                </li>
                <li class="nav-item">
                  <a
                    type="button"
                    class="nav-link"
                    data-bs-toggle="modal"
                    data-bs-target="#loginModal"
                  >
                    Log in
                  </a>
                </li>
              </ul>
            </div>
            <button
              class="navbar-toggler"
              type="button"
              data-bs-toggle="collapse"
              data-bs-target="#navbarSupportedContent"
              aria-controls="navbarSupportedContent"
              aria-expanded="false"
              aria-label="Toggle navigation"
            >
              <span class="navbar_mobile_icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav me-auto">
                <li class="nav-item">
                  <a class="nav-link" href="free-mockups.php">Free Mockups</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="premium-mockups.php"
                    >Premium Mockups</a
                  >
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="bundle-mockups.php">Bundle Mockups</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="customized-mockup.php"
                    >Customise Mockups</a
                  >
                </li>

                <div id="mobile__btn__container">
                  <li class="nav-item">
                    <a
                      class="_btn get_premium_btn btn_black_small btn_primary"
                      href="subscription.php"
                    >
                      Get Premium
                    </a>
                  </li>
                  <li class="nav-item">
                    <a
                      type="button"
                      data-bs-toggle="modal"
                      data-bs-target="#signupModal"
                      class="nav-link"
                      >Sign up</a
                    >
                  </li>
                </div>
              </ul>
              <div id="login_signup">
                <ul class="navbar-nav">
                  <li class="nav-item">
                    <a
                      class="_btn get_premium_btn btn_black_small btn_primary"
                      href="subscription.php"
                    >
                      Get Premium
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link cart_icon" href="">
                      <img
                        class="cart_img"
                        src="<?php echo get_template_directory_uri();?>/assets/images/home_cart_icon.png"
                        alt=""
                      />
                    </a>
                  </li>
                  <li class="nav-item">
                    <a
                      type="button"
                      class="nav-link"
                      data-bs-toggle="modal"
                      data-bs-target="#loginModal"
                      >Log in</a
                    >
                  </li>
                  <li class="nav-item">
                    <a
                      type="button"
                      data-bs-toggle="modal"
                      data-bs-target="#signupModal"
                      class="nav-link"
                      >Sign up</a
                    >
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </nav>
      </header>
    </div>

    <main>
      <section class="home banner_section">
        <div class="container">
          <div class="heading_col text-center">
            <h1 class="page_heading">
              Visualize your design with our Premium PSD Mockups
            </h1>
            <p class="sub_heading">
              A growing online market for Photoshop Templates at an unbelievable
              price
            </p>
          </div>

          <!-- Banner search form -->
          <?php include 'includes/search-form.php';?>

          <div class="trending_col">
            <p>Explore Trending Products on Pixpine.com</p>
            <div class="trending_item_container">
              <div class="trending_item">
                <a href="#">
                  <div class="img_col">
                    <img src="<?php echo get_template_directory_uri();?>/assets/images/trending_img.png" alt="" />
                  </div>
                  <span>Boxes</span>
                </a>
              </div>
              <div class="trending_item">
                <a href="">
                  <div class="img_col">
                    <img src="<?php echo get_template_directory_uri();?>/assets/images/trending_img.png" alt="" />
                  </div>
                  <span>Glass Jar</span>
                </a>
              </div>
              <div class="trending_item">
                <a href="">
                  <div class="img_col">
                    <img src="<?php echo get_template_directory_uri();?>/assets/images/trending_img.png" alt="" />
                  </div>
                  <span>T-Shirt</span>
                </a>
              </div>
              <div class="trending_item">
                <a href="">
                  <div class="img_col">
                    <img src="<?php echo get_template_directory_uri();?>/assets/images/trending_img.png" alt="" />
                  </div>
                  <span>Bottle</span>
                </a>
              </div>
              <div class="trending_item">
                <a href="">
                  <div class="img_col">
                    <img src="<?php echo get_template_directory_uri();?>/assets/images/trending_img.png" alt="" />
                  </div>
                  <span>Envelope</span>
                </a>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="get_mockup_section">
        <div class="container">
          <div class="get_mockup text-center">
            <h6>Get 96% off, as low as $0.14 a mockup</h6>
            <a class="btn_black _btn btn_black_small" href="subscription.php"
              >Get Premium</a
            >
          </div>
        </div>
      </section>
      <section class="explore_creative_section">
        <div class="container">
          <div class="heading_col">
            <h2
              class="section_heading section_heading_bold section_heading_primary"
            >
              Explore your creative side
            </h2>
            <p class="sub_heading">
              with these carefully crafted mockups that stand out your work like
              a pro.
            </p>
          </div>
          <div class="card_container">
            <div class="card_item">
              <div class="inner_col pixpine_card_border">
                <img src="<?php echo get_template_directory_uri();?>/assets/images/trending_img.png" alt="" />
              </div>
            </div>
            <div class="card_item">
              <div class="inner_col pixpine_card_border">
                <img src="<?php echo get_template_directory_uri();?>/assets/images/trending_img.png" alt="" />
              </div>
            </div>
            <div class="card_item">
              <div class="inner_col pixpine_card_border">
                <img src="<?php echo get_template_directory_uri();?>/assets/images/trending_img.png" alt="" />
              </div>
            </div>
            <div class="card_item">
              <div class="inner_col pixpine_card_border">
                <img src="<?php echo get_template_directory_uri();?>/assets/images/trending_img.png" alt="" />
              </div>
            </div>
            <div class="card_item">
              <div class="inner_col pixpine_card_border">
                <img src="<?php echo get_template_directory_uri();?>/assets/images/trending_img.png" alt="" />
              </div>
            </div>
            <div class="card_item">
              <div class="inner_col pixpine_card_border">
                <img src="<?php echo get_template_directory_uri();?>/assets/images/trending_img.png" alt="" />
              </div>
            </div>
            <div class="card_item">
              <div class="inner_col pixpine_card_border">
                <img src="<?php echo get_template_directory_uri();?>/assets/images/trending_img.png" alt="" />
              </div>
            </div>
            <div class="card_item">
              <div class="inner_col pixpine_card_border">
                <img src="<?php echo get_template_directory_uri();?>/assets/images/trending_img.png" alt="" />
              </div>
            </div>
            <div class="card_item">
              <div class="inner_col pixpine_card_border">
                <img src="<?php echo get_template_directory_uri();?>/assets/images/trending_img.png" alt="" />
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="get_premium_mockups_section">
        <div class="container">
          <div
            class="premium_mockups_inner d-flex justify-content-between align-items-center"
          >
            <div class="premium_text">
              <h2
                class="section_heading section_heading_primary section_heading_bold"
              >
                Get 96% Off
                <span class="section_heading_medium default_color"
                  >on premium mockups</span
                >
              </h2>
              <p class="sub_heading">
                With a yearly subscription, you can get each mockup for only
                <span class="primary_color"
                  >$0.14 with unlimited downloads.</span
                >
              </p>
              <a href="subscription.php" class="btn_primary _btn"
                >Get premium</a
              >
            </div>
            <div class="premium_img">
              <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
            </div>
          </div>
        </div>
      </section>
      <section id="premium_mockups" class="recently_added_premium_mockups">
        <div class="container">
          <div class="heading_col text-center">
            <h2 class="section_heading">Recently Added Premium Mockups</h2>
          </div>
          <div class="tab_img_container">
            <ul class="nav nav-tabs" role="tablist">
              <li class="nav-item" role="presentation">
                <button
                  class="nav-link active"
                  id="business_cards_tab"
                  data-bs-toggle="tab"
                  data-bs-target="#business_cards"
                  type="button"
                  role="tab"
                  aria-controls="business_cards"
                  aria-selected="true"
                >
                  Business Cards
                </button>
              </li>
              <li class="nav-item" role="presentation">
                <button
                  class="nav-link"
                  id="brochure_tab"
                  data-bs-toggle="tab"
                  data-bs-target="#brochure"
                  type="button"
                  role="tab"
                  aria-controls="brochure"
                  aria-selected="false"
                >
                  Brochure
                </button>
              </li>
              <li class="nav-item" role="presentation">
                <button
                  class="nav-link"
                  id="flyers_tab"
                  data-bs-toggle="tab"
                  data-bs-target="#flyers"
                  type="button"
                  role="tab"
                  aria-controls="flyers"
                  aria-selected="false"
                >
                  Flyers
                </button>
              </li>
              <li class="nav-item" role="presentation">
                <button
                  class="nav-link"
                  id="stationery_tab"
                  data-bs-toggle="tab"
                  data-bs-target="#stationery"
                  type="button"
                  role="tab"
                  aria-controls="stationery"
                  aria-selected="false"
                >
                  Stationery
                </button>
              </li>
              <li class="nav-item" role="presentation">
                <button
                  class="nav-link"
                  id="boxes_tab"
                  data-bs-toggle="tab"
                  data-bs-target="#boxes"
                  type="button"
                  role="tab"
                  aria-controls="boxes"
                  aria-selected="false"
                >
                  Boxes
                </button>
              </li>
              <li class="nav-item" role="presentation">
                <button
                  class="nav-link"
                  id="packaging_tab"
                  data-bs-toggle="tab"
                  data-bs-target="#packaging"
                  type="button"
                  role="tab"
                  aria-controls="packaging"
                  aria-selected="false"
                >
                  Packaging
                </button>
              </li>
              <li class="nav-item" role="presentation">
                <button
                  class="nav-link"
                  id="books_tab"
                  data-bs-toggle="tab"
                  data-bs-target="#books"
                  type="button"
                  role="tab"
                  aria-controls="books"
                  aria-selected="false"
                >
                  Books
                </button>
              </li>
              <li class="nav-item" role="presentation">
                <button
                  class="nav-link"
                  id="apparel_tab"
                  data-bs-toggle="tab"
                  data-bs-target="#apparel"
                  type="button"
                  role="tab"
                  aria-controls="apparel"
                  aria-selected="false"
                >
                  Apparel
                </button>
              </li>
              <li class="nav-item" role="presentation">
                <button
                  class="nav-link"
                  id="billboard_tab"
                  data-bs-toggle="tab"
                  data-bs-target="#billboard"
                  type="button"
                  role="tab"
                  aria-controls="billboard"
                  aria-selected="false"
                >
                  Billboard
                </button>
                <div class="dropdown">
                  <button
                    class="dropdown-toggle"
                    type="button"
                    data-bs-toggle="dropdown"
                    aria-expanded="false"
                  >
                    <img src="<?php echo get_template_directory_uri();?>/assets/images/tab_down_arrow.png" alt="" />
                  </button>

                  <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item" href="">Cup</a></li>
                    <li><a class="dropdown-item" href="">Cosmetic</a></li>
                    <li><a class="dropdown-item" href="">Flyers</a></li>
                    <li><a class="dropdown-item" href="">Frame</a></li>
                    <li><a class="dropdown-item" href="">Packaging</a></li>
                    <li><a class="dropdown-item" href="">Poster</a></li>
                    <li><a class="dropdown-item" href="">Shopping Bag</a></li>
                    <li><a class="dropdown-item" href="">Stationery</a></li>
                  </ul>
                </div>
              </li>
            </ul>
            <div class="tab-content">
              <div
                class="tab-pane fade show active"
                id="business_cards"
                role="tabpanel"
                aria-labelledby="business_cards_tab"
              >
                <div class="tab_inner_content">
                  <div class="card_container row_d justify-content-center">
                    <div
                      type="button"
                      data-bs-toggle="modal"
                      data-bs-target="#premiumModal"
                      class="card_item"
                    >
                      <div class="item_a">
                        <div class="inner_col">
                          <div class="img_col pixpine_card_border">
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                          </div>
                          <div class="text_col">
                            <h4 class="default_color">
                              Business Card on Wooden Table Mockup
                            </h4>
                            <p class="primary_color">Premium</p>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div
                      type="button"
                      data-bs-toggle="modal"
                      data-bs-target="#premiumModal"
                      class="card_item"
                    >
                      <div class="item_a">
                        <div class="inner_col">
                          <div class="img_col pixpine_card_border">
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                          </div>
                          <div class="text_col">
                            <h4 class="default_color">Business Card Mockup</h4>
                            <p class="primary_color">Premium</p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div
                      type="button"
                      data-bs-toggle="modal"
                      data-bs-target="#premiumModal"
                      class="card_item"
                    >
                      <div class="item_a">
                        <div class="inner_col">
                          <div class="img_col pixpine_card_border">
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                          </div>
                          <div class="text_col">
                            <h4 class="default_color">Business Card Mockup</h4>
                            <p class="primary_color">Premium</p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div
                      type="button"
                      data-bs-toggle="modal"
                      data-bs-target="#premiumModal"
                      class="card_item"
                    >
                      <div class="item_a">
                        <div class="inner_col">
                          <div class="img_col pixpine_card_border">
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                          </div>
                          <div class="text_col">
                            <h4 class="default_color">Business Card Mockup</h4>
                            <p class="primary_color">Premium</p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div
                      type="button"
                      data-bs-toggle="modal"
                      data-bs-target="#premiumModal"
                      class="card_item"
                    >
                      <div class="item_a">
                        <div class="inner_col">
                          <div class="img_col pixpine_card_border">
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                          </div>
                          <div class="text_col">
                            <h4 class="default_color">Business Card Mockup</h4>
                            <p class="primary_color">Premium</p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div
                      type="button"
                      data-bs-toggle="modal"
                      data-bs-target="#premiumModal"
                      class="card_item"
                    >
                      <div class="item_a">
                        <div class="inner_col">
                          <div class="img_col pixpine_card_border">
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                          </div>
                          <div class="text_col">
                            <h4 class="default_color">Business Card Mockup</h4>
                            <p class="primary_color">Premium</p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div
                      type="button"
                      data-bs-toggle="modal"
                      data-bs-target="#premiumModal"
                      class="card_item"
                    >
                      <div class="item_a">
                        <div class="inner_col">
                          <div class="img_col pixpine_card_border">
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                          </div>
                          <div class="text_col">
                            <h4 class="default_color">Business Card Mockup</h4>
                            <p class="primary_color">Premium</p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div
                      type="button"
                      data-bs-toggle="modal"
                      data-bs-target="#premiumModal"
                      class="card_item"
                    >
                      <div class="item_a">
                        <div class="inner_col">
                          <div class="img_col pixpine_card_border">
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                          </div>
                          <div class="text_col">
                            <h4 class="default_color">Business Card Mockup</h4>
                            <p class="primary_color">Premium</p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div
                      type="button"
                      data-bs-toggle="modal"
                      data-bs-target="#premiumModal"
                      class="card_item"
                    >
                      <div class="item_a">
                        <div class="inner_col">
                          <div class="img_col pixpine_card_border">
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                          </div>
                          <div class="text_col">
                            <h4 class="default_color">Business Card Mockup</h4>
                            <p class="primary_color">Premium</p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div
                      type="button"
                      data-bs-toggle="modal"
                      data-bs-target="#premiumModal"
                      class="card_item"
                    >
                      <div class="item_a">
                        <div class="inner_col">
                          <div class="img_col pixpine_card_border">
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                          </div>
                          <div class="text_col">
                            <h4 class="default_color">Business Card Mockup</h4>
                            <p class="primary_color">Premium</p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="text-end">
                    <a class="btn_primary _btn" href="premium-mockups.php"
                      >View All</a
                    >
                  </div>
                </div>
              </div>
              <div
                class="tab-pane fade"
                id="brochure"
                role="tabpanel"
                aria-labelledby="brochure_tab"
              >
                <div class="tab_inner_content">
                  <div class="card_container row_d justify-content-center">
                    <div
                      type="button"
                      data-bs-toggle="modal"
                      data-bs-target="#premiumModal"
                      class="card_item"
                    >
                      <div class="item_a">
                        <div class="inner_col">
                          <div class="img_col pixpine_card_border">
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                          </div>
                          <div class="text_col">
                            <h4 class="default_color">Business Card Mockup</h4>
                            <p class="primary_color">Premium</p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div
                      type="button"
                      data-bs-toggle="modal"
                      data-bs-target="#premiumModal"
                      class="card_item"
                    >
                      <div class="item_a">
                        <div class="inner_col">
                          <div class="img_col pixpine_card_border">
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                          </div>
                          <div class="text_col">
                            <h4 class="default_color">Business Card Mockup</h4>
                            <p class="primary_color">Premium</p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div
                      type="button"
                      data-bs-toggle="modal"
                      data-bs-target="#premiumModal"
                      class="card_item"
                    >
                      <div class="item_a">
                        <div class="inner_col">
                          <div class="img_col pixpine_card_border">
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                          </div>
                          <div class="text_col">
                            <h4 class="default_color">Business Card Mockup</h4>
                            <p class="primary_color">Premium</p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div
                      type="button"
                      data-bs-toggle="modal"
                      data-bs-target="#premiumModal"
                      class="card_item"
                    >
                      <div class="item_a">
                        <div class="inner_col">
                          <div class="img_col pixpine_card_border">
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                          </div>
                          <div class="text_col">
                            <h4 class="default_color">Business Card Mockup</h4>
                            <p class="primary_color">Premium</p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div
                      type="button"
                      data-bs-toggle="modal"
                      data-bs-target="#premiumModal"
                      class="card_item"
                    >
                      <div class="item_a">
                        <div class="inner_col">
                          <div class="img_col pixpine_card_border">
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                          </div>
                          <div class="text_col">
                            <h4 class="default_color">Business Card Mockup</h4>
                            <p class="primary_color">Premium</p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div
                      type="button"
                      data-bs-toggle="modal"
                      data-bs-target="#premiumModal"
                      class="card_item"
                    >
                      <div class="item_a">
                        <div class="inner_col">
                          <div class="img_col pixpine_card_border">
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                          </div>
                          <div class="text_col">
                            <h4 class="default_color">Business Card Mockup</h4>
                            <p class="primary_color">Premium</p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div
                      type="button"
                      data-bs-toggle="modal"
                      data-bs-target="#premiumModal"
                      class="card_item"
                    >
                      <div class="item_a">
                        <div class="inner_col">
                          <div class="img_col pixpine_card_border">
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                          </div>
                          <div class="text_col">
                            <h4 class="default_color">Business Card Mockup</h4>
                            <p class="primary_color">Premium</p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div
                      type="button"
                      data-bs-toggle="modal"
                      data-bs-target="#premiumModal"
                      class="card_item"
                    >
                      <div class="item_a">
                        <div class="inner_col">
                          <div class="img_col pixpine_card_border">
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                          </div>
                          <div class="text_col">
                            <h4 class="default_color">Business Card Mockup</h4>
                            <p class="primary_color">Premium</p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div
                      type="button"
                      data-bs-toggle="modal"
                      data-bs-target="#premiumModal"
                      class="card_item"
                    >
                      <div class="item_a">
                        <div class="inner_col">
                          <div class="img_col pixpine_card_border">
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                          </div>
                          <div class="text_col">
                            <h4 class="default_color">Business Card Mockup</h4>
                            <p class="primary_color">Premium</p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div
                      type="button"
                      data-bs-toggle="modal"
                      data-bs-target="#premiumModal"
                      class="card_item"
                    >
                      <div class="item_a">
                        <div class="inner_col">
                          <div class="img_col pixpine_card_border">
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                          </div>
                          <div class="text_col">
                            <h4 class="default_color">Business Card Mockup</h4>
                            <p class="primary_color">Premium</p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="text-end">
                    <a class="btn_primary _btn" href="premium-mockups.php"
                      >View All</a
                    >
                  </div>
                </div>
              </div>
              <div
                class="tab-pane fade"
                id="flyers"
                role="tabpanel"
                aria-labelledby="flyers_tab"
              >
                <div class="tab_inner_content">
                  <div class="card_container row_d justify-content-center">
                    <div
                      type="button"
                      data-bs-toggle="modal"
                      data-bs-target="#premiumModal"
                      class="card_item"
                    >
                      <div class="item_a">
                        <div class="inner_col">
                          <div class="img_col pixpine_card_border">
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                          </div>
                          <div class="text_col">
                            <h4 class="default_color">Business Card Mockup</h4>
                            <p class="primary_color">Premium</p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div
                      type="button"
                      data-bs-toggle="modal"
                      data-bs-target="#premiumModal"
                      class="card_item"
                    >
                      <div class="item_a">
                        <div class="inner_col">
                          <div class="img_col pixpine_card_border">
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                          </div>
                          <div class="text_col">
                            <h4 class="default_color">Business Card Mockup</h4>
                            <p class="primary_color">Premium</p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div
                      type="button"
                      data-bs-toggle="modal"
                      data-bs-target="#premiumModal"
                      class="card_item"
                    >
                      <div class="item_a">
                        <div class="inner_col">
                          <div class="img_col pixpine_card_border">
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                          </div>
                          <div class="text_col">
                            <h4 class="default_color">Business Card Mockup</h4>
                            <p class="primary_color">Premium</p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div
                      type="button"
                      data-bs-toggle="modal"
                      data-bs-target="#premiumModal"
                      class="card_item"
                    >
                      <div class="item_a">
                        <div class="inner_col">
                          <div class="img_col pixpine_card_border">
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                          </div>
                          <div class="text_col">
                            <h4 class="default_color">Business Card Mockup</h4>
                            <p class="primary_color">Premium</p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div
                      type="button"
                      data-bs-toggle="modal"
                      data-bs-target="#premiumModal"
                      class="card_item"
                    >
                      <div class="item_a">
                        <div class="inner_col">
                          <div class="img_col pixpine_card_border">
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                          </div>
                          <div class="text_col">
                            <h4 class="default_color">Business Card Mockup</h4>
                            <p class="primary_color">Premium</p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div
                      type="button"
                      data-bs-toggle="modal"
                      data-bs-target="#premiumModal"
                      class="card_item"
                    >
                      <div class="item_a">
                        <div class="inner_col">
                          <div class="img_col pixpine_card_border">
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                          </div>
                          <div class="text_col">
                            <h4 class="default_color">Business Card Mockup</h4>
                            <p class="primary_color">Premium</p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div
                      type="button"
                      data-bs-toggle="modal"
                      data-bs-target="#premiumModal"
                      class="card_item"
                    >
                      <div class="item_a">
                        <div class="inner_col">
                          <div class="img_col pixpine_card_border">
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                          </div>
                          <div class="text_col">
                            <h4 class="default_color">Business Card Mockup</h4>
                            <p class="primary_color">Premium</p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div
                      type="button"
                      data-bs-toggle="modal"
                      data-bs-target="#premiumModal"
                      class="card_item"
                    >
                      <div class="item_a">
                        <div class="inner_col">
                          <div class="img_col pixpine_card_border">
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                          </div>
                          <div class="text_col">
                            <h4 class="default_color">Business Card Mockup</h4>
                            <p class="primary_color">Premium</p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div
                      type="button"
                      data-bs-toggle="modal"
                      data-bs-target="#premiumModal"
                      class="card_item"
                    >
                      <div class="item_a">
                        <div class="inner_col">
                          <div class="img_col pixpine_card_border">
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                          </div>
                          <div class="text_col">
                            <h4 class="default_color">Business Card Mockup</h4>
                            <p class="primary_color">Premium</p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="text-end">
                    <a class="btn_primary _btn" href="premium-mockups.php"
                      >View All</a
                    >
                  </div>
                </div>
              </div>
              <div
                class="tab-pane fade"
                id="stationery"
                role="tabpanel"
                aria-labelledby="stationery_tab"
              >
                <div class="tab_inner_content">
                  <div class="card_container row_d justify-content-center">
                    <div
                      type="button"
                      data-bs-toggle="modal"
                      data-bs-target="#premiumModal"
                      class="card_item"
                    >
                      <div class="item_a">
                        <div class="inner_col">
                          <div class="img_col pixpine_card_border">
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                          </div>
                          <div class="text_col">
                            <h4 class="default_color">Business Card Mockup</h4>
                            <p class="primary_color">Premium</p>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div
                      type="button"
                      data-bs-toggle="modal"
                      data-bs-target="#premiumModal"
                      class="card_item"
                    >
                      <div class="item_a">
                        <div class="inner_col">
                          <div class="img_col pixpine_card_border">
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                          </div>
                          <div class="text_col">
                            <h4 class="default_color">Business Card Mockup</h4>
                            <p class="primary_color">Premium</p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div
                      type="button"
                      data-bs-toggle="modal"
                      data-bs-target="#premiumModal"
                      class="card_item"
                    >
                      <div class="item_a">
                        <div class="inner_col">
                          <div class="img_col pixpine_card_border">
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                          </div>
                          <div class="text_col">
                            <h4 class="default_color">Business Card Mockup</h4>
                            <p class="primary_color">Premium</p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div
                      type="button"
                      data-bs-toggle="modal"
                      data-bs-target="#premiumModal"
                      class="card_item"
                    >
                      <div class="item_a">
                        <div class="inner_col">
                          <div class="img_col pixpine_card_border">
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                          </div>
                          <div class="text_col">
                            <h4 class="default_color">Business Card Mockup</h4>
                            <p class="primary_color">Premium</p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div
                      type="button"
                      data-bs-toggle="modal"
                      data-bs-target="#premiumModal"
                      class="card_item"
                    >
                      <div class="item_a">
                        <div class="inner_col">
                          <div class="img_col pixpine_card_border">
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                          </div>
                          <div class="text_col">
                            <h4 class="default_color">Business Card Mockup</h4>
                            <p class="primary_color">Premium</p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div
                      type="button"
                      data-bs-toggle="modal"
                      data-bs-target="#premiumModal"
                      class="card_item"
                    >
                      <div class="item_a">
                        <div class="inner_col">
                          <div class="img_col pixpine_card_border">
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                          </div>
                          <div class="text_col">
                            <h4 class="default_color">Business Card Mockup</h4>
                            <p class="primary_color">Premium</p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div
                      type="button"
                      data-bs-toggle="modal"
                      data-bs-target="#premiumModal"
                      class="card_item"
                    >
                      <div class="item_a">
                        <div class="inner_col">
                          <div class="img_col pixpine_card_border">
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                          </div>
                          <div class="text_col">
                            <h4 class="default_color">Business Card Mockup</h4>
                            <p class="primary_color">Premium</p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="text-end">
                    <a class="btn_primary _btn" href="premium-mockups.php"
                      >View All</a
                    >
                  </div>
                </div>
              </div>
              <div
                class="tab-pane fade"
                id="boxes"
                role="tabpanel"
                aria-labelledby="boxes_tab"
              >
                <div class="tab_inner_content">
                  <div class="card_container row_d justify-content-center">
                    <div
                      type="button"
                      data-bs-toggle="modal"
                      data-bs-target="#premiumModal"
                      class="card_item"
                    >
                      <div class="item_a">
                        <div class="inner_col">
                          <div class="img_col pixpine_card_border">
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                          </div>
                          <div class="text_col">
                            <h4 class="default_color">Business Card Mockup</h4>
                            <p class="primary_color">Premium</p>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div
                      type="button"
                      data-bs-toggle="modal"
                      data-bs-target="#premiumModal"
                      class="card_item"
                    >
                      <div class="item_a">
                        <div class="inner_col">
                          <div class="img_col pixpine_card_border">
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                          </div>
                          <div class="text_col">
                            <h4 class="default_color">Business Card Mockup</h4>
                            <p class="primary_color">Premium</p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div
                      type="button"
                      data-bs-toggle="modal"
                      data-bs-target="#premiumModal"
                      class="card_item"
                    >
                      <div class="item_a">
                        <div class="inner_col">
                          <div class="img_col pixpine_card_border">
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                          </div>
                          <div class="text_col">
                            <h4 class="default_color">Business Card Mockup</h4>
                            <p class="primary_color">Premium</p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div
                      type="button"
                      data-bs-toggle="modal"
                      data-bs-target="#premiumModal"
                      class="card_item"
                    >
                      <div class="item_a">
                        <div class="inner_col">
                          <div class="img_col pixpine_card_border">
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                          </div>
                          <div class="text_col">
                            <h4 class="default_color">Business Card Mockup</h4>
                            <p class="primary_color">Premium</p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div
                      type="button"
                      data-bs-toggle="modal"
                      data-bs-target="#premiumModal"
                      class="card_item"
                    >
                      <div class="item_a">
                        <div class="inner_col">
                          <div class="img_col pixpine_card_border">
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                          </div>
                          <div class="text_col">
                            <h4 class="default_color">Business Card Mockup</h4>
                            <p class="primary_color">Premium</p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div
                      type="button"
                      data-bs-toggle="modal"
                      data-bs-target="#premiumModal"
                      class="card_item"
                    >
                      <div class="item_a">
                        <div class="inner_col">
                          <div class="img_col pixpine_card_border">
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                          </div>
                          <div class="text_col">
                            <h4 class="default_color">Business Card Mockup</h4>
                            <p class="primary_color">Premium</p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div
                      type="button"
                      data-bs-toggle="modal"
                      data-bs-target="#premiumModal"
                      class="card_item"
                    >
                      <div class="item_a">
                        <div class="inner_col">
                          <div class="img_col pixpine_card_border">
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                          </div>
                          <div class="text_col">
                            <h4 class="default_color">Business Card Mockup</h4>
                            <p class="primary_color">Premium</p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="text-end">
                    <a class="btn_primary _btn" href="premium-mockups.php"
                      >View All</a
                    >
                  </div>
                </div>
              </div>
              <div
                class="tab-pane fade"
                id="packaging"
                role="tabpanel"
                aria-labelledby="packaging_tab"
              >
                <div class="tab_inner_content">
                  <div class="card_container row_d justify-content-center">
                    <div
                      type="button"
                      data-bs-toggle="modal"
                      data-bs-target="#premiumModal"
                      class="card_item"
                    >
                      <div class="item_a">
                        <div class="inner_col">
                          <div class="img_col pixpine_card_border">
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                          </div>
                          <div class="text_col">
                            <h4 class="default_color">Business Card Mockup</h4>
                            <p class="primary_color">Premium</p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div
                      type="button"
                      data-bs-toggle="modal"
                      data-bs-target="#premiumModal"
                      class="card_item"
                    >
                      <div class="item_a">
                        <div class="inner_col">
                          <div class="img_col pixpine_card_border">
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                          </div>
                          <div class="text_col">
                            <h4 class="default_color">Business Card Mockup</h4>
                            <p class="primary_color">Premium</p>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div
                      type="button"
                      data-bs-toggle="modal"
                      data-bs-target="#premiumModal"
                      class="card_item"
                    >
                      <div class="item_a">
                        <div class="inner_col">
                          <div class="img_col pixpine_card_border">
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                          </div>
                          <div class="text_col">
                            <h4 class="default_color">Business Card Mockup</h4>
                            <p class="primary_color">Premium</p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div
                      type="button"
                      data-bs-toggle="modal"
                      data-bs-target="#premiumModal"
                      class="card_item"
                    >
                      <div class="item_a">
                        <div class="inner_col">
                          <div class="img_col pixpine_card_border">
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                          </div>
                          <div class="text_col">
                            <h4 class="default_color">Business Card Mockup</h4>
                            <p class="primary_color">Premium</p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div
                      type="button"
                      data-bs-toggle="modal"
                      data-bs-target="#premiumModal"
                      class="card_item"
                    >
                      <div class="item_a">
                        <div class="inner_col">
                          <div class="img_col pixpine_card_border">
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                          </div>
                          <div class="text_col">
                            <h4 class="default_color">Business Card Mockup</h4>
                            <p class="primary_color">Premium</p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div
                      type="button"
                      data-bs-toggle="modal"
                      data-bs-target="#premiumModal"
                      class="card_item"
                    >
                      <div class="item_a">
                        <div class="inner_col">
                          <div class="img_col pixpine_card_border">
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                          </div>
                          <div class="text_col">
                            <h4 class="default_color">Business Card Mockup</h4>
                            <p class="primary_color">Premium</p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div
                      type="button"
                      data-bs-toggle="modal"
                      data-bs-target="#premiumModal"
                      class="card_item"
                    >
                      <div class="item_a">
                        <div class="inner_col">
                          <div class="img_col pixpine_card_border">
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                          </div>
                          <div class="text_col">
                            <h4 class="default_color">Business Card Mockup</h4>
                            <p class="primary_color">Premium</p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div
                      type="button"
                      data-bs-toggle="modal"
                      data-bs-target="#premiumModal"
                      class="card_item"
                    >
                      <div class="item_a">
                        <div class="inner_col">
                          <div class="img_col pixpine_card_border">
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                          </div>
                          <div class="text_col">
                            <h4 class="default_color">Business Card Mockup</h4>
                            <p class="primary_color">Premium</p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="text-end">
                    <a class="btn_primary _btn" href="premium-mockups.php"
                      >View All</a
                    >
                  </div>
                </div>
              </div>
              <div
                class="tab-pane fade"
                id="books"
                role="tabpanel"
                aria-labelledby="books_tab"
              >
                <div class="tab_inner_content">
                  <div class="card_container row_d justify-content-center">
                    <div
                      type="button"
                      data-bs-toggle="modal"
                      data-bs-target="#premiumModal"
                      class="card_item"
                    >
                      <div class="item_a">
                        <div class="inner_col">
                          <div class="img_col pixpine_card_border">
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                          </div>
                          <div class="text_col">
                            <h4 class="default_color">Business Card Mockup</h4>
                            <p class="primary_color">Premium</p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div
                      type="button"
                      data-bs-toggle="modal"
                      data-bs-target="#premiumModal"
                      class="card_item"
                    >
                      <div class="item_a">
                        <div class="inner_col">
                          <div class="img_col pixpine_card_border">
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                          </div>
                          <div class="text_col">
                            <h4 class="default_color">Business Card Mockup</h4>
                            <p class="primary_color">Premium</p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div
                      type="button"
                      data-bs-toggle="modal"
                      data-bs-target="#premiumModal"
                      class="card_item"
                    >
                      <div class="item_a">
                        <div class="inner_col">
                          <div class="img_col pixpine_card_border">
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                          </div>
                          <div class="text_col">
                            <h4 class="default_color">Business Card Mockup</h4>
                            <p class="primary_color">Premium</p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div
                      type="button"
                      data-bs-toggle="modal"
                      data-bs-target="#premiumModal"
                      class="card_item"
                    >
                      <div class="item_a">
                        <div class="inner_col">
                          <div class="img_col pixpine_card_border">
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                          </div>
                          <div class="text_col">
                            <h4 class="default_color">Business Card Mockup</h4>
                            <p class="primary_color">Premium</p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div
                      type="button"
                      data-bs-toggle="modal"
                      data-bs-target="#premiumModal"
                      class="card_item"
                    >
                      <div class="item_a">
                        <div class="inner_col">
                          <div class="img_col pixpine_card_border">
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                          </div>
                          <div class="text_col">
                            <h4 class="default_color">Business Card Mockup</h4>
                            <p class="primary_color">Premium</p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div
                      type="button"
                      data-bs-toggle="modal"
                      data-bs-target="#premiumModal"
                      class="card_item"
                    >
                      <div class="item_a">
                        <div class="inner_col">
                          <div class="img_col pixpine_card_border">
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                          </div>
                          <div class="text_col">
                            <h4 class="default_color">Business Card Mockup</h4>
                            <p class="primary_color">Premium</p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div
                      type="button"
                      data-bs-toggle="modal"
                      data-bs-target="#premiumModal"
                      class="card_item"
                    >
                      <div class="item_a">
                        <div class="inner_col">
                          <div class="img_col pixpine_card_border">
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                          </div>
                          <div class="text_col">
                            <h4 class="default_color">Business Card Mockup</h4>
                            <p class="primary_color">Premium</p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div
                      type="button"
                      data-bs-toggle="modal"
                      data-bs-target="#premiumModal"
                      class="card_item"
                    >
                      <div class="item_a">
                        <div class="inner_col">
                          <div class="img_col pixpine_card_border">
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                          </div>
                          <div class="text_col">
                            <h4 class="default_color">Business Card Mockup</h4>
                            <p class="primary_color">Premium</p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div
                      type="button"
                      data-bs-toggle="modal"
                      data-bs-target="#premiumModal"
                      class="card_item"
                    >
                      <div class="item_a">
                        <div class="inner_col">
                          <div class="img_col pixpine_card_border">
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                          </div>
                          <div class="text_col">
                            <h4 class="default_color">Business Card Mockup</h4>
                            <p class="primary_color">Premium</p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div
                      type="button"
                      data-bs-toggle="modal"
                      data-bs-target="#premiumModal"
                      class="card_item"
                    >
                      <div class="item_a">
                        <div class="inner_col">
                          <div class="img_col pixpine_card_border">
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                          </div>
                          <div class="text_col">
                            <h4 class="default_color">Business Card Mockup</h4>
                            <p class="primary_color">Premium</p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="text-end">
                    <a class="btn_primary _btn" href="premium-mockups.php"
                      >View All</a
                    >
                  </div>
                </div>
              </div>
              <div
                class="tab-pane fade"
                id="apparel"
                role="tabpanel"
                aria-labelledby="apparel_tab"
              >
                <div class="tab_inner_content">
                  <div class="card_container row_d justify-content-center">
                    <div
                      type="button"
                      data-bs-toggle="modal"
                      data-bs-target="#premiumModal"
                      class="card_item"
                    >
                      <div class="item_a">
                        <div class="inner_col">
                          <div class="img_col pixpine_card_border">
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                          </div>
                          <div class="text_col">
                            <h4 class="default_color">Business Card Mockup</h4>
                            <p class="primary_color">Premium</p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div
                      type="button"
                      data-bs-toggle="modal"
                      data-bs-target="#premiumModal"
                      class="card_item"
                    >
                      <div class="item_a">
                        <div class="inner_col">
                          <div class="img_col pixpine_card_border">
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                          </div>
                          <div class="text_col">
                            <h4 class="default_color">Business Card Mockup</h4>
                            <p class="primary_color">Premium</p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div
                      type="button"
                      data-bs-toggle="modal"
                      data-bs-target="#premiumModal"
                      class="card_item"
                    >
                      <div class="item_a">
                        <div class="inner_col">
                          <div class="img_col pixpine_card_border">
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                          </div>
                          <div class="text_col">
                            <h4 class="default_color">Business Card Mockup</h4>
                            <p class="primary_color">Premium</p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div
                      type="button"
                      data-bs-toggle="modal"
                      data-bs-target="#premiumModal"
                      class="card_item"
                    >
                      <div class="item_a">
                        <div class="inner_col">
                          <div class="img_col pixpine_card_border">
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                          </div>
                          <div class="text_col">
                            <h4 class="default_color">Business Card Mockup</h4>
                            <p class="primary_color">Premium</p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div
                      type="button"
                      data-bs-toggle="modal"
                      data-bs-target="#premiumModal"
                      class="card_item"
                    >
                      <div class="item_a">
                        <div class="inner_col">
                          <div class="img_col pixpine_card_border">
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                          </div>
                          <div class="text_col">
                            <h4 class="default_color">Business Card Mockup</h4>
                            <p class="primary_color">Premium</p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div
                      type="button"
                      data-bs-toggle="modal"
                      data-bs-target="#premiumModal"
                      class="card_item"
                    >
                      <div class="item_a">
                        <div class="inner_col">
                          <div class="img_col pixpine_card_border">
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                          </div>
                          <div class="text_col">
                            <h4 class="default_color">Business Card Mockup</h4>
                            <p class="primary_color">Premium</p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div
                      type="button"
                      data-bs-toggle="modal"
                      data-bs-target="#premiumModal"
                      class="card_item"
                    >
                      <div class="item_a">
                        <div class="inner_col">
                          <div class="img_col pixpine_card_border">
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                          </div>
                          <div class="text_col">
                            <h4 class="default_color">Business Card Mockup</h4>
                            <p class="primary_color">Premium</p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div
                      type="button"
                      data-bs-toggle="modal"
                      data-bs-target="#premiumModal"
                      class="card_item"
                    >
                      <div class="item_a">
                        <div class="inner_col">
                          <div class="img_col pixpine_card_border">
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                          </div>
                          <div class="text_col">
                            <h4 class="default_color">Business Card Mockup</h4>
                            <p class="primary_color">Premium</p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div
                      type="button"
                      data-bs-toggle="modal"
                      data-bs-target="#premiumModal"
                      class="card_item"
                    >
                      <div class="item_a">
                        <div class="inner_col">
                          <div class="img_col pixpine_card_border">
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                          </div>
                          <div class="text_col">
                            <h4 class="default_color">Business Card Mockup</h4>
                            <p class="primary_color">Premium</p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div
                      type="button"
                      data-bs-toggle="modal"
                      data-bs-target="#premiumModal"
                      class="card_item"
                    >
                      <div class="item_a">
                        <div class="inner_col">
                          <div class="img_col pixpine_card_border">
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                          </div>
                          <div class="text_col">
                            <h4 class="default_color">Business Card Mockup</h4>
                            <p class="primary_color">Premium</p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div
                      type="button"
                      data-bs-toggle="modal"
                      data-bs-target="#premiumModal"
                      class="card_item"
                    >
                      <div class="item_a">
                        <div class="inner_col">
                          <div class="img_col pixpine_card_border">
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                          </div>
                          <div class="text_col">
                            <h4 class="default_color">Business Card Mockup</h4>
                            <p class="primary_color">Premium</p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="text-end">
                    <a class="btn_primary _btn" href="premium-mockups.php"
                      >View All</a
                    >
                  </div>
                </div>
              </div>
              <div
                class="tab-pane fade"
                id="billboard"
                role="tabpanel"
                aria-labelledby="billboard_tab"
              >
                <div class="tab_inner_content">
                  <div class="card_container row_d justify-content-center">
                    <div
                      type="button"
                      data-bs-toggle="modal"
                      data-bs-target="#premiumModal"
                      class="card_item"
                    >
                      <div class="item_a">
                        <div class="inner_col">
                          <div class="img_col pixpine_card_border">
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                          </div>
                          <div class="text_col">
                            <h4 class="default_color">Business Card Mockup</h4>
                            <p class="primary_color">Premium</p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div
                      type="button"
                      data-bs-toggle="modal"
                      data-bs-target="#premiumModal"
                      class="card_item"
                    >
                      <div class="item_a">
                        <div class="inner_col">
                          <div class="img_col pixpine_card_border">
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                          </div>
                          <div class="text_col">
                            <h4 class="default_color">Business Card Mockup</h4>
                            <p class="primary_color">Premium</p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div
                      type="button"
                      data-bs-toggle="modal"
                      data-bs-target="#premiumModal"
                      class="card_item"
                    >
                      <div class="item_a">
                        <div class="inner_col">
                          <div class="img_col pixpine_card_border">
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                          </div>
                          <div class="text_col">
                            <h4 class="default_color">Business Card Mockup</h4>
                            <p class="primary_color">Premium</p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div
                      type="button"
                      data-bs-toggle="modal"
                      data-bs-target="#premiumModal"
                      class="card_item"
                    >
                      <div class="item_a">
                        <div class="inner_col">
                          <div class="img_col pixpine_card_border">
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                          </div>
                          <div class="text_col">
                            <h4 class="default_color">Business Card Mockup</h4>
                            <p class="primary_color">Premium</p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div
                      type="button"
                      data-bs-toggle="modal"
                      data-bs-target="#premiumModal"
                      class="card_item"
                    >
                      <div class="item_a">
                        <div class="inner_col">
                          <div class="img_col pixpine_card_border">
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                          </div>
                          <div class="text_col">
                            <h4 class="default_color">Business Card Mockup</h4>
                            <p class="primary_color">Premium</p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div
                      type="button"
                      data-bs-toggle="modal"
                      data-bs-target="#premiumModal"
                      class="card_item"
                    >
                      <div class="item_a">
                        <div class="inner_col">
                          <div class="img_col pixpine_card_border">
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                          </div>
                          <div class="text_col">
                            <h4 class="default_color">Business Card Mockup</h4>
                            <p class="primary_color">Premium</p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div
                      type="button"
                      data-bs-toggle="modal"
                      data-bs-target="#premiumModal"
                      class="card_item"
                    >
                      <div class="item_a">
                        <div class="inner_col">
                          <div class="img_col pixpine_card_border">
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                          </div>
                          <div class="text_col">
                            <h4 class="default_color">Business Card Mockup</h4>
                            <p class="primary_color">Premium</p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div
                      type="button"
                      data-bs-toggle="modal"
                      data-bs-target="#premiumModal"
                      class="card_item"
                    >
                      <div class="item_a">
                        <div class="inner_col">
                          <div class="img_col pixpine_card_border">
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                          </div>
                          <div class="text_col">
                            <h4 class="default_color">Business Card Mockup</h4>
                            <p class="primary_color">Premium</p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div
                      type="button"
                      data-bs-toggle="modal"
                      data-bs-target="#premiumModal"
                      class="card_item"
                    >
                      <div class="item_a">
                        <div class="inner_col">
                          <div class="img_col pixpine_card_border">
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                          </div>
                          <div class="text_col">
                            <h4 class="default_color">Business Card Mockup</h4>
                            <p class="primary_color">Premium</p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div
                      type="button"
                      data-bs-toggle="modal"
                      data-bs-target="#premiumModal"
                      class="card_item"
                    >
                      <div class="item_a">
                        <div class="inner_col">
                          <div class="img_col pixpine_card_border">
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                          </div>
                          <div class="text_col">
                            <h4 class="default_color">Business Card Mockup</h4>
                            <p class="primary_color">Premium</p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="text-end">
                    <a class="btn_primary _btn" href="premium-mockups.php"
                      >View All</a
                    >
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section id="free_mockups" class="recently_added_free_mockups">
        <div class="container">
          <div class="heading_col text-center">
            <h2 class="section_heading">Recently Added Free Mockups</h2>
          </div>
          <div class="tab_img_container">
            <ul class="nav nav-tabs" role="tablist">
              <li class="nav-item" role="presentation">
                <button
                  class="nav-link active"
                  id="business_cards_tab_free"
                  data-bs-toggle="tab"
                  data-bs-target="#business_cards_free"
                  type="button"
                  role="tab"
                  aria-controls="business_cards_free"
                  aria-selected="true"
                >
                  Business Cards
                </button>
              </li>
              <li class="nav-item" role="presentation">
                <button
                  class="nav-link"
                  id="brochure_tab_free"
                  data-bs-toggle="tab"
                  data-bs-target="#brochure_free"
                  type="button"
                  role="tab"
                  aria-controls="brochure_free"
                  aria-selected="false"
                >
                  Brochure
                </button>
              </li>
              <li class="nav-item" role="presentation">
                <button
                  class="nav-link"
                  id="flyers_tab_free"
                  data-bs-toggle="tab"
                  data-bs-target="#flyers_free"
                  type="button"
                  role="tab"
                  aria-controls="flyers_free"
                  aria-selected="false"
                >
                  Flyers
                </button>
              </li>
              <li class="nav-item" role="presentation">
                <button
                  class="nav-link"
                  id="stationery_tab_free"
                  data-bs-toggle="tab"
                  data-bs-target="#stationery_free"
                  type="button"
                  role="tab"
                  aria-controls="stationery_free"
                  aria-selected="false"
                >
                  Stationery
                </button>
              </li>
              <li class="nav-item" role="presentation">
                <button
                  class="nav-link"
                  id="boxes_tab_free"
                  data-bs-toggle="tab"
                  data-bs-target="#boxes_free"
                  type="button"
                  role="tab"
                  aria-controls="boxes_free"
                  aria-selected="false"
                >
                  Boxes
                </button>
              </li>
              <li class="nav-item" role="presentation">
                <button
                  class="nav-link"
                  id="packaging_tab_free"
                  data-bs-toggle="tab"
                  data-bs-target="#packaging_free"
                  type="button"
                  role="tab"
                  aria-controls="packaging_free"
                  aria-selected="false"
                >
                  Packaging
                </button>
              </li>
              <li class="nav-item" role="presentation">
                <button
                  class="nav-link"
                  id="books_tab_free"
                  data-bs-toggle="tab"
                  data-bs-target="#books_free"
                  type="button"
                  role="tab"
                  aria-controls="books_free"
                  aria-selected="false"
                >
                  Books
                </button>
              </li>
              <li class="nav-item" role="presentation">
                <button
                  class="nav-link"
                  id="apparel_tab_free"
                  data-bs-toggle="tab"
                  data-bs-target="#apparel_free"
                  type="button"
                  role="tab"
                  aria-controls="apparel_free"
                  aria-selected="false"
                >
                  Apparel
                </button>
              </li>
              <li class="nav-item" role="presentation">
                <button
                  class="nav-link"
                  id="billboard_tab_free"
                  data-bs-toggle="tab"
                  data-bs-target="#billboard_free"
                  type="button"
                  role="tab"
                  aria-controls="billboard_free"
                  aria-selected="false"
                >
                  Billboard
                </button>
                <div class="dropdown">
                  <button
                    class="dropdown-toggle"
                    type="button"
                    data-bs-toggle="dropdown"
                    aria-expanded="false"
                  >
                    <img src="<?php echo get_template_directory_uri();?>/assets/images/tab_down_arrow.png" alt="" />
                  </button>

                  <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item" href="">Cup</a></li>
                    <li><a class="dropdown-item" href="">Cosmetic</a></li>
                    <li><a class="dropdown-item" href="">Flyers</a></li>
                    <li><a class="dropdown-item" href="">Frame</a></li>
                    <li><a class="dropdown-item" href="">Packaging</a></li>
                    <li><a class="dropdown-item" href="">Poster</a></li>
                    <li><a class="dropdown-item" href="">Shopping Bag</a></li>
                    <li><a class="dropdown-item" href="">Stationery</a></li>
                  </ul>
                </div>
              </li>
            </ul>
            <div class="tab-content">
              <div
                class="tab-pane fade show active"
                id="business_cards_free"
                role="tabpanel"
                aria-labelledby="business_cards_tab_free"
              >
                <div class="tab_inner_content">
                  <div class="card_container row_d justify-content-center">
                    <div class="card_item">
                      <a href="free-mockup-product-page.php">
                        <div class="inner_col">
                          <div class="img_col pixpine_card_border">
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                          </div>
                          <div class="text_col">
                            <h4 class="default_color">Business Card Mockup</h4>
                            <p class="primary_color">Free</p>
                          </div>
                        </div>
                      </a>
                    </div>
                    <div class="card_item">
                      <a href="free-mockup-product-page.php">
                        <div class="inner_col">
                          <div class="img_col pixpine_card_border">
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                          </div>
                          <div class="text_col">
                            <h4 class="default_color">Business Card Mockup</h4>
                            <p class="primary_color">Free</p>
                          </div>
                        </div>
                      </a>
                    </div>
                    <div class="card_item">
                      <a href="free-mockup-product-page.php">
                        <div class="inner_col">
                          <div class="img_col pixpine_card_border">
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                          </div>
                          <div class="text_col">
                            <h4 class="default_color">Business Card Mockup</h4>
                            <p class="primary_color">Free</p>
                          </div>
                        </div>
                      </a>
                    </div>
                    <div class="card_item">
                      <a href="free-mockup-product-page.php">
                        <div class="inner_col">
                          <div class="img_col pixpine_card_border">
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                          </div>
                          <div class="text_col">
                            <h4 class="default_color">Business Card Mockup</h4>
                            <p class="primary_color">Free</p>
                          </div>
                        </div>
                      </a>
                    </div>
                    <div class="card_item">
                      <a href="free-mockup-product-page.php">
                        <div class="inner_col">
                          <div class="img_col pixpine_card_border">
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                          </div>
                          <div class="text_col">
                            <h4 class="default_color">Business Card Mockup</h4>
                            <p class="primary_color">Free</p>
                          </div>
                        </div>
                      </a>
                    </div>
                    <div class="card_item">
                      <a href="free-mockup-product-page.php">
                        <div class="inner_col">
                          <div class="img_col pixpine_card_border">
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                          </div>
                          <div class="text_col">
                            <h4 class="default_color">Business Card Mockup</h4>
                            <p class="primary_color">Free</p>
                          </div>
                        </div>
                      </a>
                    </div>
                    <div class="card_item">
                      <a href="free-mockup-product-page.php">
                        <div class="inner_col">
                          <div class="img_col pixpine_card_border">
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                          </div>
                          <div class="text_col">
                            <h4 class="default_color">Business Card Mockup</h4>
                            <p class="primary_color">Free</p>
                          </div>
                        </div>
                      </a>
                    </div>
                    <div class="card_item">
                      <a href="free-mockup-product-page.php">
                        <div class="inner_col">
                          <div class="img_col pixpine_card_border">
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                          </div>
                          <div class="text_col">
                            <h4 class="default_color">Business Card Mockup</h4>
                            <p class="primary_color">Free</p>
                          </div>
                        </div>
                      </a>
                    </div>
                  </div>
                  <div class="text-end">
                    <a class="btn_primary _btn" href="#">View All</a>
                  </div>
                </div>
              </div>
              <div
                class="tab-pane fade"
                id="brochure_free"
                role="tabpanel"
                aria-labelledby="brochure_tab_free"
              >
                <div class="tab_inner_content">
                  <div class="card_container row_d justify-content-center">
                    <div class="card_item">
                      <a href="free-mockup-product-page.php">
                        <div class="inner_col">
                          <div class="img_col pixpine_card_border">
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                          </div>
                          <div class="text_col">
                            <h4 class="default_color">Business Card Mockup</h4>
                            <p class="primary_color">Free</p>
                          </div>
                        </div>
                      </a>
                    </div>
                    <div class="card_item">
                      <a href="free-mockup-product-page.php">
                        <div class="inner_col">
                          <div class="img_col pixpine_card_border">
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                          </div>
                          <div class="text_col">
                            <h4 class="default_color">Business Card Mockup</h4>
                            <p class="primary_color">Free</p>
                          </div>
                        </div>
                      </a>
                    </div>
                    <div class="card_item">
                      <a href="free-mockup-product-page.php">
                        <div class="inner_col">
                          <div class="img_col pixpine_card_border">
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                          </div>
                          <div class="text_col">
                            <h4 class="default_color">Business Card Mockup</h4>
                            <p class="primary_color">Free</p>
                          </div>
                        </div>
                      </a>
                    </div>
                    <div class="card_item">
                      <a href="free-mockup-product-page.php">
                        <div class="inner_col">
                          <div class="img_col pixpine_card_border">
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                          </div>
                          <div class="text_col">
                            <h4 class="default_color">Business Card Mockup</h4>
                            <p class="primary_color">Free</p>
                          </div>
                        </div>
                      </a>
                    </div>
                    <div class="card_item">
                      <a href="free-mockup-product-page.php">
                        <div class="inner_col">
                          <div class="img_col pixpine_card_border">
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                          </div>
                          <div class="text_col">
                            <h4 class="default_color">Business Card Mockup</h4>
                            <p class="primary_color">Free</p>
                          </div>
                        </div>
                      </a>
                    </div>
                    <div class="card_item">
                      <a href="free-mockup-product-page.php">
                        <div class="inner_col">
                          <div class="img_col pixpine_card_border">
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                          </div>
                          <div class="text_col">
                            <h4 class="default_color">Business Card Mockup</h4>
                            <p class="primary_color">Free</p>
                          </div>
                        </div>
                      </a>
                    </div>
                    <div class="card_item">
                      <a href="free-mockup-product-page.php">
                        <div class="inner_col">
                          <div class="img_col pixpine_card_border">
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                          </div>
                          <div class="text_col">
                            <h4 class="default_color">Business Card Mockup</h4>
                            <p class="primary_color">Free</p>
                          </div>
                        </div>
                      </a>
                    </div>
                  </div>
                  <div class="text-end">
                    <a class="btn_primary _btn" href="#">View All</a>
                  </div>
                </div>
              </div>
              <div
                class="tab-pane fade"
                id="flyers_free"
                role="tabpanel"
                aria-labelledby="flyers_tab_free"
              >
                <div class="tab_inner_content">
                  <div class="card_container row_d justify-content-center">
                    <div class="card_item">
                      <a href="free-mockup-product-page.php">
                        <div class="inner_col">
                          <div class="img_col pixpine_card_border">
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                          </div>
                          <div class="text_col">
                            <h4 class="default_color">Business Card Mockup</h4>
                            <p class="primary_color">Free</p>
                          </div>
                        </div>
                      </a>
                    </div>
                    <div class="card_item">
                      <a href="free-mockup-product-page.php">
                        <div class="inner_col">
                          <div class="img_col pixpine_card_border">
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                          </div>
                          <div class="text_col">
                            <h4 class="default_color">Business Card Mockup</h4>
                            <p class="primary_color">Free</p>
                          </div>
                        </div>
                      </a>
                    </div>
                    <div class="card_item">
                      <a href="free-mockup-product-page.php">
                        <div class="inner_col">
                          <div class="img_col pixpine_card_border">
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                          </div>
                          <div class="text_col">
                            <h4 class="default_color">Business Card Mockup</h4>
                            <p class="primary_color">Free</p>
                          </div>
                        </div>
                      </a>
                    </div>
                    <div class="card_item">
                      <a href="free-mockup-product-page.php">
                        <div class="inner_col">
                          <div class="img_col pixpine_card_border">
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                          </div>
                          <div class="text_col">
                            <h4 class="default_color">Business Card Mockup</h4>
                            <p class="primary_color">Free</p>
                          </div>
                        </div>
                      </a>
                    </div>
                    <div class="card_item">
                      <a href="free-mockup-product-page.php">
                        <div class="inner_col">
                          <div class="img_col pixpine_card_border">
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                          </div>
                          <div class="text_col">
                            <h4 class="default_color">Business Card Mockup</h4>
                            <p class="primary_color">Free</p>
                          </div>
                        </div>
                      </a>
                    </div>
                    <div class="card_item">
                      <a href="free-mockup-product-page.php">
                        <div class="inner_col">
                          <div class="img_col pixpine_card_border">
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                          </div>
                          <div class="text_col">
                            <h4 class="default_color">Business Card Mockup</h4>
                            <p class="primary_color">Free</p>
                          </div>
                        </div>
                      </a>
                    </div>
                    <div class="card_item">
                      <a href="free-mockup-product-page.php">
                        <div class="inner_col">
                          <div class="img_col pixpine_card_border">
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                          </div>
                          <div class="text_col">
                            <h4 class="default_color">Business Card Mockup</h4>
                            <p class="primary_color">Free</p>
                          </div>
                        </div>
                      </a>
                    </div>
                    <div class="card_item">
                      <a href="free-mockup-product-page.php">
                        <div class="inner_col">
                          <div class="img_col pixpine_card_border">
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                          </div>
                          <div class="text_col">
                            <h4 class="default_color">Business Card Mockup</h4>
                            <p class="primary_color">Free</p>
                          </div>
                        </div>
                      </a>
                    </div>
                  </div>
                  <div class="text-end">
                    <a class="btn_primary _btn" href="#">View All</a>
                  </div>
                </div>
              </div>
              <div
                class="tab-pane fade"
                id="stationery_free"
                role="tabpanel"
                aria-labelledby="stationery_tab_free"
              >
                <div class="tab_inner_content">
                  <div class="card_container row_d justify-content-center">
                    <div class="card_item">
                      <a href="free-mockup-product-page.php">
                        <div class="inner_col">
                          <div class="img_col pixpine_card_border">
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                          </div>
                          <div class="text_col">
                            <h4 class="default_color">Business Card Mockup</h4>
                            <p class="primary_color">Free</p>
                          </div>
                        </div>
                      </a>
                    </div>
                    <div class="card_item">
                      <a href="free-mockup-product-page.php">
                        <div class="inner_col">
                          <div class="img_col pixpine_card_border">
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                          </div>
                          <div class="text_col">
                            <h4 class="default_color">Business Card Mockup</h4>
                            <p class="primary_color">Free</p>
                          </div>
                        </div>
                      </a>
                    </div>
                    <div class="card_item">
                      <a href="free-mockup-product-page.php">
                        <div class="inner_col">
                          <div class="img_col pixpine_card_border">
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                          </div>
                          <div class="text_col">
                            <h4 class="default_color">Business Card Mockup</h4>
                            <p class="primary_color">Free</p>
                          </div>
                        </div>
                      </a>
                    </div>
                    <div class="card_item">
                      <a href="free-mockup-product-page.php">
                        <div class="inner_col">
                          <div class="img_col pixpine_card_border">
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                          </div>
                          <div class="text_col">
                            <h4 class="default_color">Business Card Mockup</h4>
                            <p class="primary_color">Free</p>
                          </div>
                        </div>
                      </a>
                    </div>
                    <div class="card_item">
                      <a href="free-mockup-product-page.php">
                        <div class="inner_col">
                          <div class="img_col pixpine_card_border">
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                          </div>
                          <div class="text_col">
                            <h4 class="default_color">Business Card Mockup</h4>
                            <p class="primary_color">Free</p>
                          </div>
                        </div>
                      </a>
                    </div>
                    <div class="card_item">
                      <a href="free-mockup-product-page.php">
                        <div class="inner_col">
                          <div class="img_col pixpine_card_border">
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                          </div>
                          <div class="text_col">
                            <h4 class="default_color">Business Card Mockup</h4>
                            <p class="primary_color">Free</p>
                          </div>
                        </div>
                      </a>
                    </div>
                    <div class="card_item">
                      <a href="free-mockup-product-page.php">
                        <div class="inner_col">
                          <div class="img_col pixpine_card_border">
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                          </div>
                          <div class="text_col">
                            <h4 class="default_color">Business Card Mockup</h4>
                            <p class="primary_color">Free</p>
                          </div>
                        </div>
                      </a>
                    </div>
                    <div class="card_item">
                      <a href="free-mockup-product-page.php">
                        <div class="inner_col">
                          <div class="img_col pixpine_card_border">
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                          </div>
                          <div class="text_col">
                            <h4 class="default_color">Business Card Mockup</h4>
                            <p class="primary_color">Free</p>
                          </div>
                        </div>
                      </a>
                    </div>
                  </div>
                  <div class="text-end">
                    <a class="btn_primary _btn" href="#">View All</a>
                  </div>
                </div>
              </div>
              <div
                class="tab-pane fade"
                id="boxes_free"
                role="tabpanel"
                aria-labelledby="boxes_tab_free"
              >
                <div class="tab_inner_content">
                  <div class="card_container row_d justify-content-center">
                    <div class="card_item">
                      <a href="free-mockup-product-page.php">
                        <div class="inner_col">
                          <div class="img_col pixpine_card_border">
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                          </div>
                          <div class="text_col">
                            <h4 class="default_color">Business Card Mockup</h4>
                            <p class="primary_color">Free</p>
                          </div>
                        </div>
                      </a>
                    </div>
                    <div class="card_item">
                      <a href="free-mockup-product-page.php">
                        <div class="inner_col">
                          <div class="img_col pixpine_card_border">
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                          </div>
                          <div class="text_col">
                            <h4 class="default_color">Business Card Mockup</h4>
                            <p class="primary_color">Free</p>
                          </div>
                        </div>
                      </a>
                    </div>
                    <div class="card_item">
                      <a href="free-mockup-product-page.php">
                        <div class="inner_col">
                          <div class="img_col pixpine_card_border">
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                          </div>
                          <div class="text_col">
                            <h4 class="default_color">Business Card Mockup</h4>
                            <p class="primary_color">Free</p>
                          </div>
                        </div>
                      </a>
                    </div>
                    <div class="card_item">
                      <a href="free-mockup-product-page.php">
                        <div class="inner_col">
                          <div class="img_col pixpine_card_border">
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                          </div>
                          <div class="text_col">
                            <h4 class="default_color">Business Card Mockup</h4>
                            <p class="primary_color">Free</p>
                          </div>
                        </div>
                      </a>
                    </div>
                    <div class="card_item">
                      <a href="free-mockup-product-page.php">
                        <div class="inner_col">
                          <div class="img_col pixpine_card_border">
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                          </div>
                          <div class="text_col">
                            <h4 class="default_color">Business Card Mockup</h4>
                            <p class="primary_color">Free</p>
                          </div>
                        </div>
                      </a>
                    </div>
                    <div class="card_item">
                      <a href="free-mockup-product-page.php">
                        <div class="inner_col">
                          <div class="img_col pixpine_card_border">
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                          </div>
                          <div class="text_col">
                            <h4 class="default_color">Business Card Mockup</h4>
                            <p class="primary_color">Free</p>
                          </div>
                        </div>
                      </a>
                    </div>
                    <div class="card_item">
                      <a href="free-mockup-product-page.php">
                        <div class="inner_col">
                          <div class="img_col pixpine_card_border">
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                          </div>
                          <div class="text_col">
                            <h4 class="default_color">Business Card Mockup</h4>
                            <p class="primary_color">Free</p>
                          </div>
                        </div>
                      </a>
                    </div>
                    <div class="card_item">
                      <a href="free-mockup-product-page.php">
                        <div class="inner_col">
                          <div class="img_col pixpine_card_border">
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                          </div>
                          <div class="text_col">
                            <h4 class="default_color">Business Card Mockup</h4>
                            <p class="primary_color">Free</p>
                          </div>
                        </div>
                      </a>
                    </div>
                    <div class="card_item">
                      <a href="free-mockup-product-page.php">
                        <div class="inner_col">
                          <div class="img_col pixpine_card_border">
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                          </div>
                          <div class="text_col">
                            <h4 class="default_color">Business Card Mockup</h4>
                            <p class="primary_color">Free</p>
                          </div>
                        </div>
                      </a>
                    </div>
                    <div class="card_item">
                      <a href="free-mockup-product-page.php">
                        <div class="inner_col">
                          <div class="img_col pixpine_card_border">
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                          </div>
                          <div class="text_col">
                            <h4 class="default_color">Business Card Mockup</h4>
                            <p class="primary_color">Free</p>
                          </div>
                        </div>
                      </a>
                    </div>
                  </div>
                  <div class="text-end">
                    <a class="btn_primary _btn" href="#">View All</a>
                  </div>
                </div>
              </div>
              <div
                class="tab-pane fade"
                id="packaging_free"
                role="tabpanel"
                aria-labelledby="packaging_tab_free"
              >
                <div class="tab_inner_content">
                  <div class="card_container row_d justify-content-center">
                    <div class="card_item">
                      <a href="free-mockup-product-page.php">
                        <div class="inner_col">
                          <div class="img_col pixpine_card_border">
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                          </div>
                          <div class="text_col">
                            <h4 class="default_color">Business Card Mockup</h4>
                            <p class="primary_color">Free</p>
                          </div>
                        </div>
                      </a>
                    </div>
                    <div class="card_item">
                      <a href="free-mockup-product-page.php">
                        <div class="inner_col">
                          <div class="img_col pixpine_card_border">
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                          </div>
                          <div class="text_col">
                            <h4 class="default_color">Business Card Mockup</h4>
                            <p class="primary_color">Free</p>
                          </div>
                        </div>
                      </a>
                    </div>
                    <div class="card_item">
                      <a href="free-mockup-product-page.php">
                        <div class="inner_col">
                          <div class="img_col pixpine_card_border">
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                          </div>
                          <div class="text_col">
                            <h4 class="default_color">Business Card Mockup</h4>
                            <p class="primary_color">Free</p>
                          </div>
                        </div>
                      </a>
                    </div>
                    <div class="card_item">
                      <a href="free-mockup-product-page.php">
                        <div class="inner_col">
                          <div class="img_col pixpine_card_border">
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                          </div>
                          <div class="text_col">
                            <h4 class="default_color">Business Card Mockup</h4>
                            <p class="primary_color">Free</p>
                          </div>
                        </div>
                      </a>
                    </div>
                    <div class="card_item">
                      <a href="free-mockup-product-page.php">
                        <div class="inner_col">
                          <div class="img_col pixpine_card_border">
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                          </div>
                          <div class="text_col">
                            <h4 class="default_color">Business Card Mockup</h4>
                            <p class="primary_color">Free</p>
                          </div>
                        </div>
                      </a>
                    </div>
                    <div class="card_item">
                      <a href="free-mockup-product-page.php">
                        <div class="inner_col">
                          <div class="img_col pixpine_card_border">
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                          </div>
                          <div class="text_col">
                            <h4 class="default_color">Business Card Mockup</h4>
                            <p class="primary_color">Free</p>
                          </div>
                        </div>
                      </a>
                    </div>
                  </div>
                  <div class="text-end">
                    <a class="btn_primary _btn" href="#">View All</a>
                  </div>
                </div>
              </div>
              <div
                class="tab-pane fade"
                id="books_free"
                role="tabpanel"
                aria-labelledby="books_tab_free"
              >
                <div class="tab_inner_content">
                  <div class="card_container row_d justify-content-center">
                    <div class="card_item">
                      <a href="free-mockup-product-page.php">
                        <div class="inner_col">
                          <div class="img_col pixpine_card_border">
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                          </div>
                          <div class="text_col">
                            <h4 class="default_color">Business Card Mockup</h4>
                            <p class="primary_color">Free</p>
                          </div>
                        </div>
                      </a>
                    </div>
                    <div class="card_item">
                      <a href="free-mockup-product-page.php">
                        <div class="inner_col">
                          <div class="img_col pixpine_card_border">
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                          </div>
                          <div class="text_col">
                            <h4 class="default_color">Business Card Mockup</h4>
                            <p class="primary_color">Free</p>
                          </div>
                        </div>
                      </a>
                    </div>
                    <div class="card_item">
                      <a href="free-mockup-product-page.php">
                        <div class="inner_col">
                          <div class="img_col pixpine_card_border">
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                          </div>
                          <div class="text_col">
                            <h4 class="default_color">Business Card Mockup</h4>
                            <p class="primary_color">Free</p>
                          </div>
                        </div>
                      </a>
                    </div>
                    <div class="card_item">
                      <a href="free-mockup-product-page.php">
                        <div class="inner_col">
                          <div class="img_col pixpine_card_border">
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                          </div>
                          <div class="text_col">
                            <h4 class="default_color">Business Card Mockup</h4>
                            <p class="primary_color">Free</p>
                          </div>
                        </div>
                      </a>
                    </div>
                    <div class="card_item">
                      <a href="free-mockup-product-page.php">
                        <div class="inner_col">
                          <div class="img_col pixpine_card_border">
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                          </div>
                          <div class="text_col">
                            <h4 class="default_color">Business Card Mockup</h4>
                            <p class="primary_color">Free</p>
                          </div>
                        </div>
                      </a>
                    </div>
                    <div class="card_item">
                      <a href="free-mockup-product-page.php">
                        <div class="inner_col">
                          <div class="img_col pixpine_card_border">
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                          </div>
                          <div class="text_col">
                            <h4 class="default_color">Business Card Mockup</h4>
                            <p class="primary_color">Free</p>
                          </div>
                        </div>
                      </a>
                    </div>
                    <div class="card_item">
                      <a href="free-mockup-product-page.php">
                        <div class="inner_col">
                          <div class="img_col pixpine_card_border">
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                          </div>
                          <div class="text_col">
                            <h4 class="default_color">Business Card Mockup</h4>
                            <p class="primary_color">Free</p>
                          </div>
                        </div>
                      </a>
                    </div>
                    <div class="card_item">
                      <a href="free-mockup-product-page.php">
                        <div class="inner_col">
                          <div class="img_col pixpine_card_border">
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                          </div>
                          <div class="text_col">
                            <h4 class="default_color">Business Card Mockup</h4>
                            <p class="primary_color">Free</p>
                          </div>
                        </div>
                      </a>
                    </div>
                  </div>
                  <div class="text-end">
                    <a class="btn_primary _btn" href="#">View All</a>
                  </div>
                </div>
              </div>
              <div
                class="tab-pane fade"
                id="apparel_free"
                role="tabpanel"
                aria-labelledby="apparel_tab_free"
              >
                <div class="tab_inner_content">
                  <div class="card_container row_d justify-content-center">
                    <div class="card_item">
                      <a href="free-mockup-product-page.php">
                        <div class="inner_col">
                          <div class="img_col pixpine_card_border">
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                          </div>
                          <div class="text_col">
                            <h4 class="default_color">Business Card Mockup</h4>
                            <p class="primary_color">Free</p>
                          </div>
                        </div>
                      </a>
                    </div>
                    <div class="card_item">
                      <a href="free-mockup-product-page.php">
                        <div class="inner_col">
                          <div class="img_col pixpine_card_border">
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                          </div>
                          <div class="text_col">
                            <h4 class="default_color">Business Card Mockup</h4>
                            <p class="primary_color">Free</p>
                          </div>
                        </div>
                      </a>
                    </div>
                    <div class="card_item">
                      <a href="free-mockup-product-page.php">
                        <div class="inner_col">
                          <div class="img_col pixpine_card_border">
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                          </div>
                          <div class="text_col">
                            <h4 class="default_color">Business Card Mockup</h4>
                            <p class="primary_color">Free</p>
                          </div>
                        </div>
                      </a>
                    </div>
                    <div class="card_item">
                      <a href="free-mockup-product-page.php">
                        <div class="inner_col">
                          <div class="img_col pixpine_card_border">
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                          </div>
                          <div class="text_col">
                            <h4 class="default_color">Business Card Mockup</h4>
                            <p class="primary_color">Free</p>
                          </div>
                        </div>
                      </a>
                    </div>
                    <div class="card_item">
                      <a href="free-mockup-product-page.php">
                        <div class="inner_col">
                          <div class="img_col pixpine_card_border">
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                          </div>
                          <div class="text_col">
                            <h4 class="default_color">Business Card Mockup</h4>
                            <p class="primary_color">Free</p>
                          </div>
                        </div>
                      </a>
                    </div>
                    <div class="card_item">
                      <a href="free-mockup-product-page.php">
                        <div class="inner_col">
                          <div class="img_col pixpine_card_border">
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                          </div>
                          <div class="text_col">
                            <h4 class="default_color">Business Card Mockup</h4>
                            <p class="primary_color">Free</p>
                          </div>
                        </div>
                      </a>
                    </div>
                    <div class="card_item">
                      <a href="free-mockup-product-page.php">
                        <div class="inner_col">
                          <div class="img_col pixpine_card_border">
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                          </div>
                          <div class="text_col">
                            <h4 class="default_color">Business Card Mockup</h4>
                            <p class="primary_color">Free</p>
                          </div>
                        </div>
                      </a>
                    </div>
                  </div>
                  <div class="text-end">
                    <a class="btn_primary _btn" href="#">View All</a>
                  </div>
                </div>
              </div>
              <div
                class="tab-pane fade"
                id="billboard_free"
                role="tabpanel"
                aria-labelledby="billboard_tab_free"
              >
                <div class="tab_inner_content">
                  <div class="card_container row_d justify-content-center">
                    <div class="card_item">
                      <a href="free-mockup-product-page.php">
                        <div class="inner_col">
                          <div class="img_col pixpine_card_border">
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                          </div>
                          <div class="text_col">
                            <h4 class="default_color">Business Card Mockup</h4>
                            <p class="primary_color">Free</p>
                          </div>
                        </div>
                      </a>
                    </div>
                    <div class="card_item">
                      <a href="free-mockup-product-page.php">
                        <div class="inner_col">
                          <div class="img_col pixpine_card_border">
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                          </div>
                          <div class="text_col">
                            <h4 class="default_color">Business Card Mockup</h4>
                            <p class="primary_color">Free</p>
                          </div>
                        </div>
                      </a>
                    </div>
                    <div class="card_item">
                      <a href="free-mockup-product-page.php">
                        <div class="inner_col">
                          <div class="img_col pixpine_card_border">
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                          </div>
                          <div class="text_col">
                            <h4 class="default_color">Business Card Mockup</h4>
                            <p class="primary_color">Free</p>
                          </div>
                        </div>
                      </a>
                    </div>
                    <div class="card_item">
                      <a href="free-mockup-product-page.php">
                        <div class="inner_col">
                          <div class="img_col pixpine_card_border">
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                          </div>
                          <div class="text_col">
                            <h4 class="default_color">Business Card Mockup</h4>
                            <p class="primary_color">Free</p>
                          </div>
                        </div>
                      </a>
                    </div>
                    <div class="card_item">
                      <a href="free-mockup-product-page.php">
                        <div class="inner_col">
                          <div class="img_col pixpine_card_border">
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                          </div>
                          <div class="text_col">
                            <h4 class="default_color">Business Card Mockup</h4>
                            <p class="primary_color">Free</p>
                          </div>
                        </div>
                      </a>
                    </div>
                    <div class="card_item">
                      <a href="free-mockup-product-page.php">
                        <div class="inner_col">
                          <div class="img_col pixpine_card_border">
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                          </div>
                          <div class="text_col">
                            <h4 class="default_color">Business Card Mockup</h4>
                            <p class="primary_color">Free</p>
                          </div>
                        </div>
                      </a>
                    </div>
                  </div>
                  <div class="text-end">
                    <a class="btn_primary _btn" href="#">View All</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section id="bundle_mockups" class="bundle_mockups_yearly_subscription">
        <div class="container">
          <div class="top__heading__col">
            <div class="get_premium_mockups_section">
              <div
                class="premium_mockups_inner d-flex justify-content-between align-items-center"
              >
                <div class="premium_text">
                  <h2
                    class="section_heading section_heading_primary section_heading_bold"
                  >
                    Get 50% Off
                    <span class="section_heading_medium default_color">
                      on bundle mockups
                    </span>
                  </h2>
                  <p class="sub_heading">
                    <span class="primary_color">
                      Save big with our yearly subscription
                    </span>
                  </p>
                  <a href="subscription.php" class="btn_primary _btn"
                    >Get premium</a
                  >
                </div>
                <div class="premium_img">
                  <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                </div>
              </div>
            </div>
          </div>
          <div class="inner_content">
            <div
              class="card_container row_d justify-content-center align-items-stretch"
            >
              <div class="card_item">
                <div
                  type="button"
                  data-bs-toggle="modal"
                  data-bs-target="#bundleModal"
                >
                  <div class="inner_col pixpine_card_border">
                    <img src="<?php echo get_template_directory_uri();?>/assets/images/trending_img.png" alt="" />
                  </div>
                </div>
              </div>
              <div class="card_item">
                <div
                  type="button"
                  data-bs-toggle="modal"
                  data-bs-target="#bundleModal"
                >
                  <div class="inner_col pixpine_card_border">
                    <img src="<?php echo get_template_directory_uri();?>/assets/images/trending_img.png" alt="" />
                  </div>
                </div>
              </div>
              <div class="card_item">
                <div
                  type="button"
                  data-bs-toggle="modal"
                  data-bs-target="#bundleModal"
                >
                  <div class="inner_col pixpine_card_border">
                    <img src="<?php echo get_template_directory_uri();?>/assets/images/trending_img.png" alt="" />
                  </div>
                </div>
              </div>
              <div class="card_item">
                <div
                  type="button"
                  data-bs-toggle="modal"
                  data-bs-target="#bundleModal"
                >
                  <div class="inner_col pixpine_card_border">
                    <img src="<?php echo get_template_directory_uri();?>/assets/images/trending_img.png" alt="" />
                  </div>
                </div>
              </div>
              <div class="card_item">
                <div
                  type="button"
                  data-bs-toggle="modal"
                  data-bs-target="#bundleModal"
                >
                  <div class="inner_col pixpine_card_border">
                    <img src="<?php echo get_template_directory_uri();?>/assets/images/trending_img.png" alt="" />
                  </div>
                </div>
              </div>
              <div class="card_item">
                <div
                  type="button"
                  data-bs-toggle="modal"
                  data-bs-target="#bundleModal"
                >
                  <div class="inner_col pixpine_card_border">
                    <img src="<?php echo get_template_directory_uri();?>/assets/images/trending_img.png" alt="" />
                  </div>
                </div>
              </div>
              <div class="card_item">
                <div
                  type="button"
                  data-bs-toggle="modal"
                  data-bs-target="#bundleModal"
                >
                  <div class="inner_col pixpine_card_border">
                    <img src="<?php echo get_template_directory_uri();?>/assets/images/trending_img.png" alt="" />
                  </div>
                </div>
              </div>
              <div class="card_item">
                <div
                  type="button"
                  data-bs-toggle="modal"
                  data-bs-target="#bundleModal"
                >
                  <div class="inner_col pixpine_card_border">
                    <img src="<?php echo get_template_directory_uri();?>/assets/images/trending_img.png" alt="" />
                  </div>
                </div>
              </div>
              <div class="card_item">
                <div
                  type="button"
                  data-bs-toggle="modal"
                  data-bs-target="#bundleModal"
                >
                  <div class="inner_col pixpine_card_border">
                    <img src="<?php echo get_template_directory_uri();?>/assets/images/trending_img.png" alt="" />
                  </div>
                </div>
              </div>
              <div class="card_item">
                <div
                  type="button"
                  data-bs-toggle="modal"
                  data-bs-target="#bundleModal"
                >
                  <div class="inner_col pixpine_card_border">
                    <img src="<?php echo get_template_directory_uri();?>/assets/images/trending_img.png" alt="" />
                  </div>
                </div>
              </div>
              <div class="card_item">
                <div
                  type="button"
                  data-bs-toggle="modal"
                  data-bs-target="#bundleModal"
                >
                  <div class="inner_col pixpine_card_border">
                    <img src="<?php echo get_template_directory_uri();?>/assets/images/trending_img.png" alt="" />
                  </div>
                </div>
              </div>
              <div class="card_item">
                <div
                  type="button"
                  data-bs-toggle="modal"
                  data-bs-target="#bundleModal"
                >
                  <div class="inner_col pixpine_card_border">
                    <img src="<?php echo get_template_directory_uri();?>/assets/images/trending_img.png" alt="" />
                  </div>
                </div>
              </div>
            </div>
            <div class="text-end">
              <a class="btn_primary _btn" href="#">View All</a>
            </div>
          </div>
        </div>
      </section>

      <!-- Never miss out form section -->
      <?php include 'includes/never-miss-out-form.php';?>
    </main>

    <!-- Premium Modal -->
    <?php include 'includes/premium-modal.php';?>

    <!-- Bundle Modal -->
    <?php include 'includes/bundle-modal.php';?>

    <!-- Footer -->
    <?php include 'includes/footer.php';?>
