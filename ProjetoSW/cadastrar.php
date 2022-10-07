<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilo.css">
    <title>Document</title>
</head>
<body>
    <form action="imoveis_controller.php?acao=usuario" class="formulario-cadastro" method="post">
        <h4 class="h1_cadastro">Cadastro</h4>
        <input type="text" name="" id="" class="nome_usuario" placeholder="nome completo" name="name-usu">
        <br>
        <input type="text" class="email_usuario" placeholder="email" name="email-u">
        <br>
        <input type="password" class="email_usuario" placeholder="senha" name="senha-u">
        <br>
        <input type="date" name="" id="" class="data_usuario">
        <br>
        <input type="checkbox" name="" class="check_politicas" id="check">
        <label for="check">
            <p class="para-polticas">Estou de acordo com os termos de uso e ciente 
             <br>
            das políticas de privacidade da CEUhouse</p>
                
        </label>
        <input type="submit" value="cadastrar" class="cadastro_envio">
        <?if(isset($_GET['existe']) && $_GET['existe'] == 1){?>

            <p class="cor_c">o email cadastrado já existe!</p>
            <?}?>
    </form> 
</body>
</html>
