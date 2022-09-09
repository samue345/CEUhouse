<?php
$acao = 'recuperar';
require_once "imoveis_controller.php";

//echo '<pre>';
//print_r($tarefas2);
//echo '<pre/>';


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pagina inicial</title>

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
            <a class="" href="anun.php"><button type="button" id="botao-vaga">Anunciar sua vaga</button></a>
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
                  <a href="cadastrar.html" class="cadastre">Cadastre-se</a>
                </li>
              </ul>
            </div>
          </li>

        </ul>

      </div>
    </nav>

  </header>
  <nav class=" navegacao">
    <ul class="flex ul-2">
      <li class="lista-2" id="filtro"><i class="fa-solid fa-bars"></i> filtros </li>
      <li class="lista-2">
        <a href="" class="link-li2">sobre</a>
      </li>
      <li class="lista-2">
        <a href="" class="link-li2">favoritos</a>
      </li>
      <li class="lista-2">
        <a href="" class="link-li2">Contato</a>
      </li>
      <li class="lista-2">
        <a href="" class="link-li2">Historia</a>
      </li>
      <li class="lista-2">
        <a href="" class="link-li2">Melhores avaliações</a>
      </li>
    </ul>

  </nav>

  <!--  
  <div class="grid_d">
    <?/* foreach ($tarefas as $key => $tarefa) { ?>
      <?php $id = $tarefa->id_matricula; ?>

      <div class="index_card" id="imovel_<?= $tarefa->id_matricula ?>" onclick="location.href='minharep.php?id=<?= $tarefa->id_matricula ?>'">
        <section class="seim">
          <img src="<?= $tarefa->fotos ?>" alt="" width="276" height="200" class="imgf">

        </section>

        <section class=" info">

          <ul>
            <li class="lista-card">nome do anfitrião: <?= $tarefa->nome_anfitriao ?></li>
            <li class="lista-card">bloco: <?= $tarefa->bloco ?></li>
            <li class="lista-card">apartamento: <?= $tarefa->apartamento ?></li>
            <li class="lista-card">numero de pessoas: <?= $tarefa->numero_de_pessoas ?></li>
          </ul>


        </section>

      </div>

    <? }*/ ?>
  </div>
  !-->
  <div class="grid_d">
    <?
    $j = 0;
    $mat = 0;
    foreach ($tarefas2 as $key => $imovel) {
      $id = $imovel->id_matricula ?>
   

        <div class="container-fluid bg-warning">
          <div class="row justify-content-center mb-2">
            <div class="col-lg-10">
              <div id="demo<?= strval($j) ?>" class="carousel slide" data-ride="carousel">

                <!-- Indicators -->
                <ul class="carousel-indicators">
                  <?php
                  $i = 0;
                  foreach ($tarefas2 as $key => $row) {
                    $actives = '';
                    if ($i == 0) {
                      $actives = 'active';
                    }

                  ?>
                    <li data-target="#demo<?= strval($j) ?>" data-slide-to="<?= $i; ?>" class="<?= $actives; ?>"></li>
                  <?php $i++;
                  } ?>
                </ul>

                <!-- The slideshow -->
                <div class="carousel-inner">
                  <?php
                  $i = 0;
                  foreach ($tarefas2 as $key => $row) {
                    $actives = '';
                    if ($i == 0) {
                      $actives = 'active';
                    }
                  ?>
                    <div class="carousel-item <?= $actives; ?>">
                      <? if ($id == $row->id_matricula) { ?>
                        <img src="<?= $row->imagens ?>" width="200" height="200">
                      <? } ?>
                    </div>
                  <? $i++;
                  } ?>
                </div>
                <!-- Left and right controls -->
                <a class="carousel-control-prev" href="#demo<?= strval($j) ?>" data-slide="prev">
                  <span class="carousel-control-prev-icon"></span>
                </a>
                <a class="carousel-control-next" href="#demo<?= strval($j) ?>" data-slide="next">
                  <span class="carousel-control-next-icon"></span>
                </a>

              </div>

            </div>
          </div>
        </div>
  </div>
      <? if ($imovel->id_matricula != $mat) { ?>
        <?= $imovel->id_matricula ?>
        <?= $imovel->apartamento ?>
        <?= $imovel->bloco ?>
        <?= $imovel->matricula ?>
        <? $mat = $imovel->id_matricula ?>
      <? } ?>


    <? $j++;
    } ?>
    <footer id="rodapé" class="flex">
      <ul id="ul-r" class="flex">
        <li class="li-ro"><a href="#" class="link-ro">Politica de privacidade <i class="fa-solid fa-arrow-right"></i></a></li>
        <li class="li-ro"><a href="#" class="link-ro">Termos e condições de uso <i class="fa-solid fa-arrow-right"></i></a></li>
        <li class="li-ro"><a href="#" class="link-ro"> Política de Cookies <i class="fa-solid fa-arrow-right"></i></a></li>
        <li class="li-ro"><a href="#" class="link-ro">Manual do usuário <i class="fa-solid fa-arrow-right"></i></a></li>
      </ul>
      <ul>

        <ul class="flex" id="ul-ro2">
          <li class="li-ro2"><a href="#" class="link-ro2"><i class="fa-brands fa-facebook-f fa-lg" class="icone"></i></a></li>
          <li class="li-ro2"><a href="#" class="link-ro2"><i class="fa-brands fa-instagram fa-lg" class="icone"></i></a></li>
          <li class="li-ro2"><a href="#" class="link-ro2"><i class="fa-brands fa-linkedin-in fa-lg" class="icone"></i></a></li>
        </ul>


    </footer>




    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="SW.js"></script>
</body>

</html>