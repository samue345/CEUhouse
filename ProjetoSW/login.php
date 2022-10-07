<?
session_start();


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="css/estilol.css">
  <link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css">

</head>

<body id="logado">


    <div id="div-login">
      <img src="images/logo.png" alt="" class="logo">
      <form class="formu-login" action="imoveis_controller.php?acao=logar" method="post">
  
        <button class="botao-login_2"><i class="fa-brands fa-facebook" id="facebook"></i>Continue com o facebook</button>
        <button class="botao-login_2"><i class="fa-brands fa-google" id="google"></i>Continue com o google</button>

        <div class="div-linha">
        <img src="images/linha.png" alt="" class="img_linha"> ou <img src="images/linha.png" alt="" class="img_linha">
        </div>


        <input class="form-login" type="text" id="input-login" placeholder=" Email ou Telefone" name="email">
        <br>
        <input class="form-login_2" type="password" id="input-senha" placeholder=" Senha" name="senha">
        <br>
        <button class="botao-login " type="submit">Login</button>
        <br>
        <a href="" class="senhas">Esqueci minha senha</a>
        <p class="senhas_2">Ainda não tem conta?<a href="cadastrar.php"> cadastre-se</a></p>
        

        </form>
        <?if($_SESSION['autenticado'] == 'nao'){?>
            <p class="p-log">Usuário ou senha incorretos!</p>
        <?}?>
  </div>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
    crossorigin="anonymous"></script>
  <script src="SW.js"></script>
</body>

</html>