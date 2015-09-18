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
            <label>Email
                <input required type="email" name="email" placeholder="Digite o seu email" />
            </label>
        </div>
    </div>


    <div class="row">
        <div class="large-3 columns">
            <label>
                <input type="submit" class="button" name="esqueci" value="Recuperar">
            </label>
        </div>
        <div class="large-3 ">
            <label>
                <p><?php
                    if(isset($_POST['esqueci']))
                    {
                        $email = $_POST['email'];

                        $respo =  esqueciSenha($email);
                        echo $respo;

                    }
                    ?></p>
            </label>
        </div>
    </div>

</form>

<div class="column large-15" style="position: absolute;top: 72%;width: 101%;bottom: 0;">

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