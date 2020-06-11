<?php
if(isset($_FILES['myfile'])){
    foreach ($_FILES["myfile"]["tmp_name"] as $key => $value) {
        $buffer = basename($_FILES["myfile"]["name"][$key]);
            $tr = "fichiers/" . $buffer;
            $size=number_format($_FILES["myfile"]["size"][$key]/1000000,2);
            $type=$_FILES["myfile"]["type"][$key];
            move_uploaded_file($value, $tr);
            $conn = new PDO("mysql:host=localhost;dbname=covid","root","");
            $query=$conn->prepare("insert into file (fichier,nom_fichier,type,size) values ('$tr','$buffer','$type','$size');");
            $query->execute();
    }    
}
