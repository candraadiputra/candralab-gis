<?php
/* CandralabGIS v 1.0
 * @author Candra adi putra 
 *  <candraadiputra@gmail.com>
 * http://www.candra.web.id
 * last edit: 27 Oktober 2013
 */
include('../inc/config.php');

$idprovinsi= $_GET['idprovinsi'];
$hasil = mysql_query("SELECT k.idkabupaten,k.nama,k.lat,k.lng
from provinsi as p,kabupaten as k
  where p.idprovinsi=k.idprovinsi
  and p.idprovinsi='$idprovinsi'");
  
echo "<option>--Pilih Kabupaten--</option>";
 
while($k = mysql_fetch_array($hasil)){
   	echo "<option value='$k[2],$k[3]'> " . ucwords($k[1]) ."</option>";
}
?>
