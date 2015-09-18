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

    <script src="js/scripts.js"></script>
    <script src="js/moment.min.js"></script>


</head>
<body>
<?php include('topo.php'); ?>
<div class="row" style="color: #242424; max-width: 1300px">

    <div class="column large-9">

        <div class=" large-4">

            <?php

            $query = odbc_fetch_array(odbc_exec($conexao, "select DISTINCT pergunta from enquete where ativo = 1"));

            ?>

        <div class="retangulo" style="color: #ffffff; font-family: Futurist Fixed-width">
            <div style="position: relative;   top: 27px; left: 23px;">
            <p class="column alinhar">Enquete da Semana</p>
            <h2 class="column large-9" style="color: #ffffff"><?php echo $query['pergunta']; ?></h2>
            <div class="icon6"></div>
                <div class="column large-9">
                <ul>
                    <?php

                    if(!isset($_COOKIE['enquete'])) {

                        $query = odbc_exec($conexao, "select * from enquete where ativo = 1");
                        while ($rsQuery = odbc_fetch_array($query)) {
                            ?>
                            <li>
                                <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post"><input type="hidden"
                                                                                                       value="<?php echo $rsQuery['idEnquete']; ?>"
                                                                                                       name="idEnquete"><input
                                        class="" type="radio" value="1" name="check"><?php echo $rsQuery['resposta']; ?>
                                </form>
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


                    if(isset($_POST['check']))
                    {
                        setcookie('enquete',$_SERVER['REMOTE_ADDR'],time()+604800);
                        $check = $_POST['check'];
                        $idEnquete = $_POST['idEnquete'];

                        addEnquete($idEnquete, $check);

                    }
                    ?>
                </ul>
                </div>



            </div>
        </div>

        </div>
        <?php

        $query = odbc_exec($conexao, "select DISTINCT pergunta from enquete where ativo = 1");

        while($rsQuery = odbc_fetch_array($query)){

        ?>
        <div style="margin-top: 15px;" class=" large-10">
            <div class="column large-10">



                <p class="column corLaranja alinhar">10 de Junho de 2015</p>
                <h2 class="column" >Pesquisa: <?php echo $rsQuery['pergunta']; ?></h2>
                <div class="icon1"></div>
                <p class="text-justify">Veja aqui o resultado da pesquisa:</p>


            </div>

           <!-- <div class="column large-2">
                <div class="enquete">
                    <div style="width: 200px;">
                        <div style="position: relative; top: 20px">
                            <img style="position: relative; left: 45px" width="150px" height="225px" src="img/foto3.png" alt="">
                            <div style="position: relative; left: 20px">
                                <p style="color: #F9F9F9; font-family: Futurist Fixed-width;" ><strong>Lindinéia de Jesus</strong></p>
                            <span style="color: #F9F9F9; font-family: tahoma, verdana, arial, sans-serif; font-size: 12px" >Trabalha a seis anos na DMCard como análista de crédito e foi o
                            destaque do mês de maio.</span>
                            </div>
                        </div>

                    </div>
                </div>
            </div> -->


        </div>

        <div class="column large-10" >


          <!--  <iframe style="margin-top: 15px" src="js/grafico/examples/bar-basic/index.htm" width="100%" height="400px" ></iframe> -->
            <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

        </div>
        <?php } ?>

    </div>

    <div class="column large-3">

        <?php include('lateral.php');

        $busca = odbc_exec($conexao, "select * from enquete where ativo = 1");

        $mensagem ='';
        $pontosTotais = '';

        while($rsBusca = odbc_fetch_array($busca))
        {
            $pergunta = $rsBusca['resposta'];
            $pontos = $rsBusca['contador'];

            $mensagem .= "'$pergunta',";
            $pontosTotais .= "$pontos,";


        }


        ?>

    </div>

</div>

<?php include('rodape.php'); ?>
<script type="text/javascript" src="js/highcharts.js"></script>
<script type="text/javascript" src="js/exporting.js"></script>
<script type="text/javascript">

    $(document).ready(function(){


        jQuery("input[name='check']").click(function(){

            jQuery('#loading').append('<div class="sk-circle"><div class="sk-circle1 sk-child"></div> <div class="sk-circle2 sk-child"></div> <div class="sk-circle3 sk-child"></div> <div class="sk-circle4 sk-child"></div> <div class="sk-circle5 sk-child"></div> <div class="sk-circle6 sk-child"></div> <div class="sk-circle7 sk-child"></div> <div class="sk-circle8 sk-child"></div> <div class="sk-circle9 sk-child"></div> <div class="sk-circle10 sk-child"></div> <div class="sk-circle11 sk-child"></div> <div class="sk-circle12 sk-child"></div> </div>');
            jQuery(this).parent('form').submit();

        });

    });

    $(function () {
        $('#container').highcharts({
            chart: {
                type: 'bar'
            },
            title: {
                text: 'Pesquisa da enquete'
            },
            subtitle: {
                text: 'Pesquisa de enquete DMcard'
            },
            xAxis: {
                categories: [<?php echo $mensagem ?>''],
                title: {
                    text: null
                }
            },
            yAxis: {
                min: 0,
                title: {
                    text: '% de votação',
                    align: 'high'
                },
                labels: {
                    overflow: 'justify'
                }
            },
            tooltip: {
                valueSuffix: '%'
            },
            plotOptions: {
                bar: {
                    dataLabels: {
                        enabled: true
                    }
                }
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'top',
                x: -40,
                y: 100,
                floating: true,
                borderWidth: 1,
                backgroundColor: '#FFFFFF',
                shadow: true
            },
            credits: {
                enabled: false
            },
            series: [{
                name: 'Perguntas',
                data: [<?php echo $pontosTotais ?>]
            }]
        });
    });


</script>
</body>
</html>
