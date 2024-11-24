<?php
require_once "interfaz.php";

class Juego extends Soporte{
    public string $consola;
    public int $minNumJugadores;
    public int $maxNumJugadores;

    public function __construct($titulo,$precio,$numero,$consola,$minNumJugadores,$maxNumJugadores){
        parent::__construct($titulo,$precio,$numero);
        $this->consola=$consola;
        $this->minNumJugadores=$minNumJugadores;
        $this->maxNumJugadores=$maxNumJugadores;
    }

    public function muestraResumen():void{
        echo parent::muestraResumen()." / ".$this->consola." / ".$this->minNumJugadores." / ".$this->maxNumJugadores;
    }

    public function muestraJugadoresPosibles():void{
        if($this->minNumJugadores==1 && $this->maxNumJugadores==1){
            echo "Para 1 jugador";
        }else if($this->minNumJugadores>1 && $this->maxNumJugadores==$this->minNumJugadores){
            echo "Para {$this->minNumJugadores} jugadores";
        }else{
            echo "De {$this->minNumJugadores} a {$this->maxNumJugadores} jugadores";
        }
    }

    public function __tostring():string{
        return parent::__tostring()."\n Consola: {$this->consola} \n Jugadores Minimos: {$this->minNumJugadores} \n Jugadores Maximos: {$this->maxNumJugadores}";
    }
}