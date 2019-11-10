<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
  <!--codigo php una vez pulsado el boton del formulario-->
  <?php
    
    if(isset($_POST['enviar'])){
        
        //clase con varias operaciones con la BD
        require "operaciones.php";
        
        $nombre=$_POST["user"];
        $pass=$_POST["password"];
    
        try{
            
            $op = new Operaciones();
            
            //resultado del metodo que comprueba el login
            $resLogin=$op->conpruebaLogin($nombre,$pass);
            

            if($resLogin){

                session_start();

                $_SESSION["usuario"]=$_POST["user"];
                
                //redireccion a pagina principal de usuario rgostrado
                header ("location:userMain.php");

            
            }else{

                echo "incorrecto";

            }

        }catch(Exception $e){


            die("Error: ". $e->getMessage());
        }
  }
?>
   <!--formulario de inicio de sesion-->
   <div>
   <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
      <tr>
          <td>
              <label>usuario:<input type="text" name="user"/></label>
          </td>
      </tr>
      <tr>
          <td>
              <label>contraseña:<input type="password" name="password"/></label>
          </td>
      </tr>
      <tr>
          <td colspan="2">
              <input type="submit" name="enviar" value="inicia"/>
          </td>
      </tr>  
   </form>
    </div>
   
   
    
</body>
</html>