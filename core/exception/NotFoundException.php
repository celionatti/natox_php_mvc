<?php

/**
 * User: Celio Natti
 * Date: 2/23/2022
 * Time: 1:24 AM
 */

namespace natoxCore\exception;


/**
 * Class NotFoundException
 * 
 * @author Celio Natti <Celionatti@gmail.com>
 * @package natoxCore\exception
 */
class NotFoundException extends \Exception
{
    protected $message = 'Page not found';
    protected $code = 404;
}
