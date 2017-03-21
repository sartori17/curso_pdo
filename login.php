<?php
/**
 * Created by PhpStorm.
 * User: felipe
 * Date: 19/03/2017
 * Time: 13:33
 */

session_start();
require_once "conexaoDB.php";

//$passwd = password_hash ($pass, PASSWORD_DEFAULT);

function dados_usuario ($login)
{
    $conn = conexaoDB();

    $query = "select * from usuarios u where login = :nick ";

    $stmt = $conn->prepare($query);
    $stmt->bindParam(":nick", $login, PDO::PARAM_STR);
    $stmt->execute();
    $stmt->errorInfo();
    var_dump ($stmt->errorInfo());

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    return $user;
}

function login ($login, $pass)
{
    $user = dados_usuario($login);
    $hashed_password = $user['senha'];

    if (password_verify($pass, $hashed_password)) {
        $_SESSION['logado'] = 1;
        $_SESSION['user'] = $user;
        header('Location: index.php');
    } else {
        header('Location: acesso.php');
    }

    return null;
}

if (isset($_POST['InputLogin'])) {
    login($_POST['InputLogin'], $_POST['InputPass']);
}