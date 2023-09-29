<?php
include_once 'pass.php'; 
mb_internal_encoding("UTF-8");

$today=date("Y-m-d");
$tomorrow = date("Y-m-d", mktime(0, 0, 0, date("m"), date("d")-1, date("Y")));

$db = mysqli_connect($localhost, $username, $password, $database);

  //////////////////////////////////////////////////////////
 //// добавление новых данных в главную таблицу////////////
//////////////////////////////////////////////////////////

$data_upload = "SELECT * FROM date_of_upload WHERE upload_date='$today' and name_table LIKE 'main_table'";
$data_upload_result = $db->query($data_upload );
if($data_upload_result->num_rows > 0){
  echo "файл уже импортирован <br>";
}
else{
  $prihod_sql = "SELECT * FROM importxslx";
  $prihod_result= $db->query($prihod_sql);
  $count_today_import=$prihod_result->num_rows;

  if($prihod_result->num_rows > 0) {
  while($row = $prihod_result->fetch_assoc()) {
  //  echo "id: " . $row["nomer"]. " - Name: " . $row["name"]. " --- " . $row["data_pri"].  " --- " . $row["sklad"]. " --- " . $row["cena"]."<br>";
   $add_sql = "insert main_table VALUE ( NULL,'$row[kod_material]', '".addslashes($row["name"])."', '$row[nomer]' , '$row[kolichestvo]', '$row[ed_izm]' , '$row[cena]' , '$row[summa]' , '$row[bez_dvij]', '$row[data_pri]' , '$row[data_ras]' , '$row[kod_bso]' , '$row[kod_oau1]', '$row[kod_oau2]', '$row[bso]', '$row[kod_sklada]', '$row[sklad]', '$row[balance]', '$row[sklad2]', '$row[ploshadka]', '$row[data_izm_zap]', '$row[pol_izm_zap]', '$row[data_create_zap]' , '$row[pol_create_zap]', '$row[TMS_SPECIALITY]','$today' )";
   if ($db->query($add_sql) === TRUE) {
    echo "New record created successfully <br><br>";
   }
    else {
      echo "Error: " . $add_sql . "<br>" . $db->error;
    }
   }
   $add_upload_date="INSERT date_of_upload VALUES (NULL,'$today','$count_today_import','main_table')";
   if ($db->query($add_upload_date) === TRUE) {
     echo "New record created successfully <br><br>";
    }
     else {
       echo "Error: " . $add_upload_date . "<br>" . $db->error;
     }
  }  
}
  ////////////////////////////////////////////////////////////
 /////////проверка приход на изменние данных вчера и сегодня////////
////////////////////////////////////////////////////////////
$prihod_data_upload = "SELECT * FROM date_of_upload WHERE upload_date='$today' and name_table LIKE 'prihod' ";
$prihod_data_upload_result = $db->query($prihod_data_upload );
if($prihod_data_upload_result->num_rows > 0){

  echo "Данные для прихода уже обновлены <br/>";

}
else{
$prihod_contol = "SELECT * FROM importxslx";
$prihod_contol_result= $db->query($prihod_contol);
if($prihod_contol_result->num_rows > 0) {
while($prihod_contol_row = $prihod_contol_result->fetch_assoc()) {

$prihod_update = "SELECT * FROM main_table WHERE nomer = '$prihod_contol_row[nomer]' and cena LIKE '$prihod_contol_row[cena]' and data_pri LIKE '$prihod_contol_row[data_pri]' and sklad LIKE '$prihod_contol_row[sklad]' and data_create_zap LIKE '$prihod_contol_row[data_create_zap]' and pol_create_zap LIKE '$prihod_contol_row[pol_create_zap]' and data_izm_zap LIKE '$prihod_contol_row[data_izm_zap]' and UPLOAD_DATE >= '$tomorrow'";
$prihod_update_result = $db->query($prihod_update);
if($prihod_update_result->num_rows == 2){
  echo "все хорошо <br/>";
}
elseif($prihod_update_result->num_rows == 1){

  $add_prihod = "INSERT prihod VALUES (NULL,'$prihod_contol_row[kod_material]','$prihod_contol_row[name]','$prihod_contol_row[nomer]','$prihod_contol_row[kolichestvo]','$prihod_contol_row[ed_izm]','$prihod_contol_row[cena]','$prihod_contol_row[summa]','$prihod_contol_row[data_pri]','$prihod_contol_row[sklad]','$prihod_contol_row[data_create_zap]','$today')";
  $db->query($add_prihod);
  //echo "id ".$prihod_contol_row["nomer"]." name -".$prihod_contol_row["name"]." cena -".$prihod_contol_row["cena"]." data_pri -".$prihod_contol_row["data_pri"]." kto sozdal -".$prihod_contol_row["pol_create_zap"]." kto sozdal -".$prihod_contol_row["data_izm_zap"]."<br/>";
}
else{
  echo "Ошибка <br/>";// необходимо создать таблицу для ошибок
}
}
$add_prihod_upload_date="INSERT date_of_upload VALUES (NULL,'$today','11','prihod')";
if ($db->query($add_prihod_upload_date) === TRUE) {
  echo "New record created successfully <br><br>";
 }
  else {
    echo "Error: " . $add_prihod_upload_date . "<br>" . $db->error;
  }
}
else{
  echo "Данные для прихода не удалось получить <br/>";
}  
}
  ////////////////////////////////////////////////////////////
 //проверка расхода на изменение данных вчера и сегодня//////
