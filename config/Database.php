<?php
class Database {
    private static ?PDO $instance = null;// ACCÈDER  A  LA BDD

    public static function getConnection(): PDO {
        if (self::$instance === null) { // CONDITION DE CONNEXION ; SI LA CONNEXION N'EST PAS ENCORE ÉTABLIE, ON LA CRÉE; MAIS LA CONNEXION NE SERA CREER QU'UNE FOIS 
            self::$instance = new PDO(
                'mysql:host=localhost;dbname=todo;charset=utf8',
                'root',
                'juju@1234Ucao!',
                [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
            );
        }
         return self::$instance;
    }
}
?>
