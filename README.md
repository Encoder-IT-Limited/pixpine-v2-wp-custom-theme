Field for product meta:
     General names                    Key
1. Personal & Commercial Price        personal_commercial_price
2. Extended License Price             extended_license_price
3. Download link                      download_link
4. gallery images                     _custom_product_gallery


Must have Mockup categories:
1. Premium Mockups
2. Bundle Mockups
3. Free Mockups

Search:
Cat: <a href="<?php echo site_url();?>?cat=premium-mockup&type=category&term-name=<?php echo $current_category_name;?>&s=">
Tag: <a href="<?php echo site_url().'?cat=premium-mockup&type=tag&tag-name='.$tag->name.'&s=';?>"><?php echo $tag->name;?></a>