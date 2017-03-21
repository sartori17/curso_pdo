<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<?php
/**
 * Created by PhpStorm.
 * User: felipe
 * Date: 19/03/2017
 * Time: 13:21
 */

?>

<form method="post" action="login.php">
    <div class="form-group">
        <label for="inputLogin">Login</label>
        <input type="text" class="form-control" id="InputLogin" name="InputLogin" placeholder="Login">
    </div>
    <div class="form-group">
        <label for="inputPassword">Senha</label>
        <input type="password" class="form-control" id="InputPass" name="InputPass" placeholder="Password">
    </div>
    <button type="submit" class="btn btn-default">Acessar</button>
</form>
