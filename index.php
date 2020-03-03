<?php

$week = new DateTime();

echo "<br>";
for ($weekNumber=1;$weekNumber<=52;$weekNumber++){
	$week->setISODate(2019,$weekNumber);
	echo "ini minggu ke ". $weekNumber."<br>";
	
	echo "<br>";
	echo hari_ini($week->format('D')).', '.tgl_indo($week->format('Y-m-d'));
    echo "<br>";
    
	$tanggal = [(int)$week->format('d').' '.hari_ini($week->format('D'))];
	for ($i=0; $i < 6; $i++){
		$week->modify('+1 days');
		echo hari_ini($week->format('D')).', '.tgl_indo($week->format('Y-m-d'));
		$cekHari = $week->format('D');
		if ($cekHari == 'Sat' || $cekHari =='Sun'){
			
		}else{
		array_push($tanggal, (int)$week->format('d').' '.hari_ini($week->format('D')));
		}
		echo "<br>";
	}
	
	
	echo "<pre>";
	print_r($tanggal);
	echo "</pre>";

	$arr_ran = array_rand($tanggal, 3);
	echo $tanggal[$arr_ran[0]].'<br>';	
	echo $tanggal[$arr_ran[1]].'<br>';	
	echo $tanggal[$arr_ran[2]].'<br>';	
	
	echo "<br>";
}

function hari_ini($hari){
 	
	switch($hari){
		case 'Sun':
			$hari_ini = "Minggu";
		break;
 
		case 'Mon':			
			$hari_ini = "Senin";
		break;
 
		case 'Tue':
			$hari_ini = "Selasa";
		break;
 
		case 'Wed':
			$hari_ini = "Rabu";
		break;
 
		case 'Thu':
			$hari_ini = "Kamis";
		break;
 
		case 'Fri':
			$hari_ini = "Jumat";
		break;
 
		case 'Sat':
			$hari_ini = "Sabtu";
		break;
		
		default:
			$hari_ini = "Tidak di ketahui";		
		break;
	}
 
	return "<b>" . $hari_ini . "</b>";
 
}

function tgl_indo($tanggal){
	$bulan = array (
		1 => 'Januari',
		'Februari',
		'Maret',
		'April',
		'Mei',
		'Juni',
		'Juli',
		'Agustus',
		'September',
		'Oktober',
		'November',
		'Desember'
	);
	$pecahkan = explode('-', $tanggal);
	return (int)$pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1] ] . ' ' . $pecahkan[0];
}
