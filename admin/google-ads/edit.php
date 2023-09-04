<div class="wrap">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?php echo get_template_directory_uri(); ?>/admin/css/style.css" rel="stylesheet" />
    <!-- <h1>Edit Subscriber</h1> -->

    <?php
    $msg = '';
    global $wpdb;
    if (isset($_POST['submit'])) {

        $google_add_1 = $_POST['google_add_1'];
        $google_add_2 = $_POST['google_add_2'];
        $google_add_3 = $_POST['google_add_3'];

        update_option('google_add_1', $google_add_1);
        update_option('google_add_2', $google_add_2);
        update_option('google_add_3', $google_add_3);

        $msg = '
            <div class="alert alert-success" role="alert">
            Updated is successful.
            </div>';
        
    }    
    
    $google_add_1 = get_option('google_add_1', '');
    $google_add_2 = get_option('google_add_2', '');
    $google_add_3 = get_option('google_add_3', '');
    ?>

    <main>
        <section class="form_section">
            <div class="container">
                <div class="form_column form_small_width">
                    <form action="#" method="post">
                        <div class="form_heading text-center">
                            <h1>Update Google Ads</h1>
                            <p><?php echo $msg;?></p>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Google Ad #1</label>
                            <textarea name="google_add_1" class="form-control" id="exampleFormControlTextarea1" rows="3"><?php echo $google_add_1;?></textarea>
                        </div>
                        
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Google Ad #2</label>
                            <textarea name="google_add_2" class="form-control" id="exampleFormControlTextarea1" rows="3"><?php echo $google_add_2;?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Google Ad #3  </label>
                            <textarea name="google_add_3" class="form-control" id="exampleFormControlTextarea1" rows="3"><?php echo $google_add_3;?></textarea>
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