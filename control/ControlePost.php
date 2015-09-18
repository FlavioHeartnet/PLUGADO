<?php include('../funcoes.php');
if(!isset($_SESSION))
{
    session_start();
}
if($_SESSION['usuario'] == "" ){ header("Location: ../index.php"); };
$nivel = $_SESSION['nivel'];
$usuarioLogado = $_SESSION['usuario']; $usuarioLogado = odbc_fetch_array(odbc_exec($conexao, "SELECT * FROM dbo.usuario WHERE idUsuario = '$usuarioLogado'"));
$usuario = $usuarioLogado['idUsuario'];

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
    <link rel="stylesheet" href="../css/owl.carousel.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">


    <script src="../js/scripts.js"></script>
    <script type="text/javascript">
        $(function() {
            $( "#tabs" ).tabs();
        });




            </script>
    <script src="../js/vendor/modernizr.js"></script>
    <script src="../js/foundation.min.js"></script>
    <script type="text/javascript" src="../js/nicEdit.js"></script>
    <script type="text/javascript">
        bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
    </script>


</head>

<body style="color: #222222">


<div class="row">
    <div class="large-12 columns">
        <label>
            <h2 class="column alinhar">Gerenciador do Plugado - Home</h2>
            <div class="icon1"></div>

        </label>
    </div>
    <div class="large-3 columns">
        <label>
            <a class="button success" href="alterar-dados.php">Administrar conta</a>

        </label>
    </div>
    <div class="large-2 columns">
        <label>
            <a class="button success" href="../sair.php">Sair</a>

        </label>
    </div>
</div>


<div id="tabs">
    <div class="row">
    <ul>
        <li><a href="#tabs-1" >Posts</a></li>
        <li><a href="#tabs-2">Aniversariantes</a></li>
        <li><a href="#tabs-3">Enquetes</a></li>
        <li><a href="#tabs-4">Funcionarios</a></li>
        <li><a href="#tabs-5">Filmes/Receitas/Livros</a></li>
        <li><a href="#tabs-6">Controle do RH</a></li>
        <li><a href="#tabs-7">Galeria de Fotos</a></li>
    </ul>
    </div>
    <div id="tabs-1">
<div class="panel">
<form action="ControlePost.php?id=#tabs-1" method="post">

    <div class="row">
        <div class="large-12 columns">
            <label><span class="corLaranja"><b>Titulo</b></span>
                <input type="text" name="titulo" placeholder="Digite o titulo do Post">
            </label>
        </div>
    </div>
    <div class="row">
        <div class="large-12 columns">
            <label><span class="corLaranja"><strong>Post fique por dentro</strong></span>
                <textarea style="height: 350px"  class="large-4.columns" name="area1" cols="40"></textarea>
                <span class="right bgAzul">click aqui para marcar como importante</span><input value="1" style="margin-top: 5px;" class="right" type="radio" name="importante">

                <input type="hidden" name="tipo" value="fique">
            </label>
        </div>
    </div>
<br>
    <div class="row">
        <div class="large-12 columns">
                <input type="submit" class="button radius right" name="postar" value="Postar">
        </div>
    </div>

</form>
</div>
<div class="panel">
<form action="ControlePost.php?id=#tabs-1" method="post">

    <div class="row">
        <div class="large-12 columns">
            <label><span class="corLaranja"><b>Titulo</b></span>

                <input type="text" name="titulo" placeholder="Digite o titulo do Post">
            </label>
        </div>
    </div>
    <div class="row">
        <div class="large-12 columns ">
            <label><span class="corLaranja"><strong>Post Acontece nas Lojas</strong></span>
                <textarea style="height: 350px"  class="large-4.columns" name="area1" cols="40"></textarea>
                <input type="hidden" name="tipo" value="Acontece">
            </label>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="large-12 columns">
            <input type="submit" class="button radius right" name="postar" value="Postar">
        </div>
    </div>



</form>
    </div>

<div class="panel">
    <form action="ControlePost.php?id=#tabs-1" method="post">
        <div class="row">
            <div class="large-12 columns">
                <label><span class="corLaranja"><b>Titulo</b></span>

                    <input type="text" name="titulo" placeholder="Digite o titulo do Post">
                </label>
            </div>
        </div>
        <div class="row">
            <div class="large-12 columns ">
                <label><span class="corLaranja"><strong>Post Saúde e bem estar</strong></span>
                    <textarea style="height: 350px"  class="large-4.columns" name="area1" cols="40"></textarea>
                    <input type="hidden" name="tipo" value="saude">
                </label>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="large-12 columns">
                <input type="submit" class="button radius right" name="postar" value="Postar">
            </div>
        </div>



    </form>
</div>

<div class="panel">
    <form action="ControlePost.php?id=#tabs-1" method="post">
        <div class="row">
            <div class="large-12 columns">
                <label><span class="corLaranja"><b>Titulo</b></span>

                    <input type="text" name="titulo" placeholder="Digite o titulo do Post">
                </label>
            </div>
        </div>
        <div class="row">
            <div class="large-12 columns ">
                <label><span class="corLaranja"><strong>Post Lazer e cultura</strong></span>
                    <textarea style="height: 350px"  class="large-4.columns" name="area1" cols="40"></textarea>
                    <input type="hidden" name="tipo" value="lazer">
                </label>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="large-12 columns">
                <input type="submit" class="button radius right" name="postar" value="Postar">
            </div>
        </div>



    </form>
