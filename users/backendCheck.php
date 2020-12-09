<?php
session_start();
@$inloggetBruker = $_SESSION["brukernavn"];

define('__ROOT__', dirname(dirname(__FILE__)));

require_once (__ROOT__.'/mysqlPDO.php');
try {

	if (empty($inloggetBruker)) {
		print("<meta http-equiv='refresh' content='0;URL=default.php'/>");
	}

	$dhn = new mysqlPDO();
	$sql = "SELECT type FROM brukertype JOIN bruker b on brukertype.idbrukertype = b.brukertype WHERE b.epost =:epost;";
	$stmt = $dhn->prepare($sql);
	$stmt->bindParam(':epost', $inloggetBruker);
	$stmt->execute();
	$result = $stmt->fetch(PDO::FETCH_ASSOC);


	print "<meta http-equiv='refresh' content='0;URL=/grupper/Vapp20G11/users/". $result["type"] ."/default.php'/>";

} catch (PDOException $e) {
	echo ($e->getMessage());
}

?>