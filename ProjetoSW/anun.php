<?php
session_start();
if (isset($_GET['criou']) && $_GET['criou'] == 1) {
  $_SESSION['criada'] = 1;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>anunciar vaga</title>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="css/estilo.css">
  <link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css">

</head>

<body>
  <header>
    <nav class="navbar navbar-expand-lg navbar-light  navegacao-1">
      <a class="navbar-brand" href="index.php">
        <img src="images/logo.png" class="logo">
      </a>


      <button class="navbar-toggler" data-toggle="collapse" data-target="#nav-target">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="nav-target">

        <form class="flex">
          <input type="text" placeholder="Universidade - Campus" class="meu form-control">
          <button class="button-principal"><i class="fa-solid fa-magnifying-glass"></i></button>
        </form>

        <ul class="navbar-nav ml-auto nave-principal">

          <li class="li-pri">
            <a class="" href="anun.html"><button type="button" id="botao-vaga">Suas vagas</button></a>
          </li>

          <li class="nav-item li-pri" id="per">
            <i class="fa-solid fa-user perfil" id="perfil"></i>
            <div class="caixa-login-some" id="login">
              <ul>
                <li>
                  <a href="login.html" target="_self" class="entrar">entrar</a>
                </li>
                <hr>
                <li>
                  <a href="" class="cadastre">Cadastre-se</a>
                </li>
              </ul>
            </div>
          </li>

        </ul>

      </div>
    </nav>

  </header>


  <section>
    <div id="div-img">
      <img src="images/logo.png" alt="logo da empresa" id="logo-site">
    </div>
    <h4 class="h4_anu">Crie a sua Republica!</h4>
    <form class="formulario_anuncio" action="imoveis_controller.php?acao=inserir" method="post" enctype="multipart/form-data">
      <div class="anuncio">
        <input type="text" placeholder="nome e sobrenome: " class="in-anu" name="nome_anfitriao" required>
        <br>
        <input type="text" placeholder="Número da matricula:" class="in-anu" name="matricula" required>
        <br>
        <input type="text" placeholder="número de pessoas:" class="in-anu" name="numero_de_pessoas" required>
        <br>
        <input type="text" placeholder="bloco:" class="in-anu" name="bloco" required>
        <br>
        <input type="text" placeholder="apartarmento:" class="in-anu" name="apar" required>
        <br>
        <p class="sexo">Republica:</p>
        <ul class="flex ulsexo">
          <li>Masculina<input type="radio" id="" name="sexo" value="masculina" class="masc"></li>
          <li>Feminina<input type="radio" id="" name="sexo" value="feminina" class="femi"></li>
          <li>Mista<input type="radio" id="" name="sexo" value="mista" class="mista"></li>
        </ul>

        <br>
        <p class="animal">animais:</p>
        <span class="escolha">sim</span>
        <input type="radio" name="animais" class="animais">
        <span class="escolha2">não</span>
        <input type="radio" name="animais" class="animais2">
        <br>
        <label for="re" class="rie">Regras:</label>

        <textarea id="re" name="regras" rows=4 cols="50" class="texto">

            </textarea>
        <label for="foto" class="fide">Fotos de apresentação: </label>
        <input type="file" name="fotoAP" class="fide" required>
        <?if(isset($_GET['erro']) && $_GET['erro']==0){?>
      <p class="erro">O arquivo enviado não é valido, somente envie arquivos jpeg ou png!</p>
      <?}?>

        <button type="submit" class="envia_f">proxímo</button>
      </div>
    </form>
  </section>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="SW.js"></script>
</body>

</html>