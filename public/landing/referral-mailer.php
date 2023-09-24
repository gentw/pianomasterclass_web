<?php

set_include_path(get_include_path() . ':' . '.');
require_once('MailGun/Email.php');
use \MailGun\Email;

$subjectEmail = $_POST['subject'];

$Body = 
        '<label><h5>Mail From Subscibe Section:</h5></label>'.'<br>'.
        '<label><b>Name: </b></label>'.$_POST['name'].'<br>'.
        '<label><b>Email: </b></label>'.$_POST['email'].'<br>'.
        '<label><b>Phone: </b></label>'.$_POST['number'].'<br>';
	
//Instantiate with your domain and key (no, that's not my real key)
$email = new Email('postmaster.online', 'key-7cfb4b53d8e17762fd2f82b95ed6ffd5');
//Populate the object
$response = $email->setFrom('postmaster@postmaster.online', 'Referral EmiratesGraphic')
    ->addTo('sacha@emiratesgraphic.com')
    ->addTo('rilindp@gmail.com')
    ->setSubject($subjectEmail)
    ->setHtml($Body)
    ->setTestMode(false)
    ->send();
if ($response->getHttpCode() !== 200) {
    throw new \Exception('Mail failed !');
} else {
    echo 'Email sent successfully';
}

?>

