<?php 
require '/usr/share/php/libphp-phpmailer/class.phpmailer.php';
require '/usr/share/php/libphp-phpmailer/class.smtp.php';
function check_user_timing( $id,$date ) {           
	global $conn;
	$sql ="SELECT 
	e.Name, e.Email, t.*
	FROM
	employee e
	LEFT JOIN employee_timing t 
	ON e.userid = t.userid 
	WHERE t.userid = $id  AND t.date_time 
	BETWEEN '".$date." 10:00:00' AND '".$date." 23:59:59'  
	order by 
	t.date_time ASC limit 1;";
	$result = $conn->query( $sql );
	pr ($result);
	die('asas');
	if($result->num_rows > 0) {
		$late_user = $result->fetch_assoc();
		return $late_user;    
	}else {
		return;
	}
}  

function send_email( $sender_email , $reciver_email , $username , $datetime) { 
	$mail = new PHPMailer;
	
	$mail->setFrom('girish.techmarbles@gmail.com','Techmarbles');
	
	$mail->Username ='girish.techmarbles@gmail.com';
	
	$mail->Password = 'ghjkghjk';
	
	$mail->addAddress( $reciver_email );
	
	$mail->Subject = 'Late Attendence Notifiction to '.$username;


	$mail->Body = '<h2>Warning!</h2><p style="color:Blue;">Dear '.$username.' Your Reporting Time is '.$datetime.'. Try to come at decided time or your your salary will be deducted.</p><h2>Thanks <h2>'; 
	$mail->isHTML(true);
	$mail->AltBody = "This message is generated by plain text !";
	$mail->IsSMTP();
	$mail->SMTPSecure = 'ssl';
	$mail->Host = 'ssl://smtp.gmail.com';
	$mail->SMTPAuth = true;
	$mail->Port = 465;
	if( !$mail->send() )  { 
		return false;
	} else {
		return true;
	} 
}

?>

