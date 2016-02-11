<?php 
$errors = '';
$myemail = 'misnkv@gmail.com,ggmedia2010@gmail.com';
//$myemail = 'misnkv@gmail.com';

$name = $_POST['name'];
$phone = $_POST['phone'];
$email_address = $_POST['email'];
$newsletter = $_POST['newsletter'];
$ipaddress = $_SERVER['REMOTE_ADDR'];

$to = $myemail; 
$email_subject = "LP - New Lead";
$email_body = 'Name: '.$name.'<br/>Phone: '.$phone.'<br/>Email: '.$email_address.'<br/>Newsletter: '.$newsletter;

$headers = "From: Geek Digital <geek@donotreply.com> \n"; 
$headers .= 'Content-type: text/html; charset=utf-8'; 

mail($to,$email_subject,$email_body,$headers);
header('Location: ty.html');
?>