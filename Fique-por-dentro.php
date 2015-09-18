<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plugado</title>
    <link rel="stylesheet" href="css/foundation.css">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/jquery-ui.min.css">
    <link rel="stylesheet" href="css/fullcalendar.print.css" media='print'>
    <link rel="stylesheet" href="css/fullcalendar.min.css">

    <script src="js/moment.min.js"></script>
    <script src="js/scripts.js"></script>
    <script src="js/fullcalendar.min.js"></script>
    <script src='js/pt-br.js'></script>



</head>
<body>
<?php include('topo.php'); ?>
<div class="row" style="color: #242424; max-width: 1300px">
    <div class="column large-9">

        <?php

        $query = odbc_exec($conexao, " SELECT  * FROM [MARKETING].[dbo].[Post] WHERE  tipo = 'fique' and comentarios = '1'");

        while($rsQuery = odbc_fetch_array($query)){

        ?>

        <div class=""><p class="column corLaranja alinhar" >FIQUE POR DENTRO</p>
            <h2 class="column"><?php echo $rsQuery['post_title']; ?></h2>
            <div class="icon1"></div>
    <div class="column large-10"><p class="text-justify"><?php echo $rsQuery['post_content']; ?></p></div>

        </div>
        <?php }

        $query = odbc_exec($conexao, " SELECT top 10 * FROM [MARKETING].[dbo].[Post] WHERE  tipo = 'fique' and comentarios = ''");

        while($rsQuery = odbc_fetch_array($query)){


        ?>

            <div class="column"><img src="img/barraPrincipal2.png" alt=""></div>

            <div class="column">

                <div class=""><p class="column corLaranja alinhar" >FIQUE POR DENTRO</p>
                    <h2 class="column"><?php echo $rsQuery['post_title']; ?></h2>
                    <div class="icon1"></div>
                </div>
            <div class="column"><p class="text-justify"><?php echo $rsQuery['post_content']; ?></p></div>


        </div>

        <?php } ?>

        </div>



    <div class="column large-3">
        <div class=" barraPrincipal"></div>

        <!--<iframe src="lateral.php" height="395px" style="border: none"></iframe>-->
        <?php include('lateral.php'); ?>


    </div>

    </div>

<?php include('rodape.php'); ?>

</body>
</html>
