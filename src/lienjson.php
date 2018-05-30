<?php
// Si les données json sont dans un fichier distant:
$json_source = file_get_contents('/../config.json');

// Décode le JSON
$json_data = json_decode($json_source);

// Affiche la valeur des attributs du JSON
echo $json_data->nom.' '.$json_data->naissance;