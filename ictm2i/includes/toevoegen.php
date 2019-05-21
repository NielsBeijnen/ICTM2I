<?php
require_once 'db.php';

if (filter_has_var(INPUT_POST, 'Verzend')){
    $naam = filter_input(INPUT_POST, 'toevoegen', FILTER_SANITIZE_STRING);
    $functie = filter_input(INPUT_POST, 'functie_toevoegen', FILTER_SANITIZE_STRING);

    $toevoegen = $dbh->prepare("INSERT INTO mensen (naam, functie) VALUES (:naam, :functie)");
    $toevoegen->bindParam(':naam', $naam, PDO::PARAM_STR);
    $toevoegen->bindParam(':functie', $functie, PDO::PARAM_STR);
    $toevoegen->execute();
}

header("Location: /");