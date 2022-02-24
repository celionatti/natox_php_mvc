<?php

/**User: Celio Natti... */

namespace natoxCore;

/**
 * Class View
 * 
 * @author Celio Natti <Celionatti@gmail.com>
 * @package natoxCore
 */

 class View
 {

    private $_siteTitle = '', $_content = [], $_currentContent, $_buffer, $_layout;
    private $_defaultViewPath;

    public function __construct($path = '')
    {
        $this->_defaultViewPath = $path;
        $this->_siteTitle = Config::get('default_site_title');
    }

    public function setLayout($layout)
    {
        $this->_layout = $layout;
    }

    public function setSiteTitle($title)
    {
        $this->_siteTitle = $title;
    }

    public function getSiteTitle()
    {
        return $this->_siteTitle;
    }

    public function render($path = '')
    {
        if (empty($path)) {
            $path = $this->_defaultViewPath;
        }
        $layoutPath = Application::$ROOT_DIR . "/src/views/layouts/$this->_layout.php";
        $fullPath = Application::$ROOT_DIR . "/src/views/$path.php";
        if (!file_exists($fullPath)) {
            throw new \Exception("The view \"{$path}\" does not exist.");
        }
        if (!file_exists($layoutPath)) {
            throw new \Exception("The layout \"{$this->_layout}\" does not exist.");
        }
        include($fullPath);
        include($layoutPath);
    }

    public function start($key)
    {
        if (empty($key)) {
            throw new \Exception("Your start method requires a valid key.");
        }
        $this->_buffer = $key;
        ob_start();
    }

    public function end()
    {
        if (empty($this->_buffer)) {
            throw new \Exception("You must first run the start method.");
        }
        $this->_content[$this->_buffer] = ob_get_clean();
        $this->_buffer = null;
    }

    public function content($key)
    {
        if (array_key_exists($key, $this->_content)) {
            echo $this->_content[$key];
        } else {
            echo '';
        }
    }

    public function partial($path)
    {
        $fullPath = Application::$ROOT_DIR . "/src/views/$path.php";
        if (file_exists($fullPath)) {
            include($fullPath);
        }
    }
    // public string $title = '';

    // public function renderView($view, array $params)
    // {
    //     $layoutName = Application::$app->layout;
    //     if (Application::$app->controller) {
    //         $layoutName = Application::$app->controller->layout;
    //     }
    //     $viewContent = $this->renderViewOnly($view, $params);
    //     ob_start();
    //     include_once Application::$ROOT_DIR . "/src/views/layouts/$layoutName.php";
    //     $layoutContent = ob_get_clean();
    //     return str_replace('{{content}}', $viewContent, $layoutContent);
    // }

    // public function renderViewOnly($view, array $params)
    // {
    //     foreach ($params as $key => $value) {
    //         $$key = $value;
    //     }
    //     ob_start();
    //     include_once Application::$ROOT_DIR . "/src/views/$view.php";
    //     return ob_get_clean();
    // }
 }