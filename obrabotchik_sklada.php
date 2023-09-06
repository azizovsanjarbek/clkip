<?php
include_once 'pass.php'; 
$db = mysqli_connect($localhost, $username, $password, $database);
$sql = "SELECT * FROM importxslx";
$result= $db->query($sql); 
 
while ($row = $result->fetch_assoc())
{
   
   echo 'Код материала: '.$row['kolichestvo'].'</br>';
  
$subsql = "SELECT * FROM main_table WHERE nomer='$row[nomer]' ";
$subresult = $db->query($subsql);
while ($subrow = $subresult->fetch_assoc())
{
   
   echo 'Код материала: '.$subrow['kolichestvo'].'</br>';
   if($subrow['kolichestvo']!=$row['kolichestvo']){
   $kol=$subrow['kolichestvo']-$row['kolichestvo'];
   $ownsql = "INSERT INTO rashod (kod_materiala, name, nomer, kolichestvo, ed_izm, cena, summa, data_prihoda, data_rashoda, sklad, upload_date) VALUES ($subrow[kod_material], 'mama', $subrow[nomer], $kol, $subrow[ed_izm], $subrow[cena], $subrow[summa], $subrow[data_prohoda], $subrow[data_prohoda], $subrow[sklad], $subrow[data_prohoda] ) ";
   $kol=0;
if ($db->query($ownsql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $ownsql . "<br>" . $db->error;
}
   }
   else{
    echo "do not work";
   }
}
}
$db->close();
?>
