<?php

    /* if(isset($_POST['customer_email'] && $_POST['customer_email'] != ''){

        if(filter_var($_POST['customer_email'], FILTER_VALIDATE_EMAIL)){
            // submit form
            $customer_name = $_POST['customer_name'];
            $customer_email = $_POST['customer_email'];
            $customer_company = $_POST['customer_company'];
            $customer_phone = $_POST['customer_phone'];
            $customer_message = $_POST['customer_message'];

            $email_centicon = 'info@centicon.com.au';
            $email_subject = "New Customer Message";

            $email_body = "Customer name: $customer_name \r\n";
            $email_body .= "Customer email: $customer_email \r\n";
            $email_body .= "Company: $customer_company \r\n";
            $email_body .= "Customer phone: $customer_phone \r\n\n";
            $email_body .= "Message: $customer_message \r\n";

            $to = "services@centicon.com.au";
            $headers = "From: $email_centicon \r\n";
            $headers .= "Reply-To: $customer_email \r\n";
            mail($to, $email_subject, $email_body, $headers);
            headers("Location: index.html");
        }
    } */
    if (isset($_POST['submit'])){
        $email_centicon = 'services@centicon.com.au';

        $customer_name = $_POST['customer_name'];
        $customer_email = $_POST['customer_email'];
        $customer_company = $_POST['customer_company'];
        $customer_phone = $_POST['customer_phone'];
        $customer_message = $_POST['customer_message'];

        $email_subject = "New Customer Message";
        $subject = "Confirmation: Your enquiries have been submitted successfully."

        $email_body = "Customer name: " . $customer_name . "\n"
         ."Customer email: ". $customer_email . "\n"
         ."Company: " . $customer_company . "\n"
         ."Customer phone: " . $customer_phone . "\n\n"
         ."Message: " . $customer_message . "\n";

        $message = "Dear" .$customer_name. "\n"
        . "Thank you for contacting us. We will get back to you shortly!" . "\n\n"
        . "Your enquiry: " . "\n" .$_POST['customer_message'] . "\n\n"
        . "Regards," . "\n" . "Centicon building and construction services";

        $headers = "From: " . $customer_email;
        $to = "To: " . $email_centicon;

        $resEmail1 = mail($to, $email_subject, $email_body, $headers);
        $resEmail2 = mail($customer_email, $subject, $message, $to); // confirmation email to client

        header("Location: index.html"); exit;

        if ($resEmail1){
            echo '<script type="text/javascript">Your Message was sent successfully!</script>';
            header("Location: index.html"); exit;
        } else {
            echo '<script type="text/javascript"> Alert! Message was not sent, Please try again. </script>';
            header("Location: index.html"); exit;
        }
        header("Location: index.html"); exit;
    }
    header("Location: index.html"); exit;
?>





















