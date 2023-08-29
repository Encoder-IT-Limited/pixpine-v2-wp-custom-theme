<?php
/* Template Name: Export */
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once __DIR__ . '/vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
if($_GET['type']=='order'){
    global $wpdb;
    $table_name = $wpdb->prefix . 'pixpine_orders';
    $query = "SELECT * FROM " . $table_name;
    $search_data = $_GET['date_range'];
    if($search_data != ''){
        $search_data = explode(' - ', $search_data);
        $s_date = $search_data[0];
        $e_date = $search_data[1];
        if($s_date == $e_date){
            $query .= " WHERE created_at LIKE  '%".$s_date."%'";
        }else{
            $query .= " WHERE created_at >= '$s_date' AND created_at <= '$e_date'";
        }
    }
    
    $u_email = $_GET['u_email'];
    if($u_email != ''){
        $user_id = get_user_by('email', $u_email)->ID;       
        if($search_data != ''){
            $query .=" WHERE user_id='$user_id'";
        }else{
            $query .=" AND user_id='$user_id'";
        }
    }
    $result = $wpdb->get_results($query);

    $spreadsheet = new Spreadsheet();
    $spreadsheet->getProperties()
        ->setCreator("Your Name")
        ->setTitle("Exported Data")
        ->setDescription("Data exported from WordPress");
    $sheet = $spreadsheet->getActiveSheet();
    $sheet->setCellValue('A1', 'ID');
    $sheet->setCellValue('B1', 'User Email');
    $sheet->setCellValue('C1', 'Date');
    $i=2;
    foreach ($result as $singledata) {
        $user_detail = get_user_by("ID", $singledata->user_id);
        $sheet->setCellValue('A'.$i, $singledata->id);
        $sheet->setCellValue('B'.$i, $user_detail->user_email);
        $sheet->setCellValue('C'.$i, $singledata->created_at);
        $i++;
    }
    $writer = new Xlsx($spreadsheet);
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="order.xlsx"');
    header('Cache-Control: max-age=0');
    $writer->save('php://output');   
}elseif($_GET['type'] == 'email-subscriber'){
    $spreadsheet = new Spreadsheet();
    $spreadsheet->getProperties()
        ->setCreator("Your Name")
        ->setTitle("Exported Data")
        ->setDescription("Data exported from WordPress");
    $sheet = $spreadsheet->getActiveSheet();
    global $wpdb;
    $table_name = $wpdb->prefix . 'email_subscribers';
    $result = $wpdb->get_results("SELECT * FROM " . $table_name);
    $wpdb->query("DELETE FROM " . $table_name);
    $sheet->setCellValue('A1', 'ID');
    $sheet->setCellValue('B1', 'Email');
    $i=2;
    foreach ($result as $singledata) {
        $sheet->setCellValue('A'.$i, $singledata->id);
        $sheet->setCellValue('B'.$i, $singledata->user_email);
        $i++;
    }
    $writer = new Xlsx($spreadsheet);
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="newsletter-subscriber.xlsx"');
    header('Cache-Control: max-age=0');
    $writer->save('php://output');    
}
ob_end_flush(); ?>