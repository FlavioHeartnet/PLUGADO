
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Plugado</title>
    <link rel="stylesheet" href="css/foundation.css">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/owl.carousel.css">


    <script src="js/scripts.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/vendor/modernizr.js"></script>
    <script src="js/foundation.min.js"></script>
    <script src="js/foundation.topbar.js"></script>


</head>

<body>

<?php include('topo.php'); ?>
<div class="row" style="color: #242424; max-width: 1300px">

    <div class="medium-10 large-4 column" >
        <!-- noticia numero 1 -->

        <?php $sql = odbc_exec($conexao, "SELECT top 3 * FROM Post where tipo = 'fique' and comentarios = '' ");

        while($Rsql = odbc_fetch_array($sql)){
            ?>

            <div class="medium-10"><p class="column corLaranja alinhar" >FIQUE POR DENTRO</p>
                <h2 class="column"><?php echo $Rsql['post_title']; ?></h2>
                <div class="icon1"></div>
                <p class="text-justify"><?php echo $Rsql['post_content']; ?></p>


            <div class="barra "></div>

        </div>

        <?php } ?>

    </div>




    <!-- coluna numero 2 -->
    <?php $sql = odbc_exec($conexao, "SELECT top 1 * FROM  Post where tipo = 'fique' and comentarios = 1");

    while($Rsql = odbc_fetch_array($sql)){
    ?>

    <div class="medium-10 large-4 column ">
        <p class="column corLaranja alinhar">FIQUE POR DENTRO</p>
        <h2 class="column" ><?php echo $Rsql['post_title']; ?></h2>
        <div class="icon1"></div>
            <p class="text-justify"><?php echo $Rsql['post_content']; ?></p>
        </div>
    <?php } ?>

    <!-- coluna numero 3 -->
    <div class="medium-10 large-4 column ">
        <?php $sql = odbc_exec($conexao, "SELECT TOP 1 idRH,aviso,idUsuario,dataAviso FROM  avisoRH");

        while($Rsql = odbc_fetch_array($sql)){
        ?>
        <div class="medium-10 large-4 ">
            <div class="avisos">
                <p class="textoAvisos large-10" style="position: relative;top: 56px; left: 15px;"><?php echo utf8_encode($Rsql['aviso']) ?></p>

            </div>
            <div class="barra"></div>
        </div>
        <?php } ?>
        <div class="medium-10">
            <p class="column corLaranja alinhar">ANIVERSARIANTES</p>
            <h2 class="column" style="line-height: 1" >Aniversariantes da semana</h2>

            <div class="icon1"></div>

            <div class="owl-carousel column">

                <?php

                $query = odbc_exec($conexao, "SELECT TOP 3 * FROM Aniversariantes");

                while($Rsql = odbc_fetch_array($query)) {

                    if ($Rsql['nomeFoto']!=""){

                        ?>
                        <div class="item"><img src="../dmtrade/img/brindes/<?php echo $Rsql['nomeFoto']; ?>" alt=""></div>

                    <?php
                    }else
                    {
                        ?>
                        <div class="item"><img src="img/niver.png" alt=""></div>
                        <?php
                    }


                }
                ?>


            </div>


        </div>

        <div class="column">
            <div class="barra"></div>
            <p class="column corLaranja alinhar">Etiqueta da Semana</p>

            <?php $query = odbc_exec($conexao, "select * from enquete where ativo = 1");

            $titulo = odbc_fetch_array($query);

            $query = odbc_exec($conexao, "select * from  enquete  where ativo = 1");

            ?>

            <h2 class="column" ><?php echo $titulo['pergunta'] ?></h2>
            <div class="icon1"></div>
            <ul>
                <?php

                if(!isset($_COOKIE['enquete'])) {

                    while ($Rsql = odbc_fetch_array($query)) {
                        ?>

                        <li>
                            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post"><input type="hidden"
                                                                                                   value="<?php echo $Rsql['idEnquete']; ?>" name="idEnquete"><input
                                    class="" type="radio" value="1" name="check"><?php echo $Rsql['resposta']; ?></form>
                        </li>
                    <?php

                    }
                }else
                {

                    ?>
                        <h5>Obrigado pela resposta</h5>
                        <p>Em breve será lançado o resultado</p>


                    <?php

                }

                ?>
            </ul>
            <div id="loading"></div>
            <div class="barra"></div>
        </div>

    </div>




