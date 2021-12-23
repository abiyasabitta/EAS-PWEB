<?php

include("config.php");

$nisn       = "";
$nama       = "";
$kelas     = "";
$agama      = "";
$ipa        = "";
$ips        = "";
$matematika = "";
$bahasaIndonesia = "";
$bahasaInggris = "";
$penjas     = "";
$sukses     = "";
$error      = "";

if (isset($_GET['op'])) {
    $op = $_GET['op'];
} else {
    $op = "";
}

?>