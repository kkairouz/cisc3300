<?php
require_once __DIR__ . '/../../config/Database.php';

class NoteModel 
{
    private $conn;

    public function __construct() 
    {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function createNote($title, $description) 
    {
        $sql = "INSERT INTO notes (title, description) VALUES (:title, :description)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':description', $description);
        return $stmt->execute();
    }
}
?>