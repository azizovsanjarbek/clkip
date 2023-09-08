<?
include_once 'pass.php';
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
  $all_sum_ostatok= "SELECT * FROM prihod";
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


?>

