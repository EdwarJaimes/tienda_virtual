<?php

include_once 'repositorioUsuario.php';

class validarRegistro{

    private $nombre;
    private $email;
    private $password;

    private $errorNombre;
    private $errorEmail;
    private $errorPassword1;
    private $errorPassword2;

    public function __construct($nombre, $email, $password1, $password2, $conexion){
    $this->nombre = "";
    $this->email = "";
    $this->password;

    $this->errorNombre =$this->validarNombre($nombre, $conexion);
    $this->errorEmail =$this->validarEmail($email, $conexion);
    $this->errorPassword1 =$this->validarPassword1($password);
    $this->errorPassword2 =$this->validarPassword2($password1, $password2);
    
    if($this->errorPassword1==="" && $this->errorPassword2===""){
        $this->$password=$password1;
    }
}
    private function variableIniciada($variable){


        if(isset($variable)&& !empty($variable)){
            return true;
        }
        else{
            return false;
        }
    }
    private function validarNombre($nombre, $conexion){
        if(!$this->variableIniciada($nombre)){
            return "ingrese un usuario ,pofavor"
        }
        else{
            $this->nombre=$nombre;
        }
        if(strlen($nombre)<6){
            return "el nombre de usuario debe contener al menos seis catcteres";
        }
        if(strlen($nombre)>20){
            return "el nombre no deve exceder los 20 digitos";
        }
        if(repositorioUsiario::nombreExiste($conexion, $nombre)){
            return "el nombre ya esta en uso, elija uno nuevo";
        }
        return "";
    }
    private function validarEmail($email, $conexion){
        
        if($this->variableIniciada($email)){
            return "ingrese su correo";

        }
        else{
            $this->email=$email;
        }
        if(repositorioUsuario::emailExiste($conexion, $email)){
            return "el correo se encuentra en uso";
        }
        if(filter_var($email, FILTER_VALIDATE_EMAIL)==false){
            return "ingrese un correo valido";
        }
        return "";

    }
    private function validarPassword1($password){
        if(!$this->variableIniciada($password)){
            return "ingrese su cintraseña antes de continuar";
        }
        if(strlen($password)<6){
            return "la cintraseña no debeser menor a 6 digitos";
        }
        if($this->$nombre===$password){
            return "por seguridad su contraseña debe ser diferente al nombre usu";
        }
    }
    private function validarPassword2($password1, $password2){
        if(!$this->variableIniciada($password1)){
            return "ingrese primero su cntraseña";
        }
        if(!$this->variableIniciada($password2)){
            return "repita primero su cntraseña";
        }
        if($password1!==$password2){
            return "las contraseñas no son iguales";
        }
        return "";
    }
        public function obtenerNombre(){
            return $this->nombre;
            
        }
        public function obtenerEmail(){
            return $this->email;
            
        }
        public function obtenerPassword(){
            return $this->password;
            
        }
        //getters errores
        public function obtenerErrorNombre(){
            return $this->errorNombre;
            
        }
        public function obtenerErrorEmail(){
            return $this->errorEmail;
            
        }
        public function obtenerErrorPassword1(){
            return $this->errorPassword1;
            
        }
        public function obtenerErrorPassword2(){
            return $this->errorPassword2;
            
        }
    public function registroValido(){
        if($this->errorNombre==="" %% $this->errorEmail==="" && $this->obtenerErrorPassword1==="" && $this->obtenerErrorPassword2===""){
            return true;
        }
        else {
            return false;
        }
    }


}





?>