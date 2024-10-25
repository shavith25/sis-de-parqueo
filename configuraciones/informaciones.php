<?php
    include ('../app/config.php');
    include ('../layout/admin/datos_usuario_sesion.php');
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <?php include('../layout/admin/head.php');?>
</head>
<body class="hold-transition sidebar-mini">

<div class="wrapper">
    <?php include('../layout/admin/menu.php');?>

  <div class="content-wrapper">
    <br>
    <div class="container">

        <h2>Listado de Informaciones</h2>
    <br>
    <a href="create_informaciones.php" class="btn btn-primary">Registrar Nuevo</a><br><br>
    <table class="table table-bordered table-sm table-striped">
            <th><center>Nro</center></th>
            <th><center>Nombre del Parqueo</center></th>
            <th><center>Actividad de la Empresa</center></th>
            <th><center>Sucursal</center></th>
            <th><center>Direccion</center></th>
            <th><center>Zona</center></th>
            <th><center>Telefono</center></th>
            <th><center>Departamento_Ciudad</center></th>
            <th><center>Pais</center></th>
            <th><center>Accion</center></th>

        <?php 
        $contador = 0;
        $query_informacions = $pdo->prepare("SELECT * FROM tb_informaciones WHERE estado = '1' ");
        $query_informacions->execute();
        $informacions = $query_informacions->fetchAll(PDO::FETCH_ASSOC);
        foreach($informacions as $informacion){
            $id_informacion = $informacion['id_informacion'];
            $nombre_parqueo = $informacion['nombre_parqueo'];
            $actividad_empresa = $informacion['actividad_empresa'];
            $sucursal = $informacion['sucursal'];
            $direccion = $informacion['direccion'];
            $zona = $informacion['zona'];
            $telefono = $informacion['telefono'];
            $departamento_ciudad = $informacion['departamento_ciudad'];
            $pais = $informacion['pais'];
            $contador = $contador + 1;

            ?>
             <tr>
            <td><center><?php echo $contador;?></center></td>
            <td><center><?php echo $nombre_parqueo;?></center></td>
            <td><center><?php echo $actividad_empresa;?></center></td>
            <td><center><?php echo $sucursal;?></center></td>
            <td><center><?php echo $direccion;?></center></td>
            <td><center><?php echo $zona;?></center></td>
            <td><center><?php echo $telefono;?></center></td>
            <td><center><?php echo $departamento_ciudad;?></center></td>
            <td><center><?php echo $pais;?></center></td>
            <td>
                <center>
                    <a href="update_configuraciones.php?id=<?php echo $id_informacion;?>" class="btn btn-success">Editar</a>
                    <a href="delete_configuraciones.php?id=<?php echo $id_informacion;?>" class="btn btn-danger">Borrar</a>
                </center>
            </td>
        </tr>
        <?php

        }
        ?>
    </table>
    </div>
   
</div>
    <?php include('../layout/admin/footer.php');?>  

</div>
<?php include('../layout/admin/footer_link.php');?>

</body>
</html>