<?php 
	require_once('default-time.php');
	require_once('class-api.php');
	$api = new Adzan();
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$kota  = (isset($_POST['kota'])) ? $_POST['kota'] : null;
		$bulan  = (isset($_POST['bulan'])) ? $_POST['bulan'] : null;
		$get_data = $api->get_data($kota,$bulan);
		$data = $get_data[0];
		$total_row = $get_data[1];

		for ($i=0; $i < $total_row; $i++) { 
		?>
			<tr class="<?php if(strtotime(date('d-m-Y')) == strtotime($data->data[$i]->date->readable)) { echo 'jadwal-selected'; } ?>">
				<td><?php echo $i+1; ?></td>
				<td>
					<b><?php echo strftime("%A, %d %B %Y", strtotime($data->data[$i]->date->readable))."<br>"; ?></b>
					<?php
					echo 
					$data->data[$i]->date->hijri->day." ".$data->data[$i]->date->hijri->month->en." ".$data->data[$i]->date->hijri->year."H";
					?>
				</td>
				<td><?php echo $data->data[$i]->timings->Imsak; ?></td>
				<td><?php echo $data->data[$i]->timings->Fajr; ?></td>
				<td><?php echo $data->data[$i]->timings->Sunrise; ?></td>
				<td><?php echo $data->data[$i]->timings->Dhuhr; ?></td>
				<td><?php echo $data->data[$i]->timings->Asr; ?></td>
				<td><?php echo $data->data[$i]->timings->Maghrib; ?></td>
				<td><?php echo $data->data[$i]->timings->Isha; ?></td>
			</tr>
	<?php } 
	} else {
		echo "Not Permitt";
	}
?>