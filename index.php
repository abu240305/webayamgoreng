<!DOCTYPE html>
<html lang="id">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Memphis Fried Chicken</title>
	<link rel="stylesheet" href="assets/style.css">
</head>
<body>
	<?php
	$cabang = ["Cikarang", "Bekasi", "Karawang", "Bogor"];
	sort($cabang);
	?>

	<div class="container border">
		<img src="assets/logo_mfc.JPG" alt="Logo MFC" class="logo">
		<h2>Form Pemesanan Ayam Goreng</h2>
		<hr class="divider">

		<form action="index.php" method="post" id="formPerhitungan">
			<div class="row-input">
				<label for="cabang">Pilih Cabang:</label>
				<select name="cabang" id="cabang" required>
					<option value="">-- Pilih Cabang --</option>
					<?php foreach ($cabang as $lokasi) echo "<option value='$lokasi'>$lokasi</option>"; ?>
				</select>
			</div>

			<div class="row-input">
				<label>Jumlah Dada Ayam:</label>
				<input type="number" name="dada" min="0" required>
			</div>

			<div class="row-input">
				<label>Jumlah Paha Ayam:</label>
				<input type="number" name="paha" min="0" required>
			</div>

			<div class="row-input">
				<label>Jumlah Nasi:</label>
				<input type="number" name="nasi" min="0" required>
			</div>

			<div class="row-input">
				<label>Gunakan Teknik Speed Fry?</label>
				<div class="radio-group">
					<label><input type="radio" name="speedfry" value="1" required> Ya</label>
					<label><input type="radio" name="speedfry" value="0" required> Tidak</label>
				</div>
			</div>

			<div class="row-input">
				<button type="submit" name="hitung">Hitung Pesanan</button>
			</div>
		</form>
	</div>

	<?php
	if (isset($_POST['hitung'])) {
		$jmlDada = (int)$_POST['dada'];
		$jmlPaha = (int)$_POST['paha'];
		$jmlNasi = (int)$_POST['nasi'];
		$cabang = $_POST['cabang'];
		$speedFry = $_POST['speedfry'] == '1';

		// harga dasar
		$hrgDada = 11000;
		$hrgPaha = 8000;
		$hrgNasi = 5000;

		// cabang Cikarang +1000
		if ($cabang == "Cikarang") {
			$hrgDada += 1000;
			$hrgPaha += 1000;
			$hrgNasi += 1000;
		}

		// speed fry +3000 (ayam saja)
		if ($speedFry) {
			$hrgDada += 3000;
			$hrgPaha += 3000;
		}

		function hitung_total_harga_item($jumlah, $harga) {
			return $jumlah * $harga;
		}

		$totDada = hitung_total_harga_item($jmlDada, $hrgDada);
		$totPaha = hitung_total_harga_item($jmlPaha, $hrgPaha);
		$totNasi = hitung_total_harga_item($jmlNasi, $hrgNasi);
		$totalHarga = $totDada + $totPaha + $totNasi;

		echo "
		<div class='container nota'>
			<h3>Nota Pemesanan</h3>
			<hr class='divider'>

			<div class='detail-row'><span>Cabang:</span><span>$cabang</span></div>
			<div class='detail-row'><span>Menggunakan teknik speed fry:</span><span>".($speedFry ? 'Ya' : 'Tidak')."</span></div>

			<h4>Dada Ayam</h4>
			<div class='detail-row'><span>Jumlah:</span><span>$jmlDada</span></div>
			<div class='detail-row'><span>Harga Satuan:</span><span>Rp ".number_format($hrgDada,0,',','.')."</span></div>
			<div class='detail-row'><span>Total Harga:</span><span>Rp ".number_format($totDada,0,',','.')."</span></div>

			<h4>Paha Ayam</h4>
			<div class='detail-row'><span>Jumlah:</span><span>$jmlPaha</span></div>
			<div class='detail-row'><span>Harga Satuan:</span><span>Rp ".number_format($hrgPaha,0,',','.')."</span></div>
			<div class='detail-row'><span>Total Harga:</span><span>Rp ".number_format($totPaha,0,',','.')."</span></div>

			<h4>Nasi</h4>
			<div class='detail-row'><span>Jumlah:</span><span>$jmlNasi</span></div>
			<div class='detail-row'><span>Harga Satuan:</span><span>Rp ".number_format($hrgNasi,0,',','.')."</span></div>
			<div class='detail-row'><span>Total Harga:</span><span>Rp ".number_format($totNasi,0,',','.')."</span></div>

			<div class='total'>
				<span>Total Harga Keseluruhan:</span>
				<span>Rp ".number_format($totalHarga,0,',','.')."</span>
			</div>

			<div class='footer'>
				<button onclick='window.location.href=\"index.php\"' class='btn-kembali'>Kembali ke Form</button>
			</div>
		</div>";
	}
	?>
</body>
</html>
