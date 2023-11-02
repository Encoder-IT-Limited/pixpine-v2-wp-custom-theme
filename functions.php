<?php
/**
 * PixPine functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package PixPine
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}
define( 'fb_app_id', '663261215969776' );
define( 'fb_app_sec', 'a59ad75665adffe842c10eee33460ef0' );
define( 'fb_app_redirect', site_url().'/?fblogin=true' );
define( 'GOOGLE_REDIRECT_URL', site_url().'/?glogin=true' );
define( 'GOOGLE_CLIENT_ID', '517874441882-rmu95ov5eh75st0gisfa9aeb0lb7gdqe.apps.googleusercontent.com' );
define( 'GOOGLE_CLIENT_SECRET', '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' );

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function pixpine_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on PixPine, use a find and replace
		* to change 'pixpine' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'pixpine', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'pixpine' ),
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
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'pixpine_setup' );

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
function pixpine_scripts() {
	wp_enqueue_style('pixpine-bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css', array(), '1.0', 'all');
	wp_enqueue_style('pixpine-font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css', array(), '1.0', 'all');
	wp_enqueue_style('pixpine-slick-theme', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css', array(), '1.0', 'all');
	wp_enqueue_style('pixpine-slick-min', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css', array(), '1.0', 'all');
	wp_enqueue_style( 'pixpine-main-style', get_template_directory_uri() . '/assets/styles/style.css', array(), _S_VERSION );
	wp_enqueue_style( 'pixpine-home-style', get_template_directory_uri() . '/assets/styles/home-style.css', array(), _S_VERSION );

	wp_enqueue_script('jquery');
	// wp_enqueue_script( 'pixpine-slim-js', 'https://code.jquery.com/jquery-3.6.4.slim.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'pixpine-slick-min', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'pixpine-navigation', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'pixpine-custom-js', get_template_directory_uri() . '/assets/js/index.js', array(), _S_VERSION, true );

	// custom ajax
	
    wp_enqueue_script('pixpine-custom-ajax', get_template_directory_uri() . '/assets/js/custom-ajax.js', array('jquery'), '1.0', true);
    // Generate a nonce and pass it to the JavaScript file
    $ajax_nonce = wp_create_nonce('ajax_nonce');
    wp_localize_script('pixpine-custom-ajax', 'ajax_object', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'ajax_nonce' => $ajax_nonce, // Pass the nonce to JavaScript
    ));

}
add_action( 'wp_enqueue_scripts', 'pixpine_scripts' );



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
require get_template_directory() . '/functions/show-product-and-cat.php';
require get_template_directory() . '/functions/subcription.php';
require get_template_directory() . '/functions/user.php';

//Nadim Dev working on facebook login
//add_action( 'login_form', 'ayecode_fb_login' );
function eil_code_fb_login(){

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
		'client_id'     => $app_id,
		'redirect_uri'  => $redirect_uri,
		'response_type' => 'code',
		'scope'         => 'email'
	);

	$login_url = 'https://www.facebook.com/dialog/oauth?' . urldecode( http_build_query( $params ) );
	return $login_url;
}

add_action( 'init', 'eil_code_social_login_func' );
function eil_code_social_login_func(){
    //echo GOOGLE_REDIRECT_URL;exit;
	// If we clicked the facebook login link and successfully logged in 
	// run the below code.
   if ( isset( $_GET['fblogin'] ) && $_GET['fblogin'] ) {
	if ( isset( $_GET['code'] ) && $_GET['code'] ) {
		
	$app_id = fb_app_id;
	$redirect_uri = fb_app_redirect;
	$app_secret = fb_app_sec;
	$graphAPIVerion = 'v11.0';
		
		// Prepare the parameters for oauth
		$params = array(
			'client_id'     => $app_id,
			'redirect_uri'  => $redirect_uri,
			'client_secret' => $app_secret,
			'code'          => $_GET['code'] 
		);

		$tokenresponse = wp_remote_get( 'https://graph.facebook.com/'.$graphAPIVerion.'/oauth/access_token?' . http_build_query( $params ) );
		
		// Check that we get a reply from the Facebook API, if not abort.
		if ( ! is_array( $tokenresponse ) && is_wp_error( $tokenresponse ) ) {
			return;
		}
		
		$token = json_decode( wp_remote_retrieve_body( $tokenresponse ) );

		// Successfully authenticate using oauth means, move to next step.
		if( $token->access_token ){

			// Prepare to get the fields from Facebook profile.
			// @link https://developers.facebook.com/docs/graph-api/reference/user/#fields
			$params = array(
				'access_token'	=> $token->access_token,
				'fields'		=> 'name,email,first_name,last_name,locale' 
			);
			$useresponse = wp_remote_get('https://graph.facebook.com/'.$graphAPIVerion.'/me' . '?' . urldecode( http_build_query( $params ) ) );
			
			//Store the needed fields in an array.
			$facebook_details = (array) json_decode( wp_remote_retrieve_body( $useresponse ) );

			// Check whether the email is already registered or not.
			// If it does not exists, create a new user and redirect the newly created user to the home page.
			// If it exits, redirect the existing user to the home page by setting the authentication.
			if( !email_exists( $facebook_details['email'] ) ) {
				$user_data = array(
					'user_login'  =>  $facebook_details['email'],
					'user_email'  =>  $facebook_details['email'],
					'user_pass'   =>  wp_generate_password( 12, true ), 
					'display_name' => $facebook_details['name'],
					'first_name' => $facebook_details['first_name'],
					'last_name' => $facebook_details['last_name'],
					'locale' => $facebook_details['locale'],
				);
				$user_id = wp_insert_user( $user_data );
			} else{
				$user = get_user_by( 'email', $facebook_details['email'] );
				$user_id = $user->ID;
			}
			if( $user_id ) {
				wp_clear_auth_cookie();
				wp_set_current_user ( $user_id ); // Set the current user detail
				wp_set_auth_cookie( $user_id, true ); // Set the authentication cookie.
				wp_redirect( home_url() ); // Redirect to the home page.
				exit();
			}
		}
	}
   }
    if ( isset( $_GET['glogin'] ) && $_GET['glogin'] ) {
        require_once get_template_directory() . '/google_vendor/autoload.php'; 
         $client = new Google_Client();
        $client->setClientId(GOOGLE_CLIENT_ID);
          $client->setClientSecret(GOOGLE_CLIENT_SECRET);
           $client->setRedirectUri(GOOGLE_REDIRECT_URL); // Your redirect URI.

             $client->addScope(['email', 'profile']); // You can add other desired scopes.
           $client->authenticate($_GET['code']);
          $access_token = $client->getAccessToken();
        $client->setAccessToken($access_token);
//print( $access_token);exit;
       /* $client->setAccessToken($access_token);
        $gmail = new Google_Service_Gmail($client);
        $profile = $gmail->users->getProfile('me');
        $email = $profile->getEmailAddress();
*/
        $Oauth = new Google_Service_Oauth2($client);
        $info = $Oauth->userinfo->get();
        $email=$info->email;
        $name=$info->name;
        // Check if the user with this email already exists.
        $user = get_user_by('email', $email);

       	if( !email_exists( $email) ) {
            $user_id = wp_insert_user(array(
            'user_login'  => $email,
            'user_email' => $email,
            'user_pass' => wp_generate_password( 12, true ), 
        ));
              
           
        } 
        else{
               $user = get_user_by( 'email', $email );
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
				wp_set_current_user ( $user_id ); // Set the current user detail
				wp_set_auth_cookie( $user_id, true ); // Set the authentication cookie.
				wp_redirect( home_url() ); // Redirect to the home page.
				exit();
        } else {
            // Handle the error or redirect to an error page.
        }
    }
}
function google_login_url() {
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
add_action( 'init', 'eil_payment_func' );
function eil_payment_func(){
    if(isset($_GET['stripesuccess']) && $_GET['stripesuccess']){
       stripesuccess(); 
    }
    if(isset($_GET['stripefailed']) && $_GET['stripefailed']){
      stripefailed(); 
    }
}
 function stripePayment($data){
   // echo 'yes';exit;
require_once get_template_directory() . '/stripe/StripeHelper.php'; 
$stripeHelper = new StripeHelper();
$stripe = $stripeHelper->stripeClient;
$appUrl = site_url();        
/**
 * Create product
 */
$order_id=$data['order_id'];
$amount=$data['total_price'];
$email=$data['email'];
$proid=$data['proid'];
$product = $stripeHelper->createProducts();
$productPrice=$amount;
/**
 * Create price for product
 */
$price = $stripeHelper->createProductPrice($product, $productPrice,'usd');
/**
 * create checkout session and payment link
 */
global $wpdb;
 $sql="insert into ".$wpdb->prefix."payments (receiver_email,item_number,txnid,payment_amount,payment_status,createdtime) values('$email','".$order_id."','0','".$amount."','Pending','".date('Y-m-d H:i:s')."')";
       $wpdb->query($sql);
     if($proid =='283'){
         $stripeSession = $stripe->checkout->sessions->create(
        array(
        'success_url' => $appUrl . '/?stripesuccess=true&session_id={CHECKOUT_SESSION_ID}&order_id='.$order_id.'',
        'cancel_url' => $appUrl . '/?stripefailed=true&session_id={CHECKOUT_SESSION_ID}&order_id='.$order_id.'',
        'payment_method_types' => array('card'),
        'customer_email' => $email,   
        
        'payment_method_types' => ['card'],
         'subscription_data' => [
            'items' => [['plan' => 'price_1O7zCcSCPnS6Hgf9e0CiHplS']],
        ],   
        'currency' => 'usd',
       
    )
); 
     }
     else{
        $stripeSession = $stripe->checkout->sessions->create(
        array(
        'success_url' => $appUrl . '/?stripesuccess=true&session_id={CHECKOUT_SESSION_ID}&order_id='.$order_id.'',
        'cancel_url' => $appUrl . '/?stripefailed=true&session_id={CHECKOUT_SESSION_ID}&order_id='.$order_id.'',
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
     }
    // price_1O7zCcSCPnS6Hgf9e0CiHplS
      
      wp_redirect($stripeSession->url);exit;


    }
 function stripesuccess(){
     global $wpdb;
     require_once get_template_directory() . '/stripe/StripeHelper.php'; 
     $stripeHelper = new StripeHelper();
    $stripe = $stripeHelper->stripeClient;
     $sessionId = $_GET['session_id']; 
     $order_id = $_GET['order_id'];  
     $checkoutSession = $stripeHelper->getSession($sessionId);
     $jsonData=json_encode($checkoutSession);
   //print_r($checkoutSession);exit;
      $query = "UPDATE ".$wpdb->prefix."payments SET payment_status='Completed',payment_info='".$jsonData."',txnid='".$checkoutSession->payment_intent."' WHERE item_number='$order_id' ";
      $wpdb->query($query);
     
       $custom_page_url = site_url() . '/orderconfirmed/';
        $_SESSION['message'] = 'Successfully Paid';
         wp_redirect($custom_page_url);exit;
    }
    function stripefailed(){
     global $wpdb;
     require_once get_template_directory() . '/stripe/StripeHelper.php'; 
    $stripeHelper = new StripeHelper();
    $stripe = $stripeHelper->stripeClient;
    $sessionId = $_GET['session_id'];
     $order_id = $_GET['order_id'];  
    $checkoutSession = $stripeHelper->getSession($sessionId);
  
      $query = "UPDATE ".$wpdb->prefix."payments SET payment_status='Failed', txnid='".$checkoutSession->payment_intent."' WHERE item_number='$order_id' ";
      
       $wpdb->query($query);
          $custom_page_url = site_url() . '/orderfailed/';
        $_SESSION['message'] = 'Something went wrong!';
         wp_redirect($custom_page_url);exit;
    }
if (isset($_POST['placeOrder'])) {
 global $current_user;
get_currentuserinfo();
$email= $current_user->user_email;   
$data['order_id']=time();
$data['total_price']=isset($_POST['price'])?$_POST['price']:'';
$data['email']=$email;
$data['proid']=isset($_POST['proid'])?$_POST['proid']:'';
$payment_type=isset($_POST['payment_method'])?$_POST['payment_method']:'';
if($payment_type=='Stripe'){
    stripePayment($data);
}
}