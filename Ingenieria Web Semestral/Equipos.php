<?php
session_start();
if (!empty($_SESSION['user'])) {
     echo $_SESSION['user'];
     echo $_SESSION['myrank'];
}
?>
<html>

<head>
     <meta charset='utf-8'>
     <meta http-equiv='X-UA-Compatible' content='IE=edge'>
     <title>Home</title>
     <meta name='viewport' content='width=device-width, initial-scale=1'>
     <link rel="stylesheet" href="resources/main.css">
     <link rel="icon" href="resources/img/Logo.png">
     <script src="./resources/js/templates.js"></script>

     <script lang="javascript" type="text/javascript">

        function seleccionarEquipo(equipo) {
            location.href = "equipo.php?equipoSeleccionado=" + equipo;
        }

    </script>

</head>

<body class="general_backgroundImage">
     <div id="general_header"></div>
     
          
     <form action="Equipos.php" method="post">

     <section class="secequipos">


          <?php

               $con = mysqli_connect('localhost','root','') or die(mysqli_error());  
               mysqli_select_db($con,'humanrightsaresecondary') or die("cannot select DB");
               
               $sql = "SELECT * FROM equipos";

               $result = $con->query($sql);

               while($row = $result->fetch_assoc()){ 
                    echo '<div class="equipo">';
                    echo '<a href="javascript:seleccionarEquipo('.$row['id'].');" class="equipocontainer">';
                    echo '<span>'.$row['grupo'].'</span>';
                    echo '<img class="equipoimg" src="./resources/img/Banderas/'.$row['dir_bandera'].'">';
                    echo '<h4>'.$row['equipo'].'</h4>';
                    echo '</a>';
                    echo '</div>';
               }

          ?>

     </section>

     </form>


          <script>
               <?php
               if (!empty($_SESSION['user'])) {
                    echo "headerTemplateLogged()";
               } else {
                    echo "headerTemplateNotLogged()";
               } ?>
          </script>
</body>

</html>