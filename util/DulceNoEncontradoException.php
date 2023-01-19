<?php 
include_once "PasteleriaException.php";

class DulceNoEncontradoException extends PasteleriaException
{
    public function __construct($message)
    {
        parent::__construct($message);
    }

    public function getMensaje()
    {
        return $this->message;
    }
}