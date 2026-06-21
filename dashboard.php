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
              <span class="page-icon"><i class="bi bi-house " aria-hidden="true"></i></span>
              <div>
                <p class="eyebrow mb-1">Overview</p>
                <h1 class="h3 mb-1">Dashboard</h1>
                <p class="text-muted mb-0">Our Current Total Number of Achievement </p>
              </div>
            </div>
          </div>

          <section class="row g-3 mt-1" aria-label="Dashboard metrics">
            <div class="col-12 col-sm-6 col-xl-6">
              <article class="metric-card metric-primary">
                <div class="metric-top">
                  <span class="metric-label">Kurir</span>
                  <span class="metric-icon"><i class="bi bi-people" aria-hidden="true"></i></span>
                </div>
                <div class="metric-value"><?php
                                          include_once('koneksi.php');
                                          $query = "select count(*) as jumlah_kurir from kurir";
                                          $result = $mysqli->query($query);
                                          if ($result->num_rows > 0) {
                                            $data = $result->fetch_assoc();
                                            echo $data['jumlah_kurir'];
                                          }
                                          ?></div>
              </article>
            </div>

            <div class="col-12 col-sm-6 col-xl-6">
              <article class="metric-card metric-success">
                <div class="metric-top">
                  <span class="metric-label">Barang Masuk</span>
                  <span class="metric-icon"><i class="bi bi-box" aria-hidden="true"></i></span>
                </div>
                <div class="metric-value"><?php
                                          include_once('koneksi.php');
                                          $query = "select count(*) as jumlah_paket from paket";
                                          $result = $mysqli->query($query);
                                          if ($result->num_rows > 0) {
                                            $data = $result->fetch_assoc();
                                            echo $data['jumlah_paket'];
                                          }
                                          ?></div>
              </article>
            </div>
        </div>

        <!-- ====== TABEL FONT BESAR & RAPI ====== -->
        <div class="table-responsive mt-4">
          <table class="table table-hover align-middle mb-0 fs-5">
            <thead class="table-blue">
              <tr>
                <th scope="col" style="font-size: 1.3rem;">Nama</th>
                <th scope="col" style="font-size: 1.3rem;">Role</th>
                <th scope="col" style="font-size: 1.3rem;">NPM</th>
              </tr>
            </thead>
            <tbody>
              <?php
                  include_once('koneksi.php');
                  $query = "SELECT * FROM users";
                  $result = $mysqli->query($query);
                  if ($result->num_rows > 0) {
                      while ($data = $result->fetch_assoc()) {
                  ?>
              <tr>
                <td>
                  <div class="d-flex align-items-center gap-3">
                    <div class="avatar-icon bg-primary bg-opacity-10 rounded-circle p-2">
                      <i class="bi bi-person-circle text-primary" style="font-size: 2rem;"></i>
                    </div>
                    <span class="fw-semibold"><?php echo $data['nama']?></span>
                  </div>
                </td>
                <td><span class="badge-role" style="font-size: 1.3rem;">Admin</span></td>
                <td><?php echo $data['npm']?></td>
              </tr>
              <?php }}?>
            </tbody>
          </table>
        </div>
        <!-- ====== AKHIR TABEL ====== -->
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