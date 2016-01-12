<?php
/* CandralabGIS v 1.0
 * @author Candra adi putra 
 *  <candraadiputra@gmail.com>
 * http://www.candra.web.id
 * last edit: 27 Oktober 2013
 */
include ('../inc/config.php');
//data dari admin



$username = $_POST['username'];
$password = md5(trim($_POST['password']));
$aksi = $_POST['aksi'];
$id = $_POST['id'];

//echo $password;
//exit;
$sql = null;
if($aksi == 'tambah') {
	$sql = "INSERT INTO admin(username,password)
		VALUES('$username', '$password')";
}else if($aksi == 'edit') {
	$sql = "update admin set username='$username',
			password='$password' where idadmin='$id'";

}

$result = mysql_query($sql) or die(mysql_error());

//check if query successful
if($result) {
	header('location:../index.php?mod=admin&pg=admin_view&level=0');
} else {
	header('location:../index.php?mod=admin&pg=admin_view&level=1');
}
?>
