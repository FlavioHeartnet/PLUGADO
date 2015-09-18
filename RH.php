
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
    <script src="js/vendor/modernizr.js"></script>
    <script src="js/owl.carousel.min.js"></script>
</head>

<body>

<?php include('topo.php'); ?>

<div class="row" style="color: #242424; max-width: 1300px">

    <div class="column large-2 menus">
        <br>
        <div align="center" style="  width: 204px; height: 24px;" class="bgLaranja large-10"><span>DOWNLOADS</span></div><br>
        <div align="center">
            <?php
            $query = odbc_exec($conexao, "SELECT TOP 2000 [idLinks],[nome],[foto],[ativo] FROM [MARKETING].[dbo].[links]");

            while($rsQuery = odbc_fetch_array($query)){

            ?>
        <p><a href="../dmtrade/img/brindes/<?php echo $rsQuery['foto'] ?>">-<?php echo $rsQuery['nome']; ?></a></p>

            <?php } ?>
        </div>
        <div style="width: 200px" class="barra">

        </div>



    </div>
    <div class="column barraverticalCinza"></div>
    <div class="column large-6">
        <p class="column corLaranja alinhar">Horario das Vans</p>
        <h2 class="column" >Saiba dos horarios disponiveis</h2>
        <div class="icon1"></div>
        <?php
        $query = odbc_fetch_array(odbc_exec($conexao, "SELECT TOP 2000 [idNiver] ,[nomeFoto] FROM [MARKETING].[dbo].[Aniversariantes] where idNiver = 5"));

        ?>
        <img src="../dmtrade/img/brindes/<?php echo $query['nomeFoto']; ?>">

    </div>
    <div class="column barraverticalCinza"></div>
    <div class="column large-3">
        <?php include('lateral.php'); ?>

    </div>
</div>

<?php include('rodape.php'); ?>
</body>
</html>