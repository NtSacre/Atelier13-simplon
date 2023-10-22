<?php
try {
    $connection = new PDO("mysql:host=localhost;dbname=gestion_utilisateur_taxi_bokko", 'root', '');
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $th) {
    echo "Erreur: " . $th->getMessage();
}
