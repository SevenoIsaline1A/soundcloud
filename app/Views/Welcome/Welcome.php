<?php
foreach ($all as $c) {
//  Pour afficher la jaquette : ."<img href='#' class='cover' src='$c->cover' />"
    echo "Chanson : ".$c->nom."<br />".
        "Artiste : ".$c->artist."<br />".
        "Album : ".$c->album."<br />".
        "Style : ".$c->style."<br />".
        "Uploadé par : ".$c->utilisateur->username."<br />".
        "<a href='#' class='listen' data-file='$c->fichier'>Listen</a>"."<br />";
}
?>

<script>
    $(document).ready(function () {
        $('a.listen').on('click', function (e) {
            e.preventDefault();
            var audio = $("#player");
            var file = $(this).attr('data-file');
            console.log(file);
            audio[0].src = file;
            audio[0].play();
        });
    });
</script>
