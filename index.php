<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Pesan Ayam Goreng - MFC</title>
  <link rel="stylesheet" href="assets/styles.css">
</head>
<body>
  <div class="container">
    <img src="assets/logo.jpg" alt="Logo MFC" class="logo">
    <h2 class="title">Form Pemesanan Ayam Goreng</h2>

    <form>
      <div class="form-group">
        <label>Cabang:</label>
        <select>
          <option>-- Pilih Cabang --</option>
          <option>Cikarang</option>
          <option>Bekasi</option>
          <option>Karawang</option>
          <option>Bogor</option>
        </select>
      </div>

      <div class="form-group">
        <label>Jumlah Dada Ayam:</label>
        <input type="number" value="0" min="0">
      </div>

      <div class="form-group">
        <label>Jumlah Paha Ayam:</label>
        <input type="number" value="0" min="0">
      </div>

      <div class="form-group">
        <label>Jumlah Nasi:</label>
        <input type="number" value="0" min="0">
      </div>

      <div class="form-group">
        <label>Cara Goreng:</label><br>
        <input type="radio" name="goreng" checked> Normal
        <input type="radio" name="goreng"> Speed Fry
      </div>

      <button type="button" class="btn">Hitung Pesanan</button>
    </form>

    <div class="result">
      <h3>Detail Pesanan</h3>
      <p>Total Dada: Rp 22.000</p>
      <p>Total Paha: Rp 24.000</p>
      <p>Total Nasi: Rp 20.000</p>
      <strong>Total Semua: Rp 66.000</strong>
    </div>

    <a href="datapesanan.php" class="btn-back">Lihat Semua Pesanan</a>
  </div>
</body>
</html>
