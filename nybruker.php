<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>Gruppe</title>
    <link rel="stylesheet" type="text/css" href="css/mobile.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <meta name="viewport" content="device-width, initial-scale=1.0" />
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
          <label for="fornavn" class="">Fornavn</label> <br />
          <input name="fornavn" type="text" id="fornavn" class="form1" /> <br />

          <label for="etternavn" class="">Etternavn</label> <br />
          <input name="etternavn" type="text" id="etternavn" class="form1" />
          <br />

          <label for="epost" class="">Epost</label> <br />
          <input name="Epost" type="text" id="epost" class="form1" /> <br />

          <label for="passord" class="">Passord</label> <br />
          <input name="passord" type="password" id="passord" class="form1" />
          <br />

          <input
            type="submit"
            name="submit"
            id="submit"
            value="Registrer"
            class="formknapp"
          />
          
        </form>

<?php
  if (isset($_POST ["registrerBruker"]))
 {

   
   $fornavn=$_POST ["fornavn"];
   $etternavn=$_POST ["etternavn"];
   $epost=$_POST ["epost"];
   $passord=$_POST ["passord"];

             
if (!$epost || !$fornavn || !$etternavn || !$passord)

   {
             
   print ("Alle felt m&aring; fylles ut");
             
   }
             

   else
             
   {
   include("db-tilkobling.php"); /* tilkobling til database-serveren utført og valg av database foretatt */
   $sqlSetning="SELECT * FROM student WHERE brukernavn='$brukernavn';";  /* where er hvem som skal bli endret. feks customer med 1 med brukernavn 1*/
   $sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; hente data fra databasen");
   $antallRader=mysqli_num_rows($sqlResultat);
             

   if ($antallRader!=0) /* faget er registrert fra før */
             
   {
             
   print ("Bruker er registrert fra f&oslashr");
             
   }
             

   else
             
   {
             
   $sqlSetning="INSERT INTO student (fornavn,etternavn,epost,passord) VALUES('$fornavn','$etternavn','$epost','$passord');";
             
   mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; registrere data i databasen");
             
   print ("F&oslash;lgende bruker er nå registrert $fornavn $etternavn");
          
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

                <li class="li1">
                  <a class="knapp" href="logginn.php">Logg inn </a>
                </li>

                <li class="li1">
                  <a class="knapp" href="loggut.html">
                    Logg ut
                    <div id="brukernavn"></div>
                  </a>
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

                <li>
                  <a class="knapp1" href="logginn.php">Logg inn </a>
                </li>

                <li>
                  <a class="knapp1" href="loggut.html">
                    Logg ut
                    <div id="brukernavn"></div>
                  </a>
                </li>
              </ul>
            </div>
          </nav>
        </div>
      </div>
    </div>
  </body>
</html>

