<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<?php
/**
 * Created by PhpStorm.
 * User: felipe
 * Date: 20/03/2017
 * Time: 20:53
 */
session_start();
require_once 'Usuario.php';
require_once 'ServiceDb.php';
require_once "conexaoDB.php";

if (isset($_POST['inputID'])) {
    $id = $_POST['inputID'];

    $conexao = conexaoDB();

    $usuario = new Usuario($conexao);
    $db = new ServiceDb($conexao, $usuario);

    $usuario -> setId($id);

    $fields = array ("nome" => $_POST['inputNome'],
                        "email"=> $_POST['inputEmail'],
                        "login"=> $_POST['inputLogin'],
                        );
    if (isset($_POST['inputSenha']) && $_POST['inputSenha'] != '') {
        $senha_hash = password_hash($_POST['inputSenha'], PASSWORD_DEFAULT);
        $fields["senha"] = $senha_hash;
    }

    if ($db -> alterar($fields)) {
        echo "Dados alterados com sucesso.<br>";
    } else {
        echo "Algo deu errado.<br>";
    }

} else {
    $id = $_GET['id'];
}

$conexao = conexaoDB();
$usuario = new Usuario();
$db = new ServiceDb($conexao, $usuario);

$usuario = $db -> find("id", $id);

echo "<h2>Editar usuario</h2>";

$conteudo = "";
$conteudo .= "<br>";
$conteudo .= "<form method=\"post\" action=\"editar_usuario.php\">";
$conteudo .= "<input type='hidden' id='inputID' name='inputID' value='{$usuario['id']}'><br>";
$conteudo .= "ID: {$usuario['id']}<br>";
$conteudo .= "Nome: <input type='text' id='inputNome' name='inputNome' value='{$usuario['nome']}'><br><br>";
$conteudo .= "Email: <input type='text' id='inputEmail' name='inputEmail' value='{$usuario['email']}'><br><br>";
$conteudo .= "Login: <input type='text' id='inputLogin' name='inputLogin' value='{$usuario['login']}'><br><br>";
$conteudo .= "Senha: <input type='text' id='inputSenha' name='inputSenha' value=''><br><br>";
$conteudo .= "<button type=\"submit\" class=\"btn btn-default\">Enviar</button>";
$conteudo .= "</form>";
$conteudo .= " <a href='listar_usuario.php' class='btn btn-sm'>listar todos</a>";
$conteudo .= " <a href='excluir_usuario.php?id={$usuario['id']}' class='btn btn-sm'>excluir</a>";

echo $conteudo;

require_once ('rodape.php');