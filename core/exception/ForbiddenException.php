<?php

/**
 * User: Celio Natti
 * Date: 2/23/2022
 * Time: 1:24 AM
 */

namespace natoxCore\exception;


/**
 * Class ForbiddenException
 * 
 * @author Celio Natti <Celionatti@gmail.com>
 * @package natoxCore\exception
 */
class ForbiddenException extends \Exception
{
    protected $message = 'You don\'t have permission to access this page';
    protected $code = 403;
}
