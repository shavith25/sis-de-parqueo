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
        <h2>Creacion de Nuevo Usuario</h2>

        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="card" style="border: 1px solid #606060;">
                        <div class="card-header" style="background-color: #007bff; color: #ffffff;">
                        <h4>Nuevo Usuario</h4>
                        </div>
                        <div class="card-body">
                            <div class="<div class="form-group">
                                <label for="m">Nombres</label>
                                <input id="nombres" class="form-control" type="text" name="">
                            </div>
                            <div class="<div class="form-group">
                                <label for="m">Email</label>
                                <input id="email" class="form-control" type="email" name="">
                            </div>
                            <div class="<div class="form-group">
                                <label for="m">Password</label>
                                <input id="password_user" class="form-control" type="password_user" name="">
                            </div>
                            <div class="<div class="form-group">
                                <br>
                                <button type="submit" class="btn btn-primary" id="btn_guardar">Guardar</button>
                                <a type="<?php echo $URL;?>/usuarios/" class="btn btn-default">Cancelar</a>
                            </div>
                            <div id="respuesta">
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6"></div>
            </div>
        </div>
    </div>
   
</div>
    <?php include('../layout/admin/footer.php');?>  

</div>
<?php include('../layout/admin/footer_link.php');?>

</body>
</html>

<script>
    $('#btn_guardar').click(function(){
        var nombres = $('#nombres').val();
        var email = $('#email').val();
        var password_user = $('#password_user').val();

        if(nombres == ""){
            alert('Debes de llenar este campo nombre');
            $('#nombres').focus();
        }else if(email == ""){
            alert('Debes de llenar este campo email');
            $('#email').focus();
        }else if(password_user == ""){
            alert('Debes de llenar este campo password_user');
            $('#password_user').focus();
        }else{
            var url = 'controller_create.php';
            $.get(url, {nombres:nombres, email:email, password_user:password_user}, function(datos){
                $('#respuesta').html(datos);
            });
        }
    });
</script>