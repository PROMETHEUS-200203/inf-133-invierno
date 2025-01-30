<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<?php
include("../../Config/conexion.php"); 
if(isset($OPERATOR)&&($OPERATOR=='_REGISTRAR_'))
{
	// *************************************************************
	// cliente
	// *************************************************
	INSERT INTO `atencion`(`idatencion`, `idcliente`, `idcorte`, `fechacorte`, `acuenta`, `saldo`, `total`) VALUES ('".$idate."','".$idcli."','".$idcor."','".$fecha."','".$acu."','".$sal."','".$to."');
	$Res = mysqli_query($link, $RegCliente);
	//echo $Registro;
	// *************************************************************
	
	?>
	<script type="text/javascript">
		parent.self.location.href='../xframe/frameAtencion.php';
		parent.$.modal().close();
	</script>
	<?php
}
?>
<link rel="stylesheet" type="text/css" href="../../Resource/Css/stylePopup.css" />
<script type="text/javascript">
<!--
function Validar(f,op){
	if( op == '_REGISTRAR_'){
		document.getElementById("OPERATOR").value = op;
		f.submit();
	}	
}
//-->
</script>
</head>
<body>
<div id="contenedorPopup">
	<h1 class="titulo1">Registro de Atencion</h1>
	<form name="form1" method="POST" action="" >
		<fieldset>
			<legend>DATOS PERSONALES</legend>
			<div class="filaDiv">
				<label for="idatencion">idatencion</label>
				<input type="text" name="idate" id="idate" placeholder="" autocomplete="off" />
			</div>
			<div class="filaDiv">
				<label for="idcliente">idcliente</label>
				<input type="text" name="idcli" id="idcli"  placeholder="" autocomplete="off" />
			</div>
			<div class="filaDiv">
				<label for="idcorte">idcorte</label>
				<input type="text" name="idcor" id="idcor"  placeholder="" autocomplete="off" />
			</div>
			<div class="filaDiv">
				<label for="fechacorte">Fecha de Corte</label>
				<input type="text" name="fecha" id="fecha"  placeholder="" autocomplete="off" />
			</div>
			<div class="filaDiv">
				<label for="acuenta">acuenta</label>
				<input type="date" name="acu" id="acu"  placeholder="" autocomplete="off" />
			</div>
			<div class="filaDiv">
				<label for="saldo">saldo</label>
				<input type="text" name="sal" id="sal"  placeholder="" autocomplete="off" />
			</div>
            <div class="filaDiv">
				<label for="total">total</label>
				<input type="text" name="to" id="to"  placeholder="" autocomplete="off" />
			</div>
		</fieldset>
		<div id="cssboton">
			<a class="a_demo_four" href="javascript:void(0);" onClick="Validar(document.form1,'_REGISTRAR_')"><img src="../../Resource/Iconos/save_32.png" style="margin: 0 5px -12px 0; border:none;">Guardar</a>	
			<a class="a_demo_four" href="javascript:void(0);" onclick="parent.$.modal().close()"><img src="../../Resource/Iconos/close_32.png" style="margin: 0 5px -12px 0; border:none;">Cerrar</a>
		</div>
		<input  name="OPERATOR" id="OPERATOR" type="hidden" value="" />
	</form>
</div>
</body>
</html>