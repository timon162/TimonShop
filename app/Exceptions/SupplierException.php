<?php

namespace App\Exceptions;

use Exception;

class SupplierException extends Exception
{
    protected $message = 'supplier not found';
}
