<?php

include('config.php');

function envioEmail($emailDestinatario, $nomeDestinatario, $assunto, $mensagem){
    require("phpmailer/class.phpmailer.php");
    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->SMTPDebug = 1;
    $mail->From = "faqdmtrade@dmcard.com.br";
    $mail->FromName = "Plugados.";
    $mail->IsHTML(true);
    $mail->AddAddress($emailDestinatario, $nomeDestinatario);
    $mail->AddAddress($emailDestinatario);
    $mail->Subject  = $assunto;

    $corpoEmail = "<table width='100%' align='center' border='0' cellpadding='0' cellspacing='0'>
	<tr>

        <td><strong><p style = 'font-size:36px; font-family:Calibri; color:#0054a6'>AVISO Plugado</p></strong><p style='font-family:Calibri; font-size:20px; color:#0054a6'>".$mensagem."</p></td>

    </tr>


</table>";


    $corpoEmail .= "</td></tr></tbody></table>";

    $mail->Body = $corpoEmail;
    $enviado = $mail->Send();
    $mail->ClearAllRecipients();
    $mail->ClearAttachments();
    if($enviado == true){
        echo "<script>alert('sucesso');</script>";
        return true;

    }else{
        $error = $mail->ErrorInfo;
        $issue = error_reporting(E_STRICT);
        echo "<script>alert('falha: $error $issue');</script>";
        return false;
    }
};
function geraSenha($tamanho = 8, $maiusculas = true, $numeros = true, $simbolos = false)
{
// Caracteres de cada tipo

    $lmin = 'abcdefghijklmnopqrstuvwxyz';

    $lmai = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

    $num = '1234567890';

    $simb = '!@#$%*-';



// Variáveis internas

    $retorno = '';

    $caracteres = '';



// Agrupamos todos os caracteres que poderão ser utilizados

    $caracteres .= $lmin;

    if ($maiusculas) $caracteres .= $lmai;

    if ($numeros) $caracteres .= $num;

    if ($simbolos) $caracteres .= $simb;



// Calculamos o total de caracteres possíveis

    $len = strlen($caracteres);



    for ($n = 1; $n <= $tamanho; $n++) {

// Criamos um número aleatório de 1 até $len para pegar um dos caracteres

        $rand = mt_rand(1, $len);

// Concatenamos um dos caracteres na variável $retorno

        $retorno .= $caracteres[$rand-1];

    }

    return $retorno;

}

function esqueciSenha($email)
{

    $query = odbc_exec($GLOBALS['conexao'],"select * from usuario where email = '$email'");
    $dados = odbc_fetch_array($query);
    $row = odbc_num_rows($query);

    if($row == 0)
    {
        return "Email, não encontrado, verifique se digitou corretamente";

    }else
    {

        $novaSenha = geraSenha();
        $idUsuario = $dados['idUsuario'];
        $nome = $dados['usuario'];
        odbc_exec($GLOBALS['conexao']," update usuario set senha = '$novaSenha' where idUsuario = '$idUsuario'");
        $mensagem = "<p>Sua senha foi alterada com sucesso, a senha provisoria é <strong>". $novaSenha."</strong> você pode altera-la acessando a area administrativa em 'Alterar dados' </p>";
        $destinatario = $email;
        $assunto = "Recuperação de senha";

        envioEmail($destinatario, $nome, $assunto, $mensagem);

        odbc_exec($GLOBALS['conexao'], "INSERT INTO [MARKETING].[dbo].[historicoPlugado] ([acao],[usuario],[dataHistorico],[tipoAcao]) VALUES ('Senha alterada do usuario:','$idUsuario',GETDATE(),'Login')");

        return "Sua senha foi alterada com sucesso, você deve receber um email a qualquer momento com a nova senha";

    }

}

