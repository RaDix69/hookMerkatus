<?php
if (isset($_POST['boton'])) {
    include "../conexion/conexion.php";
    $id_producto=$_POST['id_producto'];
    $proveedor=$_POST['proveedor'];    
    $nombrep=$_POST['nombrep'];
    $id_categoria=$_POST['id_categoria'];
    $descripcion=$_POST['descripcion'];
    $precio=$_POST['precio'];
    $sql= mysqli_query($conexion,"UPDATE productos SET id_producto ='$id_producto', proveedor ='$proveedor', nombrep = '$nombrep', id_categoria = '$id_categoria', descripcion = '$descripcion', precio = '$precio'
    WHERE id_producto ='$id_producto'");
    
   
    header('location: ../consulta.php');

}
           
?>    