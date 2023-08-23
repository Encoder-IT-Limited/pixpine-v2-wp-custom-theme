<div class="wrap">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?php echo get_template_directory_uri(); ?>/admin/css/style.css" rel="stylesheet" />
    <!-- <h1>Edit Subscriber</h1> -->

    <?php
    $msg = '';
    global $wpdb;
    $id = $_GET['id'];

    $table_name = $wpdb->prefix . 'pixpine_subscriptions';
    $query = "SELECT * FROM $table_name WHERE id='$id'";
    $subscription = $wpdb->get_row($query);
    
    $table_name = $wpdb->prefix . 'pixpine_subscription_payment';
    $query = "SELECT `payment_detail_id` FROM $table_name WHERE subscription_id='$subscription->id'";
    $payment_detail_ids = $wpdb->get_col($query);
    $payment_detail_ids = implode(',', $payment_detail_ids);

    
    $table_name = $wpdb->prefix . 'pixpine_payment_details';
    $query = "SELECT * FROM $table_name WHERE id IN ('$payment_detail_ids')";
    $payment_details = $wpdb->get_results($query);
    ?>

    <main>
        <div class="container">
            <div class="col-md-12">
                <div class="form_heading text-center">
                    <h1>Subscriptoin Detail: #<?php echo $_GET['id'];?></h1>
                </div>
                <p>
                    <h2>Subscriptoin</h2>
                    <b>User:</b> <?php echo $subscription->user_id;?><br>
                    <b>Plan:</b> <?php echo $subscription->subscripton_plan;?><br>
                    <b>Starting date:</b> <?php echo $subscription->starting_date;?>
                    <b>End date:</b> <?php echo $subscription->end_date;?>
                    <b>Created at:</b> <?php echo $subscription->created_at;?>
                </p>
                <br><br>
                <p>
                    <h2>Product List</h2>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Payment method: </th>
                                <th scope="col">Tnx id: </th>
                                <th scope="col">Amount: </th>
                                <th scope="col">Payment For: </th>
                                <th scope="col">created_at: </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($payment_details as $payment_detail){ ?>
                            <tr scope="row">
                                <td><?php echo $payment_detail->payment_method;?></td>
                                <td><?php echo $payment_detail->tnx_id;?></td>
                                <td><?php echo $payment_detail->amount;?></td>
                                <td><?php echo $payment_detail->payment_for;?></td>
                                <td><?php echo $payment_detail->created_at;?></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>                    
                </p>

            </div>
        </div>
    </main>
</div>