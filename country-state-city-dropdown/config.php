
<?php
$con=mysqli_connect('localhost','root','','php_location');
if ($con->connect_error) {
die("Database Connection failed: " . $con->connect_error);
}
?>