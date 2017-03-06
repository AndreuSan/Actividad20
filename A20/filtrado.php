<?php
include"dbNBA.php";
$nba= new dbNBA();
// isset() sirve para decir que si existe
// empty() sirve para decir que lo que alla dentro de la variable tenga que estar vacio
if ($nba->getErrorConexion()==true) {
  echo "No hay conexion";
}else {
  //-- Falta los isset y los empty de los demas input --\\
  if (isset($_POST) && !empty($_POST) && !empty($_POST["equipo_local"]) && !empty($_POST["equipo_visitante"]) && !empty($_POST["temporada"]))  {
    //-- Este es para los selects --\\
    $resultado=$nba->mostrarPartidosDos($_POST["equipo_local"],$_POST["equipo_visitante"],$_POST["temporada"]);
    ?>
    <center>
      <table border="1">
        <tr>
          <th>Equipo local</th>
          <th>Equipo Visitante</th>
          <th>Temporada</th>
        </tr>
        <?php
        while ($fila=$resultado->fetch_assoc()) {
          echo "<tr>";
          echo "<td>".$fila["equipo_local"]."</td>";
          echo "<td>".$fila["equipo_visitante"]."</td>";
          echo "<td>".$fila["temporada"]."</td>";
          echo "</tr>";
        }
      }else {
        //-- Aqui nos enviara si hay error --\\
        echo "GAME OVER";
      }
    }
    ?>
  </table>
</center>
