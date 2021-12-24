<?php
$server = "localhost";
$user = "root";
$password = "";
$nama_database = "sistem-sma";

$koneksi = mysqli_connect($server, $user, $password, $nama_database);

if( !$koneksi ){
    die("Gagal terhubung dengan database: " . mysqli_connect_error());
}

$nisn       = "";
$nama       = "";
$kelas     = "";
$pweb      = "";
$grafkom        = "";
$jarkom        = "";
$kb = "";
$ppl = "";
$sukses     = "";
$error      = "";

if (isset($_GET['op'])) {
    $op = $_GET['op'];
} else {
    $op = "";
}
//include("proses.php")
/*session_start();
if (!isset($_SESSION['id']))
{
    $_SESSION['id'] = session_id();
    $_SESSION['nisn'] = '0005678117'
}*/

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Nilai</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <style>
        .mx-auto {
            width: 1000px
        }

        .card {
            margin-top: 30px;
        }
        
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" style="padding:10px; margin-left:10px;" href="#">SMA PWEB</a>

            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link " href="jadwal.php">Jadwal</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="nilai.php">Nilai</a>
                </li>
                </ul>
            </div>
    </nav>
    <div class="mx-auto">
        <!-- untuk mengeluarkan data -->
        <div class="card">
            <div class="card-header text-white bg-secondary">
                <center>
                <h1><b>Laporan Hasil Belajar<b></h1>
                <center>
            </div>
        </div>
        <div class = "card">
            <div class="card-body">
            <table class="table table-bordered">
                <tbody>
                    <?php
                        $sql2   = "select * from nilai where (nisn='0005678117')";
                        $q2     = mysqli_query($koneksi, $sql2);
                        $urut   = 1;
                        while ($r2 = mysqli_fetch_array($q2)) {
                            $nisn        = $r2['nisn'];
                            $nama       = $r2['nama'];
                            $kelas     = $r2['kelas'];
                            $pweb   = $r2['pweb'];
                            $grafkom   = $r2['grafkom'];
                            $jarkom   = $r2['jarkom'];
                            $kb   = $r2['kb'];
                            $ppl   = $r2['ppl'];
                    ?>
                            <tr>
                                <th>NISN</th>
                                <td scope="col"><?php echo $nisn ?></td>
                            </tr>
                            <tr>
                                <th>Nama</th>
                                <td scope="col"><?php echo $nama ?></td>
                            </tr>
                            <tr>
                                <th>Kelas</th>
                                <td scope="col"><?php echo $kelas ?></td>
                            </tr>
                            <tr>
                                <th>Pemrograman Web</th>
                                <td scope="col"><?php echo $pweb ?></td>
                            </tr>
                            <tr>
                                <th>Grafika</th>
                                <td scope="col"><?php echo $grafkom ?></td>
                            </tr>
                            <tr>
                                <th>Jaringan</th>
                                <td scope="col"><?php echo $jarkom ?></td>
                            </tr>
                            <tr>
                                <th>Kecerdasan Buatan</th>
                                <td scope="col"><?php echo $kb ?></td>
                            </tr>
                            <tr>
                                <th>Software</th>
                                <td scope="col"><?php echo $ppl ?></td>
                            </tr>
                            <tr>
                        
                        <?php
                        }
                        ?>
                    </tbody>
            </table>
            </div>
        </div>
    </div>
</body>

</html>
