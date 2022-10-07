<?
include_once "conexao.php";
include_once "imoveis.model.php";
include_once "imoveis.service.php";
session_start();
$imoveis = new Imoveis();
$conexao = new Conexao();
$imoveisService = new imoveisService($conexao, $imoveis);
 $tarefas2=$imoveisService->recuperar3($_SESSION['id_usu']);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
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
    <div class="imgre">
    <? 
    $id2=0;
        foreach ($tarefas2 as $key => $row) { ?>
        <img src="<?= $row->imagens ?>" alt="" width="500" height="300" id="image_<?=$id2?>">

    <? $id2++; } ?>
    </div>

        <section id="meu">
            <? $id = 0;
            foreach ($tarefas2 as $key => $row) { ?>
                <? if ($row->id_matricula != $id) { ?>
                    <ul>
                        <li class="info_re"><i class="fa-solid fa-chess-king icone-info" ></i><span class="info_re-span">nome do anfitrião:</span> <?= $row->nome_anfitriao ?></li>
                        <li class="info_re"><i class="fa-solid fa-house icone-info"></i><span class="info_re-span">apto:</span> <?= $row->apartamento ?></li>
                        <li class="info_re"><i class="fa-solid fa-building icone-info"></i><span class="info_re-span">bloco:</span> <?= $row->bloco ?></li>
                        <li class="info_re"><i class="fa-solid fa-person"></i><span class="info_re-span">numero de pessoas:</span> <?= $row->numero_de_pessoas ?></li>
                        <? if ($row->sexo == 'masculina') { ?>
                            <li class="info_re"><i class="fa-solid fa-mars icone-info"></i><span class="info_re-span">Republica:</span> <?= $row->sexo ?></li>
                        <? } ?>
                        <? if ($row->sexo == 'feminina') { ?>
                            <li class="info_re"><i class="fa-solid fa-venus icone-info"></i><span class="info_re-span">Republica:</span> <?= $row->sexo ?></li>
                        <? } ?>
                        <? if ($row->sexo == 'mista') { ?>
                            <li class="info_re"><i class="fa-solid fa-venus-mars icone-info"></i><span class="info_re-span">Republica:</span> <?= $row->sexo ?></li>
                        <? } ?>


                    </ul>
                <? }
                $id = $row->id_matricula; ?>
            <? }  ?>


        
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="SW.js"></script>
    
</body>
</html>
