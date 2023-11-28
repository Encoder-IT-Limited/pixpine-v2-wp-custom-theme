<?php
ob_start();
$msg = '';
$pixpine_home_cat = '';
if(isset($_GET['id'])){
    $id = $_GET['id'];
}else{
    $id = 1;
}
if(isset($_POST['submit'])){

    $image_id = $_POST['_custom_product_gallery'];
    $product_id = $_POST['related_product'];
    if(empty($image_id) || empty($product_id) ){
        $msg = '
        <div class="alert alert-danger" role="alert">
        Not saved. Please try again.
        </div>';
    }else{
        $current_category_name = '';
        $taxonomy = 'mockup_category'; //'your_custom_taxonomy'; 
        $custom_categories = wp_get_post_terms($product_id, $taxonomy);
        // Check if custom categories were found
        if (!is_wp_error($custom_categories) && !empty($custom_categories)) {
          // Loop through the custom categories and display them
          foreach ($custom_categories as $category) {
            if(esc_html($category->name) == "Free Mockups"){
                $current_category_name = esc_html($category->name);
                $current_category_slug = $category->slug;
            }elseif(esc_html($category->name) == "Bundle Mockups"){
                $current_category_name = esc_html($category->name);
                $current_category_slug = $category->slug;
            }elseif(esc_html($category->name) == "Premium Mockups"){
                $current_category_name = esc_html($category->name);
                $current_category_slug = $category->slug;
            }
          }
        }
        update_option('home_special_product_'.$id.'_image_id', $image_id);
        update_option('home_special_product_'.$id.'_image_url', wp_get_attachment_image_url($image_id, 'thumbnail'));
        update_option('home_special_product_'.$id.'_product_id', $product_id);
        update_option('home_special_product_'.$id.'_product_main_cat', $current_category_name);
        update_option('home_special_product_'.$id.'_cat_slug', $current_category_slug);
        $msg = '
        <div class="alert alert-success" role="alert">
        Successfully saved.
        </div>';
    }

}


$taxonomy = 'mockup_category'; // Replace with your custom taxonomy name
$parent_category_slug = 'premium-mockups'; // Replace with the slug of the parent category
?>
<div class="wrap">
    <main>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
        <link href="<?php echo get_template_directory_uri(); ?>/admin/css/style.css" rel="stylesheet" />
        <section class="form_section">
            <div class="container">
                <div class="form_column ">
                    <form action="#" method="post">
                        <div class="form_heading text-center">
                            <h1>Home Special Product - <?php echo $id;?></h1>
                            <p><?php echo $msg;?></p>
                        </div>

                        <div class="row single-product-row">
           
                            <div class="col-md-6">
                                <?php
                                wp_nonce_field('custom_product_gallery_nonce', 'custom_product_gallery_nonce');
                                $_custom_product_gallery = get_post_meta('0', '_custom_product_gallery', true);
                                echo '<input type="hidden" id="_custom_product_gallery" name="_custom_product_gallery" value="'.$_custom_product_gallery.'" required>';
                                $_custom_product_gallery = !empty($_custom_product_gallery) ? explode(',', $_custom_product_gallery) : array();
                                echo '<input type="button" class="button" value="Add Images" is-multiple="0" id="custom_product_gallery_button">';
                                echo '<ul id="custom_product_gallery_container"  class="side-by-side-list">';
                                foreach ($_custom_product_gallery as $image_id) {
                                    echo '<li>' . wp_get_attachment_image($image_id, 'thumbnail') . '</li>';
                                }
                                echo '</ul>';
                                ?>
                            </div>
                            <div class="col-md-6">
                                <?php
                                    echo '
                                    <div class="autocomplete" style="width:300px;">
                                        <input id="related-product-search-input" class="search-input" type="text" placeholder="Search Product">
                                        <div id="related-product-options" class="autocomplete-items">
                                
                                        </div>
                                    </div>';
                                    echo '<input type="hidden" value="" name="related_product" id="related-product" required>';
                                    echo '
                                    <ol class="selected-related-product">
                                    
                                    </ol>
                                    ';
                                ?>
                            </div>
                        </div>
                        
                        <div class="input_gorup">
                            <input class="_btn" name="submit" type="submit" value="Submit" />
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </main>
</div>