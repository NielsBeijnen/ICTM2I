<?php
//require_once 'includes/db.php';
require_once 'includes/bootstrap.php';
?>

<head>
    <title>ICTM2I Groep Website</title>
    <link rel="stylesheet" href="css/table.css" type="text/css"> 
</head>
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">ICTM2I-Groep2</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">about</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Dropdown
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>
</header>
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