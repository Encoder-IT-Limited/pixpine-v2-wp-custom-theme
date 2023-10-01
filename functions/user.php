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


function pixpine_signup(){
    // User login credentials
    $signup_first_name = $_POST['signup_first_name'];
    $signup_last_name = $_POST['signup_last_name'];
    // User registration data
    $username = $signup_first_name.' '.$signup_last_name;
    $email = $_POST['signup_email'];
    $password = '12345678';

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
            echo 'success';
        }
    } else {
        // User already exists with the provided email
        echo 'User with this email already exists.';
    }

    die();
}
add_action('wp_ajax_pixpine_signup', 'pixpine_signup'); // For logged-in users
add_action('wp_ajax_nopriv_pixpine_signup', 'pixpine_signup'); // For non-logged-in users