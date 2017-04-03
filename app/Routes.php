<?php
/**
 * Routes - all standard Routes are defined here.
 *
 * @author David Carr - dave@daveismyname.com
 * @author Virgil-Adrian Teaca - virgil@giulianaeassociati.com
 * @version 3.0
 */


/** Define static routes. */

// The default Routing
Route::get('/',       'Welcome@index');
Route::get('subpage', 'Welcome@subPage');
Route::get('about','Welcome@about' );

Route::get('/param/{id}', 'Welcome@param') -> where('id','[0-9]+');

// Utilisateur
Route::get("/utilisateur/{id}", "Welcome@utilisateur")->where ('id', '[0-9]+');



// Si loggé :
if (\Nova\Support\Facades\Auth::check()==true){
    Route::get('/follow/{id}', 'Welcome@follow')->where('id', '[0-9]+');
    Route::get('/unfollow/{id}', 'Welcome@unfollow')->where('id', '[0-9]+');

    // Création upload
    Route::get("chanson/nouvelle", "Welcome@formupload");
    Route::post("chanson/cree", "Welcome@creechanson");

    // Création playlist
    Route::post("playlist/cree", "Welcome@creeplaylist");

    Route::get('/addtoplaylist/{plid}/{chid}', 'Welcome@addtoplaylist')
        -> where ('plid', '[0-9]+')
        -> where ('chid', '[0-9]+');

    Route::get("/allplaylists/{idchanson}", 'Welcome@formAddToPlaylist')
        ->where('idchanson', '[0-9]+');

}