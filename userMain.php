<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
   <?php
    
    session_start();
    
    if(!isset($_SESSION["usuario"])){
        
        header("location:login.php");
        
    }
    ?>
    
    <?php
    
     echo "hola ". $_SESSION["usuario"]."<br/>";
    
    ?>
   
    <h1>ZONA DE USUARIOS 1</h1>
    
    

</body>
</html>