<h3>Bienvenue chez <?= $user->username;?></h3>

<?php
    if(Auth::check() && Auth::id() != $user->id){
        if(Auth::user()->suit->contains($user->id) == false)
            echo HTML::link("/follow/$user->id", "Follow");
        else
            echo HTML::link("/unfollow/$user->id", "Unfollow");
    }

?>

<br />

Suit <?= $user->suit->count();?> personnes <br />
Suivi par <?= $user->estSuiviPar->count();?> personnes <br />

<?php
include("chansons.php");