<?php
/* CandralabGIS v 1.0
 * @author Candra adi putra 
 *  <candraadiputra@gmail.com>
 * http://www.candra.web.id
 * last edit: 27 Oktober 2013
 */
include('../inc/config.php');
include('../inc/function.php');
$kirim=$_GET['loc'];

$data=explode('|',$kirim);
$tabel= $data[0];
$id=$data[1];


switch ($tabel) {
	case 'jalan': {
		         	$sql_lokasi="select *
            	from jalan where idjalan='$id' ";
				
            	$result=query($sql_lokasi);
            	while($data=mysql_fetch_object($result)){
            		$content="<div id=\"content\">
    <div id=\"siteNotice\" >
    </div>
    <h4 id=\"firstHeading\" class=\"firstHeading\">$data->nama</h4>
    <div id=\"bodyContent\" height=\"400px\"><p>
    <img src=\"upload/jalan/$data->foto\" 
    <ul>
    <li> Nomor: $data->nomor 
    <li> panjang: $data->panjang KM
      <li> STA: $data->sta KM
      <li> Baik: $data->baik KM
            $data->pbaik %
      <li> Sedang: $data->sedang KM
           $data->psedang %
      <li> Rusak ringan: $data->rusak_ringan KM
            $data->rusak_ringan %
      <li> rusak berat: $data->rusak_berat KM
           $data->prusak_berat %

    </ul></div></div>"; ?>
            		   
       <?php
				} //end while
		
		echo $content;
	} //end case jalen
	break;
	
	case 'jembatan': {
		$sql_lokasi="select *
            	from jembatan where idjembatan='$id' ";
            	$result=query($sql_lokasi);
            	while($data=mysql_fetch_object($result)){
            		$content="<div id=\"content\">
    <div id=\"siteNotice\">
    </div>
    <h4 id=\"firstHeading\" class=\"firstHeading\">$data->nama</h4>
    <div id=\"bodyContent\"><p>
    <img src=\"upload/jembatan/$data->foto\" 
    <ul>
    <li> No Jembatan: $data->no_jembatan 
    <li> panjang: $data->panjang M
      <li> STA: $data->sta KM

    </ul></div></div>"; 
				}
		
		echo $content;
	}
	break;
	case 'rumahsakit': {
		$sql_lokasi="select *
            	from rumahsakit where idrumahsakit='$id' ";
            	$result=query($sql_lokasi);
            	while($data=mysql_fetch_object($result)){
            		$content="<div id=\"content\">
    <div id=\"siteNotice\">
    </div>
    <h4 id=\"firstHeading\" class=\"firstHeading\">$data->nama</h4>
    <div id=\"bodyContent\"><p>
    <img src=\"upload/rumahsakit/$data->foto\" 
    <ul>
    <li> No telp: $data->no_telp 
    <li> Jenis :$data->jenis 
    <li> $data->alamat
    </div></div>";
				} //end while 
		echo $content;
	} //end case rumahsakit
	break;
	case 'spbu': {
			$sql_lokasi="select *
            	from spbu where idspbu='$id' ";
			
            	$result=query($sql_lokasi);
            	while($data=mysql_fetch_object($result)){
            		$content="<div id=\"content\">
    <div id=\"siteNotice\">
    </div>
    <h4 id=\"firstHeading\" class=\"firstHeading\">$data->nama</h4>
    <div id=\"bodyContent\"><p>
    <img src=\"upload/spbu/$data->foto\" 
    <ul>


    <li> $data->alamat
    </ul></div></div>";
   } //end while 
		echo $content;
	}//end case spbu
	break;
	case 'polisi': {
		$sql_lokasi="select *
            	from polisi where idpolisi='$id' ";
            	$result=query($sql_lokasi);
            	while($data=mysql_fetch_object($result)){
            		$content="<div id=\"content\">
    <div id=\"siteNotice\">
    </div>
    <h4 id=\"firstHeading\" class=\"firstHeading\">$data->nama</h4>
    <div id=\"bodyContent\"><p>
    <img src=\"upload/polisi/$data->foto\" 
    <ul>
    <li> No telp: $data->no_telp 
    <li> $data->alamat
    </ul></div></div>";
				}	
		echo $content;
	}
	break;
	
}




?>
