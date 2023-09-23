<?php
function show_sub_cats_in_listing_page($parent_category_slug){
    $html='<ul class="nav nav-tabs" role="tablist">';
    $taxonomy = 'mockup_category'; // Replace with your custom taxonomy name
    // $parent_category_slug = 'free-mockups'; // Replace with the slug of the parent category

    // Define the tax_query to retrieve child terms of the specified parent category
    $args = array(
        'taxonomy' => $taxonomy,
        'child_of' => 0, // Set to 0 to get top-level terms
        'parent' => get_term_by('slug', $parent_category_slug, $taxonomy)->term_id, // Get the parent term ID
        'hide_empty' => false, // Set to false to retrieve even if they are empty
    );

    $subcategories = get_terms($args);

    if (!empty($subcategories)) {
        $count = 0;
        $tmp_cat = [];
        foreach ($subcategories as $subcategory) {
            // term_id, slug
            $count++;
            if($count <=9){
            $html.= '<li class="nav-item nav-link" role="presentation" cat-id="'.$subcategory->term_id.'">'.$subcategory->name.'</li>';                  
            }else{
            $tmp_cat[$subcategory->term_id] = $subcategory->name;
            }
        }
        if(count($tmp_cat)==1){
            foreach ($tmp_cat as $cat_id => $cat_name) {
            $html.= '<li class="nav-item nav-link" role="presentation">'.$cat_name.'</li>';  
            }
        }elseif(count($tmp_cat)>1){
            $count = 0;
            $html.= '
            <li class="nav-item" role="presentation">';
            foreach ($tmp_cat as $cat_id => $cat_name) {
            $count++;
            if($count==1){
                $html.= '              <button
                class="nav-link"
                id="billboard_tab_free"
                data-bs-toggle="tab"
                data-bs-target="#billboard_free"
                type="button"
                role="tab"
                aria-controls="billboard_free"
                aria-selected="false"
            >
                '.$cat_name.'
            </button>
            <div class="dropdown">
                <button
                class="dropdown-toggle"
                type="button"
                data-bs-toggle="dropdown"
                aria-expanded="false"
                >
                <img src="'.get_template_directory_uri().'/assets/images/tab_down_arrow.png" alt="" />
                </button>

                <ul class="dropdown-menu dropdown-menu-end">';
            }else{
                $html.= '<li class="dropdown-item">'.$cat_name.'</li>';
            } 
            }
            $html.= ' </ul>
            </div>
        </li>';
        }
    } else {
        $html.= 'No subcategories found for ' . $parent_category_slug;
    }
    $html.= '</ul>';
    return $html;
}