<?php

include_once "../Entities/client.php";

class ClientCore
{

function getAllClients()
{
    $sql = "SELECT * From client";
    $db = config::getConnexion();
    try {
        $liste = $db->query($sql);
        return $liste;
    } catch (Exception $e) {
        die('Erreur: ' . $e->getMessage());
    }
}
}
?>