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

    <script src="js/jquery-1.11.3.min.js"></script>
    <script src="js/scripts.js"></script>
    <script src="js/jquery.js"></script>


</head>
<body>
<?php include('topo.php'); ?>
<div class="row" style="color: #242424; max-width: 1300px">
    <div class="large-9 column">
        <?php

        $query = odbc_exec($conexao, "select top 10 * from Post where tipo = 'lazer'");
        while($busca = odbc_fetch_array($query)){
        ?>

        <div class="large-9 column">
        <p class="column corLaranja alinhar" >LAZER E CULTURA</p>
        <h2 class="column"><?php echo $busca['post_title']; ?></h2>
        <div class="icon3"></div>


        <div class="large-7 column">
            <?php echo $busca['post_content']; ?>
        </div>
            </div>

        <?php } ?>


        <div class="large-9 column">
            <p class="column corLaranja alinhar" >LAZER E CULTURA</p>
            <h2 class="column">Dicas do Mês</h2>
            <div class="icon3"></div>
        </div>

        <div class="large-9 column">

            <div class="DicasMes column large-9" style="color: #F9F9F9; font-family: Futurist Fixed-width ">
                <?php

                $query = odbc_fetch_array(odbc_exec($conexao, "select * from livros where idLivro = 1"));

                ?>
                <div style="  ">
                    <img src="../dmtrade/img/brindes/<?php echo $query['foto'] ?>" alt="">

                    <p >Dica de livro:</p>
                    <p><?php echo $query['nome'] ?> indica:</p>
                    <p><strong><?php echo $query['nomeLivro'] ?></strong></p>
                    <span style="color: #F9F9F9; font-family: tahoma, verdana, arial, sans-serif; font-size: 12px" ><?php echo $query['sobre']; ?></span>
                </div>

            </div>

            <div class="DicasMes2 column large-9"  style="color: #F9F9F9; font-family: Futurist Fixed-width;">
                <?php

                $query = odbc_fetch_array(odbc_exec($conexao, "select * from livros where idLivro = 2"));

                ?>

                <img src="../dmtrade/img/brindes/<?php echo $query['foto'] ?>" alt="">

                <p >Dica de livro:</p>
                <p><?php echo $query['nome'] ?> indica:</p>
                <p><strong><?php echo $query['nomeLivro'] ?></strong></p>
                <span style="color: #F9F9F9; font-family: tahoma, verdana, arial, sans-serif; font-size: 12px" ><?php echo $query['sobre']; ?></span>


            </div>


        </div>

        <div class="column large-15" style=" max-width: 1300px; color: #000000;  font-family: Futurist Fixed-width;">


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

    </div>


    <div class="column large-3">
        <?php include('lateral.php'); ?>

    </div>
</div>

<?php include('rodape.php'); ?>
<script src="js/owl.carousel.min.js"></script>
<script src="js/vendor/modernizr.js"></script>
<script type="text/javascript">
    $(document).ready(function(){


        $('.owl-carousel').owlCarousel({


            items: 3,
            navegation: true

        });

    });

</script>
</body>
</html>