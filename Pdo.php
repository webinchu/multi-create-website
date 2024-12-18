<?php

class Database
{
    private $host;
    private $dbName;
    private $username;
    private $password;
    private $conn;

    public function __construct($host, $dbName, $username, $password)
    {
        $this->host = $host;
        $this->dbName = $dbName;
        $this->username = $username;
        $this->password = $password;
        $this->connect();
    }

    private function connect()
    {
        try {
            $dsn = "mysql:host={$this->host};dbname={$this->dbName};charset=utf8mb4";
            $this->conn = new PDO($dsn, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Database connection failed: " . $e->getMessage());
        }
    }

    public function create($table, $data)
    {
        $columns = implode(',', array_keys($data));
        $placeholders = ':' . implode(',:', array_keys($data));
        $sql = "INSERT INTO $table ($columns) VALUES ($placeholders)";
        $stmt = $this->conn->prepare($sql);
        foreach ($data as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }
        return $stmt->execute();
    }

    public function read($table, $conditions = [], $columns = '*')
    {
        $sql = "SELECT $columns FROM $table";
        if (!empty($conditions)) {
            $whereClauses = [];
            foreach ($conditions as $key => $value) {
                $whereClauses[] = "$key = :$key";
            }
            $sql .= " WHERE " . implode(' AND ', $whereClauses);
        }
        $stmt = $this->conn->prepare($sql);
        foreach ($conditions as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update($table, $data, $conditions)
    {
        $setClauses = [];
        foreach ($data as $key => $value) {
            $setClauses[] = "$key = :$key";
        }
        $whereClauses = [];
        foreach ($conditions as $key => $value) {
            $whereClauses[] = "$key = :where_$key";
        }
        $sql = "UPDATE $table SET " . implode(', ', $setClauses) . " WHERE " . implode(' AND ', $whereClauses);
        $stmt = $this->conn->prepare($sql);
        foreach ($data as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }
        foreach ($conditions as $key => $value) {
            $stmt->bindValue(":where_$key", $value);
        }
        return $stmt->execute();
    }

    public function delete($table, $conditions)
    {
        $whereClauses = [];
        foreach ($conditions as $key => $value) {
            $whereClauses[] = "$key = :$key";
        }
        $sql = "DELETE FROM $table WHERE " . implode(' AND ', $whereClauses);
        $stmt = $this->conn->prepare($sql);
        foreach ($conditions as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }
        return $stmt->execute();
    }
}
