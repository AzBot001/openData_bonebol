<?php
define("HOST", "localhost");
define("USER", "root");
define("PASS", "");
define("DBNAME", "opendata");

$mysqli = new mysqli(HOST, USER, PASS, DBNAME);

if ($mysqli->connect_error) {
    die("Koneksi Gagal: " . $mysqli->connect_error);
}