<?php

// on importe la classe Database, nécessaire pour obtenir une
// connexion PDO. Quand le fichier est inclus via index.php, ce
// require_once ne provoque pas de doublon grâce à _once.
require_once __DIR__ . '/../config/Database.php';

class Task {
    private PDO $db;
    public function __construct() {
        $this->db = Database::getConnection();// CONNEXION A LA BASE DE DONNEE
    }
    // Récupérer toutes les tâches
    public function getAll(): array {
        $stmt = $this->db->query("SELECT * FROM tasks ORDER BY created_at DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    // Ajouter une tâche
    public function create(string $titre): void {
        $stmt = $this->db->prepare("INSERT INTO tasks (titre) VALUES (:titre)");
        $stmt->execute([':titre' => $titre]);
    }
    // Marquer comme terminée
    public function toggleTermine(int $id): void {
        $stmt = $this->db->prepare(
            "UPDATE tasks SET termine = NOT termine WHERE id = :id"
        );
        $stmt->execute([':id' => $id]);
    }
    // Supprimer une tâche
    public function delete(int $id): void {
        $stmt = $this->db->prepare("DELETE FROM tasks WHERE id = :id");
        $stmt->execute([':id' => $id]);
    }
}