<?php

$origin = date_create('2000-01-05');
$target = date_create();
$interval = date_diff($origin, $target);
echo $interval->format('%Y');

prendre la date de naissance
verifier que l'utilisateur a bien 18 ans ou plus
rajouter des champs
tuteur légal a enregistré et du coup au lieu de lancer l'enregistrement, ça bloque tout et une fois le tuteur légale inscris ça inscrit le mineur entant que role sportif et le tuteur légal en tant que role tuteur