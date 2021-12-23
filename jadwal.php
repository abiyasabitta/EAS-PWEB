<?php include("config.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!--  This file has been downloaded from bootdey.com @bootdey on twitter -->
    <!--  All snippets are MIT license http://bootdey.com/license -->
    <title>time table - Bootdey.com</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body style="background-color: rgb(226, 229, 231); margin:0px;">
    <nav class="navbar navbar-f navbar-expand-xl navbar-dark bg-dark">
    <a class="navbar-brand" style="padding:10px;" href="#">SMA PWEB</a>
    
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="jadwal.php">Jadwal</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="nilai.php">Nilai</a>
        </li>
        </ul>
    </div>
    </nav>
<div class="container">
    <h1 style="text-align:center; margin-top:50px; margin-bottom:20px;">JADWAL MATA PELAJARAN</h1>  
                <div class="timetable-img text-center">
                    <img src="img/content/timetable.png" alt="">
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered text-center">
                        <thead>
                            <tr class="bg-light-gray">
                                <th class="text-uppercase">Hari</th>
                                <th class="text-uppercase">Jam Mulai</th>
                                <th class="text-uppercase">Jam Selesai</th>
                                <th class="text-uppercase">Kelas</th>
                                <th class="text-uppercase">Nama Dosen</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        $sql = "Select * From jadwal WHERE id_siswa = 1";
                        $query = mysqli_query($koneksi, $sql);

                        while ($jadwal = mysqli_fetch_array($query)) {
                            echo "<tr>";

                            echo '<td class="bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13">' . $jadwal['hari'] . "</td>";
                            echo '<td class="bg-lightred padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13">' . $jadwal['jam'] . "</td>";
                            echo '<td class="bg-purple padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13">' . $jadwal['jam_selesai'] . "</td>";
                            echo '<td class="bg-sky padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13">' . $jadwal['kelas'] . "</td>";
                            echo '<td class="bg-pink padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13">' . $jadwal['dosen'] . "</td>";
                            

                            echo "</tr>";
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>

<style type="text/css">
body{
    margin-top:20px;
}
.bg-light-gray {
    background-color: #f7f7f7;
}
.table-bordered thead td, .table-bordered thead th {
    border-bottom-width: 2px;
}
.table thead th {
    vertical-align: bottom;
    border-bottom: 2px solid #dee2e6;
}
.table-bordered td, .table-bordered th {
    border: 1px solid #dee2e6;
}


.bg-sky.box-shadow {
    box-shadow: 0px 5px 0px 0px #00a2a7
}

.bg-orange.box-shadow {
    box-shadow: 0px 5px 0px 0px #af4305
}

.bg-green.box-shadow {
    box-shadow: 0px 5px 0px 0px #4ca520
}

.bg-yellow.box-shadow {
    box-shadow: 0px 5px 0px 0px #dcbf02
}

.bg-pink.box-shadow {
    box-shadow: 0px 5px 0px 0px #e82d8b
}

.bg-purple.box-shadow {
    box-shadow: 0px 5px 0px 0px #8343e8
}

.bg-lightred.box-shadow {
    box-shadow: 0px 5px 0px 0px #d84213
}


.bg-sky {
    background-color: #02c2c7
}

.bg-orange {
    background-color: #e95601
}

.bg-green {
    background-color: #5bbd2a
}

.bg-yellow {
    background-color: #f0d001
}

.bg-pink {
    background-color: #ff48a4
}

.bg-purple {
    background-color: #9d60ff
}

.bg-lightred {
    background-color: #ff5722
}

.padding-15px-lr {
    padding-left: 15px;
    padding-right: 15px;
}
.padding-5px-tb {
    padding-top: 5px;
    padding-bottom: 5px;
}
.margin-10px-bottom {
    margin-bottom: 10px;
}
.border-radius-5 {
    border-radius: 5px;
}

.margin-10px-top {
    margin-top: 10px;
}
.font-size14 {
    font-size: 14px;
}

.text-light-gray {
    color: #d6d5d5;
}
.font-size13 {
    font-size: 13px;
}

.table-bordered td, .table-bordered th {
    border: 1px solid #dee2e6;
}
.table td, .table th {
    padding: .75rem;
    vertical-align: top;
    border-top: 1px solid #dee2e6;
}
</style>

<script type="text/javascript">

</script>
</body>
</html>