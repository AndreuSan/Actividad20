<?php
class dbNBA{
  private $IP="localhost";
  private $USUARIO="root";
  private $CONTRASEÑA="";
  private $DB="nba";
  private $conexion;
  private $error=false;

  function __construct(){
    $this->conexion = new mysqli($this->IP, $this->USUARIO, $this->CONTRASEÑA, $this->DB);
    if ($this->conexion->connect_errno){
      $this->error=true;
    }
  }
  public function getErrorConexion(){
    return $this->error;
  }
  public function InsertarEquipos($nombre,$ciudad,$conferencia,$division){
    $sqlInsercion="INSERT INTO equipos(nombre,ciudad,conferencia,division) Values('".$nombre."','".$ciudad."','".$conferencia."','".$division."')";
    $this->conexion->query($sqlInsercion);
    return $this->conexion->query("SELECT * FROM equipos WHERE nombre='".$nombre."' AND ciudad='".$ciudad."' AND conferencia='".$conferencia."' AND division='".$division."'");
  }
  public function mostrarEquipo($nombre){
    return $this->conexion->query("SELECT * FROM equipos WHERE nombre='".$nombre."'");
  }
}
?>
