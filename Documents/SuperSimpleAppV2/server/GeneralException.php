<?php
/**
 * Define a custom exception class
 */
class GeneralException extends Exception
{
    private $error;

    // Redefine the exception so message isn't optional
    public function __construct($message, $error = null, $code = 0, Exception $previous = null) {
        // some code
        $this->error = $error;

        // make sure everything is assigned properly
        parent::__construct($message, $code, $previous);
    }

    // custom string representation of object
    public function __toString() {
        return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
    }

    /**
     * @return mixed
     */
    public function getError()
    {
        return $this->error;
    }

    /**
     * @param mixed $error
     */
    public function setError($error)
    {
        $this->error = $error;
    }
}