function cadastraUsuario($email, $nome, $senha)
{

    odbc_exec($GLOBALS['conexao'], "INSERT INTO usuario (usuario,senha,tipo,ativo,email,nome,dataCadastro) VALUES ('$nome','$senha','0','0','$email','$nome',GETDATE())");

    $query = odbc_fetch_array(odbc_exec($GLOBALS['conexao'], "select * from usuario WHERE email = '$email'"));
    $idUsuario = $query['idUsuario'];
    $destinatario = "karen.tamataya@dmcard.com.br";
    //$destinatario = "flavio.barros@dmcard.com.br";
    $assunto = "Novo cadastro";
    $mensagem = "<p>Olá, o usuario: ".$$nome." acaba de se cadastrar na administração do plugados click <a href='http://dmcard.com.br/plugado/acesso/login.php'>aqui</a> entre no plugado em 'administrar conta' e ative o acesso, definindo tambem o seu nivel de acesso </p>";
    envioEmail($destinatario, $nome, $assunto, $mensagem);



    if(!odbc_error())
    {
        odbc_exec($GLOBALS['conexao'], "INSERT INTO [MARKETING].[dbo].[historicoPlugado] ([acao],[usuario],[dataHistorico],[tipoAcao]) VALUES ('Novo Usuario cadastrado:','$idUsuario',GETDATE(),'Login')");

        return '<p class="panel">cadastro realizado com sucesso click, você recebera em breve um email nortificando sobre a liberação do seu acesso <a href="login.php">aqui</a> para voltar</p>';
    }else
    {
        return '<p class="panel">Ouve um erro ao cadastrar, tente novamente mais tarde.</p>';

    }

}

function AtualizaUsuario($idUsuario, $nome, $tipo, $ativo, $email, $senha)
{
    if($tipo == 0) {
         odbc_exec($GLOBALS['conexao'], "update usuario set nome= '$nome', email='$email', senha = '$senha', usuario = '$nome' where idUsuario = '$idUsuario'");
    }else
    {
        odbc_exec($GLOBALS['conexao'], "update usuario set nome= '$nome',tipo = '$tipo', email='$email', senha = '$senha', usuario = '$nome' where idUsuario = '$idUsuario'");

    }

    if($ativo == 1)
    {
        odbc_exec($GLOBALS['conexao'], "update usuario set nome= '$nome', ativo='$ativo',tipo = '$tipo', email='$email', senha = '$senha', usuario = '$nome' where idUsuario = '$idUsuario'");

    }
    if($ativo == 1 and $tipo != 0)
    {
         odbc_exec($GLOBALS['conexao'], "update usuario set nome= '$nome', ativo='$ativo',tipo = '$tipo', email='$email', senha = '$senha', usuario = '$nome' where idUsuario = '$idUsuario'");

    }

    if(!odbc_error())
    {

        echo "<script>alert('Atualizado com sucesso'); location.href='alterar-dados.php';</script>";

    }else
    {
        echo "<script>alert('Ocorreu um erro'); history.back(-1);</script>";

    }
}


function login($usuario, $senha, $ficarLogado)
{
    $query = odbc_exec($GLOBALS['conexao'], " select * from usuario where email = '$usuario' and senha = '$senha' and ativo = 1");
    $qtd = odbc_num_rows($query);
    // Verifica se há usuários com a senha informada
    if ($qtd < 1) {
        echo "<script>alert('Usuário ou senha incorretos ou inativo');</script>";
        return false;
    } else {
        // Verifica se o usuário quer guardar o login e senha em cookie
        if ($ficarLogado == 1) {
            setcookie("usuario", $usuario, (time() + (30 * 24 * 3600)));
            setcookie("senha", $senha, (time() + (30 * 24 * 3600)));
        };
        $dadosUsuario = odbc_fetch_array(odbc_exec($GLOBALS['conexao'], "SELECT * FROM dbo.usuario WHERE email = '$usuario'"));
        $nivel = $dadosUsuario['tipo'];
        $idUsuario = $dadosUsuario['idUsuario'];
        $dadosUsuario = $dadosUsuario['nome'];
        $historico = odbc_exec($GLOBALS['conexao'], "INSERT INTO [MARKETING].[dbo].[historicoPlugado] ([acao],[usuario],[dataHistorico],[tipoAcao]) VALUES ('Usuario: $dadosUsuario','$idUsuario',GETDATE(),'Login')");

        // Cria a sessão
        session_start();
        $_SESSION['usuario'] = $idUsuario;
        $_SESSION['nivel'] = $nivel;

        header("Location: ../control/ControlePost.php");

    }
}


