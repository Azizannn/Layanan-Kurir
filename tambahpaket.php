<?php
session_start();
if (!isset($_SESSION['nama'])) {
    header("location:index.php");
}
include_once('koneksi.php');
$idpaket = "";
$nama_p = "";
$nohp_p = "";
$invoice = "";
$namapengirim = "";
$jenisbarang = "";
$namakurir = "";
$metopem = "";
$tanggal = "";
$alamat_p = "";

if (isset($_GET['idpaket'])) {
  $idpaket = $_GET['idpaket'];
  $query = "SELECT * FROM paket WHERE id_paket='$idpaket'";
  $result = $mysqli->query($query);
  if ($data = $result->fetch_assoc()) {
    $nama_p = $data['nama_p'];
    $nohp_p = $data['nohp_p'];
    $invoice = $data['invoice'];
    $namapengirim = $data['namapengirim'];
    $jenisbarang = $data['jenisbarang'];
    $namakurir = $data['namakurir'];
    $metopem = $data['metodepembayaran'];
    $tanggal = $data['tanggal'];
    $alamat_p = $data['alamat'];
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="adminHMD professional admin dashboard template">
  <title>Dashboard | adminHMD</title>

  <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/vendors/bootstrap-icons/bootstrap-icons.css">
  <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>
  <div class="admin-shell">
    <div class="sidebar-backdrop" data-sidebar-close></div>
    <?php include_once "sidebar.php" ?>
    <div class="admin-main">
      <?php include_once "header.php" ?>


      <main class="dashboard-content">
        <div class="container-fluid px-3 px-lg-4 py-4">
          <div class="page-heading">
            <div class="page-heading-copy">
              <span class="page-icon"><i class="bi bi-person-plus" aria-hidden="true"></i></span>
              <div>
                <p class="eyebrow mb-1">Management</p>
                <h1 class="h3 mb-1">Tambah Paket Masuk</h1>
                <p class="text-muted mb-0">Tambahkan informasi paket yang baru masuk.</p>
              </div>
            </div>
            <div class="heading-actions"><a class="btn btn-outline-secondary btn-sm" href="index.php"><i class="bi bi-arrow-left" aria-hidden="true"></i> Back to Users</a></div>
          </div>

          <section class="row g-3">
            <div class="col-12">
              <form class="panel needs-validation" action="aksi.php" method="POST" novalidate>
                <input type="hidden" name="idpaket" value="<?= $idpaket ?>">
                <div class="panel-header">
                  <div>
                    <h2 class="h5 mb-1 section-title"><i class="bi bi-person-plus" aria-hidden="true"></i><span>Informasi Paket</span></h2>
                    <p class="text-muted mb-0">Masukkan informasi barang sebelum melakukan pengiriman ke lamat tujuan.</p>
                  </div>
                </div>
                <div class="row g-3">
                  <div class="col-md-6"><label class="form-label" for="name">Nama Penerima</label><input class="form-control" id="name" type="text" name="penerima" value="<?= $nama_p ?>" required>
                    <div class="invalid-feedback">Nama Wajib Diisi.</div>
                  </div>
                  <div class="col-md-6"><label class="form-label" for="hppenerima">No. HP Penerima</label><input class="form-control" id="hppenerima" type="tel" name="nohp_p" value="<?= $nohp_p ?>" required>
                    <div class="invalid-feedback">Nomor Telpon Wajib Diisi.</div>
                  </div>
                  <div class="col-md-6"><label class="form-label" for="invoice">Nomor Invoice Paket</label><input class="form-control" id="invoice" type="tel" name="invoice" value="<?= $invoice ?>" required>
                    <div class="invalid-feedback">Masukkan Nomor Invoice.</div>
                  </div>
                  <div class="col-md-6"><label class="form-label" for="pengirim">Nama Pengirim</label><input class="form-control" id="pengirim" type="text" name="pengirim" value="<?= $namapengirim ?>" required>
                    <div class="invalid-feedback">Nama Wajib Diisi.</div>
                  </div>
                  <div class="col-md-6"><label class="form-label" for="gender">Jenis Paket</label><select class="form-select" id="gender" name="jenisbarang" required>
                      <option value="">Pilih Jenis</option>
                      <option value="Makanan">Makanan</option>
                      <option value="Elektronik">Elektronik</option>
                      <option value="Pakaian">Pakaian</option>
                      <option value="Dokumen">Dokumen</option>
                    </select>
                    <div class="invalid-feedback">Jenis Paket Wajib Dipilih.</div>
                  </div>
                  <div class="col-md-6"><label class="form-label" for="kurir">Kurir</label><input class="form-control" id="kurir" type="text" name="namakurir" value="<?= $namakurir ?>" required>
                    <div class="invalid-feedback">Nama Kurir Wajib Diisi.</div>
                  </div>
                  <div class="col-md-6"><label class="form-label" for="metode">Metode Pembayaran</label><select class="form-select" id="metode" name="metodepembayaran" required>
                      <option value="">Pilih Metode</option>
                      <option value="Cash On Delivery">COD (Cash On Delivery)</option>
                      <option value="Transfer">Transfer</option>
                    </select>
                    <div class="invalid-feedback">Wajib Memilih Metode Pembayaran.</div>
                  </div>
                  <div class="col-md-6"><label class="form-label" for="tanggal_masuk">Tanggal & Jam</label>
                  <?php
                    if (isset($_GET['idpaket'])) { ?>
                      <input type="datetime-local" class="form-control" id="tanggal_masuk" name="tanggal" value="<?= $tanggal ?>">
                    <?php
                    } else { ?>
                      <input type="datetime-local" class="form-control" id="tanggal_masuk" name="tanggal" value="<?= (new DateTime('now', new DateTimeZone('Asia/Jakarta')))->format('Y-m-d\TH:i') ?>" required>
                    <?php } ?>
                </div>
                  <div class="col-md-12"><label class="form-label" for="alamat">Alamat Tujuan</label><input class="form-control" id="alamat" type="text" name="alamat_p" value = "<?= $alamat_p ?>" required placeholder="Alamat Sesuai Tujuan">
                    <div class="invalid-feedback">Alamat Wajib Diisi.</div>
                  </div>
                </div>
                <div class="d-flex flex-wrap justify-content-end gap-2 mt-4">
                  <?php
              if (isset($_GET['idpaket'])) {
                echo '<a class="btn btn-outline-secondary" href="datapaket.php">Batal</a>
                          <button class="btn btn-primary" type="submit" name="proses" value="editpaket">
                          <i class="bi bi-person-check" aria-hidden="true"></i>Update Paket</button>';
              } else
                echo '<a class="btn btn-outline-secondary" href="index.php">Batal</a>
                          <button class="btn btn-primary" type="submit" name="proses" value="simpanpaket">
                          <i class="bi bi-person-check" aria-hidden="true"></i>Tambah Paket</button>';
              ?>
              </form>
            </div>
          </section>
        </div>
      </main>

      <?php include_once "footer.php" ?>
    </div>
  </div>

  <script src="../assets/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/js/main.js"></script>
</body>

</html>