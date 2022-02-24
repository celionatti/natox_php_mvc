<?php

/**User: Celio Natti... */

namespace natoxCore;

use natoxCore\middlewares\BaseMiddleware;

/**
 * Class Controller
 * 
 * @author Celio Natti <Celionatti@gmail.com>
 * @package natoxCore
 */

 class Controller
 {
    public string $layout = 'main';
    public string $action = '';
    public $view;

    /**
     * @var \natoxCore\BaseMiddleware[]
     */
    protected array $middlewares = [];

    public function __construct()
    {
        $this->view = new View();
        $this->view->setLayout(Config::get('DEFAULT_LAYOUT'));
        $this->onConstruct();
    }

    /**
     * onConstruct Function
     *
     *This function is used to add additional method to the constructor
     *
     * @return void
     */
    public function onConstruct()
    {
    }
 }