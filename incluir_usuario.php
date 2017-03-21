<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<?php
/**
 * Created by PhpStorm.
 * User: felipe
 * Date: 19/03/2017
 * Time: 22:36
 */
session_start();
require_once 'Usuario.php';
require_once "conexaoDB.php";
require_once 'ServiceDb.php';

if (isset($_POST['inputNome'])) {
    $senha_hash = password_hash ($_POST['inputSenha'], PASSWORD_DEFAULT);
    $conexao = conexaoDB();
    $usuario = new Usuario($conexao);
    $db = new ServiceDb($conexao, $usuario);

    $fields = array ("nome" => $_POST['inputNome'],
                        "email"=> $_POST['inputEmail'],
                        "login"=> $_POST['inputLogin'],
                        "senha"=> $senha_hash);

    if ($db -> inserir($fields)) {
        echo "Dados inseridos com sucesso.<br>";
    } else {
        echo "Algo deu errado.<br>";
    }

}

echo "<h2>Incluir usuario</h2>";
$conteudo = "";
$conteudo .= "<br>";
$conteudo .= "<form method=\"post\" action=\"incluir_usuario.php\">";
$conteudo .= "Nome: <input type='text' id='inputNome' name='inputNome' ><br><br>";
$conteudo .= "Email: <input type='text' id='inputEmail' name='inputEmail' ><br><br>";
$conteudo .= "Login: <input type='text' id='inputLogin' name='inputLogin' ><br><br>";
$conteudo .= "Senha: <input type='text' id='inputSenha' name='inputSenha' ><br><br>";
$conteudo .= "<button type=\"submit\" class=\"btn btn-default\">Enviar</button>";
$conteudo .= "</form>";
$conteudo .= " <a href='listar_usuario.php' class='btn btn-sm'>listar todos</a>";

echo $conteudo;

require_once ('rodape.php');