<!-- do_vhod.php 
Выполнение входа, проверка вводимых данных  -->
<?php
session_start();
require_once 'connection.php';
$login = $_POST['login'];
$pass = $_POST['pass'];
$sql = "SELECT * FROM `user` where `login` = '$login'";

$result = mysqli_query($connect, $sql);
$result = mysqli_fetch_all($result);
if (count($result) == 0 ){
    header('Location: /NOTvhod.php'); 
    exit();
    
}
header('Location: /');

?>