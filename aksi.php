<?php
if ((isset($_POST['proses']) and $_POST['proses'] == 'simpankurir')) {
    simpankurir();
} elseif ((isset($_POST['proses']) and $_POST['proses'] == 'login')) {
    login();
} elseif ((isset($_GET['proses']) and $_GET['proses'] == 'logout')) {
    logout();
} elseif ((isset($_POST['proses']) and $_POST['proses'] == 'simpanpaket')) {
    simpanpaket();
} elseif ((isset($_GET['proses']) and $_GET['proses'] == 'hapuskurir')) {
    hapuskurir();
} elseif ((isset($_POST['proses']) and $_POST['proses'] == 'editkurir')) {
    editkurir();
} elseif ((isset($_POST['proses']) and $_POST['proses'] == 'editpaket')) {
    editpaket();
} elseif ((isset($_GET['proses']) and $_GET['proses'] == 'hapuspaket')) {
    hapuspaket();
}
function simpankurir()
{
    include_once('koneksi.php');
    $namakurir = $_POST['namakurir'];
    $noktp = $_POST['noktp'];
    $nohp = $_POST['nohp'];
    $nopol = $_POST['nopol'];
    $jk = $_POST['jk'];
    $wilayah = $_POST['wilayah'];
    $tanggal = $_POST['tanggal'];
    $alamat = $_POST['alamat'];

    $query = "INSERT INTO kurir(nama,noktp,nohp,nopol,jeniskelamin,wilayah,tanggalmasuk,alamat) VALUES ('$namakurir','$noktp','$nohp','$nopol','$jk','$wilayah','$tanggal','$alamat')";
    $eksekusi = mysqli_query($mysqli, $query);
    if ($eksekusi) {
        header("location:datakurir.php");
    } else {
        echo "proses input gagal";
    }
}

function simpanpaket()
{
    include_once('koneksi.php');
    $nama_p = $_POST['penerima'];
    $nohp_p = $_POST['nohp_p'];
    $invoice = $_POST['invoice'];
    $namapengirim = $_POST['pengirim'];
    $jenisbarang = $_POST['jenisbarang'];
    $namakurir = $_POST['namakurir'];
    $metopem = $_POST['metodepembayaran'];
    $tanggal = $_POST['tanggal'];
    $alamat_p = $_POST['alamat_p'];

    $query = "INSERT INTO paket(nama_p,nohp_p,invoice,namapengirim,jenisbarang,namakurir,metodepembayaran,tanggal,alamat) VALUES ('$nama_p','$nohp_p','$invoice','$namapengirim','$jenisbarang','$namakurir','$metopem','$tanggal','$alamat_p')";
    $eksekusi = mysqli_query($mysqli, $query);
    if ($eksekusi) {
        header("location:datapaket.php");
    } else {
        echo "proses input gagal";
    }
}

function hapuskurir(){
include('koneksi.php');
    $id = $_GET['idkurir'];
    $sql = "DELETE FROM kurir WHERE id_kurir='$id'";
    $eksekusi = $mysqli->query($sql);
    if ($eksekusi) {
        // echo "Proses hapus berhasil";
        header("location:datakurir.php");
    } else {
        echo "Proses Hapus Gagal";
    }
}

function hapuspaket(){
include('koneksi.php');
    $id = $_GET['idpaket'];
    $sql = "DELETE FROM paket WHERE id_paket='$id'";
    $eksekusi = $mysqli->query($sql);
    if ($eksekusi) {
        // echo "Proses hapus berhasil";
        header("location:datapaket.php");
    } else {
        echo "Proses Hapus Gagal";
    }
}

function editkurir()
{
    include('koneksi.php');
    $idkurir = $_POST['idkurir'];
    $namakurir = $_POST['namakurir'];
    $noktp = $_POST['noktp'];
    $nohp = $_POST['nohp'];
    $nopol = $_POST['nopol'];
    $jk = $_POST['jk'];
    $wilayah = $_POST['wilayah'];
    $tanggal = $_POST['tanggal'];
    $alamat = $_POST['alamat'];

    $sql = "UPDATE kurir SET nama='$namakurir',noktp='$noktp',nohp='$nohp',nopol='$nopol',jeniskelamin='$jk',wilayah='$wilayah',tanggalmasuk='$tanggal',alamat='$alamat'
    WHERE id_kurir='$idkurir'";
    $eksekusi = $mysqli->query($sql);
    if ($eksekusi) {
        // echo ("Proses Update Berhasil");
        header("location:datakurir.php");
    } else {
        echo ("Proses Update Gagal");
    }
}

function editpaket()
{
    include('koneksi.php');
    $idpaket = $_POST['idpaket'];
    $nama_p = $_POST['penerima'];
    $nohp_p = $_POST['nohp_p'];
    $invoice = $_POST['invoice'];
    $namapengirim = $_POST['pengirim'];
    $jenisbarang = $_POST['jenisbarang'];
    $namakurir = $_POST['namakurir'];
    $metopem = $_POST['metodepembayaran'];
    $tanggal = $_POST['tanggal'];
    $alamat_p = $_POST['alamat_p'];

    $sql = "UPDATE paket SET nama_p='$nama_p',nohp_p='$nohp_p',invoice='$invoice',namapengirim='$namapengirim',jenisbarang='$jenisbarang',namakurir='$namakurir',metodepembayaran='$metopem',tanggal='$tanggal',alamat='$alamat_p'
    WHERE id_paket='$idpaket'";
    $eksekusi = $mysqli->query($sql);
    if ($eksekusi) {
        // echo ("Proses Update Berhasil");
        header("location:datapaket.php");
    } else {
        echo ("Proses Update Gagal");
    }
}

function login()
{
    include 'koneksi.php';
    $usernamex = $_POST['nama'];
    $paswordx = $_POST['password'];

    $kueri = "SELECT * FROM users where nama='$usernamex' and password='$paswordx'";
    $eksekusi = mysqli_query($mysqli, $kueri);
    if ($eksekusi->num_rows > 0) {
        session_start();
        $_SESSION['nama'] = $usernamex;
        header('location:dashboard.php');
    } else {
        echo "Username atau PW Salah!";
        echo "<br><a href='index.php'>Kembali</a>";
    }
}

function logout()
{
    session_start();
    $_SESSION['nama'] = '';
    session_destroy();
    header("location:index.php");
}
