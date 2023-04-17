<?php

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

/**
 *
 * Send a basic email
 *
 * @param array  $address     the list of address to sent the email to
 * @param string $subject     the email subject
 * @param string $message     the message to sent
 * @param array  $attachments an array containing the list of file to attached
 * @return true|PHPMailer true if sucess otherwise the `PHPMailer` class
 *                        if failed where you can simply get the ErrorInfo
 *                        property the get the error info
 *
 */

function email_send(array $address, string $subject, string $message, array $attachments = [])
{

    $mail = new PHPMailer(true);

    try {

        /**
         * server settings
         */

        $mail->isSMTP();
        $mail->Host = EMAIL_HOST;
        $mail->SMTPAuth = true;
        $mail->Username = EMAIL_USERNAME;
        $mail->Password = EMAIL_PASSWORD;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port = EMAIL_PORT;

        /**
         * recipients
         */

        $mail->setFrom(EMAIL_FROM_ADDRESS, EMAIL_FROM_NAME);

        /**
         * address
         */

        foreach($address as $email) {
            $mail->addAddress($email);
        }

        /**
         * attachments
         */

        if(empty($attachments) === false) {
            foreach($attachments as $attachment) {
                $mail->addAttachment(__DIR__."/../{$attachment}");
            }
        }

        /**
         * content
         */

        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = $message;
        $mail->send();

        return true;

    } catch (Exception $e) {

        /**
         * return the PHPMailer instance if failed
         */

        return $mail;

    }

}
