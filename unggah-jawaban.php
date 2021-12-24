<!-- form unggah jawaban -->
<?php
    include("config.php");

    session_start();
    if (!isset($_SESSION['id'])) {
        $_SESSION['id'] = session_id();
        $_SESSION['user_id'] = '05111940000044';
    }
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Unggah Jawaban Tugas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
</head>
<body>
    <!-- Begin nav  -->
	<nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark">
		<div class="container-fluid">
			<a class="navbar-brand fw-bold" href="#">SMA PWEB</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="jadwal.php">Jadwal</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="materi.php">Materi</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle active" aria-current="page" href="#" id="tugasDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Tugas
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="tugasDropdown">
                            <?php
                                $mhs_id = $_SESSION['user_id'];
                                $sql = "SELECT k.kls_id, k.kls_nama FROM kelas_mahasiswa km JOIN kelas k ON (km.kls_id=k.kls_id) WHERE mhs_id='$mhs_id'";
                                $query = mysqli_query($db, $sql);

                                while ($kelas = mysqli_fetch_array($query)) {
                                    echo "<li><a class='dropdown-item' href='tugas.php?id=". $kelas['kls_id'] . "'>" . $kelas['kls_nama'] . "</a></li>";
                                }
                            ?>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="nilai.php">Nilai</a>
                    </li>
                </ul>
            </div>
		</div>
	</nav>
    <!-- End nav -->

    <!-- Begin content -->
    <div class="container-lg pt-3 min-vh-100 mb-4">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="jadwal.php" class="text-decoration-none text-dark">Dashboard</a></li>
                <?php
                    $tgs_id = $_GET['id'];
                    $sql = "SELECT * FROM tugas WHERE tgs_id=$tgs_id";
                    $query = mysqli_query($db, $sql);
                    $tugas = mysqli_fetch_assoc($query);
                    $kls_id = $tugas['kls_id'];

                    $sql = "SELECT * FROM kelas WHERE kls_id='$kls_id'";
                    $query = mysqli_query($db, $sql);
                    $kelas = mysqli_fetch_assoc($query);
                    $kls_nama = $kelas['kls_nama'];

                    echo "<li class='breadcrumb-item'><a href='tugas.php?id=" . $kls_id . "' class='text-decoration-none text-dark'>Tugas " . $kls_nama . "</a></li>";
                    echo "<li class='breadcrumb-item'><a href='detail-tugas.php?id=" . $tugas['tgs_id'] . "' class='text-decoration-none text-dark'>" . $tugas['tgs_nama'] . "</a></li>";
                    echo "<li class='breadcrumb-item active' aria-current='page'>Unggah Jawaban</li>";
                ?>
            </ol>
        </nav>

        <h3 class="mb-3">
            <?php echo $kelas['kls_nama']; ?>
        </h3>

        <div class="card shadow border-light rounded-3">
            <div class="card-body">
                <h4 class="card-title"><?php echo $tugas['tgs_nama'] ?></h4>
                <p class="card-text"><?php echo $tugas['tgs_deskripsi'] ?></p>
                <?php
                    if ($tugas['tgs_url']) {
                        echo "<p class='mb-0'><i class='fa fa-laptop me-2'></i><a href='" . $tugas['tgs_url'] . "'>" . $tugas['tgs_url'] . "</a></p>";
                    } 

                    if ($tugas['tgs_file']) {
                        echo "<p class='mb-0'><i class='fa fa-file-o me-2'></i><a href='files/" . $tugas['tgs_file'] . "'>" . $tugas['tgs_file'] . "</a></p>";
                    }
                ?>

                <h5 class="card-subtitle mt-4 mb-3">Jawaban</h5>
                <?php echo "<form class='needs-validation' action='proses-unggah-jawaban.php?id=" . $tugas['tgs_id'] . "' method='POST' enctype='multipart/form-data' novalidate>"; ?>
                    <div class="row my-3">
                        <label for="tipe" class="form-label col-sm-2">Tipe</label>
                        <div class="col-sm-10">
                            <div class="btn-group" role="group" onclick="toggleTipe()">
                                <input type="radio" class="btn-check" name="tipe" id="tipe1" value="file" autocomplete="off" checked>
                                <label class="btn btn-outline-primary" for="tipe1">File</label>

                                <input type="radio" class="btn-check" name="tipe" id="tipe2" value="tautan" autocomplete="off">
                                <label class="btn btn-outline-primary" for="tipe2">Tautan</label>
                            </div>
                        </div>
                    </div>
                    <div id="div_nama_file" class="row mb-3">
                        <label for="nama" class="form-label col-sm-2">Nama File</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama_file" name="nama_file" placeholder="Nama File" >
                            <span class="valid-feedback">
                                <strong>Nama file boleh diubah, boleh tidak</strong>
                            </span>
                        </div>
                    </div>
                    <div id="div_file" class="row mb-3">
                        <label for="foto" class="form-label col-sm-2">File*</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control" id="file" name="file">
                            <span class="invalid-feedback">
                                <strong>Pilih file jawaban yang ingin dikumpulkan</strong>
                            </span>
                        </div>
                    </div>
                    <div id="div_nama_tautan" class="row mb-3">
                        <label for="nama" class="form-label col-sm-2">Nama Tautan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama_tautan" name="nama_tautan" placeholder="Nama Tautan">
                            <span class="valid-feedback">
                                <strong>Tautan boleh diberi alias, boleh tidak</strong>
                            </span>
                        </div>
                    </div>
                    <div id="div_tautan" class="row mb-3">
                        <label for="foto" class="form-label col-sm-2">Tautan*</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="tautan" name="tautan" placeholder="Tautan">
                            <span class="invalid-feedback" role="alert">
                                <strong>Masukkan tautan jawaban yang ingin dikumpulkan</strong>
                            </span>
                        </div>
                    </div>
                    <div class="text-end mb-3">
                        <?php
                            echo "<a href='detail-tugas.php?id=" . $tugas['tgs_id'] . "' role='button' class='btn btn-secondary'>Batal</a>";
                        ?>
                        <input type="submit" class="btn btn-primary" value="Simpan" name="simpan">
                    </div>
                </form>                
            </div>
        </div>
    </div>
    <!-- End content -->

    <!-- Begin footer -->
	<!-- <div class="d-flex flex-column bg-dark text-white align-items-center text-center py-2">
		<div>&copy; 2021 AuliAAEPA</div>
	</div> -->
	<!-- End footer -->

    <script>
        function toggleTipe() {
            var tipe = document.getElementsByName('tipe');
            if (tipe[0].checked) {
                document.getElementById("div_nama_file").classList.remove("d-none");
                document.getElementById("div_file").classList.remove("d-none");
                document.getElementById("file").required = true;
                document.getElementById("div_nama_tautan").classList.add("d-none");
                document.getElementById("div_tautan").classList.add("d-none");
                document.getElementById("tautan").required = false;
            } else if (tipe[1].checked) {
                document.getElementById("div_nama_tautan").classList.remove("d-none");
                document.getElementById("div_tautan").classList.remove("d-none");
                document.getElementById("tautan").required = true;
                document.getElementById("div_nama_file").classList.add("d-none");
                document.getElementById("div_file").classList.add("d-none");
                document.getElementById("file").required = false;
            }
        }
        toggleTipe();
    </script>
    <script>
        (function () {
        'use strict'

        var forms = document.querySelectorAll('.needs-validation')
        Array.prototype.slice.call(forms).forEach(function (form) {
            form.addEventListener('submit', function (event) {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }
                form.classList.add('was-validated')
            }, false)
            })
        })()
    </script>
</body>
</html>