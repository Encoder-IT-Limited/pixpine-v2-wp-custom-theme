<?php
ob_start();
$subscriber_table = new School_Table();
$subscriber_table->prepare_items();
?>
<div class="wrap">
    <h1>Subscriber List</h1>
    <div id="icon-users" class="icon32"></div>
    <form method="post">
        <a href="<?php echo site_url('/export').'?type=email-subscriber';?>" >
            <input type="button" id="export-and-delete" class="button" name="export_and_delete" value="Export And Delete">
        </a>
        <input type="hidden" name="page" value="School_Table" />
        <?php $subscriber_table->search_box('search', 'search_id'); ?>
    </form>
    <?php $subscriber_table->display(); ?>
</div>
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
            'User Email'                              => 'User Email',
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
            'User Email'                  => array('User Email', false),
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

        $table_name = $wpdb->prefix . 'email_subscribers';

        if(isset($_POST['s']) && !empty($_POST['s'])){
        	$search_data = $_POST['s'];
            $result = $wpdb->get_results("SELECT * FROM " . $table_name. " WHERE user_email LIKE '%".$search_data."%'");
        }else{
            $result = $wpdb->get_results("SELECT * FROM " . $table_name);
        }

        if (count($result) != 0) {
	        foreach ($result as $singledata) {

	            $data[] = array(
	                'ID'                                    => $singledata->id,
	                'User Email'                            => $singledata->user_email,
	                'Action'                                => '
	                <a  href="' . admin_url() . 'admin.php?page=delete-email-subscriber&id='.$singledata->id.'" class="button button-primary">Delete</a>
	                <a  href="' . admin_url() . 'admin.php?page=edit-email-subscriber&id='.$singledata->id.'" class="button button-primary">Edit</a>'
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
        $orderby = 'User Email';
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