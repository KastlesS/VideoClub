<?php
require_once "interfaz.php";
require_once "Soporte.php";

class CintaVideo extends Soporte{
    public int $duracion;

    public function __construct($titulo,$precio,$numero,$duracion){
        $this->duracion=$duracion;
        parent::__construct($titulo,$precio,$numero);
    }

    public function muestraResumen():void{
        echo parent::muestraResumen()." / ".$this->duracion;
    }

    public function __tostring():string{
        return parent::__tostring()."\n Duracion: {$this->duracion}";
    }
}