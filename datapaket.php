<?php 
session_start();
if (!isset($_SESSION['nama'])) {
    header("location:index.php");
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
              <span class="page-icon"><i class="bi bi-people" aria-hidden="true"></i></span>
              <div>
                <p class="eyebrow mb-1">INFORMASI PAKET MASUK</p>
                <h1 class="h3 mb-1">Paket</h1>
                <p class="text-muted mb-0">Informasi dan Data Paket yang masuk.</p>
              </div>
            </div>
            <div class="heading-actions"><a class="btn btn-primary btn-sm" href="tambahpaket.php"><i class="bi bi-person-plus" aria-hidden="true"></i> Tambah Paket</a></div>
          </div>

          <section class="panel mt-3">
            <div class="panel-header">
              <div>
                <h2 class="h5 mb-1 section-title"><i class="bi bi-table" aria-hidden="true"></i><span>List Paket Masuk</span></h2>
                <p class="text-muted mb-0">Cari dan Kelola Paket Yang Masuk.</p>
              </div>
              <div class="d-flex flex-wrap gap-2">
                <input class="form-control form-control-sm table-search" type="search" placeholder="Cari Paket" data-table-search="usersTable" aria-label="Search users">
              </div>
            </div>
            <div class="table-responsive">
              <table class="table align-middle mb-0" id="usersTable" data-searchable-table>

                <thead>
                  <tr>
                    <th scope="col" class="text-center">Penerima</th>
                    <th scope="col" class="text-center">No. Hp</th>
                    <th scope="col" class="text-center">No. Invoice</th>
                    <th scope="col" class="text-center">Pengirim</th>
                    <th scope="col" class="text-center">Jenis Paket</th>
                    <th scope="col" class="text-center">Kurir</th>
                    <th scope="col" class="text-center">Pembayaran</th>
                    <th scope="col" class="text-center">Tanggal Paket Masuk</th>
                    <th scope="col" class="text-center">Alamat Tujuan</th>
                    <th scope="col" class="text-center">Aksi</th>
                  </tr>
                </thead>

                <tbody>
                  <?php
                  include_once('koneksi.php');
                  $query = "SELECT * FROM paket";
                  $result = $mysqli->query($query);
                  if ($result->num_rows > 0) {
                    while ($data = $result->fetch_assoc()) {
                  ?>
                      <tr>
                        <td class="text-center"><?php echo $data['nama_p'] ?></td>
                        <td class="text-center"><?php echo $data['nohp_p'] ?></td>
                        <td class="text-center"><?php echo $data['invoice'] ?></td>
                        <td class="text-center"><?php echo $data['namapengirim'] ?></td>
                        <td class="text-center"><?php echo $data['jenisbarang'] ?></td>
                        <td class="text-center"><?php echo $data['namakurir'] ?></td>
                        <td class="text-center"><?php echo $data['metodepembayaran'] ?></td>
                        <td class="text-center"><?php echo $data['tanggal'] ?></td>
                        <td class="text-center"><?php echo $data['alamat'] ?></td>
                        <td class="text-center">
                          <button class="btn btn-outline-warning btn-sm" title="Edit">
                            <a href="tambahpaket.php?idpaket=<?= $data['id_paket'] ?>" class="bi bi-pencil-fill"></a>
                          </button>
                          <button class="btn btn-outline-danger btn-sm" title="Hapus">
                            <a href="aksi.php?idpaket=<?= $data['id_paket'] ?>&proses=hapuspaket" class="bi bi-trash"></a>
                          </button>
                        </td>
                      </tr>
                  <?php }
                  } ?>
                </tbody>
              </table>
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