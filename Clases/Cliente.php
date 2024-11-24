<?php
require_once "interfaz.php";

class Cliente{
    public string $nombre;
    public int $numero;
    public int $maxAlquilerConcurrente;

    public array $soportesAlquilados;
    public int $numSoportesAlquilados;

    public function __construct($nombre,$numero,$maxAlquilerConcurrente=3){
        $this->nombre=$nombre;
        $this->numero=$numero;
        $this->maxAlquilerConcurrente=$maxAlquilerConcurrente;
        $this->soportesAlquilados=[];
        $this->numSoportesAlquilados=0;
    }

	public function getNumero(): int {return $this->numero;}

	public function setNumero(int $numero): void {$this->numero = $numero;}

    public function muestraResumen():void{
        echo "Nombre: {$this->nombre} \n Numero de alquileres: {$this->numSoportesAlquilados}";
    }

    public function tieneAlquilado(Soporte $s):bool{
        foreach($this->soportesAlquilados as $valores){
            if($valores == $s->getNumero()){
                return true;
            }else{
                return false;
            }
        }
    }

    public function alquilar(Soporte $s):bool{
        foreach($this->soportesAlquilados as $valores){
            if($valores == $s->getNumero()){
                echo "El producto: ".$s->getTitulo()." ya esta alquilado";
                return false;
            }
        }

        if($this->maxAlquilerConcurrente <= 0){
            echo "No te quedan mas alquileres";
            return false;
        }else{
            $this->soportesAlquilados[] = $s->getNumero();
            $this->maxAlquilerConcurrente--;
            echo "El producto: ".$s->getTitulo()." se ha alquilado correctamente";
            return true;
        }
    }

    public function devolver(int $numSoporte):bool{
        $flag=false;
        foreach($this->soportesAlquilados as $valores){
            if($valores == $numSoporte){
                echo "El producto esta alquilado. Procedemos a su devolucion";
                array_diff($this->soportesAlquilados,[$numSoporte]);
                $flag=true;
            }
        }
        if(!$flag){
            echo "El producto no esta en su alquiler";
        }

        return $flag;
    }

    public function listarAlquileres():void{
        echo "El cliente {$this->nombre} tiene ".count($this->soportesAlquilados)." alquileres. \n Lista de alquileres: \n";
        foreach($this->soportesAlquilados as $valores){
            echo $valores.".\n";
        }
    }

    public function __tostring():string{
        return "Cliente: {$this->nombre} \n Numero: {$this->numero}";
    }

}