<?php    
include "conexion/conexion.php";

if(empty($_POST['producto']) || empty($_POST['descripcion']) || empty($_POST['precio'])){

    // echo "Digite todos los campos";
}else{
    $producto =$_POST['producto'];
    $proveedor =$_POST['proveedor'];
    $categoria =$_POST['categoria'];
    $descripcion =$_POST['descripcion'];
    $precio =$_POST['precio'];
    $imagena = $_FILES['imagen']['tmp_name'];
    $imagen = addslashes(file_get_contents($imagena));
    $tipoIma = $_FILES['imagen']['type'];
    if (!((strpos($tipoIma, "jpeg") || strpos($tipoIma, "jpg") || strpos($tipoIma, "png")))) {
        echo "<div id=msj style='color:#fff; font-size:30px; background:#000; padding:10px; position:absolute; top:92%; left:33.5%;'>ERROR, el archivo no es una imágen compatible</div>";
    }
    else{
        $query = "INSERT INTO productos (nombrep,proveedor,id_categoria,Descripcion,Precio,imagen) VALUES ('$producto','$proveedor','$categoria','$descripcion','$precio','$imagen')";
        $resultado = $conexion->query($query);
        header('location: consulta.php');
    }
    
   
}
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos/estiloIngresar.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Signika+Negative:wght@300&display=swap" rel="stylesheet">
    <title>Ingresar productos</title>
</head>
<body>
        <div class="contenedor">
        <section>
        <div class="formulario">
        <h1 class="titulo"> Datos Producto </h1>

        <form action="" method="POST" enctype="multipart/form-data" class="formulario">
        <h2>Ingrese los datos del producto</h2>
        <label for="" class="campos">Nombre del producto: </label>
        <div class="tooltip">
            <input class="entrada" type="text" name="producto" pattern="[A-Za-z0-9 ]{1,100}" title="Coloca solo letras, la primera en mayúscula" required="">
             <br><br><span class="tooltiptext">Coloca solo letras, nada de números o caracteres especiales</span>
        </div>
        <label for="" class="campos">Nombre del proveedor: </label>
        <div class="tooltip">
            <input class="entrada" type="text" name="proveedor" pattern="[A-Za-z0-9 ]{1,100}" title="Coloca solo letras, la primera en mayúscula" required="">
            <span class="tooltiptext">Coloca el nombre del proveedor</span> <br><br>
        </div>
        <label for="" class="campos">Categoria: </label>
        <select class="entrada" name="categoria" required="">
                  <option value="1200">Lacteos</option>
                  <option value="1201">Carnicos</option>
                                    </select><br> <br>
        <label for="" class="campos">Descripción: </label>
        <div class="tooltip">
            <input class="entrada" type="text" name="descripcion" pattern="[A-Za-z0-9 ]{1,100}" required="" minlength="10" maxlength="200"><br><br>
            <span class="tooltiptext">Pon una breve descripción menor a 200 caracteres</span>
        </div>
        <label for="" class="campos">Precio: </label>
        <div class="tooltip">
            <input  class="entrada" type="number" name="precio" required="" pattern="{3,100}"><br><br>
            <span class="tooltiptext">Coloca el precio del producto</span>
        </div>
        <label for="" class="campos">Imágen: </label>
        <div class="tooltip">
            <input class="entrada" type="file" name="imagen" required=""><br><br>
            <span class="tooltiptext">Sube la imágen del producto acá</span>
        </div>
        <center>
        <input class="boton" type="submit" name="guardar" value="Guardar">
        <br>
        <br>
        
        </form>
        </div>
            <button class="con"><a href="consulta.php">Consultar Productos</a></button>
        </center>
        </div>
    </section>

     <img class="monito" src="https://i.kym-cdn.com/photos/images/original/001/866/170/a79.gif" alt="" >
</body>
</html>
