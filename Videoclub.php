<?php
spl_autoload_register(function($clases){
    require_once __DIR__."/Clases/".$clases.".php";
});

//instanciamos un par de objetos cliente 
$cliente1 = new Cliente("Bruce Wayne", 23); 
$cliente2 = new Cliente("Clark Kent", 33); 
//mostramos el numero de cada cliente creado 
echo "<br>El identificador del cliente 1 es: " . $cliente1->getNumero(); 
echo "<br>El identificador del cliente 2 es: " . $cliente2->getNumero(); 
//instancio algunos soportes 
$soporte1 = new CintaVideo("Los cazafantasmas", 3.5, 23, 107); 
$soporte2 = new Juego("The Last of Us Part II", 49.99, 26, "PS4", 1, 
1); 
$soporte3 = new Dvd("Origen", 15, 24, "es,en,fr", "16:9"); 
$soporte4 = new Dvd("El Imperio Contraataca", 3, 4, "es,en","16:9"); 

echo "<br>";

//alquilo algunos soportes 
$cliente1->alquilar($soporte1); 
echo "<br>";
$cliente1->alquilar($soporte2); 
echo "<br>";
$cliente1->alquilar($soporte3);
echo "<br>";
echo "<br>";


// voy a intentar alquilar de nuevo un soporte que ya tiene alquilado
$cliente1->alquilar($soporte1); 
echo "<br>";
//el cliente tiene 3 soportes en alquiler como máximo 
//este soporte no lo va a poder alquilar 
$cliente1->alquilar($soporte4); 
echo "<br>";
//este soporte no lo tiene alquilado 
$cliente1->devolver(4);
echo "<br>"; 
//devuelvo un soporte que sí que tiene alquilado 
$cliente1->devolver(2); 
echo "<br>";
//alquilo otro soporte 
$cliente1->alquilar($soporte4);
echo "<br>"; 
//listo los elementos alquilados 
$cliente1->listarAlquileres(); 
echo "<br>";
//este cliente no tiene alquileres 
$cliente2->devolver(2);
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";

$vc = new Videoclub("Video Gaga"); 
//voy a incluir unos cuantos soportes de prueba 
$vc->incluirJuego("God of War", 19.99,1,"PS4", 1, 1); 
echo "<br>";
$vc->incluirJuego("The Last of Us Part II", 49.99, 2,"PS4", 1, 1); 
echo "<br>";
$vc->incluirDvd("Torrente", 4.5, 3,"es","16:9"); 
echo "<br>";
$vc->incluirDvd("Origen", 4.5, 4,"es,en,fr", "16:9"); 
echo "<br>";
$vc->incluirDvd("El Imperio Contraataca", 3, 5,"es,en","16:9"); 
echo "<br>";
$vc->incluirCintaVideo("Los cazafantasmas", 3.5, 6,107); 
echo "<br>";
$vc->incluirCintaVideo("El nombre de la Rosa", 1.5, 7,140); 
echo "<br>";
//listo los productos 
$vc->listarProductos();
echo "<br>";
echo "<br>";
echo "<br>";


// creamos algunos socios 
$vc->incluirSocio("Amancio Ortega",1); 
echo "<br>";
$vc->incluirSocio("Pablo Picasso", 2); 
echo "<br>";
$vc->alquilarSocioProducto(1,2); 
echo "<br>";
echo $vc->__tostring();
/* $vc->alquilarSocioProducto(1,3); 
echo "<br>";
// alquilo otra vez el soporte 2 al socio 1. 
// no debe dejarme porque ya lo tiene alquilado 
$vc->alquilarSocioProducto(1,2); 
echo "<br>";
// alquilo el soporte 6 al socio 1. 
// no se puede porque el socio 1 tiene 2 alquileres como máximo 
$vc->alquilarSocioProducto(1,6); 
echo "<br>";
// listo los socios 
$vc->listarSocios(); */