</div>

<nav class="bgVerde"> <!-- barra verde com score de analistas-->

     <div class="row" style=" max-width: 1300px">


         <p class="column alinhar">15 de Maio</p>
         <h2 class="column" style="color: #ffffff">Destaques do mês</h2>
         <div class="icon2"></div>



             <div class="large-4 column">
                 <p><strong>Analise de crédito</strong></p>

                 <?php

                 $query = odbc_fetch_array(odbc_exec($conexao,"SELECT *  FROM  funcionarios where idfuncionario = 1"));

                 ?>
                 <div class="large-6 column">
                     <div  class="imagens">
                         <div class="logorank logorank1"><span style=" position: relative; left: 20px; top: 8px; font-size: 22px;">1º</span></div>
                         <img class="imagens" src="../dmtrade/img/brindes/<?php echo $query['foto']; ?>" alt="">

                     </div>

                     <p class="textoAvisos"><strong><?php echo $query['nome']; ?></strong><br><span>Analise de Credito</span></p>

                 </div>

                 <?php

                 $query = odbc_fetch_array(odbc_exec($conexao,"SELECT * FROM  funcionarios where idfuncionario = 2"));

                 ?>

                 <div class="large-6 column">
                 <div  class="imagens ">

                     <div class="logorank logorank1"><span style=" position: relative; left: 20px; top: 8px; font-size: 22px;">2º</span></div>
                     <img class="imagens" src="../dmtrade/img/brindes/<?php echo $query['foto']; ?>" alt="">

                 </div>
                 <p class="textoAvisos"><strong><?php echo $query['nome']; ?></strong><br><span>Analise de Credito</span></p>
                 </div>


                 <div></div>

             </div>
             <div class="large-4 column">

                 <?php

                 $query = odbc_fetch_array(odbc_exec($conexao,"SELECT * FROM  funcionarios where idfuncionario = 3"));

                 ?>

                 <div class="large-5 column">
                     <p><strong>SAC</strong></p>
                     <img class="imagens" src="../dmtrade/img/brindes/<?php echo $query['foto']; ?>" alt="">
                     <p class="textoAvisos"><strong><?php echo $query['nome']; ?></strong><br><span>Analise de Credito</span></p>
                 </div>

                 <?php

                 $query = odbc_fetch_array(odbc_exec($conexao,"SELECT * FROM  funcionarios where idfuncionario = 4"));

                 ?>
                 <div class="large-5 column">
                     <p><strong>SAC</strong></p>
                     <img class="imagens" src="../dmtrade/img/brindes/<?php echo $query['foto']; ?>" alt="">
                     <p class="textoAvisos"><strong><?php echo $query['nome']; ?></strong><br><span>Analise de Credito</span></p>
                 </div>



             </div>

         <?php

         $query = odbc_fetch_array(odbc_exec($conexao,"SELECT * FROM  funcionarios where idfuncionario = 5"));

         ?>

             <div class="large-4 column">
                 <p><strong>ELOGIO</strong></p>
                 <div id="page1" class="large-9">
                     <img class="imagensElogio" src="../dmtrade/img/brindes/<?php echo $query['foto']; ?>" alt="">
                     <p class="textoAvisos"><strong><?php echo $query['nome']; ?></strong><br><span><?php echo $query['departamento']; ?></span></p>
                 </div>

                 <?php

                 $query = odbc_fetch_array(odbc_exec($conexao,"SELECT * FROM  funcionarios where idfuncionario = 6"));

                 ?>

                 <div id="page2" class="large-9">

                     <img class="imagensElogio" src="../dmtrade/img/brindes/<?php echo $query['foto']; ?>" alt="">
                     <p class="textoAvisos"><strong><?php echo $query['nome']; ?></strong><br><span><?php echo $query['departamento']; ?></span></p>
                 </div>

                <div style="position: relative; bottom: 300px; right: 40px">
                 <div id="botao1" style="left: 150px; top: 165px" class="logorank cursor"><span style=" position: relative; left: 20px; top: 8px; font-size: 22px;">1</span></div>
                 <div  style="left: 150px; top: 165px" class="logoBotao botaobranco1 cursor"><span style=" position: relative; left: 17px; top: 5px; font-size: 22px;">1</span></div>



                 <div id="botao2" style="left: 250px; top: 165px" class="logorank cursor"><span style=" position: relative; left: 20px; top: 8px; font-size: 22px;">2</span></div>
                 <div  style="left: 250px; top: 165px" class="logoBotao botaobranco2 cursor"><span style=" position: relative; left: 17px; top: 5px; font-size: 22px;">2</span></div>

                </div>

             </div>

    </div>

