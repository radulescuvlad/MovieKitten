<?php

require "connect.php";
require "UserService.php";

$name = mysqli_real_escape_string($conn, $_POST['name']);
$p1 = mysqli_real_escape_string($conn, $_POST['p1']);
$p2 =  mysqli_real_escape_string($conn, $_POST['p2']);
$email = mysqli_real_escape_string($conn, $_POST['email']);


$uService = new UserService();
$result = $uService->RegisterUser($name,$p1,$p2,$email);

mysqli_close($conn);

$json = json_encode($result);
echo"$json";
exit();
?>
