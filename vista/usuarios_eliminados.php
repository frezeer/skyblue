<?php require_once'../seguridad/seguridad.php';
require_once("../modelo/ModCon.php");
extract($_GET);
$modelo=new ModCon();
$conexion=$modelo->conectar();

$nivel=$_SESSION["nivel"];
if ($nivel==1) {
 if (isset($_GET['rss_cat'])) {
  $variable=$_GET['rss_cat'];
   $conexion->query("INSERT INTO categorias(categoria) VALUES ('$variable')");
}
 }

 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="author" content="Anthony Araujo">
    <link rel="icon" href="../../favicon.ico">

    <title>.:Operaciones SkyBlue:.</title>

    <!-- Bootstrap core CSS -->
    <link href="../Bootstrap/css/bootstrap.css" rel="stylesheet">
     <link href="../css/MyStyle.css" rel="stylesheet">

      <link rel="stylesheet" type="text/css" href="../css/calendario.css">
  <script type="text/javascript" src="../js/jquery.js"></script>
  <script type="text/javascript" src="../js/ajax_emp_eliminado.js"></script>


  </head>
 <body onload="mueveReloj()">

      <nav class="navbar navbar-inverse navbar-fixed-top" id="contenedornavbar">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href=""><img id="logotipo"src="../img/logo.png" alt=""></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
              <li class="active"><a href="venta.php"><span class="glyphicon glyphicon-blackboard" aria-hidden="true"></span>&nbsp;&nbsp;Venta</a></li>
 <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span> &nbsp;Registro <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a  id="HoverSubmenus" href="registro_producto.php"><span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span>&nbsp;&nbsp;Producto</a></li>
                <li><a  id="HoverSubmenus" href="registro_empleado.php"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>&nbsp;&nbsp;Empleado</a></li>
                
                <li><button  id="Hoverbtn" data-toggle="modal" data-target="#categoriaMenu"><span class="glyphicon glyphicon-link" aria-hidden="true"></span>&nbsp;&nbsp;Nueva Categoria</button></li>
                <li class="divider"></li>
                <li class="dropdown-header">Otros Registros</li>
              <li><button  id="Hoverbtn" data-toggle="modal" data-target="#NuevoCliente"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>&nbsp;&nbsp;Nuevo Cliente</button></li>
                <li><a  id="HoverSubmenus" href="#">One more separated link</a></li>
              </ul>
            </li>
           <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span>&nbsp;Operaciones <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a  id="HoverSubmenus" href="Buscar_producto.php"><span class="glyphicon glyphicon-list" aria-hidden="true"></span>&nbsp;&nbsp;Buscar Producto</a></li>
                  <li><a  id="HoverSubmenus" href="Buscar_cliente.php"><span class="glyphicon glyphicon-king" aria-hidden="true"></span>&nbsp;&nbsp;Buscar Cliente</a></li>
                 <li><a  id="HoverSubmenus" href="buscar_usuario.php"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>&nbsp;&nbsp;Buscar Usuario</a></li>
                
                
                 <li><a  id="HoverSubmenus" href="facturas.php"><span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span>&nbsp;&nbsp;Facturas Registradas</a></li>
             
                <li class="divider"></li>
                <li class="dropdown-header">Otras Operaciones</li>
                 <li><a  id="HoverSubmenus" href="usuarios_eliminados.php"><span class="glyphicon glyphicon-floppy-remove" aria-hidden="true"></span>&nbsp;&nbsp;Usuarios Eliminados</a></li>
                <li><a  id="HoverSubmenus" href="reportes_venta.php"><span class="glyphicon glyphicon-save-file" aria-hidden="true"></span>&nbsp;&nbsp;Reportes De ventas</a></li>
              
                <li><a  id="HoverSubmenus" href="sistema_apartado.php"><span class="glyphicon glyphicon-credit-card" aria-hidden="true"></span>&nbsp;&nbsp;Sistema de Apartado</a></li>
              </ul>
            </li>
           
          </ul>