</nav>

<div class="row" style=" max-width: 1300px; color: #000000">
    <?php
    $sql = odbc_exec($conexao, "SELECT top 2 * FROM Post where tipo = 'lazer'");
        while($Rsql = odbc_fetch_array($sql)){
    ?>
        <div class="medium-10 large-4 column">
            <p class="column corLaranja alinhar" >LAZER E CULTURA</p>
            <h2 class="column"><?php echo $Rsql['post_title'] ?></h2>
            <div class="icon3"></div>

            <div><?php echo $Rsql['post_content']; ?></div>
        </div>

<?php } ?>



    <div class="medium-10 large-4 column" >

        <?php
        $sql = odbc_exec($conexao, "SELECT top 2 idLivro,nome,nomeLivro,sobre,foto FROM  livros");
        while($Rsql = odbc_fetch_array($sql)){
        ?>

        <div class="DicasMes" style="color: #F9F9F9; font-family: Futurist Fixed-width ">

            <img class="ajustaImagens" src="../dmtrade/img/brindes/<?php echo $Rsql['foto'] ?>" alt="">

            <p >Dica de livro:</p>
            <p><?php echo $Rsql['nome'] ?> indica:</p>
            <p><strong><?php echo $Rsql['nomeLivro'] ?></strong></p>
            <span style="color: #F9F9F9; font-family: tahoma, verdana, arial, sans-serif; font-size: 12px" ><?php echo $Rsql['sobre']; ?></span>


        </div>
        <div>...</div>
        <?php } ?>


    </div>

</div>

<div class="row" style=" max-width: 1300px; color: #000000;  font-family: Futurist Fixed-width;">

    <p class="column corLaranja alinhar" >LAZER E CULTURA</p>
    <h2 class="column" style="">PROGRAMAÇÃO DE CINEMA E TEATRO</h2>
    <div class="icon3"></div>

    <div class="owl-carousel column">

        <?php

        $query = odbc_exec($conexao,"SELECT TOP 4 idFilme,foto,nome,duracao,diretor,genero,lancamento FROM  filmes");

        while($Rsql = odbc_fetch_array($query)){
        ?>

        <div class="item"><img src="../dmtrade/img/brindes/<?php echo $Rsql['foto']; ?>" alt=""><p style="font-family: tahoma, verdana, arial, sans-serif"><?php echo $Rsql['nome']; ?><br>
                Lançamento: <?php echo $Rsql['lancamento']; ?><br>
                Duração: <?php echo $Rsql['duracao']; ?><br>
                Dirigido por: <?php echo $Rsql['diretor']; ?><br>
                Gênero: <?php echo $Rsql['genero']; ?></p></div>

        <?php } ?>

    </div>



</div>

