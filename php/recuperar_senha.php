<?php
session_start();
ob_start();
include_once 'conexao.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require './lib/vendor/autoload.php';
$mail = new PHPMailer(true);

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/png" href="img/pawprint.png"/>
  <link rel="stylesheet" type="text/css" href="CSS/recuperar_senha.css" media="screen" />
  <link rel="stylesheet" type="text/css" href="CSS/navBar.css" />
   <title>canil osasco</title>
</head>
<header id="header">

<div class="flex">

  <a href="../doacaopets.html"><img src="../img/erick_3Bi_2.ico" alt="" id="logo"></a>

  <nav class="menuDesktop">

    <h2 class="nomeDesk">
      CANIL<br>OSASCO
    </h2>

    <ul class="listaNav">

      <li>
        <a href="../quemomos.html" rel="noopener noreferrer"><strong>QUEM SOMOS</strong></a>
      </li>

      <li>
        <a href="https://www.freecodecamp.org/" rel="noopener noreferrer"><strong>QUERO ADOTAR</strong></a>
      </li>

      <li>
        <a href="../voluntario.html" rel="noopener noreferrer"><strong>VOLUNTÁRIO</strong></a>
      </li>

      <li>
        <a href="../politicaprivacidade.html" rel="noopener noreferrer"><strong>POLÍTICA DE <br>
            PRIVACIDADE</strong></a>
      </li>

      < <li class="liButton">
            <button class="button-entrar"  type="button" onclick="window.location.href='php/login.php'">ENTRAR</button>
            
      </li>

    </ul>

  </nav>

  <h2 class="nomeMobile">CANIL OSASCO</h2>

  <div id="menu-hamburguer">
    <div class="bar"><img src="../img/menu.png" /></div>
  </div>

  <div id="menu-lateral">
    <span id="fechar-menu" class="fechar-menu"><img src="../img/close.png" /></span>
    <ul>

      <li>
        <div class="button-header">
          <button type="button">Entrar</button>
          <?php
          ?>
        </div>
      </li>

      <li>
        <a href="../quemomos.html" rel="noopener noreferrer">QUEM SOMOS</a>
      </li>

      <li>
        <a href="https://www.freecodecamp.org/" rel="noopener noreferrer">QUERO ADOTAR</a>
      </li>

      <li>
        <a href="../voluntario.html" rel="noopener noreferrer">VOLUNTÁRIO</a>
      </li>

      <li>
        <a href="../politicaprivacdade.html" rel="noopener noreferrer">POLÍTICA DE PRIVACIDADE</a>
      </li>

      <section id="menu-social">
        <a href="https://wa.me/5511974157221?text=Oii,%20gostaria%20de%20obter%20mais%20informações%20sobre%20os%20pets."
          target="_blank">
          <img src="../img/whatts.png" alt="whatsApp" />
        </a>

        <a href="https://instagram.com/canilosasco?igshid=MzRlODBiNWFlZA==" target="_blank">
          <img src="../img/insta.webp" alt="instagram" />
        </a>

        <a href="mailto:semarh@osasco.sp.gov.br">
          <img src="../img/gmail-logo-transparent-1.png" alt="gmail" />
        </a>
      </section>
    </ul>
  </div>
</div>
<section id="redes-sociais">

  <a href="https://wa.me/5511974157221?text=Oii,%20gostaria%20de%20obter%20mais%20informações%20sobre%20os%20pets."
    target="tela"><img src="../img/whatts.png" alt="home"></a>

  <a href="https://instagram.com/canilosasco?igshid=MzRlODBiNWFlZA==" target="tela"><img src="../img/insta.webp"
      alt="home"></a>

  <a href="mailto:semarh@osasco.sp.gov.br"><img src="../img/gmail-logo-transparent-1.png" alt="home"></a>

