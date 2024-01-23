<?php
/**
 * PixPine functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package PixPine
 */

if (!defined('_S_VERSION')) {
    // Replace the version number of the theme on each release.
    define('_S_VERSION', '1.0.0');
}
define('fb_app_id', '663261215969776');
define('fb_app_sec', 'a59ad75665adffe842c10eee33460ef0');
define('fb_app_redirect', site_url() . '/?fblogin=true');
define('GOOGLE_REDIRECT_URL', site_url() . '/?glogin=true');
define('GOOGLE_CLIENT_ID', '517874441882-rmu95ov5eh75st0gisfa9aeb0lb7gdqe.apps.googleusercontent.com');
define('GOOGLE_CLIENT_SECRET', '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');
define('DISABLE_WP_CRON', false);
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function pixpine_setup()
{
    /*
     * Make theme available for translation.
     * Translations can be filed in the /languages/ directory.
     * If you're building a theme based on PixPine, use a find and replace
     * to change 'pixpine' to the name of your theme in all the template files.
     */
    load_theme_textdomain('pixpine', get_template_directory() . '/languages');

    // Add default posts and comments RSS feed links to head.
    add_theme_support('automatic-feed-links');

    /*
     * Let WordPress manage the document title.
     * By adding theme support, we declare that this theme does not use a
     * hard-coded <title> tag in the document head, and expect WordPress to
     * provide it for us.
     */
    add_theme_support('title-tag');

    /*
     * Enable support for Post Thumbnails on posts and pages.
     *
     * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
     */
    add_theme_support('post-thumbnails');

    // This theme uses wp_nav_menu() in one location.
    register_nav_menus(
        array(
            'menu-1' => esc_html__('Primary', 'pixpine'),
        )
    );

    /*
     * Switch default core markup for search form, comment form, and comments
     * to output valid HTML5.
     */
    add_theme_support(
        'html5',
        array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'style',
            'script',
        )
    );

    // Set up the WordPress core custom background feature.
    add_theme_support(
        'custom-background',
        apply_filters(
            'pixpine_custom_background_args',
            array(
                'default-color' => 'ffffff',
                'default-image' => '',
            )
        )
    );

    // Add theme support for selective refresh for widgets.
    add_theme_support('customize-selective-refresh-widgets');

    /**
     * Add support for core custom logo.
     *
     * @link https://codex.wordpress.org/Theme_Logo
     */
    add_theme_support(
        'custom-logo',
        array(
            'height' => 250,
            'width' => 250,
            'flex-width' => true,
            'flex-height' => true,
        )
    );
}
add_action('after_setup_theme', 'pixpine_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
// function pixpine_content_width() {
// 	$GLOBALS['content_width'] = apply_filters( 'pixpine_content_width', 640 );
// }
// add_action( 'after_setup_theme', 'pixpine_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */


/**
 * Enqueue scripts and styles.
 */
function pixpine_scripts()
{
    wp_enqueue_style('pixpine-bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css', array(), '1.0', 'all');
    wp_enqueue_style('pixpine-font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css', array(), '1.0', 'all');
    wp_enqueue_style('pixpine-slick-theme', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css', array(), '1.0', 'all');
    wp_enqueue_style('pixpine-slick-min', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css', array(), '1.0', 'all');
    wp_enqueue_style('pixpine-main-style', get_template_directory_uri() . '/assets/styles/style.css', array(), _S_VERSION);
    wp_enqueue_style('pixpine-home-style', get_template_directory_uri() . '/assets/styles/home-style.css', array(), _S_VERSION);

    wp_enqueue_script('jquery');
    // wp_enqueue_script( 'pixpine-paypal', 'https://www.paypal.com/sdk/js?client-id=AVT1TGV_xT-FR1XRXZdKgsyoXIhHf_N4-j26F0W6bYXgLcv4r2jJLu7Bsa1aabiU-0pVGrDFUIdOpvrQ&currency=USD&disable-funding=paylater', array(), _S_VERSION, false );
    wp_enqueue_script('pixpine-slick-min', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js', array(), _S_VERSION, true);
    wp_enqueue_script('pixpine-navigation', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js', array(), _S_VERSION, true);
    wp_enqueue_script('pixpine-custom-js', get_template_directory_uri() . '/assets/js/index.js', array(), _S_VERSION, true);

    // custom ajax

    wp_enqueue_script('pixpine-custom-ajax', get_template_directory_uri() . '/assets/js/custom-ajax.js', array('jquery'), '1.0', true);
    // Generate a nonce and pass it to the JavaScript file
    $ajax_nonce = wp_create_nonce('ajax_nonce');
    wp_localize_script('pixpine-custom-ajax', 'ajax_object', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'ajax_nonce' => $ajax_nonce, // Pass the nonce to JavaScript
    ));

}
add_action('wp_enqueue_scripts', 'pixpine_scripts');



// /**
//  * Load Jetpack compatibility file.
//  */
// if ( defined( 'JETPACK__VERSION' ) ) {
// 	require get_template_directory() . '/inc/jetpack.php';
// }



/**
 * Admin functions
 */
require get_template_directory() . '/admin/functions.php';

/**
 * Frontend functions
 */
// require get_template_directory() . '/functions/email-templates.php';
require get_template_directory() . '/functions/show-product-and-cat.php';
require get_template_directory() . '/functions/subcription.php';
require get_template_directory() . '/functions/user.php';

/**
 * Emails
 */
// calling templates 
require get_template_directory() . '/functions/email-templates/welcome.php';
require get_template_directory() . '/functions/email-templates/new_account_password.php';
require get_template_directory() . '/functions/email-templates/subscription_email_template.php';
require get_template_directory() . '/functions/email-templates/order_confirmation_email_template.php';

// send email function
function pixpine_send_html_email($to, $subject, $message) {
    $headers[] = 'Content-Type: text/html; charset=UTF-8';
    $result = wp_mail($to, $subject, $message, $headers);
    // if ($result) {
    //     echo 'HTML email sent successfully!';
    // } else {
    //     echo 'Failed to send HTML email.';
    // }
}


//Nadim Dev working on facebook login
//add_action( 'login_form', 'ayecode_fb_login' );
function eil_code_fb_login()
{

    /**
     * Get the APP ID and APP Secret from the Facebook app you created.
     * Also, provide the authorized redirect URI.
     */
    $app_id = fb_app_id;
    $redirect_uri = fb_app_redirect;
    $app_secret = fb_app_sec;
    $graphAPIVerion = 'v11.0';


    // Prepare the Login Link.
    $params = array(
        'client_id' => $app_id,
        'redirect_uri' => $redirect_uri,
        'response_type' => 'code',
        'scope' => 'email'
    );

    $login_url = 'https://www.facebook.com/dialog/oauth?' . urldecode(http_build_query($params));
    return $login_url;
}

add_action('init', 'eil_code_social_login_func');
function eil_code_social_login_func()
{
    //echo GOOGLE_REDIRECT_URL;exit;
    // If we clicked the facebook login link and successfully logged in 
    // run the below code.
    if (isset($_GET['fblogin']) && $_GET['fblogin']) {
        if (isset($_GET['code']) && $_GET['code']) {

            $app_id = fb_app_id;
            $redirect_uri = fb_app_redirect;
            $app_secret = fb_app_sec;
            $graphAPIVerion = 'v11.0';

            // Prepare the parameters for oauth
            $params = array(
                'client_id' => $app_id,
                'redirect_uri' => $redirect_uri,
                'client_secret' => $app_secret,
                'code' => $_GET['code']
            );

            $tokenresponse = wp_remote_get('https://graph.facebook.com/' . $graphAPIVerion . '/oauth/access_token?' . http_build_query($params));

            // Check that we get a reply from the Facebook API, if not abort.
            if (!is_array($tokenresponse) && is_wp_error($tokenresponse)) {
                return;
            }

            $token = json_decode(wp_remote_retrieve_body($tokenresponse));

            // Successfully authenticate using oauth means, move to next step.
            if ($token->access_token) {

                // Prepare to get the fields from Facebook profile.
                // @link https://developers.facebook.com/docs/graph-api/reference/user/#fields
                $params = array(
                    'access_token' => $token->access_token,
                    'fields' => 'name,email,first_name,last_name,locale'
                );
                $useresponse = wp_remote_get('https://graph.facebook.com/' . $graphAPIVerion . '/me' . '?' . urldecode(http_build_query($params)));

                //Store the needed fields in an array.
                $facebook_details = (array) json_decode(wp_remote_retrieve_body($useresponse));

                // Check whether the email is already registered or not.
                // If it does not exists, create a new user and redirect the newly created user to the home page.
                // If it exits, redirect the existing user to the home page by setting the authentication.
                if (!email_exists($facebook_details['email'])) {
                    $user_data = array(
                        'user_login' => $facebook_details['email'],
                        'user_email' => $facebook_details['email'],
                        'user_pass' => wp_generate_password(12, true),
                        'display_name' => $facebook_details['name'],
                        'first_name' => $facebook_details['first_name'],
                        'last_name' => $facebook_details['last_name'],
                        'locale' => $facebook_details['locale'],
                    );
                    $user_id = wp_insert_user($user_data);
                } else {
                    $user = get_user_by('email', $facebook_details['email']);
                    $user_id = $user->ID;
                }
                if ($user_id) {
                    wp_clear_auth_cookie();
                    wp_set_current_user($user_id); // Set the current user detail
                    wp_set_auth_cookie($user_id, true); // Set the authentication cookie.
                    wp_redirect(home_url()); // Redirect to the home page.
                    exit();
                }
            }
        }
    }
    if (isset($_GET['glogin']) && $_GET['glogin']) {
        require_once get_template_directory() . '/google_vendor/autoload.php';
        $client = new Google_Client();
        $client->setClientId(GOOGLE_CLIENT_ID);
        $client->setClientSecret(GOOGLE_CLIENT_SECRET);
        $client->setRedirectUri(GOOGLE_REDIRECT_URL); // Your redirect URI.

        $client->addScope(['email', 'profile']); // You can add other desired scopes.
        $client->authenticate($_GET['code']);
        $access_token = $client->getAccessToken();
        $client->setAccessToken($access_token);

        $Oauth = new Google_Service_Oauth2($client);
        $info = $Oauth->userinfo->get();
        $email = $info->email;
        $name = $info->name;
        // Check if the user with this email already exists.
        $user = get_user_by('email', $email);

        if (!email_exists($email)) {
            $user_id = wp_insert_user(array(
                'user_login' => $email,
                'user_email' => $email,
                'user_pass' => wp_generate_password(12, true),
            ));


        } else {
            $user = get_user_by('email', $email);
            $user_id = $user->ID;

        }
        /* $plus = new Google_Service_Plus($client);
         $me = $plus->people->get('me');
         if( !email_exists( $me->emails[0]->value ) ) {
         // Insert the user into your WordPress database. For example:
         $user_id = wp_insert_user(array(
             'user_login' => $me->displayName,
             'user_email' => $me->emails[0]->value,
             'user_pass' => wp_generate_password(),
         ));
          }
         else{
                 $user = get_user_by( 'email', $me->emails[0]->value );
                 $user_id = $user->ID;
             }*/

        // Log the user in.
        if (!is_wp_error($user_id)) {
            wp_clear_auth_cookie();
            wp_set_current_user($user_id); // Set the current user detail
            wp_set_auth_cookie($user_id, true); // Set the authentication cookie.
            wp_redirect(home_url()); // Redirect to the home page.
            exit();
        } else {
            // Handle the error or redirect to an error page.
        }
    }
}
function google_login_url()
{
    // Replace with the actual path.

    require_once get_template_directory() . '/google_vendor/autoload.php';
    $client = new Google_Client();

    $client->setClientId(GOOGLE_CLIENT_ID);
    $client->setClientSecret(GOOGLE_CLIENT_SECRET);
    $client->setRedirectUri(GOOGLE_REDIRECT_URL); // Your redirect URI.

    $client->addScope('email'); // You can add other desired scopes.


    $authUrl = $client->createAuthUrl();
    return $authUrl;
}
add_action('init', 'eil_payment_func');
function eil_payment_func()
{
    if (isset($_GET['stripesuccess']) && $_GET['stripesuccess']) {
        stripesuccess();
    }
    if (isset($_GET['stripefailed']) && $_GET['stripefailed']) {
        stripefailed();
    }
    if (isset($_GET['sub_stripesuccess']) && $_GET['sub_stripesuccess']) {
        sub_stripesuccess();
    }
    if (isset($_GET['sub_stripefailed']) && $_GET['sub_stripefailed']) {
        sub_stripefailed();
    }
}

function stripePayment($data)
{
    // echo 'yes';exit;
    require_once get_template_directory() . '/stripe/StripeHelper.php';
    $stripeHelper = new StripeHelper();
    $stripe = $stripeHelper->stripeClient;
    $appUrl = site_url();
    /**
     * Create product
     */
    global $current_user;
    get_currentuserinfo();

    $user_id = $current_user->ID;
    $order_id = $data['order_id'];
    $amount = $data['total_price'];
    $email = $data['email'];
    $proid = $data['proid'];
    $product = $stripeHelper->createProducts();
    $productPrice = $amount;
    /**
     * Create price for product
     */
    $price = $stripeHelper->createProductPrice($product, $productPrice, 'usd');
    /**
     * create checkout session and payment link
     */
    global $wpdb;
    $sql = "insert into " . $wpdb->prefix . "pixpine_payment_details (receiver_email,item_number,payment_method,tnx_id,user_id,amount,payment_for,payment_info,payment_status) values('" . $email . "','" . $order_id . "','stripe','0','" . $user_id . "','" . $amount . "','product','N/A','Pending')";
    $wpdb->query($sql);


    $stripeSession = $stripe->checkout->sessions->create(
        array(
            'success_url' => $appUrl . '/?stripesuccess=true&session_id={CHECKOUT_SESSION_ID}&order_id=' . $order_id . '',
            'cancel_url' => $appUrl . '/?stripefailed=true&session_id={CHECKOUT_SESSION_ID}&order_id=' . $order_id . '',
            'payment_method_types' => array('card'),
            'customer_email' => $email,
            'mode' => 'payment',
            'currency' => 'usd',
            'line_items' => array(
                array(
                    'price' => $price->id,

                    'quantity' => 1,
                )
            )
        )
    );

    // price_1O7zCcSCPnS6Hgf9e0CiHplS

    wp_redirect($stripeSession->url);
    exit;


}
//checksubscribe or not
function checksubscribePlan($user_id)
{
    global $wpdb;
    $sitem = $wpdb->get_row("SELECT * FROM " . $wpdb->prefix . "pixpine_subscriptions WHERE user_id='" . $user_id . "' AND status='Active'", ARRAY_A);
    if (!empty($sitem)) {
        return true;
    } else {
        return false;
    }

}
add_action('wp_ajax_pixpine_subscribe', 'pixpine_subscribe');
add_action('wp_ajax_nopriv_pixpine_subscribe', 'pixpine_subscribe');
function pixpine_subscribe()
{
    // echo 'yes';exit;
    $security = $_POST['nonce'];
    if (!wp_verify_nonce($security, 'ajax_nonce')) {
        $data['error'] = 'Hei Dear, What are you looking for?';
        echo json_encode($data);
        exit;
    }
    require_once get_template_directory() . '/stripe/StripeHelper.php';
    $stripeHelper = new StripeHelper();
    $stripe = $stripeHelper->stripeClient;
    $appUrl = site_url();
    global $current_user;
    get_currentuserinfo();
    $email = $current_user->user_email;
    $data = array();
    $user_id = $current_user->ID;
    $order_id = time();
    $planid = $_POST['planid'];
    $checkplan = checksubscribePlan($user_id);
    if (!$user_id) {
        $data['error'] = 'Please login first';
    } else if ($checkplan) {
        $data['error'] = 'Sorry you’re already subscribed.';
    } else {

        $amount = $_POST['amount'];
        $subscripton_plan = $_POST['subscripton_plan'];
        global $wpdb;
        $sql = "insert into " . $wpdb->prefix . "pixpine_payment_details (receiver_email,item_number,payment_method,tnx_id,user_id,amount,payment_for,payment_info,payment_status) values('$email','" . $order_id . "','stripe','0','" . $user_id . "','" . $amount . "','subscription','N/A','Pending')";
        $wpdb->query($sql);
        $pd_lastid = $wpdb->insert_id;
        $sql = "insert into " . $wpdb->prefix . "pixpine_subscriptions (user_id,subscripton_plan,plan_id,item_number) values('$user_id','" . $subscripton_plan . "','" . $planid . "','" . $order_id . "')";
        $wpdb->query($sql);
        $s_lastid = $wpdb->insert_id;
        $sql = "insert into " . $wpdb->prefix . "pixpine_subscription_payment (subscription_id,payment_detail_id	) values('$s_lastid','" . $pd_lastid . "')";
        $wpdb->query($sql);

        $stripeSession = $stripe->checkout->sessions->create(
            array(
                'success_url' => $appUrl . '/?sub_stripesuccess=true&session_id={CHECKOUT_SESSION_ID}&order_id=' . $order_id . '',
                'cancel_url' => $appUrl . '/?sub_stripefailed=true&session_id={CHECKOUT_SESSION_ID}&order_id=' . $order_id . '',
                'payment_method_types' => array('card'),
                'customer_email' => $email,

                'payment_method_types' => ['card'],
                'subscription_data' => [
                    'items' => [['plan' => $planid]],
                ],
                'currency' => 'usd',

            )
        );
        $data['success'] = $stripeSession->url;
    }


    echo json_encode($data);
    exit;
    // price_1O7zCcSCPnS6Hgf9e0CiHplS

    //return $stripeSession->url;


}
function get_pixpine_subscription_details($subscription_id)
{
    require_once get_template_directory() . '/stripe/StripeHelper.php';
    $stripeHelper = new StripeHelper();
    $stripe = $stripeHelper->stripeClient;
    try {
        // Use your $stripeHelper class to retrieve the subscription information
        $subscription = $stripeHelper->retrieve($subscription_id);

        if ($subscription) {
            //print_r($subscription);exit;
            // Get the subscription's current period start and end dates
            $start_date = date('Y-m-d', $subscription->current_period_start);
            $end_date = date('Y-m-d', $subscription->current_period_end);
            $amount = $subscription->plan->amount / 100;
            $data['start_date'] = $start_date;
            $data['sub_id'] = $subscription->id;
            $data['amount'] = $amount;
            $data['end_date'] = $end_date;
        } else {
            $data['error'] = "Subscription not found or an error occurred.";
        }
    } catch (\Stripe\Exception\CardException $e) {
        $data['error'] = 'Error: ' . $e->getMessage();
    } catch (\Stripe\Exception\RateLimitException $e) {
        $data['error'] = 'Error: ' . $e->getMessage();
    } catch (\Stripe\Exception\InvalidRequestException $e) {
        $data['error'] = 'Error: ' . $e->getMessage();
    } catch (\Stripe\Exception\AuthenticationException $e) {
        $data['error'] = 'Error: ' . $e->getMessage();
    } catch (\Stripe\Exception\ApiConnectionException $e) {
        $data['error'] = 'Error: ' . $e->getMessage();
    } catch (\Stripe\Exception\ApiErrorException $e) {
        $data['error'] = 'Error: ' . $e->getMessage();
    }
    return $data;
}
function sub_stripesuccess()
{
    global $wpdb;
    global $current_user;
    get_currentuserinfo();
    $user_id = $current_user->ID;
    require_once get_template_directory() . '/stripe/StripeHelper.php';
    $stripeHelper = new StripeHelper();
    $stripe = $stripeHelper->stripeClient;
    $sessionId = $_GET['session_id'];
    $order_id = $_GET['order_id'];
    $checkoutSession = $stripeHelper->getSession($sessionId);
    $jsonData = json_encode($checkoutSession);
    //print_r($checkoutSession);exit;
    $query = "UPDATE " . $wpdb->prefix . "pixpine_payment_details SET payment_status='Completed',payment_info='" . $jsonData . "',tnx_id='" . $checkoutSession->subscription . "' WHERE item_number='$order_id' ";
    $wpdb->query($query);

    $subscriptioninfo = get_pixpine_subscription_details($checkoutSession->subscription);

    $query = "UPDATE " . $wpdb->prefix . "pixpine_subscriptions SET subscription_id='" . $checkoutSession->subscription . "',starting_date='" . $subscriptioninfo['start_date'] . "',status='Active',end_date='" . $subscriptioninfo['end_date'] . "' WHERE item_number='$order_id' ";

    $wpdb->query($query);

    $subscription_plan = $wpdb->get_var("SELECT subscripton_plan FROM ".$wpdb->prefix."pixpine_subscriptions WHERE subscription_id='$checkoutSession->subscription'");
    if($subscription_plan == 'monthly'){
        $download_per_month = 56;
        $available_download = get_user_meta($user_id, 'available_download', true);

        if($available_download == ''){
            $available_download = $download_per_month;
        }else{
            $available_download += $download_per_month;
        }
        
        update_user_meta($user_id, 'available_download', $available_download);
    }else{
        $download_per_month = '-1';
        update_user_meta($user_id, 'available_download', $available_download);
    }

    $query = "DELETE from " . $wpdb->prefix . "pixpine_carts  WHERE user_id='$user_id' ";
    $wpdb->query($query);

    $html = pixpine_subscription_email($subscription_plan);
    $email = 'subscribe@pixpine.site, innovawebdeveloper@gmail.com, '.$current_user->user_email;
    pixpine_send_html_email($email, ' Thank you for your payment', $html);

    $custom_page_url = site_url() . '/thank-you';
    $_SESSION['message'] = 'Successfully Paid';
    wp_redirect($custom_page_url);
    exit;
}
function stripesuccess()
{
    global $wpdb;
    global $current_user;
    get_currentuserinfo();
    $user_id = $current_user->ID;
    require_once get_template_directory() . '/stripe/StripeHelper.php';
    $stripeHelper = new StripeHelper();
    $stripe = $stripeHelper->stripeClient;
    $sessionId = $_GET['session_id'];
    $order_id = $_GET['order_id'];
    $checkoutSession = $stripeHelper->getSession($sessionId);
    $jsonData = json_encode($checkoutSession);
    //print_r($checkoutSession);exit;
    $query = "UPDATE " . $wpdb->prefix . "pixpine_payment_details SET payment_status='Completed',payment_info='" . $jsonData . "',tnx_id='" . $checkoutSession->payment_intent . "' WHERE item_number='$order_id' ";
    $wpdb->query($query);
    $pitem = $wpdb->get_row("SELECT * FROM " . $wpdb->prefix . "pixpine_payment_details WHERE item_number='" . $order_id . "'", ARRAY_A);

    $paymentid = (int) $pitem['id'];
    $amount = $pitem['amount'];
    $sql = "insert into " . $wpdb->prefix . "pixpine_orders (user_id,pixpine_payment_detail_id,total_price) values('$user_id','" . $paymentid . "','" . $amount . "')";
    $wpdb->query($sql);
    $dborderid = $wpdb->insert_id;
    $table_name = $wpdb->prefix . 'pixpine_carts';
    $query = "SELECT product_id FROM $table_name WHERE user_id='$user_id'";
    $product_ids = $wpdb->get_col($query);
    $total_price = 0;

    foreach ($product_ids as $cpt_id) {
        $cpt_post = get_post($cpt_id, 'product');
        $name = $cpt_post->post_title;
        $price = get_post_meta($cpt_id, 'personal_commercial_price', true);
        $sql = "insert into " . $wpdb->prefix . "pixpine_order_items (pixpine_order_id,product_id,user_id,product_name,price) values('$dborderid','" . $cpt_id . "','" . $user_id . "','" . $name . "','" . $price . "')";
        $wpdb->query($sql);
    }
    $query = "DELETE from " . $wpdb->prefix . "pixpine_carts  WHERE user_id='$user_id' ";
    $wpdb->query($query);

    $html = order_confirmation_email($product_ids, 'stripe');
    $email = 'orders@pixpine.site, innovawebdeveloper@gmail.com, '.$current_user->user_email;
    pixpine_send_html_email($email, ' Thank you for your payment', $html);

    $custom_page_url = site_url() . '/downloads?type=new-purchase';
    $_SESSION['message'] = 'Successfully Paid';
    wp_redirect($custom_page_url);
    exit;
}
function sub_stripefailed()
{
    global $wpdb;
    require_once get_template_directory() . '/stripe/StripeHelper.php';
    $stripeHelper = new StripeHelper();
    $stripe = $stripeHelper->stripeClient;
    $sessionId = $_GET['session_id'];
    $order_id = $_GET['order_id'];
    $checkoutSession = $stripeHelper->getSession($sessionId);

    $query = "UPDATE " . $wpdb->prefix . "pixpine_payment_details SET payment_status='Failed', tnx_id='" . $checkoutSession->subscription . "' WHERE item_number='$order_id' ";

    $wpdb->query($query);
    $custom_page_url = site_url() . '/orderfailed/';
    $_SESSION['message'] = 'Something went wrong!';
    wp_redirect($custom_page_url);
    exit;
}
function stripefailed()
{
    global $wpdb;
    require_once get_template_directory() . '/stripe/StripeHelper.php';
    $stripeHelper = new StripeHelper();
    $stripe = $stripeHelper->stripeClient;
    $sessionId = $_GET['session_id'];
    $order_id = $_GET['order_id'];
    $checkoutSession = $stripeHelper->getSession($sessionId);

    $query = "UPDATE " . $wpdb->prefix . "pixpine_payment_details SET payment_status='Failed', tnx_id='" . $checkoutSession->payment_intent . "' WHERE item_number='$order_id' ";

    $wpdb->query($query);
    $custom_page_url = site_url() . '/orderfailed/';
    $_SESSION['message'] = 'Something went wrong!';
    wp_redirect($custom_page_url);
    exit;
}

//cancelsubscription
add_action('wp_ajax_pixpine_subscribe_cancel', 'pixpine_subscribe_cancel');
add_action('wp_ajax_nopriv_pixpine_subscribe_cancel', 'pixpine_subscribe_cancel');
function pixpine_subscribe_cancel()
{
    $security = $_POST['nonce'];
    if (!wp_verify_nonce($security, 'ajax_nonce')) {
        $data['error'] = 'Hei Dear, What are you looking for?';
        echo json_encode($data);
        exit;
    } else {
        $subscriptionid = $_POST['subscriptionid'];
        require_once get_template_directory() . '/stripe/StripeHelper.php';
        $stripeHelper = new StripeHelper();
        $stripe = $stripeHelper->stripeClient;
        try {
            // Use your $stripeHelper class to retrieve the subscription information
            $subscription = $stripeHelper->cancelSubscription($subscriptionid);

            if ($subscription) {
                // Get the subscription's current period start and end dates

                global $wpdb;
                $query = "UPDATE " . $wpdb->prefix . "pixpine_subscriptions SET status='Canceled' WHERE subscription_id='$subscriptionid' ";

                $wpdb->query($query);

                $data['success'] = "Subscription successfully canceled.";
            } else {
                $data['error'] = "Subscription not found or an error occurred.";
            }
        } catch (\Stripe\Exception\CardException $e) {
            $data['error'] = 'Error: ' . $e->getMessage();
        }
        echo json_encode($data);
        exit;
    }
}
if (isset($_POST['placeOrder'])) {
    global $current_user;
    get_currentuserinfo();
    $email = $current_user->user_email;
    $data['order_id'] = time();
    $data['total_price'] = isset($_POST['price']) ? $_POST['price'] : '';
    $data['email'] = $email;
    $data['proid'] = isset($_POST['proid']) ? $_POST['proid'] : '';
    $payment_type = isset($_POST['payment_method']) ? $_POST['payment_method'] : '';
    if ($payment_type == 'Stripe') {
        stripePayment($data);
    }
}
//stripe cron functionality

if (!wp_next_scheduled('eil_subscribe_cron_func')) {
    wp_schedule_event(time(), 'daily', 'eil_subscribe_cron_func');
    //wp_schedule_event( time(), '5min', 'eil_subscribe_cron_func' );
}
//update_upcoming_payment
function update_upcoming_payment()
{
    global $wpdb;
    $f_enddate = date("Y-m-d");
    $results = $wpdb->get_results("SELECT * FROM " . $wpdb->prefix . "pixpine_subscriptions WHERE status='Active' AND end_date < '" . $f_enddate . "' limit 50 ", ARRAY_A);
    if (!empty($results)) {
        foreach ($results as $sitem) {
            $dbid = $sitem['id'];
            $subscribeid = $sitem['subscription_id'];
            $details = get_pixpine_subscription_details($subscribeid);
            $apistart_date = $details['start_date'];
            $apiend_date = $details['end_date'];
            $query = "UPDATE " . $wpdb->prefix . "pixpine_subscriptions SET recheck_update='0',starting_date='" . $apistart_date . "',end_date='" . $apiend_date . "' WHERE id='$dbid' ";

            $wpdb->query($query);
        }
    }
}
add_action('eil_subscribe_cron_func', 'subscribe_cron_func');

function subscribe_cron_func()
{
    global $wpdb;
    //global $current_user;
    //get_currentuserinfo();
    // $user_id= $current_user->ID; 
    $f_startdate = date("Y-m-d", strtotime("-3 day"));
    $f_enddate = date("Y-m-d", strtotime("+3 day"));
    update_upcoming_payment();

    $results = $wpdb->get_results("SELECT * FROM " . $wpdb->prefix . "pixpine_subscriptions WHERE status='Active' AND recheck_update='0'", ARRAY_A);

    if (!empty($results)) {
        foreach ($results as $sitem) {
            // print_r($sitem);exit;
            $subscribeid = $sitem['subscription_id'];
            $details = get_pixpine_subscription_details($subscribeid);
            $apistart_date = $details['start_date'];
            $apiend_date = $details['end_date'];
            $db_end_date = $sitem['end_date'];
            $user_id = $sitem['user_id'];
            $dbid = $sitem['id'];
            $nextPaymentDate = $db_end_date;
            $reminderDate = date('Y-m-d', strtotime($nextPaymentDate . ' - 3 days'));
            $earlier = new DateTime(date('Y-m-d'));
            $later = new DateTime($db_end_date);
            //send_remainder_email($user_id,$details) ;
            $abs_diff = $later->diff($earlier)->format("%a");
            $daydiff = $abs_diff;
            if (date('Y-m-d') === $reminderDate || $daydiff < 3 && $daydiff > 1) {

                $sendemail = send_remainder_email($user_id, $details);
                if ($sendemail) {
                    $query = "UPDATE " . $wpdb->prefix . "pixpine_subscriptions SET recheck_update='1' WHERE id='$dbid' ";

                    $wpdb->query($query);
                }

            }

        }

        //print_r($details);exit;
    }

    //$sql="insert into ".$wpdb->prefix."cron_check_test (status) values('1')";
    // $wpdb->query($sql);
    // Your task logic goes here
}
function send_remainder_email($user_id, $info)
{
    $subject = 'Pixpine Payment Remainder Email';

    $user_info = get_userdata($user_id);
    $username = $user_info->user_login;
    $first_name = $user_info->first_name;
    $last_name = $user_info->last_name;

    $to = $user_info->user_email;

    $message = '<p>Hi ' . $username . '</p><br>,

<p>I hope you are doing well.</p><br>

<p> ' . bloginfo('name') . ' concerning the next payment date is ' . $info['end_date'] . '.Make sure in your account have available balance.your next payment amount is ($' . $info['amount'] . ')</p><br>



<p>Thank You,</p><br>

' . $username . '';



    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

    $is_mail_sent = wp_mail($to, $subject, $message, $headers);

    if ($is_mail_sent) {
        return true;
    } else {
        return false;
    }
}
//add_action( 'init', 'subscribe_cron_func' );


define('ENCODER_IT_PAYPAL_CLIENT', 'AVT1TGV_xT-FR1XRXZdKgsyoXIhHf_N4-j26F0W6bYXgLcv4r2jJLu7Bsa1aabiU-0pVGrDFUIdOpvrQ');

function custom_rewrite_rules() {
    add_rewrite_rule(
        '^product/([^/]+)/?$',
        'index.php?pagename=product&custom_param=$matches[1]',
        'top'
    );
}

add_action('init', 'custom_rewrite_rules');





/**
 * Removes output from Yoast SEO on the frontend for a specific PRODUCT PAGE
 */
function remove_wpseo() {
    if ( is_page ( 'product' ) ) {
        $front_end = YoastSEO()->classes->get( Yoast\WP\SEO\Integrations\Front_End_Integration::class );
        
        remove_action( 'wpseo_head', [ $front_end, 'present_head' ], -9999 );
    }
}
add_action( 'template_redirect', 'remove_wpseo' );


function get_free_product_post_id(){
    // Get the path
    $path = $_SERVER['REQUEST_URI'];

    // Get the segments of the path
    $pathSegments = explode('/', trim($path, '/'));

    // Get the last segment
    $post_slug = end($pathSegments);
    return $post_id = get_page_by_path($post_slug, OBJECT, 'post')->ID;
}


add_action('after_setup_theme', 'remove_admin_bar');
function remove_admin_bar() {
    if (!current_user_can('administrator') && !is_admin()) {
        show_admin_bar(false);
    }
}


function my_login_logo() { ?>
    <style type="text/css">
        #login h1 a, .login h1 a {
            background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/assets/images/logo.png);
		height:43px;
		width:130px;
		background-size: 130px 43px;
		background-repeat: no-repeat;
        	padding-bottom: 30px;
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );


function is_show_download_btn($product_id=null){
    // is user has subscription
    global $wpdb;
    $user_id = get_current_user_id();
    $active_subscription = $wpdb->get_var("SELECT subscripton_plan FROM " . $wpdb->prefix . "pixpine_subscriptions WHERE user_id='" . $user_id . "' AND status='Active'");
    
    if ($active_subscription != null) {
        $bought_product = $wpdb->get_var("SELECT id FROM " . $wpdb->prefix . "pixpine_subscription_downloaded_items WHERE user_id='" . $user_id . "' AND product_id='".$product_id."'");
        if($bought_product != null){
            return true;
        }

        if($active_subscription == 'yearly'){
            return true;
        }elseif($active_subscription == 'monthly'){
           $available_download = get_user_meta($user_id, 'available_download', true);
            if($available_download > 0){
                return true;
            }
        }
    } 
    // already downloaded
    if($product_id != null){
        $bought_product = $wpdb->get_var("SELECT id FROM " . $wpdb->prefix . "pixpine_order_items WHERE user_id='" . $user_id . "' AND product_id='".$product_id."'");
        if($bought_product != null){
            return true;
        }
    }
    
    return false;
}
