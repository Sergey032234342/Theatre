<?php
session_start();
require_once 'connection.php';
$FIO = $_POST['FIO'];
$pass = $_POST['pass'];
$pass2 = $_POST['pass2'];
$login = $_POST['login'];
$sql = "SELECT count(`login`) FROM `user` where `login` = '$login' ";

if (mb_strlen($pass) < 4 || mb_strlen($pass) > 16){
    echo "неправильное число символов";
    header('Location: /NOTreg4.php');
    exit();
} else{ 
    header('Location: /');
}

if (($pass) != ($pass2) ){
    echo "пароли не совпадают";
    header('Location: /NOTreg2.php');
    exit();
} else { 
    header('Location: /');
}

 $result = mysqli_query($connect, $sql);
 $result = mysqli_fetch_all($result);
 $result = mysqli_query($connect, "SELECT * FROM `user` where `login` = '$login' ");
 $result = $result->fetch_assoc();
  if (($result) > 0 ){
     echo "Такой пользователь уже есть";
     header('Location: /NOTreg3.php');
     exit();
  }else { 
    header('Location: /');
}
 
if (preg_match('/[0-9]/', $pass) and preg_match('/[A-Z]/', $pass)) { 
    echo "";
    
      mysqli_query($connect,"INSERT INTO `user` (`FIO`, `login`, `password`) VALUES ('$FIO', '$login', '$pass')");
      header('Location: /');
     exit();
} else { 
    header('Location: /NOTreg1.php');
}

 header('Location: /');

?>