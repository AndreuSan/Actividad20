<?php
class ia
{
  //propiedades de la clase
  public $tipo="nave";
  public $mapaCol=4;
  public $mapaFil=4;
  public $numNaves=3;
  //arrays
  public $navesHumano = [];


  public $navesIA=[];
  //declaracion de un metodo
  //en metodos se usa public function, get pide y return devuelve
  public function getmColumna(){
   return $this->mapaCol;
  }

  public function getFila(){
    return $this->mapaFil;
  }

  public function getNave(){
    return $this->numNaves;
  }

  public function getNavesHumano(){
    return $this->naveHumano;
  }
  public function getNavesIA(){
    //expongo el movimiento antes del return para que se efectue
    $this->navesIA[0]["fil"]=2;
      $this->navesIA[0]["col"]=1;
    $this->navesIA[1]["fil"]=1;
      $this->navesIA[1]["col"]=2;
    $this->navesIA[2]["fil"]=0;
      $this->navesIA[2]["col"]=3;
    return $this->navesIA;
  }

  //setters
  // en mapaCol y en mapaFil pongo límites usando if,else y elseif
  public function setmapaCol($mapaCol){
     if($mapaCol>3 ){
           $this->mapaCol = 3;
    }elseif ($mapaCol<0) {
         $this->mapaCol = 0;
    }else{
         $this->mapaCol = $mapaCol;
    }
  }

  public function setmapaFil($mapaFil){
      if($mapaFil>3 ){
          $this->mapaFil = 3;
   }elseif ($mapaFil<0) {
         $this->mapaFil = 0;
   }else{
         $this->mapaFil = $mapaFil;
   }
  }
  public function setnumNaves($navesIA){
    $this->navesIA=$navesIA;
  }
  //en el setnavesHumano le marco el array
  public function setNaveHumana($id,$tipo,$col,$fil){
    $this->navesHumano[]=[
    "id"=>$id,
    "tipo"=>$tipo,
    "col"=> $col,
    "fil"=> $fil,
  ];
  }


  public function setNaveIA($id,$tipo,$col,$fil){
     $this->navesIA[]=[
       "id"=>$id,
       "tipo"=>$tipo,
       "col"=> $col,
       "fil"=> $fil,
     ];
   }

  //arranque rand comando para randomizar el movimiento
  public function randompos(){
    $this->columna = rand(0,3);
    $this->fila = rand(0,3);
  }
}

?>
