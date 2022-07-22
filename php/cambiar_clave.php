<?php 

//$correo = $_SESSION['correo']; 
//var_dump($correo);
?>
<div class="container" id="cambiar_clave" style="display: none;">
  		<h2>Cambio de contrase&ntilde;a</h2>
  		<form class="form-group formulario" action="sql_cambiar_clave.php" method="post">
    		<div class="form-group">

         <input type="text" class="form-control"  name="correo" value="<?php echo $correo;?>" style="display: none;"></input>

      			<label for="email">Contrase&ntilde;a actual:</label>
      			<input type="password" class="form-control" id="clave_actual" placeholder="Ingrese la clave actual" name="clave_actual">
    		</div>
    		<div class="form-group">
      			<label for="pwd">Nueva contrase&ntilde;a:</label>
      			<input type="password" class="form-control" id="clave_nueva" placeholder="Ingrese la nueva clave" name="clave_nueva">
    		</div>
    		<div class="form-group">
      			<label for="pwd">Repita la nueva contrase&ntilde;a:</label>
      			<input type="password" class="form-control" id="clave_nueva_rep" placeholder="Repita la nueva clave" name="clave_nueva_rep">
    		</div>
		    
		    <button type="submit" class="btn btn-success">Cambiar contrase&ntilde;a</button>
  		</form>
	</div>