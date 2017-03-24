<?php
include 'bdd.php';
if(isset($_GET['query'])) {
    // Mot tapé par l'utilisateur
    $q = htmlentities($_GET['query']);
    $query = mysqli_query($bdd, "SELECT * FROM sports WHERE sport LIKE '". $q ."%'");
    while($data = mysqli_fetch_assoc($query)) {
        $suggestions['suggestions'][] = $data['sport'];
    }
    // On renvoie le données au format JSON pour le plugin
    echo json_encode($suggestions);
}
?>