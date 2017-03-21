<?php
/**
 * Created by PhpStorm.
 * User: felipe
 * Date: 19/03/2017
 * Time: 21:43
 */

if (!isset($_SESSION['logado'])) {
    header('Location: acesso.php');
}
?>
<hr>
<div style="text-align: center;">
    <?php if (isset($_SESSION['logado'])) { ?>
        <br>
        logado como <?= $_SESSION['user']['nome'] ?> (<?= $_SESSION['user']['login'] ?>)
        <form class="form-inline" method="post" action="logout.php">
            <button type="submit" class="btn btn-danger btn-xs">logout</button>
        </form>
    <?php } ?>
</div>

