<?php
require "include/conn.php";

$id_alternative = $_POST['id_alternative'];
$id_criteria1 = 1;
$value = $_POST['value'];

$i =1;
$jmlh = 0;
while ($i <= 5) {
        $sql = "INSERT INTO saw_evaluations values ('$id_alternative','$i','$value[$jmlh]')";
        $result = $db->query($sql);
        $i    =$i+1;
    $jmlh = $jmlh+1;
    }


//$sql = "UPDATE saw_evaluations SET ('$value') WHERE id_alternative = '$id_alternative', id_criteria = '$id_criteria'";


if ($result === true) {
    header("location:./matrik.php");
} else {
    echo "Error: " . $sql . "<br>" . $db->error;
}
