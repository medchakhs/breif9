<?php
include_once '../database.php';
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

    public function ajouterproduit() {
        $query = "INSERT INTO products (name, description, price, quantite,	image) VALUES (:name, :description, :price, :quantite, :image)";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([
            ':name' => $this->nome,
            ':description' => $this->description,
            ':price' => $this->price,
            ':quantite' => $this->quantite,
            ':image' => $this->image,
        ]);
    }
}
?>