function post($idUsuario,$post_content, $titulo, $status, $comentarios, $post_name, $guid, $tipo)
{

    $dataModificacao = date("d/m/Y H:i");
    $dataPost = date("d/m/Y H:i");
    if($comentarios == 1) {
        odbc_exec($GLOBALS['conexao'], "update Post set comentarios = ''");
    }

    $query = odbc_exec($GLOBALS['conexao'], "insert into Post (idAutor, dataPost, post_content,post_title,post_status, comentarios, post_name, dataModificacao, guid,tipo)
values ('$idUsuario','$dataPost','$post_content','$titulo','$status','$comentarios','$post_name','$dataModificacao','$guid','$tipo')");


    if($query == true)
    {
        odbc_exec($GLOBALS['conexao'], "INSERT INTO [MARKETING].[dbo].[historicoPlugado] ([acao],[usuario],[dataHistorico],[tipoAcao]) VALUES ('Post realizado com sucesso, tipo: $tipo','$idUsuario',GETDATE(),'Post')");
        echo "<script>alert('Post feito com sucesso'); location.href='ControlePost.php'</script>";


    }else{echo "<script>alert('ocorreu um erro'); history.back(-1);</script>";
    return false;
    }

}

function avisoRH($aviso, $idUsuario)
{

    $dataAviso = date("d/m/Y H:i");

    $query = odbc_exec($GLOBALS['conexao'], "update avisoRH set aviso = '$aviso', dataAviso = GETDATE() where idRH = 1");

    if($query == true)
    {
        odbc_exec($GLOBALS['conexao'], "INSERT INTO [MARKETING].[dbo].[historicoPlugado] ([acao],[usuario],[dataHistorico],[tipoAcao]) VALUES ('inserido aviso no Avisos do RH','$idUsuario',GETDATE(),'AvisoRH')");
        echo "<script>alert('Aviso salvo com sucesso'); location.href='ControlePost.php'</script>";


    }else{echo "<script>alert('ocorreu um erro'); history.back(-1);</script>";
        return false;
    }

}

function aniversariantes($foto1, $foto2, $foto3, $idUsuario)
{

   $query =  odbc_exec($GLOBALS['conexao'], "update Aniversariantes set nomeFoto = '$foto1' where idNiver = 1");
    $query2 =  odbc_exec($GLOBALS['conexao'], "update Aniversariantes set nomeFoto = '$foto2' where idNiver = 2");
    $query3 =  odbc_exec($GLOBALS['conexao'], "update Aniversariantes set nomeFoto = '$foto3' where idNiver = 3");

    if($query == true and $query2 == true and $query3 == true)
    {
        odbc_exec($GLOBALS['conexao'], "INSERT INTO [MARKETING].[dbo].[historicoPlugado] ([acao],[usuario],[dataHistorico],[tipoAcao]) VALUES ('inserido aniversariantes na Home','$idUsuario',GETDATE(),'aniversariantes')");
        echo "<script>alert('Aniversariantes cadastrados com sucesso'); location.href='ControlePost.php'</script>";


    }else{echo "<script>alert('ocorreu um erro ao salvar Aniversariantes'); history.back(-1);</script>";
        return false;
    }


}

function enquete($pergunta, $respostas, $idUsuario)
{

    $count = count($respostas);

    $query = odbc_exec($GLOBALS['conexao'], "update enquete set ativo = 0 where ativo = 1");

    for($i = 0 ; $i< $count; $i++)
    {

        $query = odbc_exec($GLOBALS['conexao'], "insert into enquete (pergunta, resposta, contador, ativo) values ('$pergunta','$respostas[$i]',0,1)");

    }

    if($query == true )
    {
        odbc_exec($GLOBALS['conexao'], "INSERT INTO [MARKETING].[dbo].[historicoPlugado] ([acao],[usuario],[dataHistorico],[tipoAcao]) VALUES ('inserido nova enquete','$idUsuario',GETDATE(),'enquete')");
        echo "<script>alert('Enquete criada com sucesso'); location.href='ControlePost.php'</script>";


    }else{echo "<script>alert('ocorreu um erro'); history.back(-1);</script>";
        return false;
    }


}

function addEnquete($idEnquete, $contador)
{
    $array = odbc_fetch_array(odbc_exec($GLOBALS['conexao'], "select * from  enquete where idEnquete = '$idEnquete'"));

    $count = $array['contador'];

    $total = $count + $contador;

   $query =  odbc_exec($GLOBALS['conexao'], " update   [enquete] set contador= '$total' where idEnquete = '$idEnquete'");


    if($query == true )
    {

        echo"<script>location.href('ControlePost.php');</script>";
        return true;


    }else{echo "<script>alert('ocorreu um erro'); history.back(-1);</script>";
        return false;
    }



}

function atualizaEnquete($idEnquete, $pergunta, $respostas, $radio, $idUsuario)
{

    odbc_exec($GLOBALS['conexao'], "update  enquete set ativo = 0 where ativo = 1");

    for($i = 0; $i < count($respostas); $i++) {
        if($radio != 1) {
            $query = odbc_exec($GLOBALS['conexao'], "update  enquete set pergunta = '$pergunta', resposta = '$respostas[$i]', ativo = 1 where idEnquete = '$idEnquete[$i]'");
        }else
        {
            $query = odbc_exec($GLOBALS['conexao'], "update  enquete set pergunta = '$pergunta', resposta = '$respostas[$i]', ativo = 1, contador = 0 where idEnquete = '$idEnquete[$i]'");

        }
    }

    if($query == true )
    {
        odbc_exec($GLOBALS['conexao'], "INSERT INTO [MARKETING].[dbo].[historicoPlugado] ([acao],[usuario],[dataHistorico],[tipoAcao]) VALUES ('enquete Atualizado ','$idUsuario',GETDATE(),'enquete')");

        echo"<script>location.href('ControlePost.php');</script>";

        return true;


    }else{echo "<script>alert('ocorreu um erro ao atualizar'); history.back(-1);</script>";
        return false;
    }

}

function funcionarios($nome, $departamento, $foto, $idUsuario)
{
    $valor = $departamento[0];
    $count = count($foto);
    $id = 1;

   $imagem = odbc_exec($GLOBALS['conexao'], "select foto from   [funcionarios]");

    while($imagemB = odbc_fetch_array($imagem)) {
        try {
            $path = "'../dmtrade/img/brindes/'" . $imagemB['foto'];

            array_map( "unlink", glob( $path ) );
        }catch (Exception $ex) {
            die("Erro : {$ex->getMessage()}");
        }
    }

    for($i = 0; $i < $count ; $i++)
    {
        $query = odbc_exec($GLOBALS['conexao'],"update funcionarios set nome  = '$nome[$i]', foto = '$foto[$i]' where idfuncionario= '$id'");
        $id++;
    }




    odbc_exec($GLOBALS['conexao'],"update  funcionarios set departamento = '$valor' where idfuncionario= '5'");
    $query = odbc_exec($GLOBALS['conexao'],"update funcionarios set departamento = '$departamento[1]' where idfuncionario= '6'");

    if($query == true )
    {
        odbc_exec($GLOBALS['conexao'], "INSERT INTO [MARKETING].[dbo].[historicoPlugado] ([acao],[usuario],[dataHistorico],[tipoAcao]) VALUES ('Destaques do mês inseridos ','$idUsuario',GETDATE(),'destaques')");
        echo "<script>alert('Atualizado com sucesso!'); location.href('ControlePost.php');</script>";


        return true;


    }else{echo "<script>alert('ocorreu um erro ao atualizar'); history.back(-1);</script>";
        return false;
    }

}

function filmes($nome, $lancamento, $duracao, $genero, $foto, $dirigido, $idUsuario)
{

$query = odbc_exec($GLOBALS['conexao'], "insert into   filmes (foto, nome, duracao, diretor,genero, lancamento) values ('$foto','$nome','$duracao','$dirigido','$genero','$lancamento')");

    if($query == true )
    {
        odbc_exec($GLOBALS['conexao'], "INSERT INTO [MARKETING].[dbo].[historicoPlugado] ([acao],[usuario],[dataHistorico],[tipoAcao]) VALUES ('Filmes inseridos ','$idUsuario',GETDATE(),'filmes')");
        echo "<script>alert('filme inserido com sucesso!'); location.href('ControlePost.php');</script>";
        return true;


    }else{echo "<script>alert('ocorreu um erro ao inserir'); history.back(-1);</script>";
        return false;
    }



}

function receita($foto,$nome,$receita,$nomeFunc,$sobreFunc, $fotoFunc, $idUsuario)
{

    echo "<script>alert('$foto, $nome, $receita, $nomeFunc, $sobreFunc, $fotoFunc');</script>";
    $query = odbc_exec($GLOBALS['conexao'], "update receita set nome = '$nome', receita='$receita', nomeFunc='$nomeFunc', fotoFunc = '$fotoFunc', sobreFunc='$sobreFunc', foto='$foto' where idReceita = 1");

    if($query == true )
    {
        odbc_exec($GLOBALS['conexao'], "INSERT INTO [MARKETING].[dbo].[historicoPlugado] ([acao],[usuario],[dataHistorico],[tipoAcao]) VALUES ('receitas inseridas ','$idUsuario',GETDATE(),'receitas')");
        echo "<script>alert('Receita inserida com sucesso!'); location.href('ControlePost.php');</script>";
        return true;


    }else{echo "<script>alert('ocorreu um erro ao inserir a Receita'); history.back(-1);</script>";
        return false;
    }


}

function livros($nome,$nomeLivro,$sobre,$foto, $nome2,$nomeLivro2,$sobre2,$foto2, $idUsuario)
{

if($nomeLivro != "") {
    $query = odbc_exec($GLOBALS['conexao'], "update livros set nome = '$nome', nomeLivro = '$nomeLivro', sobre='$sobre', foto='$foto' where idLivro = 1");
}else{$resp = 1;}
    if($nomeLivro2 != "") {
        $query = odbc_exec($GLOBALS['conexao'], "update livros set nome = '$nome2', nomeLivro = '$nomeLivro2', sobre='$sobre2', foto='$foto2' where idLivro = 2");
    }else{$resp2 = 1;}


    if($query == true )
    {
        if($resp == 1 and $resp2 == 1)
        {

            echo "<script>alert('Nenhum nome foi digitado, por a operação não será gravada!'); location.href('ControlePost.php')</script>";

        }else {
            odbc_exec($GLOBALS['conexao'], "INSERT INTO [MARKETING].[dbo].[historicoPlugado] ([acao],[usuario],[dataHistorico],[tipoAcao]) VALUES ('dicas de Livros inseridos ','$idUsuario',GETDATE(),'livros')");
            echo "<script>alert('Livros inseridos com sucesso!'); location.href('ControlePost.php')</script>";
        }
        return true;


    }else{echo "<script>alert('Falha:você não digitou nada nos campos, caso o problema persista fale com o administrador!'); history.back(-1);</script>";
        return false;
    }


}


function links($nome ,$foto, $idUsuario)
{

    for($i = 0; $i < count($nome); $i++) {

        $query = odbc_exec($GLOBALS['conexao'], "insert into links (nome, foto, ativo) values('$nome[$i]', '$foto[$i]', '1')");
    }

    if($query == true )
    {
        odbc_exec($GLOBALS['conexao'], "INSERT INTO [MARKETING].[dbo].[historicoPlugado] ([acao],[usuario],[dataHistorico],[tipoAcao]) VALUES ('Links de arquivos inseridos ','$idUsuario',GETDATE(),'RH/links')");
        echo "<script>alert('cadastrado com sucesso!'); location.href('ControlePost.php');</script>";
        return true;


    }else{echo "<script>alert('ocorreu um erro'); history.back(-1);</script>";
        return false;
    }


}

function atualizalinks($nome , $foto, $idLink, $ativo, $idUsuario)
{
    for($i = 0; $i < count($foto); $i++)
    {

        if($foto[$i] != "") {

           odbc_exec($GLOBALS['conexao'], "UPDATE links SET nome = '$nome[$i]',foto = '$foto[$i]',ativo = '$ativo[$i]' WHERE idLinks ='$idLink[$i]'");

        }else
        {
            odbc_exec($GLOBALS['conexao'], "UPDATE links SET nome = '$nome[$i]',ativo = '$ativo[$i]' WHERE idLinks ='$idLink[$i]'");
        }
    }

    if(!odbc_error())
    {
        odbc_exec($GLOBALS['conexao'], "INSERT INTO [MARKETING].[dbo].[historicoPlugado] ([acao],[usuario],[dataHistorico],[tipoAcao]) VALUES ('Links de arquivos atualizados ','$idUsuario',GETDATE(),'RH/links')");
        echo "<script>alert('cadastrado com sucesso!'); location.href('ControlePost.php'); </script>";
        return true;


    }else{

        echo "<script>alert('ocorreu um erro'); history.back(-1);</script>";
        return false;
    }


}

function deletaLinks($idLink, $idUsuario)
{

    $query = odbc_exec($GLOBALS['conexao'], "delete FROM [MARKETING].[dbo].[links] where idLinks = '$idLink'");

    if($query == true)
    {
        odbc_exec($GLOBALS['conexao'], "INSERT INTO [MARKETING].[dbo].[historicoPlugado] ([acao],[usuario],[dataHistorico],[tipoAcao]) VALUES ('Links de arquivos deletados ','$idUsuario',GETDATE(),'RH/links')");
        echo "<script>alert('Deletado com sucesso!'); location.href('ControlePost.php');</script>";
        return true;


    }else{echo "<script>alert('ocorreu um erro'); history.back(-1);</script>";
        return false;
    }



}




