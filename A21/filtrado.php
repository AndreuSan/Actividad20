<?php
include"dbNBA.php";
$nba= new dbNBA();
// isset() sirve para decir que si existe
// empty() sirve para decir que lo que alla dentro de la variable tenga que estar vacio
if ($nba->getErrorConexion()==true) {
  echo "No hay conexion";
}else{//linea de busqueda
  if (isset($_POST["nombre"]) && (!empty($_POST["nombre"])) && (empty($_POST["ciudad"]))  && (empty($_POST["conferencia"]))  && (empty($_POST["division"]))) {
    $muestra=$nba->mostrarEquipo($_POST["nombre"]);
    ?>
    <center>
      <table border="1">
        <tr>
          <th>Nombre</th>
          <th>Ciudad</th>
          <th>Conferencia</th>
          <th>Division</th>
        </tr>
        <?php
        while ($fila=$muestra->fetch_assoc()) {
          echo "<tr>";
          echo "<td>".$fila["Nombre"]."</td>";
          echo "<td>".$fila["Ciudad"]."</td>";
          echo "<td>".$fila["Conferencia"]."</td>";
          echo "<td>".$fila["Division"]."</td>";
          echo "</tr>";
        }//linea del insert
      }elseif(isset($_POST) && !empty($_POST)){
        $insertar=$nba->InsertarEquipos($_POST["nombre"],$_POST["ciudad"],$_POST["conferencia"],$_POST["division"]);
        ?>
        <center>
          <table border="1">
            <tr>
              <th>Nombre</th>
              <th>Ciudad</th>
              <th>Conferencia</th>
              <th>Division</th>
            </tr>
            <?php
            while ($fila=$insertar->fetch_assoc()) {
              echo "<tr>";
              echo "<td>".$fila["Nombre"]."</td>";
              echo "<td>".$fila["Ciudad"]."</td>";
              echo "<td>".$fila["Conferencia"]."</td>";
              echo "<td>".$fila["Division"]."</td>";
              echo "</tr>";
            }
          }
        }
        ?>
      </table>
    </center>
