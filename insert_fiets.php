<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Nieuwe Kroeg Toevoegen</title>
    <link rel="stylesheet" href="style.css"> 
</head>
<body>
    <?php
    include 'functions.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $naam = $_POST['naam'];
        $adres = $_POST['adres'];
        $plaats = $_POST['plaats'];

        // Attempt to insert the new kroeg
        if (insertKroeg(['naam' => $naam, 'adres' => $adres, 'plaats' => $plaats])) {
            header("Location: Crud_kroeg.php");
            exit;
        } else {
            echo "<p>Er is een fout opgetreden bij het toevoegen van de kroeg.</p>";
        }
    }
    ?>

    <form method="post">
        Naam: <input type="text" name="naam" required><br>
        Adres: <input type="text" name="adres" required><br>
        Plaats: <input type="text" name="plaats" required><br>
        <input type="submit" value="Toevoegen">
    </form>
</body>
</html>
