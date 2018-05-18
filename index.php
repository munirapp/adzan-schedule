<?php
	require_once('default-time.php');
	require_once('class-api.php');
	$api = new Adzan();
	$get_data = $api->get_data(null,null); // Initiate default class with null parameter;
	$data = $get_data[0];
	$total_row = $get_data[1];
?>

<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Jadwal Sholat</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	
	<div class="wrapper">
		<div class="header">
			<h4>Jadwal Imsakiyah & Sholat 5 Waktu</h4>
			<h6 id="title-month">2018 / 1439 H</h6>
		</div>
		<div class="form-jadwal">
			<div class="form-jadwal-content">
				<label class="form-label">Kota</label>
				<select name="kota" id="kota" class="form-control select-jadwal">
					<option value="Makassar">Makassar</option>
					<option value="Jakarta">Jakarta</option>
					<option value="Bandung">Bandung</option>
					<option value="Surabaya">Surabaya</option>
					<option value="Medan">Medan</option>
					<option value="Ambon">Ambon</option>
					<option value="Jayapura">Jayapura</option>
				</select>
				<label class="form-label">Bulan</label>
				<select name="bulan" id="bulan" class="form-control select-jadwal">
					<option value="1" <?php if(date('m') == '1') { echo 'selected'; } ?>>Januari</option>
					<option value="2" <?php if(date('m') == '2') { echo 'selected';  } ?> >Februari</option>
					<option value="3" <?php if(date('m') == '3') { echo 'selected';  } ?> >Maret</option>
					<option value="4" <?php if(date('m') == '4') { echo 'selected';  } ?> >April</option>
					<option value="5" <?php if(date('m') == '5') { echo 'selected';  } ?> >Mei</option>
					<option value="6" <?php if(date('m') == '6') { echo 'selected';  } ?> >Juni</option>
					<option value="7" <?php if(date('m') == '7') { echo 'selected';  } ?> >Juli</option>
					<option value="8" <?php if(date('m') == '8') { echo 'selected';  } ?> >Agustus</option>
					<option value="9" <?php if(date('m') == '9') { echo 'selected';  } ?> >September</option>
					<option value="10" <?php if(date('m') == '10') { echo 'selected';  } ?> >Oktober</option>
					<option value="11" <?php if(date('m') == '11') { echo 'selected';  } ?> >November</option>
					<option value="12" <?php if(date('m') == '12') { echo 'selected';  } ?> >Desember</option>
				</select>
			</div>
		</div>
		<div class="content-jadwal">
			<table class="table table-striped table-bordered">
				<thead id="theader" >
					<th>No.</th>
					<th>Tanggal</th>
					<th>Imsyak</th>
					<th>Subuh</th>
					<th>Terbit</th>
					<th>Dzuhur</th>
					<th>Ashar</th>
					<th>Maghrib</th>
					<th>Isya'</th>
				</thead>
				<tbody id="load-content">
					<?php for ($i=0; $i < $total_row; $i++) { ?>

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
					<?php } ?>
				</tbody>
			</table>
			<table id="header-fixed" class="table">
				<thead>
					<th width="45">No.</th>
					<th width="200">Tanggal</th>
					<th width="93">Imsyak</th>
					<th width="93">Subuh</th>
					<th width="93">Terbit</th>
					<th width="93">Dzuhur</th>
					<th width="93">Ashar</th>
					<th width="93">Maghrib</th>
					<th width="93">Isya'</th>
				</thead>
			</table>
		</div>
		<div class="footer">
			<p>Created by Muhammad Munir (<a href="http://telegram.me/mumundira">@mumundira</a>) &copy 2018</p>
		</div>
	</div>

	<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<script type="text/javascript" src="main.js"></script>

</body>
</html>