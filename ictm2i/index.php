<?php
require_once 'includes/db.php';

$ophalen = $dbh->prepare("SELECT * FROM mensen");
$ophalen->execute();
$content = $ophalen->fetchAll();

$getServerID = $dbh->prepare("SELECT @@server_id");
$getServerID->execute();
$serverID = $getServerID->fetch();

$pdo = null;
?>

<head>
    <title>ICTM2I Groep Website</title>
    <link rel="stylesheet" href="css/table.css" type="text/css"> 
</head>
<body>

<p>Server: DB0<?= $serverID["@@server_id"] ?></p>

<table>
    <tr>
        <th>Naam</th>
        <th>Functie</th>
        <th>Wijzigen</th>
        <th>Verwijderen</th>
    </tr>
    <?php foreach($content as $row): ?>
        <tr>
            <td> <?= $row['naam'] ?> </td>
            <td> <?= $row['functie'] ?> </td>
            <td>
                <form method="post" action="includes/wijzigen.php">
                    <select name="wijzigen" id="wijzigen" onchange="this.form.submit()">
                        <option <?= $row["functie"] == "Teamleider" ? "selected" : "" ?>>Teamleider</option>
                        <option <?= $row["functie"] == "Notulist" ? "selected" : "" ?>>Notulist</option>
                        <option <?= $row["functie"] == "Kwaliteitbeheer" ? "selected" : "" ?>>Kwaliteitbeheer</option>
                        <option <?= $row["functie"] == "Planner" ? "selected" : "" ?>>Planner</option>
                    </select>
                    <input type="hidden" name="ID" value="<?= $row['id'] ?>">
                </form>
            </td>
            <td>
                <form method="post" action="includes/verwijder.php">
                    <input type="hidden" name="ID_1" value="<?= $row['id'] ?>">
                    <input type="submit" name="verwijder" value="Verwijderen">
                </form>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<form method="post" action="includes/toevoegen.php">
    <label for="name">Naam:</label><input type="text" name="toevoegen" id="name" placeholder="Vul hier de naam in">
    <label for="functie">Functie:</label>
    <select id="functie" name="functie_toevoegen">
        <option>Teamleider</option>
        <option>Notulist</option>
        <option>Kwaliteitbeheer</option>
        <option>Planner</option>
    </select>
    <input type="submit" value="Verzenden" name="Verzend">
</form>
</body>