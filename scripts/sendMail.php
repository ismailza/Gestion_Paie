<?php

  // These must be at the top of your script, not inside a function
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\SMTP;
  use PHPMailer\PHPMailer\Exception;

  require_once ('PHPMailer/Exception.php');
  require_once ('PHPMailer/PHPMailer.php');
  require_once ('PHPMailer/SMTP.php');

  function sendMail ($to, $subject, $message)
  {
    $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'ismailza437@gmail.com';
    $mail->Password   = 'wzrtgciagbiajcnq';
    $mail->SMTPSecure = 'ssl';
    $mail->Port       = 465;

    $mail->setFrom('ismailza437@gmail.com', 'Plateforme de gestion de paie');
    $mail->addAddress($to);
    $mail->isHTML(true);
    $mail->Subject    = $subject;
    $mail->Body       = $message;

    return $mail->send();
  }

  function sendInfoLogin ($to, $lastname, $firstname, $password)
  {
    $subject  = "Recuperer info login";
    $message = 
    "
      <html>
      <head>
        <meta charset=\"utf-8\">
      </head>
      <body>
        <div class=\"container\">
          <div class=\"content\">
            <h4>Bonjour, $lastname $firstname</h4>
            <p>
              Voici votre login et mot de passe pour accéder à votre espace sur la plateforme de gestion de paie
            </p>
            <table>
              <tr>
                <td>Login</td>
                <td>: <strong>$to</strong></td>
              </tr>
              <tr>
                <td>Password</td>
                <td>: <strong>$password</strong></td>
              </tr>
            </table>
            <br>
            <div class=\"footer\">
              <small>Copyright &copy; 2023. All rights reserved.</small>
            </div>
          </div>
        </div>
      </body>
      </html>
    ";

    return sendMail($to, $subject, $message);
  }

  function sendResetCode ($to, $code)
  {
    $subject = "Code de vérification";
    $message = 
    "
      <html>
      <head>
        <meta charset=\"utf-8\">
      </head>
      <body>
        <h4>Bonjour,</h4>
        <p>Voici votre code de vérification pour réinitialiser votre mot de passe:</p>
        <p>Code : <strong>$code</strong></p>
      </body>
      </html>
    ";
    return sendMail($to, $subject, $message);
  }

?>