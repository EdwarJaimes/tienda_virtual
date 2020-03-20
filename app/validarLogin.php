<?php

class validarLogin{

    private $usuario;
    private $error;
    public function __construct($email, $password, $conexion){

        $this->error = "";
        
        if(!$this->variable_iniciada($email) || !$this->variable_iniciada($password)){
            $this->usuario = null;
            $this->error = "sus datos ingresados son correctos";
        }
        else{
            $this->usuario = repositorioUsuario::obtenerUsuarioPorEmail($email, $conexion){

                if (is_null($this->$usuario) || !password_verify($password, $this->usuario->obtenerPassword
                ())){
                    $error = "datos incorrectos";
                }
            }

        }
    }
    private function variable_iniciada($variable){
        if(!isset($variable)&& empty($variable)){
            return false;
        }
        else{
            return true;
        }

    }
    public function obtenerUsuario(){
        return $this->usuario;

    }
    public function obtenerError(){
        return $this->error;
    }
}

?>

