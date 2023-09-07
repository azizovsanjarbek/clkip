<?php
include_once 'pass.php'; 
mb_internal_encoding("UTF-8");
$today=date("Y-m-d");

$db = mysqli_connect($localhost, $username, $password, $database);
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
$db->close();
?>
