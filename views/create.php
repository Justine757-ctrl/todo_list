<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter une tâche</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        max-width: 700px;
        margin: 40px auto;
        background-color: #f4f4f4;
    }
    h1 {
        text-align: center;
        margin-bottom: 30px;
    }
    form {
        background: white;
        border: 1px solid #ddd;
        padding: 20px;
        display: grid;
        grid-template-columns: 1fr 120px; /* 2 colonnes invisibles */
        gap: 10px;
        align-items: center;
    }
    input[type="text"] {
        padding: 8px;
        font-size: 1em;
        border: 1px solid #ccc;
        outline: none;
    }
    input[type="text"]:focus {
        border: 1px solid black;
    }
    button {
        padding: 8px;
        font-size: 0.95em;
        border: 1px solid #ccc;
        background-color: #eee;
        cursor: pointer;
    }
    button:hover {
        background-color: #ddd;
    }
    a {
        display: inline-block;
        margin-top: 20px;
        text-decoration: none;
        padding: 6px 10px;
        border: 1px solid #ccc;
        background-color: #eee;
        color: black;
    }
    a:hover {
        background-color: #ddd;
    }
</style>
</head>
<body>
    <h1>➕ Nouvelle tâche</h1>

    <form method="POST" action="<?= htmlspecialchars($_SERVER['SCRIPT_NAME']) ?>?action=create">
        <input type="text" name="titre" placeholder="Ex: Apprendre le MVC" required>
        <button type="submit">Ajouter</button>
    </form>

    <a href="<?= htmlspecialchars($_SERVER['SCRIPT_NAME']) ?>?action=index"> Retour </a>
</body>
</html>
