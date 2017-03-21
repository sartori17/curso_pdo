<?php
/**
 * Created by PhpStorm.
 * User: felipe
 * Date: 18/03/2017
 * Time: 14:35
 */
session_start();
require_once 'Aluno.php';
require_once 'ServiceDb.php';
require_once "conexaoDB.php";

$id = $_GET['id'];
$conexao = conexaoDB();
$aluno = new Aluno();
$db = new ServiceDb($conexao, $aluno);

$aluno = $db -> find("id", $id);

echo "<h2>Listando aluno</h2>";

$conteudo = "";
$conteudo .= "<br>";
$conteudo .= "ID: ".$aluno['id']."<br>";
$conteudo .= "Nome: ".$aluno['nome']."<br>";
$conteudo .= "Nota: ".$aluno['nota']."<br>";
$conteudo .= "<br>";
$conteudo .= " <a href='listar_aluno.php' class='btn btn-sm'>listar todos</a>";
$conteudo .= " <a href='editar.php?id=" . $aluno['id'] . "' class='btn btn-sm'>editar</a>";
$conteudo .= " <a href='excluir.php?id=" . $aluno['id'] . "' class='btn btn-sm'>excluir</a>";

echo $conteudo;

require_once ('rodape.php');