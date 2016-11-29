<?php

class ia {

  //Declaramos las propiedades
  public $mapaCol = 4;
  public $mapaFil = 4;
  public $numNaves = 3;

  public $navesHumano = [];
  public $navesIA = [];

  //Declaramos el metodo
  public function getMapaFil() {
    return $this->mapaFil;
  }

  public function getMapaCol() {
    return $this->mapaCol;
  }

  public function getNumNave(){
    return $this->numNaves;
  }

  public function getNavesHumano() {
    return $this->navesHumano;
  }

  public function getNavesIA() {
    // La peticion ajax solo dispone actualmente de tipo1 y tipo2
    //
    //  Amarillo = tipo2
    //  Verde = tipo1
    //  Rojo = tipo1
    //

    $cont = 0; // Uso esta variable para identificar entre las 2 naves tipo1

    foreach ($this->navesIA as &$nave) {

      if(strcmp($nave['tipo'], 'tipo2')) { // Amarillo
        $this->moverTipo1IA($nave);
      }

      // Incrementamos el cont para distingir entre los dos tipos 1
      if(strcmp($nave['tipo'], 'tipo1')) {
        $cont++;
      }


    }

    return $this->navesIA;
  }

  // Setters
  public function setMapaCol($mapaCol) {
    if ($mapaCol < 0){
      $this->mapaCol = 0;
    }
    elseif($mapaCol > 3){
      $this->mapaCol = 3;
    }else{
      $this->mapaCol = $mapaCol;
    }
  }

  public function setMapaFil($mapaFil) {
    if ($mapaFil < 0){
      $this->mapaFil = 0;
    }
    elseif($mapaFil > 4){
      $this->mapaFil = 4;
    }else{
      $this->mapaFil = $mapaFil;
    }
  }

  // addNaveHumana set se usa para reemplazar
  public function setNaveHumana($id,$tipo,$col,$fil) {
    $nave =   [
      'id'=>$id,
      'tipo'=>$tipo,
      'col'=>$col,
      'fil'=>$fil
    ];
    array_push($this->navesHumano, $nave);
  }

  // addNaveIA set se usa para reemplazar
  public function setNaveIA($id,$tipo,$col,$fil) {
    $nave =   [
      'id'=>$id,
      'tipo'=>$tipo,
      'col'=>$col,
      'fil'=>$fil
    ];
    array_push($this->navesIA, $nave);
  }


  private function moverTipo1IA(&$nave) {//Amarillo

      $naveHumanas = $this->getNavesHumano();

      $moverIA = 1;


    foreach ($naveHumanas as &$naveHumana) {

      if ($naveHumana['col'] == $nave["col"] && ($naveHumana['fil']+1) == $nave['fil']) {
          $moverIA=0;
              }
          }
      if ($moverIA == 1) {
          $nave['fil'] --;
          }
      }
}

?>
