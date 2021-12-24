<!-- list tugas -->
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
    <title>Tugas</title>
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
    <div class="container-lg pt-3 min-vh-100">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="jadwal.php" class="text-decoration-none text-dark">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">
                    Tugas  
                    <?php
                        $kls_id = $_GET['id'];
                        $sql = "SELECT * FROM kelas WHERE kls_id='$kls_id'";
                        $query = mysqli_query($db, $sql);
                        $kelas = mysqli_fetch_assoc($query);
                        echo $kelas['kls_nama'];
                    ?>
                </li>                
            </ol>
        </nav>

        <h3 class="mb-3">
            <?php echo $kelas['kls_nama']; ?>
        </h3>

        <div class="row">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead class="table-dark">
                        <th>Pertemuan ke-</th>
                        <th>Tugas</th>
                        <th>Deadline</th>
                        <th>Status</th>
                        <th>Nilai</th>
                    </thead>
                    <tbody>
                        <?php
                            $sql = "SELECT * FROM tugas WHERE kls_id='$kls_id'";
                            $query = mysqli_query($db, $sql);
                            
                            if (mysqli_num_rows($query) > 0) {
                                while ($tugas = mysqli_fetch_array($query)) {
                                    $tgs_id = $tugas['tgs_id'];
                                    $subsql = "SELECT * FROM tugas_mahasiswa WHERE tgs_id='$tgs_id' AND mhs_id='$mhs_id'";
                                    $subquery = mysqli_query($db, $subsql);

                                    if (mysqli_num_rows($subquery) == 0) {
                                        $subsql = "INSERT INTO tugas_mahasiswa (tgs_id, mhs_id, tm_status) VALUE ('$tgs_id', '$mhs_id', 'belum dikumpulkan')";
                                        $subquery = mysqli_query($db, $subsql);

                                        $subsql = "SELECT * FROM tugas_mahasiswa WHERE tgs_id='$tgs_id' AND mhs_id='$mhs_id'";
                                        $subquery = mysqli_query($db, $subsql);
                                    }

                                    $tugas_mahasiswa = mysqli_fetch_assoc($subquery);

                                    echo "<tr>";
                                    
                                    echo "<td>" . $tugas['tgs_ke'] . "</td>";
                                    echo "<td><a href='detail-tugas.php?id=" . $tugas['tgs_id'] . "'>" . $tugas['tgs_nama'] . "</a></td>";
                                    $time = strtotime($tugas['tgs_deadline']);
                                    echo "<td>" . date("l, j-M-Y H:i:s", $time) . " WIB</td>";  
                                    echo "<td>" . $tugas_mahasiswa['tm_status'] . "</td>";
                                    echo "<td>" . $tugas_mahasiswa['tm_nilai'] . "</td>";

                                    echo "</tr>";
                                }	
                            }	
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- End content -->

    <!-- Begin footer -->
	<!-- <div class="d-flex flex-column bg-dark text-white align-items-center text-center py-2">
		<div>&copy; 2021 AuliAAEPA</div>
	</div> -->
	<!-- End footer -->
</body>
</html>