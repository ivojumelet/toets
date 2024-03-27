<?php
include 'functions.php';

if (isset($_GET['id'])) {
    $kroegcode = $_GET['id'];
    if (deleteKroeg($kroegcode)) {
        header("Location: Crud_kroeg.php");
    } else {
        echo "Fout bij het verwijderen van de kroeg.";
    }
} else {
    header("Location: Crud_kroeg.php");
}
?>
