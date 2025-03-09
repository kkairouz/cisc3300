# Note App (PHP MVC)
A simple PHP MVC-based note-taking application.

## Setup Instructions
1. **Create Database**
```sql
CREATE DATABASE note_app;
USE note_app;

CREATE TABLE notes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

2. **Run Apache & MySQL (XAMPP/MAMP).**
3. **Place project inside `htdocs/` (XAMPP) or `www/` (MAMP).**
4. **Visit `http://localhost/note-app/public/form.php` to test.**

## Features
- MVC Structure (Model, View, Controller)
- Basic validation (Title & Description)
- Frontend error handling & success messages

### Future Features (Optional)
- Edit & Delete Notes
- View all notes in a list

Happy coding! 🚀