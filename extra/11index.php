<?php
ini_set('display_errors', 1);
require 'vendor/autoload.php';
use Mailgun\Mailgun;
# Instantiate the client.
$mgClient = new Mailgun('key-0427bd4591761a73f95fb3769c02ef55');
$domain = "sandboxd2f0c1e9c484445c839c3632037e853b.mailgun.org";

# Make the call to the client.
$result = $mgClient->sendMessage($domain, array(
    'from'           => 'Bhushan Pardhi <bhushaninyourheart@gmail.com>',
    'to'             => 'maillist1 <mail@sandboxd2f0c1e9c484445c839c3632037e853b.mailgun.org>',
    'subject'        => 'Hello',
    'text'           => 'Testing some Mailgun awesomness!',
    'o:deliverytime' => 'Fri, 25 Oct 2013 23:10:10 -0000'
));
?>
