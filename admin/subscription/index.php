<?php
ob_start();
$subscriber_table = new School_Table();
$subscriber_table->prepare_items();
$subscripton_plan = '';
if(isset($_POST['subscripton_plan'])){
    $subscripton_plan = $_POST['subscripton_plan'];
}
$u_email = '';
if(isset($_POST['u_email'])){
    $u_email = $_POST['u_email'];
}
$date_range = '';
if(isset($_POST['date_range'])){
    $date_range = $_POST['date_range'];
}


?>
<!-- End Date range picker CND -->
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<!-- End Date range picker CND -->
<link href="<?php echo get_template_directory_uri(); ?>/admin/css/style.css" rel="stylesheet" />
<div class="wrap">
    <h1>Order List</h1>
    <div id="icon-users" class="icon32"></div>
    <form method="post">
        <input type="hidden" name="page" value="School_Table" />

        <label class="search-form-label" for="subscripton_plan">Subscription Plan: </label>
        <select class="form-control" id="subscripton_plan" name="subscripton_plan">
            <option value="--">Select option</option>
            <option value="monthly" <?php ($subscripton_plan =='monthly') ? 'selected': '' ;?> >Monthly</option>
            <option value="yearly" <?php ($subscripton_plan =='yearly') ? 'selected': '' ;?> >Yearly</option>
        </select>

        <label class="search-form-label" for="u_email">Search By User Email: </label>
        <input type="email" name="u_email" id="u_email" placeholder="Enter email" value="<?php echo $u_email;?>" />

        <label class="search-form-label" for="date_range">Search By End Date Range: </label>
        <input type="text" name="date_range" id="date_range" placeholder="Enter date" value="<?php echo $date_range;?>" />

        <input type="submit" id="search-submit" class="button" name="submit" value="search">
        <?php //$subscriber_table->search_box('search', 'search_id'); ?>
    </form>
    <?php $subscriber_table->display(); ?>
</div>
<!-- End Date range picker -->
<script>
    jQuery(function() {
        jQuery('input[name="date_range"]').daterangepicker({
            // autoUpdateInput: false,
            locale: {
                format: 'YYYY-MM-DD'
            },
            opens: 'left'
        }, function(start, end, label) {
            // console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
        });
    });
</script>
<!-- End Date range picker Ends -->
<?php

// WP_List_Table is not loaded automatically so we need to load it in our application
if (!class_exists('WP_List_Table')) {
    require_once(ABSPATH . 'wp-admin/includes/class-wp-list-table.php');
}

/**
 * Create a new table class that will extend the WP_List_Table
 */
class School_Table extends WP_List_Table
{
    /**
     * Prepare the items for the table to process
     *
     * @return Void
     */
    public function prepare_items()
    {
        $columns = $this->get_columns();
        $hidden = $this->get_hidden_columns();
        $sortable = $this->get_sortable_columns();

        $data = $this->table_data();
        usort($data, array(&$this, 'sort_data'));

        $perPage = 10;
        $currentPage = $this->get_pagenum();
        $totalItems = count($data);

        $this->set_pagination_args(array(
            'total_items' => $totalItems,
            'per_page'    => $perPage
        ));

        $data = array_slice($data, (($currentPage - 1) * $perPage), $perPage);

        $this->_column_headers = array($columns, $hidden, $sortable);
        $this->items = $data;
    }

    /**
     * Override the parent columns method. Defines the columns to use in your listing table
     *
     * @return Array
     */
    public function get_columns()
    {
        $columns = array(
            'ID'                                => 'id',
            'User Email'                        => 'User Email',
            'Subscripton Plan'                  => 'Subscripton Plan',
            'Starting Date'                     => 'Starting Date',
            'End Date'                          => 'End Date',
            'Action'                            => 'Action'
        );

        return $columns;
    }

    /**
     * Define which columns are hidden
     *
     * @return Array
     */
    public function get_hidden_columns()
    {
        return array();
    }

    /**
     * Define the sortable columns
     *
     * @return Array
     */
    public function get_sortable_columns()
    {
        return array(
            'ID'                    => array('ID', false),
            'User Email'            => array('User Email', false),
            'Starting Date'         => array('Starting Date', false),
            'End Date'              => array('End Date', false),
        );
    }

    /**
     * Get the table data
     *
     * @return Array
     */
    private function table_data()
    {
        global $wpdb;

        $table_name = $wpdb->prefix . 'pixpine_subscriptions';

        if(isset($_POST['submit']) && !empty($_POST['submit'])){
            $query = "SELECT * FROM " . $table_name;
        	$search_data = $_POST['date_range'];
            if(!empty($search_data)){
                $search_data = explode(' - ', $search_data);
                $s_date = $search_data[0];
                $e_date = $search_data[1];
                if($s_date == $e_date){
                    $query .= " WHERE created_at LIKE  '%".$s_date."%'";
                }else{
                    $query .= " WHERE created_at >= '$s_date' AND created_at <= '$e_date'";
                }
            }
            
            $u_email = $_POST['u_email'];
            if(!empty($u_email)){
                $user_id = get_user_by('email', $u_email)->ID;       
                if(empty($search_data)){
                    $query .=" WHERE user_id='$user_id'";
                }else{
                    $query .=" AND user_id='$user_id'";
                }
            }

            $subscripton_plan = $_POST['subscripton_plan'];
            if ($subscripton_plan != '--') {
                if (empty($search_data) && empty($u_email)) {
                    $query .= " WHERE subscripton_plan='$subscripton_plan'";
                } else {
                    $query .= " AND subscripton_plan='$subscripton_plan'";
                }
            }



            $result = $wpdb->get_results($query);
        }else{
            $result = $wpdb->get_results("SELECT * FROM " . $table_name);
        }

        if (count($result) != 0) {
	        foreach ($result as $singledata) {
                $user_detail = get_user_by("ID", $singledata->user_id);
	            $data[] = array(
	                'ID'                                    => $singledata->id,
	                'User Email'                            => $user_detail->user_email,
	                'Subscripton Plan'                      => $singledata->subscripton_plan,
	                'Starting Date'                         => $singledata->starting_date,
	                'End Date'                              => $singledata->end_date,
	                'Action'                                => '
	                <a  href="' . admin_url() . 'admin.php?page=detail-subscription&id='.$singledata->id.'" class="button button-primary">Detail</a>'
	            );
	        }
        }else{
        	$data = [];
        }

        return $data;
    }

    /**
     * Define what data to show on each column of the table
     *
     * @param  Array $item        Data
     * @param  String $column_name - Current column name
     *
     * @return Mixed
     */
    public function column_default($item, $column_name)
    {
        switch ($column_name) {
            case 'ID':
            case 'User Email':
            case 'Subscripton Plan':
            case 'Starting Date':
            case 'End Date':
            case 'Action':
                return $item[$column_name];

            default:
                return print_r($item, true);
        }
    }

    /**
     * Allows you to sort the data by the variables set in the $_GET
     *
     * @return Mixed
     */
    private function sort_data($a, $b)
    {
        // Set defaults
        $orderby = 'ID';
        $order = 'desc';

        // If orderby is set, use this as the sort column
        if (!empty($_GET['orderby'])) {
            $orderby = $_GET['orderby'];
        }

        // If order is set use this as the order
        if (!empty($_GET['order'])) {
            $order = $_GET['order'];
        }


        $result = strnatcmp($a[$orderby], $b[$orderby]);

        if ($order === 'asc') {
            return $result;
        }

        return -$result;
    }
}