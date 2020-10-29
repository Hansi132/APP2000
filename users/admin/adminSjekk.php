<?php
session_start();
@$inloggetBruker = $_SESSION["brukernavn"];

define('__ROOT__', dirname(dirname(dirname(__FILE__))));

require_once (__ROOT__.'/mysqlPDO.php');
try {

	if (empty($inloggetBruker)) {
		print("<meta http-equiv='refresh' content='0;URL=index.php'/>");
	}

	$dhn = new mysqlPDO();
	$sql = "SELECT type FROM brukertype JOIN bruker b on brukertype.idbrukertype = b.brukertype WHERE b.`e-post` =:epost;";
	$stmt = $dhn->prepare($sql);
	$stmt->bindParam(':epost', $inloggetBruker);
	$stmt->execute();
	$result = $stmt->fetch(PDO::FETCH_ASSOC);


	if($result["type"] != 'administrator') {
		print "<meta http-equiv='refresh' content='0;URL=/users/". $result["type"] ."/default.php'/>";
	}

} catch (PDOException $e) {
	echo ($e->getMessage());
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Valg Side</title>
	<link rel="stylesheet" type="text/css" href="https://itfag.usn.no/grupper/Vapp20G11/css/mobile.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<meta name="viewport" content="device-width, initial-scale=1.0">
	<script language="JavaScript" src="hamburger.js"></script>
</head>
<body>


<div class="grid-container">
	<!-------------------------------------------------------------------------------------------------------->
	<div class="item2">
	</div>
	<!------------------------------------------------------------------------------------------------------------>
	<div class="item3">
		<section>
			<h3>Velkommen til admin backend</h3>
			<br>
			<p class="text">Dette er en side der man kan stemme og nominere kandidater for valget. Venligst logg inn for
				å bruke siden.</p>
			<img height="200px"
				 src="https://www.usn.no/getfile.php/13520469-1525427372/usn.no/om_USN/Logo%20og%20grafiske%20elementer/USN_logotype.png">
		</section>
	</div>


	<!------------------------------------------------------------------------------------------------------------>
	<div class="item4">

	</div>
	<!-------------------------------------------------------------------------------------------------------->
	<div class="item5">
	</div>
	<!-------------------------------------------------------------------------------------------------------->

	<div class="item0">

		<div class="header">
			<box class="topBox"></box>
			<a id="burgerknapp" class="burgerknapp" href="javascript:void(0);" onclick="myFunction()">
				<i class="fa fa-bars"></i>
			</a>

			<div class="desktop-nav">
				<!-- Dette er for desktop  -->
				<nav class="main-nav">
					<ul>
						<li class="li1">
							<a class="knapp" href="index.php">Hjem</a>
						</li>

						<li class="li1">
							<a class="knapp" href="avstemning.php">Avstemning </a>
						</li>

						<li class="li1">
							<a class="knapp" href="nominering.php">Nominering </a>
						</li>

						<?php
						if(empty(@$innloggetBruker)) {
							print ("<li class=\"li1\">
                  <a class=\"knapp\" href=\"logginn.php\">Logg inn </a>
                </li>");
						} else {
							print ("<li class=\"li1\">
							<a class=\"knapp\" href=\"loggut.php\"> Logg ut
								<div id=\"brukernavn\"></div>
							</a>
						</li>");
						}
						?>
					</ul>
				</nav>

			</div>

		</div>

		<!-- Dette er for knapp for mobil -->
		<div class="mobile-nav">
			<nav class="main-nav2">
				<div id="myLinks" style="display: none;">
					<ul>


						<li>
							<a class="knapp1" href="index.php">Hjem</a>
						</li>

						<li>
							<a class="knapp1" href="avstemning.php">Avstemning </a>
						</li>

						<li>
							<a class="knapp1" href="nominering.php">Nominering </a>
						</li>

						<?php
						if(empty($_SESSION["brukernavn"])) {
							print ("<li class=\"li1\">
                  <a class=\"knapp\" href=\"logginn.php\">Logg inn </a>
                </li>");
						} else {
							print ("<li class=\"li1\">
							<a class=\"knapp\" href=\"loggut.php\"> Logg ut
								<div id=\"brukernavn\"></div>
							</a>
						</li>");
						}
						?>
					</ul>
				</div>
			</nav>
		</div>
	</div>
</div>


</body>
</html>
