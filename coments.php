<?php
session_start();
$conn = new PDO("mysql:host=localhost;dbname=covid","root","");// la connexion avec la base de donnée
if (isset($_POST['valider'])) {
    $nom=$_POST['nom'];
    $prenom=$_POST['prenom'];
    $email=$_POST['email'];
    $message=$_POST['message'];
    $query=$conn->prepare("insert into contact (nom_c, prenom_c, email_c, message) values('$nom','$prenom','$email','$message');");
    $query->execute();
}
?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/coments.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" charset="utf-8"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    
    <title>Covid 19 predictions </title>
</head> 
<body>

<header>
        <nav>
            <div class="inner-width">
                
                <i class="menu-toggle-btn fas fa-bars"></i>
                <nav class="navigation-menu">
                    <a class="links" href="home.html"><i class="fas fa-home home"></i>Home</a>
                    <a class="links" href="statics.php"><i class="fas fa-line-chart "></i>Statics&Predictions</a>
                    <a  class="links" href="coments.php"><i class="fas fa-headset contact"></i>Coments</a>
                    <a class="links" href="sign-in.php"><i class="fas fa-user contact"></i>Sign-in</a>
                </nav>
            </div>
        </nav>
    </header>

    <div class="container">

        <h3>S'il vous plaît envoyez-nous vos commentaires</h3>

        <div class="form">
        
            <form class="contact-form" action="" method="post">
               <input type="text" class="contact-form-text" name="nom" placeholder=" NOM">
               <input type="text" class="contact-form-text" name="prenom" placeholder=" Prenom">
               <input type="text" class="contact-form-text" name="email" placeholder=" Email">
               <textarea class="contact-form-text" name="message" placeholder=" message"></textarea>
               <input type="submit" name="valider" class="contact-form-btn" value="Valider">
            </form>
        </div>

    </div>
    






    <script type="text/javascript">
        $(".menu-toggle-btn").click(function(){
            $(this).toggleClass("fas-times");
            $(".navigation-menu").toggleClass("active")
        });
    </script>
</body>
</html>