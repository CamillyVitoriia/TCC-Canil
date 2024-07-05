<?php
session_start();
ob_start();
include_once '../php/conexao.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/png" href="../img/pawprint.png"/>
  <link rel="stylesheet" type="../text/css" href="../css/atualizar_senha.css" media="screen"/>
  <link rel="stylesheet" type="../text/css" href="../css/navBar.css" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">  
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
            <a href="../voluntaro.html" rel="noopener noreferrer"><strong>VOLUNTÁRIO</strong></a>
          </li>

          <li>
            <a href="../politicaprivacidade.html" rel="noopener noreferrer"><strong>POLÍTICA DE <br>
                PRIVACIDADE</strong></a>
          </li>

        </ul>

      </nav>

      <h2 class="nomeMobile">CANIL OSASCO</h2>

      <div id="menu-hamburguer">
        <div class="bar"><img src="./img/menu.png" /></div>
      </div>

      <div id="menu-lateral">
        <span id="fechar-menu" class="fechar-menu"><img src="../img/close.png" /></span>
        <ul>

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
              <img src="img/whatts.png" alt="whatsApp" />
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
<main class="area-redefinir">
      <section class="redefinir">
    <h1>Atualizar senha</h1>

    <?php
    $chave = filter_input(INPUT_GET, 'chave', FILTER_DEFAULT);


    if (!empty($chave)) {
        //var_dump($chave);

        $query_usuario = "SELECT id 
                            FROM usuarios 
                            WHERE recuperar_senha =:recuperar_senha  
                            LIMIT 1";
        $result_usuario = $conn->prepare($query_usuario);
        $result_usuario->bindParam(':recuperar_senha', $chave, PDO::PARAM_STR);
        $result_usuario->execute();

        if (($result_usuario) and ($result_usuario->rowCount() != 0)) {
            $row_usuario = $result_usuario->fetch(PDO::FETCH_ASSOC);
            $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
            //var_dump($dados);
            if (!empty($dados['SendNovaSenha'])) {
                $senha_usuario = password_hash($dados['senha_usuario'], PASSWORD_DEFAULT);
                $recuperar_senha = 'NULL';

                $query_up_usuario = "UPDATE usuarios 
                        SET senha_usuario =:senha_usuario,
                        recuperar_senha =:recuperar_senha
                        WHERE id =:id 
                        LIMIT 1";
                $result_up_usuario = $conn->prepare($query_up_usuario);
                $result_up_usuario->bindParam(':senha_usuario', $senha_usuario, PDO::PARAM_STR);
                $result_up_usuario->bindParam(':recuperar_senha', $recuperar_senha);
                $result_up_usuario->bindParam(':id', $row_usuario['id'], PDO::PARAM_INT);

                if ($result_up_usuario->execute()) {
                    $_SESSION['msg'] = "<p style='color: green'>Senha atualizada com sucesso!</p>";
                    header("Location: login.php");
                } else {
                    echo "<p style='color: #ff0000'>Erro: Tente novamente!</p>";
                }
            }
        } else {
            $_SESSION['msg_rec'] = "<p style='color: #ff0000'>Erro: Link inválido, solicite novo link para atualizar a senha!</p>";
            header("Location: recuperar_senha.php");
        }
    } else {
        $_SESSION['msg_rec'] = "<p style='color: #ff0000'>Erro: Link inválido, solicite novo link para atualizar a senha!</p>";
        header("Location: recuperar_senha.php");
    }

    ?>

    <form method="POST" action="">
        <?php
        $usuario = "";
        if (isset($dados['senha_usuario'])) {
            $usuario = $dados['senha_usuario'];
        } ?>
        <input type="password" name="senha_usuario" id="password" placeholder="Digite a nova senha" value="<?php echo $usuario; ?>" required>
        <div id="icon"></div>

        <input type="password" placeholder="Confirmar nova senha" id="confirm_password" required>

        <input class="btatualizar" type="submit" value="Atualizar" name="SendNovaSenha">
    </form>

    <br>
   <p>Lembrou? <a href="../php/login.php">clique aqui</a> para logar.</p>

    </section>

    </main>
    <script src="../java/confirmarsenha.js"></script>
 </body>

</html>