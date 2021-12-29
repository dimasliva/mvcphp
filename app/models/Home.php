<?php

use PHPMailer\PHPMailer\PHPMailer;

class Mailer
{
    static function sendMail()
    {
        if (isset($_POST['submit'])) {
            $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
            $name = htmlspecialchars($_POST['name']);
            $message = htmlspecialchars($_POST['message']);
            $mail = new PHPMailer();

            // SMTP settings
            $mail->isSMTP();
            $mail->Host = "smtp.gmail.com";
            $mail->SMTPAuth = true;
            $mail->Username = 'gamerrussianchannel@gmail.com';
            $mail->Password = 'Balalaykin228';
            $mail->Port = 465;
            $mail->SMTPSecure = 'ssl';
            $mail->CharSet = 'UTF-8';

            // Email settings
            $mail->isHTML(true);
            $mail->setFrom($email);
            $mail->addAddress('adermilovdmitry@gmail.com');
            $mail->Subject = 'Предложение от: ' . $name;
            $mail->Body = $message . "\n Имя: " . $name . "\n Почта: " . $email;

            if ($mail->send()) {
            } else {
                $status = 'Failed';
                $response = 'Something is wrong!: <br>' . $mail->ErrorInfo;
                exit(json_encode(array("status" => $status, 'response' => $response)));
            }
        }
    }

    static function download()
    {
    }
}
