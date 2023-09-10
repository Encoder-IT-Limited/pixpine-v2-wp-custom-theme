<?php 
/*
Template Name: Test Script
*/
// Get all categories from the 'general_category' taxonomy, ordered by 'menu_order'
$categories = get_terms(array(
  'taxonomy'   => 'general_category',
  'hide_empty' => false,
  'orderby'    => 'term_order'  // 'order'      => 'ASC', // Change to 'DESC' for descending order
));

if (!empty($categories)) {
  echo '<ul>';
  foreach ($categories as $category) {
      // Display each category name and link
      echo '<li><a href="' . get_term_link($category) . '">' . esc_html($category->name) . '</a></li>';
  }
  echo '</ul>';
} else {
  echo 'No categories found.';
}
?>