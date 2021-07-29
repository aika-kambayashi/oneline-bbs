<?php
class Logic {
    private $data;
    private $errorData;
    private $request;
    private $view;
    private $db;

    public function execute($action) {
        switch ($action) {
            case 'form' :
                $this->getPost();
                break;
            case 'register' :
                // リクエストデータの取得
                $this->getPostParameters();
                // 入力値のチェック
                if (!Validation::isRequired( $this->data->getName() )) {
                    $this->errorData->addError( 'name', '名前は必須です' );
                }
                if (!Validation::isRequired( $this->data->getComment() )) {
                    $this->errorData->addError( 'comment', 'コメントは必須です' );
                }
                // エラーがある場合、入力画面を表示
                if ($this->errorData->hasError()) {
                    $this->getPost();
                    $this->request->setAction( 'form' );
                } else {
                    // DBへの登録
                    $this->registerPost();
                }
                break;
            default :
                break;
        }
        $this->view->setBaseTemplate( VIEW_DIR . 'base-template.php' );
        $this->view->render( $this->data, $this->errorData );
    }

    private function getPostParameters() {
        $vars = array_keys( get_object_vars( $this->data ) );
        foreach( $vars as $var ) {
            $this->data->var = $this->request->getParameter( $var );
        }
    }

    private function getPost() {
        $sql = 'SELECT id, name, comment from posts order by created_at desc';
        $this->data->setPosts( $this->db->query( $sql ) );
    }

    private function registerPost() {
        $sql = 'insert into posts (name, comment, created_at) values (:name, :comment, now())';
        $params['name'] = $this->data->getName();
        $params['name'] = $this->data->getComment();
        $this->db->execute( $sql, $params );
    }

    public function setData($data) {
        $this->data = $data;
    }

    public function setRequest($request) {
        $this->data = $request;
    }

    public function setView($view) {
        $this->view = $view;
    }

    public function setDB($db) {
        $this->db = $db;
    }

    public function setErrorData($errorData) {
        $this->errorData = $errorData;
    }
}