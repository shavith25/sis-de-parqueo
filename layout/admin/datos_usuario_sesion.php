<?php

session_start();
    if(isset($_SESSION['usuario_sesion'])){
        $usuario_sesion = $_SESSION['usuario_sesion'];

        $query_usuario_sesion = $pdo->prepare("SELECT * FROM tb_usuarios WHERE email = '$usuario_sesion' AND estado = '1' ");
        $query_usuario_sesion->execute();
        $usuarios_sesion = $query_usuario_sesion->fetchAll(PDO::FETCH_ASSOC);
        foreach($usuarios_sesion as $usuarios_sesion){
            $id_user_sesion = $usuarios_sesion['id'];
            $nombres_sesion = $usuarios_sesion['nombres'];
            $email_sesion = $usuarios_sesion['email'];
            $rol_sesion = $usuarios_sesion['rol'];
            }
    }else{
        echo "Para ingresar a esta plataforma debes de iniciar sesion";
    }
    
    //echo "Bienvenido Administrador";

?>