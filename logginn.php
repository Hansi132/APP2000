<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Gruppe</title>
	<link rel="stylesheet" type="text/css" href="css/mobile.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<meta name="viewport" content="device-width, initial-scale=1.0">
	<script language="Javascript" src="hamburger.js"></script>
</head>
<body>


<div class="grid-container">

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
				<div id="myLinks" style="display: none;">
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


	<!----------------------------------------------------------------------------------------------->
	<div class="item3 item3login">


		<h3> Logg inn </h3>
		<form action="logginn.php" id="innloggingSkjema" name="innloggingSkjema" method="POST" class="loginForm">


			Epost <br/> <input name="epost" type="text" id="epost" class="form1" autofocus="autofocus"/> <br/>

			Passord <br/> <input name="passord" type="password" id="passord" class="form1"> <br/>

			<input type="submit" name="glemtPassord" value="Glemt passord?" class="formknapp"/>
			<br>
			<input type="submit" name="logginnKnapp" value="Logg inn" class="formknapp">
			<br>
			<a href="nybruker.html" class="registrerBruker formknapp">Registrer ny bruker </a>

		</form>
	</div>
	<!------------------------------------------------------------------------------------------------------>
</div>
<div class="item5"></div>
<div class="item1">
</div>
</body>
</html>

<?php
if (isset($_POST["logginnKnapp"]))
	include_once ('sjekkUserPass.php');

	sjekkUserPass($_POST["epost"], sha1("IT2_2021" . $_POST["passord"]));

?>