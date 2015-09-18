<?php include('../funcoes.php');
if(!isset($_SESSION))
{
    session_start();
}
if($_SESSION['usuario'] == "" ){ header("Location: ../index.php"); };
$nivel = $_SESSION['nivel'];
$usuarioLogado = $_SESSION['usuario']; $usuarioLogado = odbc_fetch_array(odbc_exec($conexao, "SELECT * FROM dbo.usuario WHERE idUsuario = '$usuarioLogado'"));
$idUsuario = $usuarioLogado['idUsuario'];
?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plugado</title>
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
<div class="row">
    <div class="large-5 columns">
        <label>
            <a href="ControlePost.php" class="button success">Voltar</a>
        </label>
    </div>

</div>


<?php

if($nivel <= 2) {

    $query1 = odbc_exec($conexao, "select * from usuario");
    $controle = 0;
}else
{

    $query1 = odbc_exec($conexao, "select * from usuario where idUsuario = '$idUsuario'");
    $controle = 1;
}




while($query = odbc_fetch_array($query1)){
$tipo = $query['tipo'];

?>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

    <div class="row panel" style="max-width: 800px">
    <div class="row medium-centered">
        <div class="large-4 columns">
            <label>Email
                <input type="email" name="email" value="<?php echo $query['email']; ?>" placeholder="Digite seu email para logar" />
                <input type="hidden" name="idUsuario" value="<?php echo $query['idUsuario']; ?>">
            </label>
        </div>
        <div class="large-4 columns">
            <label>nome
                <input type="text" name="usuario" value="<?php echo $query['usuario']; ?>" placeholder="Digite seu usuario" />
            </label>
        </div>
    </div>
    <div class="row">
        <div class="large-4 columns">
            <label>Senha
                <input name="senha" value="<?php echo $query['senha']; ?>" type="password" placeholder="Digite sua senha.." />
            </label>
        </div>

    </div>

    <div class="row">
        <?php  if($controle == 0)
        {  ?>

        <div class="large-2 columns">
            <label>Tipo
            <select class="dropdown" name="tipo">

                <?php
                $tipo = $query['tipo'];
                switch($tipo)
                {
                    case 1: $tipoF = "controle";
                        break;
                    case 2: $tipoF = "Marketing";
                        break;
                    case 3: $tipoF = "RH";
                        break;
                    case 4: $tipoF = "Interno";
                        break;
                    default: $tipoF="acesso invalido";

                }

                ?>

                <option value="<?php echo $query['tipo']; ?>"><?php echo $tipoF ?></option>
                <option value="1">controle</option>
                <option value="2">Marketing</option>
                <option value="3">RH</option>
                <option value="4">Interno</option>

            </select>

            </label>
        </div>

        <?php }
        if($controle == 0){ ?>
        <div class="large-5 columns">
            <label>Ativar conta?
                <?php $ativo = $query['ativo'];
                switch($ativo)
                {

                    case 1: $required = "checked";
                        break;
                    case 0: $required = "";
                        break;
                    default: $required = "";

                }
                ?>
            <input type="checkbox" value="1" <?php echo $required ?> name="ativo">

            </label>
        </div>
        <?php } ?>
    </div>
    <div class="row">
        <div class="large-2 columns">

        </div>
        <div class="large-5 columns">
            <label>
                <input type="submit" class="button" name="entrar" value="Salvar Alterações">
            </label>
        </div>
    </div>

        <div class="row">
            <div class="large-5 columns">
                <label>

                </label>
            </div>
        </div>

    </div>

</form>
<?php } ?>

<div class="column large-15">

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
<?php
if(isset($_POST['entrar']))
{
$logado = 0;
$usuario = $_POST['usuario'];
$senha = $_POST['senha'];
$email = $_POST['email'];
$tipo = 0;
$idUsuario = $_POST['idUsuario'];
if(isset($_POST['tipo']))
{
$tipo = $_POST['tipo'];
}
if(isset($_POST['ativo']))
{
$ativo = $_POST['ativo'];

}

AtualizaUsuario($idUsuario, $usuario, $tipo, $ativo, $email, $senha);


}
?>

</body>
</html>