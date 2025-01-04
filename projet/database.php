<?php

$servername="localhost";
$username="root";
$password="12341234";
$dbname="e_commerce";

try {
    $dns="mysql:host=" . $servername . ";dbname=" . $dbname;
    $pdo=new PDO($dns,$username,$password);
    // echo 'good connex';
} catch (PDOException $e) {
    die("Connection failed: ". $e->getMessage());
}
?>