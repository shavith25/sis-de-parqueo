<?php 

include ('../app/config.php');

$nombre = $_POST['nombre'];
$email = $_POST['email'];
$id_user = $_POST['id_user'];
$rol = $_POST['rol'];

date_default_timezone_set("America/Caracas");
$fechaHora = date('Y-m-d h:i:s');

$sentencia = $pdo->prepare("UPDATE tb_usuarios SET 
rol=:rol
WHERE id=:id");

$sentencia->bindParam(':rol', $rol);
$sentencia->bindParam(':id', $id_user);

if($sentencia->execute()){
    echo "Se asigno el rol de la manera correcta";
    //header('index.php');
    ?>
    <script>location.href = "../roles/asignar.php";</script>
    <?php
}else{
    echo "Error al asignar el rol al usuario";
}
?>

?>