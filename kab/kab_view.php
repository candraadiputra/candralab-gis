<?php
/* CandralabGIS v 1.0
 * @author Candra adi putra 
 *  <candraadiputra@gmail.com>
 * http://www.candra.web.id
 * last edit: 27 Oktober 2013
 */
		//===========CODE DELETE RECORD ================
				require_once ('inc/config.php');
				if(isset($_GET['act'])) {
					$id = $_GET['id'];
					$sql = "delete from kabupaten where idkabupaten='$id' ";
					mysql_query($sql) or die(mysql_error());

				}
?>
	<div class='span5'>
	<h2 id="headings"> Data kabupaten</h2>
	<form id='form1' action='index.php?mod=kab&pg=kab_view' method="POST">
	<input type='text'  name='qcari' class="required" >
	<input type='submit'  class='btn' value='cari'>
	 <a href='index.php?mod=kab&pg=kab_view' class="btn" ><i class='icon-list'></i>All</a>
</form>


	<table  class="table  table-condensed table-hover">
		<thead>
		<th><td><b>Nama </b></td><td><b>Provinsi</b></td><td><b>Aksi</b></td></th>
		</thead>
		<tbody>
		<?php
	//paging 
		//bata paging 
	$batas=5;
$halaman=$_GET['halaman'];
$posisi=null;
if(empty($halaman)){
	$posisi=0;
	$halaman=1;
}else{
	$posisi=($halaman-1)* $batas;
}

$query="SELECT k.idkabupaten,k.nama as knama,p.nama as pnama
	 FROM  kabupaten as k,provinsi as p
	where k.idprovinsi=p.idprovinsi order by k.idkabupaten desc
 limit $posisi,$batas ";
	
$sql_page=	"select * from kabupaten";	

if(isset($_POST['qcari'])){
	$qcari=$_POST['qcari'];
	$query="SELECT k.idkabupaten,k.nama as knama,p.nama as pnama
	 FROM  kabupaten as k,provinsi as p
	where k.idprovinsi=p.idprovinsi
	and k.nama like '%$qcari%' order by k.idkabupaten desc";
	
	 $sql_page=	"select idkabupaten from kabupaten where nama like '%$qcari%' ";
}


$result=mysql_query($query) or die(mysql_error());
$no=1;
//proses menampilkan data
while($rows=mysql_fetch_object($result)){

		?>
		<tr>
			<td><?php echo  $posisi+$no
			?></td>
			<td><?php		echo $rows -> knama;?></td>
				<td><?php		echo $rows -> pnama;?></td>
					
			<td>
			<a href="index.php?mod=kab&pg=map_view&id=<?php echo 	$rows -> idkabupaten;?>"

				class='btn'> <i class="icon-map-marker"></i></a>
			<a href="index.php?mod=kab&pg=kab_form&id=<?php echo 	$rows -> idkabupaten;?>" class='btn'><i class="icon-pencil"></i></a><a href="index.php?mod=kab&pg=kab_view&act=del&id=<?php echo 	$rows -> idkabupaten;?>"
			onclick="return confirm('Yakin data akan dihapus?') ";
			class='btn'> <i class="icon-trash"></i></a></td>
		</tr>
		<?php
	$no++;
	}?>

		<tr>
			<td colspan=3></td><td><a href="index.php?mod=kab&pg=kab_form"
			class='btn'	><i class="icon-plus"></i></a></td>
		</tr>
		</tbody>
	</table>
	<?php	
//=============CUT HERE for paging====================================

$tampil2=mysql_query($sql_page);

$jmldata=mysql_num_rows($tampil2);
$jumlah_halaman=ceil($jmldata/$batas);


echo "<div class='pagination'> <ul>";
for($i=1;$i<=$jumlah_halaman;$i++) 

echo "<li><a href='index.php?mod=kab&pg=kab_view&halaman=$i'>$i</a></li>";


?>
</ul>
</div>
<div class='well'>Jumlah data :<strong><?php echo $jmldata;?> </strong></div>
	<?php
// KODE UNTUK MENAMPILKAN PESAN STATUS
if(isset($_GET['status'])) {
	if($_GET['status'] == 0) {
		echo " Operasi data berhasil";
	} else {
		echo "operasi gagal";
	}
}


//close database	?>
</div>

