<?php
$servername = 'localhost';
$username = 'root';
$password = 'gpassword';
$dbname = 'Flock';

$conn = mysqli_connect($servername,$username,$password,$dbname);


if ($conn) {
}
else{
	echo "connection failed";
	die('die');
}
?>