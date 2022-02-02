<?php
 
  $receiving_email_address = 'info@smarttekschool.com';

  if( file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php' )) {
    include( $php_email_form );
  } else {
    die( 'Unable to load the "PHP Email Form" Library!');
  }

  $contact = new PHP_Email_Form;
  $contact->ajax = true;
  
  $contact->to = $receiving_email_address;
  
  $contact->from_name = $_POST['name'];
  $contact->from_lastname = $_POST['lastname'];
  $contact->from_email = $_POST['email'];
  $contact->from_phone = $_POST['phone'];
  $contact->subject = $_POST['subject'];

  // Uncomment below code if you want to use SMTP to send emails. You need to enter your correct SMTP credentials
  
  // $contact->smtp = array(
  //  'host' => 'smtp.ionos.com',
  //  'username' => '',
  //  'password' => '',
  //  'port' => '587'
  // );
  
 

  $contact->add_message( $_POST['name'], 'First Name');
  $contact->add_message( $_POST['lastname'], 'Last Name');
  $contact->add_message( $_POST['email'], 'Email');
  $contact->add_message( $_POST['phone'], 'Phone');
  $contact->add_message( $_POST['message'], 'Message', 10);
  

  if($_POST['privacy'] !='accept') {
   die('Please, accept our terms of service and privacy acy policy');
  }
  
  $contact->honeypot = $_POST['first_name'];
  $contact->honeypot = $_POST['last_name'];
  $contact->honeypot = $_POST['emails'];
  $contact->honeypot = $_POST['phones'];
  
  //ontact->recaptcha_secret_key = '6LeWZ6gcAAAAAFtk2BVZxA5ZX71JAwBERbjQqedK';
  
  echo $contact->send();
?>
