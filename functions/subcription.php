<?php
function save_subscription_email(){
    $user_email         = $_POST['sub_email'];
    global $wpdb;
    $table_name = $wpdb->prefix . 'email_subscribers';
    $query = "SELECT COUNT(*) FROM $table_name WHERE user_email = '$user_email'";
    $count = $wpdb->get_var($query);
    if ($count != 0) {
        $msg = 'Subscriber email already exists.';
    } else {
        $query = "INSERT INTO `$table_name`(`user_email`) VALUES ('$user_email')";
        $results = $wpdb->query($query);
        if($results){
            $msg = 'Subscriber Added successfully.';
        }else{
            $msg = 'Error!! Please try again.';
        }
    }
    echo $msg;
    die();
}
add_action('wp_ajax_save_subscription_email', 'save_subscription_email'); // For logged-in users
add_action('wp_ajax_nopriv_save_subscription_email', 'save_subscription_email'); // For non-logged-in users
