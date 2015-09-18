<?php
include('../funcoes.php');
?>


<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plugados</title>
    <link rel="stylesheet" href="../css/foundation.css">
    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="stylesheet" href="../css/estilos.css">



    <script src="../js/scripts.js"></script>
    <script src="../js/vendor/modernizr.js"></script>
    <script src="../js/foundation.min.js"></script>
    <script src="../js/foundation.topbar.js"></script>


</head>

<body>
<div class="banner"></div>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <div class="row medium-centered">
        <div class="large-4 columns">
            <label>Email:
                <input type="text" required name="email" placeholder="Digite o seu email" />
            </label>
        </div>
    </div>
    <div class="row">
        <div class="large-4 columns">
            <label>Senha:
                <input name="senha" required="" type="password" placeholder="Digite sua senha.." />
            </label>
            <label>Re-digite a senha:
                <input name="senha2" required type="password" placeholder="Digite sua senha.." />
            </label>
        </div>

    </div>

    <div class="row">
        <div class="large-5 columns">
            <label>Seu Nome:
                <input name="nome" type="text" placeholder="Digite seu nome completo" />
            </label>

        </div>
    </div>
    <div class="row">
        <div class="large-5 columns">
            <label>
                <input type="submit" required class="button" name="Cadastrar" value="Cadastrar">
            </label>
        </div>
    </div>
    <div class="row">
        <div class="large-5 columns">

            <?php
            if(isset($_POST['Cadastrar'])) {

                $email = $_POST['email'];
                $senha = $_POST['senha'];
                $senha2 = $_POST['senha2'];
                $nome = $_POST['nome'];

                if($senha == $senha2) {

                    $resp = cadastraUsuario($email, $nome, $senha);
                    echo $resp;
                }else{

                    echo '<p class="panel" style="color: red">a senha digitada nos campos deve ser igual a re-digitada</p>';

                }
            }
            ?>


        </div>
    </div>

</form>

<div class="column large-15" style="position: absolute;top: 90%;width: 101%;bottom: 0;">

    <nav class="bgVerde">

        <div class="row" style=" max-width: 1300px; color: #000000;  font-family: tahoma, verdana, arial, sans-serif;">

            <div class="column" style="margin-top: 15px"></div>

            <div class="column">

                <div class="large-5 column">

                    <p class="verdeClaro"><strong>INFORMAÇÕES PARA CONTATO</strong><BR>
                        plugado@dmcard.com.br<br>
                        ou através do ramal 416 com Karen Tamataya</p>

                </div>
                <div class="large-5 column">
                    <div align="right" style="width: 321px;" class=""><img style="width: 80px;" src="../img/logoDM.png" alt=""></div>
                </div>



            </div>
            <div class="column">
                <img style="width: 84%;"  src="../img/barraRodape.png" alt="">
                <div class="logoRodape"></div>
            </div>
            <div class="column">

                <div class="large-5 column">
                    <p class="verdeClaro" style="font-size: 12px">©  Desenvolvido por DMCard Administradora de Cartões de Crédito Ltda. Todos os direitos são reservados.</p>
                </div>
                <div class="large-5 column">
                    <p class="verdeClaro" style="width: 321px;" align="right"><strong>www.dmcard.com.br</strong><BR></p>
                </div>

            </div>


        </div>


    </nav>
</div>


</body>
</html>