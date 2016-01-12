<?php
/* CandralabGIS v 1.0
 * @author Candra adi putra 
 *  <candraadiputra@gmail.com>
 * http://www.candra.web.id
 * last edit: 27 Oktober 2013
 */
 ?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
		<style type="text/css">		#map img {
				max-width: none;
			}
			#map label {
				width: auto;
				display: inline;
			}
</style>
	</head>
	<body>
		<div id="map" style="width: 100%; height: 500px;"></div>
		<div id='datalokasi' style="display: none">
			welcome
		</div>
		<script type="text/javascript">
var locations = [
<?php
if(isset($_POST)){
include('inc/config.php');
$tabel=$_POST['poi'];
$sql_lokasi=null;
$idkabupaten=$_POST['idkabupaten'];
$latlng= explode(",", $idkabupaten);
$idkabupaten=get_idkabupaten($latlng[0],$latlng[1]);


for($i = 0; $i < count($tabel); $i++) {
$id=id.$tabel[$i];
$sql_lokasi="select nama,lat,lng,$id
from $tabel[$i]
where idkabupaten='$idkabupaten'";

$result=query($sql_lokasi);
while($data=mysql_fetch_array($result)){
?>
['<?php echo $data[0];?>',<?php echo $data[1];?>,<?php echo $data[2];?>,'<?php echo $tabel[$i];?>','<?php echo $data[3];?>'],<?php	} //end while
	} //end for
	}//end of isset?>];

	var latLng = new google.maps.LatLng(<?php echo $latlng[0]?>,<?php echo $latlng[1]?>);
	var map = new google.maps.Map(document.getElementById('map'), {
		zoom : 12,
		scaleControl : true,
		center : latLng,
		mapTypeId : google.maps.MapTypeId.ROADMAP
	});

	var infowindow = new google.maps.InfoWindow();

	var marker, i;
	var lokasi;
	var iw;
	var str1 = 'assets/ico/';
	var str3 = '.png';
	for( i = 0; i < locations.length; i++) {
		var str2 = locations[i][3];
		var myicon = str1.concat(str2, str3);
		marker = new google.maps.Marker({
			position : new google.maps.LatLng(locations[i][1], locations[i][2]),
			map : map,
			icon : myicon
		});

		google.maps.event.addListener(marker, 'click', (function(marker, i) {
			return function() { 
				var data1= locations[i][3];
				var data2='|';
				var data3= locations[i][4];
				lokasi = data1.concat(data2, data3);
				console.log(lokasi);
				$.ajax({
					url : "inc/get_info.php",
					data : "loc=" + lokasi,
					success : function(data) {
						// jika data sukses diambil dari server, 
					/*	$("#datalokasi").innerHTML(data);*/
						iw=data;
						
				infowindow.setContent(iw);
				infowindow.open(map, marker);					}
				})
				lokasi=null;
				
				;
				/*iw = document.getElementById('datalokasi').innerHTML;*/

			}
		})(marker, i));
	}</script>
	</body>
</html>