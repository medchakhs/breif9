<?php

class User
{

    private $pdo;

    public function __construct($pdo)
    {


        $this->pdo = $pdo;
    }

    public function registerFunc($name, $email, $password)
    {

        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE email=?");
        $stmt->execute([$email]);
        $myuser = $stmt->fetch();


        if ($myuser) {

            throw new Exception("the user is already registreed");
        }


        $hashedpassord = password_hash($password, PASSWORD_DEFAULT);


        $stmt = $this->pdo->prepare("INSERT INTO users (username,email,password)VALUES(?,?,?)");
        $stmt->execute([$name, $email, $hashedpassord]);
        header ('location:connexion.php');
    }




    public function loginFunc($email,$password){

      
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE email=?");
        $stmt->execute([$email]);
        $myuser = $stmt->fetch();

        if($myuser && password_verify($password,$myuser["password"])){


           $_SESSION["userid"]=$myuser["id"];
           $_SESSION["email"]=$myuser["email"];
           $_SESSION["role"]=$myuser["role"];


           if ($myuser["role"]=="admin") {
            header("location:../pluto-1.0.0/dashboard.php");
           }else{
            header("location:../malefashion-master/index.php");
           }
        
        } 
        else {
            echo "<p style='color:red;'>Invalid email or password. Please try again.</p>";
        }

     }  

}