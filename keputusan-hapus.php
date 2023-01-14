<?php
require "include/conn.php";
$id = $_GET['id'];
mysqli_query($db, "delete from saw_evaluations where id_alternative='$id'");
mysqli_query($db, "UPDATE saw_alternatives SET value_p = 0 WHERE id_alternative = '{$id}'");
header("location:./matrik.php");
