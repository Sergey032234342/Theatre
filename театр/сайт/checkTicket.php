<!-- chachnagr.php
файл выполнения поиска и вывода информации о нагрузке преподавателя -->
<?php
require_once 'connection.php';
$FIO = $_POST['FIO_prepod'];
$rres = "SELECT sum(Sost_sem.kolvo_chasi) FROM Prepodi inner join Nagr on  Prepodi.id_prepod = Nagr.id_prepod inner join Groupi on Nagr.id_groupi = Groupi.id_groupi inner join Sost_sem on Sost_sem.id_sost = Nagr.id_sost   where Prepodi.FIO_prepod= '$FIO' ";
$kes = "SELECT Sost_sem.kolvo_chasi, Groupi.nazv from Prepodi inner join Nagr on Prepodi.id_prepod=Nagr.id_prepod inner join Groupi on Nagr.id_groupi = Groupi.id_groupi inner join Sost_sem on Sost_sem.id_sost = Nagr.id_sost where Prepodi.FIO_prepod = '$FIO'";
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="main2.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Билеты</title>
</head>
<body>
<div class="div07">
    <header>Билет:</header>
</div>
<div class="div4">
     <?php
    $result = mysqli_query($connect, $kes);

    $result = mysqli_fetch_all($result);

    foreach ($result as $result) {
    ?>
    <table border="1" class="div7"> 
    <tr>
             <td valign="top"  align="center"> <?= 'группа:   ' .$result[1] ?>        </td>    <td width="50%" align="center"> <?= 'часы:   ' .$result[0] ?>        </td> 
    </tr>
    </table>
    <?php
    }
    ?> 
 <?php
    $result = mysqli_query($connect, $rres);

    $result = mysqli_fetch_all($result);

    foreach ($result as $result) {
    ?>
    <table border="1" class="div7"> 
    <tr>
            <td> <?= 'Общее количество часов:   ' .$result[0] ?>      
    </tr>
    </table>
    <?php
    }
    ?> 