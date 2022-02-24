<?php

/**User: Celio Natti... */

namespace natox\controllers;

use natoxCore\Request;
use natoxCore\Controller;
use natoxCore\middlewares\AuthMiddleware;

/**
 * Class SiteController
 * 
 * @author Celio Natti <Celionatti@gmail.com>
 * @package natox\controllers
 */

 class SiteController extends Controller
 {  
    public function home()
    {
        $this->view->name = "The Natox";
        $this->view->age = "2020";
        $this->view->author = "Celio Natti";
        $this->view->render('home');
    }

    public function login(Request $request)
    {
        echo '<pre>';
        var_dump($request->getRouteParam('id'));
        echo '</pre>';
        
        $this->view->setLayout('auth');
        $this->view->errors = [];
        $this->view->render('auth/login');
    }
 }