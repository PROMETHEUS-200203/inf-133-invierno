<?php include_once("../../config/conexion.php"); ?>
            <table width="95%" border="0" cellpadding="0" cellspacing="0" align="center">
                <tr>
                    <td colspan="8"><h1>Registro Atencion</h1></td>
                </tr>
                <tr>
                    <td colspan="8" align="right">
                        <a href="../atencion/atencionNuevo.php" onclick="$(this).modal({width:450, height:500}).open(); return false;"><img src="../../resource/imagenes/iconos/page_add.png" height="25" border="0" />Nuevo cliente</a>
                    </td>
                </tr>               
                <tr>
                    <td class="tabla1" width="32">N&ordm;</td>
                    <td class="tabla1">ID ATENCION</td>
                    <td class="tabla1">ID CLIENTE</td>
                    <td class="tabla1">ID CORTE</td>
                    <td class="tabla1">FECHA DE CORTE</td>
					<td class="tabla1">ACUENTA</td>
                    <td class="tabla1">SALDO</td>
                    <td class="tabla1">TOTAL</td>
                    <td class="tabla1" width="32">&nbsp;</td>
                    <td class="tabla1" width="32">&nbsp;</td>
                </tr>
				<?php 
                $i=1;
				$query = "SELECT `idatencion`, `idcliente`, `idcorte`, `fechacorte`, `acuenta`, `saldo`, `total` FROM `atencion`";
                $result = mysqli_query($link, $query);
                while($row = mysqli_fetch_array($result))
                { 
                ?>
                <tr onmouseover="this.style.backgroundColor='#FFFF80'" onmouseout="this.style.backgroundColor='#FFFFFF'">
                    <td class="tabla2"><?php echo $i ?></td>
                    <td class="tabla2"><?php echo $row["idatencion"] ?></td>
                    <td class="tabla2"><?php echo $row["idcliente"] ?></td>
                    <td class="tabla2"><?php echo $row["idcorte"] ?> </td>
                    <td class="tabla2"><?php echo $row["fechacorte"] ?></td>
                    <td class="tabla2"><?php echo $row["acuenta"] ?></td>
                    <td class="tabla2"><?php echo $row["saldo"] ?></td>
                    <td class="tabla2"><?php echo $row["total"] ?></td>
                    <td class="tabla2">
                        <a href="../cliente/clienteModifica.php" onclick="$(this).modal({width:450, height:500}).open(); return false;"><img src="../../resource/imagenes/iconos/page_edit.png" height="25" border="0" />Modifica</a>
                    </td>
                    <td class="tabla2">
                        
                        <a href="../cliente/clienteElimina.php" onclick="$(this).modal({width:450, height:500}).open(); return false;"><img src="../../resource/imagenes/iconos/page_delete.png" height="25" border="0" />Elimina</a>
                    </td>
                </tr>

                <?php                     
                            $i++;
                } 

				?>
            </table>
            <script language="JavaScript" type="text/JavaScript">
                function Confirmar(URL,Msg) {
                    if (confirm(Msg))
                        document.location=URL;
                }
            </script>