<?php

require "connect.php";
require "UserService.php";

$name = mysqli_real_escape_string($conn, $_POST['name']);
$p1 = mysqli_real_escape_string($conn, $_POST['p1']);


$uService = new UserService();
$result = $uService->LoginUser($name,$p1);

mysqli_close($conn);

$json = json_encode($result);
echo"$json";
exit();
?>