</section>
</header>
<body>
<main class="area-recuperar">
      <section class="recuperar">

    <h1>Digite abaixo o e-mail que você utilizou para fazer seu cadastro.</h1>

    <?php
    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

    if (!empty($dados['SendRecupSenha'])) {
        //var_dump($dados);
        $query_usuario = "SELECT id, nome, usuario 
                    FROM usuarios 
                    WHERE usuario =:usuario  
                    LIMIT 1";
        $result_usuario = $conn->prepare($query_usuario);
        $result_usuario->bindParam(':usuario', $dados['usuario'], PDO::PARAM_STR);
        $result_usuario->execute();

        if (($result_usuario) and ($result_usuario->rowCount() != 0)) {
            $row_usuario = $result_usuario->fetch(PDO::FETCH_ASSOC);
            $chave_recuperar_senha = password_hash($row_usuario['id'], PASSWORD_DEFAULT);
            //echo "Chave $chave_recuperar_senha <br>";

            $query_up_usuario = "UPDATE usuarios 
                        SET recuperar_senha =:recuperar_senha 
                        WHERE id =:id 
                        LIMIT 1";
            $result_up_usuario = $conn->prepare($query_up_usuario);
            $result_up_usuario->bindParam(':recuperar_senha', $chave_recuperar_senha, PDO::PARAM_STR);
            $result_up_usuario->bindParam(':id', $row_usuario['id'], PDO::PARAM_INT);

            if ($result_up_usuario->execute()) {
                $link = "http://localhost/canilosasco/atualizar_senha.php?chave=$chave_recuperar_senha";

                try {
                    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;
                    $mail->CharSet = 'UTF-8';
                    $mail->isSMTP();
                    $mail->Host       = 'smtp.gmail.com';
                    $mail->SMTPAuth   = true;
                    $mail->Username   = 'canilosascotcc@gmail.com';
                    $mail->Password   = 'klnn svtq lomy zikh';
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                    $mail->Port       = 587;

                    $mail->setFrom('canilosascotcc@gmail.com', 'Canil Osasco');
                    $mail->addAddress($row_usuario['usuario'], $row_usuario['nome']);

                    $mail->isHTML(true);                                  //Set email format to HTML
                    $mail->Subject = 'Canil Osasco - Recuperar senha';
                    $mail->Body    = 'Prezado(a) ' . $row_usuario['nome'] .".<br><br>Você solicitou alteração de senha.<br><br>Para continuar o processo de recuperação de sua senha, clique no link abaixo ou cole o endereço no seu navegador: <br><br><a href='" . $link . "'>" . $link . "</a><br><br>Se você não solicitou essa alteração, nenhuma ação é necessária. Sua senha permanecerá a mesma até que você ative este código.<br><br>";
                    $mail->AltBody = 'Prezado(a) ' . $row_usuario['nome'] ."\n\nVocê solicitou alteração de senha.\n\nPara continuar o processo de recuperação de sua senha, clique no link abaixo ou cole o endereço no seu navegador: \n\n" . $link . "\n\nSe você não solicitou essa alteração, nenhuma ação é necessária. Sua senha permanecerá a mesma até que você ative este código.\n\n";

                    $mail->send();

                    $_SESSION['msg'] = "<p style='color: #379b32'>Enviado e-mail com instruções<br>para recuperar a senha.</p>";
                    header("Location: login.php");
                } catch (Exception $e) {
                    echo "<p style='color: #ff0000'>Erro: E-mail não enviado com sucesso. Mailer Error: {$mail->ErrorInfo}";
                }
            } else {
                echo  "<p style='color: #ff0000'>Erro: Tente novamente!</p>";
            }
        } else {
            echo "<p style='color: #ff0000'>Erro: Usuário não encontrado!</p>";
        }
    }

    if (isset($_SESSION['msg_rec'])) {
        echo $_SESSION['msg_rec'];
        unset($_SESSION['msg_rec']);
    }

    ?>

    <form method="POST" action="">
        
        <?php
        $usuario = "";
        if (isset($dados['usuario'])) {
            $usuario = $dados['usuario'];
        } ?>

        <input type="text" name="usuario" placeholder="Digite seu e-mail" value="<?php echo $usuario; ?>">
        
        <input class="btrecup" type="submit" value="Recuperar" name="SendRecupSenha">

    </form>
    <br>
   <p>Lembrou? <a href="../php/login.php">clique aqui</a> para logar.</p>
   </section>
    </main>
    <script src="../java/munu.js"></script>
</body>

</html>