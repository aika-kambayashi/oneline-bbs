<?php
class Validation {
    //　必須チェック
    static function isRequired($param) {
        if (empty($param)) {
            return false;
        } else {
            return true;
        }
    }
}