<?php

// include required phpmailer files
    require 'phpmailer/include/PHPMailer.php';
    require 'phpmailer/include/SMTP.php';
    require 'phpmailer/include/Exception.php';

// Define name spaces
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

// Create instanceof phpmailer
    $mail = new PHPMailer();

// Set mailer to use smtp
    mail->isSMTP();
    $mail->SMTPDebug = 2;

// define smtp host
    $mail->Host = "smtp.hostinger.com";
// enable smtp authentication
    $mail->AMTPAuth = "true";
// set type of encryption (ssl/tls)
    $mail->SMTPSecure = "tls";
// set prt to connect smtp
    $mail->Port = "587";
// set email username
    $mail->Username = 'services@centicon.com.au';
// set email password
    $mail->Password = '';
// set email subject
    $mail->Subject = "Test email using PHPMailer";
//Set sender email
    $mail->setFrom('services@centicon.com.au', 'Centicon');
// Email body
    //$mail->Body = "This is plain text email body";
// Add recipient
    $mail->addAddress('roah.egl@gmail.com', 'Mr Roah');

    if ($mail->addReplyTo($_POST['customer_email'], $_POST['customer_name'])) {
            $mail->Subject = 'PHPMailer contact form';
            $mail->isHTML(false);
            $mail->Body = <<<EOT
    Email: {$_POST['customer_email']}
    Name: {$_POST['customer_name']}
    Message: {$_POST['customer_message']}
    EOT;
            if (!$mail->send()) {
                $msg = 'Sorry, something went wrong. Please try again later.';
            } else {
                $msg = 'Message sent! Thanks for contacting us.';
            }
        } else {
            $msg = 'Share it with us!';
        }

    // Finally send email

    // Closing smtp connection
    $mail->smtpClose();

?>