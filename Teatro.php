<?php
class Teatro
{
    // para los objetos teatro
    
    private $nombreTeatro ;
    private $direccion ;
    private $coleccionFuncion = array();
    
    
    public function __construct($nombreTeatro, $direccion, $coleccionFuncion)
    {
        // Metodo constructor de la clase Punto
        $this->nombreTeatro = $nombreTeatro;
        $this->direccion = $direccion;
        $this->coleccionFuncion = $coleccionFuncion;
    }
    // metodo de lectura atributos
    public function getnombreTeatro()
    {
        return $this->nombreTeatro;
    }
    public function getdireccion()
    {
        return $this->direccion;
    }

    public function getcoleccionFuncion()
    {
        return $this->coleccionFuncion;
    }
// metodo de escritura atributos
	public function setnombreTeatro($nombreTeatro)
	{
		$this->nombreTeatro = $nombreTeatro;
	}
	public function setdireccion($direccion)
	{
		$this->direccion = $direccion;
	}

	public function setcoleccionFuncion($coleccionFuncion)
	{
		$this->coleccionFuncion = $coleccionFuncion;
	}

	
	public function __toString()
	{
        $i=0;
        $coleccionFuncionStr="";
		foreach($this->coleccionFuncion as $indice)
            {
                foreach ($indice as $subindice)
                {
                    foreach ($subindice as $valor) {
                    $coleccionFuncionStr = $coleccionFuncionStr."/".$valor ."/";
                }
            }
             $i++;
        }
		return $this->getnombreTeatro()."\n".$this->getdireccion()."\n".
		"Funciones \n".$coleccionFuncionStr;
	}
	public function __destruct(){
		echo $this . " instancia destruida, no hay referencias a este objeto \n";
	}
	
}

?>