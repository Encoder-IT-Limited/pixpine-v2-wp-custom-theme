<?php
/* Template Name: Export */
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once __DIR__ . '/vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
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
ob_end_flush(); ?>