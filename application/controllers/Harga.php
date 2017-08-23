<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Harga extends CI_Controller {

	 function __construct() {
        parent::__construct();
        
    }
	
	public function index()
	{
				$html = $this->harga_pasar->file_get_html('https://ews.kemendag.go.id/');
 

				$nama_barang = $html->find('.titleharga');
				$harga_sekarang = $html->find('.hargaskg');
				$harga_kemarin = $html->find('.sp2kpindexhargacontentkemarin');
				

				//Begin Filter Kebutuhan Nama Barang
				$x=0;$a=0;
				$ambilNamaBarang=array();
				foreach ($nama_barang as $key => $value) {
					$y=1;
					$ambilNamaBarang[$a]=$value->plaintext;
					$a++;
					$x=$x+$y;
				}
				//End Filter Nama Barang
				//Begin Filter Harga Sekarang

				$ambilHargaSekarang=array();$b=0;
				foreach ($harga_sekarang as $key => $value) {
					
					$ambilHargaSekarang[$b]=$value->plaintext;
					$b++;
					
				}
				//End Filter Harga Sekarang Harga Kemarin : Rp. 11.000/Kg

				//Begin Filter Harga Kemarin

				$ambilHargaKemarin=array();$c=0;
				$pecahHargaKemarin=array();
				foreach ($harga_kemarin as $key => $value) {
					$pecahHargaKemarin[$c]=explode("Harga Kemarin : ",$value->plaintext);
					$ambilHargaKemarin[$c]=$pecahHargaKemarin[$c][1];
					$c++;
					
				}
				//End Filter Harga Kemarin


				echo "<table border='1px'>
						<tr>
							<td>Nama Barang</td>
							<td>Harga Hari Ini</td>
							<td>Harga Kemarin</td>
						</tr>";
				for ($tabel=0;$tabel<$x;$tabel++){
					echo"<tr>
							<td>$ambilNamaBarang[$tabel]</td>
							<td>$ambilHargaSekarang[$tabel]</td>
							<td>$ambilHargaKemarin[$tabel]</td>
						</tr>";
				}
				echo"</table>";

	}
	
}
