<?php 

/**
* 
*/
class Adzan
{

	public $default_city = 'Makassar';
	
	function get_data($kota,$bulan){

		if($kota == null){
			$kota = $this->default_city;
		} 

		if ($bulan == null) {
			$bulan = date('n');
		}

		$url = 'http://api.aladhan.com/v1/calendarByCity'; // Base Url
		$url .='?city='.$kota; // Select City
		$url .='&country=ID'; // Select Country
		$url .='&method=11'; 
		/* 
		Select Method, there are 13 Default Method Avaliable
		visit : https://aladhan.com/calculation-methods
		*/
		$url .='&month='.$bulan; // Select Month
		$url .='&year='.date('Y'); // Select Year
		$file = file_get_contents($url); // Get Content Data from API
		$data = json_decode($file); // Decode JSON Data
		$total_row = count($data->data); // Count total data prayer time in one month

		return array($data,$total_row);
	}
}


?>