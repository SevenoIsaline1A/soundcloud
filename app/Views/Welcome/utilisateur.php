<h3>Bienvenue chez <?= $user->username;?></h3>

<?php
    if(Auth::check() && Auth::id() != $user=id)

?>

<?php
include("chansons.php");