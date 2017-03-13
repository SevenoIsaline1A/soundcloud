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

// Création upload
Route::get("chanson/nouvelle", "Welcome@formupload");
Route::post("chanson/cree", "Welcome@formupload");

/** End default Routes */
