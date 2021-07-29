<?php
class Request {
    private $post;

    public function __construct() {
        if (!empty($_POST)) {
            $this->post = $_POST;
        } else {
            $this->post = [];
        }
    }

    public function getParameter($key) {
        if (isset($this->post[$key])) {
            return $this->post[$key];
        }
    }

    public function setAction($action) {
        $this->post['action'] = $action;
    }

    public function getAction() {
        $action = 'form';
        if (!empty($this->post) && isset($this->post['action'])) {
            $action = $this->post['action'];
        }
        return $action;
    }
}