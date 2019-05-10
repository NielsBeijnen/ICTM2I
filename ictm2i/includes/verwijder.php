<?php
require_once 'db.php';

if (filter_has_var(INPUT_POST, 'verwijder')){
    $id = filter_input(INPUT_POST, 'ID_1', FILTER_SANITIZE_NUMBER_INT);

    $remove = $dbh->prepare("DELETE FROM mensen WHERE id = :id");
    $remove->bindParam(':id', $id, PDO::PARAM_INT);
    $remove->execute();
}