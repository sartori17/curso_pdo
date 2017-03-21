<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<?php
/**
 * Created by PhpStorm.
 * User: felipe
 * Date: 19/03/2017
 * Time: 22:41
 */
session_start();
require_once 'Usuario.php';
require_once 'ServiceDb.php';
require_once "conexaoDB.php";

$id = $_GET['id'];
$conexao = conexaoDB();
$usuario = new Usuario();
$db = new ServiceDb($conexao, $usuario);

$usuario = $db -> find("id", $id);

echo "<h2>Listando usuario</h2>";

$conteudo = "";
$conteudo .= "<br>";
$conteudo .= "ID: {$usuario['id']}<br>";
$conteudo .= "Nome: {$usuario['nome']}<br>";
$conteudo .= "Email: {$usuario['email']}<br>";
$conteudo .= "Login: {$usuario['login']}<br>";
$conteudo .= "Senha: {$usuario['senha']}<br>";
$conteudo .= "<br>";
$conteudo .= " <a href='listar_usuario.php' class='btn btn-sm'>listar todos</a>";
$conteudo .= " <a href='editar_usuario.php?id=" . $usuario['id'] . "' class='btn btn-sm'>editar</a>";
$conteudo .= " <a href='excluir_usuario.php?id=" . $usuario['id'] . "' class='btn btn-sm'>excluir</a>";

echo $conteudo;

require_once ('rodape.php');