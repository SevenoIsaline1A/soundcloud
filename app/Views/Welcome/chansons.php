<?php
foreach ($all as $c) {
//  Pour afficher la jaquette : ."<img href='#' class='cover' src='$c->cover' />"
    echo "Chanson : ".$c->nom."<br />".
        "Artiste : ".$c->artist."<br />".
        "Album : ".$c->album."<br />".
        "Style : ".$c->style."<br />".
        "Uploadé par : ".$c->utilisateur->username."<br />".
        "<a href='#' class='listen' data-file='$c->fichier'>Ecouter</a>"."<br />".
        "<a href='/addtoplaylist/1/$c->id'>To pl1</a>"."<br />".
        "<a href='/formpl' class='addtopl' data-id='$c->id'>+</a>"."<br />";
}
?>

<div id="formplaylist">

</div>

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

        $('a.addtopl').on('click', function(e) {
            e.preventDefault();

            $.ajax({
                type: "get",
                url: "/allplaylists/" + $(this).attr('data-id'),
                success: function (data, textStatus, jgXHR){
                    $("formtoplaylist").html(data);
                }
                error: function (jgXHR, textStatus,error){
                    //Manque des trucs
                }
            })

        });

    });
</script>
