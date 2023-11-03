<?php
ob_start();

$pixpine_home_cat = '';
if(isset($_POST['pixpine_home_cat'])){
    $pixpine_home_cat = $_POST['pixpine_home_cat'];
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