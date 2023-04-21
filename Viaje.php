<?php

class Viaje {

    // La empresa de Transporte de Pasajeros “Viaje Feliz” quiere registrar la información
    // referente a sus viajes. De cada viaje se precisa almacenar el código del mismo, destino,
    // cantidad máxima de pasajeros y los pasajeros del viaje.
    // Realice la implementación de la clase Viaje e implemente los métodos necesarios para modificar
    // los atributos de dicha clase (incluso los datos de los pasajeros). 
    // Utilice un array que almacene la información correspondiente a los pasajeros. 
    // Cada pasajero es un array asociativo con las claves “nombre”, “apellido” y “numero de documento”.
    
    private $codigo;
    private $destino;
    private $cantMaxPasajeros;
    private $listaPasajeros;
    private $objResponsable;

    public function __construct($codigo, $destino, $cantMaxPasajeros, $listaPasajeros, $objResponsable){
        $this->codigo = $codigo;
        $this->destino = $destino;
        $this->cantMaxPasajeros = $cantMaxPasajeros;
        $this->listaPasajeros = $listaPasajeros;
        $this->objResponsable = $objResponsable;
    }

    // SETTERS
    public function setCodigo($codigo){
        $this->codigo = $codigo;
    }
    public function setDestino($destino){
        $this->destino = $destino;
    }
    public function setCantMaxPasajeros($cantMaxPasajeros){
        $this->cantMaxPasajeros = $cantMaxPasajeros;
    }
    public function setListaPasajeros($listaPasajeros){
        $this->listaPasajeros = $listaPasajeros;
    }
    public function setobjResponsable($objResponsable){
        $this->objResponsable = $objResponsable;
    }

    // GETTERS
    public function getCodigo(){
        return $this->codigo;
    }
    public function getDestino(){
        return $this->destino;
    }
    public function getCantMaxPasajeros(){
        return $this->cantMaxPasajeros;
    }
    public function getListaPasajeros(){
        return $this->listaPasajeros;
    }
    public function getobjResponsable(){
        return $this->objResponsable;
    }

    public function __toString(){
        return "Codigo de Viaje: " . $this->getCodigo() . "\n".
               "Destino: " . $this->getDestino() . "\n".
               "Cantidad Maxima de Pasajeros: " . $this->getCantMaxPasajeros() . "\n".
               "Lista de Pasajeros: ". $this->hacerListaPasajeros(). "\n". 
               "Lista de Responsables: ". $this->hacerListaResponsables(); ;
    }
  
    // METODO QUE REGISTRA PASAJERO 
    // LO REGISTRA SI NO SE ENCUENTRA EN LISTADO A LA PERSONA

    public function registrarPasajero($nuevoPasajero){
        $cant = count($this->getListaPasajeros());
        $colPasajeros = $this->getListaPasajeros();
        $seEncuentra= false;
        $i = 0;
        while( $i < $cant && !$seEncuentra){
            if($nuevoPasajero->getDNI() == $colPasajeros[$i]->getDNI()){
                $seEncuentra = true;
            }
            $i++;
        }
        if(!$seEncuentra){
            array_push($colPasajeros, $nuevoPasajero);
            $this->setListaPasajeros($colPasajeros);
        }
    }

    /** METODO QUE CONVIERTE EL ARRAY DE PASAJEROS A STRING 
    */
    public function hacerListaPasajeros(){
        $colPasajeros = $this->getListaPasajeros();
        $listado = "";
        $cant = count($colPasajeros);
        
        for( $i=0 ;  $i<$cant  ; $i++ ){
            $pasajero = $colPasajeros[$i]->__toString() . "\n";
            $listado = $listado.$pasajero;
        }
        return $listado; 
    }

    // METODO REGISTRA RESPONSABLE 
    // LO REGISTRA SI NO SE ENCUENTRA EN LISTADO A LA PERSONA


    public function registrarResponsable($nuevoResponsable){
        $cant = count($this->getobjResponsable());
        $objResponsable = $this->getobjResponsable();
        $seEncuentra= false;
        $i = 0;
        while( $i < $cant && !$seEncuentra){
            if($nuevoResponsable->getnumLicencia() == $objResponsable[$i]->getnumLicencia()){
                $seEncuentra = true;
            }
            $i++;
        }
        if(!$seEncuentra){
            array_push($objResponsable, $nuevoResponsable);
            $this->setobjResponsable($objResponsable);
        }
    }

    /** METODO QUE CONVIERTE EL ARRAY DE PASAJEROS A STRING 
    */
    public function hacerListaResponsables(){
        $colResponsables = $this->getobjResponsable();
        $listado = "";
        $cant = count($this->getobjResponsable());
        
        for( $i=0 ;  $i<$cant  ; $i++ ){
            $responsable = $colResponsables[$i]->__toString() . "\n";
            $listado = $listado.$responsable;
        }
        return $listado; 
    }

}


?>