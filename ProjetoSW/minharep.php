<?
include_once "conexao.php";
include_once "imoveis.model.php";
include_once "imoveis.service.php";
$imoveis = new Imoveis();
$id2 = $_GET['id'];
$conexao = new Conexao();
$imoveisService = new imoveisService($conexao, $imoveis);
$tarefas = $imoveisService->recuperar2($id2);


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
    <h5>Republica:</h5>
    <div class="cont bg-warning">
        <div class="row justify-content-center mb-2">
        <div class="col-lg-10">
            <div id="demo" class="carousel slide" data-ride="carousel">

                <!-- Indicators -->
                <ul class="carousel-indicators">
                    <? $i = 0;
                    foreach ($tarefas as $row) {
                        $actives = '';
                        if ($i == 0) {
                            $actives = 'active';
                        }
                    ?>
                        <li data-target="#demo" data-slide-to="<?= $i ?>" class="<?= $actives ?>"></li>

                </ul>
            <? $i++;
                    } ?>

            <!-- The slideshow -->
            <div class="carousel-inner">
                <?php
                $i = 0;
                foreach ($tarefas as $row) {
                    $actives = '';
                    if ($i == 0) {
                        $actives = 'active';
                    }
                ?>
                    <div class="carousel-item <?= $actives; ?>">
                        <img src="<?= $row->imagens ?>" width="400" height="400">
                    </div>
                    <? $i++;} ?>

            </div>

                    <!-- Left and right controls -->
                    <a class="carousel-control-prev" href="#demo" data-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </a>
                    <a class="carousel-control-next" href="#demo" data-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </a>

            </div>
            </div>
        </div>
    </div>
    <section>
        <?$id=0;
        foreach($tarefas as $key => $row){?>
            <?if($row->id_matricula != $id){?>
                <ul>
                   <li class="info_re"> <p class="info_re-span">nome do anfitrião:</p><?=$row->nome_anfitriao?></li>
                    <li class="info_re"><p class="info_re-span">apartamento:</p><?=$row->apartamento?></li>
                    <li class="info_re"><p class="info_re-span">bloco:</p><?=$row->bloco?></li>
                    <li class="info_re"><p class="info_re-span">numero de pessoas da Republica:</p> <?=$row->numero_de_pessoas?></li>
                    <li class="info_re"><p class="info_re-span">Republica:</p><?=$row->sexo?></li>

                </ul>
                <?} $id=$row->id_matricula; ?>
       <? }?>
    </section>
    <footer id="rodapé" class="flex">
        <ul id="ul-r" class="flex">
        <li><a href="#">Politica de privacidade</a></li>
       <li><a href="#">Termos e condições de uso</a></li>
       <li><a href="#"> Política de Cookies</a></li>
       <li><a href="#">Manual do usuário</a></li>
        </ul>
        <ul class="flex">
       <li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
       <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
       <li><a href="#"><i class="fa-brands fa-linkedin-in"></i></a></li>
        </ul>
    </footer>
 





        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script src="SW.js"></script>
</body>

</html>