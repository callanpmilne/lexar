<?php

class UserInputException extends Exception {
  public function __construct (string $message) {
    Exception::__construct($message);
  }
}
