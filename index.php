<?php
// 各種フォルダの定義
define( 'BASE_DIR', dirname(__FILE__) . '/' );
define( 'CLASS_DIR', BASE_DIR . 'class/' );
define( 'VIEW_DIR', BASE_DIR . 'view/' );

//コントローラ取り込み
require_once (CLASS_DIR . 'Controller.class.php');
//コントローラ実行
Controller::execute();