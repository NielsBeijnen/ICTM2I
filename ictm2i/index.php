<?php
require_once 'includes/db.php';
?>

<head>
    <title>ICTM2I Groep Website</title>
    <link rel="stylesheet" href="css/table.css" type="text/css"> 
</head>
<body>

<table>
    <tr>
        <th>Naam</th>
        <th>Functie</th>
        <th>Wijzigen</th>
        <th>Verwijderen</th>
    </tr>
    <tr>
        <?php
        $ophalen = $dbh->prepare("SELECT * FROM mensen");
        $ophalen->execute();

        while ($row = $ophalen->fetch()){
            echo
            '<th>'. $row['naam'] .'</th>'.
            '<th>'. $row['functie'] .'</th>'.
            '<th><form method="post" action="includes/wijzigen.php">'.
            '<label for="wijzigen" >Wijzigen</label><select name="wijzigen" id="wijzigen" onchange="this.form.submit()">'.
            '<option>Teamleider</option>'.
            '<option>Notulist</option>'.
            '<option>Kwaliteitbeheer</option>'.
            '<option>Planner</option>'.
            '</select>'.
            '<input type="hidden" name="ID" value="'.$row['id'] .'">'.
            '</form></th>'.
            '<th><form method="post" action="includes/verwijder.php">'.
            '<input type="hidden" name="ID_1" value="'. $row['id'] .'">'.
            '<input type="submit" name="verwijder" value="Verwijderen">'.
            '</form></th>';
        }
        ?>
    </tr>
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