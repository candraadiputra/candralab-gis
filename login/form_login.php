<?php
/* CandralabGIS v 1.0
 * @author Candra adi putra 
 *  <candraadiputra@gmail.com>
 * http://www.candra.web.id
 * last edit: 27 Oktober 2013
 */
?>

	<div class="span5  offset1 well">
			<form method="POST" id="form1" class="form-horizontal" action="login/login_action.php">
			
		
					<legend>
						Login 
					</legend>
			<div class="control-group">
		<label class="control-label" for="nama">username</label>
		<div class="controls">
			<input   type="text" name='username'>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="nama">Password</label>
		<div class="controls">
			<input   type="password" name='password'>
		</div>
	</div>
				
					<div class="row">
						<div class="span4 offset2">
						<input type="submit"  name="login" class="btn btn-primary" value='login'>
						
					</div>
					</div>
			
			</form>
			<script language="javaScript" type="text/javascript"
	xml:space="preserve">
	//You should create the validator only after the definition of the HTML form
	var f  = new Validator("form1");
	f.EnableOnPageErrorDisplaySingleBox();
	f.EnableMsgsTogether();
	

		f.addValidation("username","req","username Tidak Boleh kosong ");
		
			f.addValidation("password","req","password Tidak Boleh kosong ");
			
	
	
	</script>
	<div id="form1_errorloc" style="color:#ff0000">
		<?php 
		if(isset($_GET['s'])){
			echo "Login Gagal, cek kembali username dan password anda!";
		}
		?>
	</div>
</div>
	

