<?php

 require_once('vendor/autoload.php');
// Load an .xlsx file
$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load('/sklad.xlsx');

$data = array(1,$spreadsheet->getActiveSheet()
			->toArray(null,true,true,true));

// Display the sheet content
var_dump($data);
?>

