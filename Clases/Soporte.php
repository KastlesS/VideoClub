<?php
require_once "interfaz.php";

class Soporte{
    public string $titulo;
    public int $precio;
    public int $numero;
    const IVA = 1.16;

    public function __construct($titulo,$precio,$numero){
        $this->titulo=$titulo;
        $this->precio=$precio;
        $this->numero=$numero;
    }

    public function getTitulo(): string {return $this->titulo;}

	public function getPrecio(): int {return $this->precio;}

	public function getNumero(): int {return $this->numero;}

    public function setTitulo(string $titulo): void {$this->titulo = $titulo;}

	public function setPrecio(int $precio): void {$this->precio = $precio;}

	public function setNumero(int $numero): void {$this->numero = $numero;}

	public function muestraResumen():void{
        echo $this->titulo." / ".$this->precio." / ".$this->numero; 
    }   

    public function __tostring():string{
        return "Nombre del producto: {$this->titulo} \n Precio: {$this->precio} \n Numero: {$this->numero}";
    }
}