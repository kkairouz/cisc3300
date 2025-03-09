<?php
class Database 
{
    private $host = "localhost";
    private $dbname = "note_app";
    private $username = "root"; 
    private $password = "root"; 
    public $conn;

    public function getConnection() 
    {
        $this->conn = null;
        try 
        {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->dbname, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $exception) {
            error_log("Database connection error: " . $exception->getMessage()); // Logs error
            echo json_encode(["status" => "error", "message" => "Database connection failed"]); // ✅ Returns JSON
            exit;
        }
        
        return $this->conn;
    }
}
?>
