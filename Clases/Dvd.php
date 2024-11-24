<?php
require_once "interfaz.php";

class Dvd extends Soporte{
    public string $idiomas;
    public string $formatoPantalla;
    
    public function __construct($titulo, $precio, $numero, $idiomas, $formatoPantalla) {
        parent::__construct($titulo,$precio,$numero);
        $this->idiomas=$idiomas;
        $this->formatoPantalla=$formatoPantalla;
    }

    public function muestraResumen():void{
        echo parent::muestraResumen()." / ".$this->idiomas." / ".$this->formatoPantalla; 
    }

    public function __tostring():string{
        return parent::__tostring()."\n Idiomas: {$this->idiomas} \n Formato: {$this->formatoPantalla}";
    }
}