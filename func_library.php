<?
include_once 'pass.php';
$day=date('d');
$monthly=date('m');
$year=date('Y');
// функция создания месяцев для 
function month($number_of_month)
{
    $arr = [
        'январь',
        'февраль',
        'март',
        'апрель',
        'май',
        'июнь',
        'июль',
        'август',
        'сентябрь',
        'октябрь',
        'ноябрь',
        'декабрь'
      ];    
      
      $month = $number_of_month-1;
      echo $arr[$month];
};
  ////////////////////////////////////////////////////////
 //////////////общий расход//////////////////////////////
////////////////////////////////////////////////////////
$conn_rashod = new mysqli("localhost","root","",$database);
// Check connection
if ($conn_rashod->connect_error) {
die("Connection failed: " . $conn_rashod->connect_error);
}   
  $all_sum_rashod= "SELECT * FROM rashod";
  $all_sum_result_rashod = $conn_rashod->query($all_sum_rashod);
  $all_sum_value_rashod = 0;
  //Вывод общего расхода за период
  if ($all_sum_result_rashod->num_rows > 0) {
    // output data of each row    
    while($all_sum_row_rashod = $all_sum_result_rashod->fetch_assoc()) {
    $all_sum_value_rashod=$all_sum_value_rashod+$all_sum_row_rashod["summa"];
    }
  } else {
    echo "Данные загружаются";
  }   
$conn_rashod->close();
  ////////////////////////////////////////////////////////
 //////////////общий приход//////////////////////////////
////////////////////////////////////////////////////////
$conn_prihod = new mysqli("localhost","root","",$database);
// Check connection
if ($conn_prihod->connect_error) {
die("Connection failed: " . $conn_prihod->connect_error);
}   
  $all_sum_prihod= "SELECT * FROM prihod";
  $all_sum_result_prihod = $conn_prihod->query($all_sum_prihod);
  $all_sum_value_prihod = 0;
//Вывод общего расхода за период

  if ($all_sum_result_prihod->num_rows > 0) {
    // output data of each row
    while($all_sum_row_prihod = $all_sum_result_prihod->fetch_assoc()) {
    $all_sum_value_prihod=$all_sum_value_prihod+$all_sum_row_prihod["summa"];
    }
  } else {
    echo "Данные загружаются";
  }   
$conn_prihod->close();
  ////////////////////////////////////////////////////////
 //////////////общий остаток/////////////////////////////
////////////////////////////////////////////////////////
$conn_ostatok = new mysqli("localhost","root","",$database);
// Check connection
if ($conn_ostatok->connect_error) {
die("Connection failed: " . $conn_ostatok->connect_error);
}   
  $all_sum_ostatok= "SELECT * FROM main_table";
  $all_sum_result_ostatok = $conn_ostatok->query($all_sum_ostatok);
  $all_sum_value_ostatok = 0;
//Вывод общего расхода за период

  if ($all_sum_result_ostatok->num_rows > 0) {
    // output data of each row
    while($all_sum_row_ostatok = $all_sum_result_ostatok->fetch_assoc()) {
    $all_sum_value_ostatok=$all_sum_value_ostatok+$all_sum_row_ostatok["summa"];
    }
  } else {
    echo "Данные загружаются";
  }   
$conn_ostatok->close();
  ////////////////////////////////////////////////////////
 //////////////Вывод ежедневных расходов/////////////////
////////////////////////////////////////////////////////
$conn_rashod_daily = new mysqli("localhost","root","",$database);
//проверка соединения базон данных
if ($conn_rashod_daily->connect_error) {
die("Connection failed: " . $conn_rashod_daily->connect_error);
}   
for($i=1;$day>$i; $i++){
  if($i<10){
    $all_sum_rashod_daily= "SELECT * FROM rashod WHERE upload_date='$year-$monthly-0$i'";
  }
  else{
    $all_sum_rashod_daily= "SELECT * FROM rashod WHERE upload_date='$year-$monthly-$i'";
  } 
  $all_sum_result_rashod_daily = $conn_rashod_daily->query($all_sum_rashod_daily);
  $all_sum_value_rashod_daily = 0;
  //Вывод общего расхода за период
  if ($all_sum_result_rashod_daily->num_rows > 0) {
    // output data of each row    
    while($all_sum_row_rashod_daily = $all_sum_result_rashod_daily->fetch_assoc()) {
    $all_sum_value_rashod_daily=$all_sum_value_rashod_daily+$all_sum_row_rashod_daily["summa"];
    }
  }; 
  $array[] = $all_sum_value_rashod_daily;
}   
$conn_rashod_daily->close();
$newdata = json_encode($array);

for($j=1;$day>$j; $j++){
  $date_array[]=$j."/".$monthly;
}
$new_date_array = json_encode($date_array);
?>

