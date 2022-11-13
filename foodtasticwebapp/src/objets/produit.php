<?php
// objet 'produit'
class Produit{
 
    // connexion à la bdd et nom de la table
    private $conn;
    private $nom_table="produits";
 
    // attributs de l'objet
    public $id;
    public $nom;
    public $prix;
    public $description;
    public $id_categorie;
    public $nom_categorie;
    public $timestamp;
 
    // constructeur
    public function __construct($db){
        $this->conn = $db;
    }

    // lire tout les produits
function read($num_article, $articles_par_page){
 
    // selectionner tout les produits
    $req = "SELECT
                id, nomprod, description, prixprod 
            FROM
                " . $this->nom_table . "
            ORDER BY
                datecrea DESC
            LIMIT
                ?, ?";
 
    // déclaration de la requête préparer
    $decl = $this->conn->prepare( $req );
 
    // déclaration des paramètres pour limiter le nombre d'articles par page
    $decl->bindParam(1, $num_article, PDO::PARAM_INT);
    $decl->bindParam(2, $articles_par_page, PDO::PARAM_INT);
 
    // exécution de la requête
    $decl->execute();
 
    // renvoyer les valeurs
    return $decl;
}
// utilitser pour la pagination des produits
public function count(){
 
    // requête pour compter totu les produits enregistrer
    $req = "SELECT count(*) FROM " . $this->nom_table;
 
    // déclaration dela requête préparer
    $decl = $this->conn->prepare( $req );
 
    // exécution de la requête
    $decl->execute();
 
    // récupérer la valeur de la ligne
    $lignes = $decl->fetch(PDO::FETCH_NUM);
 
    // exécution de la requête
    return $lignes[0];
}

// lire tout les produits basés sur les ids produits inclu dans la variable $ids

public function lireParIds($ids){
 
    $ids_arr = str_repeat('?,', count($ids) - 1) . '?';
 
    // requête pour sélectionner les produits
    $req = "SELECT id, nomprod, prixprod FROM " . $this->nom_table . " WHERE id IN ({$ids_arr}) ORDER BY nomprod";
 
    // déclaration de la requête préparer
    $decl = $this->conn->prepare($req);
 
    // exécution de la requête
    $decl->execute($ids);
 
    // retourner les valeurs depuis la bdd
    return $decl;
}

//lire les articles par catégorie miel

function lireParCategorieMiel($id_categorie){ 

    // requête pour sélectionner tout les produits

    $req = "SELECT id, nomprod, description, prixprod, id_categorie, nom_categorie  FROM " . $this->nom_table . " WHERE id_categorie = 13 ";
 
    
    // déclartion de la requête préparer
    $decl = $this->conn->prepare( $req );
 
    // déclaration des paramètres pour limiter le nombre d'articles par page
    $decl->bindParam(1, $num_article, PDO::PARAM_INT);
    $decl->bindParam(2, $articles_par_page, PDO::PARAM_INT);
 
    // exécution de la requête
    $decl->execute();
 
    // rretourner les valeurs 
    return $decl;

       
       } 

 //lire les articles par catégorie vin

function lireParCategorieWine($id_categorie){ 

    // requête pour sélectionner tout les produits

    $req = "SELECT id, nomprod, description, prixprod, id_categorie, nom_categorie  FROM " . $this->nom_table . " WHERE id_categorie = 14 ";
 
    
    // déclartion de la requête préparer
    $decl = $this->conn->prepare( $req );
 
    // déclaration des paramètres pour limiter le nombre d'articles par page
    $decl->bindParam(1, $num_article, PDO::PARAM_INT);
    $decl->bindParam(2, $articles_par_page, PDO::PARAM_INT);
 
    // exécution de la requête
    $decl->execute();
 
    // rretourner les valeurs 
    return $decl;

       
       } 

