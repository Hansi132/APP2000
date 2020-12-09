<?php
session_start();
@$innloggetBruker = $_SESSION["brukernavn"];
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
			<h3>Velkommen til siden for studentvalget 2021</h3>
			<br>
			<p class="text"> <br>
				 
			Dette er siden der dere skal stemme og nominere kandidater for skolevalget. <br>
			Venligst logg inn for å bruke siden.
		</p>
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
							<a class="knapp" href="https://itfag.usn.no/grupper/Vapp20G11/default.php">Hjem</a>
						</li>

						<li class="li1">
							<a class="knapp"
							   href="https://itfag.usn.no/grupper/Vapp20G11/avstemning.php">Avstemning </a>
						</li>

						<li class="li1">
							<a class="knapp"
							   href="https://itfag.usn.no/grupper/Vapp20G11/nominering.php">Nominering </a>
						</li>

						      <?php
            if (empty(@$innloggetBruker)) {
              print ("<li class=\"li1\">
                  <a class=\"knapp\" href=\"https://itfag.usn.no/grupper/Vapp20G11/logginn.php\">Logg inn </a>
                </li>");
            } else {
              print ("<li class=\"li1\">
              <a class=\"knapp\" href=\"https://itfag.usn.no/grupper/Vapp20G11/loggut.php\"> Logg ut
                <div id=\"brukernavn\"></div>
              </a>
            </li>");
            }
            ?>
                <?php if (!empty(@$innloggetBruker)) {
              $brukertype = $_SESSION["brukertype"];
              $fnavn = $_SESSION["fnavn"];
              print ("<li class='li1'> <a class='knapp' href='https://itfag.usn.no/grupper/Vapp20G11/users/$brukertype/default.php'>$fnavn</a></li>");
            } ?>

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
							<a class="knapp1" href="https://itfag.usn.no/grupper/Vapp20G11/default.php">Hjem</a>
						</li>

						<li>
							<a class="knapp1"
							   href="https://itfag.usn.no/grupper/Vapp20G11/avstemning.php">Avstemning </a>
						</li>

						<li>
							<a class="knapp1"
							   href="https://itfag.usn.no/grupper/Vapp20G11/nominering.php">Nominering </a>
						</li>

						<?php
						if (empty($_SESSION["brukernavn"])) {
							print ("<li class=\"li1\">
                  <a class=\"knapp1\" href=\"https://itfag.usn.no/grupper/Vapp20G11/logginn.php\">Logg inn </a>
                </li>");
						} else {
							print ("<li class=\"li1\">
							<a class=\"knapp1\" href=\"https://itfag.usn.no/grupper/Vapp20G11/loggut.php\"> Logg ut
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