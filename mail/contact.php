<?php
if(empty($_POST['name']) || empty($_POST['subject']) || empty($_POST['message']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
  http_response_code(500);
  exit();
}

$name = strip_tags(htmlspecialchars($_POST['name']));
$email = strip_tags(htmlspecialchars($_POST['email']));
$m_subject = strip_tags(htmlspecialchars($_POST['subject']));
$message = strip_tags(htmlspecialchars($_POST['message']));

$to = "jorgeluissanchezbarreneche@gmail.com";
$subject = "$m_subject:  $name";
$body = "Usted ha recibido un mensaje desde el website de Innovinc SAS.\n\n.Aqui estan los detalles:\n\nNombre: $name\n\n\nEmail: $email\n\nAsunto: $m_subject\n\nMensaje: $message";
$header = "From: $email";
$header .= "Reply-To: $email";	

if(!mail($to, $subject, $body, $header))
  http_response_code(500);
?>
