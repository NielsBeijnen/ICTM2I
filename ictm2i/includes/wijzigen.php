<?php
require_once 'db.php';

if (filter_has_var(INPUT_POST, 'wijzigen')){
    $wijzigen = filter_input(INPUT_POST,'wijzigen', FILTER_SANITIZE_STRING);
    $id = filter_input(INPUT_POST, 'ID', FILTER_SANITIZE_NUMBER_INT);

    $update = $dbh->prepare("UPDATE mensen SET functie = :functie WHERE id = :id");
    $update->bindParam(':functie', $wijzigen, PDO::PARAM_STR);
    $update->bindParam(':id', $id, PDO::PARAM_INT);
    $update->execute();
}