</div>


</div> <!-- tab 1 final -->

    <div id="tabs-2">
        <div class="panel row">
            <div class="large-12 columns">
                <label><span class="corLaranja"><b>Fotos dos Aniversariantes</b></span>

                </label>
            </div>
        <form action="ControlePost.php?id=#tabs-2" method="post" enctype="multipart/form-data">
        <table cellpadding="0" cellspacing="0" border="0">

            <tr>

                <td>1º <input type="file" required name="foto1">tamanho: 118x207</td>
            </tr>
            <tr>

                <td>2º <input type="file" required name="foto2">tamanho: 118x207</td>
            </tr>
            <tr>

                <td>3º <input type="file" required name="foto3">tamanho: 118x207</td>
            </tr>

            <tr>
                <td colspan="3"><input type="submit" name="fotos" class="success button right" ></td>
            </tr>

        </table>

        </form>

        </div>

        <div class="panel row">
            <div class="large-12 columns">
                <label><span class="corLaranja"><b>Aniversariantes do Mês</b></span>
                </label>
            </div>
            <form action="ControlePost.php?id=#tabs-2" method="post" enctype="multipart/form-data">
                <table cellpadding="0" cellspacing="0" border="0">

                    <tr>

                        <td>Coloque aqui abaixo o Cartaz:</td>
                    </tr>
                    <tr>

                        <td><input type="file" required name="foto"></td>
                    </tr>

                    <tr>
                        <td colspan=""><input type="submit" name="niverMes" class="button right" ></td>
                    </tr>

                </table>

            </form>

            <?php

            if(isset($_POST['niverMes']))
            {
                $foto = $_FILES['foto']['name'];
                $foto_temp = $_FILES['foto']['tmp_name'];
                $exteFoto = explode(' ', $foto);
                $num = rand(1,99999);
                $exteFoto_ex2 =$num.strtolower(end($exteFoto));
                move_uploaded_file($foto_temp, $pasta.$exteFoto_ex2);
                $query =  odbc_exec($GLOBALS['conexao'], "update Aniversariantes set nomeFoto = '$exteFoto_ex2' where idNiver = 4");

                if($query == true )
                {
                    odbc_exec($GLOBALS['conexao'], "INSERT INTO [MARKETING].[dbo].[historicoPlugado] ([acao],[usuario],[dataHistorico],[tipoAcao]) VALUES ('Aniversariantes do Mês atualizados ','$usuario',GETDATE(),'aniversariantes')");
                    echo "<script>alert('cartaz salvo com sucesso'); location.href='ControlePost.php'</script>";


                }else{echo "<script>alert('ocorreu um erro'); history.back(-1);</script>";
                    return false;
                }




            }


            ?>


        </div>


    </div>
    <div id="tabs-3">
        <div class="panel row">
            <div class="large-12 columns">
                <label><span class="corLaranja"><b>Cadastrar Enquetes</b></span>

                </label>
            </div>
            <form action="ControlePost.php?id=#tabs-3" method="post">
                <div class="row">
                    <div class="small-8 columns">
                        <div class="row">
                            <div class="small-3 columns">
                                <label for="right-label" class="right inline">Pergunta</label>
                            </div>
                            <div class="small-9 columns">
                                <input type="text" id="right-label" name="pergunta" placeholder="Digite a pergunta">
                            </div>
                        </div>
                    </div>


                </div>

                <div class="row">
                    <div class="small-8 columns">
                        <div class="row">
                            <div class="small-3 columns">
                                <label for="right-label" class="right inline">Adicionar Respostas</label>
                            </div>
                            <div class="small-9 columns">
                                <input type="button" class="button large-4" value="Adicionar" name="adicionar" id="add">
                            </div>
                        </div>
                    </div>

                    <div id="campos">
                    <div class="row">
                    <div class="small-8 columns">
                    <div class="row">
                        <a href="#" class="remove"><strong>X</strong></a>
                        <div class="small-3 columns">
                            <label for="right-label" class="right inline">Resposta</label>
                        </div>
                        <div class="small-9 columns">
                            <input type="text" id="right-label" required name="resposta[]" placeholder="Digite a resposta">
                        </div>


                    </div>

                    </div>
                    </div>

                    </div>
                </div>


                    <div class="columns">

                            <div class="small-8 columns ">
                                <input type="submit" class="success button large-3 right" value="salvar" name="enquete" >
                            </div>

                    </div>


            </form>



        </div>

        <div class="panel row">
            <div class="large-12 columns">
                <label><span class="corLaranja"><b>Editar ou selecionar perguntas</b></span></label>
            </div>
            <?php

            $query = odbc_exec($GLOBALS['conexao'], "select distinct pergunta from enquete ");

            while($rsQuery = odbc_fetch_array($query)){

            ?>
            <div class="row">
            <div class="small-8 columns">
            <div class="row">
                <div class="small-3 columns">
                    <label for="right-label" class="right inline">Pergunta:</label>
                </div>
                <div class="small-9 columns">
                    <a href="#" class="large-4"  data-reveal-id="myModal" onclick="buscaPergunta('<?php echo $rsQuery['pergunta']; ?>')" ><?php echo $rsQuery['pergunta']; ?></a>
                </div>
            </div>
            </div>
        </div>


        <?php } ?>



            <div id="myModal" class="reveal-modal" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
                <h2 id="modalTitle">Enquete da Semana</h2>
                <p class="lead">Edite esta enquete.</p>
                <div id="resultado"></div>


                <a class="close-reveal-modal" aria-label="Close">&#215;</a>
            </div>


    </div>
        </div>


    <div id="tabs-4">
        <form method="post" enctype="multipart/form-data" action="ControlePost.php?id=#tabs-4">
        <div class="panel row">

        <div class="large-12 columns">
            <label><span class="corLaranja"><b>Analise de Credito:</b></span></label>
            <p class="lead">Coloque aqui os destaques da analise de credito</p>
        </div>
            <div class="column large-6">
     <table border="0" cellspacing="0" cellpadding="0">

         <tr>
             <td>Nome: <input type="text" name="nome[]" required="" placeholder="Digite o nome do funcionario"></td>
         </tr>

         <tr>
            <td>Foto: <input type="file" required="" name="destaque1">tamanho: 142x206</td>
        </tr>

     </table>
            </div>
            <div class="large-6 column">
                <table border="0" cellspacing="0" cellpadding="0">

                    <tr>
                        <td>Nome: <input type="text" required="" name="nome[]" placeholder="Digite o nome do funcionario"></td>
                    </tr>

                    <tr>
                        <td>Foto: <input type="file" required="" name="destaque2">tamanho: 142x206</td>
                    </tr>

                </table>
            </div>

        </div>
        <div class="panel row">

            <div class="large-12 columns">
                <label><span class="corLaranja"><b>SAC:</b></span></label>
                <p class="lead">Coloque aqui os destaques do SAC</p>
            </div>
            <div class="column large-6">
                <table border="0" cellspacing="0" cellpadding="0">

                    <tr>
                        <td>Nome: <input type="text" required="" name="nome[]" placeholder="Digite o nome do funcionario"></td>

                    </tr>

                    <tr>
                        <td>Foto: <input type="file" required="" name="destaque3">tamanho: 142x206</td>
                    </tr>

                </table>
            </div>
            <div class="large-6 column">
                <table border="0" cellspacing="0" cellpadding="0">

                    <tr>
                        <td>Nome: <input type="text" required="" name="nome[]" placeholder="Digite o nome do funcionario"></td>

                    </tr>

                    <tr>
                        <td >Foto: <input required="" type="file" name="destaque4">tamanho: 142x206</td>
                    </tr>

                </table>
            </div>

        </div>

        <div class="panel row">

            <div class="large-12 columns">
                <label><span class="corLaranja"><b>Elogios:</b></span></label>
                <p class="lead">Coloque aqui os elogios aos funcionarios</p>
            </div>
            <div class="column large-6">
                <table border="0" cellspacing="0" cellpadding="0">

                    <tr>
                        <td>Nome: <input type="text" required="" name="nome[]" placeholder="Digite o nome do cliente"></td>
                        <td>Mensagem: <input type="text" required="" name="departamento[]" placeholder="Digite a mensagem do cliente"></td>
                    </tr>

                    <tr>
                        <td colspan="2">Foto: <input required="" type="file" name="destaque5">tamanho: 90x103</td>
                    </tr>

                </table>
            </div>
            <div class="large-6 column">
                <table border="0" cellspacing="0" cellpadding="0">

                    <tr>
                        <td>Nome: <input type="text" required="" name="nome[]" placeholder="Digite o nome do cliente"></td>
                        <td>Mensagem: <input type="text" required="" name="departamento[]" placeholder="Digite a mensagem do cliente"></td>
                    </tr>

                    <tr>
                        <td colspan="2">Foto: <input required="" type="file" name="destaque6">tamanho: 90x103</td>
                    </tr>

                </table>
            </div>

            <div class="small-8 columns ">
                <input type="submit" class="button large-3 right" value="salvar" name="funcionario">
            </div>


        </div>

        </form>
        </div>




    <div id="tabs-5">

        <div class="panel row">
            <div class="large-12 columns">
                <label><span class="corLaranja"><b>Filmes:</b></span></label>
                <p class="lead">cadastre dicas para filmes ou series!</p>
            </div>



            <form action="ControlePost.php?id=#tabs-5" method="post" enctype="multipart/form-data">

            <table border="0" cellpadding="0" cellspacing="0">
                <tbody>
                <tr>
                    <td>Nome do Filme: <input type="text" name="nome" placeholder="Digite o nome do filme"></td>
                    <td>Data do Lançamento: <input type="text" name="lancamento"  data-mask="00/00/0000" data-mask-reverse="false"  placeholder="Digite de Lançamento do filme"></td>
                    <td>Duração: <input type="text" name="duracao" placeholder="Digite a duração do filme"></td>
                </tr>

                <tr>
                    <td>Dirigido por: <input type="text" name="dirigido" placeholder="Digite o nome do filme"></td>
                    <td>Genero: <input type="text" name="genero" placeholder="Digite o genero do filme"></td>
                    <td>Foto: <input type="file" name="foto">tamanho: 142x206</td>
                </tr>
                </tbody>

            </table>



            <div class="columns">

                <div class="small-8 columns ">
                    <input type="submit" class="success button large-3 right" value="salvar" name="filme" >
                </div>

            </div>
            </form>


        </div>

        <div class="panel row">
            <div class="large-12 columns">
                <label><span class="corLaranja"><b>Receitas:</b></span></label>
                <p class="lead">cadastre receitas e quem indicou as mesmas aqui!</p>
            </div>

            <form action="ControlePost.php?id=#tabs-5" method="post" enctype="multipart/form-data">

                <table border="0" cellpadding="0" cellspacing="0">
                    <tbody>
                    <tr>
                        <td>Nome da Receita: <input type="text" name="nome" placeholder="Digite o nome da receita"></td>
                        <td>Foto da Raceita <input type="file" name="fotoReceita">tamanho: 206x225</td>
                    </tr>
                    <tr><td colspan="2">Receita: <label>
                                <textarea style="width: 700px; height: 250px" name="receita">
                                    Ingredientes:<br>

                                    -<br>

                                    Modo de Preparo:<br>
                                    -</textarea>
                            </label></td></tr>

                    <tr>
                        <td>Indicado por: <input type="text" name="func" placeholder="Digite o nome de quem indicou a receita"></td>
                        <td>Foto: <input type="file" name="foto"></td>
                    </tr>
                    <tr><td colspan="2">Sobre o funcionario: <label>
                                <textarea style="width: 700px; height: 250px" name="sobre"></textarea>
                            </label></td></tr>

                    <tr><td colspan="2" align="right"><input type="submit" class="success button large-3 right" value="salvar" name="receitas" ></td></tr>
                    </tbody>

                </table>

            </form>




        </div>

        <div class="panel row">
            <div class="large-12 columns">
                <label><span class="corLaranja"><b>Livros:</b></span></label>
                <p class="lead">cadastre dicas para leitura aqui!</p>
            </div>

            <form action="ControlePost.php?id=#tabs-5" method="post" enctype="multipart/form-data">

                <table border="0" cellpadding="0" cellspacing="0">
                    <tbody>
                    <tr>
                        <td>Nome do Livro: <input type="text" name="nome" placeholder="Digite o nome do Livro"></td>
                        <td>Foto do Livro <input type="file" name="foto">tamanho: 250x164</td>
                    </tr>

                    <tr>
                        <td>Nome de quem indicou: <input type="text" name="indicacao" placeholder="Digite o nome de quem indicou o Livro"></td>
                        <td colspan="2" align="right">Sobre o Livro<input type="text" name="sobre" placeholder="Digite sobre o livro brevemente"></td>
                    </tr>


                    </tbody>

                </table>

                <table border="0" cellpadding="0" cellspacing="0">
                    <tbody>
                    <tr>
                        <td>Nome do Livro: <input type="text" name="nome2" placeholder="Digite o nome do Livro"></td>
                        <td>Foto do Livro <input type="file" name="foto2">tamanho: 250x164</td>
                    </tr>

                    <tr>
                        <td>Nome de quem indicou: <input type="text" name="indicacao2" placeholder="Digite o nome de quem indicou o Livro"></td>
                        <td colspan="2" align="right">Sobre o Livro<input type="text" name="sobre2" placeholder="Digite sobre o livro brevemente"></td>
                    </tr>

                    <tr><td colspan="2" align="right"><input type="submit" class="success button large-3 right" value="salvar" name="livro" ></td></tr>

                    </tbody>

                </table>

            </form>




        </div>

    </div>

    <div id="tabs-6">

        <div class="panel row">

            <div class="large-12 columns">
                <label><span class="corLaranja"><b>Controle do RH:</b></span></label>
                <p class="lead">Aqui ficara o gerenciamento de opções do RH!</p>
            </div>
            <div class="panel">
            <form action="ControlePost.php?id=#tabs-6" method="post">


                <div class="row">
                    <div class="large-12 columns">
                        <label>Avisos do RH:
                            <input type="text" required name="aviso" placeholder="Ponha os avisos do RH aqui"></label>
                    </div>
                </div>
                <div class="row">
                    <div class="large-12 columns">
                        <input type="submit" class="button radius right" name="Enviar" value="Enviar">
                    </div>
                </div>

            </form>
            </div>
            <div class="large-12 columns">
                <label><span class="corLaranja"><b>Cadastrar link para download:</b></span></label>
                <p class="lead">Adicione aqui!</p>
            </div>

            <form action="ControlePost.php?id=#tabs-6" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="small-8 columns">
                    <div class="row">
                        <div class="small-3 columns">
                            <label for="right-label" class="right inline">Adicionar links</label>
                        </div>
                        <div class="small-9 columns">
                            <input type="button" class="button large-4" value="Adicionar" name="adicionar" id="add2">
                        </div>
                    </div>
                </div>

                <div id="campos2">
                    <div class="row">
                        <div class="small-8 columns">
                            <div class="row">
                                <a href="#" class="remove"><strong>X</strong></a>
                                <div class="small-3 columns">
                                    <label for="right-label" class="right inline">Nome do link para download</label>
                                </div>
                                <div class="small-9 columns">
                                    <input type="text" id="right-label" required name="links[]" placeholder="digite o link para download">
                                </div>
                                <div class="small-9 columns">
                                    <input type="file" required name="arquivos[]" placeholder="Selecione o arquivo que serão">
                                </div>


                            </div>



                        </div>
                    </div>
                </div>
                <div class="small-9 columns">
                    <input type="submit" class="button right large-4" value="Salvar" name="arquivos">
                </div>
            </div>


                </form>


        </div>

        <div class="panel row">
            <div class="large-12 columns">
                <label><span class="corLaranja"><b>Editar Links</b></span></label>
                <p class="lead">Aqui você pode editar os links</p>
            </div>
            <form action="ControlePost.php?id=#tabs-6" method="post" enctype="multipart/form-data">
            <?php

            $query = odbc_exec($GLOBALS['conexao'], "SELECT TOP 10 [idLinks],[nome],[foto],[ativo] FROM [MARKETING].[dbo].[links]");
            $cont = 0;
            $i = 0;
            $id = array();
            while($rsQuery = odbc_fetch_array($query)){

                $id[$i] = $rsQuery['idLinks'];
                $i++;
            ?>
            <div class="panel">
            <div class="row">
                <div class="small-8 columns">
                    <div class="row">
                        <div class="small-3 columns">
                            <label for="right-label" class="right inline">Nome do link para download</label>
                        </div>
                        <div class="small-9 columns">
                            <input type="text" id="right-label" required name="links[]" value="<?php echo $rsQuery['nome']; ?>" placeholder="digite o link para download">

                        </div>

                        <div class="small-9 columns">
                            <input type="file" name="arquivos[]" value="<?php echo $rsQuery['foto']; ?>" placeholder="Selecione o arquivo que serão">

                        </div>
                        <div class="large-6 columns">
                            <label>Deseja ativar o link na pagina</label>
                            <input type="checkbox" name="check[]" value="1" id="1<?php echo $cont ?>"><label for="1<?php echo $cont ?>">sim</label>
                            <input type="checkbox" name="check[]" value="0" id="0<?php echo $cont ?>"><label for="0<?php echo $cont ?>">não</label>
                        </div>
                        <div class="large-6 columns">
                            <label>caso queira deletar, selecione este box</label>
                            <input type="checkbox" name="del" data-reveal-id="myModal2" onclick="deletarLink('<?php echo $rsQuery['idLinks']; ?>')" value="1" id="deletar<?php echo $cont ?>"><label for="deletar<?php echo $cont ?>">Deletar</label>

                        </div>



                    </div>

                </div>
            </div>
            </div>
            <?php
            $cont++;
            } ?>


            <div class="small-9 columns">
                <input type="submit" class="button right large-4" value="Salvar" name="atualizaLink">
            </div>
            </form>
            <div id="myModal2" class="reveal-modal" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
                <h2 id="modalTitle">Deseja deletar?</h2>
                <p class="lead">deletar link!.</p>
                <form action="ControlePost.php?id=#tabs-6" method="post">
                    <div id="resultado1"></div>


                    <a class="close-reveal-modal" aria-label="Close">&#215;</a>
                    <input type="submit" class="button" value="deletar" name="deletar">
                </form>

            </div>

        </div>

        <div class="panel row">
            <div class="large-12 columns">
                <label><span class="corLaranja"><b>Horario das vans</b></span></label>
                <p class="lead">Insira o horario das vans</p>
            </div>

            <form action="ControlePost.php?id=#tabs-6" method="post" enctype="multipart/form-data">
                <table cellpadding="0" cellspacing="0" border="0">

                    <tr>
                        <td>Coloque aqui abaixo o horario:</td>
                    </tr>
                    <tr>
                        <td><input type="file" required name="foto"></td>
                    </tr>

                    <tr>
                        <td colspan=""><input type="submit" name="vans" class="button right" ></td>
                    </tr>

                </table>

            </form>

        <?php

        if(isset($_POST['vans']))
        {
            $pasta = '../../dmtrade/img/brindes/';
            $foto = $_FILES['foto']['name'];
            $foto_temp = $_FILES['foto']['tmp_name'];
            $exteFoto = explode(' ', $foto);
            $num = rand(1,99999);
            $exteFoto_ex2 =$num.strtolower(end($exteFoto));
            move_uploaded_file($foto_temp, $pasta.$exteFoto_ex2);

            $query =  odbc_exec($GLOBALS['conexao'], "update Aniversariantes set nomeFoto = '$exteFoto_ex2' where idNiver = 5");

            if($query == true)
            {
                odbc_exec($GLOBALS['conexao'], "INSERT INTO [MARKETING].[dbo].[historicoPlugado] ([acao],[usuario],[dataHistorico],[tipoAcao]) VALUES ('Horario das vans atualizado ','$usuario',GETDATE(),'Vans')");
                echo "<script>alert('inserido com sucesso'); location.href='ControlePost.php'</script>";


            }else{echo "<script>alert('ocorreu um erro'); history.back(-1);</script>";
                return false;
            }

        }
        ?>

        </div>

    </div>

    <div id="tabs-7">
        <div class="panel row">

        <div class="large-12 columns">
            <label><span class="corLaranja"><b>Galeria de Fotos</b></span></label>
            <p class="lead">Insira aqui fotos para serem</p>
        </div>

            <form action="ControlePost.php?id=#tabs-7" method="post" enctype="multipart/form-data">
                <table cellpadding="0" cellspacing="0" border="0">

                    <tr>
                        <td>Selecione as fotos:</td>
                    </tr>
                    <tr>
                        <td><input type="file" required name="foto[]" multiple></td>
                    </tr>

                    <tr>
                        <td colspan=""><input type="submit" name="galeria" class="button right" ></td>
                    </tr>

                </table>

            </form>

            <?php
            if(isset($_POST['galeria'])) {

                $fotos = $_FILES['foto'];
                $pasta = '../../dmtrade/img/brindes/';
                $restricao = array('image/jpeg','image/png');
                $msg		= array();
                $errormsg = array(
                    1 => 'O arquivo enviado excede o limite definido na diretiva upload_max_filesize do php.ini.',
                    2 => 'O arquivo excede o limite definido em MAX_FILE_SIZE no formulário HTML.',
                    3 => 'O upload do arquivo foi feito parcialmente.',
                    4 => 'Nenhum arquivo foi enviado.',
                );

                $result = odbc_exec($GLOBALS['conexao'], "SELECT TOP 2000 idGaleria,nomefoto,ativo FROM galeriaFotos");

                $row = odbc_num_rows($result);
                if($row != 0)
                {
                    while ($query2 = odbc_fetch_array($result))
                    {
                        try {
                            $path = "'../dmtrade/img/brindes/'" . $query2['nomefoto'];

                            array_map("unlink", glob($path));
                        } catch (Exception $ex) {
                            die("Erro : {$ex->getMessage()}");
                        }
                    }
                }

                $query2 = odbc_exec($GLOBALS['conexao'], "delete FROM [MARKETING].[dbo].[galeriaFotos]");
                $count = count(array_filter($fotos['name']));


                for ($i = 0; $i < $count; $i++) {

                    $foto2 = $fotos['name'][$i];
                    $type = $fotos['type'][$i];
                    $error = $fotos['error'][$i];
                    $foto_temp2 = $fotos['tmp_name'][$i];
                    $exteFoto = (explode(' ', $foto2));
                    $num = rand(1, 99999);
                    $exteFoto_ex2 = $num . strtolower(end($exteFoto));
                    if ($error != 0) {
                        $msg[] = "<b>$foto2 :</b> " . $errorMsg[$error];
                    }
                    else if (!in_array($type, $restricao)) {
                        $msg[] = "<b>$foto2 :</b> Erro imagem não suportada!";
                    }
                    else{

                        if(move_uploaded_file($foto_temp2, $pasta.$exteFoto_ex2)) {
                            $msg[] = "<b>$foto2 :</b> Upload Realizado com Sucesso!";
                            odbc_exec($GLOBALS['conexao'], "INSERT INTO [MARKETING].[dbo].[historicoPlugado] ([acao],[usuario],[dataHistorico],[tipoAcao]) VALUES ('Galeria de fotos atualizada ','$usuario',GETDATE(),'Galeria')");
                            $query = odbc_exec($GLOBALS['conexao'], "insert into galeriaFotos (nomefoto, ativo) values ('$exteFoto_ex2','1')");
                        }
                        else {
                            $msg[] = "<b>$foto2 :</b> Desculpe! Ocorreu um erro...";
                        }

                    }


                }

                foreach($msg as $pop)
                    echo '<p class="lead">'.$pop.'</p>';

            }
            ?>


        </div>
    </div>

    </div><!--final da tab.-->

