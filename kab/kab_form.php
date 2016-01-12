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
		$sql = "select * from kabupaten where idkabupaten='$id' ";
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
		height: 300px;
		float: left;
		padding: 10px;
	}
	
</style>
<div class="span8">
	
	<div id="map"></div>

</div>
	<!--kolom kiri-->		
	<div class='span8'>	
<form  class="form-horizontal" method="POST" id="form1"  
action="kab/kab_action.php">
		 <legend>Data Kabupaten</legend>
		<?php		$id = $_GET['id'];?>
		<input type='hidden' name='id' value="<?php echo $id?>">
	 <div class="control-group">
     <label class="control-label" for="nama">Provinsi</label>
    <div class="controls">
   <select name='idprovinsi'id='idprovinsi' class="required">
   	<?php
   	combo_provinsi2(null);?>
   	?>
   </select>
    </div>
  </div>
	
		<div class="control-group">
			<label class="control-label" for="nama">Nama</label>
			<div class="controls">
				<input type="text" name='nama' value='<?php echo $data->nama?>'class='required'
				>
			</div>
		</div>
		 <legend>Lokasi Peta</legend>
		<div class="control-group">
			<label class="control-label" for="lat"> Latitude</label>
			<div class="controls">
				<input type="text" name='lat' id='lat' value='<?php echo $data->lat?>' class='required '>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="lat"> Longitude</label>
			<div class="controls">
				<input type="text" name='lng' id='lng' value='<?php echo $data->lat?>' class='required'>
			</div>
		</div>

		

		<div class="control-group">
			<div class="controls">
				<button type="submit" class="btn btn-success" name='aksi'value='<?php echo $aksi?>'>
				<?php echo $aksi?>
				</button>
			</div>
		</div>


</form>

<script type="text/javascript">
function updateMarkerPosition(latLng) {
		document.getElementById('lat').value = [latLng.lat()];
		document.getElementById('lng').value = [latLng.lng()];
	}
	$('#idprovinsi').change(function() { 
    var tengah =  $('#idprovinsi').val();
	var latlong=tengah.split(",");
	console.log(latlong);
	
    var myOptions = {
      zoom: 8,
       scaleControl: true,
      center:  new google.maps.LatLng(latlong[0],latlong[1]),
      mapTypeId: google.maps.MapTypeId.ROADMAP
    };

	
    var map = new google.maps.Map(document.getElementById("map"),
        myOptions);

	var marker1 = new google.maps.Marker({
	position : new google.maps.LatLng(latlong[0],latlong[1]),
	title : 'propinsi',
	map : map,
	icon:'assets/ico/blue.png',
	draggable : true
	});
	
	//updateMarkerPosition(latLng);

	google.maps.event.addListener(marker1, 'drag', function() {
		updateMarkerPosition(marker1.getPosition());
	});
	

	
});
	
</script>
</div>