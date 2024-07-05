<?php

session_start(); 

ob_start(); 

date_default_timezone_set('America/Sao_Paulo');

include_once "../php/conexao.php";

?>
<!DOCTYPE html>
<html lang=pt-br>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="icon" type="image/png" href="../img/pawprint.png"/>
    <link rel="stylesheet" type="text/css" href="../css/cadastro.css">
    <link rel="stylesheet" type="text/css" href="../css/navBar.css" />
    <title>canil osasco</title>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
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
            <a href="https://www.freecodecamp.org/" rel="noopener noreferrer">QUERO ADOTAR</a>
          </li>

          <li>
            <a href="../voluntarios.html" rel="noopener noreferrer">VOLUNTÁRIO</a>
          </li>

          <li>
            <a href="../politicaprivacidade.html" rel="noopener noreferrer">POLÍTICA DE PRIVACIDADE</a>
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
  <?php
  
    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

    if(!empty($dados['SendCaduser'])){
        var_dump($dados);

        $senha_cripto = password_hash($dados['senha_usuario'], PASSWORD_DEFAULT);

        $query_usuario = "INSERT INTO usuarios (nome, Sobrenome, CPF, Telefone, Celular, DataNasc, Genero, usuario, senha_usuario) 
        VALUES (:nome, :Sobrenome, :CPF, :Telefone, :Celular, :DataNasc, :Genero, :usuario, :senha_usuario)";

        $cad_usuario = $conn->prepare($query_usuario);

        $cad_usuario->bindParam(':nome', $dados['nome']);
        $cad_usuario->bindParam(':Sobrenome', $dados['usuario']);
        $cad_usuario->bindParam(':CPF', $dados['CPF']);
        $cad_usuario->bindParam(':Telefone', $dados['Telefone']);
        $cad_usuario->bindParam(':Celular', $dados['Celular']);
        $cad_usuario->bindParam(':DataNasc', $dados['DataNasc']);
        $cad_usuario->bindParam(':Genero', $dados['Genero']);
        $cad_usuario->bindParam(':usuario', $dados['usuario']);
        $cad_usuario->bindParam(':senha_usuario', $senha_cripto);

        $cad_usuario->execute();

        if($cad_usuario->rowCount()){

            $_SESSION['msg'] = "<p style='color: green'>Usuário cadastrado com sucesso!</p>";
            header("Location: login.php");
            exit();
        }else{

            $_SESSION['msg'] = "<p style='color: #f00'>Erro: Usuário não cadastrado com sucesso!</p>";

        }
    }

    if (isset($_SESSION['msg'])) {
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }
    ?>
    <div class="containerdois">
      <h1>Cadastre-se</h1>
      <div class="progress-bar">
      <div class="step">
        <p>Nome</p>
        <div class="bullet">
          <span>1</span>
        </div>
        <div class="check fas fa-check"></div>
      </div>
      <div class="step">
        <p>Contato</p>
        <div class="bullet">
          <span>2</span>
        </div>
        <div class="check fas fa-check"></div>
      </div>
      <div class="step">
        <p>Data</p>
        <div class="bullet">
          <span>3</span>
        </div>
        <div class="check fas fa-check"></div>
      </div>
      <div class="step">
        <p>Enviar</p>
        <div class="bullet">
          <span>4</span>
        </div>
        <div class="check fas fa-check"></div>
      </div>
    </div>
    <div class="form-outer">
      <form action="" method="POST">

        <div class="page slide-page">

          <div class="title">Informação básica:</div>
          <div class="field">
            <div class="label">Primeiro nome</div>
            <input type="text" id="nome" name="nome">
          </div>
          <div class="field">
            <div class="label">Sobrenome</div>
            <input type="text" id="sobrenome" name="Sobrenome">

          </div>
          <div class="field">
            <div class="label">CPF:</div>
            <input type="text" id="cpf" name="CPF" autocomplete="off" oninput="mascara(this)">
          </div>
          <div class="field">
            <button type="button" class="firstNext next">Próximo</button>
          </div>
        </div>
        <div class="page">
          <div class="title">Informações de contato</div>
            
          <div class="field">
            <div class="label">Número de telefone</div>
            <input type="text" name="Telefone" autocomplete="off" maxlength="15" OnKeyPress="formatar('(##) #####-####',this)">
          </div>
          <div class="field">
            <div class="label">Número de celular</div>
            <input type="text" name="Celular" id="celular" autocomplete="off" maxlength="15" OnKeyPress="formatar('(##) #####-####',this)">
          </div>
          <div class="field btns">
            <button type="button" class="prev-1 prev">Anterior</button>
            <button type="button" class="next-1 next">Próximo</button>
          </div>
        </div>

        <div class="page">
          <div class="title">Nascimento:</div>
          <div class="field">
            <div class="label">Data</div>
            <input type="date" id="data" name="DataNasc">
          </div>
          <div class="field">
            <div class="label">Gênero</div>
            <select name="Genero" id="genero">
            <option value="selecionar">selecionar</option>
              <option value="M">Masculino</option>
              <option  value="F">Feminino</option>
              <option  value="Outros">Outros</option>
            </select>
          </div>
          <div class="field btns">
            <button type="button" class="prev-2 prev">Anterior</button>
            <button type="button" class="next-2 next">Próximo</button>
          </div>
        </div>

        <div class="page">
          <div class="title">Detalhes de login:</div>
          <div class="field">
          <div class="label">E-mail</div>
            <input type="E-mail"  id="email" name="usuario"> 
          </div>
          <div class="field">
            <div class="label">Senha</div>
            <input type="password"  id="password" name="senha_usuario">
           
          </div>
          <div class="field">
            <div class="label">Confirme a sua senha</div>
            <input type="password" id="confirm_password">
          </div>
          <div class="field btns">
            <button type="button" class="prev-3 prev">Anterior</button>
            <button type="submit" value="1" name="SendCaduser">Enviar</button>
          </div>
        </div>
      </form>
    </div>
  </div>
    <script src="../java/cadastro.js"></script>
    <script src="../java/munu.js"></script>
    <script src="../java/mascara.js"></script>

  </body>
</html>
