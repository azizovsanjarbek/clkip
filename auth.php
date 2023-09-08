<?php
// Функция для авторизации пользователя
function authenticate($username, $password) {
  // Подключение к базе данных
  $link = mysqli_connect("localhost", "username", "password", "database");
  if (!$link) {
    die("Ошибка соединения: " . mysqli_error($link));
  }  
  // Получение данных из формы авторизации
  $username = mysqli_real_escape_string($link, $_POST['username']);
  $password = mysqli_real_escape_string($link, $_POST['password']);
  
  // Проверка правильности введенных данных
  if ($username == "admin" && $password == "password") {
    // Успешная авторизация
    return true;
  } else {
    // Ошибка авторизации
    return false;
  }
}
?>