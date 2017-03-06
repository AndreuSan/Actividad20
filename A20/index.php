<?php
include"dbNBA.php";
$nba= new dbNBA();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Pagina principal</title>
  </head>
  <body>
    <h2>Partidos</h2>
    <!-- Select Dinamico Equipo_Local -->
      <form action="filtrado.php" method="post">
      <input type="hidden" value="select" name="tipo" />
      <select name="equipo_local">
          <option></option>
          <?php
          $resultado=$nba->SelectEquipoLocal();
            foreach ($resultado as $fila) {
          ?>
          <option value="<?php echo $fila['equipo_local']; ?>"><?php echo $fila['equipo_local']; ?></option>
          <?php }
          ?>
        </select>
      <!-- Select Dinamico Equipo_Visitante -->
  		<select name="equipo_visitante" >
  			<option ></option>
        <?php
        $resultado=$nba->SelectEquipoVisitante();
          foreach ($resultado as $fila) {
        ?>
          <option value="<?php echo $fila['equipo_visitante']; ?>"><?php echo $fila['equipo_visitante'];
        ?></option><?php
      }?>
  		</select>
        <!-- Select Dinamico Temporada -->
  		<select name="temporada" >
  			<option ></option>
        <?php
        $resultado=$nba->SelectTemporada();
          foreach ($resultado as $fila) {
        ?>
          <option value="<?php echo $fila['temporada']; ?>"><?php echo $fila['temporada'];
          ?></option><?php
      }?>
  		</select>
        <input type="hidden" name="" value="">
        <input type="submit" name="" value="Enviar">
    </form>
  </body>
</html>