<nav class="bgCinza">
    <div class="row" style="max-width: 1300px; color: #242424">

        <?php
        $sql = odbc_exec($conexao, "SELECT top 2 * FROM  Post where tipo = 'saude'");
        while($Rsql = odbc_fetch_array($sql)){
        ?>

        <div class="large-5 column">

            <p class="column corLaranja alinhar" >SAÚDE E BEM ESTAR</p>
            <h2 class="column" style=""><?php echo $Rsql['post_title']; ?></h2>
            <div class="icon4"></div>
            <p class="large-10"><?php echo $Rsql['post_content']; ?></p>

        </div>

        <?php } ?>

        <div style="margin-top: 100px" class="barraverticalCinza column"></div>

        <div class="large-6 column">

            <?php $query = odbc_fetch_array(odbc_exec($conexao, "SELECT * FROM receita where idReceita = 1 ")) ?>

            <p class="column corLaranja alinhar" >SAÚDE E BEM ESTAR</p>
            <h2 class="column" style="">RECEITA MINUTO</h2>
            <div class="icon4"></div>

                <div class="large-6 column">

                <img class="" src="../dmtrade/img/brindes/<?php echo $query['foto']; ?>" alt="">

                <p class="column large-10"><strong><?php echo $query['nome']; ?></strong></p>

                <p class="column"><?php echo $query['receita']; ?></p>





                </div>


            <div class="large-6 column">
                <div class="receita">
                    <div style="width: 200px;">
                        <div style="position: relative; top: 20px">
                            <img style="position: relative; left: 45px" width="150px" height="225px" src="../dmtrade/img/brindes/<?php echo $query['fotoFunc']; ?>" alt="">
                            <div style="position: relative; left: 20px">
                            <p style="color: #F9F9F9; font-family: Futurist Fixed-width; font-size: 15px" >Quem deu a do dica mês é:</p>
                            <p style="color: #F9F9F9; font-family: Futurist Fixed-width;" ><strong><?php echo $query['nomeFunc']; ?></strong></p>
                            <span style="color: #F9F9F9; font-family: tahoma, verdana, arial, sans-serif; font-size: 12px" ><?php echo $query['sobreFunc']; ?></span>
                        </div>
                        </div>

                    </div>
                </div>
            </div>



        </div>


    </div>
</nav>


<div class="row" style=" max-width: 1300px; color: #000000;  font-family: Futurist Fixed-width;">

    <?php
    $sql = odbc_exec($conexao, "SELECT top 4 * FROM  [Post] where tipo = 'Acontece'");
    while($Rsql = odbc_fetch_array($sql)){
    ?>

    <div class="large-5 column">
        <p class="column corLaranja alinhar" >ACONTECE NAS LOJAS</p>
        <h2 class="column" style=""><?php echo $Rsql['post_title'] ?></h2>
        <div class="icon5"></div>
        <div STYLE="font-family: tahoma, verdana, arial, sans-serif"><?php echo $Rsql['post_content']; ?></div>

    </div>

    <?PHP } ?>

    <div></div>
</div>

    <?php include('rodape.php');

if(isset($_POST['check']))
{
    setcookie('enquete',$_SERVER['REMOTE_ADDR'],time()+604800);
    $check = $_POST['check'];
    $idEnquete = $_POST['idEnquete'];

    addEnquete($idEnquete, $check);

}
    ?>







<script type="text/javascript">
$(document).ready(function(){

jQuery("input[name='check']").click(function(){

    jQuery('#loading').append('<div class="sk-circle"><div class="sk-circle1 sk-child"></div> <div class="sk-circle2 sk-child"></div> <div class="sk-circle3 sk-child"></div> <div class="sk-circle4 sk-child"></div> <div class="sk-circle5 sk-child"></div> <div class="sk-circle6 sk-child"></div> <div class="sk-circle7 sk-child"></div> <div class="sk-circle8 sk-child"></div> <div class="sk-circle9 sk-child"></div> <div class="sk-circle10 sk-child"></div> <div class="sk-circle11 sk-child"></div> <div class="sk-circle12 sk-child"></div> </div>');
    jQuery(this).parent('form').submit();

});


    $('#botao2').hide();
    $('.botaobranco1').hide();
    $('#page2').hide();

    $('.botaobranco2').click(function(){

        $('#botao2').fadeIn(500);
        $(this).hide();
        $('.botaobranco1').fadeIn(500);
        $('#botao1').hide();
        $('#page2').fadeIn(500);
        $('#page1').hide();

    })

    $('.botaobranco1').click(function(){

        $('#botao1').fadeIn(500);
        $(this).hide();
        $('.botaobranco2').fadeIn(500);
        $('#botao2').hide();
        $('#page1').fadeIn(500);
        $('#page2').hide();

    })

    $('.owl-carousel').owlCarousel({


        items: 3,
        navegation: true

    });





});

$(document).foundation({
    dropdown: {
        // specify the class used for active dropdowns
        active_class: 'open'
    }
});

</script>
</body>
</html>
