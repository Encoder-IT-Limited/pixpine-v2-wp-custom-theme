<?php
ob_start();
$school_table = new Class_Table();
$school_table->prepare_items();
?>
<!-- Date range picker CND -->
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<!-- Date range picker CND -->
<link href="<?php echo get_template_directory_uri(); ?>/admin/css/style.css" rel="stylesheet" />

<div class="wrap">
    <h1>Payment method List</h1>
    <div id="icon-users" class="icon32"></div>
    <form method="post">
        <input type="hidden" name="page" value="School_Table" />
        <label class="search-form-label" for="payment_for">Search By Payment For: </label>
        <select class="form-control" id="payment_for" name="payment_for">
            <option value="--">Select option</option>
            <option value="product">Product</option>
            <option value="subscription">Subscription</option>
        </select>

        <label class="search-form-label" for="date_range">Search By Date Range: </label>
        <input type="text" name="date_range" id="date_range" placeholder="Enter date" />

        <input type="submit" id="search-submit" class="button" name="submit" value="search">
        <?php //$subscriber_table->search_box('search', 'search_id'); ?>
    </form>
    <?php $school_table->display(); ?>
</div>
<!-- Date range picker -->
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
<!-- Date range picker Ends -->
<?php

// WP_List_Table is not loaded automatically so we need to load it in our application
if (!class_exists('WP_List_Table')) {
    require_once(ABSPATH . 'wp-admin/includes/class-wp-list-table.php');
}

/**
 * Create a new table class that will extend the WP_List_Table
 */
class Class_Table extends WP_List_Table
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
            'ID'                                => 'ID',
            'Payment method'                             => 'Payment method',
            'Tnx id'                             => 'Tnx id',
            'Amount'                           => 'Amount',
            'Payment for'                         => 'Payment for',
            'Created at'                         => 'Created at',
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
            'Payment method'                 => array('Payment method', false),
            'Tnx id'                  => array('Tnx id', false),
            'Amount'                  => array('Amount', false),
            'Payment for'             => array('Payment for', false),
            'Created at'             => array('Created at', false),
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

        $table_name = $wpdb->prefix . 'pixpine_payment_details';

        if (isset($_POST['submit']) && !empty($_POST['submit'])) {
            $query = "SELECT * FROM " . $table_name;
            $search_data = $_POST['date_range'];
            if (!empty($search_data)) {
                $search_data = explode(' - ', $search_data);
                $s_date = $search_data[0];
                $e_date = $search_data[1];
                if ($s_date == $e_date) {
                    $query .= " WHERE created_at LIKE  '%" . $s_date . "%'";
                } else {
                    $query .= " WHERE created_at >= '$s_date' AND created_at <= '$e_date'";
                }
            }

            $payment_for = $_POST['payment_for'];
            if ($payment_for != '--') {
                if (empty($search_data)) {
                    $query .= " WHERE payment_for='$payment_for'";
                } else {
                    $query .= " AND payment_for='$payment_for'";
                }
            }

            $result = $wpdb->get_results($query);
        } else {
            $result = $wpdb->get_results("SELECT * FROM " . $table_name);
        }

        if (count($result) != 0) {
            foreach ($result as $singledata) {
                $data[] = array(
                    'ID'                            => $singledata->id,
                    'Payment method'                => $singledata->payment_method,
                    'Tnx id'                        => $singledata->tnx_id,
                    'Amount'                        => $singledata->amount,
                    'Payment for'                   => $singledata->payment_for,
                    'Created at'                    => $singledata->created_at,
                    'Action'                        => '
	                <a  href="' . admin_url() . 'admin.php?page=create-parents&type=delete&id=' . $singledata->id . '" class="button button-primary">Delete</a>
	                <a  href="' . admin_url() . 'admin.php?page=create-parents&type=edit&id=' . $singledata->id . '" class="button button-primary">Edit</a>'
                );
            }
        } else {
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
            case 'Payment method':
            case 'Tnx id':
            case 'Amount':
            case 'Payment for':
            case 'Created at':
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
        $order = 'asc';

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
