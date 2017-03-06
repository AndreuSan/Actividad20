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
  public function SelectEquipoLocal(){
    return $this->conexion->query("SELECT distinct(equipo_local) FROM partidos  GROUP BY equipo_local ASC");
  }
  public function SelectEquipoVisitante(){
    return $this->conexion->query("SELECT distinct(equipo_visitante) FROM partidos");
  }
  public function SelectTemporada(){
    return $this->conexion->query("SELECT distinct(temporada) FROM partidos");
  }
  // // Esta es la funcion para los Select
  public function mostrarPartidosDos($equipo_local,$equipo_visitante,$tempo){
    $consulta="SELECT * FROM partidos";
    if (!empty($equipo_local)) {
      $consulta=$consulta." WHERE equipo_local='".$equipo_local."'";
      if (!empty($equipo_visitante)) {
        $consulta=$consulta." AND equipo_visitante='".$equipo_visitante."'";
      }if (!empty($tempo)) {
        $consulta=$consulta." AND temporada='".$tempo."'";
      }
      return $this->conexion->query($consulta);
    }elseif (!empty($equipo_visitante)) {
      $consulta=$consulta." WHERE equipo_visitante='".$equipo_visitante."'";
      if (!empty($tempo)) {
        $consulta=$consulta." AND temporada='".$tempo."'";
      }
      return $this->conexion->query($consulta);
    }elseif (!empty($tempo)) {
      $consulta=$consulta." WHERE temporada='".$tempo."'";
      return $this->conexion->query($consulta);
    }else{
      return $this->conexion->query($consulta);
    }
  }
}
?>
