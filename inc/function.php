<?php
/* CandralabGIS v 1.0
 * @author Candra adi putra 
 *  <candraadiputra@gmail.com>
 * http://www.candra.web.id
 * last edit: 27 Oktober 2013
 */
function query($qry) {
	$result = mysql_query($qry) or die("Gagal melakukan query pada :
	 <br>$qry<br><br>Kode Salah : <br>&nbsp;&nbsp;&nbsp;" . mysql_error() . "!");
	return $result;
}
function arrayToObject($array) {
    if(!is_array($array)) {
        return $array;
    }

    $object = new stdClass();
    if (is_array($array) && count($array) > 0) {
      foreach ($array as $name=>$value) {
         $name = strtolower(trim($name));
         if (!empty($name)) {
            $object->$name = arrayToObject($value);
         }
      }
      return $object;
    }
    else {
      return FALSE;
    }
}
function get_persen($nilai,$total){
	return round(($nilai/$total)*100);
}
function get_idprovinsi($lat,$lng){
	$id=fetch_row("select idprovinsi from provinsi 
	where lat='$lat' and lng='$lng'");
	return $id;
}
function get_idkabupaten($lat,$lng){
	$id=fetch_row("select idkabupaten from kabupaten 
	where lat='$lat' and lng='$lng'");
	return $id;
}

function fetch_row($qry) {
	$tmp = query($qry);
	list($result) = mysql_fetch_row($tmp);
	return $result;
}

function get_total($query) {
	$tmp = query($query);
	list($result) = mysql_fetch_row($tmp);
	return $result;
}
function combo_provinsi($kode) {
	echo "<option value='' selected>- Pilih Provinsi -</option>";
	$query = query("SELECT idprovinsi,nama  FROM provinsi");
	while ($row = mysql_fetch_row($query)) {
		if ($kode == "")
			echo "<option value='$row[0]'> " . ucwords($row[1]) . " </option>";
		else
			echo "<option value='$row[0]'" . selected($row[0], $kode) . "> " . ucwords($row[1]) . " </option>";
	}
}
function combo_provinsi2($kode) {
	echo "<option value='' selected>- Pilih Provinsi -</option>";
	$query = query("SELECT idprovinsi,nama,lat,lng  FROM provinsi");
	while ($row = mysql_fetch_row($query)) {
		if ($kode == "")
			echo "<option value='$row[2],$row[3]'> " . ucwords($row[1]) . " </option>";
		else
			echo "<option value='$row[2],$row[3]'" . selected($row[2], $kode) . "> " . ucwords($row[1]) . " </option>";
	}
}
function get_today() {
	$today = date("Y-m-d");
	return $today;
}

function format_rupiah($rp) {
	$hasil = "<b>Rp." . number_format($rp, 0, "", ".") . ",00</b>";
	return $hasil;
}

function num_rows($qry) {
	$tmp = query($qry);
	$jum = mysql_num_rows($tmp);
	return $jum;
}

function valid($tmp) {
	return htmlentities(addslashes($tmp));
}

//fungsi untuk meremove koma didepan dan dibelakang
function rm_koma($data) {
	$ret = substr($data, 0, -1);

	return $ret;
}



function combo_hari($kode) {
	echo "<option value='0' selected>-  hari -</option>";
	$hari = array('senin', 'selasa', 'rabu', 'kamis', 'jumat', 'sabtu', 'minggu');
	foreach($hari as $value) {
		if($kode == "")
			echo "<option value='$value'> " . ucwords($value) . " </option>";
		else
			echo "<option value='$value'" . selected($value, $kode) . "> " . ucwords($value) . " </option>";
	}
}

function combo_bulan($kode) {
	echo "<option value='' selected>Bulan</option>";
	$hari = array('Januari', 'Febuari', 'maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
	foreach($hari as $key => $value) {
		if($kode == "")
			echo "<option value='$key'> " . ucwords($value) . " </option>";
		else
			echo "<option value='$key'" . selected($value, $kode) . "> " . ucwords($value) . " </option>";
	}
}

function combo_jenis_rs($kode) {
	echo "<option value='0' selected>-  Jenis -</option>";
	$hari=array('RSUD','SWASTA');
	foreach($hari as $value){
		if ($kode == "")
			echo "<option value='$value'> " . ucwords($value) . " </option>";
		else
			echo "<option value='$value'" . selected($value, $kode) . "> " . ucwords($value) . " </option>";
	}
}
function combo_tahun($kode) {
	echo "<option value='' selected>Tahun</option>";
	$tahun = array('2011', '2012', '2013');
	foreach($tahun as $key => $value) {
		if($kode == "")
			echo "<option value='$value'> " . ucwords($value) . " </option>";
		else
			echo "<option value='$value'" . selected($value, $kode) . "> " . ucwords($value) . " </option>";
	}
}
function combo_poi($kode) {
	echo "<option value='' selected>Pilih Data </option>";
	$tahun = array('polisi', 'spbu', 'rumahsakit');
	foreach($tahun as $key => $value) {
		if($kode == "")
			echo "<option value='$value'> " . ucwords($value) . " </option>";
		else
			echo "<option value='$value'" . selected($value, $kode) . "> " . ucwords($value) . " </option>";
	}
}


function konversi_bulan($bln) {
	switch($bln) {
		case "1" :

		case "01" :
			$bulan = "Januari";
			break;
		case "2" :

		case "02" :
			$bulan = "Februari";
			break;
		case "3" :

		case "03" :
			$bulan = "Maret";
			break;
		case "4" :

		case "04" :
			$bulan = "April";
			break;
		case "5" :

		case "05" :
			$bulan = "Mei";
			break;
		case "6" :

		case "06" :
			$bulan = "Juni";
			break;
		case "7" :

		case "07" :
			$bulan = "Juli";
			break;
		case "8" :

		case "08" :
			$bulan = "Agustus";
			break;
		case "9" :

		case "09" :
			$bulan = "September";
			break;
		case "10" :
			$bulan = "Oktober";
			break;
		case "11" :
			$bulan = "November";
			break;
		case "12" :
			$bulan = "Desember";
			break;
		default :
			$bulan = "Nooooooot..!!";
	}
	return $bulan;
}

function konversi_tanggal($time) {
	list($thn, $bln, $tgl) = explode('-', $time);
	$tmp = $tgl . " " . konversi_bulan($bln) . " " . $thn;
	return $tmp;
}

function tampil_tanggal($time) {
	list($date, $time) = explode(' ', $time);
	$tmp = konversi_tanggal($date) . " " . $time;
	return $tmp;
}

function selected($t1, $t2) {
	if(trim($t1) == trim($t2))
		return "selected";
	else
		return "";
}

function get_date($tgl = '') {
	if($tgl == "")
		$now = date("d");
	else
		$now = $tgl;
	$jum_hr = date("t");
	for($i = 1; $i <= $jum_hr; $i++) {
		echo "<option value='$i' " . selected($i, $now) . ">$i</option>";
	}
}

function get_month($bln = '') {
	if($bln == "")
		$now = date("m");
	else
		$now = $bln;
	$jum_bl = 12;
	for($i = 1; $i <= $jum_bl; $i++) {
		echo "<option value='$i' " . selected($i, $now) . ">" . konversi_bulan($i) . "</option>";
	}
}

function get_year($thn = '') {
	if($thn == "") {
		$now = date("Y");
		$thn = date("Y");
	} else {
		$now = date("Y");
		$thn = $thn;
	}
	$jum_th = 3;
	for($i = 1; $i <= $jum_th; $i++) {
		echo "<option value='$now' " . selected($thn, $now) . ">" . $now . "</option>";
		$now--;
	}
}?>
