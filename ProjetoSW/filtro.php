<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/filtro.css">
    <link rel="stylesheet" href="css/estilo.css">
    <title>filto</title>
</head>
<body>
    <div id="filtros">
    <form action="imoveis_controller.php?filtro=1&acao=inserir2" method="post">
       <p>  Republica:</p>
      <ul class="flex">
        <li class="listap">
           Masculina<input type="checkbox" class="inputp" name="sexo[masculino]" value="masculina">
        </li>
        <li class="listap">
            Feminina<input type="checkbox" class="inputp" name="sexo[feminino]" value="feminina">

        </li>
        <li class="listap">
            Mista<input type="checkbox" class="inputp" name="sexo[misto]"  value="mista">
        </li>
      </ul>

      <hr>

      <p>Numero de pessoas: </p>
      <ul class="flex">
        <li class="listap">
           2 pessoas<input type="checkbox" class="inputp" name="pessoas[]" value="2">
        </li>
        <li class="listap">
            6 pessoas<input type="checkbox" class="inputp"  name="pessoas[]" value="6">

        </li>
        <li class="listap">
            8 pessoas<input type="checkbox" class="inputp"  name="pessoas[]" value="8">
        </li>
      </ul>
      <hr>
      <p>Bloco:</p>

      <ul class="flex">
        <div class="div-1f">
        <li class="listap">
           entre 10 e 14<input type="checkbox" class="inputp">
        </li>
        <li class="listap">
            entre 20 e 26<input type="checkbox" class="inputp">

        </li>
        <li class="listap">
            entre 30 e 36<input type="checkbox" class="inputp">
        </li>
        </div>

        <div class="div-2f">
        <li class="listap">
            entre 40 e 46<input type="checkbox" class="inputp">
        </li>
        <li class="listap">
            entre 50 e 56<input type="checkbox" class="inputp">
        </li>

        <li class="listap">
            entre 60 e 63<input type="checkbox" class="inputp">
        </li>
        </div>
      </ul>
      <input type="submit" class="salvar" value="salvar">
    </form>
    </div>

    <script src="SW.js"></script>
</body>
</html>