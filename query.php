<?php
include 'bdd.php';
if($_GET['query']=='sportInfo'){
    $query = mysqli_query($bdd, "SELECT * FROM sports WHERE sport='".$_GET['value']."'");
    $data = mysqli_fetch_assoc($query);
    echo $data['kcal/h'];
}
?>