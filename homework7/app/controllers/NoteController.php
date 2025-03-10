<?php
//require_once __DIR__ . '/../models/NoteModel.php';
namespace app\controllers;

class NoteController 
{
    private $noteModel;

    // public function __construct() 
    // {
    //     $this->noteModel = new NoteModel();
    // }

    public function createNote() 
    {
        // Ensure the response is always JSON
        // header('Content-Type: application/json');
        // ob_clean(); // Clears any unwanted output

        $response = [
            "status" => "error", 
            "message" => "Invalid request"
        ];

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $title = htmlspecialchars(trim($_POST["title"] ?? ""));
            $description = htmlspecialchars(trim($_POST["description"] ?? ""));

            if (strlen($title) < 3) 
            {
                $response["message"] = "Title must be at least 3 characters.";
            } elseif (strlen($description) < 10) 
            {
                $response["message"] = "Description must be at least 10 characters.";
            } else 
            {
                $saved = $this->noteModel->createNote($title, $description);
                if ($saved) 
                {
                    $response = ["status" => "success", "message" => "Note created successfully!"];
                } else 
                {
                    $response["message"] = "Failed to create note.";
                }
            }
        }

        echo json_encode($response);
        exit; // Stop execution after outputting JSON
    }
}

// Create controller instance and process request
// $controller = new NoteController();
// $controller->createNote();
?>
