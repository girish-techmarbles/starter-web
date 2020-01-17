<?php
require_once 'inc/config.php';
require_once 'inc/function.php';



if( isset( $_POST['submit'] ) ) {

	$uname = $_POST['username'];
	$pass  = $_POST['password'];
	$pass1 = md5($pass);

	$sql = "select * from Admin where username='$uname' and password='$pass1'";
	$result = $conn->query( $sql );
	

	if($result->num_rows == 1) {
		
		$users = $result->fetch_assoc();
		
		pr ($users);
		die ('accc');
		return $users; 

		$row = mysqli_num_rows(); 

		$_SESSION['error'] = 'uss';  


	}  else {

		$_SESSION['error'] = 'uss';  


	}
}
?>