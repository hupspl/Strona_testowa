<?php

// Check for empty fields
if(empty($_POST['name'])  		||
   empty($_POST['email']) 		||
   empty($_POST['phone']) 		||
   empty($_POST['message'])	||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
	echo "No arguments Provided!";
	return false;
   }
	
$name = $_POST['name'];
$email_address = $_POST['email'];
$phone = $_POST['phone'];
$message = $_POST['message'];


// Create the email and send message
$to = 'biuro@ozonek.pl'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
$email_subject = "Wiadomosc przeslana ze strony Ozonek.pl od: $name Telefon: $phone";
$email_body = "$message\n\n Imie: $name\n\nMail: $email_address\n\nTelefon: $phone\n\n";

/*$email_body = "Przeslana wiadomosc ze strony internetowej.\n\n"."Tresc wiadomosic i od kogo:\n\nImie: $name\n\nAdres Mail: $email_address\n\nTelefon: $phone\n\nWiadomosc:\n$message";*/

$headers = "From: biuro@ozonek.pl\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
$headers .= "Reply-To: $email_address";	
mail($to,$email_subject,$email_body,$headers);
return true;			
?>
