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

        <h2>Listado de Espacios</h2>
    <br>
    <div class="row">
        <div class="col-md-6">
        <table class="table table-bordered table-sm table-striped">
            <th><center>Nro</center></th>
            <th><center>Nro Espacio</center></th>
            <th><center>Accion</center></th>

        <?php 
        $contador = 0;
        $query_mapeos = $pdo->prepare("SELECT * FROM tb_mapeos WHERE estado = '1' ");
        $query_mapeos->execute();
        $mapeos = $query_mapeos->fetchAll(PDO::FETCH_ASSOC);
        foreach($mapeos as $mapeo){
            $id_map = $mapeo['id_map'];
            $nro_espacio = $mapeo['nro_espacio'];
            $contador = $contador + 1;

            ?>
             <tr>
            <td><center><?php echo $contador;?></center></td>
            <td><center><?php echo $nro_espacio;?></center></td>
            <td>
                <center>
                    <a href="delete.php?id=<?php echo $id_map;?>" class="btn btn-danger">Borrar</a>
                </center>
            </td>
        </tr>
        <?php

        }
        ?>
    </table>
        </div>
    </div>
    </div>
   
</div>
    <?php include('../layout/admin/footer.php');?>  

</div>
<?php include('../layout/admin/footer_link.php');?>

</body>
</html>