<?php include('../rodape.php'); ?>

<?php

if(isset($_POST['postar']))
{
    $area = $_POST['area1'];
    $tipo = $_POST['tipo'];
    $guid = $_SERVER['PHP_SELF'];

    $status = 'open';
    $comentarios = $_POST['importante'];
    $titulo = $_POST['titulo'];
    $post_name = explode(' ', $titulo);


    echo "<script>alert('$area, $tipo');</script>";

   post($usuario,$area, $titulo, $status, $comentarios, $post_name, $guid, $tipo);

}
elseif(isset($_POST['Enviar']))
{
    $aviso = utf8_decode($_POST['aviso']);
    $idUsuario = 1;

    avisoRH($aviso, $idUsuario);
}elseif(isset($_POST['fotos']))
{
    $nome_foto = $_FILES['foto1']['name'];
    $nome_temp = $_FILES['foto1']['tmp_name'];

    $nome_foto2 = $_FILES['foto2']['name'];
    $nome_temp2 = $_FILES['foto2']['tmp_name'];

    $nome_foto3 = $_FILES['foto3']['name'];
    $nome_temp3 = $_FILES['foto3']['tmp_name'];

    $exteFoto = explode(' ', $nome_foto);
    $exteFoto_ex = strtolower(end($exteFoto));

    $exteFoto = explode(' ', $nome_foto2);
    $exteFoto_ex2 = strtolower(end($exteFoto));

    $exteFoto = explode(' ', $nome_foto3);
    $exteFoto_ex3 = strtolower(end($exteFoto));

echo "<script>alert('$exteFoto_ex, $exteFoto_ex2, $exteFoto_ex3');</script>";
    $pasta = '../../dmtrade/img/brindes/';
   move_uploaded_file($nome_temp, $pasta. $exteFoto_ex);  move_uploaded_file($nome_temp, $pasta. $exteFoto_ex2);  move_uploaded_file($nome_temp, $pasta. $exteFoto_ex3);

    aniversariantes($exteFoto_ex, $exteFoto_ex2, $exteFoto_ex3, $usuario);



}elseif(isset($_POST['enquete']))
{
        $pergunta = $_POST['pergunta'];
        $respostas = $_POST['resposta'];

        enquete($pergunta, $respostas, $usuario);


}elseif(isset($_POST['salvarPergunta']))
{

$arrayEnquete = $_POST['idEnquete'];
$arrayRespostas = $_POST['resposta'];
    $pergunta = $_POST['pergunta'];
    $radio = $_POST['radioResp'];



    atualizaEnquete($arrayEnquete, $pergunta, $arrayRespostas, $radio, $usuario);


}elseif(isset($_POST['funcionario']))
{

    $nome = $_POST['nome'];
    $departamento = $_POST['departamento'];
    $pasta = '../../dmtrade/img/brindes/';





    $destaque1 = $_FILES['destaque1']['name'];
    $destaque1_temp = $_FILES['destaque1']['tmp_name'];
    $exteFoto = explode(' ', $destaque1);
    $num = rand(1,99999);
    $exteFoto_ex1 = $num.strtolower(end($exteFoto));
    move_uploaded_file($destaque1_temp, $pasta.$exteFoto_ex1);

    $destaque2 = $_FILES['destaque2']['name'];
    $destaque2_temp = $_FILES['destaque2']['tmp_name'];
    $exteFoto = explode(' ', $destaque2);
    $num = rand(1,99999);
    $exteFoto_ex2 = $num.strtolower(end($exteFoto));
    move_uploaded_file($destaque2_temp, $pasta.$exteFoto_ex2);

    $destaque3 = $_FILES['destaque3']['name'];
    $destaque3_temp = $_FILES['destaque3']['tmp_name'];
    $exteFoto = explode(' ', $destaque3);
    $num = rand(1,99999);
    $exteFoto_ex3 = $num.strtolower(end($exteFoto));
    move_uploaded_file($destaque3_temp, $pasta.$exteFoto_ex3);

    $destaque4 = $_FILES['destaque4']['name'];
    $destaque4_temp = $_FILES['destaque4']['tmp_name'];
    $exteFoto = explode(' ', $destaque4);
    $num = rand(1,99999);
    $exteFoto_ex4 = $num.strtolower(end($exteFoto));
    move_uploaded_file($destaque4_temp, $pasta.$exteFoto_ex4);

    $destaque5 = $_FILES['destaque5']['name'];
    $destaque5_temp = $_FILES['destaque5']['tmp_name'];
    $exteFoto = explode(' ', $destaque5);
    $num = rand(1,99999);
    $exteFoto_ex5 =$num.strtolower(end($exteFoto));
    move_uploaded_file($destaque5_temp, $pasta.$exteFoto_ex5);

    $destaque6 = $_FILES['destaque6']['name'];
    $destaque6_temp = $_FILES['destaque6']['tmp_name'];
    $exteFoto = explode(' ', $destaque6);
    $num = rand(1,99999);
    $exteFoto_ex6 = $num.strtolower(end($exteFoto));
    move_uploaded_file($destaque6_temp, $pasta.$exteFoto_ex6);


    $foto = array($exteFoto_ex1,$exteFoto_ex2,$exteFoto_ex3, $exteFoto_ex4,$exteFoto_ex5, $exteFoto_ex6);

    funcionarios($nome, $departamento, $foto, $usuario);

}elseif(isset($_POST['filme']))
{
    $nome = $_POST['nome'];
    $lancamento = $_POST['lancamento'];
    $duracao = $_POST['duracao'];
    $dirigido = $_POST['dirigido'];
    $genero = $_POST['genero'];
    $pasta = '../../dmtrade/img/brindes/';
    $foto = $_FILES['foto']['name'];
    $foto_temp = $_FILES['foto']['tmp_name'];
    $exteFoto = explode(' ', $foto);
    $num = rand(1,99999);
    $exteFoto_ex =$num.strtolower(end($exteFoto));
    move_uploaded_file($foto_temp, $pasta. $exteFoto_ex);



    filmes($nome, $lancamento, $duracao, $genero, $exteFoto_ex, $dirigido, $usuario);

}elseif(isset($_POST['receitas']))
{

    $pasta = '../../dmtrade/img/brindes/';
    $nome = $_POST['nome'];
    $receita = $_POST['receita'];
    $nomeFunc = $_POST['func'];
    $sobreFunc = $_POST['sobre'];



        $foto = $_FILES['foto']['name'];
        $foto_temp = $_FILES['foto']['tmp_name'];
        $exteFoto = explode(' ', $foto);
        $num = rand(1, 99999);
        $exteFoto_ex = $num . strtolower(end($exteFoto));
        move_uploaded_file($foto_temp, $pasta . $exteFoto_ex);


    $foto2 = $_FILES['fotoReceita']['name'];
    $foto_temp2 = $_FILES['fotoReceita']['tmp_name'];
    $exteFoto = explode(' ', $foto2);
    $num = rand(1,99999);
    $exteFoto_ex2 =$num.strtolower(end($exteFoto));
    move_uploaded_file($foto_temp2, $pasta.$exteFoto_ex2);



    receita($exteFoto_ex2,$nome,$receita,$nomeFunc,$sobreFunc, $exteFoto_ex, $usuario);

}elseif(isset($_POST['livro']))
{

    $nome = $_POST['indicacao'];
    $nomeLivro = $_POST['nome'];
    $sobre = $_POST['sobre'];
    $pasta = '../../dmtrade/img/brindes/';

    if($nome != "") {


        $foto = $_FILES['foto']['name'];
        $foto_temp = $_FILES['foto']['tmp_name'];
        $exteFoto = explode(' ', $foto);
        $num = rand(1, 99999);
        $exteFoto_ex = $num . strtolower(end($exteFoto));
        move_uploaded_file($foto_temp, $pasta . $exteFoto_ex);
    }

    $nome2 = $_POST['indicacao2'];
    $nomeLivro2 = $_POST['nome2'];
    $sobre2 = $_POST['sobre2'];

    if($nome2 != "") {

        $foto2 = $_FILES['foto2']['name'];
        $foto_temp2 = $_FILES['foto2']['tmp_name'];
        $exteFoto = explode(' ', $foto2);
        $num = rand(1, 99999);
        $exteFoto_ex2 = $num . strtolower(end($exteFoto));
        move_uploaded_file($foto_temp2, $pasta .$exteFoto_ex2);
    }

    livros($nome,$nomeLivro,$sobre,$exteFoto_ex,$nome2,$nomeLivro2,$sobre2,$exteFoto_ex2, $usuario);



}elseif(isset($_POST['arquivos'])){


   $nome =  $_POST['links'];
   $fotos = $_FILES['arquivos'];
   $pasta = '../../dmtrade/img/brindes/';
    $array = array();
   for($i = 0 ; $i < count($nome); $i++)
   {
       $foto2 = $fotos['name'][$i];
       $foto_temp2 = $fotos['tmp_name'][$i];
       $exteFoto = explode(' ', $foto2);
       $num = rand(1, 99999);
       $exteFoto_ex2 = $num . strtolower(end($exteFoto));
       //move_uploaded_file($foto_temp2, $pasta .$exteFoto_ex2);
       echo "<script>alert('$exteFoto_ex2');</script>";
       $array[$i] = $exteFoto_ex2;
   }

    links($nome ,$array, $usuario);

}elseif(isset($_POST['atualizaLink']))
{
    $nome =  $_POST['links'];
    $check =  $_POST['check'];
    $fotos = $_FILES['arquivos'];
    $pasta = '../../dmtrade/img/brindes/';
    $array = array();

    for($i = 0 ; $i < count($nome); $i++)
    {
        $foto2 = $fotos['name'][$i];
        $foto_temp2 = $fotos['tmp_name'][$i];
            $exteFoto = explode(' ', $foto2);
            $num = rand(1, 99999);
            $exteFoto_ex2 = $num . strtolower(end($exteFoto));
        if($foto2 != "") {
            //move_uploaded_file($foto_temp2, $pasta .$exteFoto_ex2);
            $array[$i] = $exteFoto_ex2;
        }else {

            $array[$i] = "";
        }

    }

    atualizalinks($nome , $array, $id, $check, $usuario);

}elseif(isset($_POST['deletar']))
{

    $link = $_POST['idLink'];
    deletaLinks($link, $usuario);


}

