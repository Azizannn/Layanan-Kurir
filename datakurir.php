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
    <?php include_once "sidebar.php"?>
    <div class="admin-main">
      <?php include_once "header.php"?>
       <main class="dashboard-content">
        <div class="container-fluid px-3 px-lg-4 py-4">
          <div class="page-heading">
            <div class="page-heading-copy">
              <span class="page-icon"><i class="bi bi-people" aria-hidden="true"></i></span>
              <div>
                <p class="eyebrow mb-1">INFORMASI KURIR</p>
                <h1 class="h3 mb-1">Kurir</h1>
                <p class="text-muted mb-0">Informasi dan Data Kurir.</p>
              </div>
            </div>
            <div class="heading-actions"><a class="btn btn-primary btn-sm" href="tambahkurir.php"><i class="bi bi-person-plus" aria-hidden="true"></i> Tambah Kurir</a></div>
          </div>

          <section class="panel mt-3">
            <div class="panel-header">
              <div>
                <h2 class="h5 mb-1 section-title"><i class="bi bi-table" aria-hidden="true"></i><span>List Kurir</span></h2>
                <p class="text-muted mb-0">Cari.</p>
              </div>
              <div class="d-flex flex-wrap gap-2">
                <input class="form-control form-control-sm table-search" type="search" placeholder="Cari Kurir" data-table-search="usersTable" aria-label="Search users">
              </div>
            </div>
            <div class="table-responsive">
              <table class="table align-middle mb-0" id="usersTable" data-searchable-table>
                <thead>
                  <tr>
                    <th scope="col">Nama</th>
                    <th scope="col" class="text-center">No. Hp</th>
                    <th scope="col" class="text-center">Wilayah</th>
                    <th scope="col" class="text-center">Nopol Kendaraan</th>
                    <th scope="col" class="text-center">Tanggal Bergabung</th>
                    <th scope="col" class="text-center">Aksi</th>
                  </tr>
                </thead>

                <tbody>
                  <?php
                  include_once('koneksi.php');
                  $query = "SELECT * FROM kurir";
                  $result = $mysqli->query($query);
                  if ($result->num_rows > 0) {
                      while ($data = $result->fetch_assoc()) {
                  ?>
                  <tr>
                    <td>
                      <div class="d-flex align-items- gap-2">
                        <img class="avatar-img avatar-sm" src="../assets/images/avatar/kurir.png" alt="kurir">
                        <div>
                          <p class="fw-semibold mb-0"><?php echo $data['nama'];?></p>
                          <p class="text-muted small mb-0"><?php echo $data['noktp'];?></p>
                        </div>
                      </div>
                    </td>
                    <td class="text-center"><?php echo $data['nohp'];?></td>
                    <td class="text-center"><?php echo $data['wilayah'];?></td>
                    <td class="text-center"><?php echo $data['nopol'];?></td>
                    <td class="text-center"><?php echo $data['tanggalmasuk'];?></td>
                    <td class="text-center">
                      <button class="btn btn-outline-warning btn-sm" title="Edit">
                        <a href="tambahkurir.php?idkurir=<?= $data['id_kurir'] ?>" class="bi bi-pencil-fill"></a>
                      </button>
                      <button class="btn btn-outline-danger btn-sm" title="Hapus">
                        <a href="aksi.php?idkurir=<?= $data['id_kurir'] ?>&proses=hapuskurir" class="bi bi-trash"></a>
                      </button>
                      
                    </td>
                  </tr> 
                  <?php }}?>
                </tbody>
              </table>
            </div>
          </section>
        </div>
      </main>

      <?php include_once "footer.php"?>
    </div>
  </div>

  <script src="../assets/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/js/main.js"></script>
</body>
</html>
