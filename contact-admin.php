<?php
session_start();
$conn = new PDO("mysql:host=localhost;dbname=covid","root","");
$query=$conn->prepare("select *from contact;");
$query->execute();
$results=$query->fetchAll();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/contact-admin.css">
    <title>Covid 19 predictions </title>
</head>
<body>
    <main>
      <div class="top-section">Commentaires des visiteurs</div>
    <table id="customers">
            <tr>
              <th>NOM</th>
              <th>Prenom</th>
              <th>Email</th>
              <th>Message</th>
            </tr>
    <?php
        if(sizeof($results)>0){
         for ($i=0; $i <sizeof($results) ; $i++) { 
           $nom=$results[$i]['nom_c'];
           $prenom=$results[$i]['prenom_c'];
           $email=$results[$i]['email_c'];
           $message=$results[$i]['message'];
            echo" <tr>
              <td>$nom</td>
              <td>$prenom</td>
              <td>$email</td>
              <td>$message</td>
            </tr>
         ";
         }
        }
        ?>
         </table>
    </main>
</body>
</html>