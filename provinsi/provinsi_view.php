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
					$sql = "delete from provinsi where idprovinsi='$id' ";
					mysql_query($sql) or die(mysql_error());

				}
?>
	<div class='span5'>
	<h2 id="headings"> Data provinsi</h2>
	
	<form id='form1' action='index.php?mod=provinsi&pg=provinsi_view' method="POST">
	<input type='text'  name='qcari' class="required" >
	<input type='submit'  class='btn' value='cari'>
	 <a href='index.php?mod=provinsi&pg=provinsi_view' class="btn" ><i class='icon-list'></i>All</a>
</form>

	<a href='index.php?mod=provinsi&pg=map_view'><i class="icon-map-marker"></i>Map View</a>
	<table  class="table  table-condensed table-hover">
		<thead>
		<th><td><b>Nama </b></td><td><b>Aksi</b></td></th>
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

$query="select * from provinsi order by idprovinsi desc limit $posisi,$batas ";	
$sql_page=	"select * from provinsi";	

if(isset($_POST['qcari'])){
	$qcari=$_POST['qcari'];
	$query="SELECT * FROM  provinsi
	where nama like '%$qcari%' order by idprovinsi desc";
	 $sql_page=	"select * from provinsi where nama like '%$qcari%' ";
}


$result=mysql_query($query) or die(mysql_error());
$no=1;
//proses menampilkan data
while($rows=mysql_fetch_object($result)){

		?>
		<tr>
			<td><?php echo  $posisi+$no
			?></td>
			<td><?php		echo $rows -> nama;?></td>
					
			<td><a href="index.php?mod=provinsi&pg=provinsi_form&id=<?php echo 	$rows -> idprovinsi;?>" class='btn'><i class="icon-pencil"></i></a><a href="index.php?mod=provinsi&pg=provinsi_view&act=del&id=<?php echo 	$rows -> idprovinsi;?>"
			onclick="return confirm('Yakin data akan dihapus?') ";
			class='btn'> <i class="icon-trash"></i></a></td>
		</tr>
		<?php
	$no++;
	}?>

		<tr>
			<td colspan=2></td><td><a href="index.php?mod=provinsi&pg=provinsi_form"
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

echo "<li><a href='index.php?mod=provinsi&pg=provinsi_view&halaman=$i'>$i</a></li>";


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

