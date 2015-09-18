<?php

include('../funcoes.php');
if(!isset($_SESSION))
{
    session_start();
}
if($_SESSION['usuario'] == "" ){ header("Location: ../index.php"); };
$nivel = $_SESSION['nivel'];
$usuarioLogado = $_SESSION['usuario']; $usuarioLogado = odbc_fetch_array(odbc_exec($conexao, "SELECT * FROM dbo.usuario WHERE usuario = '$usuarioLogado'"));
$usuario = $usuarioLogado['idUsuario'];

$pergunta = $_GET['valor'];



$query = odbc_exec($GLOBALS['conexao'], "select * from enquete  where pergunta = '$pergunta'");

?>
<form method="post" action="ControlePost.php#tabs-3">
    <div class="row">
        <div class="small-8 columns">
            <div class="row">
                <div class="small-3 columns">
                    <label for="right-label" class="right inline">Pergunta</label>
                </div>
                <div class="small-9 columns">
                    <input type="text" id="right-label" name="pergunta" value="<?php echo $pergunta; ?>"" placeholder="Digite a pergunta">
                </div>
            </div>
        </div>


    </div>

<?php
while($rsQuery = odbc_fetch_array($query)){
?>

    <div class="row">
        <div class="small-8 columns">
            <div class="row">
                <div class="small-3 columns">
                    <label for="right-label" class="right inline">Resposta</label>
                </div>
                <div class="small-6 columns">
                    <input type="text" id="right-label" name="resposta[]" value="<?php echo $rsQuery['resposta']; ?>" placeholder="Digite a resposta">
                    <input type="hidden" name="idEnquete[]" value="<?php echo $rsQuery['idEnquete']; ?>">
                </div>
                <div class="small-3 columns">
                    <label for="right-label" class="right inline">votação: <?php echo $rsQuery['contador'];  ?></label>
                </div>
            </div>
        </div>


    </div>



<?php
}

?><div class="row">
    <div class="small-3 columns">
        <label for="right-label" class="right inline">deseja zerar a pesquisa?</label>
    </div>
    <div class="small-9 columns ">
        <input style="margin-top: 14px;" type="radio" value="1" name="radioResp">
    </div>
    </div>
    <div class="small-8 columns ">
        <input  type="submit" class="success button large-3 right" value="salvar" name="salvarPergunta">
    </div>
    </form>

