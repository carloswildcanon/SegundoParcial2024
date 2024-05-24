<?php
class PartidoBasquetbol extends Partido{
    private $cantidadFaltas;
    private $coefPenalizacion;
    public function __construct($idpartido, $fecha,$objEquipo1,$cantGolesE1,$objEquipo2,$cantGolesE2,$cantFaltas)
    {
        parent::__construct($idpartido, $fecha,$objEquipo1,$cantGolesE1,$objEquipo2,$cantGolesE2);
        $this->cantidadFaltas=$cantFaltas;
        $this->coefPenalizacion=0.75;
    }
    public function getCantidadFaltas(){
        return $this->cantidadFaltas;
    }
    public function setCantidadFaltas($ncantFaltas){
        $this->cantidadFaltas=$ncantFaltas;

    }
    public function getCoefPenalizacion(){
        return $this->coefPenalizacion;
    }
    public function setCoefPenalizacion($ncoefPenalizacion){
        $this->coefPenalizacion=$ncoefPenalizacion;
    }

    public function coeficientePartido(){
        $coeficienteBase=$this->getCoefBase();
        $coefPenal=$this->getCoefPenalizacion();
        $faltas=$this->getCantidadFaltas();
        $coefBaseBasquetbol=$coeficienteBase-$coefPenal*$faltas;
        $coefPartido=parent::coeficientePartido()* $coefBaseBasquetbol/$coeficienteBase;
        return $coefPartido;
    }

    public function __toString()
    {
        $cadena=parent::__toString();
        return $cadena. 
                "Cantidad Faltas:". $this->getCantidadFaltas(). "\n";
    }

}

?>
