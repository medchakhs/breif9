<?php
include_once '../database.php';
class modifierproduits{
    
    public function modifierproduit($id,$nome, $description, $price, $quantite, $image) {
        global $pdo;
        $query = "UPDATE products SET name = :name, description = :description, price = :price, quantite = :quantite, image = :image WHERE id = :id";
        $stmt = $pdo->prepare($query);
        $stmt->execute([
            ':name' => $nome,
            ':description' => $description,
            ':price' => $price,
            ':quantite' => $quantite,
            ':image' => $image,
            ':id' => $id
        ]);
    }
    public function modif($id) {
        global $pdo;
        $query = "SELECT * FROM products WHERE id = :id";
        $stmt = $pdo->prepare($query);
        $stmt->execute([':id' => $id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;
    }
}
?>