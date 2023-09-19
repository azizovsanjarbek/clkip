<?php
include_once 'pass.php'; 
mb_internal_encoding("UTF-8");
$today=date("Y-m-d");

$db = mysqli_connect($localhost, $username, $password, $database);

  //////////////////////////////////////////////////////////
 //// начало работы функции обновления прихода склада//////
//////////////////////////////////////////////////////////

$prihod_sql = "SELECT * FROM importxslx";
$prihod_result= $db->query($prihod_sql);

if($prihod_result->num_rows > 0) {

while($row = $prihod_result->fetch_assoc()) {
  //  echo "id: " . $row["nomer"]. " - Name: " . $row["name"]. " --- " . $row["data_pri"].  " --- " . $row["sklad"]. " --- " . $row["cena"]."<br>";
   $add_sql = "insert main_table VALUE ('$row[kod_material]', '".addslashes($row["name"])."', '$row[nomer]' , '$row[kolichestvo]', '$row[ed_izm]' , '$row[cena]' , '$row[summa]' , '$row[bez_dvij]', '$row[data_pri]' , '$row[data_ras]' , '$row[kod_bso]' , '$row[kod_oau1]', '$row[kod_oau2]', '$row[bso]', '$row[kod_sklada]', '$row[sklad]', '$row[balance]', '$row[sklad2]', '$row[ploshadka]', '$row[data_izm_zap]', '$row[pol_izm_zap]', '$row[data_create_zap]' , '$row[pol_create_zap]', '$row[TMS_SPECIALITY]' )";
   if ($db->query($add_sql) === TRUE) {
  echo "New record created successfully <br><br>";
 }
 else {
  echo "Error: " . $add_sql . "<br>" . $db->error;
    }


}
   
}


$db->close();