<?php
include_once '../database.php';
class gerecliente{
    
    public function gereclient($id) {
        // global $pdo;
        // $query = "SELECT is_active FROM users WHERE id = :id";
        // $stmt = $pdo->prepare($query);
        // $stmt->execute([':id' => $id]);
        // $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
        if ($user) {
            $newState = $user['is_active'] == 1 ? 0 : 1;
            $updateQuery = "UPDATE users SET is_active = :newState WHERE id = :id";
            $updateStmt = $pdo->prepare($updateQuery);
            $updateStmt->execute([
                ':newState' => $newState,
                ':id' => $id
            ]);
        }
    }
}
?>