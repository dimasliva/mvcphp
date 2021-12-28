<?php

use PHPMailer\PHPMailer\PHPMailer;

class Mailer
{
    static function sendMail()
    {
        session_start();
        if (!empty($_POST['email']) && !empty($_POST['name']) && !empty($_POST['message'])) {
            $email = $_POST['email'];
            $name = $_POST['name'];
            $message = $_POST['message'];
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
                $message = '<div class="alert alert-success alert-dismissible fade show" id="alert" role="alert">
                <strong>Success!</strong> Message has been send.
                <button type="button" id="close" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>';
                $_SESSION['message'] = $message;
                echo $_SESSION['message'];
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
