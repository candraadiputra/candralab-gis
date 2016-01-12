<?php
/* CandralabGIS v 1.0
 * @author Candra adi putra 
 *  <candraadiputra@gmail.com>
 * http://www.candra.web.id
 * last edit: 27 Oktober 2013
 */
 ?>
 <div class='well'>
 <script type="text/javascript">$(document).ready(function() {
		$("#idprovinsi").change(function() {
			var idprovinsi = $("#idprovinsi").val();
			$.ajax({
				url : "inc/get_kabupaten.php",
				data : "idprovinsi=" + idprovinsi,
				success : function(data) {
					// jika data sukses diambil dari server, tampilkan di <select id=kota>
					$("#idkabupaten").html(data);
				}
			});
		});
	});
</script>
 <form method='POST' action="index.php">
 <div class="control-group">
			<label class="control-label" for="idprovinsi">Propinsi</label>
			<div class="controls">
				<select id='idprovinsi' name='idprovinsi' class="required " >
					<?php
combo_provinsi(null);?>
				</select>
			</div>
		</div>
		<div class="controls">
				<select id='idkabupaten' name='idkabupaten' class="required " ></select>
			</div>
 <div class="control-group">
	
<label class="checkbox">
  <input type="checkbox" name='poi[]'value="polisi">
 Polisi
</label>
<label class="checkbox">
  <input type="checkbox"  name='poi[]'  value="spbu">
SPBU
</label>
<label class="checkbox">
  <input type="checkbox" name='poi[]'  value="rumahsakit">
  Rumah sakit
</label>

			</div>
		
		<div class="control-group">
			<div class="controls">
				<button type="submit" class="btn btn-success" name='aksi' >
			 Lihat
				</button>
			</div>
		</div>
</form>
</div>

 