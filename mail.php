<?php
require_once('vendor/autoload.php'); 

$mailgun = new MailgunApi('mg.poke-go.me', 'key-c6acd4ea91c4e5a05cd009a4beaccb41');

$message = $mailgun->newMessage();
$message->setFrom('no-reply@poke-go.me', 'Andrei Baibaratsky');
$message->addTo('tomersetty@gmail.com', 'My dear user');
$message->setSubject('Mailgun API library test');
$message->setText('Amazing! It’s working!');
$message->addTag('test'); 

echo $message->send();
?>


