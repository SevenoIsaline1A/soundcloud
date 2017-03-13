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
            ->with('welcomeMessage', $message);
    }

    public function formupload()
    {
        return View::make('Welcome/formupload')
        ->shares('titles', 'nouvelle');
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

