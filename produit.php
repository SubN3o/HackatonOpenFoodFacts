<?php
$error = 0;
if(isset($_POST['id'])){
    $id = $_POST['id'];
    // On initialise la BDD
    $url = "http://fr.openfoodfacts.org/api/v0/produit/$id.json";
    // On stocke le résultat de la requête dans la variable $result et on décode le JSON
    $data = json_decode(file_get_contents($url), true);
    var_dump($data);
}else{
    $error++;
}
if($error>0){
    echo 'Une erreur s\'est produite';
}
?>