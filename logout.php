<?php
/**
 * Created by PhpStorm.
 * User: felipe
 * Date: 19/03/2017
 * Time: 21:20
 */

function logout()
{
    session_start();
    session_destroy();
}

logout();
header('Location: index.php');