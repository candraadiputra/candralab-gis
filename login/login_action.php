<?php
session_start();
/* CandralabGIS v 1.0
 * @author Candra adi putra 
 *  <candraadiputra@gmail.com>
 * http://www.candra.web.id
 * last edit: 27 Oktober 2013
 */

include ('../inc/config.php');

$username = $_POST['username'];
$password = md5(trim($_POST['password']));
$sql = "select  * from  admin  where username='$username'
  and password='$password' ";

$sql_login = mysql_query($sql) or die(mysql_error());
$hasil = mysql_fetch_object($sql_login);

if(mysql_num_rows($sql_login) == 1) {
	$_SESSION['username'] = $username;

	header("Location:../index.php?mod=login&pg=welcome");

} else {
	header("Location:../index.php?mod=login&pg=form_login&s=1");
}?>

