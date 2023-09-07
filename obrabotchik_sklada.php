<?php
include_once 'pass.php'; 
mb_internal_encoding("UTF-8");
$today=date("Y-m-d");

$db = mysqli_connect($localhost, $username, $password, $database);
  //////////////////////////////////////////////////////////
 //// начало работы функции обновления расхода склада//////
//////////////////////////////////////////////////////////
$sql = "SELECT * FROM importxslx";
$result= $db->query($sql);  
while ($row = $result->fetch_assoc())
{   
   echo 'Код материала: '.$row['kolichestvo'] .'</br>';  
$subsql = "SELECT * FROM main_table WHERE nomer='$row[nomer]' ";
$subresult = $db->query($subsql);
while ($subrow = $subresult->fetch_assoc())
{
   
   echo 'Код материала: '.$subrow['kolichestvo'].'</br>';
   if($subrow['kolichestvo']!=$row['kolichestvo']){
   $kol=$subrow['kolichestvo']-$row['kolichestvo'];
   $summa=$kol*$subrow['cena']; 
   // добавление данных в таблицу расходов
   if($subrow['data_rashoda']=""){
    
   $ownsql = "INSERT INTO rashod (kod_materiala, name, nomer, kolichestvo, ed_izm, cena, summa, data_prihoda, data_rashoda, sklad, upload_date) VALUES ($subrow[kod_material],  '$subrow[name]', $subrow[nomer], $kol, '$subrow[ed_izm]', $subrow[cena], $summa, '$subrow[data_prohoda]', '$row[data_ras]', $subrow[sklad], '$today' ) ";
             }
         else{
   $ownsql = "INSERT INTO rashod (kod_materiala, name, nomer, kolichestvo, ed_izm, cena, summa, data_prihoda, data_rashoda, sklad, upload_date) VALUES ($subrow[kod_material],  '$subrow[name]', $subrow[nomer], $kol, '$subrow[ed_izm]', $subrow[cena], $summa, '$subrow[data_prohoda]', '$subrow[data_rashoda]', $subrow[sklad], '$today' ) ";
             }
   $ownsql1 = "UPDATE main_table SET kolichestvo = '$row[kolichestvo]', summa = '$row[summa]' WHERE nomer = '$subrow[nomer]'"; 
   $kol=0;
   $summa=0;
   // добавление данных в главная таблицу 
   
         if ($db->query($ownsql) === TRUE) {
               echo "New record created successfully</br></br>";
         } else {
            echo "Error: " . $ownsql . "<br>" . $db->error."</br></br>";
         }
         $db->query($ownsql1);

   }
         else{
             echo "Количество наменклатуры не изменилось </br></br>";
            }
   }
}
  //////////////////////////////////////////////////////////
 //// начало работы функции обновления прихода склада//////
//////////////////////////////////////////////////////////
$prihod_sql = "SELECT * FROM importxslx";
$prihod_result= $db->query($prihod_sql);  
while ($prihodrow = $prihod_result->fetch_assoc())
{   
   echo $prihodrow['name']."<br/>";
   echo $prihodrow['nomer']."<br/>";
   $sub_prihod_sql = $db->query("SELECT count(*) FROM main_table WHERE nomer='$prihodrow[nomer]' ");
   $sub_prihod_sql_row = $sub_prihod_sql->fetch_row();
   if($sub_prihod_sql_row[0]==0){

      //Добавление данных о приходе в  таблицу прихода
      echo "need to add a new record<br/>";
      $prihodsql = "INSERT INTO prihod (kod_materiala, name, nomer, kolichestvo, ed_izm, cena, summa, data_prihoda, sklad, data_sozdaniya, upload_date) VALUES ($prihodrow[kod_material],  '$prihodrow[name]', $prihodrow[nomer], $prihodrow[kolichestvo], '$prihodrow[ed_izm]', $prihodrow[cena], $prihodrow[summa], '$prihodrow[data_prihoda]', $prihodrow[sklad], '$prihodrow[data_sozdaniya]', '$today' ) ";
      
      if ($db->query($prihodsql) === TRUE) {
         echo "New record created successfully</br></br>";
   } else {
      echo "Error: " . $prihodsql . "<br>" . $db->error."</br></br>";
   }  
   //Добавление данных о приходе в главную таблицу 
      $prihod_main_table ="INSERT INTO main_table (kod_material, name, nomer, kolichestvo, ed_izm, cena, summa, mesyacy_bez_dvij, data_prohoda, data_rashoda, kod_bso, kod_oau1, kod_oau2, bso, kod_sklada, sklad, priznak_balansa_ucheta, sklad2, ploshadka, data_izm_zapisi, pol_izm_zapisi, data_create_zapis, pol_create_zapis,TMS_SPECIALITY ) VALUES ($prihodrow[kod_material],  '$prihodrow[name]', $prihodrow[nomer], $prihodrow[kolichestvo], '$prihodrow[ed_izm]', $prihodrow[cena], $prihodrow[summa], '$prihodrow[bez_dvij]', '$prihodrow[data_pri]','$prihodrow[data_ras]','$prihodrow[kod_bso]','$prihodrow[kod_oau1]','$prihodrow[kod_oau2]','$prihodrow[bso]','$prihodrow[kod_sklada]','$prihodrow[sklad]','$prihodrow[balance]','$prihodrow[sklad2]',$prihodrow[ploshadka], '$prihodrow[data_izm_zap]','$prihodrow[pol_izm_zap]','$prihodrow[data_create_zap]','$prihodrow[pol_create_zap]',  '$prihodrow[TMS_SPECIALITY]' ) ";
      if ($db->query($prihod_main_table) === TRUE) {
         echo "New record created successfully</br></br>";
   } else {
      echo "Error: " . $prihod_main_table . "<br>" . $db->error."</br></br>";
   }  

   }
   else{
      echo "need to skip<br/>";
   }
   }
$db->close();
?>
