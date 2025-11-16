<?php /** v3.11 https://bootstrapmade.com/php-email-form/ **/

  if (file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php')) include($php_email_form);
  else die('Unable to load the "PHP Email Form" Library!');

  require_once __DIR__ . '/../../config/loadenv.php';

  $contact = new PHP_Email_Form;
  $contact->ajax = true;

  $contact->to = 'info@jwcruises.com';
  $contact->from_name = $_POST['name'];
  $contact->from_email = $_POST['email'];
  $contact->subject = $_POST['subject'];

  $contact->smtp = array(
    'host' => getenv('SMTP_HOST'),
    'username' => getenv('SMTP_USER'),
    'password' => getenv('SMTP_PASS'),
    'port' => getenv('SMTP_PORT')
  );

  $contact->add_message( $_POST['name'], 'From');
  $contact->add_message( $_POST['email'], 'Email');
  $contact->add_message($_POST['phone'], 'Phone');
  $contact->add_message( $_POST['cruise'], 'Cruise');
  $contact->add_message( $_POST['room'], 'Room');
  $contact->add_message( $_POST['adult'], 'Adult');
  $contact->add_message( $_POST['child'], 'Child');

  // $contact->cc = array('info@danielkyantis.me', 'daniel@webtestkit.com');
  // $contact->bcc = array('danielkyantis@yahoo.com', 'danielkyantis@gmail.com');

  // $contact->honeypot = $_POST['first_name'];
  $contact->recaptcha_secret_key = getenv('RECAP_SECRET');
  if($_POST['terms'] !='accept') { die('Please, accept our terms of service and privacy policy'); }

  // $contact->add_attachment('document', 20, array('pdf', 'doc', 'docx', 'rtf'));

  echo $contact->send();
?>
