<?php
    $conn = new PDO("mysql:host=localhost;dbname=covid","root","");
    $query=$conn->prepare("select *from file;");
    $query->execute();
    $results=$query->fetchAll();
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/statics.css">
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
                    <a href="home.html"><i class="fas fa-home home"></i>Home</a>
                    <a href="statics.php"><i class="fas fa-line-chart "></i>Statics&Predictions</a>
                    <a href="coments.php"><i class="fas fa-headset contact"></i>Comments</a>
                    <a href="sign-in.php"><i class="fas fa-user contact"></i>Sign-in</a>
                </nav>
            </div>
        </nav>
    </header>
    <main>
        <div class="col">
            <div class="text">
                <h3> Les analyses prédictives</h3>
                <p>Le Machine Learning est une technologie d’intelligence artificielle permettant aux ordinateurs
                     d’apprendre sans avoir été programmés explicitement à cet effet. Pour apprendre et se développer, 
                     les ordinateurs ont toutefois besoin de données à analyser et sur lesquelles s’entraîner. 
                     De fait, le Big Data est l’essence du Machine Learning, et  c’est la technologie qui permet d’exploiter
                     pleinement le potentiel du Big Data. <br><br><br> Chers utilisateurs, <br><br> Veuillez trouver sur notre site  analyses prédictives concernant la situation sanitaire actuelle. 
                     <br><br><br>Notre modèle est alimenté par des données 100% fiables et exposées sur le site du gouvernement.
                    </p>
            
            <?php
              for ($i=0; $i <sizeof($results) ; $i++) { 
                  $nom=$results[$i]['nom_fichier'];
                  $link=$results[$i]['fichier'];
                  $type=$results[$i]['type'];
                  $size=$results[$i]['size'];   
                  echo '<div class="file-fiche">
                  <div class="infos">
                      <div class="name">'.$nom.'</div>
                      <div class="size">'.$size.'
                          <a download href="'.$link.'"><img src="images/download.svg" alt=""></a>
                      </div>
                  </div>
                  <div class="type">'.$type.'</div>
              </div>';
            
            }
            ?>
            </div>
        </div>
        <div class="col">
            <div class="svg">
                <img src="images/undraw_wash_hands_nwl2.svg" alt="">
            </div>
        </div>


    </main>






    <script type="text/javascript">
        $(".menu-toggle-btn").click(function () {
            $(this).toggleClass("fas-times");
            $(".navigation-menu").toggleClass("active")
        });
    </script>
</body>

</html>