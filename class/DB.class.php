<?php

class DB {
    private $username = 'root';
    private $password = '';
    private $database = 'bbs';
    private $host = 'localhost';
    private $connection;

    public function __construct() {
        // DSN
        $dsn = "mysql:host={$this->host};dbname={$this->database};charset=utf8";
        // DB
        $this->connection = new PDO( $dsn, $this->username, $this->password );
        // 結果を連想配列で取得
        $this->connection->setAttribute( PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC );
    }

    public function query($sql, $params = []) {
        $stmt = $this->connection->prepare( $sql );
        $stmt->execute( $params );
        return $stmt->fetchAll();
    }

    public function execute($sql, $params) {
        $statement = $this->connection->prepare( $sql );
        $result = $statement->execute( $params );
        if ($result) {
            return $statement;
        } else {
            return false;
        }
    }
}