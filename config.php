<?php
// Configurando a data e charset
date_default_timezone_set("America/Sao_Paulo");
header('Content-type: text/html; charset=utf-8');

// Criando uma conexão com o banco de dados
//$conexao = odbc_connect("DRIVER={SQL Server}; SERVER=DM-74\SQLEXPRESS; DATABASE=plugado;", "sa","123456");
$conexao = odbc_connect("DRIVER={SQL Server}; SERVER=10.50.1.227; DATABASE=MARKETING;", "MARKETING_AGENCIA","123123");

?>