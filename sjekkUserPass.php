<?php

function sjekkUserPass($brukernavn, $passord) {
	require_once ("mysqlPDO.php");
	try {
		$sql = "SELECT `e-post`, passord FROM bruker WHERE `e-post` = ?;";
		$dhn = new mysqlPDO();
		$stmt = $dhn->prepare($sql);
		$stmt->execute([$brukernavn]);
		$result = $stmt->fetch();

		if (strtoupper($result['e-post']) == strtoupper($brukernavn) && $result["passord"] == $passord) {
			session_start();
			$_SESSION["brukernavn"] = $brukernavn;
			print("<meta http-equiv='refresh' content='0;url=users/backendCheck.php'>");
		} else {
			print "Wrong username password";
		}
	} catch (PDOException $e) {
		echo $e->getMessage();
	}
}