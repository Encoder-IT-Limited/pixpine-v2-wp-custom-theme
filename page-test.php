<?php
/*
Template Name: Test
*/

get_currentuserinfo();
echo $current_user->user_email;
$html = order_confirmation_email($product_ids, 'stripe');
var_dump($html);
/////////////////////////////////////