<?php

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
        echo 'Login failed: ' . $user->get_error_message();
    } else {
        // Login successful
        echo 'success';
    }

    die();
}
add_action('wp_ajax_pixpine_login_user', 'pixpine_login_user'); // For logged-in users
add_action('wp_ajax_nopriv_pixpine_login_user', 'pixpine_login_user'); // For non-logged-in users