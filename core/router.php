<?php 



interface Database {
    public function connect();
}

class MySQLDatabase implements Database {
    public function connect() { /* Connexion MySQL */ }
}

class PostgreSQLDatabase implements Database {
    public function connect() { /* Connexion PostgreSQL */ }
}

class UserRepository {
    private $db;

    public function __construct(Database $db) {
        $this->db = $db;
    }
}















