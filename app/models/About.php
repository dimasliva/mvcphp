<?php

use PHPMailer\PHPMailer\PHPMailer;

class About
{
    public static function sendEmail()
    {
        if (isset($_POST['email']) && isset($_POST['subject'])) {
            $email = $_POST['email'];
            $subject = $_POST['subject'];
            $body = $_POST['body'];

            require_once "PHPMailer\PHPMailer";
            require_once "PHPMailer\SMTP";
            require_once "PHPMailer\Exception";

            $mail = new PHPMailer();

            $mail->isSMTP();
            $mail->Host = "smtp.gmail.com";
            $mail->SMTPAuth = true;
            $mail->Username = 'gamerrussianchannel@gmail.com';
            $mail->Password = 'Balalaykin228';
            $mail->Port = 465;
            $mail->SMTPSecure = 'ssl';

            $mail->isHTML(true);
            $mail->setFrom($email, $email);
            $mail->addAddress('gamerrussianchannel@gmail.com');
            $mail->Subject = $subject;
            $mail->Body = $body;

            if ($mail->send()) {
                $status = 'Success';
                $response = "Email is sent";
            } else {
                $status = 'Failed';
                $response = "Something is wrong: " . $mail->ErrorInfo;
            }
            exit(json_encode(array("status" => $status, "response" => $response)));
        }
    }
}
