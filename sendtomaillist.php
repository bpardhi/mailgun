<?php
require 'vendor/autoload.php';
require_once 'init.php';
$subject="Hi";
$body="Body Of mail";

$Mailgun->sendMessage("sandboxd2f0c1e9c484445c839c3632037e853b.mailgun.org",[
  'from' => 'bhushaninyourheart@gmail.com',
  'to' =>"mail@sandboxd2f0c1e9c484445c839c3632037e853b.mailgun.org",
  'subject' => $subject,
  'html' => {body}<br> <a href="%unsubscribe_url%"
]);


 ?>
