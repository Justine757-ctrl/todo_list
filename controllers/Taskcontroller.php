<?php
class TaskController {
    private Task $taskModel;

    public function __construct() {
        $this->taskModel = new Task();
    }
    // Afficher la liste
    public function index(): void {
        $tasks = $this->taskModel->getAll();
        // mode debug temporaire : ajouter ?debug=1 à l'URL pour voir le contenu
        if (isset($_GET['debug']) && $_GET['debug']) {
            header('Content-Type: text/plain; charset=utf-8');
            echo "DEBUG: \$tasks\n";
            var_dump($tasks);
            exit;
        }
        // inclure la vue depuis le répertoire views
        require __DIR__ . '/../views/index.php';
    }
    // Créer une tâche
    public function create(): void {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $titre = trim($_POST['titre'] ?? '');
            $description = trim($_POST['description'] ?? '');
            if (!empty($titre)) {
                $this->taskModel->create($titre, $description);
            }
            // après création on revient à l'affichage principal
            header('Location: ' . $_SERVER['SCRIPT_NAME'] . '?action=index');
            exit;
        }
        require __DIR__ . '/../views/create.php';
    }
    // Basculer terminé/non terminé
    public function toggle(): void {
        $id = (int) ($_GET['id'] ?? 0);
        if ($id > 0) {
            $this->taskModel->toggleTermine($id);
        }
        header('Location: ' . $_SERVER['SCRIPT_NAME'] . '?action=index');
        exit;
    }
    // Supprimer
    public function delete(): void {
        $id = (int) ($_GET['id'] ?? 0);
        if ($id > 0) {
            $this->taskModel->delete($id);
        }
        header('Location: ' . $_SERVER['SCRIPT_NAME'] . '?action=index');
        exit;
    }
    //modifier une tache
    public function edit(): void{
        $id = (int)($_GET['id'] ?? 0);
        if($id >0) {
            $this->taskModel->update(id: $id, titre: $_POST['titre'] ?? '');
        }
        header('location: ' . $_SERVER['SCRIPT_NAME'] . '?action=index');
        exit;
        
    }

}