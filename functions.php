<?php
// Author: Ivo Jumelet
// Purpose: Toets

include_once "config.php";

// Establish database connection
function connectDb() {
    $servername = SERVERNAME;
    $username = USERNAME;
    $password = PASSWORD;
    $dbname = DATABASE;

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // Set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $conn;
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}


function getKroegen() {
    $conn = connectDb();
    $sql = "SELECT * FROM " . CRUD_TABLE;
    $query = $conn->prepare($sql);
    $query->execute();
    return $query->fetchAll();
}

function getKroeg($kroegcode) {
    $conn = connectDb();
    $sql = "SELECT * FROM " . CRUD_TABLE . " WHERE kroegcode = :kroegcode";
    $query = $conn->prepare($sql);
    $query->bindParam(':kroegcode', $kroegcode);
    $query->execute();
    return $query->fetch();
}

function insertKroeg($kroeg) {
    $conn = connectDb();
    $sql = "INSERT INTO " . CRUD_TABLE . " (naam, adres, plaats) VALUES (:naam, :adres, :plaats)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':naam', $kroeg['naam']);
    $stmt->bindParam(':adres', $kroeg['adres']);
    $stmt->bindParam(':plaats', $kroeg['plaats']);
    $stmt->execute();
    return ($stmt->rowCount() == 1);
}

function updateKroeg($kroeg) {
    $conn = connectDb();
    $sql = "UPDATE " . CRUD_TABLE . " SET naam = :naam, adres = :adres, plaats = :plaats WHERE kroegcode = :kroegcode";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':naam', $kroeg['naam']);
    $stmt->bindParam(':adres', $kroeg['adres']);
    $stmt->bindParam(':plaats', $kroeg['plaats']);
    $stmt->bindParam(':kroegcode', $kroeg['kroegcode']);
    $stmt->execute();
    return ($stmt->rowCount() == 1);
}


function deleteKroeg($kroegcode) {
    $conn = connectDb();
    $sql = "DELETE FROM " . CRUD_TABLE . " WHERE kroegcode = :kroegcode";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':kroegcode', $kroegcode);
    $stmt->execute();
    return ($stmt->rowCount() == 1);
}
?>