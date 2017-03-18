<?php
/**
 * Created by PhpStorm.
 * User: felipe
 * Date: 18/03/2017
 * Time: 14:36
 */
    require_once 'Aluno.php';
    require_once "conexaoDB.php";

    $id = $_GET['id'];

    $conexao = conexaoDB();

    $aluno = new Aluno($conexao);

    if ($aluno -> deletar($id)) {
        echo "Dados excluidos com sucesso.<br>";
    } else {
        echo "Algo deu errado.<br>";
    }

    echo " <a href='index.php' class='btn btn-sm'>listar todos</a>";
