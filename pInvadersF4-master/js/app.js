var app = angular.module("pInvApp", []);

app.controller("pInvAppCtrl", function($scope,$http) {
    //mapa de juego
    $scope.mapaCol=4;
    $scope.mapaFil=4;
    //Creacion del array de imagenes
    $scope.imgs = new Array($scope.mapaCol);
    for (i = 0; i < $scope.mapaCol; i++) {
      $scope.imgs[i] = new Array($scope.mapaFil);
      for (j = 0; j < 4; j++) {
        $scope.imgs[i][j]={img:"img/celdaPocketInvaders100.png"};
      }
    }
    //Array de naves humanas
    $scope.numNavesHumanas=3;
    $scope.navesHumanas = new Array($scope.numNavesHumanas);
    //Posicion inicial de las naves
    for (i = 0; i < $scope.numNavesHumanas; i++) {
      $scope.navesHumanas[i]={
        id:i,
        col:i,
        fil:0,
        tipo:"nave",
        img:"img/celdaNavePocketInvaders100.png"
      };
      //Pintamos las naves inicialmente
      $scope.imgs[$scope.navesHumanas[i].fil][$scope.navesHumanas[i].col].img="img/celdaNavePocketInvaders100.png";
    }
    //Array de naves IA
    $scope.numNavesIA=3;
    $scope.navesIA = new Array($scope.numNavesIA);
    //Posicion inicial de las naves
    for (i = 0; i < $scope.numNavesIA; i++) {
      $scope.navesIA[i]={
        id:i,
        col:i,
        fil:3,
        tipo:"nave",
        img:"img/celdaNavePocketInvaders100.png"
      };
      //Pintamos las naves inicialmente
      $scope.imgs[$scope.navesIA[i].fil][$scope.navesIA[i].col].img="img/celdaNavePocketInvaders100.png";
    }

    //Peticion colocar naves iA
    $scope.mueveIA = function() {
      $stringConexion="lib/app.php?accion=mover&numNaves="+$scope.numNavesHumanas+"&";
      //Generamos la cadena de conexion
      for (i = 0; i < $scope.numNavesHumanas; i++) {
        if(i!=0) $stringConexion=$stringConexion+"&";
        $stringConexion=$stringConexion+"idH"+i+"="+$scope.navesHumanas[i].id+"&";
        $stringConexion=$stringConexion+"colH"+i+"="+$scope.navesHumanas[i].col+"&";
        $stringConexion=$stringConexion+"filH"+i+"="+$scope.navesHumanas[i].fil+"&";
        $stringConexion=$stringConexion+"tipoH"+i+"="+$scope.navesHumanas[i].tipo;
      }
      $stringConexion=$stringConexion+"&";
      for (i = 0; i < $scope.numNavesHumanas; i++) {
        if(i!=0) $stringConexion=$stringConexion+"&";
        $stringConexion=$stringConexion+"idIA"+i+"="+$scope.navesIA[i].id+"&";
        $stringConexion=$stringConexion+"colIA"+i+"="+$scope.navesIA[i].col+"&";
        $stringConexion=$stringConexion+"filIA"+i+"="+$scope.navesIA[i].fil+"&";
        $stringConexion=$stringConexion+"tipoIA"+i+"="+$scope.navesIA[i].tipo;
      }
      console.log($stringConexion);
      $http.get($stringConexion)
        .then(function(response) {
          $scope.naves = response.data;
          console.log($scope.naves);
          angular.forEach($scope.naves,
            function(nave, naveKey) {
            $scope.imgs[$scope.navesIA[nave.id].fil][$scope.navesIA[nave.id].col].img="img/celdaPocketInvaders100.png";
            $scope.imgs[nave.fil][nave.col].img="img/celdaNavePocketInvaders100.png";
            $scope.imgs[nave.fil][nave.col].img="img/celdaNavePocketInvaders100.png";}
          );
        });
    };

});
