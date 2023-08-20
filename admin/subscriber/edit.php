<div class="wrap">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?php echo get_template_directory_uri(); ?>/admin/css/style.css" rel="stylesheet" />
    <!-- <h1>Edit Subscriber</h1> -->

    <?php
    $msg = '';
    global $wpdb;
    $table_name = $wpdb->prefix . 'subscribers';
    $id = $_GET['id'];
    if (isset($_POST['submit'])) {
        $user_email         = $_POST['user_email'];
        $query = "UPDATE `$table_name` SET `id`='$id',`user_email`='$user_email' WHERE id='$id'";
        $results = $wpdb->query($query);
        if($results){
            $msg = '
            <div class="alert alert-success" role="alert">
            Subscriber Updated successfully.
            </div>';
        }else{
            $msg = '
            <div class="alert alert-danger" role="alert">
            Error!! Please try again.
            </div>';
        }
        
    }    
    

    
    $query = "SELECT * FROM $table_name WHERE id='$id'";
    $row = $wpdb->get_row($query);
    $user_email = $row->user_email; 
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
                            <input type="email" name="user_email" id="" value="<?php echo $user_email;?>" required />
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