<?php
include 'Teatro.php';

/**  Carga la coleccion de Funciones para inicializar
*retur array @coleccionFuncion
*/
function cargarColeccionFuncion()
{
    $coleccionFuncion["FuncionUno"]=array(
        "nombreFuncion" => ["lo que el viento se llevo"],
        "precioFuncion"=>  [1050],
      );
  
    $coleccionFuncion["FuncionDos"]=array(
        "nombreFuncion" => ["metele que aprobas"],
        "precioFuncion"=>  [1500],
        );
    $coleccionFuncion["FuncionTres"]=array(
        "nombreFuncion" => ["Libre no esta bueno rendir"],
        "precioFuncion"=>  [950],
      );
    $coleccionFuncion["FuncionCuatro"]=array(
        "nombreFuncion" => ["La programcion no se sufre"],
        "precioFuncion"=>  [2000],
      );
  
    return $coleccionFuncion;
}
/** cambiar un funcion del teatro
 * @param array $coleccionFuncion
 * @param int $cambiarFuncion
 * return array $coleccionFuncion
 */
function cambiarFuncion($coleccionFuncion,$cambiarFuncion)
{
echo "ingrese el Nombre de la Funcion :";
$nombreFuncion =  trim(fgets(STDIN));
echo "Ingrese el Precio de la Funcion :";
$precioFuncion = trim(fgets(STDIN));
    if ($cambiarFuncion == 1) {
        echo "Cambiando funcoin 1: ";
        $coleccionFuncion["FuncionUno"]=array(
            "nombreFuncion" => [$nombreFuncion],
            "precioFuncion"=>  [$precioFuncion],
        );
    }else if ($cambiarFuncion == 2){
        $coleccionFuncion["FuncionDos"]=array(
            "nombreFuncion" => [$nombreFuncion],
            "precioFuncion"=>  [$precioFuncion],
        );
    }else if ($cambiarFuncion == 3){
        $coleccionFuncion["FuncionTres"]=array(
            "nombreFuncion" => [$nombreFuncion],
            "precioFuncion"=>  [$precioFuncion],
        );
    }else{
        $coleccionFuncion["FuncionCuatro"]=array(
            "nombreFuncion" => [$nombreFuncion],
            "precioFuncion"=>  [$precioFuncion],
        );
    }
return $coleccionFuncion;
}

//** Programa Principal
/* Crea un objeto Teatro
/* string $nombreTeatro , $direccion 
/* array $coleccionFuncion */

// inicializo variable
$nombreTeatro = "Vorterix";
$direccion = "Buenos Aires 1400 Neuquen";
$coleccionFuncion = cargarColeccionFuncion();

// se crea un objeto Teatro
$teatro = new Teatro ($nombreTeatro, $direccion, $coleccionFuncion);

do {
    echo "Nombre teatro :". $teatro->getnombreTeatro()."\n";
    echo "Direccion teatro :". $teatro->getdireccion()."\n";
    $coleccionFuncion = $teatro->getcoleccionFuncion();
    echo "num ** Nombre de la funcion / Precio \n";
    $i=1;
    foreach($coleccionFuncion as $indice)
    {
        echo " ".$i."  ** ";
        foreach ($indice as $subindice) {
                
            foreach ($subindice as $valor) {
                echo $valor ."/";
            }
            echo "-----";
        }
        echo " \n";
        $i++;
    }
    echo "--------------------------------------------------------------\n";
    echo "1) Cambiar el Nombre del Teatro. \n";
    echo "2) Cambiar la direccion del Teatro. \n";
    echo "3) Modificar la funcion. \n";
    echo "0) Salir. \n";
    echo "--------------------------------------------------------------\n";

    // Ingreso y lectura de la opcion
    echo "Ingrese una opcion: ";
    $opcion = (int) trim(fgets(STDIN));
    switch ($opcion) {
        case 0:
            $teatro ->__destruct();
            echo "Gracias \n";
            break;
        case 1:
            echo "ingrese el nombre del treatro ";
            $nombreTeatro = trim(fgets(STDIN));
            $teatro->setnombreTeatro($nombreTeatro);
            break;
        case 2:
            echo "ingrese la direccion del treatro ";
            $direccion = trim(fgets(STDIN));
            $teatro->setdireccion($direccion);
            break;
        case 3:
            do{
                echo "Que funcion desea cambiar? (1,2,3,4)";
                $cambiarFuncion = (trim(fgets(STDIN)));
                //Verificamos que ingrese numeros y que sea entre 1 y 4
                if(is_numeric($cambiarFuncion)&& $cambiarFuncion>0 && $cambiarFuncion <5){
                    $opcionValida = true;
                    $coleccionFuncion = cambiarFuncion($coleccionFuncion,$cambiarFuncion);
                    $teatro->setcoleccionFuncion($coleccionFuncion);
                }else{
                    echo "Debe ingresar una opcion valida \n";
                    $opcionValida = false;
                }
            }while(!$opcionValida);         
            break;    
    }
} while ($opcion != 0);

?>