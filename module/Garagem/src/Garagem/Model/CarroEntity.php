<?php
namespace Garagem\Model;

class CarroEntity{
    protected $id;
    protected $marca;
    protected $modelo;
    protected $motor;
    
    public function __construct()
    {
        $this->motor = 1.0;
    }
    
    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

 public function getMarca()
    {
        return $this->marca;
    }

    public function getModelo()
    {
        return $this->modelo;
    }

    public function getMotor()
    {
        return $this->motor;
    }

    public function setMarca($marca)
    {
        $this->marca = $marca;
    }

    public function setModelo($modelo)
    {
        $this->modelo = $modelo;
    }

    public function setMotor($motor)
    {
        $this->motor = $motor;
    }

    
    
}