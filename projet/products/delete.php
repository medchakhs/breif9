<?php
include_once '../database.php';
class delete {

    public function deleteproduit($id) {
        global $pdo;
        $query = "UPDATE products SET sup = now() WHERE id = :id";
        $stmt = $pdo->prepare($query);
        $stmt->execute([
            ':id' => $id
        ]);
    }
}
   $id = $_GET["id"];
   $new = new delete;
   $new->deleteproduit($id);
   header('location: ../gstock/aficheproduct.php');
?>