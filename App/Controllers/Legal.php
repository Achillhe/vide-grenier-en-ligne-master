<?php

namespace App\Controllers;

use \Core\View;

class Legal extends \Core\Controller
{
    public function cookieAction(){
        View::renderTemplate('Legal/Cookie.html');
    }

    public function privacyAction(){
        View::renderTemplate('Legal/Privacy.html');
    } 
}

?>