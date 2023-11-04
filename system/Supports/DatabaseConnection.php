<?php

namespace DevSkill\Supports;

use PDO;
use PDOException;

class DatabaseConnection
{
    protected  $connection = null;

    public function __construct(Request $request) {
      $this->connect();
    }

    protected function connect(): void
    {
        $dbName = "devskill";
        $username = "root";
        $password = "";

        try {
            $conn = new PDO("mysql:host=localhost;dbname=".$dbName, $username, $password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->connection = $conn;
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }

    }


    public function getConnection()
    {
        return $this->connection;
    }

}