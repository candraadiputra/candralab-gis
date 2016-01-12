<?php
/* CandralabGIS v 1.0
 * @author Candra adi putra 
 *  <candraadiputra@gmail.com>
 * http://www.candra.web.id
 * last edit: 27 Oktober 2013
 */
include ('../inc/config.php');
include ('../inc/function.php');
//data dari kabupaten

$nama = $_POST['nama'];
$lat=$_POST['lat'];
$lng=$_POST['lng'];
$idprovinsi=$_POST['idprovinsi'];
$latlng= explode(",", $idprovinsi);
$idprovinsi=get_idprovinsi($latlng[0],$latlng[1]);


$aksi = $_POST['aksi'];
$id = $_POST['id'];

//echo $password;
//exit;
$sql = null;
if($aksi == 'tambah') {
	$sql = "INSERT INTO kabupaten(nama,idprovinsi,lat,lng)
		VALUES('$nama','$idprovinsi','$lat','$lng')";
}else if($aksi == 'edit') {
		
	$sql = "update kabupaten set nama='$nama' ,
	idprovinsi='$idprovinsi',lat='$lat',lng='$lng'
	where idkabupaten='$id'";

}

$result = mysql_query($sql) or die(mysql_error());

//check if query successful
if($result) {
	header('location:../index.php?mod=kab&pg=kab_view&level=0');
} else {
	header('location:../index.php?mod=kab&pg=kab_view&level=1');
}

?>
