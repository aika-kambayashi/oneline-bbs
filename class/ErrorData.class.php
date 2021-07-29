<?php
class ErrorData {
    private $data;

    public function __construct() {
        $this->data = [];
    }

    public function addError($key, $message) {
        $this->data[$key] = $message;
    }

    public function getError($key) {
        if(isset( $this->data[$key] )) {
            return $this->data[$key];
        }
    }

    public function getAllErrors() {
        return $this->data;
    }

    public function hasError() {
        return empty( $this->data ) ? false : true;
    }
}