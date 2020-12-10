<?php
include ("isLogged.php");
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>Gruppe</title>
    <link rel="stylesheet" type="text/css" href="css/mobile.css">
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <meta name="viewport" content="device-width, initial-scale=1.0" />
    <script language="Javascript" src="hamburger.js"></script>
  </head>
  <body>
    <div class="grid-container">
      <!----------------------------------------------------------------------------------------------------->
      <div class="item2">

      </div>
      <!----------------------------------------------------------------------------------------------------->

      <!----------------------------------------------------------------------------------------------------->
      <div class="item4">

      </div>
      <!----------------------------------------------------------------------------------------------------->
      <div class="item5">

      </div>
      <!----------------------------------------------------------------------------------------------------->

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

          <div class="desktop-nav" id="home">
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
      <div class="item3">
      <div class="nominate">
        <form action="POST" onsubmit="return confirm('Vil du nominere valgte kandidat')">
          <label for="kandidat"><h3>Nominer en kandidat</h3></label>
          <select name="kandidat" id="kandidat" class="kandidat">
            <option value="" selected hidden class="kandidatOption">Nominer en kandidat</option>
            <option value="" class="kandidatOption">Ola Nordmann</option>
            <option value="" class="kandidatOption">Ola Nordmann</option>
            <option value="" class="kandidatOption">Ola Nordmann</option>
          </select>
          <button type="submit" class="kandidatKnapp">Nominer!</button>
        </form>
      </div>


        <h3>Nominerte</h3>
        <div class="bildeboks">
          <img src="https://m3iam.files.wordpress.com/2014/05/facebook-default-no-profile-pic.jpg" class="bilder" />

          <img src="https://m3iam.files.wordpress.com/2014/05/facebook-default-no-profile-pic.jpg" class="bilder" />

          <img src="https://m3iam.files.wordpress.com/2014/05/facebook-default-no-profile-pic.jpg" class="bilder" />

          <img src="https://m3iam.files.wordpress.com/2014/05/facebook-default-no-profile-pic.jpg" class="bilder" />

          <img src="https://m3iam.files.wordpress.com/2014/05/facebook-default-no-profile-pic.jpg" class="bilder" />
          <p class="pbildeboks">Ola Nordmann</p>
        </div>
      </div>
    </div>
  </body>
</html>
