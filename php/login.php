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
  <link rel="stylesheet" type="text/css" href="../css/login.css" media="screen" />
  <link rel="stylesheet" type="text/css" href="../css/navBar.css" />
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
        <a href="../doacaopets.html" rel="noopener noreferrer"><strong>QUERO ADOTAR</strong></a>
      </li>

      <li>
        <a href="../voluntarios.html" rel="noopener noreferrer"><strong>VOLUNTÁRIO</strong></a>
      </li>

      <li>
        <a href="../politicaprivacidade.html" rel="noopener noreferrer"><strong>POLÍTICA DE <br>
            PRIVACIDADE</strong></a>
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
        <a href="../quemomos.html" rel="noopener noreferrer">QUEM SOMOS</a>
      </li>

      <li>
        <a href="../doacaopets.html" rel="noopener noreferrer">QUERO ADOTAR</a>
      </li>

      <li>
        <a href="../voluntario.html" rel="noopener noreferrer">VOLUNTÁRIO</a>
      </li>

      <li>
        <a href="politicaprivacdade.html" rel="noopener noreferrer">POLÍTICA DE PRIVACIDADE</a>
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

<div class='container'>
  <div class='card'>
    <h1> Acesse sua conta </h1>

    <?php
    
    $dados= filter_input_array(INPUT_POST, FILTER_DEFAULT);

    if(!empty($dados['SendLogin'])){
        //var_dump($dados);
      $query_usuario = "SELECT id,nome,usuario, senha_usuario FROM usuarios WHERE usuario =:usuario LIMIT 1 ";
      $result_usuario = $conn->prepare($query_usuario);
      $result_usuario->bindParam(':usuario',$dados['usuario'], PDO::PARAM_STR);
      
      $result_usuario->execute();

      if(($result_usuario) AND ($result_usuario->rowCount() !=0)){
        $row_usuario = $result_usuario->fetch(PDO::FETCH_ASSOC);
       // var_dump($row_usuario);

        if(password_verify($dados['senha_usuario'],$row_usuario['senha_usuario'])){
          echo "Usuário logado";
        $_SESSION['id'] = $row_usuario['id'];
        $_SESSION['nome'] = $row_usuario['nome'];
        header("Location: teste10/galeria.html ");
        
        }else{
          
        $_SESSION['msg'] = "<p style='color: #FF0000'>Erro: E-mail ou senha inválidos!</p>";
        }
      }else{

        $_SESSION['msg'] = "<p style='color: #FF0000'>Erro: E-mail ou senha inválidos!</p>";
      }
    }
    if(isset($_SESSION['msg'])){
      echo $_SESSION['msg'];
      unset ($_SESSION['msg']);
    }
    ?>

    <form method="POST" action=""> 
    <div id='msgError'></div>
    
    <div class='label-float'>
      <input type='text' name="usuario" id='usuario' paceholder='' value="<?php if(isset($dados['usuario'])){ echo $dados['usuario']; } ?>" required>
      <label id='userLabel' for='usuario'>Digite seu e-mail</label>
    </div>
    
    <div class='label-float'>
      <input type='password'  name="senha_usuario" id='senha' paceholder='' value="<?php if(isset($dados['senha_usuario'])){ echo $dados['senha_usuario']; } ?>" required>
      <label id='senhaLabel' for='senha'>Digite sua senha</label>
      <i class="fa fa-eye" aria-hidden="true"></i>
    </div>

    <div class="bottom">
      <div class="esquerda">
      <input type="checkbox" id="remember" name="remember">
      <label for="remember">Mantenha-me conectado</label>

      </div>
      <div class="direita">
      <label><a href="recuperar_senha.php">Esqueci minha senha</a></label>
      </div>
      </div>
    
    <div class='justify-center'>
    <input class="btnacessar" type="submit" name="SendLogin" value="Entrar">
 </div>
</form>
    
    <div class='justify-center'>
      <hr>
    </div>
    
    <p> Não tem uma conta?
      <a href="cadastro.php">Cadastre-se </a></p>
    
  </div>
  </div>
  <script src="../java/login.js"></script>
</body>
</html>