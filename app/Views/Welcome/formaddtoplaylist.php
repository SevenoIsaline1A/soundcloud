<?php
foreach ($playlists as $p) {
    echo HTML::link("/addtoplaylist/$p->id/$idchanson", $p->nom)."<br />";
}