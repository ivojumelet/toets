<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beheer Kroegen</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Kroegen Overzicht</h2>
    <?php
    include 'functions.php';
    $kroegen = getKroegen();
    if ($kroegen) {
        echo "<table>";
        echo "<tr><th>Kroegcode</th><th>Naam</th><th>Adres</th><th>Plaats</th><th>Acties</th></tr>";
        foreach ($kroegen as $kroeg) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($kroeg['kroegcode']) . "</td>";
            echo "<td>" . htmlspecialchars($kroeg['naam']) . "</td>";
            echo "<td>" . htmlspecialchars($kroeg['adres']) . "</td>";
            echo "<td>" . htmlspecialchars($kroeg['plaats']) . "</td>";
            echo "<td>
                    <a href='update_kroeg.php?id=" . $kroeg['kroegcode'] . "'>Bewerk</a> |
                    <a href='delete_kroeg.php?id=" . $kroeg['kroegcode'] . "' onclick='return confirm(\"Weet u zeker dat u deze kroeg wilt verwijderen?\");'>Verwijder</a>
                  </td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<p>Geen kroegen gevonden.</p>";
    }
    ?>
    <button onclick="window.location.href='insert_fiets.php';">Nieuwe Kroeg Toevoegen</button>
</body>
</html>
