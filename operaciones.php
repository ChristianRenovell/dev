<?php

require ('Conexion.php');

class Operaciones extends Conexion { 
    
     
    
    public function Operaciones(){
        
        parent::__construct();
        
    }
    //metodo para comprobar el login
    public function conpruebaLogin($nombre,$password){
        
        $usuario=htmlentities(addslashes($nombre));
	
	    $pass=htmlentities(addslashes($password));
        
        $cont=0;
        
        $sql="SELECT pass FROM hash WHERE usuario=:login";

        
        $resultado=$this->conexion_db->prepare($sql);
        
        $resultado->execute(array(":login"=>$usuario));
        
        while($registro=$resultado->fetch(PDO::FETCH_ASSOC)){
            
        if(password_verify($pass,$registro['pass'])){ 
            
                $cont++;    
            
        }
        
        }
         if($cont>0){
            
            return true;
            
        }else{
            
            return false;
        }
        
        $resultado->closeCursor();
        
        $this->conexion_db=null;
  
    }
    
}

?>