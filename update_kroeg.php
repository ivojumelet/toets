<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kroeg Bewerken</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Kroeg Bewerken</h2>
        <?php
        include 'functions.php';
        if (isset($_GET['id'])) {
            $kroegId = $_GET['id'];
            $kroeg = getKroeg($kroegId);

            if ($kroeg) {
        ?>
                <form action="update_kroeg.php?id=<?php echo $kroegId; ?>" method="post">
                    Naam: <input type="text" name="naam" value="<?php echo htmlspecialchars($kroeg['naam']); ?>"><br>
                    Adres: <input type="text" name="adres" value="<?php echo htmlspecialchars($kroeg['adres']); ?>"><br>
                    Plaats: <input type="text" name="plaats" value="<?php echo htmlspecialchars($kroeg['plaats']); ?>"><br>
                    <input type="submit" name="update" value="Update">
                </form>
        <?php
            } else {
                echo "<p>Kroeg niet gevonden.</p>";
            }
        } else {
            echo "<p>Geen kroeg geselecteerd voor bewerking.</p>";
        }

        if (isset($_POST['update'])) {
            // Assuming your form's submit button is named 'update'
            $naam = $_POST['naam'];
            $adres = $_POST['adres'];
            $plaats = $_POST['plaats'];

            if (updateKroeg(['kroegcode' => $kroegId, 'naam' => $naam, 'adres' => $adres, 'plaats' => $plaats])) {
                echo "<p>Kroeg succesvol bijgewerkt.</p>";
                echo "<a href='Crud_kroeg.php'>Terug naar overzicht</a>";
            } else {
                echo "<p>Er is een fout opgetreden bij het bijwerken van de kroeg.</p>";
            }
        }
        ?>
    </div>
</body>
</html>
