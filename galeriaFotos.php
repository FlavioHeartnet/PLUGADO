
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

<div class="row">
<ul class="clearing-thumbs small-block-grid-4" data-clearing>
    <?php

    $query = odbc_exec($conexao, "select * from galeriaFotos where ativo = 1");

    while($busca = odbc_fetch_array($query)){

    ?>
    <li><a href="../dmtrade/img/brindes/<?php echo $busca['nomefoto']; ?>"><img  src="../dmtrade/img/brindes/<?php echo $busca['nomefoto']; ?>"></a></li>

    <?php } ?>
</ul>
</div>
<?php include('rodape.php');
?>
</body>
</html>