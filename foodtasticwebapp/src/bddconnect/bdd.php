<?php
// pour la connexion à la bdd mysql
class Bdd{
 
    // définir les credential correspondant au serveur permettant l'accès et la connexion  à la bdd
    private $host = "localhost";
    private $nom_db = "foodtasticbdd";
    private $username = "root";
    private $password = "root";
    public $conn;
 
    // établir une connexion à la bdd
    public function connectoBdd(){
 
        $this->conn = null;
 
        try{
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->nom_db, $this->username, $this->password);
        }catch(PDOException $exception){
            echo "Erreur de connexion: " . $exception->getMessage();
        }
 
        return $this->conn;
    }
 
}
?>