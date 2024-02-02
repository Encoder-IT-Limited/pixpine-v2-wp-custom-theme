<?php

function pixpine_remove_cart(){
    // User login credentials
    $p_id = $_POST['pId'];
    if(is_user_logged_in()){
        $user_id = get_current_user_id();
        global $wpdb;
        $table_name = $wpdb->prefix . 'pixpine_carts';
        $wpdb->delete($table_name, array(
            'user_id' => $user_id,
            'product_id' => $p_id
        ));
    }else{
        $_SESSION['cart_items'] = array_diff($_SESSION['cart_items'],[$p_id]);
    }

    echo 'success';

    die();
}
add_action('wp_ajax_pixpine_remove_cart', 'pixpine_remove_cart'); // For logged-in users

function pixpine_update_cart(){
    // User login credentials
    $p_id = $_POST['pId'];
    $isCart = $_POST['isCart'];
    if(is_user_logged_in()){
        $user_id = get_current_user_id();

        global $wpdb;
        $table_name = $wpdb->prefix . 'pixpine_carts';
        if($isCart == 0 ){
            $checkIfExists = $wpdb->get_var("SELECT id FROM $table_name WHERE user_id = '$user_id' AND product_id='$p_id'");
            if ($checkIfExists == NULL) {
                $wpdb->insert($table_name, array(
                    'user_id' => $user_id,
                    'product_id' => $p_id
                ));
            }
        }        
    }else{
        if(!in_array($p_id, $_SESSION['cart_items'])){
            array_push($_SESSION['cart_items'], $p_id);
        }
    }

    echo 'success';

    die();
}
add_action('wp_ajax_pixpine_update_cart', 'pixpine_update_cart'); // For logged-in users
add_action('wp_ajax_nopriv_pixpine_update_cart', 'pixpine_update_cart'); // For logged-in users

function pixpine_alter_favorite(){
    // User login credentials
    $p_id = $_POST['pId'];
    $type = $_POST['type'];
    $meta_key = 'pixpine_favorite_'.$type;
    $user_id = get_current_user_id();
    $old_ids = get_user_meta($user_id, $meta_key, true);

    if($p_id == '*'){
        update_user_meta($user_id, 'pixpine_favorite_premium', '');
        update_user_meta($user_id, 'pixpine_favorite_bundle', '');
    }else{
        if(!empty($old_ids)){
            $old_ids = explode(',', $old_ids);
            if(in_array($p_id, $old_ids)){
                $old_ids = array_diff($old_ids,[$p_id]);
            }else{
                array_push($old_ids, $p_id);
            }
        }else{
            $old_ids = [];
            array_push($old_ids, $p_id);
        }
    
        $old_ids = implode(',', $old_ids);
        update_user_meta($user_id, $meta_key, $old_ids);
    }

    echo 'success';

    die();
}
add_action('wp_ajax_pixpine_alter_favorite', 'pixpine_alter_favorite'); // For logged-in users


function pixpine_login_user(){
    // User login credentials
    $username = $_POST['user_email'];
    $password = $_POST['user_password'];

    // Prepare user login data
    $login_data = array(
        'user_login'    => $username,
        'user_password' => $password,
        'remember'      => true,
    );

    // Attempt to log in the user
    $user = wp_signon($login_data, false);

    if (is_wp_error($user)) {
        // Login failed
        echo 'Login failed: ' . str_replace( 'Lost your password?', '', $user->get_error_message());
        // echo 'Login failed: ' . $user_id->get_error_message();
    } else {
        // Login successful
        move_session_cart_to_db_cart($user->ID);
        echo 'success';
    }

    die();
}
add_action('wp_ajax_pixpine_login_user', 'pixpine_login_user'); // For logged-in users
add_action('wp_ajax_nopriv_pixpine_login_user', 'pixpine_login_user'); // For non-logged-in users

function move_session_cart_to_db_cart($user_id){
    if(count($_SESSION['cart_items'])>0){
        global $wpdb;
        foreach($_SESSION['cart_items'] as $p_id){
            $table_name = $wpdb->prefix . 'pixpine_carts';            
            $checkIfExists = $wpdb->get_var("SELECT id FROM $table_name WHERE user_id = '$user_id' AND product_id='$p_id'");
            if ($checkIfExists == NULL) {
                $wpdb->insert($table_name, array(
                    'user_id' => $user_id,
                    'product_id' => $p_id
                )); 
            }
        }
        $_SESSION['cart_items'] = [];
    }
}

function pixpine_signup(){
    // User login credentials
    $signup_first_name = $_POST['signup_first_name'];
    $signup_last_name = $_POST['signup_last_name'];
    // User registration data
    $username = $signup_first_name.' '.$signup_last_name;
    $email = $_POST['signup_email'];
    $password = randomPassword();

    // Check if the user already exists by email
    $user_exists = email_exists($email);

    if (!$user_exists) {
        // User does not exist, proceed with registration
        $user_id = wp_create_user($username, $password, $email);

        if (is_wp_error($user_id)) {
            // Registration failed
            echo 'Registration failed: ' . $user_id->get_error_message();
        } else {
            // Registration successful
            // echo 'Registration successful. User ID: ' . $user_id;
            move_session_cart_to_db_cart($user_id);
            // send welcome email
            $html = pixpine_welcome_email($username);
            pixpine_send_html_email($email, 'Pixpine', $html);

            $html = pixpine_new_account_password_email($password);
            pixpine_send_html_email($email, 'Pixpine', $html);
            echo 'success';
        }
    } else {
        // User already exists with the provided email
        echo 'An account already exists with this email.';
    }

    die();
}
add_action('wp_ajax_pixpine_signup', 'pixpine_signup'); // For logged-in users
add_action('wp_ajax_nopriv_pixpine_signup', 'pixpine_signup'); // For non-logged-in users


function randomPassword() {
    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
}


function wpdocs_my_login_redirect( $url, $request, $user ) {
    if ( $user && is_object( $user ) && is_a( $user, 'WP_User' ) ) {
        if ( $user->has_cap( 'administrator' ) ) {
            $url = admin_url();
        } else {
            $url = home_url();
        }
    }
    return $url;
}
 
add_filter( 'login_redirect', 'wpdocs_my_login_redirect', 10, 3 );
