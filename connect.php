<?php

define('HOST', 'localhost');
define('USER', 'root');
define('PASSWORD', '');
define('DB', 'astonAdminSchool');
try {
    $bdd = new PDO('mysql:host=' . HOST . ';dbname=' . DB, USER, PASSWORD);
    $bdd->exec('SET NAMES utf8');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
?>