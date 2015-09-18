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
<br>
    <div class="column large-9">
        <?php
        $query = odbc_fetch_array(odbc_exec($conexao, "SELECT TOP 2000 [idNiver] ,[nomeFoto] FROM [MARKETING].[dbo].[Aniversariantes] where idNiver = 5"));

        ?>
        <img src="../dmtrade/img/brindes/<?php echo $query['nomeFoto'];  ?>" alt width="100%">


    </div>

    <div class="column large-3">

<?php include('lateral.php'); ?>


</div>

</div>

<?php include('rodape.php'); ?>

</body>
</html>
