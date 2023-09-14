<?php
require_once('vendor/autoload.php');
$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load('sklad.xlsx');

$data = array(1,$spreadsheet->getActiveSheet()
			->toArray(null,true,true,true));

			//var_export($data);

echo count($data[1])."<br/>";
echo count($data[1][1]);
?>

