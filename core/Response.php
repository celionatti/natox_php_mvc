<?php

/**User: Celio Natti... */

namespace natoxCore;

/**
 * Class Response
 * 
 * @author Celio Natti <Celionatti@gmail.com>
 * @package natox\controllers
 */

class Response
{
    public function statusCode(int $code)
    {
        http_response_code($code);
    }

    public static function redirect($url)
    {
        header("Location: $url");
    }
}
