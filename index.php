<?php
    require 'EvaluacionTarea.php';

    $evaluacion = new EvaluacionTarea();
    $evaluacion->mostrar();

    /*// Import PHPMailer classes into the global namespace
    // These must be at the top of your script, not inside a function
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    // Load Composer's autoloader
    require 'vendor/autoload.php';

    // Instantiation and passing `true` enables exceptions
    $mail = new PHPMailer();

    try {
        $mail->CharSet = 'UTF-8';

        $body = 'Cuerpo del correo de prueba';

        $mail->IsSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;
        $mail->SMTPDebug  = 1;
        $mail->SMTPAuth   = true;
        $mail->Username   = 'piterv4650@gmail.com';
        $mail->Password   = 'australopithecus29102018';
        $mail->SetFrom('piterv4650@gmail.com', "juliocpiro");
        //$mail->AddReplyTo('no-reply@mycomp.com','no-reply');
        $mail->Subject    = 'Correo de prueba PHPMailer';
        $mail->MsgHTML($body);

        $mail->AddAddress('01vargaspedro@gmail.com');
        $mail->send();

    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }*/
?>