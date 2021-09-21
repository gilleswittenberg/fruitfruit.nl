<?php

$to = "contact@fruitfruit.nl";

$from = $_POST['from'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];


$inhoud_mail .= "$message \n\n"; 


$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=utf-8" . "\r\n";
	
$headers .= "From: $from <$email>\r\n";
$headers .= "Reply-To: $from <$email>\r\n";

	
mail($to, $subject, $inhoud_mail, $headers); 
     
?>