<?php

namespace App\Exceptions;

use Exception;

class ObjectNotFoundException extends Exception
{
    public function __construct($object)
    {
        parent::__construct(sprintf('%s not found', $object));
    }
}
