<?php
include_once 'pass.php';

$conn_login= mysqli_connect($localhost,$username,$password,$database);
// Check connection
if ($conn_login->connect_error) {
die("Connection failed: " . $conn_login->connect_error);
}   

$login = $_POST['login'];
$pass = $_POST['pass'];
if(empty($login)||empty($pass))
{
    header('Location:/auth.php');  
}
else{
    $login_sql="SELECT * FROM user WHERE name = '$login' AND password='$pass'";
    $login_result=$conn_login->query($login_sql);
    if($login_result->num_rows > 0){
        setcookie('login',$login,0,"/");
        header('Location:/');
die();
        while($login_row = $login_result ->fetch_assoc()){            
        echo "Добро пожаловать ".$login_row['name'];
    }
    }
    else{
        header('Location:/auth.php');        
    }
    
}
?>