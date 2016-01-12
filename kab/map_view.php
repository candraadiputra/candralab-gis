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


          <style type="text/css">
          	#map img { 
  max-width: none;
}

#map label { 
  width: auto; display:inline; 
} 
          	
          </style>
</head> 
<body>
		<h2 id="headings"> Kabupaten</h2>
<a href='index.php?mod=kab&pg=Kab_view'><i class="icon-list"></i>List View</a>
  <div id="map" style="width: 800px; height: 400px;"></div>

  <script type="text/javascript">
     
   <?php
   $id=$_GET['id'];
            include('inc/config.php');
            	$sql_lokasi="select nama, lat,lng
            	from kabupaten where idkabupaten='$id' ";
            	$result=query($sql_lokasi);
            	$titik=mysql_fetch_object($result);
            		
		?>
		
   
 var latlng = new google.maps.LatLng(<?php echo $titik->lat?>, <?php echo $titik->lng?>);
    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 12,
	 scaleControl: true,
      center:latlng,
      mapTypeId: google.maps.MapTypeId.ROADMAP
    });
    var marker;

    
      marker = new google.maps.Marker({
        position:latlng,
        map: map
      });
	
 
  </script>
</body>
</html>