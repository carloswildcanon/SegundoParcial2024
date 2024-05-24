<?php
class Torneo{
    private $colPartidos;
    private $importe;
    public function __construct($colPartidos,$importe)
    {
        $this->colPartidos=$colPartidos;
        $this->importe=$importe;
    }
    public function getColPartidos(){
        return $this->colPartidos;
    }
    public function getImporte(){
        return $this->importe;
    }

    public function setColPartidos($ncolPartidos){
        $this->colPartidos=$ncolPartidos;
    }
    public function setImporte($nImporte){
        $this->importe=$nImporte;
    }

    public function concatenaPartidos(){
        $partidos=$this->getColPartidos();
        $cadena="";
        foreach($partidos as $partido){
            $cadena.=$partido;
        }
        return $cadena;
    } 

    public function ingresarPartido($OBJEquipo1, $OBJEquipo2, $fecha, $tipoPartido){
        $partidos=$this->getColPartidos();
        $partido=null;
        if($partidos != null){
            $idpartido=count($partidos)+1;
        }else{
            $idpartido=1;
            $partidos=[];
        }

        if($tipoPartido == "Futbol"){
            $catE1=$OBJEquipo1->getObjCategoria();
            $catE2=$OBJEquipo2->getObjCategoria();
            $cantJugE1=$OBJEquipo1->getCantJugadores();
            $cantJugE2=$OBJEquipo2->getCantJugadores();
            if($catE1==$catE2 && $cantJugE1==$cantJugE2){
                $partido=new PartidoFutbol($idpartido, 0,$OBJEquipo1,$OBJEquipo2,$objEquipo2,0);
                array_push($partidos,$partido);
                $this->setColPartidos($partidos);
            }
        }elseif($tipoPartido == "basquetbol"){
            $catE1=$OBJEquipo1->getObjCategoria();
            $catE2=$OBJEquipo2->getObjCategoria();
            $cantJugE1=$OBJEquipo1->getCantJugadores();
            $cantJugE2=$OBJEquipo2->getCantJugadores();
            if($catE1==$catE2 && $cantJugE1==$cantJugE2){
                $partido=new PartidoBasquetbol($idpartido, 0,$OBJEquipo1,$OBJEquipo2,$objEquipo2,0);
                array_push($partidos,$partido);
                $this->setColPartidos($partidos);
            }
        }
        return $partido;
    }


    public function darGanadores($deporte){
        $partidos=$this->getColPartidos();
        foreach($partido as $partido){
            if($partido instanceof PartidoFutbol){
                $ganador=$partido;
            }
        }
    }




    public function __toString(){
        return "Partidos:" .$this->concatenaPartidos(). 
                "Importe:" .$this->getImporte(). "\n";
    }
}

?>
