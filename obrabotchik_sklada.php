<?php
include_once 'pass.php'; 
mb_internal_encoding("UTF-8");
$today=date("Y-m-d");

$db = mysqli_connect($localhost, $username, $password, $database);

  //////////////////////////////////////////////////////////
 //// начало работы функции обновления прихода склада//////
//////////////////////////////////////////////////////////
$data_upload = "SELECT * FROM date_of_upload WHERE upload_date='$today'";
$data_upload_result = $db->query($data_upload );
if($data_upload_result->num_rows > 0){
  echo "файл уже импортирован";
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
   $add_upload_date="INSERT date_of_upload VALUES (NULL,'$today','$count_today_import')";
   if ($db->query($add_upload_date) === TRUE) {
     echo "New record created successfully <br><br>";
    }
     else {
       echo "Error: " . $add_upload_date . "<br>" . $db->error;
     }
  }  
}

$db->close();

/*
$new = "DELET e1 FROM employees AS e1 INNER JOIN employees as e2 WHERE e1.id<e2.id  AND e1.email = e2.email";

/* Попытка подключения к серверу MySQL. Предполагая, что вы используете MySQL
 сервер с настройкой по умолчанию (пользователь root без пароля)  
$link = mysqli_connect("localhost", "root", "", "demo");

// Проверка подключения
if ($link === false) {
    die("Ошибка подключения. " . mysqli_connect_error());
}

// Попытка выполнения запроса select
$sql = "SELECT * FROM persons WHERE first_name='john'";
if ($result = mysqli_query($link, $sql)) {
    if (mysqli_num_rows($result) > 0) {
        echo "<table>";
        echo "<tr>";
        echo "<th>id</th>";
        echo "<th>first_name</th>";
        echo "<th>last_name</th>";
        echo "<th>email</th>";
        echo "</tr>";
        while ($row = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['first_name'] . "</td>";
            echo "<td>" . $row['last_name'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        // Закрыть набор результатов
        mysqli_free_result($result);
    } else {
        echo "Записей, соответствующих вашему запросу, не найдено.";
    }
} else {
    echo "ОШИБКА: не удалось выполнить $sql. " . mysqli_error($link);
}

// Закрыть соединение
mysqli_close($link);
*/
?>