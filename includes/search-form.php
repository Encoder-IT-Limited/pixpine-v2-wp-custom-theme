<div class="form_container_main">
  <div class="inner_col">
    <form class="search_form" action="<?php echo site_url();?>">
      <input type="hidden" name="type" value="search">
      <?php
        $s_type = '';
        if(isset($_GET['cat'])){
          $s_type = $_GET['cat'];
        }
      ?>
      <div class="custom-select">
        <select name="cat" id="">
          <option value="all-categories" <?php echo ($s_type == 'all-categories')? 'selected':'';?> >All Categories</option>
          <option value="all-categories" <?php echo ($s_type == 'all-categories')? 'selected':'';?>>All Categories</option>
          <option value="free-mockup" <?php echo ($s_type == 'free-mockup')? 'selected':'';?>>Free Mockup</option>
          <option value="premium-mockup" <?php echo ($s_type == 'premium-mockup')? 'selected':'';?>>Premium Mockup</option>
          <option value="bundle-mockup" <?php echo ($s_type == 'bundle-mockup')? 'selected':'';?>>Bundle Mockups</option>
        </select>
      </div>
      <input
        type="text"
        name="s"
        id="s"
        class="placeholder_box"
        placeholder="Search for all categories"
        value="<?php the_search_query(); ?>"
      />
      <button class="search_btn">
        <img src="<?php echo get_template_directory_uri();?>/assets/images/Search.png" alt="" />
      </button>
    </form>
  </div>
  <p class="need_text">
    Couldn’t find what you need? <a href="<?php echo site_url('request');?>">Request</a>
  </p>
</div>