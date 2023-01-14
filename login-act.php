<?php
include 'include/conn.php';

$username = $_POST['username'];
$password = $_POST['password'];

$login = $db->query("select * from saw_users where username='$username' and password='$password'");
$cek = mysqli_num_rows($login);
$data = mysqli_fetch_assoc($login);

if($cek > 0){
	session_start();
	if($data['role']== 0){
        
		$_SESSION['username'] = $username;
		$_SESSION['role'] = 0;
        $_SESSION['status'] = "login";
		header("location:index.php");
 
	}else if($data['role']== 1){

		$_SESSION['username'] = $username;
		$_SESSION['role'] = 1;
        $_SESSION['status'] = "login";
		header("location:index.php");
        
	}else{

		header("location:login.php?msg=failed");
	}	
}else{
	header("location:login.php?msg=failed");
}
 
?> 

<!--
//if ($cek > 0) {
//    session_start();
//    $_SESSION['username'] = $username;
//    $_SESSION['status'] = "login";
//    header("location:index.php");
//} else {
//    header("location:login.php?msg=failed");
//}
-->
