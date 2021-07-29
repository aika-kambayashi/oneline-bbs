<?php
class View {
    public $base_template_filename;
    public $content;

    public function setBaseTemplate($filename) {
        $this->base_template_filename = $filename;
    }

    public function render($data, $errorData) {
        ob_start();
        ob_implicit_flush(0);
        require_once ($this->base_template_filename);
        $content = ob_get_clean();
        $this->content = $content;
    }

    public function show() {
        echo $this->content;
    }
}