<?php
session_start();
$conn = new PDO("mysql:host=localhost;dbname=covid","root","");// la connexion avec la base de donnée
if (isset($_POST['login'])) {
    $email=$_POST['email'];
    $password=$_POST['password'];
    $query=$conn->prepare("select nom,prenom,password from admin where email='$email' ;");//preparer une requete SQL 
    $query->execute();//pour executer la requete
    $result=$query->fetchAll();// pour creer une table et rassembler les données
    if (sizeof($result)!=0) { // verifier si la table est vide
        $pass=$result[0]['password'];//stocker le mot de passe qui est dans la table $result
        if ($pass==$password) { //comparer les MDP
           header("location:upload.html"); //"header" renvoyer vers l'URL
        }else{
          echo "Mot de passe erroné!! <br> Veuillez ressaisir le mot de passe"; // "echo" affichage de message  
        }
    }
}
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/sign.css">
    <title>Covid 19 predictions </title>
</head>
<body>

<div class="container">

    <div class="img">
    <img src="images/admin.PNG" alt="">    
    </div>

    <div class="login">
        <img src="images/supervisor_account-black-18dp.svg" alt="">
        <form action="" method="post">
            <h2>Login</h2>
            <label for="">Email</label>
            <input class="txtb" type="text" name="email" id="">
            <label for="">Password</label>
            <input class="txtb" type="password" name="password" id="">
            <button name="login">login</button>
        </form>
    </div>

</div>

    
</body>
</html>