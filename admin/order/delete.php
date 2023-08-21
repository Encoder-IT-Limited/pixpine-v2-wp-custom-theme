<?php
ob_start();
global $wpdb;
$table_name = $wpdb->prefix . 'email_subscribers';
$id = $_GET['id'];
$query = "DELETE FROM `$table_name` WHERE `id`='$id'";
$results = $wpdb->query($query);
$url = $_SERVER['HTTP_REFERER'];
if($results){
    $msg = '
    <div class="alert alert-success" role="alert">
    Subscriber deleted successfully.
    <a href="'.$url.'" type="button" class="btn btn-success btn-sm">Go back to email subscriber list</a>
    </div>';
}else{
    $msg = '
    <div class="alert alert-danger" role="alert">
    Error!! Please try again.
    <a href="'.$url.'" type="button" class="btn btn-danger btn-sm">Go back to email subscriber list</a>
    </div>';
}
?>
<div class="wrap">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
<link href="<?php echo get_template_directory_uri(); ?>/admin/css/style.css" rel="stylesheet" />
<h1>Email Subscriber Delete</h1>
    <?php echo $msg;?>
</div>
