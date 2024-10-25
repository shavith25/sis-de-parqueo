<?php 

include ('../app/config.php');

$id_informacion = $_GET['id_informacion'];
$estado_inactivo = "0";

date_default_timezone_set("America/Caracas");
$fechaHora = date('Y-m-d h:i:s');

$sentencia = $pdo->prepare("UPDATE tb_informaciones SET 
estado=:estado,
fyh_eliminacion=:fyh_eliminacion
WHERE id_informacion=:id_informacion");

$sentencia->bindParam(':estado', $estado_inactivo);
$sentencia->bindParam(':fyh_eliminacion', $fechaHora);
$sentencia->bindParam(':id_informacion', $id_informacion);

if($sentencia->execute()){
    echo "Se elimino el registro de manera correcta";
    //header('index.php');
    ?>
    <script>location.href = "informaciones.php";</script>
    <?php
}else{
    echo "Error al eliminar el registro";
}
?>