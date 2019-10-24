<?php

namespace App\Exceptions;

use Exception;

class ActionNotCompletedException extends Exception
{
    public function render($request)
    {
        return response()->view('User\exceptions\noMethod', [], 501);
    }
}
