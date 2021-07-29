<?php
require_once (CLASS_DIR . 'Request.class.php');
require_once (CLASS_DIR . 'View.class.php');
require_once (CLASS_DIR . 'Logic.class.php');
require_once (CLASS_DIR . 'Data.class.php');
require_once (CLASS_DIR . 'ErrorData.class.php');
require_once (CLASS_DIR . 'DB.class.php');
require_once (CLASS_DIR . 'Validation.class.php');

class Controller {
    public static $logic;
    public static $request;
    public static $view;

//コントローラのメインの実行メソッド
static function execute() {
    self::$logic = new Logic();
    self::$request = new Request();
    self::$logic->setRequest( Controller ::$request );
    self::$view = new View();
    self::$logic->setView( Controller::$view );
    self::$logic->setData( new Data() );
    self::$logic->setErrorData( new ErrorData() );
    self::$logic->setDB( new DB() );
    //ロジッククラスの実行
    self::$logic->execute( Controller::$request->getAction() );
    //VIEWクラスを通してHTMLを表示する
    self::$view->show();
}

static function getTemplateName() {
    $action = self::$request->getAction();
    $template_name = VIEW_DIR . $action . '.php';
    return $template_name;
}

}