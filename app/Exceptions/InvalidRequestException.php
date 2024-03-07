<?php
namespace App\Exceptions;
class InvalidRequestException extends \Exception{
    public function __construct($message = "", $code = 0, $previous = null)
    {
        $messages = [
            'error' => 'invalid_request',
            'error_description' => $message,
        ];
        parent::__construct(serialize($messages), $code, $previous);
    }
}
