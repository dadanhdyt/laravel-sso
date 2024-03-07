<?php

namespace App\Exceptions;
class UnsuportedGrantTypeException extends \InvalidArgumentException implements ExceptionInterface
{
    public function __construct($message = "", $code = 0, $previous = null)
    {
        $messages = [
            'error' => 'unsuported_grant_type',
            'error_description' => $message,
        ];
        parent::__construct(serialize($messages), $code, $previous);
    }
}
