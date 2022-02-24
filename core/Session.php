<?php

/**User: Celio Natti... */

namespace natoxCore;

use natoxCore\helpers\GenerateToken;

/**
 * Class Session
 * 
 * @author Celio Natti <Celionatti@gmail.com>
 * @package natoxCore
 */

 class Session
 {
    public function __construct()
    {
        session_start();
    }

    public static function exists($name)
    {
        return isset($_SESSION[$name]);
    }

    public static function set($name, $value)
    {
        $_SESSION[$name] = $value;
    }

    public static function get($name)
    {
        if (self::exists($name) && !empty($_SESSION[$name])) {
            return $_SESSION[$name];
        }
        return false;
    }

    public static function delete($name)
    {
        unset($_SESSION[$name]);
    }

    public static function createCsrfToken()
    {
        $token = GenerateToken::CreateToken();
        self::set('csrfToken', $token);
        return $token;
    }

    public static function csrfCheck()
    {
        $request = new Request();
        $check = $request->get('csrfToken');
        if (self::exists('csrfToken') && self::get('csrfToken') == $check) {
            return true;
        }
        Response::redirect('badToken');
    }

    // $type can be primary, secondary, success, danger, warning, info, light, dark
    public static function msg($msg, $type = 'danger')
    {
        $alerts = self::exists('session_alerts') ? self::get('session_alerts') : [];
        $alerts[$type][] = $msg;
        self::set('session_alerts', $alerts);
    }

    public static function displaySessionAlerts()
    {
        $alerts = self::exists('session_alerts') ? self::get('session_alerts') : [];
        $html = "";
        foreach ($alerts as $type => $msgs) {
            foreach ($msgs as $msg) {
                $html .= "<div class='alert alert-{$type} alert-dismissible fade show' role='alert'>
                {$msg}
          <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>";
            }
        }
        self::delete('session_alerts');
        return $html;
    }
 }