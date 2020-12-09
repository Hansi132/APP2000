<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8"/>
	<title>Gruppe</title>
	<link rel="stylesheet" type="text/css" href="css/mobile.css"/>
	<link
			rel="stylesheet"
			href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
	/>
	<meta name="viewport" content="device-width, initial-scale=1.0"/>
	<script language="Javascript" src="hamburger.js"></script>
</head>
<body>
<div class="grid-container">
	<!----------------------------------------------------------------------------------------------->

	<!------------------------------------------------------------------------------------------------------>

	<div class="itemNybruker">
		<h2>Ny bruker</h2>

		<form
				action=""
				id="registrerBruker"
				name="registrerBruker"
				method="post"
		>
			<label for="fornavn" class="">Fornavn</label> <br/>
			<input name="fornavn" type="text" id="fornavn" class="form1"/> <br/>

			<label for="etternavn" class="">Etternavn</label> <br/>
			<input name="etternavn" type="text" id="etternavn" class="form1"/><br/>

			<label for="kjønn" class="">Kjønn</label><br>
			<select name="kjønn" id="kjønn" class="form1">
				<option value="M">Mann</option>
				<option value="K">Kvinne</option>
			</select><br>

			<label for="bursdag">Fødselsdato</label><br>
			<input type="date" name="bursdag" id="bursdag" class="form1" value="1998-01-01"><br>

			<label for="epost" class="">Epost</label> <br/>
			<input name="epost" type="text" id="epost" class="form1"/> <br/>

			<label for="passord" class="">Passord</label> <br/>
			<input name="passord" type="password" id="passord" class="form1"/>
			<br/>

			<input
					type="submit"
					name="registrerBruker"
					id="registrerBruker"
					value="Registrer"
					class="formknapp"
			/>

		</form>

		<?php
		if (isset($_POST ["registrerBruker"])) {


			$fornavn = $_POST ["fornavn"];
			$etternavn = $_POST ["etternavn"];
			$epost = $_POST ["epost"];
			$passord = $_POST ["passord"];
			$kjonn = $_POST ["kjønn"];
			$bursdag = $_POST ["bursdag"];


			if (!$epost || !$fornavn || !$etternavn || !$passord || (strpos($epost, "usn") == false)) {
				print("Alle felt må fylles ut, og det må være en USN epostadresse");
			} else {
				require_once("mysqlPDO.php");
				$sql = "SELECT `epost` FROM bruker WHERE 'epost' = ?;";
				$dhn = new mysqlPDO();
				$stmt = $dhn->prepare($sql);
				$stmt->execute([$epost]);
				$result = $stmt->fetch();

				if (!empty($result['epost'])) {

					print ("Bruker er registrert fra f&oslashr");

				} else {
					$sql = "INSERT INTO bruker (`epost`, passord, enavn, fnavn, brukertype, fdato, mann) VALUES(:epost, :passord, :enavn, :fnavn, 1, :fdato, :mann);";
					$stmt = $dhn->prepare($sql);
					$stmt->execute([':epost' => $epost, ':passord' => sha1("IT2_2021" . $_POST["passord"]), ':enavn' => $etternavn, ':fnavn' => $fornavn, ':fdato' => $bursdag, ':mann' => $kjonn]);
					$stmt = null;
				}
			}

		}
		?>

	</div>

	<div class="item5"></div>

	<div class="item0">
		<div class="header">
			<box class="topBox"></box>
			<a
					id="burgerknapp"
					class="burgerknapp"
					href="javascript:void(0);"
					onclick="myFunction()"
			>
				<i class="fa fa-bars"></i>
			</a>

			<div class="desktop-nav">
				<!-- Dette er for desktop  -->
				<nav class="main-nav">
					<ul>
						<li class="li1">
							<a class="knapp" href="default.php">Hjem</a>
						</li>

						<li class="li1">
							<a class="knapp" href="avstemning.php">Avstemning </a>
						</li>

						<li class="li1">
							<a class="knapp" href="nominering.php">Nominering </a>
						</li>
					</ul>
				</nav>
			</div>
		</div>

		<!-- Dette er for knapp for mobil -->
		<div class="mobile-nav">
			<nav class="main-nav2">
				<div id="myLinks" style="display: none">
					<ul>
						<li>
							<a class="knapp1" href="default.php">Hjem</a>
						</li>

						<li>
							<a class="knapp1" href="avstemning.php">Avstemning </a>
						</li>

						<li>
							<a class="knapp1" href="nominering.php">Nominering </a>
						</li>
					</ul>
				</div>
			</nav>
		</div>
	</div>
</div>
</body>
</html>

