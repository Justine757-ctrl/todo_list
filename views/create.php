<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter une tâche</title>
    <style>
    
    /* --- MISE À JOUR DU CSS --- */

li {
    display: grid;
    /* On passe à 4 colonnes : 
       1 pour le texte (prend tout l'espace) 
       et 3 colonnes de 100px pour les boutons */
    grid-template-columns: 1fr 100px 100px 100px; 
    gap: 10px; /* Ajoute un petit espace entre les boutons */
    align-items: center;
    padding: 10px;
    border-bottom: 1px solid #ddd;
    font-size: 1.1em;
}

/* Optionnel : Une couleur spécifique pour le bouton Modifier pour le différencier */
a[href*="edit"] {
    background-color: #e3f2fd; /* Un bleu très léger */
    border-color: #2196f3;
    color: #0d47a1;
}

a[href*="edit"]:hover {
    background-color: #bbdefb;
}

/* Optionnel : Une couleur pour le bouton Supprimer pour éviter les erreurs */
a[href*="delete"] {
    color: #b71c1c;
    border-color: #ffcdd2;
}

a[href*="delete"]:hover {
    background-color: #ffebee;
}
</style>
</head>
<body>
    <h1>➕ Nouvelle tâche</h1>

    <form method="POST" action="<?= htmlspecialchars($_SERVER['SCRIPT_NAME']) ?>?action=create">
        <label for="titre">taches:</label>
        <input type="text" name="titre" placeholder="Ex: Apprendre le MVC" required>
        <label for="description">Description :</label>
        <input type="text" name="description" placeholder="description de la tache">
        <button type="submit">Ajouter</button>
    </form>

    <a href="<?= htmlspecialchars($_SERVER['SCRIPT_NAME']) ?>?action=index"> Retour </a>
</body>
</html>
