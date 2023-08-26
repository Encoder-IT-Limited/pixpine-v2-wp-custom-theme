<div class="wrap">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?php echo get_template_directory_uri(); ?>/admin/css/style.css" rel="stylesheet" />
    <!-- <h3>Edit Subscriber</h3> -->

    <?php
    $msg = '';
    global $wpdb;
    $id = $_GET['id'];

    $table_name = $wpdb->prefix . 'pixpine_orders';
    $query = "SELECT * FROM $table_name WHERE id='$id'";
    $order = $wpdb->get_row($query);
    
    $table_name = $wpdb->prefix . 'pixpine_payment_details';
    $query = "SELECT * FROM $table_name WHERE id='$order->pixpine_payment_detail_id'";
    $payment_detail = $wpdb->get_row($query);

    
    $table_name = $wpdb->prefix . 'pixpine_order_items';
    $query = "SELECT * FROM $table_name WHERE pixpine_order_id='$id'";
    $products = $wpdb->get_results($query);
    ?>

    <main>
        <div class="container">
            <div class="col-md-12">
                <div class="form_heading text-center">
                    <h1>Order Detail: #<?php echo $_GET['id'];?></h1>
                </div>

                <p>
                    <h3>Order</h3>
                    <b>Price:</b> <?php echo $order->total_price;?><br>
                    <b>Date:</b> <?php echo $order->created_at;?>
                </p>

                <p>
                    <h3>User</h3>
                    <b>ID:</b> <?php echo $order->user_id;?><br>
                    <b>Email:</b> <?php echo get_user_by('ID', $order->user_id)->user_email;?>
                </p>

                <p>
                    <h3>Payment Detail</h3>
                    <b>Payment method: </b><?php echo $payment_detail->payment_method;?><br>
                    <b>Tnx id: </b><?php echo $payment_detail->tnx_id;?><br>
                    <b>Amount: </b><?php echo $payment_detail->amount;?><br>
                    <b>Payment For: </b><?php echo $payment_detail->payment_for;?><br>
                    <b>created_at: </b><?php echo $payment_detail->created_at;?><br>
                    <b>Price: </b> <?php echo $order->total_price;?><br>
                    <b>Date: </b> <?php echo $order->created_at;?>
                </p>
              
                <p>
                    <h3>Product List</h3>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Product</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($products as $product){
                                $product->product_id.'<br>';
                                $product_detail = get_post($product->product_id);
                            ?>
                            <tr scope="row">
                                <td><?php echo $product->product_id;?></td>
                                <td><?php echo $product_detail->post_name?></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>                    
                </p>

            </div>
        </div>
    </main>
</div>