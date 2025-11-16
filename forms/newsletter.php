<?php /** v3.11 https://bootstrapmade.com/php-email-form/ **/

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

  if (file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php')) include($php_email_form);
  else die('Unable to load the "PHP Email Form" Library!');

  require_once __DIR__ . '/../../config/loadenv.php';

  $contact = new PHP_Email_Form;
  $contact->ajax = true;

  $contact->to = 'info@jwcruises.com';
  $contact->from_name = 'Newsletter Signup Form';
  $contact->from_email = $_POST['email'];
  $contact->subject = 'Newsletter Signup Form';

  $contact->smtp = array(
    'host' => getenv('SMTP_HOST'),
    'username' => getenv('SMTP_USER'),
    'password' => getenv('SMTP_PASS'),
    'port' => getenv('SMTP_PORT')
  );

  $contact->add_message( $_POST['email'], 'Email');

  // $contact->honeypot = $_POST['first_name'];
  $contact->recaptcha_secret_key = getenv('RECAP_SECRET');

  echo $contact->send();
?>
