<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    include_once 'banco.php';
    //Load Composer's autoloader
    require 'vendor/autoload.php';

    $email = $_POST['email'];

    $sql = "select * from tbusu where email = '$email'";
    $consulta = $conexao -> query($sql);

    if($consulta){
        if($consulta -> num_rows > 0){
            //Create an instance; passing `true` enables exceptions
            $mail = new PHPMailer(true);

            try {
                $rash = md5(rand());
                $mail->isSMTP();
                $mail->Host       = 'smtp.gmail.com';
                $mail->SMTPAuth   = true;
                $mail->Username   = 'jhonatas30souza@gmail.com';
                $mail->Password   = 'xgecuvxvpxxavwmb';
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
                $mail->Port       = 465;                                    
                //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
            
                //Recipients
                $mail->setFrom('jhonatas30souza@gmail.com', 'Admin');
                $mail->addAddress($email, 'Usuário'); //Quem recebe o email
                $mail->addReplyTo('jhonatas30souza@gmail.com', 'Information');
            
                //Content
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = 'RECUPERAR SENHA';
                $body = '<h2>Você solicitou uma alteração de senha?</h2>
                        <hr>
                        <h3>Se sim, aqui está o link para alterar sua senha:</h3>
                        <p>Para alterar sua senha acesse esse link:</p>
                        <a href="http://localhost/GitHub/Projeto-Academia/alterar-senha.php?rash='.$rash.'">Clique aqui</a>
                        <hr>
                        <h5>Não foi você quem solicitou? Se não, apenas ignore esse email.</h5>
                        <hr>';
                $mail->Body    = $body;
                $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
            
                $mail->send();
                session_start();
                $_SESSION['rash'] = $rash;
                $_SESSION['email'] = $email;
                header('Location: ../esqueci-senha.php?status=send');
            } catch (Exception $e) {
                $_SESSION['erro'] = $mail->ErroInfo;
                header('Location: ../esqueci-senha.php?status=erro');
            }
        } else {
            header('Location: ../esqueci-senha.php?status=nouser');
        }
    }
?>