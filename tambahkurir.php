<?php 
session_start();
if (!isset($_SESSION['nama'])) {
    header("location:index.php");
}
include_once('koneksi.php');
$idkurir = "";
$namakurir = "";
$noktp = "";
$nohp = "";
$nopol = "";
$jk = "";
$wilayah = "";
$tanggal = "";
$alamat = "";
if (isset($_GET['idkurir'])) {
  $idkurir = $_GET['idkurir'];
  $query = "SELECT * FROM kurir WHERE id_kurir='$idkurir'";
  $result = $mysqli->query($query);
  if ($data = $result->fetch_assoc()) {
    $namakurir = $data['nama'];
    $noktp = $data['noktp'];
    $nohp = $data['nohp'];
    $nopol = $data['nopol'];
    $jk = $data['jeniskelamin'];
    $wilayah = $data['wilayah'];
    $tanggal = $data['tanggalmasuk'];
    $alamat = $data['alamat'];
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
                <h1 class="h3 mb-1">Tambah Kurir</h1>
                <p class="text-muted mb-0">Tambahkan informasi kurir baru.</p>
              </div>
            </div>
            <div class="heading-actions"><a class="btn btn-outline-secondary btn-sm" href="index.php"><i class="bi bi-arrow-left" aria-hidden="true"></i> Back to Users</a></div>
          </div>

          <section class="row g-3">
            <div class="col-12">
              <form class="panel needs-validation" action="aksi.php" method="POST" novalidate>
                <input type="hidden" name="idkurir" value="<?= $idkurir ?>">
                <div class="panel-header">
                  <div>
                    <h2 class="h5 mb-1 section-title"><i class="bi bi-person-plus" aria-hidden="true"></i><span>Identitas Kurir</span></h2>
                    <p class="text-muted mb-0">Input Identitas Kurir Dengan Benar.</p>
                  </div>
                </div>
                <div class="row g-3">
                  <div class="col-md-6"><label class="form-label" for="name">Nama Lengkap</label> <input class="form-control" id="firstName" type="text" name="namakurir" value="<?= $namakurir ?>" required>
                    <div class="invalid-feedback">Nama Wajib Diisi.</div>
                  </div>
                  <div class="col-md-6"><label class="form-label" for="identitas">Nomor KTP/SIM</label><input class="form-control" id="identitas" type="tel" name="noktp" value="<?= $noktp ?>" required>
                    <div class="invalid-feedback">Masukkan Nomor KTP/SIM.</div>
                  </div>
                  <div class="col-md-6"><label class="form-label" for="phone">No. HP</label><input class="form-control" id="phone" type="tel" name="nohp" value="<?= $nohp ?>" required>
                    <div class="invalid-feedback">Nomor Telpon Wajib Diisi.</div>
                  </div>
                  <div class="col-md-6"><label class="form-label" for="nopol">Nomor Polisi Kendaraan</label><input class="form-control" id="phone" type="text" name="nopol" value="<?= $nopol ?>" required>
                    <div class="invalid-feedback">Nomor Polisi Wajib Diisi.</div>
                  </div>
                  <div class="col-md-6"><label class="form-label" for="gender">Jenis Kelamin</label>
                    <select class="form-select" id="role" name="jk" required>
                      <option value="">Pilih Kelamin</option>
                      <option value="Laki Laki">Laki-Laki</option>
                      <option value="Perempuan">Perempuan</option>
                    </select>

                    <div class="invalid-feedback">Jenis Kelamin Wajib Dipilih.</div>
                  </div>
                  <div class="col-md-6"><label class="form-label" for="wilayah">Wilayah</label><select class="form-select" id="team" name="wilayah" required>
                      <option value="">Pilih Wilayah</option>
                      <option value="Medokan Ayu">Medokan Ayu</option>
                      <option value="Gunung Anyar">Gunung Anyar</option>
                      <option value="Tenggilis">Tenggilis</option>
                      <option value="Rungkut">Rungkut</option>
                    </select>
                    <div class="invalid-feedback">Wilayah Wajib Dipilih.</div>
                  </div>
                  <div class="col-md-12"><label class="form-label" for="alamat">Alamat</label><input class="form-control" id="alamat" type="text" required placeholder="Alamat Sesuai KTP " name="alamat" value="<?= $alamat ?>">
                    <div class="invalid-feedback">Alamat Wajib Diisi.</div>
                  </div>
                  <div class="col-md-6"><label class="form-label" for="tanggal_masuk">Tanggal & Jam Masuk</label>
                    <?php
                    if (isset($_GET['idkurir'])) { ?>
                      <input type="datetime-local" class="form-control" id="tanggal_masuk" name="tanggal" value="<?= $tanggal ?>">
                    <?php
                    } else { ?>
                      <input type="datetime-local" class="form-control" id="tanggal_masuk" name="tanggal" value="<?= date('Y-m-d') ?>" required>
                    <?php } ?>
                  </div>
                </div>



            </div>
            <div class="d-flex flex-wrap justify-content-end gap-2 mt-4">
              <?php
              if (isset($_GET['idkurir'])) {
                echo '<a class="btn btn-outline-secondary" href="datakurir.php">Batal</a>
                          <button class="btn btn-primary" type="submit" name="proses" value="editkurir">
                          <i class="bi bi-person-check" aria-hidden="true"></i>Update Kurir</button>';
              } else
                echo '<a class="btn btn-outline-secondary" href="index.php">Batal</a>
                          <button class="btn btn-primary" type="submit" name="proses" value="simpankurir">
                          <i class="bi bi-person-check" aria-hidden="true"></i>Tambah Kurir</button>';
              ?>
            </div>
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