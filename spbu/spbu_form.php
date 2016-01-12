<?php
/* CandralabGIS v 1.0
 * @author Candra adi putra 
 *  <candraadiputra@gmail.com>
 * http://www.candra.web.id
 * last edit: 27 Oktober 2013
 */
 
	include ('inc/config.php');
	$aksi = null;
	if(isset($_GET['id'])) {
		$aksi = "edit";
		$id = $_GET['id'];
		//baris dibawah ini disesuaikan dengan nama tabel dan idtabelnya
		$sql = "select * from spbu where idspbu='$id' ";
		$result = mysql_query($sql) or die(mysql_error());
		$data = mysql_fetch_object($result);

	} else {
		$aksi = "tambah";
	}?>

<style type="text/css">#map img {
		max-width: none;
	}
	#map label {
		width: auto;
		display: inline;
	}
	div#map {
		margin: 10px;
		width: 100%;
		height: 500px;
		float: left;
		padding: 10px;
	}
	
</style>

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
<div class="span4">
	
	<div id="map"></div>

</div>
	<!--kolom kiri-->
	<div class='span4'>
		<h2 style="margin-left: 30px"> Form SPBU</h2>
		
<form  class="form-horizontal" method="POST" id="form1"  enctype="multipart/form-data"
action="spbu/spbu_action.php">
	
		<?php		$id = $_GET['id'];?>
		<input type='hidden' name='id' value="<?php echo $id?>">
	
		<div class="control-group">
			<label class="control-label" for="nama">Nama</label>
			<div class="controls">
				<input type="text" name='nama' value='<?php echo $data->nama?>'class='required'
				>
			</div>
		</div>
	
		<div class="control-group">
			<label class="control-label" for="foto">Foto</label>
			<div class="controls">
				<input type="file" name='foto' 
				>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="nama">Alamat</label>
			<div class="controls">
				<textarea  name='alamat'><?php echo $data->alamat;?></textarea>
			</div>
		</div>
	

	
			<div class="control-group">
			<label class="control-label" for="idprovinsi">Propinsi</label>
			<div class="controls">
				<select id='idprovinsi' name='idprovinsi' class="required " >
					<?php
combo_provinsi(null);?>
				</select>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="idkabupaten">Kabupaten</label>
			<div class="controls">
				<select id='idkabupaten' name='idkabupaten' class="required " ></select>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="lat">latitude</label>
			<div class="controls">
				<input type="text" name='lat' id='lat' value='<?php echo $data->lat?>' class='required'
				>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="lon">Longitude</label>
			<div class="controls">
				<input type="text" name='lng' id='lng' value='<?php echo $data->lng?>' class='required'
				>
			</div>
		</div>


		<div class="control-group">
			<div class="controls">
				<button type="submit" class="btn btn-success" name='aksi'value='<?php echo $aksi?>'>
				<?php echo $aksi?>
				</button>
			</div>
		</div>
	</div>
</form>

<script src="assets/js/lokasi.js"></script>