////////////////////////////////////////////////////////////
$rashod_data_upload = "SELECT * FROM date_of_upload WHERE upload_date='$today' and name_table LIKE 'rashod' ";
$rashod_data_upload_result = $db->query($rashod_data_upload );
if($rashod_data_upload_result->num_rows > 0){
 echo "нет данных";
}
else{

$rashod_sql = "SELECT * FROM main_table WHERE UPLOAD_DATE='2023-09-28'";
$rashod_result= $db->query($rashod_sql);
if($rashod_result->num_rows > 0) {
  while($rashod_result_row = $rashod_result->fetch_assoc()) {
    //echo $rashod_result_row["name"]."<br/>";
    $rashod_update ="SELECT * FROM importxslx WHERE nomer='$rashod_result_row[nomer]' and cena LIKE '$rashod_result_row[cena]' and data_pri LIKE '$rashod_result_row[data_pri]' and sklad LIKE '$rashod_result_row[sklad]' and data_create_zap LIKE '$rashod_result_row[data_create_zap]' and pol_create_zap LIKE '$rashod_result_row[pol_create_zap]'";
    $rashod_update_result = $db->query($rashod_update);
    if($rashod_update_result->num_rows == 1){
      while($rashod_update_result_row= $rashod_update_result->fetch_assoc()){
        if($rashod_update_result_row['kolichestvo']==$rashod_result_row['kolichestvo']){
          continue;
        }
        else{

          $add_rashod = "INSERT rashod VALUES (NULL,'$rashod_update_result_row[kod_material]','$rashod_update_result_row[name]','$rashod_update_result_row[nomer]','$rashod_update_result_row[kolichestvo]','$rashod_update_result_row[ed_izm]','$rashod_update_result_row[cena]','$rashod_update_result_row[summa]','$rashod_update_result_row[data_pri]','$rashod_update_result_row[sklad]','$rashod_update_result_row[data_create_zap]','$today')";
          $db->query($add_rashod);

        $rashod_result_row['kolichestvo']-$rashod_update_result_row['kolichestvo']." опа опа оппапа<br/>";
        }    
      }  
    }
    else{
      //проверка изменения даты, если одинакове хорошо, если разные сначало отсортировать с по количеству потом отнять любой 
      echo "XML_ID".$rashod_result_row['nomer']." -- Тут есть информация для мозга <br/>";
    }
  }
}
else{
  echo "Нет данных";
}
}

//echo "id: " . $prihod_contol_row["nomer"]. " - Name: " . $prihod_contol_row["name"]. " --- " . $prihod_contol_row["data_pri"].  " --- " . $prihod_contol_row["sklad"]. " --- " . $prihod_contol_row["cena"]."<br>";

$db->close();


?>