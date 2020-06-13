<?php

    namespace App\models;

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    class ContactModel {
        private $name;
        private $email;
        private $age;
        private $message;

        public function setData($name, $email, $age, $message) {
            $this->name = $name;
            $this->email = $email;
            $this->age = $age;
            $this->message = $message;
        }

        public function validForm() {
            if(strlen($this->name) < 3)
                return "Имя не может быть короче 3 символов";
            else if(strlen($this->email) < 5)
                return "Email не может быть короче 5 символов";
            else if(!is_numeric($this->age) || $this->age <= 0 || $this->age > 90)
                return "Вы ввели некорректный возраст";
            else if(strlen($this->message) < 10)
                return "Сообщение слишком короткое";
            else
                return "done";

        }

        public function sendMail() {

            require 'vendor/autoload.php';

            $mail = new PHPMailer(true);

            try {
                $mail->SMTPDebug = SMTP::DEBUG_SERVER;
                $mail->CharSet = 'UTF-8';
                $mail->isSMTP();
                $mail->Host       = 'smtp.gmail.com';
                $mail->SMTPAuth   = true;
                $mail->Username   = 'Pingvin1812@gmail.com';
                $mail->Password   = 'мой секретный пароль огурец1996';
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port       = 465;

                $mail->setFrom('Pingvin1812@gmail.com', 'Mailer');
                $mail->addAddress('egor1812@i.ua', 'Tony Cooper');

                $mail->isHTML(true);
                $mail->Subject = 'Test message';
                $mail->Body    = $this->message;
                $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                $mail->send();

                return 'Сообщение отправлено';
            } catch (Exception $e) {
                return "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }

        }
    }