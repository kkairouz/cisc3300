<!DOCTYPE html>
<html>
<head>
<title>problem 8 </title>
</head>
<style>
body 
{
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    text-align: center;
    padding: 50px;
}

.container 
{
    background: white;
    padding: 20px;
    border-radius: 10px;
    width: 300px;
    margin: auto;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

input, textarea 
{
    width: 100%;
    padding: 10px;
    margin: 10px 0;
    border: 1px solid #ddd;
    border-radius: 5px;
}

button 
{
    background-color: #28a745;
    color: white;
    border: none;
    padding: 10px;
    width: 100%;
    cursor: pointer;
    border-radius: 5px;
}

button:hover 
{
    background-color: #218838;
}

p 
{
    font-size: 14px;
    margin-top: 10px;
}
</style>
<body>
    <div class="container">
    <h2>Create a New Note</h2>
    <form id="noteForm">
    <label for="title">Title:</label>
    <input type="text" id="title" name="title" required>
    <label for="description">Description:</label>
    <textarea id="description" name="description" required></textarea>

    <button type="submit">Submit</button>
    </form>
    <p id="message"></p>
    </div>

    <script>
        document.getElementById("noteForm").addEventListener("submit", function(e) {
            e.preventDefault();
            const formData = new FormData(this);

            fetch("NoteController.php", 
            {
                method: "POST",
                body: formData
            })
            .then(response => response.json())
            .then(data => 
            {
                let message = document.getElementById("message");
                message.textContent = data.message;
                message.style.color = data.status === "success" ? "green" : "red";
            })
            .catch(error => console.error("Error:", error));
        });
    </script>
</body>
</html>