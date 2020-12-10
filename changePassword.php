<?php
session_start();
$innloggetbruker = $_SESSION["brukernavn"];

require_once("mysqlPDO.php");
$dhn = new mysqlPDO();
$sql = "UPDATE bruker SET passord = :passord WHERE epost = :epost";
$stmt = $dhn->prepare($sql);
$stmt->execute([':passord' => sha1("IT2_2021" . $_POST["passord"]), ':epost' => strtolower($innloggetbruker)]);
$stmt = null;

print("<meta http-equiv='refresh' content='0;url=default.php'>");
