<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ma Todo List</title>
   <style>
    body {
        font-family: Arial, sans-serif;
        max-width: 700px;
        margin: 40px auto;
        background-color: #f4f4f4;
    }

    h1 {
        text-align: center;
    }

    ul {
        list-style: none;
        padding: 0;
        background: white;
        border: 1px solid #ddd;
    }

    li {
        display: grid;
        grid-template-columns: 1fr 120px 120px; /* 3 colonnes invisibles */
        align-items: center;
        padding: 10px;
        border-bottom: 1px solid #ddd;
        font-size: 1.1em;
    }

    li:last-child {
        border-bottom: none;
    }

    .termine {
        text-decoration: line-through;
        color: gray;
    }

    span {
        padding-left: 5px;
    }

    a {
        text-decoration: none;
        text-align: center;
        padding: 6px 8px;
        border: 1px solid #ccc;
        background-color: #eee;
        color: black;
        font-size: 0.9em;
    }

    a:hover {
        background-color: #ddd;
    }

    a[href*="create"] {
        display: inline-block;
        margin-bottom: 15px;
        padding: 8px 10px;
        border: 1px solid black;
        background: white;
    }
</style>
</head>
<body>
    <h1>📝 Ma Todo List</h1>

    <a href="<?= htmlspecialchars($_SERVER['SCRIPT_NAME']) ?>?action=create">Ajouter une tâche</a>

    <ul>
        <?php foreach ($tasks as $task): ?>
            <li>
                <span class="<?= 
                //SI LA TACHES TERMINE ET : SI C' EST FAUX J' AFFICHE LA CHAINE DE CARACTÈRE VIDE EST TERMINER J' AFFICHE LA CLASSE CS
                $task['termine'] ? 'termine' : '' 
                // ?= EST UNE ABRÉVIATION DE php echo?>">
                
                    <?= htmlspecialchars($task['titre']) ?>
                </span>
                <a href="<?= htmlspecialchars($_SERVER['SCRIPT_NAME']) ?>?action=toggle&id=<?= $task['id'] ?>">
                    <?= $task['termine'] ? 'Reprendre↩️' : 'Fait ✅' ?>
                </a>
                <a href="<?= htmlspecialchars($_SERVER['SCRIPT_NAME']) ?>?action=delete&id=<?= $task['id'] ?>">Supprimer 🗑️</a>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>