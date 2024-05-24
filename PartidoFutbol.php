<?php
class PartidoFutbol extends Partido{
    private $coefMenores;
    private $coefJuveniles;
    private $coefMayores;

    public function __construct($idpartido, $fecha,$objEquipo1,$cantGolesE1,$objEquipo2,$cantGolesE2)
    {
        parent::__construct($idpartido, $fecha,$objEquipo1,$cantGolesE1,$objEquipo2,$cantGolesE2);
        $this->coefMenores=0.13;
        $this->coefJuveniles=0.19;
        $this->coefMayores=0.27;
    }

    public function getCoefMenores(){
        return $this->coefMenores;
    }
    public function getCoefJuveniles(){
        return $this->coefJuveniles;
    }
    public function getCoefMayores(){
        return $this->coefMayores;
        
    }
    public function setCoefMenores($coefMenores){
        $this->coefMenores=$coefMenores;
    }
    public function setCoefJuveniles($coefJuveniles){
        $this->coefJuveniles=$coefJuveniles;
    }
    public function setcoefMayores($coefMayores){
        $this->coefMayores=$coefMayores;
    }

    public function __toString()
    {
        $cadena=parent::__toString();
        return $cadena. 
            "coeficiente menores:" . $this->getCoefMenores()."\n".
            "coefieciente Juveniles: ". $this->getCoefJuveniles(). "\n".
            "coeficiente Mayores: ". $this->getCoefMayores(). "\n";
    }

    public function coeficientePartido(){
        $coeficientePartido=parent::coeficientePartido();
        $cefBase=$this->getCoefBase();
        $categoria=$this->getObjEquipo1()->getObjCategoria();
        if($categoria->getDescripcion()=="Menores"){
            $coefBaseFutbol=$this->getCoefMenores();
        }elseif($categoria->getDescripcion()=="Juveniles"){
            $coefBaseFutbol=$this->getCoefJuveniles();
        }elseif($categoria->getDescripcion() =="Mayores"){
            $coefBaseFutbol=$this->getCoefMayores();
        }
        $coeficientePartido=$coeficientePartido*$coefBaseFutbol/$coefBese;
        return $coeficientePartido;
    }

}



?>
