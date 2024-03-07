<?php
namespace App\Exceptions;
class InvalidClientException extends \InvalidArgumentException{
    public function __construct($message = "", $code = 0, $previous = null)
    {
        $messages = [
            'error' => 'invalid_client',
            'error_description' => $message,
        ];
        parent::__construct(serialize($messages), $code, $previous);
    }
}
