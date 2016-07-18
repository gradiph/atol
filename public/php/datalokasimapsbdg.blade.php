 <?php

 // Parsing Karakter-Karakter Khusus
 function parseToXML($htmlStr)
 {
 $xmlStr=str_replace('<','<',$htmlStr);
 $xmlStr=str_replace('>','>',$xmlStr);
 $xmlStr=str_replace('"','"',$xmlStr);
 $xmlStr=str_replace("'",'"',$xmlStr);
 $xmlStr=str_replace("&",'&',$xmlStr);
 return $xmlStr;
 }
/*
// Menghubungkan Koneksi dengan server MySQL
 $host = "localhost";
 $username="root";
 $password="";
 $database="bandung_barat";

 $connection=mysql_connect($host, $username, $password);
 if (!$connection) {
 die('Not connected : ' . mysql_error());
 }

 // Memilih database MySQL yang aktif
 $db_selected = mysql_select_db($database, $connection);
 if (!$db_selected) {
 die ('Can\'t use db : ' . mysql_error());
 }

 // Memilih semua baris pada tabel 'markers3'
 $query = "SELECT * FROM view_bb WHERE 1";
 $result = mysql_query($query);
 if (!$result) {
 die('Invalid query: ' . mysql_error());
 }
*/

 //ambil data
 use DB;
 $result = DB::table('usahas')
 			->join('pemiliks', 'usahas.id_pemilik', '=','pemiliks.id')
			->join('users', 'pemiliks.id_users', '=','users.id')
			->join('skalas', 'usahas.id_skala', '=','skalas.id')
			->join('sektors', 'usahas.id_sektor', '=','sektors.id')
			->join('kelurahans', 'usahas.id_kel', '=','kelurahans.id')
			->join('kecamatans', 'kelurahans.id_kec', '=','kecamatans.id')
			->select('usahas.id as idUsaha',
					'users.username as username',
					'usahas.nama as namaUsaha',
					'users.nama as nama',
					'usahas.alamat as alamatUsaha',
					'kecamatans.nama as namaKecamatan',
					'kelurahans.nama as namaKelurahan',
					'skalas.nama as namaSkala',
					'sektors.nama as namaSektor',
					'usahas.lat as latitude',
					'usahas.lng as longtitude')
			->where('usahas.status','=','Aktif')
			->orderBy('usahas.nama', 'asc')
 			->get();
 
 // Header File XML
 header("Content-type: text/xml");

 // Parent node XML
 echo '<markers>';

 // Iterasi baris, masing-masing menghasilkan node-node XML
// while ($row = @mysqli_fetch_assoc($result)){
foreach($data as $row)
{
 // Menambahkan ke node dokumen XML
 echo '<marker ';
 echo 'namaUsaha="' . parseToXML($row['namaUsaha']) . '" ';
 echo 'alamatUsaha="' . parseToXML($row['alamatUsaha']) . '" ';
echo 'latitude="' . $row['latitude'] . '" ';
 echo 'longtitude="' . $row['longtitude'] . '" ';
echo 'category="' . $row['namaSektor'] . '" ';
echo '/>';
 }

// Akhir File XML (tag penutup node)
echo '</markers>';

?>
