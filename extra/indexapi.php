

<?php
ini_set('display_errors', 1);
$secretkey='key-0427bd4591761a73f95fb3769c02ef55';
$domain = "sandboxd2f0c1e9c484445c839c3632037e853b.mailgun.org";

$Option['FROM_MAIL']="postmaster@sandboxd2f0c1e9c484445c839c3632037e853b.mailgun.org";
$Option['FROM_NAME']="Accer";
$Option['TO_MAIL']="bhushanmgtest@gmail.com";
$Option['TO_NAME']="Bhushan P";
$Option['SUBJECT']="Test message";
$Option['BODY_TEXT']="Hi user";
$Option['BODY_HTML']="<b style='color:red'>here is html message</b>";
require 'vendor/autoload.php';

$client = new \GuzzleHttp\Client([
    'verify' => false,
]);

$adapter = new \Http\Adapter\Guzzle6\Client($client);
$mailgun = new \Mailgun\Mailgun($secretkey, $adapter);
$result = $mailgun->sendMessage($domain, array(

    'from'    => $Option['FROM_NAME']." <".$Option['FROM_MAIL'].">",
    'to'      => $Option['TO_NAME']." <".$Option['TO_MAIL'].">",
    'subject' => $Option['SUBJECT'],
    'text'    => $Option['BODY_TEXT'],
    'html'    => $Option['BODY_HTML'],

));
var_dump($result);
