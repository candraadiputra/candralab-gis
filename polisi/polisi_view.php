<?php
/* CandralabGIS v 1.0
 * @author Candra adi putra 
 *  <candraadiputra@gmail.com>
 * http://www.candra.web.id
 * last edit: 27 Oktober 2013
 */
 				//===========CODE DELETE RECORD ================

					if(isset($_GET['act'])) {
						$id = $_GET['id'];
						$sql = "delete from polisi where idpolisi='$id' ";
						mysql_query($sql) or die(mysql_error());

					}
					?>

<div>
	<h2 id="headings"> Data polisi</h2>
	<!--<a href='index.php?mod=polisi&pg=peta'><i class="icon-map-marker"></i>Map View</a>-->
	<table  class="table table-striped table-condensed">
		<thead>
			<th><td><b>Nama </b></td><td><b>No telp</b></td><td><b>Alamat</b></td><td><b>Aksi</b></td></th>
		</thead>
		<tbody>
<?php
$batas='10';
$halaman=$_GET['halaman'];
$posisi=null;
if(empty($halaman)){
$posisi=0;
$halaman=1;
}else{
$posisi=($halaman-1)* $batas;
}
$query="SELECT p.idpolisi,p.nama,k.nama as nama_kabupaten,p.no_telp,p.alamat 
from polisi as p,kabupaten as k
where p.idkabupaten=k.idkabupaten
limit $posisi,$batas ";
$result=mysql_query($query) or die(mysql_error());
$no=1;
//proses menampilkan data
while($rows=mysql_fetch_object($result)){

			?>
			<tr>
				<td><?php echo  $posisi+$no
				?></td>
				<td><?php		echo $rows -> nama;?></td>
			
						<td><?php		echo $rows -> alamat;?></td>
				<td><?php echo $rows -> nama_kabupaten;?></td>
				<td>	
					<a href="index.php?mod=polisi&pg=peta&id=<?php echo 	$rows -> idpolisi;?>"

				class='btn'> <i class="icon-map-marker"></i></a>
					<a href="index.php?mod=polisi&pg=polisi_form&id=<?php echo 	$rows -> idpolisi;?>"

				class='btn'> <i class="icon-pencil"></i></a><a href="index.php?mod=polisi&pg=polisi_view&act=del&id=<?php echo 	$rows -> idpolisi;?>"
				onclick="return confirm('Yakin data akan dihapus?') ";
				class='btn'> <i class="icon-trash"></i></a></td>
			</tr>
			<?php $no++;
	}?>

			<tr>
				<td colspan='4' ></td><td><a href="index.php?mod=polisi&pg=polisi_form"
				class='btn'	><i class="icon-plus"></i></a></td>
			</tr>
		</tbody>
	</table>
	<?php
//=============CUT HERE for paging====================================
$tampil2 = mysql_query("SELECT idpolisi from polisi");

$jmldata = mysql_num_rows($tampil2);
$jumlah_halaman = ceil($jmldata / $batas);

echo "<div class='pagination'> <ul>";
for($i = 1; $i <= $jumlah_halaman; $i++)

	echo "<li><a href='index.php?mod=polisi&pg=polisi_view&halaman=$i'>$i</a></li>";

?>
	</ul>
</div>
<br>
Jumlah data :<?php echo $jmldata;
?>

<?php
// KODE UNTUK MENAMPILKAN PESAN STATUS
if(isset($_GET['status'])) {
	if($_GET['status'] == 0) {
		echo " Operasi data berhasil";
	} else {
		echo "operasi gagal";
	}
}

//close database?>

</div>
