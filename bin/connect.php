 <?php 
 #mysql_connect("localhost", "root", "root") or die(mysql_error()); 
 #mysql_select_db("moviekitten") or die(mysql_error()); 
 $conn = mysqli_connect("localhost", "root", "root","moviekitten");
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
 ?>
