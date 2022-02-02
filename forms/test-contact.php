<?php
  $receiving_email_address = 'info@smarttekschool.com';
  $contact->to = $receiving_email_address;
  $contact->from_email = $_POST['email']; 
  $contact->add_message( $_POST['email'], 'Email');
  $contact->honeypot = $_POST['emails'];
  echo $contact->send();
?>