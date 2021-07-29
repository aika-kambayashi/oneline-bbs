<?php
class Data {
    public $name;
    public $comment;
    public $posts;

    public function setName($name) {
        $this->name = $name;
    }

    public function setComment($comment) {
        $this->comment = $comment;
    }

    public function setPosts($posts) {
        $this->posts = $posts;
    }

    public function getName() {
        return $this->name;
    }

    public function getComment() {
        return $this->comment;
    }
    
    public function getPosts() {
        return $this->posts;
    }
}