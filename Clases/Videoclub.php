<?php
require_once "interfaz.php";

class VideoClub{
    public string $nombre;
    public int $numProductos;
    public int $numSocios;

    public array $productos;
    public array $socios;

    public function __construct($nombre){
        $this->nombre=$nombre;
        $this->numProductos=0;
        $this->numSocios=0;
        $this->productos=[];
        $this->socios=[];
    }

    public function incluirProducto(Soporte $s):bool{
        $flag=false;
        foreach($this->productos as $p){
            if($p == $s){
                $flag=true;
            }
        }

        if($flag){
            echo "El producto ".$s->getTitulo()." ya esta introducido";
        }else{
            echo "Se ha introducido el producto: ".$s->getTitulo()." correctamente";
            $this->productos[]=$s;
        }

        return $flag;
    }

    public function incluirCintaVideo($titulo,$precio,$numero,$duracion){
        $cinta = new CintaVideo($titulo,$precio,$numero,$duracion);
        $flag = false;
        foreach($this->productos as $p){
            if($p == $cinta){
                $flag=true;
            }
        }

        if($flag){
            echo "La cinta de video: ".$titulo." ya esta introducida";
        }else{
            echo "Se ha introducido correctamente la cinta de video {$titulo}";
            $this->productos[]=$cinta;
        }

        return $flag;
    }

    public function incluirDvd($titulo,$precio,$numero,$idiomas,$pantalla){
        $cinta = new Dvd($titulo,$precio,$numero,$idiomas,$pantalla);
        $flag = false;
        foreach($this->productos as $p){
            if($p == $cinta){
                $flag=true;
            }
        }

        if($flag){
            echo "El DVD: ".$titulo." ya esta introducida";
        }else{
            echo "Se ha introducido correctamente el DVD {$titulo}";
            $this->productos[]=$cinta;
        }

        return $flag;
    }

    public function incluirJuego($titulo,$precio,$numero,$consola,$minJ,$maxJ){
        $cinta = new Juego($titulo,$precio,$numero,$consola,$minJ,$maxJ);
        $flag = false;
        foreach($this->productos as $p){
            if($p == $cinta){
                $flag=true;
            }
        }

        if($flag){
            echo "El juego: ".$titulo." ya esta introducida";
        }else{
            echo "Se ha introducido correctamente el juego {$titulo}";
            $this->productos[]=$cinta;
        }

        return $flag;
    }

    public function incluirSocio($nombre,$numero,$maxAquiler=3){
        $cinta = new Cliente($nombre,$numero,$maxAquiler);
        $flag = false;
        foreach($this->socios as $p){
            if($p == $cinta){
                $flag=true;
            }
        }

        if($flag){
            echo "El socio: ".$nombre." ya esta introducida";
        }else{
            echo "Se ha introducido correctamente el socio: {$nombre}";
            $this->socios[]=$cinta;
        }

        return $flag;
    }

    public function listarProductos():void{
        echo "Lista de productos: \n";
        foreach($this->productos as $p){
            echo "- ".$p->getTitulo()."\n";
        } 
    }

    public function listarSocios():void{
        echo "Lista de socios: \n";
        foreach($this->socios as $p){
            echo "- ".$p->getNumero()."\n";
        } 
    }

    public function alquilarSocioProducto($numeroCliente,$numeroSoporte):bool{
        $cont=0;
        foreach($this->productos as $p){
            if($p->getNumero() == $numeroSoporte){
                $cont++;
            }
        }

        foreach($this->socios as $s){
            if($s->getNumero() == $numeroCliente){
                $cont++;
            }
        }

        if($cont==2){
            echo "El cliente con el numero de soporte {$numeroSoporte} ha alquilado el producto {$numeroCliente}";
            $this->productos[]=$numeroSoporte;
            $this->socios[]=$numeroCliente;
            return true;
        }else{
            echo "No se ha podio alquilar el producto :(";
            return false;
        }
    }

    public function __tostring():string{
        $text="Nombre del videoclub: {$this->nombre} \n Lista de productos: \n ";
        foreach($this->productos as $p){
            $text.="- ".$p->getTitulo()."\n";
        }
        return $text;
    }
}