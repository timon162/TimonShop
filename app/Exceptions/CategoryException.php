<?php

namespace App\Exceptions;

use Exception;

class CategoryException extends Exception
{
    protected $message = 'category not found';
}