<div class="btn-group navbar-form navbar-right" >
<?php 
$log=$_SESSION['id'];
$user=$conexion->query("SELECT t1.id_usuario,t2.id_empleado, t2.nombres,t2.apellidos as apellidos
FROM usuarios t1
RIGHT Join empleados t2  ON t1.id_empleado=t2.id_empleado
WHERE t1.id_empleado='$log'");
$usr=$user->fetch_array();

 ?>
<label  id="log" class="navbar-left"><b><?php echo "<span class='glyphicon glyphicon-user' aria-hidden='true'></span>&nbsp;". $usr['nombres']."&nbsp;".$usr['apellidos']."&nbsp;";?></b></label>


  <button id="btnConfi" type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
   <img src="../img/confi2.png" width="30" alt="">
  </button>
  <ul class="dropdown-menu" role="menu">
  <!--/.tipo de usuario -->
      <li id="tipo"><aid="tipo" ><span class="glyphicon glyphicon-tent" aria-hidden="true"></span>
       <?php
 if ($nivel==1) {
   echo "Administrador";
 }else echo "Empleado";
?>

      </a></li>
    <li><a id="HoverSubmenus" href="#"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> &nbsp;Perfil</a></li>
    <li><a id="HoverSubmenus" id="HoverSubmenus" href="#"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> &nbsp;Configuracion</a></li>
    <li><a id="HoverSubmenus" href="#"><span class="glyphicon glyphicon-save-file" aria-hidden="true"></span> &nbsp;Reporte Personal</a></li>
    <li class="divider"></li>
    <li><a id="HoverSubmenus"href="../index.php?Sc"><span class="glyphicon glyphicon-off" aria-hidden="true"></span> &nbsp;Salir del sistema</a></li>
  </ul>
</div>

        </div><!--/.nav-collapse -->
      </div>
     
      <article id="navbar3">
       <button type="button" class="btn btn-default btn2" id="btn0"aria-label="Left Align">
 <img src="../img/fact.png" width="40" alt="">

<button type="button" class="btn btn-default btn2" id="btn1"aria-label="Left Align">
  <span class="glyphicon glyphicon-blackboard" aria-hidden="true"></span>
</button>
<button type="button" class="btn btn-default btn2" id="btn2"aria-label="Left Align">
  <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
</button>
<button type="button" class="btn btn-default btn2" id="btn2"aria-label="Left Align">
  <span class="glyphicon glyphicon glyphicon-usd" aria-hidden="true"></span>
</button>

<button type="button" class="btn btn-default btn2 btn3" id="btn3"aria-label="Left Align">
  <span class="glyphicon glyphicon-piggy-bank" aria-hidden="true"></span>
</button>



</article>
  
    </nav>
 <div id="panel" class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading">
<table border="0" width="100%" align="center">
  <tr>
   
   <td> <div class="form-group-lg ">

   <input type="text"class= "form-control" placeholder="Buscar Usuario Por Filtro" id="filtrar"/>
      
   
   </div> </td>
 
 <td width="235"> <div class="btn-group" role="group" aria-label="...">
  <button type="button" id="btnAzulCielo" disabled class="btn btn-info"><b><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>&nbsp;
  <?php $fecha=date("d/m/Y");
echo $fecha;
  ?></b></button>
  <button type="button" id="btnAzulCielo"disabled class="btn btn-info">
  <form name="form_reloj">
  &nbsp;<span class="glyphicon glyphicon-dashboard"></span>
<input type="text"disabled class="tamano"  id="reloj"name="reloj" size="10">
</form></button>

</div>
</td><th width="85">
     
  <a href="registro_empleado.php" class="btn btn-primary dropdown-toggle">
      <span class="glyphicon glyphicon-plus"></span>&nbsp;Nuevo
  </a>
  

 
        </th>
     <td width="150"> <button type="button"data-toggle="modal" data-target="#FinalizarVenta"  id="btnFinVenta"disabled class="btn btn-danger"> <span class="glyphicon glyphicon-print" aria-hidden="true"></span> Exportar Busqueda a PDF</button></td>
  </tr>
</table>
  </div>
  <div class="panel-body">
  <div class="container-fuid">
  <div class="row">
<div class="col-xs-12 ">
<?php if (isset($_GET['errno_User'])) { ?>
<div class="alert alert-warning alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>¡Atención!</strong> No Posees los Privilegios Para ejecutar la opcion Seleccionada!...
</div>
<?php } ?>  
<?php if (isset($_GET['MOD_sf'])) { ?>
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
   <strong>¡EXITO!</strong> El Usuario Ha sido Modificado Correctamente!...</div>
<?php } ?> 

<?php if (isset($_GET['MOD_status'])) { ?>
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
   <strong>¡EXITO!</strong> Se le Ah cambiado El status Al Usuario, <strong>NOTA: "Dependiendo el status que este tenga Podra iniciar seccion" !...</strong></div>
<?php } ?> 

<?php if (isset($_GET['CI'])) { ?>
<div class="alert alert-warning alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong><span class="glyphicon glyphicon-hand-right"></span>&nbsp;¡Atención!&nbsp;<span class="glyphicon glyphicon-hand-left"></span></strong> Ya Se Encuentra Registrada la Cedula que intentas Registrar!...
</div>
<?php } ?>  


<center>
  <?php 
$sql=$conexion->query("SELECT t1.id_empleado,t1.cedula,t1.nombres,t1.apellidos,t1.fecha_nac,t2.email_empleado,t3.telefono_empleado,t1.cargo,t1.status
FROM empleados t1 
LEFT JOIN email_empleado t2 ON t2.id_empleado=t1.id_empleado
LEFT JOIN tlf_empleado t3 ON t3.id_empleado=t1.id_empleado
where t1.status='eliminado'
 ORDER BY t1.nombres asc");
$num=$sql->num_rows;
if ($num>0) {



 ?> 
 <div  id="llenar_usuarios">
      <table  class="table table-striped table-condensed table-hover">
    <tr>
     <th class="headerT">ID</th>
    <th class="headerT">CEDULA</th>
    <th class="headerT">NOMBRES Y APELLIDOS</th>
   <th class="headerT">FECHA_NAC</th>
      <th class="headerT">EMAIL</th>
      <th class="headerT">TELEFONO</th>
    <th class="headerT">TIPO</th>
    <th class="headerT">STATUS</th>
     <th class="headerT" colspan="2">OPCIONES</th>
   
    </tr>

  <?php while ($fila=$sql->fetch_array()) { ?>
 <tr>
     <td><?php echo $fila[0] ?></td>
    <td><?php echo $fila[1] ?></td>
    <td><?php echo $fila[2]."&nbsp;".$fila[3] ?></td>
    <td><?php echo $fila[4] ?></td>
     <td><?php echo $fila[5] ?></td>
      <td><?php echo $fila[6] ?></td>
      <td><?php echo $fila[7] ?></td>
 <td><?php $status=$fila[8];
if ($status=="activo") {
 echo '  <button type="button" class="btn btn-success btn-xs"> <span class="glyphicon glyphicon-ok"></span>&nbsp;Activo</button>' ;
}else{ echo  '<button type="button" class="btn btn-danger btn-xs"> <span class="glyphicon glyphicon-remove"></span>&nbsp;Eliminado</button>';

} ?></td>
 <td id="table_operaciones"><?php echo '  <a href="ver_empleado.php?id='.$fila[0].'" id="bold" class="btn btn-default btn-xs"> <span class="glyphicon glyphicon-eye-open"></span>&nbsp;Ver</a>';?></td>
 
  <td id="table_operaciones"><?php echo  '<a  href="../controlador/Controlador.php?id='.$fila[0].'&status=activarEmp&StatusOperation_emp" class="btn btn-success btn-xs btn-block bold"> <span id="bold" class="glyphicon glyphicon-ok-sign"></span>&nbsp;Activar</a>'; ?></td>
</tr>
  <?php 
}

     ?>
    <tr>
      <?php }else{
  echo  " <center><h3>Aun no se han eliminado Usuarios</h3> </center>";
} ?>
    </tr>
  </table>




</div>
</center>
  <!-- Contenedor de ventas  -->
  </div>
</div>
</div>

  </div>


  <!-- Table -->
  <input type="hidden" id="cantidad" value="<?php echo $stock; ?>">
  <input type="hidden" id="activacion_pro" value="<?php echo $pro; ?>">
  <input type="hidden" id="active" value="<?php echo $lst; ?>">
 <script type="text/javascript">
 var FinalizarV=document.getElementById('act_FinalizarVenta');
var productoEncontrado=document.getElementById("activacion_pro");
var cedulaEncontrada=document.getElementById("active");
var finVenta=document.getElementById('btnFinVenta');
if (cedulaEncontrada.value==1) {
  document.getElementById("TxtCodPro").disabled=false;
   document.getElementById("buscarbtnpro").disabled=false;
    document.getElementById("TxtCodPro").focus();
}
if (productoEncontrado.value=="sf") {
  document.getElementById("TxtCant").disabled=false;
   document.getElementById("btnAgregar").disabled=false;
    document.getElementById("TxtCant").focus();
    document.getElementById("TxtCant").value="01";
}
if (FinalizarV.value=="Activation") {
finVenta.disabled=false;
};

 </script>
</div>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

    <script src="../Bootstrap/js/bootstrap-transition.js"></script>
    <script src="../Bootstrap/js/bootstrap-alert.js"></script>
    <script src="../Bootstrap/js/bootstrap-modal.js"></script>
    <script src="../Bootstrap/js/bootstrap-dropdown.js"></script>
    <script src="../Bootstrap/js/bootstrap-scrollspy.js"></script>
    <script src="../Bootstrap/js/bootstrap-tab.js"></script>
    <script src="../Bootstrap/js/bootstrap-tooltip.js"></script>
    <script src="../Bootstrap/js/bootstrap-popover.js"></script>
    <script src="../Bootstrap/js/bootstrap-button.js"></script>
    <script src="../Bootstrap/js/bootstrap-collapse.js"></script>
    <script src="../Bootstrap/js/bootstrap-carousel.js"></script>
    <script src="../Bootstrap/js/bootstrap-typeahead.js"></script>
    <script src="../js/validaciones.js"></script>
<!--/.Modal listar Producto 
*
*
*
*
*-->

<div class="modal fade" id="categoriaMenu" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><center><span class="glyphicon glyphicon-link" aria-hidden="true"></span> <b id="titulo_header"> Nueva categoria</b></center></h4>
      </div>
      <div class="modal-body">
     

<form class="form-horizontal" id="form_categoria">
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-3 control-label">Nombre_Categoria</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" name="rss_cat" required id="inputEmail3" placeholder="Defina una categoria" onkeyup="this.value=this.value.toUpperCase()">
    </div>
  </div>
 </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
         <button type="button" class="btn btn-primary" onclick="categoria()" data-dismiss="modal">Guardar</button>
        </form>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="NuevoCliente" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
     <center> <h4 class="modal-title" id="myModalLabel"> <img id="newuser"src="../img/nuevo_usuario.jpg" width="80px;"> <b id="titulo_r"> Registro De Clientes</b></h4></center>
      </div>
      <div class="modal-body">
    <form action="../controlador/Controlador.php" id="form_modal"class="form-inline">
    <table id="tabla_modal">
    <tr>
        <th><label for="Mcedula"><b id="asterisco">(*)</b>Tipo:</label>  </th>
        <td><select id="tipoN" name="tipo">
          <option value="">SELECCIONE</option>
            <option value="V-">N- NATURAL</option>
              <option value="J-">J- JURIDICO</option>
                <option value="E-">E- EXTRANJERO</option>
        </select></td>
      </tr>
      <tr>
        <th><label for="Mcedula"><b id="asterisco">(*)</b>Cedula:</label>  </th>
        <td><input type="text" name="cedula" maxlength="10" class="form-control" id="Mcedula" placeholder="123456789"></td>
      </tr>

      <tr>
        <th><label for="Mnombre"><b id="asterisco">(*)</b>Nombre:</label></th>
        <td><input type="text" name="nombre" maxlength="45" class="form-control" id="Mnombre" placeholder="example: Nombre Alguien" onkeyup="this.value=this.value.toUpperCase()"></td>
      </tr>

            <tr>
        <th><label for="Mapellido"><b id="asterisco">(*)</b>Apellido:</label></th>
        <td><input type="text" name="apellido" maxlength="45" class="form-control" id="Mapellido" placeholder="example Apellido Alguien" onkeyup="this.value=this.value.toUpperCase()"></td>
      </tr>
      <tr>
         <th><label for="Mapellido"><b id="asterisco">(*)</b>Nacionalidad:</label></th>
        <td><select name="nacionalidad" id="nacion">
        <option value="">SELECCIONE</option>
          <option >VENEZOLANO</option>
          <option >COLOMBIANO</option>
        </select>

      </tr>

            <tr>
        <th><label for="Mfecha"><b id="asterisco">(*)</b>Fecha_nac:</label></th>
        <td><input type="text" name="fecha_nac" class="form-control"  id="fecha1" placeholder="2010-09-30"></td>
      </tr>

            <tr>
        <th><label for="genero"><b id="asterisco">(*)</b> Genero:</label></th>
        <td><select name="genero" id="genero">
        <option value="">SELECCIONE</option>
          <option value="M">MASCULINO</option>
          <option value="F">FEMENINO</option>
        </select></td>
      </tr>
      
         <tr>
        <th><label for="Mtelefono">telefono</label></th>
        <td>
        <select name="codigoTlf" id="Stele">
          <option value="">SELECCIONE</option>
          <option value="58">Venezuela +58</option>
          <option value="43">Colombia</option>
        </select> 
    <input type="text" name="telefono" class="form-control" id="Mtelefono">
  
  </div></td>
      </tr>

           <tr>
        <th><label for="Mdireccion"><b id="asterisco">(*)</b> Direccion:</label></th>
        <td> <textarea rows="3" name="direccion" span="70" id="Mdireccion" maxlength="120" class="form-control" onkeyup="this.value=this.value.toUpperCase()"placeholder="::Maximo 150 Caracteres:."></textarea></td>
      </tr>
    </table>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary" onclick="Mregistrar()">Registrar Cliente</button>
        <input type="hidden" name="registrarCliente">
        </form>
      </div>
    </div>
  </div>
</div>

</div>



</body>
</html>
