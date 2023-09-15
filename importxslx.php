<?php
include_once 'pass.php';
require_once('vendor/autoload.php');
$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load('sklad.xlsx');

$data = array(1,$spreadsheet->getActiveSheet()
			->toArray(null,true,true,true));

			//var_export($data);

$import_db = mysqli_connect($localhost, $username, $password, $database);
$col_data = count($data[1]);
for($i=3; $col_data>$i; $i++){

	$import_sql = "INSERT INTO importxslx (kod_material, name, nomer, kolichestvo, ed_izm, cena, summa, bez_dvij, data_pri, data_ras, kod_bso, kod_oau1, kod_oau2, bso, kod_sklada, sklad, balance, sklad2, ploshadka, data_izm_zap, pol_izm_zap, data_create_zap, pol_create_zap,TMS_SPECIALITY) VALUES ('".
	$data[1][$i]['A']."','".addslashes($data[1][$i]['B'])."','".$data[1][$i]['C']."','".$data[1][$i]['D']."','".$data[1][$i]['E']."','".$data[1][$i]['F']."','".$data[1][$i]['G']."','".$data[1][$i]['H']."','".$data[1][$i]['I']."','".$data[1][$i]['J']."','".$data[1][$i]['K']."','".$data[1][$i]['L']."','".$data[1][$i]['M']."','".$data[1][$i]['N']."','".$data[1][$i]['O']."','".$data[1][$i]['P']."','".$data[1][$i]['Q']."','".$data[1][$i]['R']."','".$data[1][$i]['S']."','".$data[1][$i]['T']."','".$data[1][$i]['U']."','".$data[1][$i]['V']."','".$data[1][$i]['W']."','".$data[1][$i]['X']."') ";
// добавление данных в главная таблицу 
	if ($import_db->query($import_sql) === TRUE) {
				echo "New record created successfully ".($i-2)."</br></br>";
    } else {
			 echo "Error: " . $import_sql . "<br>" . $import_db->error."</br></br>";
		  }
	}
	
	$import_db->close();
?>
