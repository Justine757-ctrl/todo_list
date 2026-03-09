<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ma Todo List</title>
   <style>
 li{
    display: grid;
    /* On définit 5 colonnes : 
       2 colonnes flexibles pour le texte (titre et description)
       et 3 colonnes de 100px pour les boutons */
    grid-template-columns: 1fr 1fr 100px 100px 100px; 
    gap: 15px; 
    align-items: center;
    padding: 12px;
    border-bottom: 1px solid #ddd;
    font-size: 1.1em;
}
/* Style pour la description afin qu'elle soit plus discrète que le titre */
li span:nth-child(2) {
    font-size: 0.9em;
    color: #666;
    font-style: italic;
}

/* On garde tes styles de boutons existants */
a {
    text-decoration: none;
    text-align: center;
    padding: 6px 8px;
    border: 1px solid #ccc;
    background-color: #eee;
    color: black;
    font-size: 0.85em; /* Un peu plus petit pour que ça tienne bien */
    border-radius: 4px;
}

a[href*="edit"] {
    background-color: #e3f2fd;
    border-color: #2196f3;
    color: #0d47a1;
}

a[href*="delete"] {
    color: #b71c1c;
    border-color: #ffcdd2;
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
                <span><?= htmlspecialchars($task['description']) ?></span>
                
                <a href="<?= htmlspecialchars($_SERVER['SCRIPT_NAME']) ?>?action=toggle&id=<?= $task['id'] ?>">
                    <?= $task['termine'] ? 'Reprendre↩️' : 'Fait ✅' ?>
                </a>
                <a href="<?= htmlspecialchars($_SERVER['SCRIPT_NAME']) ?>?action=delete&id=<?= $task['id'] ?>">Supprimer🗑️</a>
                <a href="<?=htmlspecialchars($_SERVER['SCRIPT_NAME'])?>?action=edit&id=<?= $task['id'] ?>">Modifier ✏️</a>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>