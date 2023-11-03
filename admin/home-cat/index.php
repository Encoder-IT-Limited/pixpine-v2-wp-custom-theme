<?php
ob_start();
$msg = '';
$pixpine_home_cat = '';
if(isset($_POST['submit'])){
    foreach($_POST['home_cat'] as $key=>$val){
        if($val==""){
            $msg = '
                <div class="alert alert-danger" role="alert">
                You must select all the categories.
                </div>';
        }
    }
    $pixpine_home_cat = implode(',', $_POST['home_cat']);
    if($msg==''){
        add_option( 'home_cat', $pixpine_home_cat);
        $msg = '
                <div class="alert alert-success" role="alert">
                Successfully saved.
                </div>';
    }
}


$taxonomy = 'mockup_category'; // Replace with your custom taxonomy name
$parent_category_slug = 'premium-mockups'; // Replace with the slug of the parent category

// Define the tax_query to retrieve child terms of the specified parent category
$args = array(
    'taxonomy' => $taxonomy,
    'child_of' => 0, // Set to 0 to get top-level terms
    'parent' => get_term_by('slug', $parent_category_slug, $taxonomy)->term_id, // Get the parent term ID
    'hide_empty' => false, // Set to false to retrieve even if they are empty
);
$cat_options = '<option selected value="">Open this select menu</option>';
$subcategories = get_terms($args);
if (!empty($subcategories)) {
    foreach ($subcategories as $subcategory) {
        $cat_options .= '<option value="'.$subcategory->term_id.'">'.$subcategory->name.'</option>';
    }
  }
?>
<div class="wrap">
    <main>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
        <link href="<?php echo get_template_directory_uri(); ?>/admin/css/style.css" rel="stylesheet" />
        <section class="form_section">
            <div class="container">
                <div class="form_column form_small_width">
                    <form action="#" method="post">
                        <div class="form_heading text-center">
                            <h1>Home Categories</h1>
                            <p><?php echo $msg;?></p>
                        </div>
                        <select class="form-select" aria-label="Default select example" name="home_cat[]">
                            <?php echo $cat_options;?>
                        </select>
                        <br>
                        <br>
                        <select class="form-select" aria-label="Default select example" name="home_cat[]">
                            <?php echo $cat_options;?>
                        </select>
                        <br>
                        <br>
                        <select class="form-select" aria-label="Default select example" name="home_cat[]">
                            <?php echo $cat_options;?>
                        </select>
                        <br>
                        <br>
                        <select class="form-select" aria-label="Default select example" name="home_cat[]">
                            <?php echo $cat_options;?>
                        </select>
                        <br>
                        <br>
                        <select class="form-select" aria-label="Default select example" name="home_cat[]">
                            <?php echo $cat_options;?>
                        </select>
                        <br>
                        <br>
                        
                        <div class="input_gorup">
                            <input class="_btn" name="submit" type="submit" value="Submit" />
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </main>
</div>