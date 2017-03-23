<?php
$search = $_GET['search'];
$page = $_GET['page'];
$url = "https://world.openfoodfacts.org/cgi/search.pl?search_terms='$search'&search_simple=1&action=process&json=1&page=$page";
// On stocke le résultat de la requête dans la variable $result et on décode le JSON
$data = json_decode(file_get_contents($url), true);
echo $page;
echo "<br />";
?>