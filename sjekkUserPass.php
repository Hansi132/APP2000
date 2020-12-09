<?php

function sjekkUserPass($brukernavn, $passord) {
	require_once ("mysqlPDO.php");
	try {
		$sql = "SELECT epost, fnavn, passord, brukertype FROM bruker WHERE epost = ?;";
		$dhn = new mysqlPDO();
		$stmt = $dhn->prepare($sql);
		$stmt->execute([$brukernavn]);
		$result = $stmt->fetch();

		function checkBrukertype($brukertype) {
			switch ($brukertype) {
				case 3:
					return "kontrollør";
					break;
				case 2:
					return "administrator";
					break;
			}
			return "bruker";
		}

		if (strtoupper($result['epost']) == strtoupper($brukernavn) && $result["passord"] == $passord) {
			session_start();
			$_SESSION["brukernavn"] = $brukernavn;
			$_SESSION["brukertype"] = checkBrukertype($result["brukertype"]);
			$_SESSION["fnavn"] = $result['fnavn'];
			print("<meta http-equiv='refresh' content='0;url=users/backendCheck.php'>");
		} else {
			print "Wrong username password";
		}
	} catch (PDOException $e) {
		echo $e->getMessage();
	}
}