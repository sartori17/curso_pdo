<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<?php
/**
 * Created by PhpStorm.
 * User: felipe
 * Date: 20/03/2017
 * Time: 21:01
 */
session_start();
require_once 'Usuario.php';
require_once 'ServiceDb.php';
require_once "conexaoDB.php";

$id = $_GET['id'];

$conexao = conexaoDB();

$usuario = new Usuario($conexao);
$db = new ServiceDb($conexao, $usuario);

if ($db -> deletar($id)) {
    echo "Dados excluidos com sucesso.<br>";
} else {
    echo "Algo deu errado.<br>";
}

echo " <a href='listar_usuario.php' class='btn btn-sm'>listar todos</a>";

require_once ('rodape.php');