?>

<script type="text/javascript">

    $(document).ready(function()
    {

        $('#add').click(function(e)
        {
            e.preventDefault();
            $('#campos').append("<div class='row'><a href='#' class='remove'><strong>X</strong></a><div class='small-8 columns'> <div class='row'> <div class='small-3 columns'> <label for='right-label' class='right inline'>Resposta</label> </div> <div class='small-9 columns'> <input required type='text' id='right-label' name='resposta[]' placeholder='Digite a resposta'> </div> </div> </div></div>");

        });



        $('#campos').on("click",".remove",function(e) {
            e.preventDefault();
            $(this).parent('div').remove();

        });




        $('#add2').click(function(e)
        {
            e.preventDefault();
            $('#campos2').append('<div class="row"><div class="small-8 columns"> <div class="row"> <a href="#" class="remove"><strong>X</strong></a> <div class="small-3 columns"> <label for="right-label" class="right inline">Nome do link para download</label> </div> <div class="small-9 columns"> <input type="text" id="right-label" required name="links[]" placeholder="digite o link para download"> </div> <div class="small-9 columns"> <input type="file" required name="arquivos[]" placeholder="Selecione o arquivo que serão"> </div> </div> </div></div>');
             });



        $('#campos2').on("click",".remove",function(e) {
            e.preventDefault();
            $(this).parent('div').remove();

        });



        $(document).foundation();

        $('botao1').click(function(){

            $('#myModal2').foundation('reveal', 'close');


        });


    });
    var req2;
    function buscaPergunta(valor) {

// Verificando Browser
        if(window.XMLHttpRequest) {
            req2 = new XMLHttpRequest();
        }
        else if(window.ActiveXObject) {
            req2 = new ActiveXObject("Microsoft.XMLHTTP");
        }

// Arquivo PHP juntamente com o valor digitado no campo (método GET)
        var url = "exibirPerguntas.php?valor="+valor;


// Chamada do método open para processar a requisição
        req2.open("get", url, true);

// Quando o objeto recebe o retorno, chamamos a seguinte função;
        req2.onreadystatechange = function() {

            // Exibe a mensagem "Buscando Noticias..." enquanto carrega
            if(req2.readyState == 1) {
                document.getElementById('resultado').innerHTML = 'Buscando pergunta...';
            }

            // Verifica se o Ajax realizou todas as operações corretamente
            if(req2.readyState == 4 && req2.status == 200) {

                // Resposta retornada pelo busca.php
                var resposta2 = req2.responseText;

                // Abaixo colocamos a(s) resposta(s) na div resultado
                document.getElementById('resultado').innerHTML = resposta2;
            }
        };
        req2.send(null);
    }

    function deletarLink(valor) {

        $('#resultado1').append('<input type="hidden" name="idLink" value="'+valor+'">');

    }



</script>

</body>
</html>