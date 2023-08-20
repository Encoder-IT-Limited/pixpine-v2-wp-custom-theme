<div class="wrap">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?php echo get_template_directory_uri(); ?>/admin/css/style.css" rel="stylesheet" />
    <!-- <h1>Create Subscriber</h1> -->

    <?php
    $msg = '';
    if (isset($_POST['submit'])) {
        $user_email         = $_POST['user_email'];

        global $wpdb;
        $table_name = $wpdb->prefix . 'subscribers';
        $query = "SELECT COUNT(*) FROM $table_name WHERE user_email = '$user_email'";

        // Retrieve the count
        $count = $wpdb->get_var($query);
        // Process the count result
        if ($count != 0) {
            // Count retrieval was successful
            $msg = '
                <div class="alert alert-danger" role="alert">
                Subscriber name already exists.
                </div>';
        } else {
            // Count retrieval failed
            $error_message = $wpdb->last_error;
            $query = "INSERT INTO `$table_name`(`user_email`) VALUES ('$user_email')";
            $results = $wpdb->query($query);
            if($results){
                $msg = '
                <div class="alert alert-success" role="alert">
                Subscriber Added successfully.
                </div>';
            }else{
                $msg = '
                <div class="alert alert-danger" role="alert">
                Error!! Please try again.
                </div>';
            }
        }
    }

    ?>

    <main>
        <section class="form_section">
            <div class="container">
                <div class="form_column form_small_width">
                    <form action="#" method="post">
                        <div class="form_heading text-center">
                            <h1>Create Subscriber</h1>
                            <p><?php echo $msg;?></p>
                        </div>
                        <div class="input_gorup">
                            <label for="">Subscriber Email</label>
                            <input type="email" name="user_email" id="" required />
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