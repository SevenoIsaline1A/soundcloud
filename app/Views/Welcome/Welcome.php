<?php
include('chansons.php');
?>
<script>
$(document).ready(function () {
    $('#playlistform').on('submit', function (e) {
        e.preventDefault();
        $.ajax({
            type: "post",
            url: "/playlist/cree",
            data: {
                playlist : $('plname').val()
            },
            success: function (data, textStatus, jgXHR) {
                $("#allplaylists").html(data);
            },
            error: function(jgXHR, textStatus, errorThrown){
                console.log("lol");
            }
        })
    })
})
</script>
