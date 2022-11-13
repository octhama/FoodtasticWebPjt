<?php
// objet 'image produit'
class ImageProduit{
 
    // connexion à la bdd et nom de la table
    private $conn;
    private $nom_table = "images_produits";
 
    // attrubuts de l'objets
    public $id;
    public $produit_id;
    public $nom;
    public $timestamp;
 
    // constructeur
    public function __construct($db){
        $this->conn = $db;
    }

    // lire la première image lié à un produit
function readFirst(){
 
    // requête req
    $req = "SELECT id, produit_id, nomimgprod
            FROM " . $this->nom_table . "
            WHERE produit_id = ?
            ORDER BY nomimgprod DESC
            LIMIT 0, 1";
 
    // déclaration de la requête préparé
    $decl = $this->conn->prepare( $req );
 
    // contre les injections sql
    $this->id=htmlspecialchars(strip_tags($this->id));
 
    // lié chaque id à son produit
    $decl->bindParam(1, $this->produit_id);
 
    // exécution de la rêquete
    $decl->execute();
 
    // renvoie les valeurs
    return $decl;
}

// lire tout les images produit en relation avec un produit
function readByProductId(){
 
    // requête select
    $req = "SELECT id, produit_id, nomimgprod
            FROM " . $this->nom_table . "
            WHERE produit_id = ?
            ORDER BY nomimgprod ASC";
 
    // déclaration de la requête préparer
    $decl = $this->conn->prepare( $req );
 
    // contre les injection sql
    $this->produit_id=htmlspecialchars(strip_tags($this->produit_id));
 
    // lié chaque id à son produit
    $decl->bindParam(1, $this->produit_id);
 
    // éxécution de la requête 
    $decl->execute();
 
    // renvoie les valeurs
    return $decl;
}
}
?>