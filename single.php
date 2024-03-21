<?php
$post_id = get_the_ID();

if(rtrim($_SERVER['HTTP_REFERER'], '/') == rtrim(site_url(), '/')){
  $_SESSION['background_type'] = 'home';
}else{
  $_SESSION['background_type'] = 'mockup-index';
}

$current_category_name = '';
$taxonomy = 'mockup_category'; //'your_custom_taxonomy'; 
$custom_categories = wp_get_post_terms($post_id, $taxonomy);

// Check if custom categories were found
if (!is_wp_error($custom_categories) && !empty($custom_categories)) {
  // Loop through the custom categories and display them
  foreach ($custom_categories as $category) {
      if((esc_html($category->slug) == "premium-mockups") || (esc_html($category->slug) == "bundle-mockups") || (esc_html($category->slug) == "free-mockups")){
          $current_category_name = esc_html($category->slug);
      }
  }
}
?>
<?php
if($current_category_name == "premium-mockups"){
  if($_SESSION['background_type'] == 'home'){
    include get_template_directory() .'/page-premium-mockup-single-product-home-template.php';
  }else{
    include get_template_directory() .'/page-premium-mockup-single-product.php';
  }
}elseif($current_category_name == "bundle-mockups"){
  if($_SESSION['background_type'] == 'home'){
    include get_template_directory() .'/page-bundle-mockup-single-product-home-template.php';
  }else{
    include get_template_directory() .'/page-bundle-mockup-single-product.php';
  }
	
}elseif($current_category_name == "free-mockups"){
	include get_template_directory() .'/page-free-mockup-single-product.php';
}
?>

