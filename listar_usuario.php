<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<?php
/**
 * Created by PhpStorm.
 * User: felipe
 * Date: 19/03/2017
 * Time: 21:42
 */
session_start();
require_once "conexaoDB.php";
require_once "Usuario.php";
require_once "ServiceDb.php";

$conexao = conexaoDB();

$usuarios = new Usuario();

$usuarios =  new ServiceDb($conexao, $usuarios);

echo "<h2>Listando todos os usuarios</h2>";
$conteudo = "";
$conteudo .= "<div> <a href='index.php' class='btn btn-sm'>home</a></div>";
$conteudo .= "<div> <a href='incluir_usuario.php' class='btn btn-sm'>incluir novo registro</a></div>";
$conteudo .= "<table class='table table-striped table-hover table-condensed' >";
$conteudo .= "<tr>
<td>#</td>
<td>Nome</td>
<td>Email</td>
<td>Login</td>
<td>Senha</td>
<td>Opções</td>

</tr>";
foreach ($usuarios -> listar() as $usuario) {
    $conteudo .= "<tr>";
    $conteudo .= "<td>{$usuario['id']}</td>";
    $conteudo .= "<td>{$usuario['nome']}</td>";
    $conteudo .= "<td>{$usuario['email']}</td>";
    $conteudo .= "<td>{$usuario['login']}</td>";
    $conteudo .= "<td>{$usuario['senha']}</td>";
    $conteudo .= "<td> <a href='exibir_usuario.php?id={$usuario['id']}' class='btn btn-sm btn-primary' role='button'>exibir</a>";
    $conteudo .= " <a href='editar_usuario.php?id={$usuario['id']}' class='btn btn-sm btn-info' role='button'>editar</a>";
    $conteudo .= " <a href='excluir_usuario.php?id={$usuario['id']}' class='btn btn-sm btn-danger' role='button'>excluir</a></td>";
    $conteudo .= "</tr>";
}
$conteudo .= "</table>";

echo $conteudo;


require_once ('rodape.php');