<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Titulo de la app en plantilla php</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Aqui el favicon -->
  <link rel="icon" href="vistas/img/plantilla/icono-negro.png">

  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="vistas/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="vistas/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="vistas/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="vistas/dist/css/AdminLTE.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="vistas/dist/css/skins/_all-skins.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="vistas/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="vistas/bower_components/datatables.net-bs/css/responsive.bootstrap.min.css">

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  
  <!-- iCheck for checkboxes and radio inputs
  <link rel="stylesheet" href="vistas/plugins/iCheck/all.css">
   -->


<!-- Estos plugins de Javascript estaban al final pero los movimos aqui-->
<!-- jQuery 3 -->
<script src="vistas/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="vistas/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="vistas/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="vistas/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="vistas/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="vistas/dist/js/demo.js"></script>
<!-- DataTables -->
<script src="vistas/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="vistas/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="vistas/bower_components/datatables.net-bs/js/dataTables.responsive.min.js"></script>
<script src="vistas/bower_components/datatables.net-bs/js/responsive.bootstrap.min.js"></script>
<!-- SWEET ALERT 2 -->
<script src="vistas/plugins/sweetalert2/sweetalert2.all.js"></script>
</head>

<!-- iCheck 1.0.1 
<script src="vistas/plugins/iCheck/icheck.min.js"></script>

  -->
<body class="hold-transition skin-blue sidebar-collapse sidebar-mini login-page">
<!-- Site wrapper -->


   <!-- =============================================== -->
  <!-- Left side column. contains the sidebar -->
  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
 <?php

//validacion de sesion iniciada
if (isset($_SESSION["iniciarSesion"]) && $_SESSION["iniciarSesion"] == "ok"){


 echo '<div class="wrapper">';
 /*==================================
 =            ENCABEZADO            = 
 ==================================*/
  include "modulos/cabezote.php";
 
 
 /*=====  End of ENCABEZADO  ======*/
 
 /*====================================
 =            Menu Lateral            =
 ====================================*/
 
 include "modulos/menu.php";

 /*=====  End of Menu Lateral  ======*/
 /*=================================================
 =            Contenido de las ventanas            =
Lo primero es para poder manejar las URL amigables
Es una lista blanca, cuando creemos alguna pagina nueva aqui es donde hayq ue agregarla
 =================================================*/
 
if(isset($_GET["ruta"])){
  if($_GET["ruta"] == "inicio" ||
     $_GET["ruta"] == "usuarios" ||
     $_GET["ruta"] == "categorias" ||
     $_GET["ruta"] == "productos" ||
     $_GET["ruta"] == "clientes" ||
     $_GET["ruta"] == "ventas" ||
     $_GET["ruta"] == "crear-venta" ||
     $_GET["ruta"] == "reportes"||
     $_GET["ruta"] == "salir"){
    include "modulos/".$_GET["ruta"].".php";
  }else{
    include "modulos/404.php";
  }
}else{
  include "modulos/inicio.php";
}


 
 /*=====  End of Contenido de las ventanas  ======*/
 /*==============================
 =            Footer            =
 ==============================*/
 
 include "modulos/footer.php";
 
 
 /*=====  End of Footer  ======*/
 echo '</div>'; //div del wrapper

}else{ //condicion de session iniciada
  include "modulos/login.php";
} //condicion de session iniciada
?>

<!-- AQUI VAN LOS INCLUDES DE LOS JS-->
<script src="vistas/js/plantilla.js"></script>
<script src="vistas/js/usuarios.js"></script>
<script src="vistas/js/categorias.js"></script>
<script src="vistas/js/productos.js"></script>
</body>
</html>
