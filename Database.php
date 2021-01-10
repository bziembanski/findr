<?php

require_once 'database-config.php';
class Database
{
    private string $username;
    private string $password;
    private string $host;
    private string $database;
    private string $port;

    /**
     * Database constructor.
     */
    public function __construct()
    {
        $this->username = USER;
        $this->password = PASSWORD;
        $this->host = HOST;
        $this->database = DATABASE;
        $this->port = PORT;
    }

    public function connect(): PDO
    {
        try{
            $conn = new PDO(
                "pgsql:host=$this->host;port=$this->port;dbname=$this->database",
                $this->username,
                $this->password,
                ["sslmode"=>"prefer"]
            );
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        }catch (PDOException $e){
            die('Connection failed: '.$e->getMessage());
        }
    }

}