<?php
require 'database.php';
class afficheproduit{
    private $pdo;
    public function __construct($nome, $descreption, $price, $quantite, $image, $pdo) {
        $this->pdo = $pdo;
        $this->description = $descreption;
        $this->nome = $nome;
        $this->price = $price;
        $this->quantite = $quantite;
        $this->image = $image;
    }

    public function ajouterCompte() {
        $query = "INSERT INTO  () VALUES ()";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([
            
        ]);
    }
}
?>