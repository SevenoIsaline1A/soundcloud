<?php
/**
 * Welcome controller
 *
 * @author David Carr - dave@novaframework.com
 * @version 3.0
 */

namespace App\Controllers;

use App\Core\Controller;

use App\Models\Chanson;
use Nova\Support\Facades\Auth;
use Nova\Support\Facades\Input;
use Nova\Support\Facades\Redirect;
use View;


/**
 * Sample controller showing 2 methods and their typical usage.
 */
class Welcome extends Controller
{

    /**
     * Create and return a View instance.
     */
    public function index()
    {
        $message = __('Hello, welcome from the welcome controller! <br/>
this content can be changed in <code>/app/Views/Welcome/Welcome.php</code>');
        
//        $c = Chanson::find(1);
//        $c->fichier = 'toto';
//        $c->save();
        
        /*$c = new Chanson();
        $c ->nom = "test";
        $c ->duree = "00:02:00";
        $c ->fichier = "blabla";
        $c ->post_date = "2017-07-03";
        $c ->style = "Rock";
        $c ->utilisateur_id = 1;
        $c ->save();return View::make('Welcome/Welcome')
            ->shares('title', __('Welcome'))
            ->with('welcomeMessage', $message);*/

        return View::make('Welcome/Welcome')
            ->shares('title', __('Welcome'))
            ->with('welcomeMessage', $message)
            ->with('all', Chanson::all());
    }

    public function formupload()
    {
        return View::make('Welcome/formupload')
            ->shares('title', 'nouvelle');
    }

    public function creechanson()
    {
        if (Input::has('nom') &&
            Input::has('style') &&
            Input::has('artist') &&
            Input::has('album') &&
            Input::hasFile('cover') &&
            Input::hasFile('chanson') &&
            Input::file('chanson')->isValid()) {
            $file = Input::file("chanson")->getClientOriginalName();
            $cover = Input::file("cover")->getClientOriginalName();
            $f = Input::file("chanson")->move("assets/images/".Auth::user()->username, $file);
            $g = Input::file("cover")->move("assets/images/".Auth::user()->username, $cover);
            $c = new Chanson();
            $c->nom = Input::get('nom');
            $c->style = Input::get('style');
            $c->artist = Input::get('artist');
            $c->album = Input::get('album');
            $c->fichier = "/".$f;
            $c->cover = "/".$g;
            $c->utilisateur_id = Auth::id();
            $c->duree="";
            $c->post_date = date('Y-m-d h:i:s');
            $c->save();
            return Redirect::to('/');
        }


        echo "<pre>";
        echo "<br />";

        print_r($_POST);

        echo "<br />";
        print_r($_FILES);

        echo "</pre>";
        die(1);
    }

    /**
     * Create and return a View instance.
     */
    public function subPage()
    {
        $message = __('Hello, welcome from the welcome controller and subpage method! <br/>
This content can be changed in <code>/app/Views/Welcome/SubPage.php</code>');

        return $this->getView()
            ->shares('title', __('Subpage'))
            ->withWelcomeMessage($message);
    }
    public function about(){
        return View::make('Welcome/about')
            ->shares('title', __('About'))
            ->with('nom','Gilles');
    }
        public function  param($id){
        return View::make('Welcome/param')
            ->shares('title', __('Param'))
            ->with('id','$id');
    }


}

