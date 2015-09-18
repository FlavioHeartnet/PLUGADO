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
    <div class="large-9 column">

        <?php $query = odbc_exec($conexao, "select * from Post where tipo = 'Acontece'");

        while($rsQuery = odbc_fetch_array($query)){
        ?>

    <div class="large-5 column">
        <p class="column corLaranja alinhar" >ACONTECE NAS LOJAS</p>
        <h2 class="column" style=""><?php echo $rsQuery['post_title'] ?></h2>
        <div class="icon5"></div>
        <p STYLE="font-family: tahoma, verdana, arial, sans-serif"><?php echo $rsQuery['post_content'] ?></p>

    </div>
        <?php } ?>

    <div></div>

 </div>


<div class="column large-3">
    <?php include('lateral.php'); ?>

</div>
</div>

<?php include('rodape.php'); ?>
</body>
</html>