<?php
namespace App\Exceptions;
class InvalidGrantException extends \InvalidArgumentException{
    public function __construct($message = "", $code = 0, $previous = null)
    {
        $messages = [
            'error' => 'invalid_grant_type',
            'error_description' => $message,
        ];
        parent::__construct(serialize($messages), $code, $previous);
    }
}
