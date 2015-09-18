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

</head>

<body>

<?php include('topo.php'); ?>
<div class="row" style="color: #242424; max-width: 1300px">
    <div class="large-9 column">

        <div class="row" style="max-width: 1300px; color: #242424">



            <div class="large-9 column">

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

        <?php
        $sql = odbc_exec($conexao, "SELECT top 2 * FROM  Post where tipo = 'saude'");
        while($Rsql = odbc_fetch_array($sql)){
            ?>

            <div class="large-9 column">

                <p class="column corLaranja alinhar" >SAÚDE E BEM ESTAR</p>
                <h2 class="column" style=""><?php echo $Rsql['post_title']; ?></h2>
                <div class="icon4"></div>
                <p class="large-10"><?php echo $Rsql['post_content']; ?></p>

            </div>

        <?php } ?>

    </div>


    <div class="column large-3">
        <?php include('lateral.php'); ?>

    </div>
</div>

<?php include('rodape.php'); ?>

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