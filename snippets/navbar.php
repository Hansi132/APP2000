<?php
session_start();
@$inloggetBruker = $_SESSION["brukernavn"];
?>

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

					<?php if (!empty(@$innloggetBruker)) {
						$brukertype = $_SESSION["brukertype"];
						$fnavn = $_SESSION["fnavn"];
						print ("<li class='li1'> <a class='knapp' href='https://itfag.usn.no/grupper/Vapp20G11/users/$brukertype/default.php'>$fnavn</a></li>");
					} ?>

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
