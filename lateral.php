<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8' />
    <link rel="stylesheet" href="css/jquery-ui.min.css">
    <link rel="stylesheet" href="css/fullcalendar.print.css" media='print' >
    <link rel="stylesheet" href="css/fullcalendar.min.css">
    <script src="js/moment.min.js"></script>
    <script src="js/scripts.js"></script>
    <script src="js/fullcalendar.min.js"></script>
    <script src='js/pt-br.js'></script>


    <script>

        $(document).ready(function() {

            $('#calendar').fullCalendar({
                theme: true,
                lang: 'pt-br',
                editable: false,
                eventLimit: true // allow "more" link when too many events

            });

        });

    </script>
    <style>

        body {
            margin: 40px 10px;
            padding: 0;

            font-size: 14px;
        }
        @font-face {
            font-family: Futurist Fixed-width;
            src: url('/fonts/FUTRFW.TTF') format("truetype");
        }

        #calendar {
            max-width: 900px;
            margin: 0 auto;
        }

    </style>
</head>
<body>

<div id='calendar'></div>

<div class="barra"></div>
<?php $sql = odbc_exec($conexao, "SELECT TOP 1 idRH,aviso,idUsuario,dataAviso FROM avisoRH");

while($Rsql = odbc_fetch_array($sql)){
?>
<div class="avisos">
    <p class="textoAvisos large-10" style="  position: relative;top: 56px; left: 15px;"><?php echo utf8_encode($Rsql['aviso']) ?></p>

</div>
<?php } ?>

<div class="barra"></div>

<p class="column corLaranja alinhar">Etiqueta da Semana</p>
<?php $query = odbc_exec($conexao, "select * from enquete  where ativo = 1");

$titulo = odbc_fetch_array($query);

$query = odbc_exec($conexao, "select * from enquete  where ativo = 1");

?>
<h2 class="column" ><?php echo $titulo['pergunta']; ?></h2>
<div class="icon1"></div>
<ul>

    <?php

    if(!isset($_COOKIE['disto'])) {

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
<div class="barra"></div>
<?php $sql = odbc_exec($conexao, "SELECT top 1 * FROM  Post where tipo = 'fique' and comentarios = '' ");

while($Rsql = odbc_fetch_array($sql)){
?>
<p class="column corLaranja alinhar" >FIQUE POR DENTRO</p>
<h2 class="column" style=""><?php echo $Rsql['post_title']; ?></h2>
<div class="icon1"></div>
<p class="text-justify"><?php echo $Rsql['post_content']; ?></p>

<?php } ?>
<div class="barra"></div>
<?php $sql = odbc_exec($conexao, "SELECT top 1 * FROM Post where tipo = 'lazer' ");

while($Rsql = odbc_fetch_array($sql)){
?>
<p class="column corLaranja alinhar" >LAZER E CULTURA</p>
<h2 class="column"><?php echo $Rsql['post_title']; ?></h2>
<div class="icon3"></div>
<p><?php echo $Rsql['post_content']; ?></p>
<?php } ?>
<div class="barra"></div>
<?php $sql = odbc_exec($conexao, "SELECT top 1 * FROM Post where tipo = 'saude' ");

while($Rsql = odbc_fetch_array($sql)){
?>
<p class="column corLaranja alinhar" >SAÚDE E BEM ESTAR</p>
<h2 class="column" style=""><?php echo $Rsql['post_title']; ?></h2>
<div class="icon4"></div>
<p class="large-10"><?php echo $Rsql['post_content']; ?></p>
<?php } ?>
</body>
</html>