        //lire les articles par catégorie olive

function lireParCategorieOlive($id_categorie){ 

    // requête pour sélectionner tout les produits

    $req = "SELECT id, nomprod, description, prixprod, id_categorie, nom_categorie  FROM " . $this->nom_table . " WHERE id_categorie = 15 ";
 
    
    // déclartion de la requête préparer
    $decl = $this->conn->prepare( $req );
 
    // déclaration des paramètres pour limiter le nombre d'articles par page
    $decl->bindParam(1, $num_article, PDO::PARAM_INT);
    $decl->bindParam(2, $articles_par_page, PDO::PARAM_INT);
 
    // exécution de la requête
    $decl->execute();
 
    // rretourner les valeurs 
    return $decl;

       
       } 

//lire les articles par catégorie confiture

       function lireParCategorieJam($id_categorie){ 

    // requête pour sélectionner tout les produits

    $req = "SELECT id, nomprod, description, prixprod, id_categorie, nom_categorie  FROM " . $this->nom_table . " WHERE id_categorie = 16 ";
 
    
    // déclartion de la requête préparer
    $decl = $this->conn->prepare( $req );
 
    // déclaration des paramètres pour limiter le nombre d'articles par page
    $decl->bindParam(1, $num_article, PDO::PARAM_INT);
    $decl->bindParam(2, $articles_par_page, PDO::PARAM_INT);
 
    // exécution de la requête
    $decl->execute();
 
    // rretourner les valeurs 
    return $decl;

       
       } 
//lire les articles par catégorie biscuits
         function lireParCategorieCookie($id_categorie){ 

    // requête pour sélectionner tout les produits

    $req = "SELECT id, nomprod, description, prixprod, id_categorie, nom_categorie  FROM " . $this->nom_table . " WHERE id_categorie = 17 ";
 
    
    // déclartion de la requête préparer
    $decl = $this->conn->prepare( $req );
 
    // déclaration des paramètres pour limiter le nombre d'articles par page
    $decl->bindParam(1, $num_article, PDO::PARAM_INT);
    $decl->bindParam(2, $articles_par_page, PDO::PARAM_INT);
 
    // exécution de la requête
    $decl->execute();
 
    // rretourner les valeurs 
    return $decl;

       
       } 
//lire les articles par catégorie légume
       function lireParCategorieVeg($id_categorie){ 

    // requête pour sélectionner tout les produits

    $req = "SELECT id, nomprod, description, prixprod, id_categorie, nom_categorie  FROM " . $this->nom_table . " WHERE id_categorie = 18 ";
 
    
    // déclartion de la requête préparer
    $decl = $this->conn->prepare( $req );
 
    // déclaration des paramètres pour limiter le nombre d'articles par page
    $decl->bindParam(1, $num_article, PDO::PARAM_INT);
    $decl->bindParam(2, $articles_par_page, PDO::PARAM_INT);
 
    // exécution de la requête
    $decl->execute();
 
    // rretourner les valeurs 
    return $decl;

       
       } 
//lire les articles par catégorie fruit
       function lireParCategorieFruit($id_categorie){ 

    // requête pour sélectionner tout les produits

    $req = "SELECT id, nomprod, description, prixprod, id_categorie, nom_categorie  FROM " . $this->nom_table . " WHERE id_categorie = 19 ";
 
    
    // déclartion de la requête préparer
    $decl = $this->conn->prepare( $req );
 
    // déclaration des paramètres pour limiter le nombre d'articles par page
    $decl->bindParam(1, $num_article, PDO::PARAM_INT);
    $decl->bindParam(2, $articles_par_page, PDO::PARAM_INT);
 
    // exécution de la requête
    $decl->execute();
 
    // rretourner les valeurs 
    return $decl;

       
       } 

       
// used when filling up the update product form
function readOne(){
 
    // query to select single record
    $req = "SELECT
                nomprod, description, prixprod
            FROM
                " . $this->nom_table . "
            WHERE
                id = ?
            LIMIT
                0,1";
 
    // prepare query statement
    $decl = $this->conn->prepare( $req );
 
    // sanitize
    $this->id=htmlspecialchars(strip_tags($this->id));
 
    // bind product id value
    $decl->bindParam(1, $this->id);
 
    // execute query
    $decl->execute();
 
    // get row values
    $ligne = $decl->fetch(PDO::FETCH_ASSOC);
 
    // assign retrieved row value to object properties
    $this->nom = $ligne['nomprod'];
    $this->description = $ligne['description'];
    $this->prix = $ligne['prixprod'];
}
}