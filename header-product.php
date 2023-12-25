<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- <title>Pixpine</title> -->
    <link rel="icon" type="image/x-icon" href="<?php echo get_template_directory_uri();?>/assets/images/favicon.ico" />

    

	  <?php wp_head(); ?>


    <!-- This site is optimized with the Yoast SEO plugin v21.7 - https://yoast.com/wordpress/plugins/seo/ -->
    <?php 
    $post_id = get_free_product_post_id();
    ?>
    <title><?php echo substr(get_post_meta($post_id, '_yoast_wpseo_title', true), 0, 100); ?></title>
    <meta name="description" content="<?php echo substr(get_post_meta($post_id, '_yoast_wpseo_metadesc', true), 0, 100); ?>" class="yoast-seo-meta-tag" />
    <meta property="og:locale" content="en_US" class="yoast-seo-meta-tag" />
    <meta property="og:type" content="article" class="yoast-seo-meta-tag" />
    <meta property="og:title" content="<?php echo substr(get_post_meta($post_id, '_yoast_wpseo_title', true), 0, 100); ?>" class="yoast-seo-meta-tag" />
    <meta property="og:description" content="<?php echo substr(get_post_meta($post_id, '_yoast_wpseo_metadesc', true), 0, 100); ?>" class="yoast-seo-meta-tag" />
    <meta property="og:url" content="<?php echo $_SERVER['REQUEST_URI'];?>" class="yoast-seo-meta-tag" />
    <meta property="og:site_name" content="Pixpine" class="yoast-seo-meta-tag" />
    <meta property="article:published_time" content="2023-12-24T12:35:50+00:00" class="yoast-seo-meta-tag" />
    <meta property="article:modified_time" content="2023-12-25T04:56:10+00:00" class="yoast-seo-meta-tag" />
    <meta property="og:image" content="http://localhost/pixpine/wp-content/uploads/profile-image/pexels-samer-daboul-1003914.jpg" class="yoast-seo-meta-tag" />
    <meta property="og:image:width" content="5184" class="yoast-seo-meta-tag" />
    <meta property="og:image:height" content="3456" class="yoast-seo-meta-tag" />
    <meta property="og:image:type" content="image/jpeg" class="yoast-seo-meta-tag" />
    <meta name="author" content="admin" class="yoast-seo-meta-tag" />
    <meta name="twitter:card" content="summary_large_image" class="yoast-seo-meta-tag" />
    <meta name="twitter:label1" content="Written by" class="yoast-seo-meta-tag" />
    <meta name="twitter:data1" content="admin" class="yoast-seo-meta-tag" />
    <meta name="twitter:label2" content="Est. reading time" class="yoast-seo-meta-tag" />
    <meta name="twitter:data2" content="2 minutes" class="yoast-seo-meta-tag" />
    <script type="application/ld+json" class="yoast-schema-graph">{
        "@context": "https://schema.org",
        "@graph": [
            {
                "@type": "Article",
                "@id": "<?php echo $_SERVER['REQUEST_URI'];?>#article",
                "isPartOf": {
                    "@id": "<?php echo $_SERVER['REQUEST_URI'];?>"
                },
                "author": {
                    "name": "admin",
                    "@id": "http://localhost/pixpine/#/schema/person/d0729dd310d3708039b209cea4fb8231"
                },
                "headline": "Free No five",
                "datePublished": "2023-12-24T12:35:50+00:00",
                "dateModified": "2023-12-25T04:56:10+00:00",
                "mainEntityOfPage": {
                    "@id": "<?php echo $_SERVER['REQUEST_URI'];?>"
                },
                "wordCount": 237,
                "commentCount": 0,
                "publisher": {
                    "@id": "http://localhost/pixpine/#organization"
                },
                "image": {
                    "@id": "<?php echo $_SERVER['REQUEST_URI'];?>#primaryimage"
                },
                "thumbnailUrl": "http://localhost/pixpine/wp-content/uploads/profile-image/pexels-samer-daboul-1003914.jpg",
                "inLanguage": "en-US",
                "potentialAction": [
                    {
                        "@type": "CommentAction",
                        "name": "Comment",
                        "target": [
                            "<?php echo $_SERVER['REQUEST_URI'];?>#respond"
                        ]
                    }
                ]
            },
            {
                "@type": "WebPage",
                "@id": "<?php echo $_SERVER['REQUEST_URI'];?>",
                "url": "<?php echo $_SERVER['REQUEST_URI'];?>",
                "name": "<?php echo substr(get_post_meta($post_id, '_yoast_wpseo_title', true), 0, 100); ?>",
                "isPartOf": {
                    "@id": "http://localhost/pixpine/#website"
                },
                "primaryImageOfPage": {
                    "@id": "<?php echo $_SERVER['REQUEST_URI'];?>#primaryimage"
                },
                "image": {
                    "@id": "<?php echo $_SERVER['REQUEST_URI'];?>#primaryimage"
                },
                "thumbnailUrl": "http://localhost/pixpine/wp-content/uploads/profile-image/pexels-samer-daboul-1003914.jpg",
                "datePublished": "2023-12-24T12:35:50+00:00",
                "dateModified": "2023-12-25T04:56:10+00:00",
                "description": "<?php echo substr(get_post_meta($post_id, '_yoast_wpseo_metadesc', true), 0, 100); ?>",
                "breadcrumb": {
                    "@id": "<?php echo $_SERVER['REQUEST_URI'];?>#breadcrumb"
                },
                "inLanguage": "en-US",
                "potentialAction": [
                    {
                        "@type": "ReadAction",
                        "target": [
                            "<?php echo $_SERVER['REQUEST_URI'];?>"
                        ]
                    }
                ]
            },
            {
                "@type": "ImageObject",
                "inLanguage": "en-US",
                "@id": "<?php echo $_SERVER['REQUEST_URI'];?>#primaryimage",
                "url": "http://localhost/pixpine/wp-content/uploads/profile-image/pexels-samer-daboul-1003914.jpg",
                "contentUrl": "http://localhost/pixpine/wp-content/uploads/profile-image/pexels-samer-daboul-1003914.jpg",
                "width": 5184,
                "height": 3456
            },
            {
                "@type": "BreadcrumbList",
                "@id": "<?php echo $_SERVER['REQUEST_URI'];?>#breadcrumb",
                "itemListElement": [
                    {
                        "@type": "ListItem",
                        "position": 1,
                        "name": "Home",
                        "item": "http://localhost/pixpine/"
                    },
                    {
                        "@type": "ListItem",
                        "position": 2,
                        "name": "Free No five"
                    }
                ]
            },
            {
                "@type": "WebSite",
                "@id": "http://localhost/pixpine/#website",
                "url": "http://localhost/pixpine/",
                "name": "Pixpine",
                "description": "",
                "publisher": {
                    "@id": "http://localhost/pixpine/#organization"
                },
                "potentialAction": [
                    {
                        "@type": "SearchAction",
                        "target": {
                            "@type": "EntryPoint",
                            "urlTemplate": "http://localhost/pixpine/?s={search_term_string}"
                        },
                        "query-input": "required name=search_term_string"
                    }
                ],
                "inLanguage": "en-US"
            },
            {
                "@type": "Organization",
                "@id": "http://localhost/pixpine/#organization",
                "name": "Pixpine",
                "url": "http://localhost/pixpine/",
                "logo": {
                    "@type": "ImageObject",
                    "inLanguage": "en-US",
                    "@id": "http://localhost/pixpine/#/schema/logo/image/",
                    "url": "http://localhost/pixpine/wp-content/uploads/2023/12/premium.jpg",
                    "contentUrl": "http://localhost/pixpine/wp-content/uploads/2023/12/premium.jpg",
                    "width": 360,
                    "height": 360,
                    "caption": "Pixpine"
                },
                "image": {
                    "@id": "http://localhost/pixpine/#/schema/logo/image/"
                }
            },
            {
                "@type": "Person",
                "@id": "http://localhost/pixpine/#/schema/person/d0729dd310d3708039b209cea4fb8231",
                "name": "admin",
                "image": {
                    "@type": "ImageObject",
                    "inLanguage": "en-US",
                    "@id": "http://localhost/pixpine/#/schema/person/image/",
                    "url": "http://0.gravatar.com/avatar/64e1b8d34f425d19e1ee2ea7236d3028?s=96&d=mm&r=g",
                    "contentUrl": "http://0.gravatar.com/avatar/64e1b8d34f425d19e1ee2ea7236d3028?s=96&d=mm&r=g",
                    "caption": "admin"
                },
                "sameAs": [
                    "http://localhost/pixpine"
                ],
                "url": "http://localhost/pixpine/author/admin/"
            }
        ]
    }</script>
    <!-- / Yoast SEO plugin. -->


  </head>

  <body>

    <?php 
    // echo substr(get_post_meta(530, '_yoast_wpseo_metadesc', true), 0, 100);

    // $post_id = 530;
    // $meta_tags = get_post_meta($post_id);
    // foreach ($meta_tags as $key => $value) {
    //     echo '<strong>' . esc_html($key) . ':</strong> ' . esc_html($value[0]) . '<br>';
    // }
    ?>
<!-- Menu bar -->
<?php include get_template_directory() .'/includes/menu.php';?>