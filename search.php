<?php
include 'bdd.php';
$bdd = mysqli_connect(SERVER, USER, PASS, DB);
$error = 0;
$_POST['search']='pizza buitoni';
if(isset($_POST['search'])){
    $search = str_replace(' ', '+', $_POST['search']);
    if(is_int($search)&&strlen($search)==13){
        header('Location : produit.php?id='.$search);
        exit();
    }
    // On initialise la BDD
    //Récupère le nombre de résultat. On le divise par 20 (=nb de page). On incrémente le numéro de la page dans l'url pour afficher tout les produits
    $url = "https://world.openfoodfacts.org/cgi/search.pl?search_terms='$search'&search_simple=1&action=process&json=1&page=1'";
    // On stocke le résultat de la requête dans la variable $result et on décode le JSON
    $data = json_decode(file_get_contents($url), true);
    var_dump($data);
    //echo count($data);
}else{
    $error++;
}
if($error>0){
    echo 'Une erreur s\'est produite';
}
?>