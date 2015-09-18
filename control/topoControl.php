<?php

if(!isset($_SESSION))
{
    session_start();
}
if($_SESSION['usuario'] == "" ){ header("Location: ../index.php"); };
$nivel = $_SESSION['nivel'];
$usuarioLogado = $_SESSION['usuario']; $usuarioLogado = odbc_fetch_array(odbc_exec($conexao, "SELECT * FROM dbo.usuario WHERE usuario = '$usuarioLogado'"));
$usuario = $usuarioLogado['idUsuario'];
?>
<nav  class="top-bar bgVerde" data-topbar role="navigation">
    <ul class="title-area">

        <li class="toggle-topbar menu-icon"><a data-dropdown="hover1" data-options="is_hover:true; hover_timeout:5000" href="#">Menu</a></li>

    </ul>


    <ul class="menu row" style="max-width: 1300px">
        <li><a href="index.php">Home</a></li>
        <li><a href="Fique-por-dentro.php">Fique por dentro</a></li>
        <li><a href="RH.php">RH</a></li>
        <li><a href="aniversariantes.php">Aniversariantes</a></li>
        <li><a href="Enquete.php">pesquisas/enquetes</a></li>
        <li><a href="Acontece-lojas.php">acontece nas lojas</a></li>
        <li><a href="saude-lazer.php">saúde e bem estar</a></li>
        <li><a href="cultura.php">lazer e cultura</a></li>
        <li><a href="">galeria de fotos</a></li>

    </ul>

</nav>