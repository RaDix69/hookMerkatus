<?php 


$consulta= consultarPersona($_GET['id']);

function consultarPersona($id){
    include 'conexion/conexion.php';
    $sentencia="SELECT * FROM productos WHERE id_producto='".$id."'";
    $resultado=$conexion->query($sentencia) or die ("Error de conexion".mysqli_error($conexion));
    $fila=$resultado->fetch_assoc();
return[
    $fila['id_producto'],
    $fila['proveedor'],
    $fila['nombrep'],
    $fila['id_categoria'],
    $fila['descripcion'],
    $fila['precio'],
];
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos/estiloActualizar.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Signika+Negative:wght@300&display=swap" rel="stylesheet">
    <title>Actualizar Datos Productos</title>
    <!-- <link rel="stylesheet" href="./estilos/estiloActualizar.css"> -->
</head>
<body>
    <div class="contenedor">
    <section>
    <div class="formulario">
    <form action="controlador/controlmodificar.php" method="post" class="formulario">
    <div class="linea">
    <h1>Actualizar datos del Producto</h1>
    <label for="">Id_producto: </label>
   
    <input required="" class="entrada" type="text" name="id_producto" id="id_producto" class="form-control" value="<?php echo $consulta[0]?>" style="display:none;">
    <input required="" class="entrada" type="text" name="id_producto2" id="id_producto2" class="form-control" value="<?php echo $consulta[0]?>" disabled>
    <br><br>
  
    
    <label for="">Proveedor: </label>   

   <input required="" class="entrada" type="text" name="proveedor" id="proveedor" class="form-control" pattern="[A-Za-z0-9 ]{1,100}" value="<?php echo $consulta[1]?>">
    <br><br>

    
    <label for="">Nombre producto: </label>    
    
   <input required="" class="entrada" type="text" name="nombrep" id="nombrep" class="form-control" pattern="[A-Za-z0-9 ]{1,100}" value="<?php echo $consulta[2]?>">
    <br><br>

    
    <label for="">Id_categoria: </label>    

    <input required="" class="entrada" type="number" name="id_categoria" id="id_categoria" class="form-control" value="<?php echo $consulta[3]?>" style="display:none;">
    <input required="" class="entrada" type="number" name="id_categoria2" id="id_categoria2" class="form-control" value="<?php echo $consulta[3]?>" disabled >
    <br><br>

    
    <label for="">Descripcion: </label>   

  <input required="" class="entrada" name="descripcion" id="descripcion" class="form-control" pattern="[A-Za-z0-9 ]{1,100}" minlength="10" maxlength="200" value="<?php echo $consulta[4]?>">
    <br><br>

    
    <label for="">Precio: </label>    
    
    <input required="" class="entrada" type="number" name="precio" id="precio" class="form-control" value="<?php echo $consulta[5]?>">
    <br><br>
    <center>
    <input type="submit" name="boton" value="Actualizar Producto" class="boton" >
   <br><br>
    </form>
    
            </div>
    <button class="con"><a href="consulta.php">Regresar</a></button>
    </center>
        </section>

    </div>
    
    
    </div> 
</div>    
</body>
<?php 
?>
</html>
